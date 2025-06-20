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
    }

    public function index()
    {
        
        $this->load->view('v_landing');
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