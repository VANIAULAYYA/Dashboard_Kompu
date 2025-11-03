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
        
        $this->db->order_by('tanggal', 'ASC');
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
        $this->db->order_by('tahun', 'ASC');
        
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
        $this->db->order_by('tanggal', 'ASC');
        $this->db->limit($limit);
        return $this->db->get($this->table)->result();
    }

    /**
     * Get statistics untuk dashboard
     */
    public function get_statistics()
    {
        $stats = [
            'total_pengaduan' => $this->count_all(),
            'pengaduan_selesai' => $this->count_by_status('Selesai'),
            'pengaduan_proses' => $this->count_by_status('Proses'),
            'pengaduan_pending' => $this->count_by_status('Pending')
        ];
        
        return $stats;
    }
}