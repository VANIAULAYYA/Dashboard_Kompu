<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('M_admin');
        if(!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
    }

    // Di Controller Admin
 public function index() {
    $tahun_ini = date('Y');
    
    // Data Kepuasan Masyarakat Tahun Berjalan
    $data['kepuasan_tahun_ini'] = $this->M_admin->get_data_kepuasan_tahun($tahun_ini);
    
    // Data Permintaan untuk dashboard
    $data['permintaan'] = $this->hitung_statistik_permintaan_data();
    
    // Data Pengaduan untuk dashboard
    $data['pengaduan'] = $this->M_admin->get_statistik_pengaduan();
    
    // Load view
    $this->load->view('admin/v_admin', $data);
}

    /**
     * Method untuk testing koneksi database
     */
    public function test_db() {
        $test_result = $this->M_admin->test_koneksi();
        
        echo "<pre>";
        echo "=== TEST KONEKSI DATABASE ===\n\n";
        
        echo "Total Records: " . $test_result['total_records'] . "\n\n";
        
        echo "Data per Tahun:\n";
        foreach ($test_result['data_per_tahun'] as $tahun) {
            echo "- Tahun " . $tahun['tahun'] . ": " . $tahun['total'] . " records\n";
        }
        
        echo "\n5 Data Terbaru:\n";
        foreach ($test_result['data_terbaru'] as $data) {
            echo "- ID: " . $data['id'] . ", Nama: " . $data['nama'] . ", Tanggal: " . $data['timestamp'] . "\n";
        }
        
        echo "\n=== TEST DATA KEPUASAN TAHUN INI ===\n";
        $tahun_ini = date('Y');
        $kepuasan = $this->M_admin->get_kepuasan_tahun_ini($tahun_ini);
        print_r($kepuasan);
        
        echo "</pre>";
    }

    /**
     * Method untuk debugging data kepuasan
     */
    public function debug_kepuasan() {
        $tahun_ini = date('Y');
        $data = $this->M_admin->get_kepuasan_tahun_ini($tahun_ini);
        
        echo "<pre>";
        echo "=== DEBUG DATA KEPUASAN TAHUN " . $tahun_ini . " ===\n\n";
        echo "Total Responden: " . $data['total_responden'] . "\n";
        echo "Nilai IKM: " . number_format($data['nilai_ikm'], 4) . "\n";
        echo "Grade Mutu: " . $data['grade_mutu'] . "\n";
        echo "</pre>";
    }

private function get_kepuasan_tahun_ini($tahun)
{
    // Query untuk total responden tahun berjalan
    $this->db->where('YEAR(timestamp)', $tahun);
    $total_responden = $this->db->count_all_results('buku_tamu');
    
    // Query untuk menghitung nilai IKM (rata-rata semua aspek penilaian)
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
    $rata_rata = $this->db->get('buku_tamu')->row_array();
    
    // Hitung nilai IKM total (rata-rata dari semua aspek)
    $total_nilai = 0;
    $jumlah_aspek = 0;
    
    foreach ($rata_rata as $nilai) {
        if ($nilai !== null) {
            $total_nilai += $nilai;
            $jumlah_aspek++;
        }
    }
    
    $nilai_ikm = $jumlah_aspek > 0 ? $total_nilai / $jumlah_aspek : 0;
    
    // Hitung grade mutu berdasarkan nilai IKM
    $grade_mutu = $this->hitung_grade_mutu($nilai_ikm);
    
    return [
        'total_responden' => $total_responden,
        'nilai_ikm' => $nilai_ikm,
        'grade_mutu' => $grade_mutu
    ];
}

