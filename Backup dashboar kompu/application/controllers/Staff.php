<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        check_role(array('staff')); // Pastikan hanya staff yang bisa mengakses
        $this->load->model('Aduan_model');
        $this->load->library('form_validation');
    }

    public function dashboard()
    {
        $data['title'] = 'Dashboard Staff';
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar_staff');
        $this->load->view('staff/dashboard');
        $this->load->view('layouts/footer');
    }

    public function aduan()
    {
        $data['title'] = 'Data Aduan Saya';
        $id_user = $this->session->userdata('id_user');
        $data['aduan'] = $this->Aduan_model->get_aduan_by_user($id_user); // Hanya aduan yang diinput oleh staff tersebut
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar_staff');
        $this->load->view('staff/aduan_list', $data);
        $this->load->view('layouts/footer');
    }

    public function add_aduan()
    {
        $data['title'] = 'Tambah Aduan Baru';

        $this->form_validation->set_rules('judul_aduan', 'Judul Aduan', 'required');
        $this->form_validation->set_rules('deskripsi_aduan', 'Deskripsi Aduan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layouts/header', $data);
            $this->load->view('layouts/sidebar_staff');
            $this->load->view('staff/aduan_form');
            $this->load->view('layouts/footer');
        } else {
            $data_insert = array(
                'judul_aduan' => $this->input->post('judul_aduan'),
                'deskripsi_aduan' => $this->input->post('deskripsi_aduan'),
                'tanggal_aduan' => date('Y-m-d'),
                'status' => 'pending', // Default status saat input
                'id_user' => $this->session->userdata('id_user')
            );
            $this->Aduan_model->add_aduan($data_insert);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Aduan berhasil ditambahkan!</div>');
            redirect('staff/aduan');
        }
    }

    public function edit_aduan($id)
    {
        $data['title'] = 'Edit Aduan';
        $data['aduan'] = $this->Aduan_model->get_aduan_by_id($id);

        // Pastikan aduan yang diedit adalah milik staff yang sedang login
        if ($data['aduan']['id_user'] != $this->session->userdata('id_user')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda tidak memiliki akses untuk mengedit aduan ini!</div>');
            redirect('staff/aduan');
        }

        $this->form_validation->set_rules('judul_aduan', 'Judul Aduan', 'required');
        $this->form_validation->set_rules('deskripsi_aduan', 'Deskripsi Aduan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layouts/header', $data);
            $this->load->view('layouts/sidebar_staff');
            $this->load->view('staff/aduan_form', $data);
            $this->load->view('layouts/footer');
        } else {
            $data_update = array(
                'judul_aduan' => $this->input->post('judul_aduan'),
                'deskripsi_aduan' => $this->input->post('deskripsi_aduan')
            );
            $this->Aduan_model->update_aduan($id, $data_update);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Aduan berhasil diupdate!</div>');
            redirect('staff/aduan');
        }
    }

    public function delete_aduan($id)
    {
        $aduan = $this->Aduan_model->get_aduan_by_id($id);
        // Pastikan aduan yang dihapus adalah milik staff yang sedang login
        if ($aduan && $aduan['id_user'] == $this->session->userdata('id_user')) {
            $this->Aduan_model->delete_aduan($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Aduan berhasil dihapus!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda tidak memiliki akses untuk menghapus aduan ini!</div>');
        }
        redirect('staff/aduan');
    }
}