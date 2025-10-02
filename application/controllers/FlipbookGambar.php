<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FlipbookGambar extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_flipbook_gambar');
    }

    public function index() {
        $data['page_title'] = "Demo Flipbook Gambar";
        $data['laporan'] = $this->M_flipbook_gambar->get_images();
        $this->load->view('v_laporan', $data);
    }
}
