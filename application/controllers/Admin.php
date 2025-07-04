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
            // 'total_kepuasan' => $this->M_admin->avg_kepuasan(),
            'total_aduan' => $this->M_admin->count_aduan(),
            'aduan_proses' => $this->M_admin->count_aduan_proses(),
            'content' => 'admin/dashboard'
        ];
        $this->load->view('layouts/v_admin', $data);
    }

    public function buku_tamu() {
        $data = [
            'title' => 'Kelola Buku Tamu',
            'tamu' => $this->M_admin->get_tamu(),
            'content' => 'admin/buku_tamu'
        ];
        $this->load->view('layouts/v_admin', $data);
    }

    public function aduan() {
        $data = [
            'title' => 'Kelola Aduan',
            'aduan' => $this->M_admin->get_aduan(),
            'content' => 'admin/aduan'
        ];
        $this->load->view('layouts/v_admin', $data);
    }

    public function data_pengguna() {
        $data = [
            'title' => 'Kelola Data',
            'content' => 'admin/data_pengguna'
        ];
        $this->load->view('layouts/v_admin', $data);
    }
}

?>