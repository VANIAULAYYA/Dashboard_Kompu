<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_user_by_username($username)
    {
        return $this->db->get_where('users', array('username' => $username))->row_array();
    }

    public function get_all_users()
    {
        return $this->db->get('users')->result_array();
    }

    public function get_user_by_id($id)
    {
        return $this->db->get_where('users', array('id' => $id))->row_array();
    }

    public function add_user($data)
    {
        return $this->db->insert('users', $data);
    }

    public function update_user($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    public function delete_user($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('users');
    }
}