<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_view extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_laporan_view');
        $this->load->helper('url');
    }

    // Halaman laporan umum
    public function laporan_PPID() {
        $data['laporan'] = $this->M_laporan_view->get_laporan('PPID'); // PPID = harian
        $data['page_title'] = "Laporan PPID";
        $data['active_menu'] = 'laporan';
        $this->load->view('v_laporan', $data);
    }

    public function laporan_Kompu() {
        $data['laporan'] = $this->M_laporan_view->get_laporan('KOMPU'); // KOMPU = bulanan
        $data['page_title'] = "Laporan Kompu";
        $data['active_menu'] = 'laporan';
        $this->load->view('v_laporan', $data);
    }

    public function Survei_Kepuasan_Masyarakat() {
        $data['laporan'] = $this->M_laporan_view->get_laporan('SKM'); // SKM = tahunan
        $data['page_title'] = "Survei Kepuasan Masyarakat";
        $data['active_menu'] = 'laporan';
        $this->load->view('v_laporan', $data);
    }

    // AJAX untuk ambil laporan berdasarkan periode
    public function get_laporan_periode() {
        $periode = $this->input->post('periode'); 
        $laporan = $this->M_laporan_view->get_laporan_periode($periode);
        echo json_encode($laporan);
    }


}
