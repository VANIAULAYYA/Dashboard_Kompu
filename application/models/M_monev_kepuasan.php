<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Model: Dashboard_model.php
 * Path: application/models/Dashboard_model.php
 */
class M_monev_kepuasan extends CI_Model {

    private $table = 'buku_tamu';

    /**
     * Get total responden berdasarkan periode
     */
   public function get_total_responden($date_range) {
    $this->db->from('buku_tamu');
    
    // Filter berdasarkan tanggal range
    if ($date_range['start'] && $date_range['end']) {
        $this->db->where('timestamp >=', $date_range['start']);
        $this->db->where('timestamp <=', $date_range['end']);
    }
    
    // JANGAN tambahkan filter tahun lagi jika sudah pakai date_range
    // Karena date_range['start'] dan date_range['end'] sudah include tahun
    
    return $this->db->count_all_results();
}

    /**
     * Get jumlah responden berdasarkan jenis kelamin
     */
    public function get_jenis_kelamin($date_range) {
        $this->db->select('jenis_kelamin, COUNT(*) as jumlah');
        
        // Filter hanya jika date_range tidak null
        if ($date_range['start'] !== null && $date_range['end'] !== null) {
            $this->db->where('DATE(timestamp) >=', $date_range['start']);
            $this->db->where('DATE(timestamp) <=', $date_range['end']);
        }
        
        $this->db->group_by('jenis_kelamin');
        $query = $this->db->get($this->table);
        
        $result = [
            'pria' => 0,
            'wanita' => 0
        ];
        
        foreach ($query->result() as $row) {
            if (strtolower($row->jenis_kelamin) == 'l' || strtolower($row->jenis_kelamin) == 'pria') {
                $result['pria'] = $row->jumlah;
            } else {
                $result['wanita'] = $row->jumlah;
            }
        }
        
        return $result;
    }

    /**
     * Get nilai rata-rata IKM (Indeks Kepuasan Masyarakat)
     */
    public function get_nilai_ikm($date_range) {
        $this->db->select('
            AVG(pendapat_pelayanan) as avg1,
            AVG(pemahaman_prosedur) as avg2,
            AVG(pendapat_kecepatan) as avg3,
            AVG(pendapat_biaya) as avg4,
            AVG(pendapat_produk) as avg5,
            AVG(pendapat_kompetensi) as avg6,
            AVG(pendapat_perilaku) as avg7,
            AVG(pendapat_pengaduan) as avg8,
            AVG(pendapat_kualitas) as avg9
        ');
        
        // Filter hanya jika date_range tidak null
        if ($date_range['start'] !== null && $date_range['end'] !== null) {
            $this->db->where('DATE(timestamp) >=', $date_range['start']);
            $this->db->where('DATE(timestamp) <=', $date_range['end']);
        }
        
        $query = $this->db->get($this->table);
        $result = $query->row();
        
        // Handle case ketika tidak ada data
        if (!$result || ($result->avg1 === null && $result->avg2 === null)) {
            return 0;
        }
        
        // Hitung total rata-rata
        $total = ($result->avg1 + $result->avg2 + $result->avg3 + $result->avg4 + 
                  $result->avg5 + $result->avg6 + $result->avg7 + $result->avg8 + 
                  $result->avg9) / 9;
        
        return round($total, 2);
    }

    /**
     * Get rata-rata nilai pendapat untuk kolom tertentu
     */
    public function get_rata_pendapat($date_range, $kolom) {
        $this->db->select("AVG($kolom) as rata");
        
        // Filter hanya jika date_range tidak null
        if ($date_range['start'] !== null && $date_range['end'] !== null) {
            $this->db->where('DATE(timestamp) >=', $date_range['start']);
            $this->db->where('DATE(timestamp) <=', $date_range['end']);
        }
        
        $query = $this->db->get($this->table);
        $result = $query->row();
        
        return $result->rata ? round($result->rata, 2) : 0;
    }

    /**
     * Get distribusi kepuasan (untuk grafik donut)
     */
    public function get_distribusi_kepuasan($date_range) {
        $this->db->select('
            id,
            (pendapat_pelayanan + pemahaman_prosedur + pendapat_kecepatan + 
             pendapat_biaya + pendapat_produk + pendapat_kompetensi + 
             pendapat_perilaku + pendapat_pengaduan + pendapat_kualitas) / 9 as rata_total
        ');
        
        // Filter hanya jika date_range tidak null
        if ($date_range['start'] !== null && $date_range['end'] !== null) {
            $this->db->where('DATE(timestamp) >=', $date_range['start']);
            $this->db->where('DATE(timestamp) <=', $date_range['end']);
        }
        
        $query = $this->db->get($this->table);
        
        $distribusi = [
            'sangat_sesuai' => 0,
            'sesuai' => 0,
            'kurang_sesuai' => 0,
            'tidak_sesuai' => 0
        ];
        
        foreach ($query->result() as $row) {
            // Handle null values
            if ($row->rata_total === null) continue;
            
            if ($row->rata_total >= 3.5324) {
                $distribusi['sangat_sesuai']++;
            } elseif ($row->rata_total >= 3.0644) {
                $distribusi['sesuai']++;
            } elseif ($row->rata_total >= 2.60) {
                $distribusi['kurang_sesuai']++;
            } else {
                $distribusi['tidak_sesuai']++;
            }
        }
        
        return $distribusi;
    }

    /**
     * Get data keperluan kunjungan
     */
    public function get_keperluan_kunjungan($date_range) {
        $this->db->select('keperluan, COUNT(*) as jumlah');
        
        // Filter hanya jika date_range tidak null
        if ($date_range['start'] !== null && $date_range['end'] !== null) {
            $this->db->where('DATE(timestamp) >=', $date_range['start']);
            $this->db->where('DATE(timestamp) <=', $date_range['end']);
        }
        
        $this->db->group_by('keperluan');
        $query = $this->db->get($this->table);
        
        $total = $this->get_total_responden($date_range);
        $result = [];
        
        foreach ($query->result() as $row) {
            $persen = $total > 0 ? round(($row->jumlah / $total) * 100) : 0;
            $result[] = [
                'nama' => $row->keperluan ?: 'Tidak diisi',
                'jumlah' => $row->jumlah,
                'persen' => $persen
            ];
        }
        
        // Urutkan berdasarkan jumlah (descending)
        usort($result, function($a, $b) {
            return $b['jumlah'] - $a['jumlah'];
        });
        
        return $result;
    }

    /**
     * Get detail data untuk export atau keperluan lain
     */
    public function get_all_data($date_range, $limit = null, $offset = 0) {
    // Filter hanya jika date_range tidak null
    if ($date_range['start'] !== null && $date_range['end'] !== null) {
        $this->db->where('DATE(timestamp) >=', $date_range['start']);
        $this->db->where('DATE(timestamp) <=', $date_range['end']);
    }
    
    $this->db->order_by('timestamp', 'DESC');
    
    if ($limit !== null) {
        $this->db->limit($limit, $offset);
    }
    
    $query = $this->db->get($this->table);
    return $query->result();
}

    /**
     * Get data by ID
     */
    public function get_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table);
        return $query->row();
    }

