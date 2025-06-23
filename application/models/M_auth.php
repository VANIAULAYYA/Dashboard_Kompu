<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Cek username di database
    public function check_login($username) {
        $this->db->where('username', $username);
        return $this->db->get('admin')->row();
    }

    // Update last login
    public function update_last_login($id) {
        $data = array(
            'last_login' => date('Y-m-d H:i:s')
        );
        $this->db->where('id', $id);
        $this->db->update('admin', $data);
    }
}
?>