private function hitung_grade_mutu($nilai_ikm)
{
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
 * Method untuk mendapatkan statistik permintaan data (untuk dashboard utama) - BERDASARKAN TAHUN BERJALAN
 */
/**
 * Method untuk mendapatkan statistik permintaan data (untuk dashboard utama) - BERDASARKAN TAHUN BERJALAN
 */
private function hitung_statistik_permintaan_data() {
    $tahun_ini = date('Y');
    
    // Total permohonan TAHUN INI
    $this->db->where('YEAR(diterima_ppid)', $tahun_ini);
    $total_permohonan = $this->db->count_all_results('layanan_permintaan_data');
    
    // Dalam proses (status: 'Dalam Proses', 'proses') TAHUN INI
    $this->db->where('YEAR(diterima_ppid)', $tahun_ini);
    $this->db->where_in('status', ['Dalam Proses', 'proses']);
    $dalam_proses = $this->db->count_all_results('layanan_permintaan_data');
    
    // TERPENUHI - AMBIL SEMUA STATUS YANG MENANDAKAN TERPENUHI (konsisten dengan method lengkap)
    $this->db->where('YEAR(diterima_ppid)', $tahun_ini);
    $this->db->where_in('status', ['selesai', 'Selesai', 'terpenuhi', 'Terpenuhi', 'dipenuhi', 'Dipenuhi', 'Telah Diterima']);
    $dipenuhi = $this->db->count_all_results('layanan_permintaan_data');
    
    // Hitung persentase
    $persen_proses = $total_permohonan > 0 ? round(($dalam_proses / $total_permohonan) * 100, 1) : 0;
    $persen_dipenuhi = $total_permohonan > 0 ? round(($dipenuhi / $total_permohonan) * 100, 1) : 0;
    
    // Trend - bandingkan dengan tahun lalu
    $trend = $this->hitung_trend_permintaan_tahunan();
    
    return [
        'total_permohonan' => $total_permohonan,
        'dalam_proses' => $dalam_proses,
        'dipenuhi' => $dipenuhi,
        'persen_proses' => $persen_proses,
        'persen_dipenuhi' => $persen_dipenuhi,
        'trend' => $trend
    ];
}

/**
 * Method untuk menghitung trend permintaan (tahun ini vs tahun lalu)
 */
private function hitung_trend_permintaan_tahunan() {
    $tahun_ini = date('Y');
    $tahun_lalu = $tahun_ini - 1;
    
    // Hitung permintaan tahun ini
    $this->db->where('YEAR(diterima_ppid)', $tahun_ini);
    $tahun_ini_count = $this->db->count_all_results('layanan_permintaan_data');
    
    // Hitung permintaan tahun lalu
    $this->db->where('YEAR(diterima_ppid)', $tahun_lalu);
    $tahun_lalu_count = $this->db->count_all_results('layanan_permintaan_data');
    
    if ($tahun_lalu_count == 0) {
        return $tahun_ini_count > 0 ? "+100%" : "+0%";
    }
    
    $persentase = (($tahun_ini_count - $tahun_lalu_count) / $tahun_lalu_count) * 100;
    $trend = $persentase >= 0 ? "+" . round($persentase, 1) . "%" : round($persentase, 1) . "%";
    
    return $trend;
}

    /**
     * Method untuk dashboard pengaduan masyarakat
     */
    public function pengaduan_masyarakat() {
        $tahun_ini = date('Y');
        
        // Data statistik pengaduan TAHUN INI
        $data['pengaduan'] = $this->hitung_statistik_pengaduan_lengkap($tahun_ini);
        
        // Data untuk chart TAHUN INI
        $data['chart_bulanan'] = $this->M_admin->get_pengaduan_per_bulan($tahun_ini);
        $data['chart_jenis'] = $this->M_admin->get_pengaduan_by_jenis($tahun_ini);
        $data['chart_via'] = $this->M_admin->get_pengaduan_by_channel($tahun_ini);
        
        // Data daftar pengaduan TAHUN INI
        $data['daftar_pengaduan'] = $this->get_daftar_pengaduan_tahun($tahun_ini);
        
        // Load view
        $this->load->view('admin/v_pengaduan_masyarakat', $data);
    }

    /**
     * Method untuk statistik pengaduan lengkap
     */
    private function hitung_statistik_pengaduan_lengkap($tahun) {
        // Total pengaduan TAHUN TERPILIH
        $this->db->where('YEAR(diterima_ppid)', $tahun);
        $total_pengaduan = $this->db->count_all_results('layanan_pengaduan');
        
        // Dalam proses TAHUN TERPILIH
        $this->db->where('YEAR(diterima_ppid)', $tahun);
        $this->db->where('status', 'proses');
        $dalam_proses = $this->db->count_all_results('layanan_pengaduan');
        
        // Selesai TAHUN TERPILIH
        $this->db->where('YEAR(diterima_ppid)', $tahun);
        $this->db->where('status', 'selesai');
        $selesai = $this->db->count_all_results('layanan_pengaduan');
        
        // Ditolak TAHUN TERPILIH
        $this->db->where('YEAR(diterima_ppid)', $tahun);
        $this->db->where('status', 'Ditolak');
        $ditolak = $this->db->count_all_results('layanan_pengaduan');
        
        // Hitung persentase
        $persen_proses = $total_pengaduan > 0 ? round(($dalam_proses / $total_pengaduan) * 100, 1) : 0;
        $persen_selesai = $total_pengaduan > 0 ? round(($selesai / $total_pengaduan) * 100, 1) : 0;
        $persen_ditolak = $total_pengaduan > 0 ? round(($ditolak / $total_pengaduan) * 100, 1) : 0;
        
        // Trend
        $trend = $this->hitung_trend_pengaduan_tahunan($tahun);
        
        return [
            'total_pengaduan' => $total_pengaduan,
            'dalam_proses' => $dalam_proses,
            'selesai' => $selesai,
            'ditolak' => $ditolak,
            'persen_proses' => $persen_proses,
            'persen_selesai' => $persen_selesai,
            'persen_ditolak' => $persen_ditolak,
            'trend' => $trend,
            'tahun' => $tahun
        ];
    }

    /**
     * Method untuk mendapatkan daftar pengaduan berdasarkan tahun
     */
    private function get_daftar_pengaduan_tahun($tahun) {
        $this->db->where('YEAR(diterima_ppid)', $tahun);
        $this->db->order_by('diterima_ppid', 'ASC');
        $this->db->order_by('no', 'ASC');
        return $this->db->get('layanan_pengaduan')->result_array();
    }

    /**
     * Method untuk trend pengaduan tahunan
     */
    private function hitung_trend_pengaduan_tahunan($tahun) {
        $tahun_lalu = $tahun - 1;
        
        // Hitung pengaduan tahun ini
        $this->db->where('YEAR(diterima_ppid)', $tahun);
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
     * Method untuk debugging data pengaduan
     */
    public function debug_pengaduan() {
        $data = $this->M_admin->get_statistik_pengaduan();
        
        echo "<pre>";
        echo "=== DEBUG DATA PENGADUAN ===\n\n";
        print_r($data);
        
        echo "\n=== DETAIL STATUS ===\n";
        $this->db->select('status, COUNT(*) as total');
        $this->db->group_by('status');
        $status_detail = $this->db->get('layanan_pengaduan')->result_array();
        
        foreach ($status_detail as $status) {
            echo "- Status '" . $status['status'] . "': " . $status['total'] . " records\n";
        }
        
        echo "\n=== 10 DATA TERBARU ===\n";
        $this->db->order_by('no', 'ASC');
        $this->db->limit(10);
        $data_terbaru = $this->db->get('layanan_pengaduan')->result_array();
        
        foreach ($data_terbaru as $data) {
            echo "- No: " . $data['no'] . ", Pengirim: " . $data['pengirim'] . 
                 ", Jenis: " . $data['jenis'] . ", Status: " . $data['status'] . 
                 ", Tanggal: " . $data['diterima_ppid'] . "\n";
        }
        echo "</pre>";
    }

    // ========= REKAP BUKU TAMU =========
    
    // 📖 Rekap Buku Tamu
    public function rekap_tamu() {
        $data = [
            'title' => 'Kelola Buku Tamu',
            'tamu' => $this->M_admin->get_tamu(),
            'tahun_available' => $this->M_admin->get_available_years(),
            'tahun_selected' => date('Y'),
            'jenis_periode' => 'semua',
            'periode_selected' => 'semua',
            'periode_label' => 'Semua Data',
            'content' => 'admin/v_buku_tamu_2'
        ];
        $this->load->view('admin/v_buku_tamu_2', $data);
    }

    // ➕ Form Tambah Tamu
    public function tambah_tamu() {
        $this->load->view('admin/v_rekap_tamu_form');
    }

    // 💾 Simpan Tamu Baru
    public function simpan_tamu() {
        $data = [
            'nama'           => $this->input->post('nama'),
            'jenis_kelamin'  => $this->input->post('jenis_kelamin'),
            'asal_instansi'  => $this->input->post('asal_instansi'),
            'no_handphone'   => $this->input->post('no_handphone'),
            'keperluan'      => $this->input->post('keperluan'),
            'kritik_saran'   => $this->input->post('kritik_saran'),
        ];
        $this->M_admin->insert_tamu($data);
        redirect('Admin/rekap_tamu');
    }

    // ✏️ Form Edit Tamu
    public function edit_tamu($id) {
        $data['tamu'] = $this->M_admin->get_tamu_by_id($id);
        $this->load->view('admin/v_rekap_tamu_edit', $data);
    }

    // 🔄 Update Tamu
    public function update_tamu() {
        $id = $this->input->post('id');
        
        $data = [
            'nama'           => $this->input->post('nama'),
            'jenis_kelamin'  => $this->input->post('jenis_kelamin'),
            'asal_instansi'  => $this->input->post('asal_instansi'),
            'no_handphone'   => $this->input->post('no_handphone'),
            'keperluan'      => $this->input->post('keperluan'),
            'kritik_saran'   => $this->input->post('kritik_saran'),
        ];
        
        $this->M_admin->update_tamu($id, $data);
        redirect('Admin/rekap_tamu');
    }

    // 🗑️ Delete Tamu
    public function delete_tamu($id) {
        $this->M_admin->delete_tamu($id);
        redirect('Admin/rekap_tamu');
    }

    // ========= HALAMAN REKAP TAMU DENGAN FILTER =========
    public function rekap_tamu_filter() {
        // Ambil parameter filter
        $jenis_periode = $this->input->get('jenis_periode') ? $this->input->get('jenis_periode') : 'triwulan';
        $periode = $this->input->get('periode') ? $this->input->get('periode') : 'triwulan1';
        $tahun = $this->input->get('tahun') ? $this->input->get('tahun') : date('Y');
        
        // Ambil tahun yang tersedia dari database
        $tahun_available = $this->M_admin->get_available_years();
        
        // Handle date range - GUNAKAN FUNGSI YANG SAMA
        if ($jenis_periode == 'semua') {
            $date_range = ['start' => null, 'end' => null, 'label' => 'Semua Data'];
            $periode = 'semua';
            $tahun = 'semua';
        } elseif ($jenis_periode == 'tahunan') {
            $periode = 'tahunan';
            $tahun_for_range = ($tahun == 'semua') ? null : $tahun;
            $date_range = $this->get_date_range($periode, $tahun_for_range);
        } else {
            $tahun_for_range = ($tahun == 'semua') ? null : $tahun;
            $date_range = $this->get_date_range($periode, $tahun_for_range);
        }
        
        // Get data dengan filter - TAMPILKAN SEMUA DATA
        $data = [
            'title' => 'Rekap Buku Tamu',
            'tamu' => $this->M_admin->get_tamu_with_filter($date_range),
            'tahun_available' => $tahun_available,
            'tahun_selected' => $tahun,
            'jenis_periode' => $jenis_periode,
            'periode_selected' => $periode,
            'periode_label' => $date_range['label'],
            'content' => 'admin/v_buku_tamu_2'
        ];
        
        $this->load->view('admin/v_buku_tamu_2', $data);
    }

    // ========= LAYANAN KEPUASAN =========
    public function layanan_kepuasan() {
        $data = [
            'title' => 'Layanan Kepuasan Masyarakat',
            'tamu' => $this->M_admin->get_tamu(), // Tetap pakai get_tamu() karena tabel sama
            'tahun_available' => $this->M_admin->get_available_years(),
            'tahun_selected' => date('Y'),
            'jenis_periode' => 'semua',
            'periode_selected' => 'semua',
            'periode_label' => 'Semua Data',
            'content' => 'admin/v_layanan_kepuasan'
        ];
        $this->load->view('admin/v_layanan_kepuasan', $data);
    }

    // 💾 SIMPAN DATA LAYANAN KEPUASAN
    public function simpan_layanan_kepuasan() {
        $data = [
            'nama'           => $this->input->post('nama'),
            'jenis_kelamin'  => $this->input->post('jenis_kelamin'),
            'asal_instansi'  => $this->input->post('asal_instansi'),
            'no_handphone'   => $this->input->post('no_handphone'),
            'keperluan'      => $this->input->post('keperluan'),
            'kritik_saran'   => $this->input->post('kritik_saran'),
            'pendapat_pelayanan'  => $this->input->post('pendapat_pelayanan'),
            'pemahaman_prosedur'  => $this->input->post('pemahaman_prosedur'),
            'pendapat_kecepatan'   => $this->input->post('pendapat_kecepatan'),
            'pendapat_biaya'      => $this->input->post('pendapat_biaya'),
            'pendapat_produk'   => $this->input->post('pendapat_produk'),
            'pendapat_kompetensi'  => $this->input->post('pendapat_kompetensi'),
            'pendapat_perilaku'  => $this->input->post('pendapat_perilaku'),
            'pendapat_pengaduan'   => $this->input->post('pendapat_pengaduan'),
            'pendapat_kualitas'      => $this->input->post('pendapat_kualitas'),
        ];
        $this->M_admin->insert_tamu($data);
        redirect('Admin/layanan_kepuasan');
    }

    // 🔄 UPDATE DATA LAYANAN KEPUASAN
    public function update_layanan_kepuasan() {
        $id = $this->input->post('id');
        
        $data = [
            'nama'           => $this->input->post('nama'),
            'jenis_kelamin'  => $this->input->post('jenis_kelamin'),
            'asal_instansi'  => $this->input->post('asal_instansi'),
            'no_handphone'   => $this->input->post('no_handphone'),
            'keperluan'      => $this->input->post('keperluan'),
            'kritik_saran'   => $this->input->post('kritik_saran'),
            'pendapat_pelayanan'  => $this->input->post('pendapat_pelayanan'),
            'pemahaman_prosedur'  => $this->input->post('pemahaman_prosedur'),
            'pendapat_kecepatan'   => $this->input->post('pendapat_kecepatan'),
            'pendapat_biaya'      => $this->input->post('pendapat_biaya'),
            'pendapat_produk'   => $this->input->post('pendapat_produk'),
            'pendapat_kompetensi'  => $this->input->post('pendapat_kompetensi'),
            'pendapat_perilaku'  => $this->input->post('pendapat_perilaku'),
            'pendapat_pengaduan'   => $this->input->post('pendapat_pengaduan'),
            'pendapat_kualitas'      => $this->input->post('pendapat_kualitas'),
        ];
        
        $this->M_admin->update_tamu($id, $data);
        redirect('Admin/layanan_kepuasan');
    }

    // 🗑️ DELETE DATA LAYANAN KEPUASAN
    public function delete_layanan_kepuasan($id) {
        $this->M_admin->delete_tamu($id);
        redirect('Admin/layanan_kepuasan');
    }

    // ========= HALAMAN LAYANAN KEPUASAN DENGAN FILTER =========
    public function layanan_kepuasan_filter() {
        // Ambil parameter filter
        $jenis_periode = $this->input->get('jenis_periode') ? $this->input->get('jenis_periode') : 'triwulan';
        $periode = $this->input->get('periode') ? $this->input->get('periode') : 'triwulan1';
        $tahun = $this->input->get('tahun') ? $this->input->get('tahun') : date('Y');
        
        // Ambil tahun yang tersedia dari database
        $tahun_available = $this->M_admin->get_available_years();
        
        // Handle date range
        if ($jenis_periode == 'semua') {
            $date_range = ['start' => null, 'end' => null, 'label' => 'Semua Data'];
            $periode = 'semua';
            $tahun = 'semua';
        } elseif ($jenis_periode == 'tahunan') {
            $periode = 'tahunan';
            $tahun_for_range = ($tahun == 'semua') ? null : $tahun;
            $date_range = $this->get_date_range($periode, $tahun_for_range);
        } else {
            $tahun_for_range = ($tahun == 'semua') ? null : $tahun;
            $date_range = $this->get_date_range($periode, $tahun_for_range);
        }
        
        // Get data dengan filter - TAMPILKAN SEMUA DATA
        $data = [
            'title' => 'Layanan Kepuasan Masyarakat',
            'tamu' => $this->M_admin->get_tamu_with_filter($date_range),
            'tahun_available' => $tahun_available,
            'tahun_selected' => $tahun,
            'jenis_periode' => $jenis_periode,
            'periode_selected' => $periode,
            'periode_label' => $date_range['label'],
            'content' => 'admin/v_layanan_kepuasan'
        ];
        
        $this->load->view('admin/v_layanan_kepuasan', $data);
    }

    // ========= SATU FUNGSI UNTUK SEMUA =========
    /**
     * Fungsi untuk mendapatkan range tanggal berdasarkan periode
     * DIGUNAKAN OLEH REKAP TAMU DAN LAYANAN KEPUASAN
     */
    private function get_date_range($periode, $tahun = null) {
        if ($tahun === null) {
            $tahun = date('Y');
        }
        
        $tahun = intval($tahun);
        
        switch ($periode) {
            // Bulanan
            case 'januari': 
                return ['start' => $tahun.'-01-01', 'end' => $tahun.'-01-31', 'label' => 'Januari '.$tahun];
            case 'februari': 
                $end_day = date('t', strtotime($tahun.'-02-01'));
                return ['start' => $tahun.'-02-01', 'end' => $tahun.'-02-'.$end_day, 'label' => 'Februari '.$tahun];
            case 'maret': 
                return ['start' => $tahun.'-03-01', 'end' => $tahun.'-03-31', 'label' => 'Maret '.$tahun];
            case 'april': 
                return ['start' => $tahun.'-04-01', 'end' => $tahun.'-04-30', 'label' => 'April '.$tahun];
            case 'mei': 
                return ['start' => $tahun.'-05-01', 'end' => $tahun.'-05-31', 'label' => 'Mei '.$tahun];
            case 'juni': 
                return ['start' => $tahun.'-06-01', 'end' => $tahun.'-06-30', 'label' => 'Juni '.$tahun];
            case 'juli': 
                return ['start' => $tahun.'-07-01', 'end' => $tahun.'-07-31', 'label' => 'Juli '.$tahun];
            case 'agustus': 
                return ['start' => $tahun.'-08-01', 'end' => $tahun.'-08-31', 'label' => 'Agustus '.$tahun];
            case 'september': 
                return ['start' => $tahun.'-09-01', 'end' => $tahun.'-09-30', 'label' => 'September '.$tahun];
            case 'oktober': 
                return ['start' => $tahun.'-10-01', 'end' => $tahun.'-10-31', 'label' => 'Oktober '.$tahun];
            case 'november': 
                return ['start' => $tahun.'-11-01', 'end' => $tahun.'-11-30', 'label' => 'November '.$tahun];
            case 'desember': 
                return ['start' => $tahun.'-12-01', 'end' => $tahun.'-12-31', 'label' => 'Desember '.$tahun];
                
            // Triwulan
            case 'triwulan1': 
                return ['start' => $tahun.'-01-01', 'end' => $tahun.'-03-31', 'label' => 'Triwulan I (Jan-Mar) '.$tahun];
            case 'triwulan2': 
                return ['start' => $tahun.'-04-01', 'end' => $tahun.'-06-30', 'label' => 'Triwulan II (Apr-Jun) '.$tahun];
            case 'triwulan3': 
                return ['start' => $tahun.'-07-01', 'end' => $tahun.'-09-30', 'label' => 'Triwulan III (Jul-Sep) '.$tahun];
            case 'triwulan4': 
                return ['start' => $tahun.'-10-01', 'end' => $tahun.'-12-31', 'label' => 'Triwulan IV (Okt-Des) '.$tahun];
                
            // Semester
            case 'semester1': 
                return ['start' => $tahun.'-01-01', 'end' => $tahun.'-06-30', 'label' => 'Semester I (Jan-Jun) '.$tahun];
            case 'semester2': 
                return ['start' => $tahun.'-07-01', 'end' => $tahun.'-12-31', 'label' => 'Semester II (Jul-Des) '.$tahun];
                
            // Tahunan
            case 'tahunan': 
                return ['start' => $tahun.'-01-01', 'end' => $tahun.'-12-31', 'label' => 'Tahunan '.$tahun];
                
            // Semua Data
            case 'semua':
            default:
                return ['start' => null, 'end' => null, 'label' => 'Semua Data'];
        }
    }

    public function buku_tamu() {
        $data = [
            'title' => 'Kelola Buku Tamu',
            'tamu' => $this->M_admin->get_tamu(),
            'content' => 'admin/buku_tamu'
        ];
        $this->load->view('admin/v_admin', $data);
    }

    public function aduan() {
        $data = [
            'title' => 'Kelola Aduan',
            'aduan' => $this->M_admin->get_aduan(),
            'content' => 'admin/aduan'
        ];
        $this->load->view('admin/v_admin', $data);
    }

    public function data_pengguna() {
        $data = [
            'title' => 'Kelola Data',
            'content' => 'admin/data_pengguna'
        ];
        $this->load->view('admin/v_admin', $data);
    }

    public function monev_data() {
        $this->load->model('Monev_model');
        $data['monev'] = $this->Monev_model->getAll(); 
        $this->load->view('admin/v_monev', $data);
    }

    // 🖨️ CETAK SEMUA DATA (PDF/Print)
public function export_layanan_kepuasan() {
    // Ambil parameter filter
    $jenis_periode = $this->input->get('jenis_periode') ? $this->input->get('jenis_periode') : 'semua';
    $periode = $this->input->get('periode') ? $this->input->get('periode') : 'semua';
    $tahun = $this->input->get('tahun') ? $this->input->get('tahun') : 'semua';
    
    // Handle date range
    if ($jenis_periode == 'semua') {
        $date_range = ['start' => null, 'end' => null, 'label' => 'Semua Data'];
    } elseif ($jenis_periode == 'tahunan') {
        $tahun_for_range = ($tahun == 'semua') ? null : $tahun;
        $date_range = $this->get_date_range('tahunan', $tahun_for_range);
    } else {
        $tahun_for_range = ($tahun == 'semua') ? null : $tahun;
        $date_range = $this->get_date_range($periode, $tahun_for_range);
    }
    
    // Get data dengan filter
    $data = [
        'tamu' => $this->M_admin->get_tamu_with_filter($date_range),
        'periode_label' => $date_range['label']
    ];
    
    $this->load->view('admin/export_layanan_kepuasan', $data);
}

// 📊 EXPORT EXCEL
public function export_excel_layanan_kepuasan() {
    // Ambil parameter filter
    $jenis_periode = $this->input->get('jenis_periode') ? $this->input->get('jenis_periode') : 'semua';
    $periode = $this->input->get('periode') ? $this->input->get('periode') : 'semua';
    $tahun = $this->input->get('tahun') ? $this->input->get('tahun') : 'semua';
    
    // Handle date range
    if ($jenis_periode == 'semua') {
        $date_range = ['start' => null, 'end' => null, 'label' => 'Semua Data'];
    } elseif ($jenis_periode == 'tahunan') {
        $tahun_for_range = ($tahun == 'semua') ? null : $tahun;
        $date_range = $this->get_date_range('tahunan', $tahun_for_range);
    } else {
        $tahun_for_range = ($tahun == 'semua') ? null : $tahun;
        $date_range = $this->get_date_range($periode, $tahun_for_range);
    }
    
    // Get data dengan filter
    $all_data = $this->M_admin->get_tamu_with_filter($date_range);
    
    // Export ke Excel
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"layanan_kepuasan_" . date('Y-m-d') . ".xls\"");
    header("Cache-Control: max-age=0");
    
    echo "<html>";
    echo "<head>";
    echo "<meta charset=\"UTF-8\">";
    echo "<style>";
    echo "table { border-collapse: collapse; width: 100%; }";
    echo "th, td { border: 1px solid #000; padding: 8px; text-align: left; }";
    echo "th { background-color: #f2f2f2; font-weight: bold; }";
    echo "</style>";
    echo "</head>";
    echo "<body>";
    
    echo "<h2>LAPORAN LAYANAN KEPUASAN MASYARAKAT</h2>";
    echo "<h3>BBWS BRANTAS</h3>";
    echo "<p><strong>Periode:</strong> " . $date_range['label'] . "</p>";
    echo "<p><strong>Tanggal Export:</strong> " . date('d/m/Y H:i:s') . "</p>";
    
    echo "<table border='1'>";
    echo "<tr>
        <th>No</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Asal Instansi</th>
        <th>No. Telp</th>
        <th>Keperluan</th>
        <th>Persyaratan</th>
        <th>Prosedur</th>
        <th>Kecepatan</th>
        <th>Biaya</th>
        <th>Produk</th>
        <th>Kompetensi</th>
        <th>Perilaku</th>
        <th>Pengaduan</th>
        <th>Sarana</th>
        <th>Kritik Saran</th>
    </tr>";
    
    $no = 1;
    foreach($all_data as $t) {
        echo "<tr>
            <td>{$no}</td>
            <td>{$t->nama}</td>
            <td>" . ($t->jenis_kelamin == "L" ? "L" : "P") . "</td>
            <td>{$t->asal_instansi}</td>
            <td>{$t->no_handphone}</td>
            <td>{$t->keperluan}</td>
            <td>{$t->pendapat_pelayanan}</td>
            <td>{$t->pemahaman_prosedur}</td>
            <td>{$t->pendapat_kecepatan}</td>
            <td>{$t->pendapat_biaya}</td>
            <td>{$t->pendapat_produk}</td>
            <td>{$t->pendapat_kompetensi}</td>
            <td>{$t->pendapat_perilaku}</td>
            <td>{$t->pendapat_pengaduan}</td>
            <td>{$t->pendapat_kualitas}</td>
            <td>{$t->kritik_saran}</td>
        </tr>";
        $no++;
    }
    echo "</table>";
    echo "</body>";
    echo "</html>";
    exit;
}

//Rekap Buku Tamu
// 🖨️ CETAK SEMUA DATA REKAP BUKU TAMU (PDF/Print)
public function export_rekap_tamu() {
    // Ambil parameter filter
    $jenis_periode = $this->input->get('jenis_periode') ? $this->input->get('jenis_periode') : 'semua';
    $periode = $this->input->get('periode') ? $this->input->get('periode') : 'semua';
    $tahun = $this->input->get('tahun') ? $this->input->get('tahun') : 'semua';
    
    // Handle date range
    if ($jenis_periode == 'semua') {
        $date_range = ['start' => null, 'end' => null, 'label' => 'Semua Data'];
    } elseif ($jenis_periode == 'tahunan') {
        $tahun_for_range = ($tahun == 'semua') ? null : $tahun;
        $date_range = $this->get_date_range('tahunan', $tahun_for_range);
    } else {
        $tahun_for_range = ($tahun == 'semua') ? null : $tahun;
        $date_range = $this->get_date_range($periode, $tahun_for_range);
    }
    
    // Get data dengan filter - GUNAKAN MODEL BUKU TAMU
    $data = [
        'tamu' => $this->M_admin->get_tamu_with_filter($date_range),
        'periode_label' => $date_range['label']
    ];
    
    $this->load->view('admin/export_rekap_tamu', $data);
}

// 📊 EXPORT EXCEL REKAP BUKU TAMU
public function export_excel_rekap_tamu() {
    // Ambil parameter filter
    $jenis_periode = $this->input->get('jenis_periode') ? $this->input->get('jenis_periode') : 'semua';
    $periode = $this->input->get('periode') ? $this->input->get('periode') : 'semua';
    $tahun = $this->input->get('tahun') ? $this->input->get('tahun') : 'semua';
    
    // Handle date range
    if ($jenis_periode == 'semua') {
        $date_range = ['start' => null, 'end' => null, 'label' => 'Semua Data'];
    } elseif ($jenis_periode == 'tahunan') {
        $tahun_for_range = ($tahun == 'semua') ? null : $tahun;
        $date_range = $this->get_date_range('tahunan', $tahun_for_range);
    } else {
        $tahun_for_range = ($tahun == 'semua') ? null : $tahun;
        $date_range = $this->get_date_range($periode, $tahun_for_range);
    }
    
    // Get data dengan filter - GUNAKAN MODEL BUKU TAMU
    $all_data = $this->M_admin->get_tamu_with_filter($date_range);
    
    // Export ke Excel - TANGGAL & WAKTI DIGANTI KRITIK SARAN
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"rekap_buku_tamu_" . date('Y-m-d') . ".xls\"");
    header("Cache-Control: max-age=0");
    
    echo "<html><head><meta charset=\"UTF-8\"><style>table { border-collapse: collapse; width: 100%; } th, td { border: 1px solid #000; padding: 8px; } th { background-color: #f2f2f2; }</style></head><body>";
    
    echo "<h2>LAPORAN REKAP BUKU TAMU</h2>";
    echo "<h3>BBWS BRANTAS</h3>";
    echo "<p><strong>Periode:</strong> " . $date_range['label'] . "</p>";
    echo "<p><strong>Tanggal Export:</strong> " . date('d/m/Y H:i:s') . "</p>";
    
    echo "<table border='1'>";
    echo "<tr>
        <th>No</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Asal Instansi</th>
        <th>No. Handphone</th>
        <th>Keperluan</th>
        <th>Kritik Saran</th>
    </tr>";
    
    $no = 1;
    foreach($all_data as $t) {
        echo "<tr>
            <td>{$no}</td>
            <td>{$t->nama}</td>
            <td>" . ($t->jenis_kelamin == "L" ? "Laki-Laki" : "Perempuan") . "</td>
            <td>{$t->asal_instansi}</td>
            <td>{$t->no_handphone}</td>
            <td>{$t->keperluan}</td>
            <td>{$t->kritik_saran}</td>
        </tr>";
        $no++;
    }
    echo "</table></body></html>";
    exit;
}

