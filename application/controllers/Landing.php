<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_landing'); // model gabungan feedback + laporan
        $this->load->helper('url');
    }

    // ===============================
    // HALAMAN UMUM
    // ===============================

    public function index()
{
    // Load model
    $this->load->model('M_monev_kepuasan');
    
    // Date range untuk semua data
    $date_range_all = ['start' => null, 'end' => null, 'label' => 'Semua Data'];
    
    // Ambil data REAL dari database
    $total_responden = $this->M_monev_kepuasan->get_total_responden($date_range_all);
    $nilai_ikm = $this->M_monev_kepuasan->get_nilai_ikm($date_range_all);
    $persentase_ikm = ($nilai_ikm / 4) * 100;
    
    // DEBUG: Tampilkan nilai di console/log
    log_message('debug', 'Total Responden: ' . $total_responden);
    log_message('debug', 'Nilai IKM: ' . $nilai_ikm);
    
    $data = array(
        'total_responden' => $total_responden, // <- PASTIKAN NAMA INI SAMA DENGAN DI VIEW
        'nilai_ikm' => $nilai_ikm,
        'persentase_ikm' => $persentase_ikm
    );
    
    // Load view dengan data
    $this->load->view('v_landing', $data);
}

    public function buku_tamu()
    {
        $this->load->view('v_buku_tamu');
    }

    public function medsos()
    {
        $data = array(
            'page_title' => 'Media Sosial - BBWS Brantas',
            'active_menu' => 'medsos'
        );
        $this->load->view('v_media_sosial', $data);
    }

    public function tentang()
    {
        $data = array(
            'page_title' => 'Tentang Kami - BBWS Brantas',
            'active_menu' => 'tentang'
        );
        $this->load->view('v_about_v2', $data);
    }

    public function layanan()
    {
        $data = array(
            'page_title' => 'Layanan - BBWS Brantas',
            'active_menu' => 'layanan'
        );
        $this->load->view('v_layanan', $data);
    }

    public function laporan()
    {
        $data = array(
            'page_title' => 'Laporan - BBWS Brantas',
            'active_menu' => 'laporan'
        );
        $this->load->view('v_laporan', $data);
    }

    // ===============================
// SURVEI
// ===============================

public function submit_survei() {
    // Bersihkan output buffer
    if (ob_get_length()) ob_clean();
    header('Content-Type: application/json');
    
    try {
        $nik = $this->input->post('nik');
        
        // Validasi NIK tidak kosong
        if (empty($nik)) {
            echo json_encode([
                'success' => false,
                'message' => 'NIK tidak boleh kosong'
            ]);
            exit;
        }
        
        // Cek apakah user ada dan belum isi survei
        $user_data = $this->M_landing->validate_nik_survei($nik);
        
        if (!$user_data) {
            echo json_encode([
                'success' => false,
                'message' => 'NIK tidak ditemukan atau sudah mengisi survei'
            ]);
            exit;
        }
        
        // Update data survei
        $data_survei = [
            'status_survei' => 'sudah',
            'tanggal_survei' => date('Y-m-d H:i:s'),
            'pendapat_pelayanan' => $this->input->post('pendapat_pelayanan'),
            'pemahaman_prosedur' => $this->input->post('pemahaman_prosedur'),
            'pendapat_kecepatan' => $this->input->post('pendapat_kecepatan'),
            'pendapat_biaya' => $this->input->post('pendapat_biaya'),
            'pendapat_produk' => $this->input->post('pendapat_produk'),
            'pendapat_kompetensi' => $this->input->post('pendapat_kompetensi'),
            'pendapat_perilaku' => $this->input->post('pendapat_perilaku'),
            'pendapat_kualitas' => $this->input->post('pendapat_kualitas'),
            'pendapat_pengaduan' => $this->input->post('pendapat_pengaduan'),
            'kritik_saran' => $this->input->post('kritik_saran')
        ];
        
        $update_result = $this->M_landing->update_survei($nik, $data_survei);
        
        if ($update_result) {
            echo json_encode([
                'success' => true,
                'message' => 'Survei berhasil dikirim! Terima kasih atas partisipasi Anda.'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Gagal mengupdate data survei'
            ]);
        }
        
    } catch (Exception $e) {
        echo json_encode([
            'success' => false,
            'message' => 'Terjadi kesalahan sistem: ' . $e->getMessage()
        ]);
    }
    
    exit;
}

