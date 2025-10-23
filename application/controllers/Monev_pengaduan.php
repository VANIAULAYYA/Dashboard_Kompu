<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monev_pengaduan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_monev_pengaduan');
        $this->load->helper(['url', 'form']);
        $this->load->library('session');
        
        // Cek login
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        // Ambil parameter filter dari GET
        $jenis_periode = $this->input->get('jenis_periode');
        $periode = $this->input->get('periode');
        $tahun = $this->input->get('tahun');
        
        // Set default values jika tidak ada parameter (first time access)
        if (empty($jenis_periode)) {
            $jenis_periode = 'semua';
        }
        
        if (empty($tahun)) {
            $tahun = 'semua';
        }
        
        // Set default periode berdasarkan jenis_periode
        if (empty($periode) && $jenis_periode != 'semua') {
            if ($jenis_periode == 'bulanan') {
                $current_month = (int)date('n');
                $bulan_map = [
                    1 => 'januari', 2 => 'februari', 3 => 'maret', 4 => 'april',
                    5 => 'mei', 6 => 'juni', 7 => 'juli', 8 => 'agustus',
                    9 => 'september', 10 => 'oktober', 11 => 'november', 12 => 'desember'
                ];
                $periode = $bulan_map[$current_month] ?? 'januari';
            } elseif ($jenis_periode == 'triwulan') {
                $current_month = (int)date('n');
                if ($current_month >= 1 && $current_month <= 3) {
                    $periode = 'triwulan1';
                } elseif ($current_month >= 4 && $current_month <= 6) {
                    $periode = 'triwulan2';
                } elseif ($current_month >= 7 && $current_month <= 9) {
                    $periode = 'triwulan3';
                } else {
                    $periode = 'triwulan4';
                }
            } elseif ($jenis_periode == 'semester') {
                $current_month = (int)date('n');
                $periode = ($current_month <= 6) ? 'semester1' : 'semester2';
            } elseif ($jenis_periode == 'tahunan') {
                $periode = 'tahunan';
            }
        }
        
        // Jika jenis_periode = 'semua', set tahun ke 'semua' juga
        if ($jenis_periode == 'semua') {
            $tahun = 'semua';
            $periode = 'semua';
        }

        // Ambil data berdasarkan filter
        $filter = [
            'jenis_periode' => $jenis_periode,
            'periode' => $periode,
            'tahun' => $tahun
        ];
        
        // Data untuk view
        $data['jenis_periode'] = $jenis_periode;
        $data['periode_selected'] = $periode;
        $data['tahun_selected'] = $tahun;
        
        // Ambil daftar tahun yang tersedia
        $data['tahun_available'] = $this->M_monev_pengaduan->get_available_years();
        
        // Jika tidak ada tahun tersedia, set default
        if (empty($data['tahun_available'])) {
            $data['tahun_available'] = [date('Y')];
        }
        
        // Generate label periode
        $data['periode_label'] = $this->generate_periode_label($jenis_periode, $periode, $tahun);
        
        // Top Cards Data
        $data['total_permohonan'] = $this->M_monev_pengaduan->get_total_permohonan($filter);
        $data['dalam_proses'] = $this->M_monev_pengaduan->get_dalam_proses($filter);
        $data['dipenuhi'] = $this->M_monev_pengaduan->get_dipenuhi($filter);
        $data['telah_disampaikan'] = $this->M_monev_pengaduan->get_telah_disampaikan($filter);
        
        // Status Permohonan (untuk grafik donut pertama)
        $data['status_permohonan'] = $this->M_monev_pengaduan->get_status_permohonan($filter);
        
        // Via Permohonan (tabel)
        $data['via_permohonan'] = $this->M_monev_pengaduan->get_via_permohonan($filter);
        
        // Status Pemohon (untuk grafik donut kedua)
        $data['status_pengirim'] = $this->M_monev_pengaduan->get_status_pengirim($filter);
        
        // Load view
        $this->load->view('admin/v_monev_pengaduan', $data);
    }
    
    /**
     * Generate label periode untuk ditampilkan di header
     */
    private function generate_periode_label($jenis, $periode, $tahun)
    {
        if ($jenis == 'semua') {
            return 'Semua Data';
        }
        
        $tahun_label = ($tahun == 'semua') ? 'Semua Tahun' : $tahun;
        
        $bulan_indo = [
            'januari' => 'Januari', 'februari' => 'Februari', 'maret' => 'Maret',
            'april' => 'April', 'mei' => 'Mei', 'juni' => 'Juni',
            'juli' => 'Juli', 'agustus' => 'Agustus', 'september' => 'September',
            'oktober' => 'Oktober', 'november' => 'November', 'desember' => 'Desember'
        ];
        
        switch ($jenis) {
            case 'bulanan':
                $bulan = $bulan_indo[strtolower($periode)] ?? ucfirst($periode);
                return "$bulan $tahun_label";
            
            case 'triwulan':
                $triwulan_map = [
                    'triwulan1' => 'Triwulan I (Jan-Mar)',
                    'triwulan2' => 'Triwulan II (Apr-Jun)',
                    'triwulan3' => 'Triwulan III (Jul-Sep)',
                    'triwulan4' => 'Triwulan IV (Okt-Des)'
                ];
                return ($triwulan_map[$periode] ?? ucfirst($periode)) . " $tahun_label";
            
            case 'semester':
                $semester_map = [
                    'semester1' => 'Semester I (Jan-Jun)',
                    'semester2' => 'Semester II (Jul-Des)'
                ];
                return ($semester_map[$periode] ?? ucfirst($periode)) . " $tahun_label";
            
            case 'tahunan':
                return "Tahun $tahun_label";
            
            default:
                return "$periode $tahun_label";
        }
    }
    
    /**
     * AJAX endpoint untuk mendapatkan detail via permohonan
     */
    public function get_detail_via()
    {
        // Set header JSON
        header('Content-Type: application/json');
        
        try {
            // Validasi input
            $via_index = $this->input->get('via_index');
            
            if ($via_index === null || $via_index === '') {
                echo json_encode([
                    'success' => false,
                    'error' => 'Parameter via_index tidak ditemukan'
                ]);
                return;
            }
            
            // Ambil parameter filter
            $jenis_periode = $this->input->get('jenis_periode') ?: 'bulanan';
            $periode = $this->input->get('periode');
            $tahun = $this->input->get('tahun') ?: date('Y');
            
            // Jika jenis_periode = 'semua', set tahun ke 'semua'
            if ($jenis_periode == 'semua') {
                $tahun = 'semua';
                $periode = 'semua';
            }
            
            $filter = [
                'jenis_periode' => $jenis_periode,
                'periode' => $periode,
                'tahun' => $tahun
            ];
            
            // Ambil detail via dari model
            $detail = $this->M_monev_pengaduan->get_detail_via($via_index, $filter);
            
            // Return JSON response
            echo json_encode($detail);
            
        } catch (Exception $e) {
            // Handle error
            echo json_encode([
                'success' => false,
                'error' => 'Terjadi kesalahan: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * AJAX endpoint untuk mendapatkan detail status permohonan
     */
    public function get_detail_status_permohonan()
{
    // Set header JSON
    header('Content-Type: application/json');
    
    try {
        // Validasi input
        $status_key = $this->input->get('status_key');
        
        if ($status_key === null || $status_key === '') {
            echo json_encode([
                'success' => false,
                'error' => 'Parameter status_key tidak ditemukan'
            ]);
            return;
        }
        
        // Ambil parameter filter
        $jenis_periode = $this->input->get('jenis_periode') ?: 'bulanan';
        $periode = $this->input->get('periode');
        $tahun = $this->input->get('tahun') ?: date('Y');
        
        // Jika jenis_periode = 'semua', set tahun ke 'semua'
        if ($jenis_periode == 'semua') {
            $tahun = 'semua';
            $periode = 'semua';
        }
        
        $filter = [
            'jenis_periode' => $jenis_periode,
            'periode' => $periode,
            'tahun' => $tahun
        ];
        
        // Ambil detail status permohonan dari model
        $detail = $this->M_monev_pengaduan->get_detail_status_permohonan($status_key, $filter);
        
        // Return JSON response
        echo json_encode($detail);
        
    } catch (Exception $e) {
        // Handle error
        echo json_encode([
            'success' => false,
            'error' => 'Terjadi kesalahan: ' . $e->getMessage()
        ]);
    }
}

    /**
     * AJAX endpoint untuk mendapatkan detail status pengirim
     */
    public function get_detail_status_pengirim()
{
    // Set header JSON
    header('Content-Type: application/json');
    
    try {
        // Validasi input
        $status_index = $this->input->get('status_index');
        
        if ($status_index === null || $status_index === '') {
            echo json_encode([
                'success' => false,
                'error' => 'Parameter status_index tidak ditemukan'
            ]);
            return;
        }
        
        // Ambil parameter filter
        $jenis_periode = $this->input->get('jenis_periode') ?: 'bulanan';
        $periode = $this->input->get('periode');
        $tahun = $this->input->get('tahun') ?: date('Y');
        
        // Jika jenis_periode = 'semua', set tahun ke 'semua'
        if ($jenis_periode == 'semua') {
            $tahun = 'semua';
            $periode = 'semua';
        }
        
        $filter = [
            'jenis_periode' => $jenis_periode,
            'periode' => $periode,
            'tahun' => $tahun
        ];
        
        // Ambil detail status pengirim dari model
        $detail = $this->M_monev_pengaduan->get_detail_status_pengirim($status_index, $filter);
        
        // Return JSON response
        echo json_encode($detail);
        
    } catch (Exception $e) {
        // Handle error
        echo json_encode([
            'success' => false,
            'error' => 'Terjadi kesalahan: ' . $e->getMessage()
        ]);
    }
}

}