    /**
     * Insert data buku tamu
     */
    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    /**
     * Update data buku tamu
     */
    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    /**
     * Delete data buku tamu
     */
    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }

    /**
     * Get statistik per bulan (untuk chart tahunan) - MODIFIED
     */
    public function get_statistik_bulanan($tahun = null) {
        if ($tahun === null) {
            $tahun = date('Y');
        }
        
        $this->db->select('
            MONTH(timestamp) as bulan,
            COUNT(*) as total_responden,
            AVG((pendapat_pelayanan + pemahaman_prosedur + pendapat_kecepatan + 
                 pendapat_biaya + pendapat_produk + pendapat_kompetensi + 
                 pendapat_perilaku + pendapat_pengaduan + pendapat_kualitas) / 9) as rata_ikm
        ');
        $this->db->where('YEAR(timestamp)', $tahun);
        $this->db->group_by('MONTH(timestamp)');
        $this->db->order_by('MONTH(timestamp)', 'ASC');
        $query = $this->db->get($this->table);
        
        return $query->result();
    }


    /**
     * Get top keperluan
     */
    public function get_top_keperluan($date_range, $limit = 5) {
        $this->db->select('keperluan, COUNT(*) as jumlah');
        $this->db->where('DATE(timestamp) >=', $date_range['start']);
        $this->db->where('DATE(timestamp) <=', $date_range['end']);
        $this->db->group_by('keperluan');
        $this->db->order_by('jumlah', 'DESC');
        $this->db->limit($limit);
        $query = $this->db->get($this->table);
        
        return $query->result();
    }

    /**
     * Get kritik dan saran terbaru
     */
    public function get_kritik_saran($date_range, $limit = 10) {
        $this->db->select('id, nama, timestamp, kritik_saran');
        $this->db->where('DATE(timestamp) >=', $date_range['start']);
        $this->db->where('DATE(timestamp) <=', $date_range['end']);
        $this->db->where('kritik_saran IS NOT NULL');
        $this->db->where('kritik_saran !=', '');
        $this->db->order_by('timestamp', 'DESC');
        $this->db->limit($limit);
        $query = $this->db->get($this->table);
        
        return $query->result();
    }

    /**
     * Get perbandingan periode
     * Membandingkan data periode sekarang dengan periode sebelumnya
     */
    public function get_perbandingan_periode($date_range_now, $date_range_before) {
        // Data periode sekarang
        $ikm_now = $this->get_nilai_ikm($date_range_now);
        $total_now = $this->get_total_responden($date_range_now);
        
        // Data periode sebelumnya
        $ikm_before = $this->get_nilai_ikm($date_range_before);
        $total_before = $this->get_total_responden($date_range_before);
        
        // Hitung persentase perubahan
        $perubahan_ikm = $ikm_before > 0 ? (($ikm_now - $ikm_before) / $ikm_before) * 100 : 0;
        $perubahan_total = $total_before > 0 ? (($total_now - $total_before) / $total_before) * 100 : 0;
        
        return [
            'ikm_now' => $ikm_now,
            'ikm_before' => $ikm_before,
            'perubahan_ikm' => round($perubahan_ikm, 2),
            'total_now' => $total_now,
            'total_before' => $total_before,
            'perubahan_total' => round($perubahan_total, 2)
        ];
    }

    /**
     * Export data ke CSV
     */
    public function export_to_csv($date_range) {
    // Filter hanya jika date_range tidak null
    if ($date_range['start'] !== null && $date_range['end'] !== null) {
        $this->db->where('DATE(timestamp) >=', $date_range['start']);
        $this->db->where('DATE(timestamp) <=', $date_range['end']);
    }
    
    $this->db->order_by('timestamp', 'DESC');
    $query = $this->db->get($this->table);
    
    return $query->result_array();
}

    /**
     * Get ringkasan statistik lengkap
     */
    public function get_ringkasan_statistik($date_range) {
        $total = $this->get_total_responden($date_range);
        $ikm = $this->get_nilai_ikm($date_range);
        $jenis_kelamin = $this->get_jenis_kelamin($date_range);
        $distribusi = $this->get_distribusi_kepuasan($date_range);
        
        // Hitung persentase distribusi
        $persen_sangat_sesuai = $total > 0 ? round(($distribusi['sangat_sesuai'] / $total) * 100, 2) : 0;
        $persen_sesuai = $total > 0 ? round(($distribusi['sesuai'] / $total) * 100, 2) : 0;
        $persen_kurang_sesuai = $total > 0 ? round(($distribusi['kurang_sesuai'] / $total) * 100, 2) : 0;
        $persen_tidak_sesuai = $total > 0 ? round(($distribusi['tidak_sesuai'] / $total) * 100, 2) : 0;
        
        return [
            'total_responden' => $total,
            'nilai_ikm' => $ikm,
            'persentase_ikm' => ($ikm / 4) * 100,
            'grade_pkm' => $this->get_grade_from_nilai($ikm),
            'pria' => $jenis_kelamin['pria'],
            'wanita' => $jenis_kelamin['wanita'],
            'sangat_sesuai' => $distribusi['sangat_sesuai'],
            'sesuai' => $distribusi['sesuai'],
            'kurang_sesuai' => $distribusi['kurang_sesuai'],
            'tidak_sesuai' => $distribusi['tidak_sesuai'],
            'persen_sangat_sesuai' => $persen_sangat_sesuai,
            'persen_sesuai' => $persen_sesuai,
            'persen_kurang_sesuai' => $persen_kurang_sesuai,
            'persen_tidak_sesuai' => $persen_tidak_sesuai
        ];
    }

    /**
     * Helper function untuk mendapatkan grade dari nilai
     */
    private function get_grade_from_nilai($nilai) {
        if ($nilai >= 3.5324) {
            return 'A';
        } elseif ($nilai >= 3.0644) {
            return 'B';
        } elseif ($nilai >= 2.60) {
            return 'C';
        } else {
            return 'D';
        }
    }

    /**
     * Search data buku tamu
     */
    public function search($keyword, $date_range = null) {
    $this->db->group_start();
    $this->db->like('nama', $keyword);
    $this->db->or_like('asal_instansi', $keyword);
    $this->db->or_like('keperluan', $keyword);
    $this->db->or_like('kritik_saran', $keyword);
    $this->db->group_end();
    
    if ($date_range !== null && $date_range['start'] !== null && $date_range['end'] !== null) {
        $this->db->where('DATE(timestamp) >=', $date_range['start']);
        $this->db->where('DATE(timestamp) <=', $date_range['end']);
    }
    
    $this->db->order_by('timestamp', 'DESC');
    $query = $this->db->get($this->table);
    
    return $query->result();
}

    public function get_data($periode)
{
    $tahun = date('Y');

    switch ($periode) {
        case 'bulan':
            // Januari sampai Desember
            $data = [];
            for ($i = 1; $i <= 12; $i++) {
                $start = "$tahun-" . str_pad($i, 2, '0', STR_PAD_LEFT) . "-01";
                $end = date("Y-m-t", strtotime($start)); // akhir bulan
                $data[] = [
                    'label' => date("F", strtotime($start)),
                    'ikm' => $this->get_nilai_ikm(['start' => $start, 'end' => $end]),
                    'responden' => $this->get_total_responden(['start' => $start, 'end' => $end])
                ];
            }
            break;

        case 'triwulan':
            $range = [
                ['start' => "$tahun-01-01", 'end' => "$tahun-03-31", 'label' => 'Triwulan I'],
                ['start' => "$tahun-04-01", 'end' => "$tahun-06-30", 'label' => 'Triwulan II'],
                ['start' => "$tahun-07-01", 'end' => "$tahun-09-30", 'label' => 'Triwulan III'],
                ['start' => "$tahun-10-01", 'end' => "$tahun-12-31", 'label' => 'Triwulan IV']
            ];
            $data = [];
            foreach ($range as $r) {
                $data[] = [
                    'label' => $r['label'],
                    'ikm' => $this->get_nilai_ikm($r),
                    'responden' => $this->get_total_responden($r)
                ];
            }
            break;

        case 'semester':
            $range = [
                ['start' => "$tahun-01-01", 'end' => "$tahun-06-30", 'label' => 'Semester I'],
                ['start' => "$tahun-07-01", 'end' => "$tahun-12-31", 'label' => 'Semester II']
            ];
            $data = [];
            foreach ($range as $r) {
                $data[] = [
                    'label' => $r['label'],
                    'ikm' => $this->get_nilai_ikm($r),
                    'responden' => $this->get_total_responden($r)
                ];
            }
            break;

        case 'tahun':
        default:
            $range = ['start' => "$tahun-01-01", 'end' => "$tahun-12-31"];
            $data[] = [
                'label' => "Tahun $tahun",
                'ikm' => $this->get_nilai_ikm($range),
                'responden' => $this->get_total_responden($range)
            ];
            break;
    }

    return $data;
}

public function get_available_years() {
    $this->db->select('YEAR(timestamp) as tahun');
    $this->db->from('buku_tamu');
    $this->db->group_by('YEAR(timestamp)');
    $this->db->order_by('tahun', 'DESC');
    
    $query = $this->db->get();
    $years = [];
    
    foreach ($query->result() as $row) {
        $years[] = $row->tahun;
    }
    
    return $years;
}

/**
 * Get distribusi nilai untuk grafik donut per unsur
 */
/**
 * Get distribusi nilai untuk grafik donut per unsur
 */
public function get_distribusi_unsur($date_range, $kolom) {
    // Query untuk distribusi nilai berdasarkan grade
    $this->db->select("
        SUM(CASE WHEN $kolom >= 3.5324 THEN 1 ELSE 0 END) as sangat_puas,
        SUM(CASE WHEN $kolom >= 3.0644 AND $kolom < 3.5324 THEN 1 ELSE 0 END) as puas,
        SUM(CASE WHEN $kolom >= 2.60 AND $kolom < 3.0644 THEN 1 ELSE 0 END) as cukup,
        SUM(CASE WHEN $kolom < 2.60 THEN 1 ELSE 0 END) as kurang_puas,
        COUNT(*) as total_responden,
        AVG($kolom) as rata_rata,
        MIN($kolom) as min_nilai,
        MAX($kolom) as max_nilai
    ");
    
    // Filter berdasarkan date_range
    if ($date_range['start'] !== null && $date_range['end'] !== null) {
        $this->db->where('timestamp >=', $date_range['start'] . ' 00:00:00');
        $this->db->where('timestamp <=', $date_range['end'] . ' 23:59:59');
    }
    
    $this->db->where("$kolom IS NOT NULL");
    $this->db->where("$kolom >", 0); // Hanya yang ada nilainya
    
    $query = $this->db->get($this->table);
    $result = $query->row();
    
    // Log untuk debugging
    log_message('debug', "Distribusi untuk $kolom: " . json_encode($result));
    
    return $result;
}

}