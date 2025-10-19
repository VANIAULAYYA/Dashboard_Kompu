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

    // ========= METHOD BARU UNTUK FILTER SEPERTI DI ADMIN =========

    /**
     * Get data dengan filter tanggal
     * Asumsi kolom tanggalnya adalah 'tanggal'
     */
    public function get_with_filter($date_range)
    {
        $this->db->from($this->table);
        
        // Jika ada filter tanggal
        if ($date_range['start'] !== null && $date_range['end'] !== null) {
            $this->db->where('tanggal >=', $date_range['start']);
            $this->db->where('tanggal <=', $date_range['end']);
        }
        
        $this->db->order_by('tanggal', 'DESC');
        return $this->db->get()->result();
    }

    /**
     * Get available years dari data yang ada
     * Asumsi kolom tanggalnya adalah 'tanggal'
     */
    public function get_available_years()
    {
        $this->db->select('YEAR(tanggal) as tahun');
        $this->db->from($this->table);
        $this->db->group_by('YEAR(tanggal)');
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
     * Untuk keperluan dashboard
     */
    public function count_all()
    {
        return $this->db->count_all($this->table);
    }

    /**
     * Count data by lokasi/kegiatan tertentu
     * Untuk keperluan dashboard
     */
    public function count_by_field($field, $value)
    {
        $this->db->where($field, $value);
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
        
        $this->db->select('MONTH(tanggal) as bulan, COUNT(*) as total');
        $this->db->from($this->table);
        $this->db->where('YEAR(tanggal)', $tahun);
        $this->db->group_by('MONTH(tanggal)');
        $this->db->order_by('bulan', 'ASC');
        
        return $this->db->get()->result();
    }

    /**
     * Get data terbaru (untuk dashboard)
     */
    public function get_recent($limit = 5)
    {
        $this->db->order_by('tanggal', 'DESC');
        $this->db->limit($limit);
        return $this->db->get($this->table)->result();
    }

    /**
     * Get popular content berdasarkan like/komentar
     */
    public function get_popular($limit = 5)
    {
        $this->db->order_by('jumlah_like', 'DESC');
        $this->db->order_by('jumlah_komentar', 'DESC');
        $this->db->limit($limit);
        return $this->db->get($this->table)->result();
    }

    /**
     * Get statistics untuk dashboard
     */
    public function get_statistics()
    {
        $stats = [
            'total_informasi' => $this->count_all(),
            'total_likes' => $this->get_total_likes(),
            'total_comments' => $this->get_total_comments(),
            'recent_activities' => $this->get_recent(3)
        ];
        
        return $stats;
    }

    /**
     * Get total likes dari semua informasi
     */
    public function get_total_likes()
    {
        $this->db->select_sum('jumlah_like');
        $result = $this->db->get($this->table)->row();
        return $result->jumlah_like ?: 0;
    }

    /**
     * Get total comments dari semua informasi
     */
    public function get_total_comments()
    {
        $this->db->select_sum('jumlah_komentar');
        $result = $this->db->get($this->table)->row();
        return $result->jumlah_komentar ?: 0;
    }

    /**
     * Search informasi berdasarkan keyword
     */
    public function search($keyword)
    {
        $this->db->like('kegiatan', $keyword);
        $this->db->or_like('lokasi', $keyword);
        $this->db->or_like('uraian', $keyword);
        $this->db->or_like('keterangan', $keyword);
        
        return $this->db->get($this->table)->result();
    }
}