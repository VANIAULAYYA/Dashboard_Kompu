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

    // Dashboard
    public function index() {
        $data = [
            'title' => 'Dashboard Admin',
            'total_tamu' => $this->M_admin->count_tamu(),
            'laki' => $this->M_admin->count_laki(),
            'perempuan' => $this->M_admin->count_perempuan(),
            'total_aduan' => $this->M_admin->count_aduan(),
            'aduan_proses' => $this->M_admin->count_aduan_proses(),
            'keperluan1' => $this->M_admin->count_keperluan1(),
            'keperluan2' => $this->M_admin->count_keperluan2(),
            'keperluan3' => $this->M_admin->count_keperluan3(),
            'keperluan4' => $this->M_admin->count_keperluan4(),
            'content' => 'admin/dashboard'
        ];
        $this->load->view('admin/v_admin', $data);
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
}
