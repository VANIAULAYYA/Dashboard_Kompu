<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in')) {
            $role = $this->session->userdata('role');
            if ($role == 'admin') {
                redirect('admin/dashboard');
            } elseif ($role == 'kepala_ppid') {
                redirect('kepala_ppid/dashboard');
            } elseif ($role == 'staff') {
                redirect('staff/dashboard');
            }
        }

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->User_model->get_user_by_username($username);

            if ($user && password_verify($password, $user['password'])) {
                $session_data = array(
                    'id_user' => $user['id'],
                    'username' => $user['username'],
                    'role' => $user['role'],
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($session_data);

                if ($user['role'] == 'admin') {
                    redirect('admin/dashboard');
                } elseif ($user['role'] == 'kepala_ppid') {
                    redirect('kepala_ppid/dashboard');
                } elseif ($user['role'] == 'staff') {
                    redirect('staff/dashboard');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username atau Password salah!</div>');
                redirect('login');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata(array('id_user', 'username', 'role', 'logged_in'));
        $this->session->sess_destroy();
        redirect('login');
    }
}