public function validate_nik() {
    $nik = $this->input->post('nik');
    
    // Cek di database menggunakan model
    $user_data = $this->M_landing->validate_nik_survei($nik);
    
    if ($user_data) {
        echo json_encode([
            'success' => true,
            'user_data' => [
                'nama' => $user_data->nama,
                'asal_instansi' => $user_data->asal_instansi,
                'keperluan' => $user_data->keperluan
            ]
        ]);
    } else {
        // Cek apakah NIK ada tapi sudah survei
        $user_exists = $this->M_landing->get_user_by_nik($nik);
        
        if ($user_exists) {
            echo json_encode([
                'success' => false,
                'message' => 'Anda sudah mengisi survei untuk kunjungan ini',
                'error_type' => 'already_filled'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'NIK tidak ditemukan. Silakan isi buku tamu terlebih dahulu',
                'error_type' => 'not_found'
            ]);
        }
    }
}

public function Survei() {
    // Jika ada POST NIK, berarti validasi
    if ($this->input->post('nik')) {
        $nik = $this->input->post('nik');
        
        // Cek di database menggunakan model
        $user_data = $this->M_landing->validate_nik_survei($nik);
        
        if ($user_data) {
            // Tampilkan form survei
            $data = array(
                'page_title' => 'Survei - BBWS Brantas',
                'show_survei' => true,
                'user_data' => $user_data,
                'nik' => $nik
            );
        } else {
            // Tampilkan error
            $data = array(
                'page_title' => 'Survei - BBWS Brantas',
                'error' => 'NIK tidak ditemukan atau sudah mengisi survei',
                'nik' => $nik
            );
        }
    } else {
        // Tampilkan form validasi NIK
        $data = array(
            'page_title' => 'Survei - BBWS Brantas'
        );
    }
    
    $this->load->view('v_survei', $data);
}

// Method submit buku tamu
public function submit() {
    $kategori_lainnya = $this->input->post('kategori_lainnya');
    $kategori = $this->input->post('keperluan'); 

    if ($kategori === 'lainnya' && !empty($kategori_lainnya)) {
        $kategori = $kategori_lainnya;
    }
    
    // Simpan data buku tamu
    $data_tamu = array(
        'nik' => $this->input->post('nik'),
        'nama'                => $this->input->post('nama'),
        'jenis_kelamin'       => $this->input->post('jenis_kelamin'),
        'asal_instansi'       => $this->input->post('asal_instansi'),
        'no_handphone'        => $this->input->post('no_handphone'),
        'email'               => $this->input->post('email'),
        'keperluan'           => $kategori,
        'status_survei'       => 'belum',
        'kritik_saran'        => $this->input->post('kritik_saran')
    );

    $this->db->insert('buku_tamu', $data_tamu);
    $tamu_id = $this->db->insert_id();
    
    // Jika keperluan adalah Permintaan Data/Informasi, redirect ke form permohonan
    if ($kategori == 'Permintaan Data/Informasi') {
        // Simpan session untuk data buku tamu
        $this->session->set_userdata('buku_tamu_data', $data_tamu);
        $this->session->set_userdata('buku_tamu_id', $tamu_id);
        
        // Redirect ke controller Permohonan
        redirect('permohonan/form_permohonan');
    }
    
    $this->session->set_flashdata('success', 'Data tamu berhasil disimpan');
    redirect('Landing'); // GANTI INI
}

public function success_survei() {
    $data = array(
        'page_title' => 'Survei Berhasil - BBWS Brantas',
        'active_menu' => 'survei'
    );
    $this->load->view('v_success_survei', $data);
}

