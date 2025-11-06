<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_permohonan extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Simpan data permohonan informasi ke layanan_permintaan_data
    public function simpan_permohonan($data) {
        return $this->db->insert('layanan_permintaan_data', $data);
    }

    public function generate_nomor_pendaftaran() {
    // Cek ID terbesar di database (auto increment)
    $this->db->select_max('nomor');
    $result = $this->db->get('layanan_permintaan_data')->row();
    
    if ($result && !empty($result->nomor)) {
        return $result->nomor + 1;
    } else {
        return 1;
    }
}

    // Get semua data permohonan dari layanan_permintaan_data
    public function get_all_permohonan() {
        $this->db->select('lp.*, bt.nama, bt.asal_instansi, bt.no_handphone, bt.email');
        $this->db->from('layanan_permintaan_data lp');
        $this->db->join('buku_tamu bt', 'bt.id = lp.buku_tamu_id', 'left');
        $this->db->order_by('lp.nomor', 'DESC');
        return $this->db->get()->result();
    }

    // Get permohonan by ID dari layanan_permintaan_data
    public function get_permohonan_by_id($id) {
        $this->db->select('lp.*, bt.nama, bt.jenis_kelamin, bt.asal_instansi, bt.no_handphone, bt.email');
        $this->db->from('layanan_permintaan_data lp');
        $this->db->join('buku_tamu bt', 'bt.id = lp.buku_tamu_id', 'left');
        $this->db->where('lp.nomor', $id);
        return $this->db->get()->row();
    }

    // Update status permohonan di layanan_permintaan_data
    public function update_status($id, $status) {
        $this->db->where('nomor', $id);
        return $this->db->update('layanan_permintaan_data', array('status' => $status));
    }

    public function get_permohonan_for_cetak($nomor_permohonan) {
    // Ambil data permohonan saja
    $permohonan = $this->db->get_where('layanan_permintaan_data', ['nomor' => $nomor_permohonan])->row();
    
    if ($permohonan) {
        // Cari data buku tamu berdasarkan session atau data yang tersimpan
        $buku_tamu_id = $this->session->userdata('buku_tamu_id');
        
        if ($buku_tamu_id) {
            $buku_tamu = $this->db->get_where('buku_tamu', ['id' => $buku_tamu_id])->row();
            // TAMBAHKAN INI: simpan buku_tamu_id ke objek permohonan
            $permohonan->buku_tamu_id = $buku_tamu_id;
        } else {
            // Fallback: cari berdasarkan nama dan nomor telepon
            $this->db->where('nama', $permohonan->pengirim);
            $this->db->or_where('no_handphone', $permohonan->nomor_telepon);
            $buku_tamu = $this->db->get('buku_tamu')->row();
            if ($buku_tamu) {
                $permohonan->buku_tamu_id = $buku_tamu->id;
            }
        }
        
        // Jika ditemukan, tambahkan data buku tamu ke objek permohonan
        if ($buku_tamu) {
            $permohonan->nama = $buku_tamu->nama;
            $permohonan->nik = $buku_tamu->nik;
            $permohonan->no_handphone = $buku_tamu->no_handphone;
            $permohonan->email = $buku_tamu->email;
            $permohonan->asal_instansi = $buku_tamu->asal_instansi;
        }
    }
    
    return $permohonan;
}
}