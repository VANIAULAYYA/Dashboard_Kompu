<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('M_admin');
        if(!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
    }

    // Dashboard
    public function index() {
        $data = [
            'title' => 'Dashboard Admin',
            'total_tamu' => $this->M_admin->count_tamu(),
            'laki' => $this->M_admin->count_laki(),
            'perempuan' => $this->M_admin->count_perempuan(),
            'total_aduan' => $this->M_admin->count_aduan(),
            'aduan_proses' => $this->M_admin->count_aduan_proses(),
            'keperluan1' => $this->M_admin->count_keperluan1(),
            'keperluan2' => $this->M_admin->count_keperluan2(),
            'keperluan3' => $this->M_admin->count_keperluan3(),
            'keperluan4' => $this->M_admin->count_keperluan4(),
            'content' => 'admin/dashboard'
        ];
        $this->load->view('admin/v_admin', $data);
    }

    // 📖 Rekap Buku Tamu
    public function rekap_tamu() {
        $data = [
            'title' => 'Kelola Buku Tamu',
            'tamu' => $this->M_admin->get_tamu(),
            'content' => 'admin/buku_tamu'
        ];
        $this->load->view('admin/v_buku_tamu_2',$data);
    }

    // ➕ Form Tambah Tamu
    public function tambah_tamu() {
        $this->load->view('admin/v_rekap_tamu_form');
    }

    // 💾 Simpan Tamu Baru
    public function simpan_tamu() {
        $data = [
            'nama'           => $this->input->post('nama'),
            'jenis_kelamin'  => $this->input->post('jenis_kelamin'),
            'asal_instansi'  => $this->input->post('asal_instansi'),
            'no_handphone'   => $this->input->post('no_handphone'),
            'keperluan'      => $this->input->post('keperluan'),
            'kritik_saran'   => $this->input->post('kritik_saran'),
        ];
        $this->M_admin->insert_tamu($data);
        redirect('Admin/rekap_tamu');
    }

    // ✏️ Form Edit Tamu
    public function edit_tamu($id) {
        $data['tamu'] = $this->M_admin->get_tamu_by_id($id);
        $this->load->view('admin/v_rekap_tamu_edit', $data);
    }

    // 🔄 Update Tamu
public function update_tamu() {
    $id = $this->input->post('id'); // ambil dari hidden input
    
    $data = [
        'nama'           => $this->input->post('nama'),
        'jenis_kelamin'  => $this->input->post('jenis_kelamin'),
        'asal_instansi'  => $this->input->post('asal_instansi'),
        'no_handphone'   => $this->input->post('no_handphone'),
        'keperluan'      => $this->input->post('keperluan'),
        'kritik_saran'   => $this->input->post('kritik_saran'),
    ];
    
    $this->M_admin->update_tamu($id, $data);
    redirect('Admin/rekap_tamu');
}


    // 🗑️ Delete Tamu
    public function delete_tamu($id) {
        $this->M_admin->delete_tamu($id);
        redirect('Admin/rekap_tamu');
    }

    // ========= Layanan lain tetap sama =========
    public function layanan_kepuasan() {
        $data = [
            'title' => 'Kelola Buku Tamu',
            'tamu' => $this->M_admin->get_tamu(),
            'content' => 'admin/buku_tamu'
        ];
        $this->load->view('admin/v_layanan_kepuasan',$data);
    }

    public function buku_tamu() {
        $data = [
            'title' => 'Kelola Buku Tamu',
            'tamu' => $this->M_admin->get_tamu(),
            'content' => 'admin/buku_tamu'
        ];
        $this->load->view('admin/v_admin', $data);
    }

    public function aduan() {
        $data = [
            'title' => 'Kelola Aduan',
            'aduan' => $this->M_admin->get_aduan(),
            'content' => 'admin/aduan'
        ];
        $this->load->view('admin/v_admin', $data);
    }

    public function data_pengguna() {
        $data = [
            'title' => 'Kelola Data',
            'content' => 'admin/data_pengguna'
        ];
        $this->load->view('admin/v_admin', $data);
    }

    public function monev_data() {
        $this->load->model('Monev_model');
        $data['monev'] = $this->Monev_model->getAll(); 
        $this->load->view('admin/v_monev', $data);
    }
}
