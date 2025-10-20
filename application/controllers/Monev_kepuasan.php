<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller: Monev_kepuasan.php
 * Path: application/controllers/Monev_kepuasan.php
 */
class Monev_kepuasan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_monev_kepuasan');
        $this->load->helper(['url', 'form']);
        $this->load->library(['session', 'form_validation']);
    }

    /**
     * Halaman utama dashboard
     */
    public function index() {
        // Ambil parameter dari GET
    $jenis_periode = $this->input->get('jenis_periode') ? $this->input->get('jenis_periode') : 'semua'; // ⚡ UBAH: 'triwulan' jadi 'semua'
    $periode = $this->input->get('periode') ? $this->input->get('periode') : 'semua'; // ⚡ UBAH: 'triwulan1' jadi 'semua'
    
    // Ambil tahun yang tersedia dari database
    $tahun_available = $this->M_monev_kepuasan->get_available_years();
    
    // ⚡ UBAH: Set tahun default ke 'semua' untuk pertama kali
    $tahun_selected = $this->input->get('tahun') ? $this->input->get('tahun') : 'semua'; // ⚡ UBAH: $tahun_available[0] jadi 'semua'
        
        // PERBAIKAN: Jika tahun selected tidak ada di list, tambahkan ke array
        if ($tahun_selected != 'semua' && !in_array($tahun_selected, $tahun_available)) {
            $tahun_available[] = $tahun_selected;
            // Sort descending
            rsort($tahun_available);
        }
        
        // PERBAIKAN: Handle jenis periode
        if ($jenis_periode == 'semua') {
            $date_range = ['start' => null, 'end' => null, 'label' => 'Semua Data'];
            $periode = 'semua';
            $tahun_selected = 'semua';
        } elseif ($jenis_periode == 'tahunan') {
            // UNTUK TAHUNAN, set periode ke 'tahunan' dan gunakan tahun yang dipilih
            $periode = 'tahunan';
            $tahun_for_range = ($tahun_selected == 'semua') ? null : $tahun_selected;
            $date_range = $this->get_date_range($periode, $tahun_for_range);
        } else {
            // Untuk bulanan, triwulan, semester
            $tahun_for_range = ($tahun_selected == 'semua') ? null : $tahun_selected;
            $date_range = $this->get_date_range($periode, $tahun_for_range);
        }
        
        // TAMBAHKAN PARAMETER TAHUN KE DATE_RANGE
        $date_range['tahun'] = $tahun_selected;
        
        // Ambil data dari model dengan error handling
        try {
            $data['tahun_available'] = $tahun_available;
            $data['tahun_selected'] = $tahun_selected;
            $data['jenis_periode'] = $jenis_periode;
            $data['periode_selected'] = $periode;
            $data['periode_label'] = $date_range['label'];
            $data['total_responden'] = $this->M_monev_kepuasan->get_total_responden($date_range);
            $data['jenis_kelamin'] = $this->M_monev_kepuasan->get_jenis_kelamin($date_range);
            $data['nilai_ikm'] = $this->M_monev_kepuasan->get_nilai_ikm($date_range);
            $data['persentase_ikm'] = ($data['nilai_ikm'] / 4) * 100;
            $data['grade_pkm'] = $this->get_grade($data['nilai_ikm']);
            
            // Data unsur SKM dengan error handling
            $data['unsur_skm'] = [
                ['nama' => 'Persyaratan', 'nilai' => $this->M_monev_kepuasan->get_rata_pendapat($date_range, 'pendapat_pelayanan'), 'grade' => ''],
                ['nama' => 'Prosedur', 'nilai' => $this->M_monev_kepuasan->get_rata_pendapat($date_range, 'pemahaman_prosedur'), 'grade' => ''],
                ['nama' => 'Kecepatan Waktu', 'nilai' => $this->M_monev_kepuasan->get_rata_pendapat($date_range, 'pendapat_kecepatan'), 'grade' => ''],
                ['nama' => 'Biaya/Tarif', 'nilai' => $this->M_monev_kepuasan->get_rata_pendapat($date_range, 'pendapat_biaya'), 'grade' => ''],
                ['nama' => 'Kesesuaian Produk Pelayanan', 'nilai' => $this->M_monev_kepuasan->get_rata_pendapat($date_range, 'pendapat_produk'), 'grade' => ''],
                ['nama' => 'Kompetensi Petugas', 'nilai' => $this->M_monev_kepuasan->get_rata_pendapat($date_range, 'pendapat_kompetensi'), 'grade' => ''],
                ['nama' => 'Perilaku Petugas', 'nilai' => $this->M_monev_kepuasan->get_rata_pendapat($date_range, 'pendapat_perilaku'), 'grade' => ''],
                ['nama' => 'Penanganan Pengaduan', 'nilai' => $this->M_monev_kepuasan->get_rata_pendapat($date_range, 'pendapat_pengaduan'), 'grade' => ''],
                ['nama' => 'Kualitas Sarana Prasarana', 'nilai' => $this->M_monev_kepuasan->get_rata_pendapat($date_range, 'pendapat_kualitas'), 'grade' => '']
            ];
            
            // Tambahkan grade untuk setiap unsur
            foreach ($data['unsur_skm'] as &$item) {
                $item['grade'] = $this->get_grade($item['nilai']);
            }
            
            // Grafik distribusi
            $data['grafik_distribusi'] = $this->M_monev_kepuasan->get_distribusi_kepuasan($date_range);
            
            // Keperluan kunjungan
            $data['keperluan'] = $this->M_monev_kepuasan->get_keperluan_kunjungan($date_range);
            
        } catch (Exception $e) {
            // Handle error gracefully
            log_message('error', 'Error in Monev_kepuasan: ' . $e->getMessage());
            show_error('Terjadi kesalahan dalam memuat data. Silakan coba lagi.');
        }
        
        // Load view
        $this->load->view('admin/v_monev_kepuasan', $data);
    }
    
    /**
     * Halaman detail data buku tamu
     */
    public function data() {
        $jenis_periode = $this->input->get('jenis_periode') ? $this->input->get('jenis_periode') : 'triwulan';
        $periode = $this->input->get('periode') ? $this->input->get('periode') : 'triwulan1';
        
        // Jika pilih "semua data", set periode ke null
        if ($jenis_periode == 'semua') {
            $date_range = ['start' => null, 'end' => null, 'label' => 'Semua Data'];
            $periode = 'semua';
        } else {
            $date_range = $this->get_date_range($periode);
        }
        
        $data['jenis_periode'] = $jenis_periode;
        $data['periode_selected'] = $periode;
        $data['periode_label'] = $date_range['label'];
        $data['date_range'] = $date_range;
        $data['list_data'] = $this->M_monev_kepuasan->get_all_data($date_range);
        
        $this->load->view('admin/v_monev_data', $data);
    }
    
    /**
     * AJAX endpoint untuk datatable
     */
    public function ajax_datatable() {
        $jenis_periode = $this->input->post('jenis_periode') ? $this->input->post('jenis_periode') : 'triwulan';
        $periode = $this->input->post('periode') ? $this->input->post('periode') : 'triwulan1';
        
        // Jika pilih "semua data", set periode ke null
        if ($jenis_periode == 'semua') {
            $date_range = ['start' => null, 'end' => null, 'label' => 'Semua Data'];
        } else {
            $date_range = $this->get_date_range($periode);
        }
        
        // Datatable parameters
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $search = $this->input->post('search')['value'];
        $order_column = $this->input->post('order')[0]['column'];
        $order_dir = $this->input->post('order')[0]['dir'];
        
        // Get column name
        $columns = ['id', 'timestamp', 'nama', 'jenis_kelamin', 'asal_instansi', 'keperluan'];
        $order_column_name = isset($columns[$order_column]) ? $columns[$order_column] : 'timestamp';
        
        // Get data
        $result = $this->M_monev_kepuasan->get_datatable($date_range, $start, $length, $search, $order_column_name, $order_dir);
        
        // Format data for datatable
        $data = [];
        $no = $start + 1;
        foreach ($result['data'] as $row) {
            $data[] = [
                'no' => $no++,
                'timestamp' => date('d/m/Y H:i', strtotime($row->timestamp)),
                'nama' => $row->nama,
                'jenis_kelamin' => $row->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan',
                'asal_instansi' => $row->asal_instansi,
                'keperluan' => $row->keperluan,
                'action' => '
                    <a href="'.base_url('monev_kepuasan/detail/'.$row->id).'" class="btn btn-sm btn-info">
                        <i class="fa fa-eye"></i> Detail
                    </a>
                    <a href="'.base_url('monev_kepuasan/edit/'.$row->id).'" class="btn btn-sm btn-warning">
                        <i class="fa fa-edit"></i> Edit
                    </a>
                    <a href="'.base_url('monev_kepuasan/delete/'.$row->id).'" class="btn btn-sm btn-danger" onclick="return confirm(\'Yakin hapus data?\')">
                        <i class="fa fa-trash"></i> Hapus
                    </a>
                '
            ];
        }
        
        $output = [
            'draw' => intval($this->input->post('draw')),
            'recordsTotal' => $result['total_all'],
            'recordsFiltered' => $result['total_records'],
            'data' => $data
        ];
        
        echo json_encode($output);
    }

    // ... (method-method lainnya tetap sama: detail, edit, delete, export, dll.)

    /**
     * Export data ke CSV
     */
    public function export_csv() {
        $jenis_periode = $this->input->get('jenis_periode') ? $this->input->get('jenis_periode') : 'triwulan';
        $periode = $this->input->get('periode') ? $this->input->get('periode') : 'triwulan1';
        
        // Jika pilih "semua data", set periode ke null
        if ($jenis_periode == 'semua') {
            $date_range = ['start' => null, 'end' => null, 'label' => 'Semua Data'];
        } else {
            $date_range = $this->get_date_range($periode);
        }
        
        $data = $this->M_monev_kepuasan->export_to_csv($date_range);
        
        // Set header untuk download CSV
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=data_kepuasan_masyarakat_'.date('Y-m-d').'.csv');
        
        // Buat output CSV
        $output = fopen('php://output', 'w');
        
        // BOM untuk Excel UTF-8
        fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));
        
        // Header CSV
        fputcsv($output, [
            'No', 'Tanggal', 'Nama', 'Jenis Kelamin', 'Asal Instansi', 'No. HP',
            'Keperluan', 'Persyaratan', 'Prosedur', 'Kecepatan', 'Biaya',
            'Produk', 'Kompetensi', 'Perilaku', 'Pengaduan', 'Kualitas',
            'Kritik & Saran'
        ]);
        
        // Data CSV
        $no = 1;
        foreach ($data as $row) {
            fputcsv($output, [
                $no++,
                date('d/m/Y H:i', strtotime($row['timestamp'])),
                $row['nama'],
                $row['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan',
                $row['asal_instansi'],
                $row['no_handphone'],
                $row['keperluan'],
                $row['pendapat_pelayanan'],
                $row['pemahaman_prosedur'],
                $row['pendapat_kecepatan'],
                $row['pendapat_biaya'],
                $row['pendapat_produk'],
                $row['pendapat_kompetensi'],
                $row['pendapat_perilaku'],
                $row['pendapat_pengaduan'],
                $row['pendapat_kualitas'],
                $row['kritik_saran']
            ]);
        }
        
        fclose($output);
    }

