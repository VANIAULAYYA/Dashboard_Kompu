<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_view extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_laporan_view');
        $this->load->helper('url');
    }

    // Halaman utama view laporan
    public function index() {
        $data['page_title'] = 'Sistem Informasi Layanan Publik - PPID';
        $data['laporan'] = $this->M_laporan_view->get_all_pdfs();
        
        $this->load->view('v_laporan', $data);
    }

    // View laporan spesifik berdasarkan ID
    public function view($id = null) {
        if (!$id) {
            redirect('laporan_view');
        }

        $laporan = $this->M_laporan_view->get_pdf_by_id($id);
        
        if (!$laporan) {
            show_404();
        }

        $data['page_title'] = 'View Laporan - ' . $laporan['nama_file'];
        $data['laporan'] = array((object)$laporan); // Format sebagai array of objects untuk view
        
        $this->load->view('v_laporan', $data);
    }

    // AJAX endpoint untuk filter periode
    public function get_ppid_periode() {
        $periode = $this->input->post('periode');
        
        if($periode == 'all') {
            $laporan = $this->M_laporan_view->get_all_pdfs();
        } else {
            $laporan = $this->M_laporan_view->get_pdf_by_kategori($periode);
        }
        
        // Format data untuk view v_laporan
        $formatted_data = array();
        foreach($laporan as $item) {
            $formatted_data[] = (object) array(
                'id' => $item['id'],
                'jenis_laporan' => $item['jenis_laporan'],
                'periode' => $item['periode'],
                'nama_file' => $item['nama_file'],
                'bukti_file' => $item['bukti_file'],
                'tanggal' => $item['tanggal']
            );
        }
        
        echo json_encode($formatted_data);
    }

    // Search laporan
    public function search() {
        $keyword = $this->input->get('q');
        $kategori = $this->input->get('kategori');

        $data['page_title'] = 'Hasil Pencarian: ' . $keyword;
        
        // Gunakan method search dari model
        $result = $this->M_laporan_view->search_pdf($keyword, $kategori);
        
        // Format data untuk view
        $formatted_data = array();
        foreach($result as $item) {
            $formatted_data[] = (object) array(
                'id' => $item['id'],
                'jenis_laporan' => $item['jenis_laporan'],
                'periode' => $item['periode'],
                'nama_file' => $item['nama_file'],
                'bukti_file' => $item['bukti_file'],
                'tanggal' => $item['tanggal']
            );
        }
        
        $data['laporan'] = $formatted_data;
        $data['keyword'] = $keyword;

        $this->load->view('v_laporan', $data);
    }

    // Get laporan by jenis (PPID, Kompu, SKM)
    public function jenis($jenis = null) {
        if (!$jenis) {
            redirect('laporan_view');
        }

        $data['page_title'] = 'Laporan ' . $jenis;
        $result = $this->M_laporan_view->get_pdf_by_jenis($jenis);
        
        // Format data untuk view
        $formatted_data = array();
        foreach($result as $item) {
            $formatted_data[] = (object) array(
                'id' => $item['id'],
                'jenis_laporan' => $item['jenis_laporan'],
                'periode' => $item['periode'],
                'nama_file' => $item['nama_file'],
                'bukti_file' => $item['bukti_file'],
                'tanggal' => $item['tanggal']
            );
        }
        
        $data['laporan'] = $formatted_data;
        $this->load->view('v_laporan', $data);
    }
}