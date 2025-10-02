<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_layanan_informasi extends CI_Model {

    private $table = 'layanan_informasi';
    private $pk    = 'no'; // primary key

    // CREATE
    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // READ - semua data
    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    // READ - berdasarkan ID
    public function get_by_id($id)
    {
        return $this->db->where($this->pk, $id)
                        ->get($this->table)
                        ->row();
    }

    // UPDATE
    public function update($id, $data)
    {
        return $this->db->where($this->pk, $id)
                        ->update($this->table, $data);
    }

    // DELETE
    public function delete($id)
    {
        return $this->db->where($this->pk, $id)
                        ->delete($this->table);
    }
}