// ===============================
    // LAPORAN
    // ===============================

    public function Survei_Kepuasan_Masyarakat($tahun = null) {
    if ($tahun === null) {
        $tahun = date('Y');
    }
    
    // Ambil daftar tahun
    $this->db->select('YEAR(tanggal) as tahun');
    $this->db->from('laporan');
    $this->db->where('jenis_laporan', 'SKM');
    $this->db->group_by('YEAR(tanggal)');
    $this->db->order_by('tahun', 'DESC');
    $data['tahun_list'] = $this->db->get()->result_array();
    
    // Ambil data laporan
    $this->db->select('*');
    $this->db->from('laporan');
    $this->db->where('jenis_laporan', 'SKM');
    $this->db->where('YEAR(tanggal)', $tahun);
    $this->db->order_by('tanggal', 'ASC');
    $dokumen_tahun = $this->db->get()->result_array();
    
    // Inisialisasi array
    $data['triwulan'] = [];
    $data['semester'] = [];
    $data['tahunan'] = [];
    
    // Process setiap dokumen
    foreach ($dokumen_tahun as &$doc) {
        // Fix path file
        if (!empty($doc['bukti_file'])) {
            $doc['bukti_file'] = 'uploads/bukti/' . $doc['bukti_file'];
            $file_path = FCPATH . $doc['bukti_file'];
            $doc['file_exists'] = file_exists($file_path);
        } else {
            $doc['file_exists'] = false;
        }
        
        // PERBAIKAN: Kelompokkan berdasarkan periode TANPA DUPLIKASI
        if ($doc['periode'] == 'Triwulan') {
            $doc['triwulan_number'] = $this->detect_triwulan($doc['nama_file']);
            $data['triwulan'][] = $doc;
        } 
        elseif ($doc['periode'] == 'Semester') {
            $doc['semester_number'] = $this->detect_semester($doc['nama_file']);
            $data['semester'][] = $doc;
        } 
        elseif ($doc['periode'] == 'Tahunan') {
            $data['tahunan'][] = $doc;
        }
        // CATATAN: Hilangkan bagian else untuk auto-detect
        // karena sudah ada kolom periode di database
    }
    
    $data['current_year'] = $tahun;
    $data['page_title'] = "Survei Kepuasan Masyarakat";
    $data['active_menu'] = 'laporan';
    $data['jenis_laporan'] = 'SKM';
    
    $this->load->view('v_laporan', $data);
}

    /**
     * Fungsi untuk mendeteksi nomor triwulan dari nama file
     * Support format: Triwulan I, Triwulan II, TW 2, Q3, dll
     */
    private function detect_triwulan($nama_file) {
        // Pattern untuk mendeteksi triwulan
        // Bisa detect: Triwulan I, Triwulan II, TW 2, Q3, dll
        if (preg_match('/(triwulan|tw|quarter|q)[\s_-]*(i{1,3}|iv|1|2|3|4)/i', $nama_file, $matches)) {
            $number = strtoupper(trim($matches[2]));
            
            // Convert angka ke romawi
            $roman_map = [
                '1' => 'I',
                '2' => 'II', 
                '3' => 'III',
                '4' => 'IV'
            ];
            
            // Jika sudah romawi, return as is
            if (in_array($number, ['I', 'II', 'III', 'IV'])) {
                return $number;
            }
            
            // Jika angka, convert ke romawi
            if (isset($roman_map[$number])) {
                return $roman_map[$number];
            }
        }
        
        return null; // Tidak terdetect
    }

    /**
     * Fungsi untuk mendeteksi nomor semester dari nama file
     * Support format: Semester I, Semester 1, Sem 2, dll
     */
    private function detect_semester($nama_file) {
        if (preg_match('/(semester|sem)[\s_-]*(i{1,2}|1|2)/i', $nama_file, $matches)) {
            $number = strtoupper(trim($matches[2]));
            
            // Convert angka ke romawi
            $roman_map = [
                '1' => 'I',
                '2' => 'II'
            ];
            
            // Jika sudah romawi, return as is
            if (in_array($number, ['I', 'II'])) {
                return $number;
            }
            
            // Jika angka, convert ke romawi
            if (isset($roman_map[$number])) {
                return $roman_map[$number];
            }
        }
        
        return null;
    }

    // Fungsi lain tetap sama seperti sebelumnya
    public function laporan_PPID($tahun = null) {
        if ($tahun === null) {
            $tahun = date('Y');
        }
        
        $this->db->select('YEAR(tanggal) as tahun');
        $this->db->from('laporan');
        $this->db->where('jenis_laporan', 'PPID');
        $this->db->group_by('YEAR(tanggal)');
        $this->db->order_by('tahun', 'DESC');
        $data['tahun_list'] = $this->db->get()->result_array();
        
        $this->db->select('*');
        $this->db->from('laporan');
        $this->db->where('jenis_laporan', 'PPID');
        $this->db->where('YEAR(tanggal)', $tahun);
        $this->db->order_by('tanggal', 'ASC');
        $dokumen_tahun = $this->db->get()->result_array();
        
        $data['triwulan'] = [];
        $data['semester'] = [];
        $data['tahunan'] = [];
        
        foreach ($dokumen_tahun as &$doc) {
            if (!empty($doc['bukti_file'])) {
                $doc['bukti_file'] = 'uploads/bukti/' . $doc['bukti_file'];
                $file_path = FCPATH . $doc['bukti_file'];
                $doc['file_exists'] = file_exists($file_path);
            } else {
                $doc['file_exists'] = false;
            }
            
            // Auto detect periode
            if ($doc['periode'] == 'Triwulan') {
                $doc['triwulan_number'] = $this->detect_triwulan($doc['nama_file']);
                $data['triwulan'][] = $doc;
            } elseif ($doc['periode'] == 'Semester') {
                $doc['semester_number'] = $this->detect_semester($doc['nama_file']);
                $data['semester'][] = $doc;
            } elseif ($doc['periode'] == 'Tahunan') {
                $data['tahunan'][] = $doc;
            }
        }
        
        $data['current_year'] = $tahun;
        $data['page_title'] = "Laporan PPID";
        $data['active_menu'] = 'laporan';
        $data['jenis_laporan'] = 'PPID';
        $this->load->view('v_laporan', $data);
    }

