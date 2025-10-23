<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    // ========================
    // Statistik Buku Tamu
    // ========================
    public function count_tamu() {
        return $this->db->count_all('buku_tamu');
    }

    public function count_laki() {
        $this->db->where('jenis_kelamin', 'L');
        return $this->db->count_all_results('buku_tamu');
    }

    public function count_perempuan() {
        $this->db->where('jenis_kelamin', 'P');
        return $this->db->count_all_results('buku_tamu');
    }

    public function count_keperluan1() {
        $this->db->where('keperluan', 'Menemui Pejabat/Staf');
        return $this->db->count_all_results('buku_tamu');
    }
    
    public function count_keperluan2() {
        $this->db->where('keperluan', 'Rekomendasi Teknis (Rekomtek)');
        return $this->db->count_all_results('buku_tamu');
    }

    public function count_keperluan3() {
        $this->db->where('keperluan', 'Kirim Surat (Promosi/Aduan/Temuan)');
        return $this->db->count_all_results('buku_tamu');
    }
    
    public function count_keperluan4() {
        $this->db->where('keperluan', 'Permintaan Data/Informasi');
        return $this->db->count_all_results('buku_tamu');
    }

    public function count_keperluan5() {
        $this->db->where('keperluan', 'Lainnya');
        return $this->db->count_all_results('buku_tamu');
    }

    // ========================
    // Statistik Aduan
    // ========================
    public function count_aduan() {
        return $this->db->count_all('aduan');
    }

    public function count_aduan_proses() {
        $this->db->where('status', 'proses');
        return $this->db->count_all_results('aduan');
    }

    // ========================
    // Buku Tamu CRUD
    // ========================
    public function get_tamu() {
        return $this->db->get('buku_tamu')->result();
    }

    public function get_tamu_by_id($id) {
        return $this->db->get_where('buku_tamu', ['id' => $id])->row();
    }

    public function insert_tamu($data) {
        return $this->db->insert('buku_tamu', $data);
    }

    public function update_tamu($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('buku_tamu', $data);
    }

    public function delete_tamu($id) {
        $this->db->where('id', $id);
        return $this->db->delete('buku_tamu');
    }

    // ========================
    // Aduan
    // ========================
    public function get_aduan() {
        return $this->db->get('aduan')->result();
    }

    // Method untuk get data tamu dengan filter
    public function get_tamu_with_filter($date_range) {
        $this->db->from('buku_tamu');
        
        if ($date_range['start'] && $date_range['end']) {
            $this->db->where('timestamp >=', $date_range['start']);
            $this->db->where('timestamp <=', $date_range['end']);
        }
        
        return $this->db->get()->result();
    }

    // Method untuk get available years
    public function get_available_years() {
        $this->db->select('YEAR(timestamp) as tahun');
        $this->db->from('buku_tamu');
        $this->db->group_by('YEAR(timestamp)');
        $this->db->order_by('tahun', 'DESC');
        
        $result = $this->db->get()->result();
        
        $years = [];
        foreach ($result as $row) {
            $years[] = $row->tahun;
        }
        
        return !empty($years) ? $years : [date('Y')];
    }

    /**
 * Get data kepuasan masyarakat untuk tahun tertentu - untuk dashboard admin
 */