/**
 * Cetak/Print laporan
 */
public function print_laporan() {
    $jenis_periode = $this->input->get('jenis_periode') ? $this->input->get('jenis_periode') : 'triwulan';
    $periode = $this->input->get('periode') ? $this->input->get('periode') : 'triwulan1';
    $tahun = $this->input->get('tahun') ? $this->input->get('tahun') : date('Y');
    
    // Jika pilih "semua data", set periode ke null
    if ($jenis_periode == 'semua') {
        $date_range = ['start' => null, 'end' => null, 'label' => 'Semua Data'];
        $periode = 'semua';
        $tahun = 'semua';
    } else {
        // Untuk jenis periode tahunan, otomatis set periode ke tahunan
        if ($jenis_periode == 'tahunan') {
            $periode = 'tahunan';
        }
        $tahun_for_range = ($tahun == 'semua') ? null : $tahun;
        $date_range = $this->get_date_range($periode, $tahun_for_range);
    }
    
    // Ambil data sama seperti di index
    $data['jenis_periode'] = $jenis_periode;
    $data['periode_selected'] = $periode;
    $data['tahun_selected'] = $tahun;
    $data['date_range'] = $date_range;
    $data['periode_label'] = $date_range['label'];
    $data['total_responden'] = $this->M_monev_kepuasan->get_total_responden($date_range);
    $data['jenis_kelamin'] = $this->M_monev_kepuasan->get_jenis_kelamin($date_range);
    $data['nilai_ikm'] = $this->M_monev_kepuasan->get_nilai_ikm($date_range);
    $data['persentase_ikm'] = ($data['nilai_ikm'] / 4) * 100;
    $data['grade_pkm'] = $this->get_grade($data['nilai_ikm']);
    
    // Data unsur SKM
    $data['unsur_skm'] = [
        ['nama' => 'Persyaratan', 'nilai' => $this->M_monev_kepuasan->get_rata_pendapat($date_range, 'pendapat_pelayanan'), 'grade' => ''],
        ['nama' => 'Prosedur', 'nilai' => $this->M_monev_kepuasan->get_rata_pendapat($date_range, 'pemahaman_prosedur'), 'grade' => ''],
        ['nama' => 'Kecepatan Waktu', 'nilai' => $this->M_monev_kepuasan->get_rata_pendapat($date_range, 'pendapat_kecepatan'), 'grade' => ''],
        ['nama' => 'Biaya/Tarif', 'nilai' => $this->M_monev_kepuasan->get_rata_pendapat($date_range, 'pendapat_biaya'), 'grade' => ''],
        ['nama' => 'Kesesuaian Produk Pelayanan', 'nilai' => $this->M_monev_kepuasan->get_rata_pendapat($date_range, 'pendapat_produk'), 'grade' => ''],
        ['nama' => 'Kompetensi Petugas', 'nilai' => $this->M_monev_kepuasan->get_rata_pendapat($date_range, 'pendapat_kompetensi'), 'grade' => ''],
        ['nama' => 'Perilaku Petugas', 'nilai' => $this->M_monev_kepuasan->get_rata_pendapat($date_range, 'pendapat_perilaku'), 'grade' => ''],
        ['nama' => 'Penanganan Pengaduan', 'nilai' => $this->M_monev_kepuasan->get_rata_pendapat($date_range, 'pendapat_pengaduan'), 'grade' => ''],
        ['nama' => 'Kualitas Sarana Prasarana', 'nilai' => $this->M_monev_kepuasan->get_rata_pendapat($date_range, 'pendapat_kualitas'), 'grade' => '']
    ];
    
    // Tambahkan grade untuk setiap unsur
    foreach ($data['unsur_skm'] as &$item) {
        $item['grade'] = $this->get_grade($item['nilai']);
    }
    
    // Grafik distribusi
    $data['grafik_distribusi'] = $this->M_monev_kepuasan->get_distribusi_kepuasan($date_range);
    
    // Keperluan kunjungan
    $data['keperluan'] = $this->M_monev_kepuasan->get_keperluan_kunjungan($date_range);
    
    $this->load->view('admin/v_monev_kepuasan', $data);
}

    // ... (method-method lainnya: api_chart_trend, get_date_range, get_grade tetap sama)

    /**
     * Fungsi untuk mendapatkan range tanggal berdasarkan periode
     */
      private function get_date_range($periode, $tahun = null) {
        // Default tahun sekarang jika tidak ada data
        if ($tahun === null) {
            $tahun = date('Y');
        }
        
        // PENTING: HAPUS VALIDASI INI!
        // $tahun = max(2020, min($tahun, $current_year + 5)); <-- HAPUS BARIS INI
        
        // Hanya pastikan tahun adalah integer yang valid
        $tahun = intval($tahun);
        
        switch ($periode) {
            // Bulanan
            case 'januari':
                return ['start' => $tahun.'-01-01', 'end' => $tahun.'-01-31', 'label' => 'Januari '.$tahun];
            case 'februari':
                $end_day = date('t', strtotime($tahun.'-02-01'));
                return ['start' => $tahun.'-02-01', 'end' => $tahun.'-02-'.$end_day, 'label' => 'Februari '.$tahun];
            case 'maret':
                return ['start' => $tahun.'-03-01', 'end' => $tahun.'-03-31', 'label' => 'Maret '.$tahun];
            case 'april':
                return ['start' => $tahun.'-04-01', 'end' => $tahun.'-04-30', 'label' => 'April '.$tahun];
            case 'mei':
                return ['start' => $tahun.'-05-01', 'end' => $tahun.'-05-31', 'label' => 'Mei '.$tahun];
            case 'juni':
                return ['start' => $tahun.'-06-01', 'end' => $tahun.'-06-30', 'label' => 'Juni '.$tahun];
            case 'juli':
                return ['start' => $tahun.'-07-01', 'end' => $tahun.'-07-31', 'label' => 'Juli '.$tahun];
            case 'agustus':
                return ['start' => $tahun.'-08-01', 'end' => $tahun.'-08-31', 'label' => 'Agustus '.$tahun];
            case 'september':
                return ['start' => $tahun.'-09-01', 'end' => $tahun.'-09-30', 'label' => 'September '.$tahun];
            case 'oktober':
                return ['start' => $tahun.'-10-01', 'end' => $tahun.'-10-31', 'label' => 'Oktober '.$tahun];
            case 'november':
                return ['start' => $tahun.'-11-01', 'end' => $tahun.'-11-30', 'label' => 'November '.$tahun];
            case 'desember':
                return ['start' => $tahun.'-12-01', 'end' => $tahun.'-12-31', 'label' => 'Desember '.$tahun];
                
            // Triwulan
            case 'triwulan1':
                return ['start' => $tahun.'-01-01', 'end' => $tahun.'-03-31', 'label' => 'Triwulan I (Jan-Mar) '.$tahun];
            case 'triwulan2':
                return ['start' => $tahun.'-04-01', 'end' => $tahun.'-06-30', 'label' => 'Triwulan II (Apr-Jun) '.$tahun];
            case 'triwulan3':
                return ['start' => $tahun.'-07-01', 'end' => $tahun.'-09-30', 'label' => 'Triwulan III (Jul-Sep) '.$tahun];
            case 'triwulan4':
                return ['start' => $tahun.'-10-01', 'end' => $tahun.'-12-31', 'label' => 'Triwulan IV (Okt-Des) '.$tahun];
                
            // Semester
            case 'semester1':
                return ['start' => $tahun.'-01-01', 'end' => $tahun.'-06-30', 'label' => 'Semester I (Jan-Jun) '.$tahun];
            case 'semester2':
                return ['start' => $tahun.'-07-01', 'end' => $tahun.'-12-31', 'label' => 'Semester II (Jul-Des) '.$tahun];
                
            // Tahunan
            case 'tahunan':
                return ['start' => $tahun.'-01-01', 'end' => $tahun.'-12-31', 'label' => 'Tahunan '.$tahun];
                
            // Semua Data
            case 'semua':
            default:
                return ['start' => null, 'end' => null, 'label' => 'Semua Data'];
        }
      }
    
    /**
     * Fungsi untuk mendapatkan grade berdasarkan nilai
     */
    private function get_grade($nilai) {
        if ($nilai >= 3.5324) {
            return 'A';
        } elseif ($nilai >= 3.0644) {
            return 'B';
        } elseif ($nilai >= 2.60) {
            return 'C';
        } else {
            return 'D';
        }
    }
    
    /**
 * AJAX endpoint untuk get detail unsur
 */