//laporan kompu
    public function laporan_Kompu($tahun = null) {
        if ($tahun === null) {
            $tahun = date('Y');
        }
        
        $this->db->select('YEAR(tanggal) as tahun');
        $this->db->from('laporan');
        $this->db->where('jenis_laporan', 'Kompu');
        $this->db->group_by('YEAR(tanggal)');
        $this->db->order_by('tahun', 'DESC');
        $data['tahun_list'] = $this->db->get()->result_array();
        
        $this->db->select('*');
        $this->db->from('laporan');
        $this->db->where('jenis_laporan', 'Kompu');
        $this->db->where('YEAR(tanggal)', $tahun);
        $this->db->order_by('tanggal', 'ASC');
        $dokumen_tahun = $this->db->get()->result_array();
        
        $data['triwulan'] = [];
        $data['semester'] = [];
        $data['tahunan'] = [];
        
        foreach ($dokumen_tahun as &$doc) {
            if (!empty($doc['bukti_file'])) {
                $doc['bukti_file'] = 'uploads/bukti/' . $doc['bukti_file'];
                $file_path = FCPATH . $doc['bukti_file'];
                $doc['file_exists'] = file_exists($file_path);
            } else {
                $doc['file_exists'] = false;
            }
            
            // Auto detect periode
            if ($doc['periode'] == 'Triwulan') {
                $doc['triwulan_number'] = $this->detect_triwulan($doc['nama_file']);
                $data['triwulan'][] = $doc;
            } elseif ($doc['periode'] == 'Semester') {
                $doc['semester_number'] = $this->detect_semester($doc['nama_file']);
                $data['semester'][] = $doc;
            } elseif ($doc['periode'] == 'Tahunan') {
                $data['tahunan'][] = $doc;
            }
        }
        
        $data['current_year'] = $tahun;
        $data['page_title'] = "Laporan Kompu";
        $data['active_menu'] = 'laporan';
        $data['jenis_laporan'] = 'Kompu';
        $this->load->view('v_laporan', $data);
    }

}
?>