<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_layanan_pengaduan');
        $this->load->helper(['form', 'url']);
    }

    // READ
    public function index()
    {
        $data['Pengaduan'] = $this->M_layanan_pengaduan->get_all();
        $this->load->view('admin/v_layanan_pengaduan', $data);
    }

    // CREATE - tampil form tambah
    public function tambah()
    {
        $this->load->view('admin/v_pengaduan_form');
    }

    // CREATE - simpan data baru
    public function simpan()
    {
        $data = [
            'via'          => $this->input->post('via'),
            'jenis'        => $this->input->post('jenis'),
            'pengirim'     => $this->input->post('pengirim'),
            'tanggal'      => $this->input->post('tanggal'),
            'nomor_surat'  => $this->input->post('nomor_surat'),
            'perihal'      => $this->input->post('perihal'),
            'diterima_ppid'=> $this->input->post('diterima_ppid'),
            'tindaklanjut' => $this->input->post('tindaklanjut'),
            'keterangan'   => $this->input->post('keterangan'),
            'sumber'       => $this->input->post('sumber'),
            'status'      => $this->input->post('status'),
        ];

        $this->M_layanan_pengaduan->insert($data);
        redirect('Pengaduan');
    }

    // UPDATE - tampil form edit
    public function edit($no)
    {
        $data['Pengaduan'] = $this->M_layanan_pengaduan->get_by_id($no);

        if (!$data['Pengaduan']) {
            show_error("Data dengan ID $no tidak ditemukan");
        }

        $this->load->view('admin/v_pengaduan_edit', $data);
    }

    // UPDATE - simpan perubahan
    public function update()
{
    $no = $this->input->post('no');  // ambil dari hidden input

    $data = [
        'via'          => $this->input->post('via'),
        'jenis'        => $this->input->post('jenis'),
        'pengirim'     => $this->input->post('pengirim'),
        'tanggal'      => $this->input->post('tanggal'),
        'nomor_surat'  => $this->input->post('nomor_surat'),
        'perihal'      => $this->input->post('perihal'),
        'diterima_ppid'=> $this->input->post('diterima_ppid'),
        'tindaklanjut' => $this->input->post('tindaklanjut'),
        'keterangan'   => $this->input->post('keterangan'),
        'sumber'       => $this->input->post('sumber'),
        'status'       => $this->input->post('status'),
    ];

    $this->M_layanan_pengaduan->update($no, $data);
    redirect('Pengaduan');
}

    // DELETE
    public function delete($no)
    {
        $this->M_layanan_pengaduan->delete($no);
        redirect('Pengaduan');
    }
}