/**
 * AJAX endpoint untuk get detail unsur
 */
/**
 * AJAX endpoint untuk get detail unsur - DATA REAL dari database
 */
public function get_detail_unsur() {
    header('Content-Type: application/json');
    
    try {
        $jenis_periode = $this->input->get('jenis_periode');
        $periode = $this->input->get('periode');
        $tahun = $this->input->get('tahun');
        $unsur_index = $this->input->get('unsur_index');

        // Mapping kolom database berdasarkan index unsur
        $kolom_mapping = [
            'pendapat_pelayanan',      // 0 - Persyaratan
            'pemahaman_prosedur',      // 1 - Prosedur
            'pendapat_kecepatan',      // 2 - Kecepatan Waktu
            'pendapat_biaya',          // 3 - Biaya/Tarif
            'pendapat_produk',         // 4 - Kesesuaian Produk Pelayanan
            'pendapat_kompetensi',     // 5 - Kompetensi Petugas
            'pendapat_perilaku',       // 6 - Perilaku Petugas
            'pendapat_pengaduan',      // 7 - Penanganan Pengaduan
            'pendapat_kualitas'        // 8 - Kualitas Sarana Prasarana
        ];

        $nama_unsur_mapping = [
            'Persyaratan',
            'Prosedur',
            'Kecepatan Waktu', 
            'Biaya/Tarif',
            'Kesesuaian Produk Pelayanan',
            'Kompetensi Petugas',
            'Perilaku Petugas',
            'Penanganan Pengaduan',
            'Kualitas Sarana Prasarana'
        ];

        if (!isset($kolom_mapping[$unsur_index])) {
            throw new Exception('Unsur tidak valid: ' . $unsur_index);
        }

        $kolom = $kolom_mapping[$unsur_index];
        $nama_unsur = $nama_unsur_mapping[$unsur_index];

        // Buat date_range sama seperti di index
        if ($jenis_periode == 'semua') {
            $date_range = ['start' => null, 'end' => null, 'label' => 'Semua Data'];
        } else {
            if ($jenis_periode == 'tahunan') {
                $periode = 'tahunan';
            }
            $tahun_for_range = ($tahun == 'semua') ? null : $tahun;
            $date_range = $this->get_date_range($periode, $tahun_for_range);
        }

        // Get data REAL dari database
        $distribusi_data = $this->M_monev_kepuasan->get_distribusi_unsur($date_range, $kolom);
        
        // Jika tidak ada data, beri response kosong
        if (!$distribusi_data || $distribusi_data->total_responden == 0) {
            $response = [
                'success' => true,
                'unsur' => $nama_unsur,
                'kolom' => $kolom,
                'distribusi' => [
                    'sangat_puas' => 0,
                    'puas' => 0,
                    'cukup' => 0,
                    'kurang_puas' => 0
                ],
                'statistik' => [
                    'rata_rata' => 0,
                    'total_responden' => 0,
                    'min_nilai' => 0,
                    'max_nilai' => 0
                ]
            ];
        } else {
            // Format response dengan data REAL
            $response = [
                'success' => true,
                'unsur' => $nama_unsur,
                'kolom' => $kolom,
                'distribusi' => [
                    'sangat_puas' => intval($distribusi_data->sangat_puas),
                    'puas' => intval($distribusi_data->puas),
                    'cukup' => intval($distribusi_data->cukup),
                    'kurang_puas' => intval($distribusi_data->kurang_puas)
                ],
                'statistik' => [
                    'rata_rata' => round(floatval($distribusi_data->rata_rata), 2),
                    'total_responden' => intval($distribusi_data->total_responden),
                    'min_nilai' => round(floatval($distribusi_data->min_nilai), 2),
                    'max_nilai' => round(floatval($distribusi_data->max_nilai), 2)
                ]
            ];
        }

        // Log untuk debugging
        log_message('debug', "Response untuk $kolom: " . json_encode($response));

        echo json_encode($response);

    } catch (Exception $e) {
        log_message('error', 'Error in get_detail_unsur: ' . $e->getMessage());
        
        $error_response = [
            'success' => false,
            'error' => $e->getMessage()
        ];
        
        echo json_encode($error_response);
    }
}

