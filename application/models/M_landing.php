<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_landing extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // ===============================
    // BAGIAN FEEDBACK
    // ===============================

    // Insert feedback ke tabel buku_tamu
    public function insert_feedback($data) {
        $this->db->insert('buku_tamu', $data);
    }

    // ===============================
    // BAGIAN LAPORAN
    // ===============================

    // Ambil semua laporan PPID
    public function get_ppid() {
        $this->db->select('*');
        $this->db->from('laporan');
        $this->db->where('jenis_laporan', 'PPID');
        $this->db->order_by('tanggal', 'DESC');
        return $this->db->get()->result();
    }

    // Ambil laporan PPID berdasarkan periode (Triwulan, Semester, Tahunan)
    public function get_ppid_periode($periode) {
        $this->db->select('*');
        $this->db->from('laporan');
        $this->db->where('jenis_laporan', 'PPID');
        $this->db->like('periode', $periode);
        $this->db->order_by('tanggal', 'DESC');
        return $this->db->get()->result();
    }

    // Ambil laporan berdasarkan jenis tertentu
    public function get_laporan_by_jenis($jenis) {
        return $this->db->get_where('laporan', ['jenis_laporan' => $jenis])->result();
    }
}
