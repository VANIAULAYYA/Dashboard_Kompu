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
        $this->load->view('v_landing');
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
    // FEEDBACK
    // ===============================

    public function submit() {
        $kategori_lainnya = $this->input->post('kategori_lainnya');
        $kategori = $this->input->post('keperluan'); 

        if ($kategori === 'lainnya' && !empty($kategori_lainnya)) {
            $kategori = $kategori_lainnya;
        }

        $data = array(
            'nama'                => $this->input->post('nama'),
            'jenis_kelamin'       => $this->input->post('jenis_kelamin'),
            'asal_instansi'       => $this->input->post('asal_instansi'),
            'no_handphone'        => $this->input->post('no_handphone'),
            'keperluan'           => $kategori,
            'pendapat_pelayanan'  => $this->input->post('pendapat_pelayanan'),
            'pemahaman_prosedur'  => $this->input->post('pemahaman_prosedur'),
            'pendapat_kecepatan'  => $this->input->post('pendapat_kecepatan'),
            'pendapat_biaya'      => $this->input->post('pendapat_biaya'),
            'pendapat_produk'     => $this->input->post('pendapat_produk'),
            'pendapat_kompetensi' => $this->input->post('pendapat_kompetensi'),
            'pendapat_perilaku'   => $this->input->post('pendapat_perilaku'),
            'pendapat_kualitas'   => $this->input->post('pendapat_kualitas'),
            'pendapat_pengaduan'  => $this->input->post('pendapat_pengaduan'),
            'kritik_saran'        => $this->input->post('kritik_saran')
        );

        $this->M_landing->insert_feedback($data);
        redirect('Landing');
    }
// ===============================
    // LAPORAN
    // ===============================

     public function Survei_Kepuasan_Masyarakat($tahun = null) {
        if ($tahun === null) {
            $tahun = date('Y');
        }
        
        // Ambil data
        $this->db->select('YEAR(tanggal) as tahun');
        $this->db->from('laporan');
        $this->db->where('jenis_laporan', 'SKM');
        $this->db->group_by('YEAR(tanggal)');
        $this->db->order_by('tahun', 'DESC');
        $data['tahun_list'] = $this->db->get()->result_array();
        
        $this->db->select('*');
        $this->db->from('laporan');
        $this->db->where('jenis_laporan', 'SKM');
        $this->db->where('YEAR(tanggal)', $tahun);
        $this->db->order_by('tanggal', 'ASC');
        $dokumen_tahun = $this->db->get()->result_array();
        
        // FIX PATH: Gunakan uploads/bukti/
        foreach ($dokumen_tahun as &$doc) {
            if (!empty($doc['bukti_file'])) {
                // Path yang benar: uploads/bukti/namafile
                $doc['bukti_file'] = 'uploads/bukti/' . $doc['bukti_file'];
                
                // Cek jika file exists
                $file_path = FCPATH . $doc['bukti_file'];
                $doc['file_exists'] = file_exists($file_path);
            } else {
                $doc['file_exists'] = false;
            }
        }
        
        // Group data dengan AUTO DETECT TRIWULAN
        $data['triwulan'] = [];
        $data['semester'] = [];
        $data['tahunan'] = [];
        
        foreach ($dokumen_tahun as $doc) {
            // AUTO DETECT TRIWULAN dari nama file
            if ($doc['periode'] == 'Triwulan') {
                $doc['triwulan_number'] = $this->detect_triwulan($doc['nama_file']);
                
                if ($doc['triwulan_number']) {
                    $data['triwulan'][] = $doc;
                } else {
                    // Jika tidak terdetect, masukkan ke triwulan I sebagai default
                    $doc['triwulan_number'] = 'I';
                    $data['triwulan'][] = $doc;
                }
            }
            // AUTO DETECT SEMESTER
            elseif ($doc['periode'] == 'Semester') {
                $doc['semester_number'] = $this->detect_semester($doc['nama_file']);
                $data['semester'][] = $doc;
            }
            // TAHUNAN
            elseif ($doc['periode'] == 'Tahunan') {
                $data['tahunan'][] = $doc;
            }
            // Jika periode kosong, coba deteksi dari nama file
            else {
                if (preg_match('/(triwulan|tw|q)\s*(i{1,3}|iv|1|2|3|4)/i', $doc['nama_file'])) {
                    $doc['triwulan_number'] = $this->detect_triwulan($doc['nama_file']);
                    $data['triwulan'][] = $doc;
                } 
                elseif (preg_match('/(semester|sem)\s*(i{1,2}|1|2)/i', $doc['nama_file'])) {
                    $doc['semester_number'] = $this->detect_semester($doc['nama_file']);
                    $data['semester'][] = $doc;
                }
                elseif (preg_match('/(tahunan|tahun|annual)/i', $doc['nama_file'])) {
                    $data['tahunan'][] = $doc;
                }
            }
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