/**
 * Generate dummy data untuk testing
 */
private function generate_dummy_data($unsur_name, $index) {
    // Data dummy yang berbeda untuk setiap unsur
    $base_value = 20 + ($index * 2);
    
    return [
        'distribusi' => [
            'sangat_puas' => $base_value + rand(5, 15),
            'puas' => $base_value + rand(10, 20),
            'cukup' => $base_value + rand(3, 8),
            'kurang_puas' => rand(1, 5)
        ],
        'statistik' => [
            'rata_rata' => round(3.0 + (rand(0, 20) / 10), 2),
            'total_responden' => $base_value + rand(20, 40)
        ],
        'komentar' => [
            [
                'kritik_saran' => 'Pelayanan ' . $unsur_name . ' sangat memuaskan',
                'nama' => 'Responden ' . chr(65 + $index),
                'timestamp' => date('Y-m-d H:i:s', strtotime('-' . rand(1, 30) . ' days'))
            ],
            [
                'kritik_saran' => $unsur_name . ' perlu ditingkatkan lagi',
                'nama' => 'Responden ' . chr(66 + $index),
                'timestamp' => date('Y-m-d H:i:s', strtotime('-' . rand(1, 15) . ' days'))
            ],
            [
                'kritik_saran' => 'Sangat puas dengan ' . $unsur_name . ' yang diberikan',
                'nama' => 'Responden ' . chr(67 + $index),
                'timestamp' => date('Y-m-d H:i:s', strtotime('-' . rand(1, 10) . ' days'))
            ]
        ]
    ];
}

/**
 * AJAX endpoint untuk mendapatkan statistik semua data
 */
public function get_stats_all_data() {
    header('Content-Type: application/json');
    
    try {
        // Get data untuk SEMUA PERIODE (tanpa filter)
        $date_range_all = ['start' => null, 'end' => null, 'label' => 'Semua Data'];
        
        $total_responden = $this->M_monev_kepuasan->get_total_responden($date_range_all);
        $nilai_ikm = $this->M_monev_kepuasan->get_nilai_ikm($date_range_all);
        
        // KONVERSI NILAI IKM KE SKALA 100%
        $persentase_ikm = ($nilai_ikm / 4) * 100;
        
        $data = [
            'total_kunjungan' => $total_responden,
            'kepuasan_layanan' => round($persentase_ikm, 2), // Sudah dalam persentase 100%
            'success' => true
        ];
        
        echo json_encode($data);
        
    } catch (Exception $e) {
        log_message('error', 'Error in get_stats_all_data: ' . $e->getMessage());
        
        $error_response = [
            'success' => false,
            'error' => $e->getMessage(),
            'total_kunjungan' => 0,
            'kepuasan_layanan' => 0
        ];
        
        echo json_encode($error_response);
    }
}

}