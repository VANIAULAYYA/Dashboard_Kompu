<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_landing extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // ===============================
    // BAGIAN FEEDBACK
    // ===============================

    // Update status survei dan tanggal_survei
public function update_survei($nik, $data_survei) {
    $this->db->where('nik', $nik);
    return $this->db->update('buku_tamu', $data_survei);
}

// Cek NIK untuk validasi survei
public function validate_nik_survei($nik) {
    return $this->db->get_where('buku_tamu', [
        'nik' => $nik,
        'status_survei' => 'belum'
    ])->row();
}

// Get data user by NIK
public function get_user_by_nik($nik) {
    return $this->db->get_where('buku_tamu', ['nik' => $nik])->row();
}

// Atau jika ingin menggunakan nama insert_feedback
public function insert_feedback($data) {
    return $this->db->insert('buku_tamu', $data);
}

    // ===============================
    // BAGIAN LAPORAN
    // ===============================

    public function get_all($jenis = null)
    {
        if ($jenis) {
            $this->db->where('jenis_laporan', $jenis);
        }
        $this->db->order_by('id', 'DESC');
        return $this->db->get('laporan')->result();
    }

    public function insert($data)
    {
        return $this->db->insert('laporan', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('laporan', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('laporan');
    }

    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('laporan')->row();
    }

    // ===============================
    // METHOD UNIVERSAL (untuk Landing Page)
    // ===============================

    // Get list tahun berdasarkan jenis
    public function get_tahun_list($jenis)
    {
        $this->db->select('YEAR(tanggal) as tahun');
        $this->db->from('laporan');
        $this->db->where('jenis_laporan', $jenis);
        $this->db->group_by('YEAR(tanggal)');
        $this->db->order_by('tahun', 'DESC');
        return $this->db->get()->result_array();
    }

    // Get laporan by jenis dan tahun
    public function get_laporan_by_jenis_tahun($jenis, $tahun)
    {
        $this->db->select('*');
        $this->db->from('laporan');
        $this->db->where('jenis_laporan', $jenis);
        $this->db->where('YEAR(tanggal)', $tahun);
        $this->db->order_by('tanggal', 'ASC');
        return $this->db->get()->result_array();
    }

    // Get laporan by jenis
    public function get_laporan_by_jenis($jenis)
    {
        $this->db->select('*');
        $this->db->from('laporan');
        $this->db->where('jenis_laporan', $jenis);
        $this->db->order_by('tanggal', 'DESC');
        return $this->db->get()->result();
    }

    // Get laporan by jenis dan periode
    public function get_laporan_by_jenis_periode($jenis, $periode)
    {
        $this->db->select('*');
        $this->db->from('laporan');
        $this->db->where('jenis_laporan', $jenis);
        $this->db->where('periode', $periode);
        $this->db->order_by('tanggal', 'DESC');
        return $this->db->get()->result();
    }

    // ===============================
    // WRAPPER METHODS (untuk kemudahan)
    // ===============================

    // PPID
    public function get_ppid()
    {
        return $this->get_laporan_by_jenis('PPID');
    }

    public function get_ppid_periode($periode)
    {
        return $this->get_laporan_by_jenis_periode('PPID', $periode);
    }

    public function get_ppid_by_tahun($tahun)
    {
        return $this->get_laporan_by_jenis_tahun('PPID', $tahun);
    }

    // Kompu
    public function get_kompu()
    {
        return $this->get_laporan_by_jenis('Kompu');
    }

    public function get_kompu_periode($periode)
    {
        return $this->get_laporan_by_jenis_periode('Kompu', $periode);
    }

    public function get_kompu_by_tahun($tahun)
    {
        return $this->get_laporan_by_jenis_tahun('Kompu', $tahun);
    }

    // SKM
    public function get_skm()
    {
        return $this->get_laporan_by_jenis('SKM');
    }

    public function get_skm_periode($periode)
    {
        return $this->get_laporan_by_jenis_periode('SKM', $periode);
    }

    public function get_skm_by_tahun($tahun)
    {
        return $this->get_laporan_by_jenis_tahun('SKM', $tahun);
    }
}
