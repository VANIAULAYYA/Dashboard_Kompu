<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_layanan_permintaan_data extends CI_Model {

    private $table = 'layanan_permintaan_data';

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    public function get_by_id($nomor)
    {
        return $this->db->get_where($this->table, ['nomor' => $nomor])->row();
    }

    public function update($nomor, $data)
    {
        $this->db->where('nomor', $nomor);
        return $this->db->update($this->table, $data);
    }

    public function delete($nomor)
    {
        return $this->db->delete($this->table, ['nomor' => $nomor]);
    }

    // ========= METHOD BARU UNTUK FILTER SEPERTI DI ADMIN =========

    /**
     * Get data dengan filter tanggal
     * Mirip dengan get_tamu_with_filter() di M_admin
     */
    public function get_with_filter($date_range)
    {
        $this->db->from($this->table);
        
        // Jika ada filter tanggal
        if ($date_range['start'] !== null && $date_range['end'] !== null) {
            // Sesuaikan dengan nama kolom tanggal di tabel layanan_permintaan_data
            // Asumsi kolomnya adalah 'diterima_ppid' atau 'diterima_ppid'
            $this->db->where('diterima_ppid >=', $date_range['start']);
            $this->db->where('diterima_ppid <=', $date_range['end']);
        }
        
        $this->db->order_by('diterima_ppid', 'DESC');
        return $this->db->get()->result();
    }

    /**
     * Get available years dari data yang ada
     * Mirip dengan get_available_years() di M_admin
     */
    public function get_available_years()
    {
        $this->db->select('YEAR(diterima_ppid) as tahun');
        $this->db->from($this->table);
        $this->db->group_by('YEAR(diterima_ppid)');
        $this->db->order_by('tahun', 'DESC');
        
        $result = $this->db->get()->result();
        
        $years = [];
        foreach ($result as $row) {
            if (!empty($row->tahun)) {
                $years[] = $row->tahun;
            }
        }
        
        return $years;
    }

    /**
     * Count total data
     * Untuk keperluan dashboard seperti di Admin
     */
    public function count_all()
    {
        return $this->db->count_all($this->table);
    }

    /**
     * Count data by status
     * Untuk keperluan dashboard seperti di Admin
     */
    public function count_by_status($status)
    {
        $this->db->where('status', $status);
        return $this->db->count_all_results($this->table);
    }

    /**
     * Get data untuk chart/grafik
     * Contoh: data per bulan dalam tahun tertentu
     */
    public function get_chart_data($tahun = null)
    {
        if ($tahun === null) {
            $tahun = date('Y');
        }
        
        $this->db->select('MONTH(diterima_ppid) as bulan, COUNT(*) as total');
        $this->db->from($this->table);
        $this->db->where('YEAR(diterima_ppid)', $tahun);
        $this->db->group_by('MONTH(diterima_ppid)');
        $this->db->order_by('bulan', 'ASC');
        
        return $this->db->get()->result();
    }

    /**
     * Get data terbaru (untuk dashboard)
     */
    public function get_recent($limit = 5)
    {
        $this->db->order_by('diterima_ppid', 'DESC');
        $this->db->limit($limit);
        return $this->db->get($this->table)->result();
    }
}