//Layanan Permintaan Data
// 🖨️ CETAK SEMUA DATA PERMINTAAN DATA (PDF/Print)
public function export_permintaan_data() {
    // Ambil parameter filter
    $jenis_periode = $this->input->get('jenis_periode') ? $this->input->get('jenis_periode') : 'semua';
    $periode = $this->input->get('periode') ? $this->input->get('periode') : 'semua';
    $tahun = $this->input->get('tahun') ? $this->input->get('tahun') : 'semua';
    
    // Handle date range
    if ($jenis_periode == 'semua') {
        $date_range = ['start' => null, 'end' => null, 'label' => 'Semua Data'];
    } elseif ($jenis_periode == 'tahunan') {
        $tahun_for_range = ($tahun == 'semua') ? null : $tahun;
        $date_range = $this->get_date_range('tahunan', $tahun_for_range);
    } else {
        $tahun_for_range = ($tahun == 'semua') ? null : $tahun;
        $date_range = $this->get_date_range($periode, $tahun_for_range);
    }
    
    // Get data dengan filter - GUNAKAN MODEL PERMINTAAN DATA
    $data = [
        'permintaan_data' => $this->M_admin->get_permintaan_data_with_filter($date_range),
        'periode_label' => $date_range['label']
    ];
    
    $this->load->view('admin/export_permintaan_data', $data);
}

