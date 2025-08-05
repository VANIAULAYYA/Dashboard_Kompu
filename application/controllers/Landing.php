<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // check_role(array('admin')); // Pastikan hanya admin yang bisa mengakses
        // $this->load->model('Aduan_model');
        // $this->load->model('User_model');
        $this->load->library('form_validation');
        $this->load->model('M_landing');
    }

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

    public function submit() {
        $kategori_lainnya = $this->input->post('kategori_lainnya');
        $kategori = $this->input->post('keperluan'); 
        if ($kategori === 'lainnya' && !empty($kategori_lainnya)) {
                $kategori = $this->input->post('kategori_lainnya');
            } else {
                $kategori = $this->input->post('keperluan');    
            }
        $data = array(
            'nama' => $this->input->post('nama'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'asal_instansi' => $this->input->post('asal_instansi'),
            'no_handphone' => $this->input->post('no_handphone'),
            'keperluan' => $kategori,
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
        );
        $this->load->model('M_landing');
        $this->M_landing->insert_feedback($data);
        
        // Redirect atau tampilkan pesan sukses
        // echo "Data berhasil dikirim!";
        redirect('Landing');
    }

    public function tentang()
    {
        $data = array(
            'page_title' => 'Tentang Kami - BBWS Brantas',
            'active_menu' => 'tentang'
        );
        
        $this->load->view('v_about_v2', $data);
    }
    
    // public function dashboard()
    // {
    //     $data['title'] = 'Dashboard Admin';
    //     $this->load->view('layouts/header', $data);
    //     $this->load->view('layouts/sidebar_admin');
    //     $this->load->view('admin/dashboard');
    //     $this->load->view('layouts/footer');
    // }

}



?>