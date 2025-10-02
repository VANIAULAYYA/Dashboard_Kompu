<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model {

    // Ambil semua laporan berdasarkan jenis (PPID / KOMPU)
    public function get_all($jenis = null)
    {
        if ($jenis) {
            $this->db->where('jenis_laporan', $jenis);
        }
        $this->db->order_by('id', 'DESC'); // urutkan data terbaru di atas
        return $this->db->get('laporan')->result();
    }

    // Simpan laporan baru
    public function insert($data)
    {
        return $this->db->insert('laporan', $data);
    }

    // Update laporan berdasarkan id
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('laporan', $data);
    }

    // Hapus laporan berdasarkan id
    public function delete($id, $jenis = null)
{
    if ($id) {
        $this->db->where('id', $id);
        if ($jenis) {
            $this->db->where('jenis_laporan', $jenis);
        }
        return $this->db->delete('laporan');
    }
    return false;
}

    // Ambil laporan berdasarkan id (kalau mau buat detail/edit)
    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('laporan')->row();
    }
}