// 📊 EXPORT EXCEL PERMINTAAN DATA
public function export_excel_permintaan_data() {
    // Ambil parameter filter
    $jenis_periode = $this->input->get('jenis_periode') ? $this->input->get('jenis_periode') : 'semua';
    $periode = $this->input->get('periode') ? $this->input->get('periode') : 'semua';
    $tahun = $this->input->get('tahun') ? $this->input->get('tahun') : 'semua';
    
    // Handle date range
    if ($jenis_periode == 'semua') {
        $date_range = ['start' => null, 'end' => null, 'label' => 'Semua Data'];
    } elseif ($jenis_periode == 'tahunan') {
        $tahun_for_range = ($tahun == 'semua') ? null : $tahun;
        $date_range = $this->get_date_range('tahunan', $tahun_for_range);
    } else {
        $tahun_for_range = ($tahun == 'semua') ? null : $tahun;
        $date_range = $this->get_date_range($periode, $tahun_for_range);
    }
    
    // Get data dengan filter - GUNAKAN MODEL PERMINTAAN DATA
    $all_data = $this->M_admin->get_permintaan_data_with_filter($date_range);
    
    // Export ke Excel - SESUAIKAN KOLOM PERMINTAAN DATA
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"permintaan_data_" . date('Y-m-d') . ".xls\"");
    header("Cache-Control: max-age=0");
    
    echo "<html><head><meta charset=\"UTF-8\"><style>table { border-collapse: collapse; width: 100%; } th, td { border: 1px solid #000; padding: 8px; } th { background-color: #f2f2f2; }</style></head><body>";
    
    echo "<h2>LAPORAN PERMINTAAN DATA</h2>";
    echo "<h3>BBWS BRANTAS</h3>";
    echo "<p><strong>Periode:</strong> " . $date_range['label'] . "</p>";
    echo "<p><strong>Tanggal Export:</strong> " . date('d/m/Y H:i:s') . "</p>";
    
    echo "<table border='1'>";
    echo "<tr>
        <th>No</th>
        <th>Via</th>
        <th>Status Pemohon</th>
        <th>Pengirim</th>
        <th>Tanggal Surat</th>
        <th>Nomor Surat</th>
        <th>Perihal</th>
        <th>Diterima PPID</th>
        <th>Tindak Lanjut</th>
        <th>Status</th>
    </tr>";
    
    $no = 1;
    foreach($all_data as $p) {
        echo "<tr>
            <td>{$no}</td>
            <td>{$p->via}</td>
            <td>{$p->status_pemohon}</td>
            <td>{$p->pengirim}</td>
            <td>{$p->tanggal_surat}</td>
            <td>{$p->nomor_surat}</td>
            <td>{$p->perihal}</td>
            <td>{$p->diterima_ppid}</td>
            <td>{$p->tindak_lanjut}</td>
            <td>{$p->status}</td>
        </tr>";
        $no++;
    }
    echo "</table></body></html>";
    exit;
}

