<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan_view extends CI_Model {

    private $table_laporan = 'laporan';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Get semua laporan
    public function get_all_pdfs($limit = null, $offset = 0) {
        $this->db->from($this->table_laporan);
        $this->db->order_by('urutan', 'ASC');
        $this->db->order_by('tanggal', 'DESC');
        
        if ($limit) {
            $this->db->limit($limit, $offset);
        }

        $query = $this->db->get();
        return $query->result_array();
    }

    // Get laporan by ID
    public function get_pdf_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table_laporan);
        return $query->row_array();
    }

    // Get laporan by kategori (periode)
    public function get_pdf_by_kategori($kategori, $limit = null) {
        $this->db->where('periode', $kategori);
        $this->db->order_by('urutan', 'ASC');
        $this->db->order_by('tanggal', 'DESC');
        
        if ($limit) {
            $this->db->limit($limit);
        }

        $query = $this->db->get($this->table_laporan);
        return $query->result_array();
    }

    // Get laporan by jenis laporan
    public function get_pdf_by_jenis($jenis, $limit = null) {
        $this->db->where('jenis_laporan', $jenis);
        $this->db->order_by('urutan', 'ASC');
        $this->db->order_by('tanggal', 'DESC');
        
        if ($limit) {
            $this->db->limit($limit);
        }

        $query = $this->db->get($this->table_laporan);
        return $query->result_array();
    }

    // Search laporan
    public function search_pdf($keyword, $kategori = null) {
        $this->db->from($this->table_laporan);
        
        if ($keyword) {
            $this->db->group_start();
            $this->db->like('nama_file', $keyword);
            $this->db->or_like('jenis_laporan', $keyword);
            $this->db->group_end();
        }

        if ($kategori) {
            $this->db->where('periode', $kategori);
        }

        $this->db->order_by('urutan', 'ASC');
        $this->db->order_by('tanggal', 'DESC');
        
        $query = $this->db->get();
        return $query->result_array();
    }

    // Insert laporan
    public function insert_pdf($data) {
        $this->db->insert($this->table_laporan, $data);
        return $this->db->insert_id();
    }

    // Update laporan
    public function update_pdf($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update($this->table_laporan, $data);
    }

    // Delete laporan
    public function delete_pdf($id) {
        $this->db->where('id', $id);
        return $this->db->delete($this->table_laporan);
    }

    // Count total laporan
    public function count_all_pdfs() {
        return $this->db->count_all($this->table_laporan);
    }

    // Get popular laporan (berdasarkan urutan)
    public function get_popular_pdfs($limit = 10) {
        $this->db->order_by('urutan', 'ASC');
        $this->db->order_by('tanggal', 'DESC');
        $this->db->limit($limit);
        
        $query = $this->db->get($this->table_laporan);
        return $query->result_array();
    }

    // Get recent laporan
    public function get_recent_pdfs($limit = 10) {
        $this->db->order_by('tanggal', 'DESC');
        $this->db->limit($limit);
        
        $query = $this->db->get($this->table_laporan);
        return $query->result_array();
    }

    // Untuk thumbnails - return array kosong karena tidak ada tabel thumbnails
    public function get_pdf_thumbnails($pdf_id) {
        return array(); // Tidak ada tabel thumbnails, return array kosong
    }
}