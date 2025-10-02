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
        $this->load->view('v_media_sosial');
    }

    public function tentang()
    {
        $data = array(
            'page_title' => 'Tentang Kami - BBWS Brantas',
            'active_menu' => 'tentang'
        );
        $this->load->view('v_about_v2', $data);
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

    public function laporan_PPID() {
        $data['laporan'] = $this->M_landing->get_laporan_by_jenis('PPID');
        $data['page_title'] = "Laporan PPID";
        $data['active_menu'] = 'laporan';
        $this->load->view('v_laporan', $data);
    }

    public function laporan_Kompu() {
        $data['laporan'] = $this->M_landing->get_laporan_by_jenis('KOMPU');
        $data['page_title'] = "Laporan Kompu";
        $data['active_menu'] = 'laporan';
        $this->load->view('v_laporan', $data);
    }

    public function Survei_Kepuasan_Masyarakat() {
        $data['laporan'] = $this->M_landing->get_laporan_by_jenis('SKM');
        $data['page_title'] = "Survei Kepuasan Masyarakat";
        $data['active_menu'] = 'laporan';
        $this->load->view('v_laporan', $data);
    }

    // AJAX untuk ambil laporan berdasarkan periode
    public function get_laporan_periode() {
        $periode = $this->input->post('periode'); 
        $laporan = $this->M_landing->get_ppid_periode($periode);
        echo json_encode($laporan);
    }
}