//Layanan Pengaduan
// 🖨️ CETAK SEMUA DATA PENGADUAN (PDF/Print)
public function export_pengaduan() {
    // Ambil parameter filter
    $jenis_periode = $this->input->get('jenis_periode') ? $this->input->get('jenis_periode') : 'semua';
    $periode = $this->input->get('periode') ? $this->input->get('periode') : 'semua';
    $tahun = $this->input->get('tahun') ? $this->input->get('tahun') : 'semua';
    
    // Handle date range
    if ($jenis_periode == 'semua') {
        $date_range = ['start' => null, 'end' => null, 'label' => 'Semua Data'];
    } elseif ($jenis_periode == 'tahunan') {
        $tahun_for_range = ($tahun == 'semua') ? null : $tahun;
        $date_range = $this->get_date_range('tahunan', $tahun_for_range);
    } else {
        $tahun_for_range = ($tahun == 'semua') ? null : $tahun;
        $date_range = $this->get_date_range($periode, $tahun_for_range);
    }
    
    // Query langsung di controller
    $this->db->from('layanan_pengaduan');
    
    if ($date_range['start'] && $date_range['end']) {
        $this->db->where('tanggal >=', $date_range['start']);
        $this->db->where('tanggal <=', $date_range['end']);
    }
    
    $this->db->order_by('tanggal', 'ASC');
    $pengaduan_data = $this->db->get()->result();
    
    $data = [
        'pengaduan_data' => $pengaduan_data,
        'periode_label' => $date_range['label']
    ];
    
    $this->load->view('admin/export_pengaduan', $data);
}

