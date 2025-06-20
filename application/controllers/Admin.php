<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        check_role(array('admin')); // Pastikan hanya admin yang bisa mengakses
        $this->load->model('Aduan_model');
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function dashboard()
    {
        $data['title'] = 'Dashboard Admin';
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar_admin');
        $this->load->view('admin/dashboard');
        $this->load->view('layouts/footer');
    }

    public function aduan()
    {
        $data['title'] = 'Data Aduan';
        $data['aduan'] = $this->Aduan_model->get_all_aduan();
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar_admin');
        $this->load->view('admin/aduan_list', $data);
        $this->load->view('layouts/footer');
    }

    public function edit_aduan($id)
    {
        $data['title'] = 'Edit Aduan';
        $data['aduan'] = $this->Aduan_model->get_aduan_by_id($id);

        $this->form_validation->set_rules('judul_aduan', 'Judul Aduan', 'required');
        $this->form_validation->set_rules('deskripsi_aduan', 'Deskripsi Aduan', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layouts/header', $data);
            $this->load->view('layouts/sidebar_admin');
            $this->load->view('admin/aduan_form', $data); // Buat view ini untuk edit
            $this->load->view('layouts/footer');
        } else {
            $data_update = array(
                'judul_aduan' => $this->input->post('judul_aduan'),
                'deskripsi_aduan' => $this->input->post('deskripsi_aduan'),
                'status' => $this->input->post('status')
            );
            $this->Aduan_model->update_aduan($id, $data_update);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data aduan berhasil diupdate!</div>');
            redirect('admin/aduan');
        }
    }

    public function delete_aduan($id)
    {
        $this->Aduan_model->delete_aduan($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data aduan berhasil dihapus!</div>');
        redirect('admin/aduan');
    }

    public function users()
    {
        $data['title'] = 'Manajemen Pengguna';
        $data['users'] = $this->User_model->get_all_users();
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar_admin');
        $this->load->view('admin/user_list', $data); // Buat view ini
        $this->load->view('layouts/footer');
    }

    public function add_user()
    {
        $data['title'] = 'Tambah Pengguna Baru';

        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('role', 'Role', 'required|in_list[admin,kepala_ppid,staff]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layouts/header', $data);
            $this->load->view('layouts/sidebar_admin');
            $this->load->view('admin/user_form', $data); // Buat view ini
            $this->load->view('layouts/footer');
        } else {
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $data_insert = array(
                'username' => $this->input->post('username'),
                'password' => $password,
                'role' => $this->input->post('role')
            );
            $this->User_model->add_user($data_insert);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengguna baru berhasil ditambahkan!</div>');
            redirect('admin/users');
        }
    }

    public function edit_user($id)
    {
        $data['title'] = 'Edit Pengguna';
        $data['user'] = $this->User_model->get_user_by_id($id);

        $this->form_validation->set_rules('username', 'Username', 'required|callback_unique_username['.$id.']'); // Custom callback untuk unique
        $this->form_validation->set_rules('role', 'Role', 'required|in_list[admin,kepala_ppid,staff]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layouts/header', $data);
            $this->load->view('layouts/sidebar_admin');
            $this->load->view('admin/user_form', $data); // Gunakan form yang sama
            $this->load->view('layouts/footer');
        } else {
            $data_update = array(
                'username' => $this->input->post('username'),
                'role' => $this->input->post('role')
            );
            // Hanya update password jika diisi
            if (!empty($this->input->post('password'))) {
                $data_update['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            }
            $this->User_model->update_user($id, $data_update);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data pengguna berhasil diupdate!</div>');
            redirect('admin/users');
        }
    }

    // Callback untuk validasi username unik saat edit
    public function unique_username($username, $id)
    {
        $user = $this->User_model->get_user_by_username($username);
        if ($user && $user['id'] != $id) {
            $this->form_validation->set_message('unique_username', 'Username ini sudah digunakan.');
            return FALSE;
        }
        return TRUE;
    }

    public function delete_user($id)
    {
        $this->User_model->delete_user($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengguna berhasil dihapus!</div>');
        redirect('admin/users');
    }
}