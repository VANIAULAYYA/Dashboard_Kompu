<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_layanan_informasi');
    }

    // Halaman utama (List data)
    public function index()
    {
        $data['Informasi'] = $this->M_layanan_informasi->get_all();
        $this->load->view('admin/v_layanan_informasi', $data);
    }

    // Form tambah
    public function tambah()
    {
        $this->load->view('admin/v_informasi_form');
    }

    // Proses simpan
    public function simpan()
    {
        $data = [
            'kegiatan'         => $this->input->post('kegiatan'),
            'lokasi'           => $this->input->post('lokasi'),
            'uraian'           => $this->input->post('uraian'),
            'tanggal'          => $this->input->post('tanggal'),
            'jumlah_like'      => 0, // default
            'jumlah_komentar'  => 0, // default
            'keterangan'       => $this->input->post('keterangan'),
            'bukti_tautan'       => $this->input->post('bukti_tautan'),
        ];

        $this->M_layanan_informasi->insert($data);
        redirect('Informasi');
    }

    // Form edit
    public function edit($id)
    {
        $data['Informasi'] = $this->M_layanan_informasi->get_by_id($id);
        $this->load->view('admin/v_informasi_edit', $data);
    }

    // Proses update
    public function update()
{
    $id = $this->input->post('no'); // ambil dari hidden input
    $data = [
        'kegiatan'        => $this->input->post('kegiatan'),
        'lokasi'          => $this->input->post('lokasi'),
        'uraian'          => $this->input->post('uraian'),
        'tanggal'         => $this->input->post('tanggal'),
        'jumlah_like'     => $this->input->post('jumlah_like'),
        'jumlah_komentar' => $this->input->post('jumlah_komentar'),
        'keterangan'      => $this->input->post('keterangan'),
        'bukti_tautan'    => $this->input->post('bukti_tautan'),
    ];

    $this->M_layanan_informasi->update($id, $data);
    redirect('Informasi');
}


    // Hapus
    public function delete($id)
    {
        $this->M_layanan_informasi->delete($id);
        redirect('Informasi');
    }
}