public function get_kepuasan_tahun_ini($tahun) {
    // Query untuk total responden tahun berjalan
    $this->db->where('YEAR(timestamp)', $tahun);
    $total_responden = $this->db->count_all_results('buku_tamu_backup');
    
    // Jika tidak ada data, return 0
    if ($total_responden == 0) {
        return [
            'total_responden' => 0,
            'nilai_ikm' => 0,
            'grade_mutu' => 'D (Kurang)'
        ];
    }
    
    // Query untuk menghitung nilai IKM
    $this->db->select('
        AVG(pendapat_pelayanan) as pelayanan,
        AVG(pemahaman_prosedur) as prosedur, 
        AVG(pendapat_kecepatan) as kecepatan,
        AVG(pendapat_biaya) as biaya,
        AVG(pendapat_produk) as produk,
        AVG(pendapat_kompetensi) as kompetensi,
        AVG(pendapat_perilaku) as perilaku,
        AVG(pendapat_pengaduan) as pengaduan,
        AVG(pendapat_kualitas) as kualitas
    ');
    $this->db->where('YEAR(timestamp)', $tahun);
    $query = $this->db->get('buku_tamu_backup');
    $rata_rata = $query->row_array();
    
    // Hitung nilai IKM total
    $total_nilai = 0;
    $jumlah_aspek = 0;
    
    foreach ($rata_rata as $nilai) {
        if ($nilai !== null && $nilai > 0) {
            $total_nilai += $nilai;
            $jumlah_aspek++;
        }
    }
    
    $nilai_ikm = $jumlah_aspek > 0 ? $total_nilai / $jumlah_aspek : 0;
    
    // Hitung grade mutu
    $grade_mutu = $this->hitung_grade_mutu($nilai_ikm);
    
    return [
        'total_responden' => $total_responden,
        'nilai_ikm' => $nilai_ikm,
        'grade_mutu' => $grade_mutu
    ];
}

    /**
     * Hitung grade mutu berdasarkan nilai IKM
     */
    private function hitung_grade_mutu($nilai_ikm) {
        if ($nilai_ikm >= 3.5324) {
            return 'A (Sangat Baik)';
        } elseif ($nilai_ikm >= 3.0644) {
            return 'B (Baik)';
        } elseif ($nilai_ikm >= 2.60) {
            return 'C (Cukup)';
        } else {
            return 'D (Kurang)';
        }
    }

    /**
     * Method untuk debug data
     */
    public function debug_database() {
        // Total semua data
        $total_all = $this->db->count_all('buku_tamu_backup');
        
        // Data per tahun
        $this->db->select('YEAR(timestamp) as tahun, COUNT(*) as total');
        $this->db->group_by('YEAR(timestamp)');
        $this->db->order_by('tahun', 'DESC');
        $tahun_data = $this->db->get('buku_tamu_backup')->result_array();
        
        // Sample data
        $this->db->select('id, timestamp, nama, pendapat_pelayanan');
        $this->db->limit(5);
        $this->db->order_by('timestamp', 'DESC');
        $sample = $this->db->get('buku_tamu_backup')->result_array();
        
        return [
            'total_all' => $total_all,
            'tahun_data' => $tahun_data,
            'sample' => $sample
        ];
    }

    public function test_koneksi_database() {
        // Test tabel layanan_permintaan_data
        $total_records = $this->db->count_all('layanan_permintaan_data');
        
        // Data per tahun
        $this->db->select('YEAR(diterima_ppid) as tahun, COUNT(*) as total');
        $this->db->group_by('YEAR(diterima_ppid)');
        $this->db->order_by('tahun', 'DESC');
        $data_per_tahun = $this->db->get('layanan_permintaan_data')->result_array();
        
        // 5 data terbaru
        $this->db->order_by('nomor', 'DESC');
        $this->db->limit(5);
        $data_terbaru = $this->db->get('layanan_permintaan_data')->result_array();
        
        return [
            'total_records' => $total_records,
            'data_per_tahun' => $data_per_tahun,
            'data_terbaru' => $data_terbaru
        ];
    }

        /**
     * Get data kepuasan masyarakat untuk tahun tertentu - VERSI UPDATE
     */
    public function get_data_kepuasan_tahun($tahun) {
        // Query untuk total responden tahun berjalan
        $this->db->where('YEAR(timestamp)', $tahun);
        $total_responden = $this->db->count_all_results('buku_tamu_backup');
        
        // Jika tidak ada data, return 0
        if ($total_responden == 0) {
            return [
                'total_responden' => 0,
                'nilai_ikm' => 0,
                'grade_mutu' => 'D (Kurang)'
            ];
        }
        
        // Query untuk menghitung nilai IKM
        $this->db->select('
            AVG(pendapat_pelayanan) as pelayanan,
            AVG(pemahaman_prosedur) as prosedur, 
            AVG(pendapat_kecepatan) as kecepatan,
            AVG(pendapat_biaya) as biaya,
            AVG(pendapat_produk) as produk,
            AVG(pendapat_kompetensi) as kompetensi,
            AVG(pendapat_perilaku) as perilaku,
            AVG(pendapat_pengaduan) as pengaduan,
            AVG(pendapat_kualitas) as kualitas
        ');
        $this->db->where('YEAR(timestamp)', $tahun);
        $query = $this->db->get('buku_tamu_backup');
        $rata_rata = $query->row_array();
        
        // Hitung nilai IKM total
        $total_nilai = 0;
        $jumlah_aspek = 0;
        
        foreach ($rata_rata as $nilai) {
            if ($nilai !== null && $nilai > 0) {
                $total_nilai += $nilai;
                $jumlah_aspek++;
            }
        }
        
        $nilai_ikm = $jumlah_aspek > 0 ? $total_nilai / $jumlah_aspek : 0;
        
        // Hitung grade mutu
        $grade_mutu = $this->hitung_nilai_mutu($nilai_ikm);
        
        return [
            'total_responden' => $total_responden,
            'nilai_ikm' => $nilai_ikm,
            'grade_mutu' => $grade_mutu
        ];
    }

    /**
     * Hitung grade mutu berdasarkan nilai IKM
     */
    private function hitung_nilai_mutu($nilai_ikm) {
        if ($nilai_ikm >= 3.5324) {
            return 'A (Sangat Baik)';
        } elseif ($nilai_ikm >= 3.0644) {
            return 'B (Baik)';
        } elseif ($nilai_ikm >= 2.60) {
            return 'C (Cukup)';
        } else {
            return 'D (Kurang)';
        }
    }

    /**
     * Method BARU untuk mendapatkan ringkasan statistik permintaan
     */
    public function get_ringkasan_statistik_permintaan() {
        $statistik = [];
        
        // Total semua permintaan
        $statistik['total'] = $this->db->count_all('layanan_permintaan_data');
        
        // Permintaan bulan ini
        $this->db->where('MONTH(diterima_ppid)', date('m'));
        $this->db->where('YEAR(diterima_ppid)', date('Y'));
        $statistik['bulan_ini'] = $this->db->count_all_results('layanan_permintaan_data');
        
        // Permintaan tahun ini
        $this->db->where('YEAR(diterima_ppid)', date('Y'));
        $statistik['tahun_ini'] = $this->db->count_all_results('layanan_permintaan_data');
        
        return $statistik;
    }

        // ========================
    // PERMINTAAN DATA
    // ========================

    /**
 * Method untuk dashboard permintaan data (halaman lengkap)
 */
public function permintaan_data() {
    $tahun_ini = date('Y');
    
    // Data statistik permintaan data TAHUN INI
    $data['permintaan'] = $this->hitung_statistik_permintaan_lengkap($tahun_ini);
    
    // Data untuk chart TAHUN INI
    $data['chart_bulanan'] = $this->get_data_permintaan_per_bulan($tahun_ini);
    $data['chart_status_pemohon'] = $this->get_data_permintaan_by_pemohon($tahun_ini);
    $data['chart_via'] = $this->get_data_permintaan_by_channel($tahun_ini);
    
    // Data daftar permintaan TAHUN INI
    $data['daftar_permintaan'] = $this->get_daftar_permintaan_tahun($tahun_ini);
    
    // Load view
    $this->load->view('admin/v_permintaan_data', $data);
}

/**
 * Method untuk statistik lengkap dengan tahun parameter
 */
private function hitung_statistik_permintaan_lengkap($tahun) {
    // Total permohonan TAHUN TERPILIH
    $this->db->where('YEAR(diterima_ppid)', $tahun);
    $total_permohonan = $this->db->count_all_results('layanan_permintaan_data');
    
    // Dalam proses TAHUN TERPILIH
    $this->db->where('YEAR(diterima_ppid)', $tahun);
    $this->db->where_in('status', ['Dalam Proses', 'proses']);
    $dalam_proses = $this->db->count_all_results('layanan_permintaan_data');
    
    // Dipenuhi TAHUN TERPILIH
    $this->db->where('YEAR(diterima_ppid)', $tahun);
    $this->db->where('status', 'selesai');
    $dipenuhi = $this->db->count_all_results('layanan_permintaan_data');
    
    // Ditolak TAHUN TERPILIH
    $this->db->where('YEAR(diterima_ppid)', $tahun);
    $this->db->where('status', 'Ditolak');
    $ditolak = $this->db->count_all_results('layanan_permintaan_data');
    
    // Telah Diterima TAHUN TERPILIH
    $this->db->where('YEAR(diterima_ppid)', $tahun);
    $this->db->where('status', 'Telah Diterima');
    $telah_diterima = $this->db->count_all_results('layanan_permintaan_data');
    
    // Hitung persentase
    $persen_proses = $total_permohonan > 0 ? round(($dalam_proses / $total_permohonan) * 100, 1) : 0;
    $persen_dipenuhi = $total_permohonan > 0 ? round(($dipenuhi / $total_permohonan) * 100, 1) : 0;
    $persen_ditolak = $total_permohonan > 0 ? round(($ditolak / $total_permohonan) * 100, 1) : 0;
    
    // Trend bulanan
    $trend = $this->hitung_trend_permintaan_bulanan($tahun);
    
    return [
        'total_permohonan' => $total_permohonan,
        'dalam_proses' => $dalam_proses,
        'dipenuhi' => $dipenuhi,
        'ditolak' => $ditolak,
        'telah_diterima' => $telah_diterima,
        'persen_proses' => $persen_proses,
        'persen_dipenuhi' => $persen_dipenuhi,
        'persen_ditolak' => $persen_ditolak,
        'trend' => $trend,
        'tahun' => $tahun
    ];
}

/**
 * Method untuk mendapatkan daftar permintaan berdasarkan tahun
 */
private function get_daftar_permintaan_tahun($tahun) {
    $this->db->where('YEAR(diterima_ppid)', $tahun);
    $this->db->order_by('diterima_ppid', 'DESC');
    $this->db->order_by('nomor', 'DESC');
    return $this->db->get('layanan_permintaan_data')->result_array();
}

/**
 * Update method chart dengan parameter tahun
 */
private function get_data_permintaan_by_pemohon($tahun = null) {
    if ($tahun === null) {
        $tahun = date('Y');
    }
    
    $this->db->where('YEAR(diterima_ppid)', $tahun);
    $this->db->select('status_pemohon, COUNT(*) as total');
    $this->db->group_by('status_pemohon');
    $this->db->order_by('total', 'DESC');
    return $this->db->get('layanan_permintaan_data')->result_array();
}

private function get_data_permintaan_by_channel($tahun = null) {
    if ($tahun === null) {
        $tahun = date('Y');
    }
    
    $this->db->where('YEAR(diterima_ppid)', $tahun);
    $this->db->select('via, COUNT(*) as total');
    $this->db->group_by('via');
    $this->db->order_by('total', 'DESC');
    return $this->db->get('layanan_permintaan_data')->result_array();
}

    // ========================
    // PENGADUAN MASYARAKAT
    // ========================

    /**
     * Get statistik pengaduan masyarakat
     */
    public function get_statistik_pengaduan() {
        $tahun_ini = date('Y');
        
        // Total pengaduan TAHUN INI
        $this->db->where('YEAR(diterima_ppid)', $tahun_ini);
        $total_pengaduan = $this->db->count_all_results('layanan_pengaduan');
        
        // Dalam proses (status: 'proses') TAHUN INI
        $this->db->where('YEAR(diterima_ppid)', $tahun_ini);
        $this->db->where('status', 'proses');
        $dalam_proses = $this->db->count_all_results('layanan_pengaduan');
        
        // Selesai (status: 'selesai') TAHUN INI
        $this->db->where('YEAR(diterima_ppid)', $tahun_ini);
        $this->db->where('status', 'selesai');
        $selesai = $this->db->count_all_results('layanan_pengaduan');
        
        // Ditolak (status: 'Ditolak') TAHUN INI
        $this->db->where('YEAR(diterima_ppid)', $tahun_ini);
        $this->db->where('status', 'Ditolak');
        $ditolak = $this->db->count_all_results('layanan_pengaduan');
        
        // Hitung persentase
        $persen_proses = $total_pengaduan > 0 ? round(($dalam_proses / $total_pengaduan) * 100, 1) : 0;
        $persen_selesai = $total_pengaduan > 0 ? round(($selesai / $total_pengaduan) * 100, 1) : 0;
        $persen_ditolak = $total_pengaduan > 0 ? round(($ditolak / $total_pengaduan) * 100, 1) : 0;
        
        // Trend
        $trend = $this->hitung_trend_pengaduan();
        
        return [
            'total_pengaduan' => $total_pengaduan,
            'dalam_proses' => $dalam_proses,
            'selesai' => $selesai,
            'ditolak' => $ditolak,
            'persen_proses' => $persen_proses,
            'persen_selesai' => $persen_selesai,
            'persen_ditolak' => $persen_ditolak,
            'trend' => $trend,
            'tahun' => $tahun_ini
        ];
    }

    /**
     * Hitung trend pengaduan (tahun ini vs tahun lalu)
     */
    private function hitung_trend_pengaduan() {
        $tahun_ini = date('Y');
        $tahun_lalu = $tahun_ini - 1;
        
        // Hitung pengaduan tahun ini
        $this->db->where('YEAR(diterima_ppid)', $tahun_ini);
        $tahun_ini_count = $this->db->count_all_results('layanan_pengaduan');
        
        // Hitung pengaduan tahun lalu
        $this->db->where('YEAR(diterima_ppid)', $tahun_lalu);
        $tahun_lalu_count = $this->db->count_all_results('layanan_pengaduan');
        
        if ($tahun_lalu_count == 0) {
            return $tahun_ini_count > 0 ? "+100%" : "+0%";
        }
        
        $persentase = (($tahun_ini_count - $tahun_lalu_count) / $tahun_lalu_count) * 100;
        $trend = $persentase >= 0 ? "+" . round($persentase, 1) . "%" : round($persentase, 1) . "%";
        
        return $trend;
    }

    /**
     * Get data pengaduan per bulan untuk chart
     */
    public function get_pengaduan_per_bulan($tahun = null) {
        if ($tahun === null) {
            $tahun = date('Y');
        }
        
        $this->db->select('MONTH(diterima_ppid) as bulan, COUNT(*) as total');
        $this->db->where('YEAR(diterima_ppid)', $tahun);
        $this->db->group_by('MONTH(diterima_ppid)');
        $this->db->order_by('bulan', 'ASC');
        $result = $this->db->get('layanan_pengaduan')->result_array();
        
        // Format data untuk chart
        $data_chart = [];
        $nama_bulan = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        
        for ($i = 1; $i <= 12; $i++) {
            $data_chart[] = [
                'bulan' => $nama_bulan[$i-1],
                'total' => 0
            ];
        }
        
        foreach ($result as $row) {
            $data_chart[$row['bulan']-1]['total'] = (int)$row['total'];
        }
        
        return $data_chart;
    }

    /**
     * Get data pengaduan berdasarkan jenis
     */
    public function get_pengaduan_by_jenis($tahun = null) {
        if ($tahun === null) {
            $tahun = date('Y');
        }
        
        $this->db->where('YEAR(diterima_ppid)', $tahun);
        $this->db->select('jenis, COUNT(*) as total');
        $this->db->group_by('jenis');
        $this->db->order_by('total', 'DESC');
        return $this->db->get('layanan_pengaduan')->result_array();
    }

    /**
     * Get data pengaduan berdasarkan via
     */
    public function get_pengaduan_by_channel($tahun = null) {
        if ($tahun === null) {
            $tahun = date('Y');
        }
        
        $this->db->where('YEAR(diterima_ppid)', $tahun);
        $this->db->select('via, COUNT(*) as total');
        $this->db->group_by('via');
        $this->db->order_by('total', 'DESC');
        return $this->db->get('layanan_pengaduan')->result_array();
    }

    /**
     * Get semua data pengaduan
     */
    public function get_all_pengaduan($limit = null, $offset = null) {
        $this->db->order_by('diterima_ppid', 'DESC');
        $this->db->order_by('no', 'DESC');
        
        if ($limit !== null) {
            $this->db->limit($limit, $offset);
        }
        
        return $this->db->get('layanan_pengaduan')->result_array();
    }

    /**
     * Get detail pengaduan by ID
     */
    public function get_pengaduan_by_id($id) {
        $this->db->where('no', $id);
        return $this->db->get('layanan_pengaduan')->row_array();
    }

    /**
     * Get pengaduan dengan filter
     */
    public function get_pengaduan_with_filter($filters = []) {
        if (!empty($filters['status'])) {
            $this->db->where('status', $filters['status']);
        }
        
        if (!empty($filters['tahun'])) {
            $this->db->where('YEAR(diterima_ppid)', $filters['tahun']);
        }
        
        if (!empty($filters['bulan'])) {
            $this->db->where('MONTH(diterima_ppid)', $filters['bulan']);
        }
        
        if (!empty($filters['jenis'])) {
            $this->db->where('jenis', $filters['jenis']);
        }
        
        $this->db->order_by('diterima_ppid', 'DESC');
        return $this->db->get('layanan_pengaduan')->result_array();
    }

    /**
     * Get available years dari data pengaduan
     */
    public function get_available_years_pengaduan() {
        $this->db->select('YEAR(diterima_ppid) as tahun');
        $this->db->from('layanan_pengaduan');
        $this->db->group_by('YEAR(diterima_ppid)');
        $this->db->order_by('tahun', 'DESC');
        
        $result = $this->db->get()->result();
        
        $years = [];
        foreach ($result as $row) {
            $years[] = $row->tahun;
        }
        
        return !empty($years) ? $years : [date('Y')];
    }

    /**
     * Get unique jenis pengaduan
     */
    public function get_unique_jenis_pengaduan() {
        $this->db->select('jenis');
        $this->db->from('layanan_pengaduan');
        $this->db->group_by('jenis');
        $this->db->order_by('jenis', 'ASC');
        
        $result = $this->db->get()->result();
        
        $jenis = [];
        foreach ($result as $row) {
            $jenis[] = $row->jenis;
        }
        
        return $jenis;
    }

    /**
     * Update status pengaduan
     */
    public function update_status_pengaduan($id, $data) {
        $this->db->where('no', $id);
        return $this->db->update('layanan_pengaduan', $data);
    }

    /**
     * Add new pengaduan
     */
    public function add_pengaduan($data) {
        return $this->db->insert('layanan_pengaduan', $data);
    }

    /**
     * Delete pengaduan
     */
    public function delete_pengaduan($id) {
        $this->db->where('no', $id);
        return $this->db->delete('layanan_pengaduan');
    }
}