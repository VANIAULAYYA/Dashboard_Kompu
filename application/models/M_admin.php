<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    // ========================
    // Statistik Buku Tamu
    // ========================
    public function count_tamu() {
        return $this->db->count_all('buku_tamu');
    }

    public function count_laki() {
        $this->db->where('jenis_kelamin', 'L');
        return $this->db->count_all_results('buku_tamu');
    }

    public function count_perempuan() {
        $this->db->where('jenis_kelamin', 'P');
        return $this->db->count_all_results('buku_tamu');
    }

    public function count_keperluan1() {
        $this->db->where('keperluan', 'Menemui Pejabat/Staf');
        return $this->db->count_all_results('buku_tamu');
    }
    
    public function count_keperluan2() {
        $this->db->where('keperluan', 'Rekomendasi Teknis (Rekomtek)');
        return $this->db->count_all_results('buku_tamu');
    }

    public function count_keperluan3() {
        $this->db->where('keperluan', 'Kirim Surat (Promosi/Aduan/Temuan)');
        return $this->db->count_all_results('buku_tamu');
    }
    
    public function count_keperluan4() {
        $this->db->where('keperluan', 'Permintaan Data/Informasi');
        return $this->db->count_all_results('buku_tamu');
    }

    public function count_keperluan5() {
        $this->db->where('keperluan', 'Lainnya'); // ganti biar beda
        return $this->db->count_all_results('buku_tamu');
    }

    // ========================
    // Statistik Aduan
    // ========================
    public function count_aduan() {
        return $this->db->count_all('aduan');
    }

    public function count_aduan_proses() {
        $this->db->where('status', 'proses');
        return $this->db->count_all_results('aduan');
    }

    // ========================
    // Buku Tamu CRUD
    // ========================
    public function get_tamu() {
        return $this->db->get('buku_tamu')->result();
    }

    public function get_tamu_by_id($id) {
        return $this->db->get_where('buku_tamu', ['id' => $id])->row();
    }

    public function insert_tamu($data) {
        return $this->db->insert('buku_tamu', $data);
    }

    public function update_tamu($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('buku_tamu', $data);
    }

    public function delete_tamu($id) {
        $this->db->where('id', $id);
        return $this->db->delete('buku_tamu');
    }

    // ========================
    // Aduan
    // ========================
    public function get_aduan() {
        return $this->db->get('aduan')->result();
    }
}
