<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_auth');
        $this->load->library('form_validation');
    }

    // Halaman login
    public function index() {
        // Jika sudah login, redirect ke dashboard
        if($this->session->userdata('logged_in')) {
            redirect('admin');
        }

        $this->load->view('auth/v_login');
    }

    // Proses login
    public function login_process() {
        // Validasi form
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if($this->form_validation->run() == FALSE) {
            // Jika validasi gagal
            $this->session->set_flashdata('error', validation_errors());
            redirect('auth');
        } else {
            // Jika validasi sukses
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // Cek login
            $user = $this->M_auth->check_login($username);

            if($user) {
                // Verifikasi password
                if(password_verify($password, $user->password)) {
                    // Set session
                    $session_data = array(
                        'id'           => $user->id,
                        'username'     => $user->username,
                        'nama_lengkap' => $user->nama_lengkap,
                        'logged_in'    => TRUE
                    );
                    $this->session->set_userdata($session_data);

                    // Update last login
                    $this->M_auth->update_last_login($user->id);

                    // Redirect ke dashboard
                    redirect('Admin');
                } else {
                    $this->session->set_flashdata('error', 'Password salah!');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('error', 'Username tidak ditemukan!');
                redirect('auth');
            }
        }
    }

    // Logout
    public function logout() {
        // Hapus semua data session
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('nama_lengkap');
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();

        // Redirect ke halaman login
        redirect('auth');
    }

    // Halaman blocked (jika diperlukan)
    public function blocked() {
        $this->load->view('auth/blocked');
    }
}

?>