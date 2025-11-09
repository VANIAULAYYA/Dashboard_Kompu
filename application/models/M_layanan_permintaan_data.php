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
        $this->db->order_by('diterima_ppid', 'ASC'); // Tambahkan order by untuk konsistensi
        return $this->db->get($this->table)->result();
    }

    public function get_by_id($nomor) {
    $permohonan = $this->db->get_where($this->table, ['nomor' => $nomor])->row();
    
    if ($permohonan) {
        // CARI BUKU TAMU BERDASARKAN NAMA & TELEPON
        $this->db->where('nama', $permohonan->pengirim);
        $this->db->where('no_handphone', $permohonan->nomor_telepon);
        $buku_tamu = $this->db->get('buku_tamu')->row();
        
        if ($buku_tamu) {
            // JIKA DITEMUKAN, PAKAI ID BUKU TAMU
            $permohonan->buku_tamu_id = $buku_tamu->id;
        } else {
            // JIKA TIDAK DITEMUKAN, PAKAI NOMOR
            $permohonan->buku_tamu_id = $permohonan->nomor;
        }
    }
    
    return $permohonan;
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
     */
    public function get_with_filter($date_range = [])
    {
        $this->db->from($this->table);
        
        // Jika ada filter tanggal
        if (!empty($date_range['start']) && !empty($date_range['end'])) {
            $this->db->where('diterima_ppid >=', $date_range['start']);
            $this->db->where('diterima_ppid <=', $date_range['end']);
        }
        
        $this->db->order_by('diterima_ppid', 'ASC');
        return $this->db->get()->result();
    }

    /**
     * Get available years dari data yang ada
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
     * Count total data
     */
    public function count_all()
    {
        return $this->db->count_all($this->table);
    }

    /**
     * Count data by status
     * PERHATIAN: Sesuaikan nama kolom status dengan database Anda
     */
    public function count_by_status($status)
    {
        // Coba kedua kemungkinan nama kolom
        if ($this->db->field_exists('status_permintaan', $this->table)) {
            $this->db->where('status_permintaan', $status);
        } elseif ($this->db->field_exists('status', $this->table)) {
            $this->db->where('status', $status);
        }
        return $this->db->count_all_results($this->table);
    }

    /**
     * Get data untuk chart/grafik
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

    /**
     * METHOD TAMBAHAN YANG MUNGKIN DIBUTUHKAN
     */

    /**
     * Get data dengan filter status dan tanggal
     */
    public function get_with_status_filter($status = null, $date_range = [])
    {
        $this->db->from($this->table);
        
        // Filter status
        if (!empty($status)) {
            // Cek nama kolom yang ada
            if ($this->db->field_exists('status_permintaan', $this->table)) {
                $this->db->where('status_permintaan', $status);
            } elseif ($this->db->field_exists('status', $this->table)) {
                $this->db->where('status', $status);
            }
        }
        
        // Filter tanggal
        if (!empty($date_range['start']) && !empty($date_range['end'])) {
            $this->db->where('diterima_ppid >=', $date_range['start']);
            $this->db->where('diterima_ppid <=', $date_range['end']);
        }
        
        $this->db->order_by('diterima_ppid', 'ASC');
        return $this->db->get()->result();
    }

    /**
     * Get statistics untuk dashboard
     */
    public function get_dashboard_stats()
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
     * Get data by bulan dan tahun
     */
    public function get_by_month_year($bulan, $tahun)
    {
        $this->db->where('MONTH(diterima_ppid)', $bulan);
        $this->db->where('YEAR(diterima_ppid)', $tahun);
        $this->db->order_by('diterima_ppid', 'ASC');
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
        $this->db->order_by('diterima_ppid', 'ASC');
        return $this->db->get($this->table)->result();
    }

    /**
     * Get data untuk pagination
     */
    public function get_paginated($limit, $offset)
    {
        $this->db->order_by('diterima_ppid', 'ASC');
        $this->db->limit($limit, $offset);
        return $this->db->get($this->table)->result();
    }

    /**
     * Get total rows untuk pagination
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
    
// Di Model M_layanan_permintaan_data, tambahkan:
public function get_with_buku_tamu_id($id) {
    $data = $this->get_by_id($id);
    if ($data && empty($data->buku_tamu_id)) {
        // Generate jika kosong
        $data->buku_tamu_id = 'BT-' . date('Y', strtotime($data->diterima_ppid)) . '-' . str_pad($data->nomor, 3, '0', STR_PAD_LEFT);
    }
    return $data;
}
}