<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permohonan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_permohonan');
        $this->load->library('session');
    }

    // Tampilkan form permohonan informasi
    public function form_permohonan() {
        // Cek apakah ada data buku tamu di session
        if (!$this->session->userdata('buku_tamu_data')) {
            $this->session->set_flashdata('error', 'Data buku tamu tidak ditemukan. Silakan isi buku tamu terlebih dahulu.');
            redirect('views/v_landing');
        }
        
        $data['bukuTamu'] = $this->session->userdata('buku_tamu_data');
        $data['bukuTamuId'] = $this->session->userdata('buku_tamu_id');
        $data['title'] = 'Formulir Permohonan Informasi';
        
        $this->load->view('v_form_permohonan', $data);
    }

    // Simpan data permohonan informasi
    public function simpan_permohonan() {
        // Validasi form
        $this->form_validation->set_rules('jenis_pemohon', 'Jenis Pemohon', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('uraian_informasi', 'Rincian Informasi', 'required');
        $this->form_validation->set_rules('tujuan_penggunaan', 'Tujuan Penggunaan', 'required');
        $this->form_validation->set_rules('cara_memperoleh_informasi', 'Cara Memperoleh Informasi', 'required');
        $this->form_validation->set_rules('cara_salinan', 'Cara Mendapatkan Salinan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('permohonan/form_permohonan');
        }

        // Ambil data buku_tamu dari session/database
        $buku_tamu_id = $this->input->post('buku_tamu_id');
        $buku_tamu = $this->db->get_where('buku_tamu', ['id' => $buku_tamu_id])->row_array();

        if (!$buku_tamu) {
            $this->session->set_flashdata('error', 'Data buku tamu tidak ditemukan');
            redirect('permohonan/form_permohonan');
        }

        // Data untuk disimpan ke layanan_permintaan_data
        $data = array(
            'via' => 'Langsung',
            'status_pemohon' => $this->input->post('jenis_pemohon'),
            'pengirim' => $buku_tamu['nama'],
            'tanggal_surat' => date('Y-m-d'),
            'nomor_surat' => $this->M_permohonan->generate_nomor_pendaftaran(),
            'perihal' => $this->input->post('uraian_informasi'),
            'diterima_ppid' => date('Y-m-d'),
            'status' => 'pending',
            'nomor_identitas' => $buku_tamu['nik'] ?? '',
            'alamat' => $this->input->post('alamat'),
            'nomor_telepon' => $buku_tamu['no_handphone'],
            'email' => $buku_tamu['email'] ?? '',
            'rincian_informasi' => $this->input->post('uraian_informasi'),
            'tujuan_penggunaan' => $this->input->post('tujuan_penggunaan'),
            'cara_memperoleh_informasi' => $this->input->post('cara_memperoleh_informasi'),
            'cara_mendapatkan_salinan' => $this->input->post('cara_salinan'),
            'ttd_data' => $this->input->post('tanda_tangan') ?? ''
        );

        // Simpan ke layanan_permintaan_data
        $this->db->insert('layanan_permintaan_data', $data);
        $insert_id = $this->db->insert_id();

        if ($insert_id) {
            // ========== ✅ TAMBAHKAN AUTO GENERATE PDF DI SINI ==========
            $pdf_path = $this->generate_pdf_document($insert_id);
            
            // Update database dengan path PDF
            $this->db->where('nomor', $insert_id);
            $this->db->update('layanan_permintaan_data', ['pdf_path' => $pdf_path]);
            // ============================================================
            
            // Hapus session setelah berhasil disimpan
            $this->session->unset_userdata('buku_tamu_data');
            $this->session->unset_userdata('buku_tamu_id');
            
            // Redirect ke halaman cetak
            redirect('permohonan/cetak_permohonan/' . $insert_id);
        } else {
            $this->session->set_flashdata('error', 'Gagal menyimpan permohonan informasi');
            redirect('permohonan/form_permohonan');
        }
    }

    // ========== ✅ TAMBAHKAN FUNCTION INI ==========
    private function generate_pdf_document($id_permohonan) 
    {
        // Load data permohonan
        $permohonan = $this->db->get_where('layanan_permintaan_data', ['nomor' => $id_permohonan])->row();
        
        $data['permohonan'] = $permohonan;
        
        // Generate HTML content untuk PDF - GUNAKAN VIEW YANG SAMA
        $html_content = $this->load->view('cetak_formulir', $data, TRUE);
        
        // Nama file PDF
        $filename = 'formulir_permohonan_' . $id_permohonan . '_' . date('YmdHis') . '.html';
        $filepath = 'uploads/documents/' . $filename;
        
        // Buat folder jika belum ada
        if (!is_dir(FCPATH . 'uploads/documents/')) {
            mkdir(FCPATH . 'uploads/documents/', 0777, TRUE);
        }
        
        // Simpan sebagai file HTML
        file_put_contents(FCPATH . $filepath, $html_content);
        
        return $filepath;
    }

    // ✅ MODIFIKASI function cetak_permohonan
public function cetak_permohonan($nomor_permohonan) {
    // Simpan URL return dari referer
    if ($this->input->server('HTTP_REFERER')) {
        $this->session->set_userdata('pdf_return_url', $this->input->server('HTTP_REFERER'));
    }
    
    $this->session->set_userdata('pdf_source', 'user'); // Tandai dari user
    $this->load->model('M_permohonan');
    $data['permohonan'] = $this->M_permohonan->get_permohonan_for_cetak($nomor_permohonan);
    
    if (!$data['permohonan']) {
        show_404();
    }
    
    $this->load->view('cetak_formulir', $data);
}

    // Tambahkan method ini di controller Permohonan
    public function preview_dokumen() {
        // Ambil data dari POST
        $data_preview = array(
            'nomor_surat' => $this->M_permohonan->generate_nomor_pendaftaran(),
            'tanggal_surat' => date('Y-m-d'),
            'pengirim' => $this->input->post('nama') ?? $this->session->userdata('buku_tamu_data')['nama'],
            'alamat' => $this->input->post('alamat'),
            'nomor_telepon' => $this->input->post('no_handphone') ?? $this->session->userdata('buku_tamu_data')['no_handphone'],
            'email' => $this->input->post('email') ?? $this->session->userdata('buku_tamu_data')['email'],
            'status_pemohon' => $this->input->post('jenis_pemohon'),
            'rincian_informasi' => $this->input->post('uraian_informasi'),
            'tujuan_penggunaan' => $this->input->post('tujuan_penggunaan'),
            'cara_mendapatkan_salinan' => $this->input->post('cara_salinan'),
            'ttd_data' => $this->input->post('tanda_tangan'),
            'via' => 'Langsung'
        );
        
        // Load view preview
        $this->load->view('preview_dokumen', $data_preview);
    }

    // Buat method baru untuk clear session setelah cetak
    public function setelah_cetak() {
        $this->session->unset_userdata('buku_tamu_data');
        $this->session->unset_userdata('buku_tamu_id');
        redirect('Landing');
    }

    // ✅ TAMBAHKAN FUNCTION INI untuk handle tombol tutup dari landing
public function back()
{
    $return_url = $this->session->userdata('pdf_return_url');
    $this->session->unset_userdata('pdf_return_url');
    
    if ($return_url) {
        redirect($return_url);
    } else {
        // Fallback ke landing
        redirect('Landing');
    }
}
}