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
            redirect('Admin/rekap_tamu');
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
        // Jika validasi gagal, kembali ke form dengan error
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
        // Kolom lama (sesuai struktur existing)
        'via' => 'Langsung',
        'status_pemohon' => $this->input->post('jenis_pemohon'),
        'pengirim' => $buku_tamu['nama'],
        'tanggal_surat' => date('Y-m-d'),
        'nomor_surat' => $this->M_permohonan->generate_nomor_pendaftaran(),
        'perihal' => $this->input->post('uraian_informasi'),
        'diterima_ppid' => date('Y-m-d'),
        'status' => 'pending',
        
        // Kolom baru dari form permohonan
        'nomor_identitas' => $buku_tamu['nik'] ?? '',
        'alamat' => $this->input->post('alamat'),
        'nomor_telepon' => $buku_tamu['no_handphone'],
        'email' => $buku_tamu['email'] ?? '',
        'rincian_informasi' => $this->input->post('uraian_informasi'),
        'tujuan_penggunaan' => $this->input->post('tujuan_penggunaan'),
        'cara_memperoleh_informasi' => $this->input->post('cara_memperoleh_informasi'),
        'cara_mendapatkan_salinan' => $this->input->post('cara_salinan'),
        'ttd_data' => $this->input->post('tanda_tangan') ?? '' // jika ada TTD
    );

    // Simpan ke layanan_permintaan_data
    $this->db->insert('layanan_permintaan_data', $data);
    $insert_id = $this->db->insert_id();

    if ($insert_id) {
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

public function cetak_permohonan($nomor_permohonan) {
    $this->load->model('M_permohonan');
    $data['permohonan'] = $this->M_permohonan->get_permohonan_for_cetak($nomor_permohonan);
    
    // Ambil buku_tamu_id dari session
    $data['buku_tamu_id'] = $this->session->userdata('buku_tamu_id');
    
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
    redirect('Landing'); // atau halaman lain
}
}