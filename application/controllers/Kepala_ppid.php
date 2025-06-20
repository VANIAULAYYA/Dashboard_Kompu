<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepala_ppid extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        check_role(array('kepala_ppid')); // Pastikan hanya kepala PPID yang bisa mengakses
        $this->load->model('Aduan_model');
    }

    public function dashboard()
    {
        $data['title'] = 'Dashboard Kepala PPID';
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar_kepala_ppid');
        $this->load->view('kepala_ppid/dashboard');
        $this->load->view('layouts/footer');
    }

    public function aduan()
    {
        $data['title'] = 'Data Aduan';
        $data['aduan'] = $this->Aduan_model->get_all_aduan(); // Kepala PPID bisa melihat semua aduan
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar_kepala_ppid');
        $this->load->view('kepala_ppid/aduan_list', $data);
        $this->load->view('layouts/footer');
    }
}