// 📊 EXPORT EXCEL PENGADUAN
public function export_excel_pengaduan() {
    // Ambil parameter filter
    $jenis_periode = $this->input->get('jenis_periode') ? $this->input->get('jenis_periode') : 'semua';
    $periode = $this->input->get('periode') ? $this->input->get('periode') : 'semua';
    $tahun = $this->input->get('tahun') ? $this->input->get('tahun') : 'semua';
    
    // Handle date range
    if ($jenis_periode == 'semua') {
        $date_range = ['start' => null, 'end' => null, 'label' => 'Semua Data'];
    } elseif ($jenis_periode == 'tahunan') {
        $tahun_for_range = ($tahun == 'semua') ? null : $tahun;
        $date_range = $this->get_date_range('tahunan', $tahun_for_range);
    } else {
        $tahun_for_range = ($tahun == 'semua') ? null : $tahun;
        $date_range = $this->get_date_range($periode, $tahun_for_range);
    }
    
    // Query langsung di controller
    $this->db->from('layanan_pengaduan');
    
    if ($date_range['start'] && $date_range['end']) {
        $this->db->where('tanggal >=', $date_range['start']);
        $this->db->where('tanggal <=', $date_range['end']);
    }
    
    $this->db->order_by('tanggal', 'ASC');
    $all_data = $this->db->get()->result();
    
    // Export ke Excel
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"pengaduan_" . date('Y-m-d') . ".xls\"");
    header("Cache-Control: max-age=0");
    
    echo "<html><head><meta charset=\"UTF-8\"><style>table { border-collapse: collapse; width: 100%; } th, td { border: 1px solid #000; padding: 8px; } th { background-color: #f2f2f2; }</style></head><body>";
    
    echo "<h2>LAPORAN PENGADUAN</h2>";
    echo "<h3>BBWS BRANTAS</h3>";
    echo "<p><strong>Periode:</strong> " . $date_range['label'] . "</p>";
    echo "<p><strong>Tanggal Export:</strong> " . date('d/m/Y H:i:s') . "</p>";
    
    echo "<table border='1'>";
    echo "<tr>
        <th>No</th>
        <th>Via</th>
        <th>Status Pengirim</th>
        <th>Jenis</th>
        <th>Pengirim</th>
        <th>Tanggal</th>
        <th>Nomor Surat</th>
        <th>Perihal</th>
        <th>Diterima PPID</th>
        <th>Tindak Lanjut</th>
        <th>Keterangan</th>
        <th>Sumber</th>
        <th>Status</th>
    </tr>";
    
    $no = 1;
    foreach($all_data as $p) {
        echo "<tr>
            <td>{$no}</td>
            <td>{$p->via}</td>
            <td>{$p->status_pengirim}</td>
            <td>{$p->jenis}</td>
            <td>{$p->pengirim}</td>
            <td>{$p->tanggal}</td>
            <td>{$p->nomor_surat}</td>
            <td>{$p->perihal}</td>
            <td>{$p->diterima_ppid}</td>
            <td>{$p->tindaklanjut}</td>
            <td>{$p->keterangan}</td>
            <td>{$p->sumber}</td>
            <td>{$p->status}</td>
        </tr>";
        $no++;
    }
    echo "</table></body></html>";
    exit;
}

