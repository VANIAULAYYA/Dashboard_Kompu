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
        // print_r($data);
        // die;
        $this->load->view('admin/v_admin', $data);
    }

    public function rekap_tamu() {
        $data = [
            'title' => 'Kelola Buku Tamu',
            'tamu' => $this->M_admin->get_tamu(),
            'content' => 'admin/buku_tamu'
        ];
        $this->load->view('admin/v_buku_tamu_2',$data);
    }

    public function layanan_kepuasan() {
        $data = [
            'title' => 'Kelola Buku Tamu',
            'tamu' => $this->M_admin->get_tamu(),
            'content' => 'admin/buku_tamu'
        ];
        $this->load->view('admin/v_layanan_kepuasan',$data);
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
}

?>