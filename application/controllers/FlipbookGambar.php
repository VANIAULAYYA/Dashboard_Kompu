<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pdf_model');
        $this->load->helper('url');
    }

    // Halaman utama PDF viewer
    public function index() {
        $data['title'] = 'PDF Viewer dengan Thumbnail Navigation';
        $data['pdf_list'] = $this->Pdf_model->get_all_pdfs();
        
        $this->load->view('pdf/viewer', $data);
    }

    // View PDF spesifik berdasarkan ID
    public function view($id = null) {
        if (!$id) {
            redirect('pdf');
        }

        $pdf = $this->Pdf_model->get_pdf_by_id($id);
        
        if (!$pdf) {
            show_404();
        }

        $data['title'] = 'View PDF - ' . $pdf['judul'];
        $data['pdf'] = $pdf;
        $data['thumbnails'] = $this->Pdf_model->get_pdf_thumbnails($id);
        
        $this->load->view('pdf/viewer_detail', $data);
    }

    // Halaman upload PDF (Admin)
    public function upload() {
        // Cek login admin
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }

        if ($this->input->post('submit')) {
            $config['upload_path'] = './assets/pdf/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 10240; // 10MB
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('pdf_file')) {
                $upload_data = $this->upload->data();
                
                $pdf_data = array(
                    'judul' => $this->input->post('judul'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'filename' => $upload_data['file_name'],
                    'file_path' => 'assets/pdf/' . $upload_data['file_name'],
                    'file_size' => $upload_data['file_size'],
                    'total_halaman' => $this->input->post('total_halaman'),
                    'kategori' => $this->input->post('kategori'),
                    'uploaded_by' => $this->session->userdata('user_id'),
                    'created_at' => date('Y-m-d H:i:s')
                );

                $pdf_id = $this->Pdf_model->insert_pdf($pdf_data);

                // Insert thumbnails jika ada
                $thumbnails = $this->input->post('thumbnails');
                if ($thumbnails && is_array($thumbnails)) {
                    foreach ($thumbnails as $thumb) {
                        $this->Pdf_model->insert_thumbnail(array(
                            'pdf_id' => $pdf_id,
                            'halaman' => $thumb['halaman'],
                            'judul' => $thumb['judul'],
                            'icon' => $thumb['icon']
                        ));
                    }
                }

                $this->session->set_flashdata('success', 'PDF berhasil diupload!');
                redirect('pdf/view/' . $pdf_id);
            } else {
                $data['error'] = $this->upload->display_errors();
            }
        }

        $data['title'] = 'Upload PDF';
        $this->load->view('pdf/upload', $data);
    }

    // Delete PDF
    public function delete($id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }

        $pdf = $this->Pdf_model->get_pdf_by_id($id);
        
        if ($pdf) {
            // Hapus file fisik
            if (file_exists($pdf['file_path'])) {
                unlink($pdf['file_path']);
            }

            // Hapus dari database
            $this->Pdf_model->delete_pdf($id);
            
            $this->session->set_flashdata('success', 'PDF berhasil dihapus!');
        }

        redirect('pdf');
    }

    // Update thumbnail
    public function update_thumbnail($id) {
        if (!$this->session->userdata('logged_in')) {
            echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
            return;
        }

        $thumbnail_data = array(
            'judul' => $this->input->post('judul'),
            'icon' => $this->input->post('icon')
        );

        $result = $this->Pdf_model->update_thumbnail($id, $thumbnail_data);

        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'Thumbnail berhasil diupdate']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal update thumbnail']);
        }
    }

    // Get PDF data (AJAX)
    public function get_pdf_data($id) {
        $pdf = $this->Pdf_model->get_pdf_by_id($id);
        
        if ($pdf) {
            echo json_encode([
                'status' => 'success',
                'data' => $pdf
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'PDF tidak ditemukan'
            ]);
        }
    }

    // Search PDF
    public function search() {
        $keyword = $this->input->get('q');
        $kategori = $this->input->get('kategori');

        $data['title'] = 'Hasil Pencarian: ' . $keyword;
        $data['pdf_list'] = $this->Pdf_model->search_pdf($keyword, $kategori);
        $data['keyword'] = $keyword;

        $this->load->view('pdf/search_results', $data);
    }
}