//Layanan Informasi
// 🖨️ CETAK SEMUA DATA INFORMASI (PDF/Print)
public function export_informasi() {
    // Ambil parameter filter
    $jenis_periode = $this->input->get('jenis_periode') ? $this->input->get('jenis_periode') : 'semua';
    $periode = $this->input->get('periode') ? $this->input->get('periode') : 'semua';
    $tahun = $this->input->get('tahun') ? $this->input->get('tahun') : 'semua';
    
    // Handle date range
    if ($jenis_periode == 'semua') {
        $date_range = ['start' => null, 'end' => null, 'label' => 'Semua Data'];
    } elseif ($jenis_periode == 'tahunan') {
        $tahun_for_range = ($tahun == 'semua') ? null : $tahun;
        $date_range = $this->get_date_range('tahunan', $tahun_for_range);
    } else {
        $tahun_for_range = ($tahun == 'semua') ? null : $tahun;
        $date_range = $this->get_date_range($periode, $tahun_for_range);
    }
    
    // Query langsung di controller
    $this->db->from('layanan_informasi');
    
    if ($date_range['start'] && $date_range['end']) {
        $this->db->where('tanggal >=', $date_range['start']);
        $this->db->where('tanggal <=', $date_range['end']);
    }
    
    $this->db->order_by('tanggal', 'ASC');
    $informasi_data = $this->db->get()->result();
    
    $data = [
        'informasi_data' => $informasi_data,
        'periode_label' => $date_range['label']
    ];
    
    $this->load->view('admin/export_informasi', $data);
}

