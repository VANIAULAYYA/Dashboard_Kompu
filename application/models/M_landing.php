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

    // Controller Landing.php
public function Survei_Kepuasan_Masyarakat($tahun = null)
{
    // Jika tidak ada parameter tahun, default ke tahun berjalan
    if ($tahun === null) {
        $tahun = date('Y');
    }
    
    // Ambil semua tahun unik yang ada di database untuk filter
    $this->db->select('YEAR(tanggal) as tahun');
    $this->db->from('laporan');
    $this->db->where('jenis_laporan', 'SKM');
    $this->db->group_by('YEAR(tanggal)');
    $this->db->order_by('tahun', 'DESC');
    $data['tahun_list'] = $this->db->get()->result_array();
    
    // Ambil data untuk tahun yang dipilih
    $this->db->select('*');
    $this->db->from('laporan');
    $this->db->where('jenis_laporan', 'SKM');
    $this->db->where('YEAR(tanggal)', $tahun);
    $this->db->order_by('tanggal', 'ASC');
    $dokumen_tahun = $this->db->get()->result_array();
    
    // Group by periode
    $data['triwulan'] = [];
    $data['semester'] = [];
    $data['tahunan'] = [];
    
    foreach ($dokumen_tahun as $doc) {
        switch ($doc['periode']) {
            case 'Triwulan':
                $data['triwulan'][] = $doc;
                break;
            case 'Semester':
                $data['semester'][] = $doc;
                break;
            case 'Tahunan':
                $data['tahunan'][] = $doc;
                break;
            default:
                // Jika periode kosong, coba deteksi dari nama file
                if (preg_match('/(q|triwulan)\s*[1-4]/i', $doc['nama_file'])) {
                    $data['triwulan'][] = $doc;
                } elseif (preg_match('/(semester)\s*[1-2]/i', $doc['nama_file'])) {
                    $data['semester'][] = $doc;
                } elseif (preg_match('/(tahunan|tahun)/i', $doc['nama_file'])) {
                    $data['tahunan'][] = $doc;
                }
                break;
        }
    }
    
    $data['current_year'] = $tahun;
    $this->load->view('landing/skm', $data);
}

// Helper untuk detect triwulan
    public function detect_triwulan($nama_file) {
        if (preg_match('/(triwulan|tw|quarter|q)[\s_-]*(i{1,3}|iv|1|2|3|4)/i', $nama_file, $matches)) {
            $number = strtoupper(trim($matches[2]));
            $roman_map = ['1' => 'I', '2' => 'II', '3' => 'III', '4' => 'IV'];
            
            if (in_array($number, ['I', 'II', 'III', 'IV'])) {
                return $number;
            }
            if (isset($roman_map[$number])) {
                return $roman_map[$number];
            }
        }
        return 'I';
    }

    // Helper untuk detect semester
    public function detect_semester($nama_file) {
        if (preg_match('/(semester|sem)[\s_-]*(i{1,2}|1|2)/i', $nama_file, $matches)) {
            $number = strtoupper(trim($matches[2]));
            $roman_map = ['1' => 'I', '2' => 'II'];
            
            if (in_array($number, ['I', 'II'])) {
                return $number;
            }
            if (isset($roman_map[$number])) {
                return $roman_map[$number];
            }
        }
        return 'I';
    }

    // Get list tahun
    public function get_tahun_list($jenis) {
        $this->db->select('YEAR(tanggal) as tahun');
        $this->db->from('laporan');
        $this->db->where('jenis_laporan', $jenis);
        $this->db->group_by('YEAR(tanggal)');
        $this->db->order_by('tahun', 'DESC');
        return $this->db->get()->result_array();
    }

    // Get laporan by jenis dan tahun
    public function get_laporan_by_jenis_tahun($jenis, $tahun) {
        $this->db->select('*');
        $this->db->from('laporan');
        $this->db->where('jenis_laporan', $jenis);
        $this->db->where('YEAR(tanggal)', $tahun);
        $this->db->order_by('tanggal', 'ASC');
        return $this->db->get()->result_array();
    }

}
