<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('is_logged_in'))
{
    function is_logged_in()
    {
        $ci =& get_instance();
        if (!$ci->session->userdata('logged_in')) {
            redirect('login');
        }
    }
}

if ( ! function_exists('check_role'))
{
    function check_role($allowed_roles = array())
    {
        $ci =& get_instance();
        is_logged_in(); // Pastikan sudah login

        $user_role = $ci->session->userdata('role');
        if (!in_array($user_role, $allowed_roles)) {
            // Redirect ke halaman yang sesuai atau tampilkan pesan error
            if ($user_role == 'admin') {
                redirect('admin/dashboard');
            } elseif ($user_role == 'kepala_ppid') {
                redirect('kepala_ppid/dashboard');
            } elseif ($user_role == 'staff') {
                redirect('staff/dashboard');
            } else {
                redirect('login');
            }
        }
    }
}