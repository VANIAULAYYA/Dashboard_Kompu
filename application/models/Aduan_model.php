<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aduan_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_aduan()
    {
        $this->db->select('aduan.*, users.username');
        $this->db->from('aduan');
        $this->db->join('users', 'users.id = aduan.id_user');
        return $this->db->get()->result_array();
    }

    public function get_aduan_by_id($id)
    {
        $this->db->select('aduan.*, users.username');
        $this->db->from('aduan');
        $this->db->join('users', 'users.id = aduan.id_user');
        $this->db->where('aduan.id', $id);
        return $this->db->get()->row_array();
    }

    public function get_aduan_by_user($id_user)
    {
        $this->db->select('aduan.*, users.username');
        $this->db->from('aduan');
        $this->db->join('users', 'users.id = aduan.id_user');
        $this->db->where('aduan.id_user', $id_user);
        return $this->db->get()->result_array();
    }

    public function add_aduan($data)
    {
        return $this->db->insert('aduan', $data);
    }

    public function update_aduan($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('aduan', $data);
    }

    public function delete_aduan($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('aduan');
    }
}