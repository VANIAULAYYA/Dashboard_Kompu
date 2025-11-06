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
    return $this->db->order_by('diterima_ppid', 'ASC') // Ganti dari 'tanggal' ke 'diterima_ppid'
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

    // ========= METHOD BARU UNTUK FILTER SEPERTI DI ADMIN =========

    /**
     * Get data dengan filter tanggal
     * Asumsi kolom tanggalnya adalah 'tanggal'
     */
    public function get_with_filter($date_range = [])
{
    $this->db->from($this->table);
    
    // Jika ada filter tanggal
    if (!empty($date_range['start']) && !empty($date_range['end'])) {
        $this->db->where('diterima_ppid >=', $date_range['start']);
        $this->db->where('diterima_ppid <=', $date_range['end']);
    }
    
    $this->db->order_by('diterima_ppid', 'ASC'); // Ganti ke diterima_ppid
    return $this->db->get()->result();
}

    /**
     * Get available years dari data yang ada
     * Asumsi kolom tanggalnya adalah 'tanggal'
     */
    public function get_available_years()
{
    $this->db->select('YEAR(diterima_ppid) as tahun');
    $this->db->from($this->table);
    $this->db->where('diterima_ppid IS NOT NULL');
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
     * Count data by status
     * Untuk keperluan dashboard
     */
    public function count_by_status($status)
    {
        $this->db->where('status', $status);
        return $this->db->count_all_results($this->table);
    }

    /**
     * Count data by jenis pengaduan
     * Untuk keperluan dashboard
     */
    public function count_by_jenis($jenis)
    {
        $this->db->where('jenis', $jenis);
        return $this->db->count_all_results($this->table);
    }

   /**
 * Get data untuk chart/grafik berdasarkan tanggal diterima_ppid
 */
public function get_chart_data($tahun = null)
{
    if ($tahun === null) {
        $tahun = date('Y');
    }
    
    $this->db->select('MONTH(diterima_ppid) as bulan, COUNT(*) as total');
    $this->db->from($this->table);
    $this->db->where('YEAR(diterima_ppid)', $tahun);
    $this->db->where('diterima_ppid IS NOT NULL');
    $this->db->group_by('MONTH(diterima_ppid)');
    $this->db->order_by('MONTH(diterima_ppid)', 'ASC');
    
    return $this->db->get()->result();
}

    /**
     * Get data terbaru (untuk dashboard) - FIXED
     */
    public function get_recent($limit = 5)
{
    $this->db->order_by('diterima_ppid', 'DESC'); // Ganti ke diterima_ppid
    $this->db->limit($limit);
    return $this->db->get($this->table)->result();
}

    /**
     * Get statistics untuk dashboard
     */
    public function get_dashboard_stats() // Ganti nama untuk konsistensi
    {
        $stats = [
            'total' => $this->count_all(),
            'baru' => $this->count_by_status('baru'),
            'diproses' => $this->count_by_status('diproses'),
            'selesai' => $this->count_by_status('selesai'),
            'ditolak' => $this->count_by_status('ditolak')
        ];
        
        return $stats;
    }

    /**
     * METHOD TAMBAHAN UNTUK KELENGKAPAN
     */

    /**
     * Get data dengan filter status dan tanggal
     */
    public function get_with_status_filter($status = null, $date_range = [])
{
    $this->db->from($this->table);
    
    // Filter status
    if (!empty($status)) {
        $this->db->where('status', $status);
    }
    
    // Filter tanggal
    if (!empty($date_range['start']) && !empty($date_range['end'])) {
        $this->db->where('diterima_ppid >=', $date_range['start']);
        $this->db->where('diterima_ppid <=', $date_range['end']);
    }
    
    $this->db->order_by('diterima_ppid', 'ASC'); // Ganti ke diterima_ppid
    return $this->db->get()->result();
}

    /**
     * Get data by bulan dan tahun
     */
    public function get_by_month_year($bulan, $tahun)
{
    $this->db->where('MONTH(diterima_ppid)', $bulan);
    $this->db->where('YEAR(diterima_ppid)', $tahun);
    $this->db->order_by('diterima_ppid', 'ASC'); // Ganti ke diterima_ppid
    return $this->db->get($this->table)->result();
}

    /**
     * Get data dengan search
     */
    public function search($keyword)
    {
        $this->db->like('pengirim', $keyword);
        $this->db->or_like('perihal', $keyword);
        $this->db->or_like('nomor_surat', $keyword);
        $this->db->order_by('tanggal', 'ASC');
        return $this->db->get($this->table)->result();
    }

    /**
     * Get data untuk pagination
     */
    public function get_paginated($limit, $offset)
{
    $this->db->order_by('diterima_ppid', 'ASC'); // Ganti ke diterima_ppid
    $this->db->limit($limit, $offset);
    return $this->db->get($this->table)->result();
}

    /**
     * Get total rows untuk pagination dengan filter
     */
    public function count_all_filtered($date_range = [])
{
    $this->db->from($this->table);
    
    if (!empty($date_range['start']) && !empty($date_range['end'])) {
        $this->db->where('diterima_ppid >=', $date_range['start']);
        $this->db->where('diterima_ppid <=', $date_range['end']);
    }
    
    return $this->db->count_all_results();
}
}