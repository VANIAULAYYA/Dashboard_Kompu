<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_monev_permintaan extends CI_Model {
    
    private $table = 'layanan_permintaan_data';
    
    private function apply_filter($filter) {
        $jenis = $filter['jenis_periode'] ?? 'bulanan';
        $periode = $filter['periode'] ?? '';
        $tahun = $filter['tahun'] ?? date('Y');
        
        if ($jenis == 'semua') {
            return;
        }
        
        if ($tahun != 'semua') {
            $this->db->where('YEAR(diterima_ppid)', $tahun);
        }
        
        switch ($jenis) {
            case 'bulanan':
                $bulan_map = [
                    'januari' => 1, 'februari' => 2, 'maret' => 3, 'april' => 4,
                    'mei' => 5, 'juni' => 6, 'juli' => 7, 'agustus' => 8,
                    'september' => 9, 'oktober' => 10, 'november' => 11, 'desember' => 12
                ];
                
                if (isset($bulan_map[strtolower($periode)])) {
                    $this->db->where('MONTH(diterima_ppid)', $bulan_map[strtolower($periode)]);
                }
                break;
            
            case 'triwulan':
                $triwulan_map = [
                    'triwulan1' => [1, 2, 3],
                    'triwulan2' => [4, 5, 6],
                    'triwulan3' => [7, 8, 9],
                    'triwulan4' => [10, 11, 12]
                ];
                
                if (isset($triwulan_map[$periode])) {
                    $this->db->where_in('MONTH(diterima_ppid)', $triwulan_map[$periode]);
                }
                break;
            
            case 'semester':
                if ($periode == 'semester1') {
                    $this->db->where_in('MONTH(diterima_ppid)', [1, 2, 3, 4, 5, 6]);
                } elseif ($periode == 'semester2') {
                    $this->db->where_in('MONTH(diterima_ppid)', [7, 8, 9, 10, 11, 12]);
                }
                break;
        }
    }
    
    public function get_available_years() {
        $this->db->distinct();
        $this->db->select('YEAR(diterima_ppid) as tahun');
        $this->db->from($this->table);
        $this->db->where('diterima_ppid IS NOT NULL');
        $this->db->order_by('tahun', 'DESC');
        $query = $this->db->get();
        
        $years = [];
        foreach ($query->result() as $row) {
            if (!empty($row->tahun)) {
                $years[] = $row->tahun;
            }
        }
        
        return empty($years) ? [date('Y')] : $years;
    }
    
    public function get_total_permohonan($filter) {
        $this->db->from($this->table);
        $this->apply_filter($filter);
        return $this->db->count_all_results();
    }
    
    public function get_dalam_proses($filter) {
        $this->db->from($this->table);
        $this->apply_filter($filter);
        $this->db->where_in('LOWER(status)', ['dalam proses', 'proses', 'sedang diproses']);
        return $this->db->count_all_results();
    }
    
    public function get_dipenuhi($filter) {
        $this->db->from($this->table);
        $this->apply_filter($filter);
        $this->db->where_in('LOWER(status)', ['selesai', 'telah diterima', 'dipenuhi', 'terpenuhi']);
        return $this->db->count_all_results();
    }
    
    public function get_ditolak($filter) {
        $this->db->from($this->table);
        $this->apply_filter($filter);
        $this->db->where_in('LOWER(status)', ['ditolak', 'dikembalikan', 'tidak disetujui']);
        return $this->db->count_all_results();
    }
    
    public function get_status_permohonan($filter) {
        $this->db->select('status, COUNT(*) as jumlah');
        $this->db->from($this->table);
        $this->apply_filter($filter);
        $this->db->group_by('status');
        $query = $this->db->get();
        
        $result = ['terpenuhi' => 0, 'dalam_proses' => 0, 'ditolak' => 0];
        
        foreach ($query->result() as $row) {
            $status = strtolower(trim($row->status));
            $jumlah = (int)$row->jumlah;
            
            if (in_array($status, ['selesai', 'telah diterima', 'dipenuhi', 'terpenuhi']) ||
                strpos($status, 'selesai') !== false || 
                strpos($status, 'dipenuhi') !== false) {
                $result['terpenuhi'] += $jumlah;
            } elseif (in_array($status, ['dalam proses', 'proses', 'sedang diproses']) ||
                     strpos($status, 'proses') !== false) {
                $result['dalam_proses'] += $jumlah;
            } elseif (in_array($status, ['ditolak', 'dikembalikan', 'tidak disetujui']) ||
                     strpos($status, 'ditolak') !== false) {
                $result['ditolak'] += $jumlah;
            }
        }
        
        return $result;
    }
    
    public function get_via_permohonan($filter) {
        $this->db->select('via, COUNT(*) as jumlah');
        $this->db->from($this->table);
        $this->apply_filter($filter);
        $this->db->where('via IS NOT NULL');
        $this->db->where('via !=', '');
        $this->db->group_by('via');
        $this->db->order_by('jumlah', 'DESC');
        $query = $this->db->get();
        
        $total = $this->get_total_permohonan($filter);
        $result = [];
        
        foreach ($query->result() as $row) {
            $persen = $total > 0 ? round(($row->jumlah / $total) * 100, 2) : 0;
            $result[] = [
                'nama' => $row->via,
                'jumlah' => (int)$row->jumlah,
                'persen' => $persen
            ];
        }
        
        return $result;
    }
    
    public function get_status_pemohon($filter) {
        $this->db->select('status_pemohon, COUNT(*) as jumlah');
        $this->db->from($this->table);
        $this->apply_filter($filter);
        $this->db->where('status_pemohon IS NOT NULL');
        $this->db->where('status_pemohon !=', '');
        $this->db->group_by('status_pemohon');
        $query = $this->db->get();
        
        $result = [
            'mahasiswa' => 0, 'media' => 0, 'instansi' => 0, 
            'lsm' => 0, 'perseorangan' => 0
        ];
        
        foreach ($query->result() as $row) {
            $status = strtolower(trim($row->status_pemohon));
            $jumlah = (int)$row->jumlah;
            
            if (strpos($status, 'mahasiswa') !== false) {
                $result['mahasiswa'] += $jumlah;
            } elseif (strpos($status, 'media') !== false) {
                $result['media'] += $jumlah;
            } elseif (strpos($status, 'instansi') !== false || 
                     strpos($status, 'perusahaan') !== false) {
                $result['instansi'] += $jumlah;
            } elseif (strpos($status, 'lsm') !== false) {
                $result['lsm'] += $jumlah;
            } else {
                $result['perseorangan'] += $jumlah;
            }
        }
        
        return $result;
    }
    
    public function get_detail_via($via_index, $filter) {
        $via_list = $this->get_via_permohonan($filter);
        
        if (!isset($via_list[$via_index])) {
            return ['success' => false, 'error' => 'Via tidak ditemukan'];
        }
        
        $via_name = $via_list[$via_index]['nama'];
        
        $this->db->select('status, COUNT(*) as jumlah');
        $this->db->from($this->table);
        $this->apply_filter($filter);
        $this->db->where('via', $via_name);
        $this->db->group_by('status');
        $query = $this->db->get();
        
        $distribusi = ['terpenuhi' => 0, 'dalam_proses' => 0, 'ditolak' => 0];
        $total = 0;
        
        foreach ($query->result() as $row) {
            $status = strtolower(trim($row->status));
            $jumlah = (int)$row->jumlah;
            $total += $jumlah;
            
            if (in_array($status, ['selesai', 'telah diterima', 'dipenuhi', 'terpenuhi']) ||
                strpos($status, 'selesai') !== false || 
                strpos($status, 'dipenuhi') !== false) {
                $distribusi['terpenuhi'] += $jumlah;
            } elseif (in_array($status, ['dalam proses', 'proses', 'sedang diproses']) ||
                     strpos($status, 'proses') !== false) {
                $distribusi['dalam_proses'] += $jumlah;
            } elseif (in_array($status, ['ditolak', 'dikembalikan', 'tidak disetujui']) ||
                     strpos($status, 'ditolak') !== false) {
                $distribusi['ditolak'] += $jumlah;
            }
        }
        
        $persentase_terpenuhi = $total > 0 ? round(($distribusi['terpenuhi'] / $total) * 100, 2) : 0;
        
        return [
            'success' => true,
            'via' => $via_name,
            'distribusi' => $distribusi,
            'statistik' => [
                'total_permohonan' => $total,
                'terpenuhi' => $distribusi['terpenuhi'],
                'dalam_proses' => $distribusi['dalam_proses'],
                'ditolak' => $distribusi['ditolak'],
                'persentase_terpenuhi' => $persentase_terpenuhi
            ]
        ];
    }
    
    public function get_dashboard_statistics($filter) {
        return [
            'total_permohonan' => $this->get_total_permohonan($filter),
            'dalam_proses' => $this->get_dalam_proses($filter),
            'dipenuhi' => $this->get_dipenuhi($filter),
            'status_permohonan' => $this->get_status_permohonan($filter),
            'via_permohonan' => $this->get_via_permohonan($filter),
            'status_pemohon' => $this->get_status_pemohon($filter)
        ];
    }
}
?>