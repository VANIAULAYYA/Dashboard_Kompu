<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_view extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('upload');
    }

    // Halaman utama view laporan
    public function index() {
        $data['page_title'] = 'Sistem Informasi Layanan Publik - PPID';
        $data['laporan'] = $this->get_manual_laporan();
        
        $this->load->view('v_laporan', $data);
    }

    // Halaman upload dokumen manual
    public function upload() {
        $data['page_title'] = 'Upload Dokumen Manual';
        
        if ($this->input->post('submit')) {
            $upload_result = $this->process_upload();
            if ($upload_result['status'] == 'success') {
                $data['success'] = $upload_result['message'];
            } else {
                $data['error'] = $upload_result['message'];
            }
        }
        
        $this->load->view('v_upload', $data);
    }

    // Get data laporan manual (hardcoded)
    private function get_manual_laporan() {
        return array(
            (object) array(
                'id' => 1,
                'jenis_laporan' => 'PPID',
                'periode' => 'Triwulan',
                'nama_file' => 'Laporan PPID Triwulan I 2024',
                'bukti_file' => base_url('assets/documents/sample1.pdf'),
                'tanggal' => '2024-03-31'
            ),
            (object) array(
                'id' => 2,
                'jenis_laporan' => 'Kompu',
                'periode' => 'Semester',
                'nama_file' => 'Laporan Komputer Semester I 2024',
                'bukti_file' => base_url('assets/documents/sample2.pdf'),
                'tanggal' => '2024-06-30'
            ),
            (object) array(
                'id' => 3,
                'jenis_laporan' => 'SKM',
                'periode' => 'Tahunan',
                'nama_file' => 'Laporan SKM Tahunan 2023',
                'bukti_file' => base_url('assets/documents/sample3.pdf'),
                'tanggal' => '2023-12-31'
            ),
            (object) array(
                'id' => 4,
                'jenis_laporan' => 'PPID',
                'periode' => 'Triwulan',
                'nama_file' => 'Laporan Informasi Publik Triwulan II',
                'bukti_file' => base_url('assets/documents/sample4.pdf'),
                'tanggal' => '2024-06-30'
            ),
            (object) array(
                'id' => 5,
                'jenis_laporan' => 'Kompu',
                'periode' => 'Tahunan',
                'nama_file' => 'Laporan Infrastruktur TI 2023',
                'bukti_file' => base_url('assets/documents/sample5.pdf'),
                'tanggal' => '2023-12-31'
            )
        );
    }

    // Process upload file manual
    private function process_upload() {
        $config['upload_path'] = FCPATH . 'assets/documents/';
        $config['allowed_types'] = 'pdf|doc|docx';
        $config['max_size'] = 10240; // 10MB
        $config['encrypt_name'] = true;

        // Create directory if not exists
        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, true);
        }

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('document_file')) {
            return array(
                'status' => 'error',
                'message' => $this->upload->display_errors()
            );
        }

        $upload_data = $this->upload->data();

        return array(
            'status' => 'success',
            'message' => 'Dokumen berhasil diupload: ' . $upload_data['file_name'],
            'file_data' => $upload_data
        );
    }

    // AJAX endpoint untuk filter periode (manual data)
    public function get_ppid_periode() {
        $periode = $this->input->post('periode');
        $all_laporan = $this->get_manual_laporan();
        
        if ($periode == 'all') {
            $filtered_laporan = $all_laporan;
        } else {
            $filtered_laporan = array();
            foreach ($all_laporan as $laporan) {
                if ($laporan->periode == $periode) {
                    $filtered_laporan[] = $laporan;
                }
            }
        }
        
        echo json_encode($filtered_laporan);
    }

    // View laporan spesifik
    public function view($id = null) {
        if (!$id) {
            redirect('laporan_view');
        }

        $all_laporan = $this->get_manual_laporan();
        $selected_laporan = null;
        
        foreach ($all_laporan as $laporan) {
            if ($laporan->id == $id) {
                $selected_laporan = $laporan;
                break;
            }
        }
        
        if (!$selected_laporan) {
            show_404();
        }

        $data['page_title'] = 'View Laporan - ' . $selected_laporan->nama_file;
        $data['laporan'] = array($selected_laporan);
        
        $this->load->view('v_laporan', $data);
    }
}