// 📊 EXPORT EXCEL INFORMASI
public function export_excel_informasi() {
    // Ambil parameter filter
    $jenis_periode = $this->input->get('jenis_periode') ? $this->input->get('jenis_periode') : 'semua';
    $periode = $this->input->get('periode') ? $this->input->get('periode') : 'semua';
    $tahun = $this->input->get('tahun') ? $this->input->get('tahun') : 'semua';
    
    // Handle date range
    if ($jenis_periode == 'semua') {
        $date_range = ['start' => null, 'end' => null, 'label' => 'Semua Data'];
    } elseif ($jenis_periode == 'tahunan') {
        $tahun_for_range = ($tahun == 'semua') ? null : $tahun;
        $date_range = $this->get_date_range('tahunan', $tahun_for_range);
    } else {
        $tahun_for_range = ($tahun == 'semua') ? null : $tahun;
        $date_range = $this->get_date_range($periode, $tahun_for_range);
    }
    
    // Query langsung di controller
    $this->db->from('layanan_informasi');
    
    if ($date_range['start'] && $date_range['end']) {
        $this->db->where('tanggal >=', $date_range['start']);
        $this->db->where('tanggal <=', $date_range['end']);
    }
    
    $this->db->order_by('tanggal', 'ASC');
    $all_data = $this->db->get()->result();
    
    // Export ke Excel
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"informasi_" . date('Y-m-d') . ".xls\"");
    header("Cache-Control: max-age=0");
    
    echo "<html><head><meta charset=\"UTF-8\"><style>table { border-collapse: collapse; width: 100%; } th, td { border: 1px solid #000; padding: 8px; } th { background-color: #f2f2f2; }</style></head><body>";
    
    echo "<h2>LAPORAN LAYANAN INFORMASI</h2>";
    echo "<h3>BBWS BRANTAS</h3>";
    echo "<p><strong>Periode:</strong> " . $date_range['label'] . "</p>";
    echo "<p><strong>Tanggal Export:</strong> " . date('d/m/Y H:i:s') . "</p>";
    
    echo "<table border='1'>";
    echo "<tr>
        <th>No</th>
        <th>Kegiatan</th>
        <th>Lokasi</th>
        <th>Uraian</th>
        <th>Tanggal</th>
        <th>Jumlah Like</th>
        <th>Jumlah Komentar</th>
        <th>Keterangan</th>
    </tr>";
    
    $no = 1;
    foreach($all_data as $i) {
        echo "<tr>
            <td>{$no}</td>
            <td>{$i->kegiatan}</td>
            <td>{$i->lokasi}</td>
            <td>{$i->uraian}</td>
            <td>{$i->tanggal}</td>
            <td>{$i->jumlah_like}</td>
            <td>{$i->jumlah_komentar}</td>
            <td>{$i->keterangan}</td>
        </tr>";
        $no++;
    }
    echo "</table></body></html>";
    exit;
}
}
