<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_layanan_pengaduan extends CI_Model {

    private $table = 'layanan_pengaduan'; // nama tabel di DB
    private $pk    = 'no'; // primary key sesuai SQL dump

    // CREATE
    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // READ - semua data
    public function get_all()
    {
        return $this->db->order_by($this->pk, 'ASC')
                        ->get($this->table)
                        ->result();
    }

    // READ - berdasarkan ID
    public function get_by_id($no)
    {
        return $this->db->where($this->pk, $no)
                        ->get($this->table)
                        ->row();
    }

    // UPDATE
    public function update($no, $data)
    {
        return $this->db->where($this->pk, $no)
                        ->update($this->table, $data);
    }

    // DELETE
    public function delete($no)
    {
        return $this->db->where($this->pk, $no)
                        ->delete($this->table);
    }

    // OPTIONAL: hitung jumlah record
    public function count_all()
    {
        return $this->db->count_all($this->table);
    }
}
