<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_layanan_permintaan_data');
        $this->load->helper(['form', 'url']);
    }

    // READ
    public function index()
    {
        $data['Layanan'] = $this->M_layanan_permintaan_data->get_all();
        $this->load->view('admin/v_layanan_permintaan_data', $data);
    }

    // CREATE - tampil form tambah
    public function tambah()
    {
        $this->load->view('admin/v_layanan_form');
    }

    // CREATE - simpan data baru
    public function simpan()
    {
        $data = [
            'via'               => $this->input->post('via'),
            'jenis'             => $this->input->post('jenis'),
            'pengirim'          => $this->input->post('pengirim'),
            'tanggal_surat'     => $this->input->post('tanggal_surat'),
            'nomor_surat'       => $this->input->post('nomor_surat'),
            'perihal'           => $this->input->post('perihal'),
            'diterima_ppid'     => $this->input->post('diterima_ppid'),
            'link_bukti_surat'  => $this->input->post('link_bukti_surat'),
            'tindak_lanjut'     => $this->input->post('tindak_lanjut'),
            'status'            => $this->input->post('status'),
            'link_bukti_surat_penyelesaian'    => $this->input->post('link_bukti_surat_penyelesaian'),
        ];

        $this->M_layanan_permintaan_data->insert($data);
        redirect('Layanan');
    }

    // UPDATE - tampil form edit
    public function edit($nomor)
{
    $data['Layanan'] = $this->M_layanan_permintaan_data->get_by_id($nomor);

    // Debug dulu
    if (!$data['Layanan']) {
        echo "<h3>Data tidak ditemukan untuk nomor: " . $nomor . "</h3>";
        echo "<pre>";
        print_r($this->db->last_query()); // cek query terakhir
        echo "</pre>";
        exit;
    }

    $this->load->view('admin/v_layanan_edit', $data);
}

    // UPDATE - simpan perubahan
    public function update()
{
    $nomor = $this->input->post('nomor'); // ambil dari form

    $data = [
            'via'               => $this->input->post('via'),
            'jenis'             => $this->input->post('jenis'),
            'pengirim'          => $this->input->post('pengirim'),
            'tanggal_surat'     => $this->input->post('tanggal_surat'),
            'nomor_surat'       => $this->input->post('nomor_surat'),
            'perihal'           => $this->input->post('perihal'),
            'diterima_ppid'     => $this->input->post('diterima_ppid'),
            'link_bukti_surat'  => $this->input->post('link_bukti_surat'),
            'tindak_lanjut'     => $this->input->post('tindak_lanjut'),
            'status'            => $this->input->post('status'),
            'link_bukti_surat_penyelesaian'    => $this->input->post('link_bukti_surat_penyelesaian'),
        ];

        $this->M_layanan_permintaan_data->update($nomor, $data);
        redirect('Layanan');
    }

    // DELETE
    public function delete($nomor)
    {
        $this->M_layanan_permintaan_data->delete($nomor);
        redirect('Layanan');
    }
}
