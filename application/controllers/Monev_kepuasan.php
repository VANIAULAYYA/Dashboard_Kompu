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
        $jenis_periode = $this->input->get('jenis_periode') ? $this->input->get('jenis_periode') : 'triwulan';
        $periode = $this->input->get('periode') ? $this->input->get('periode') : 'triwulan1';
        
        // Jika pilih "semua data", set periode ke null
        if ($jenis_periode == 'semua') {
            $date_range = ['start' => null, 'end' => null, 'label' => 'Semua Data'];
            $periode = 'semua';
        } else {
            // Hitung tanggal range berdasarkan periode
            $date_range = $this->get_date_range($periode);
        }
        
        // Ambil data dari model
        $data['jenis_periode'] = $jenis_periode;
        $data['periode_selected'] = $periode;
        $data['periode_label'] = $date_range['label']; // Untuk ditampilkan di view
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
        
        // Jika pilih "semua data", set periode ke null
        if ($jenis_periode == 'semua') {
            $date_range = ['start' => null, 'end' => null, 'label' => 'Semua Data'];
            $periode = 'semua';
        } else {
            $date_range = $this->get_date_range($periode);
        }
        
        // Ambil semua data untuk laporan
        $data['jenis_periode'] = $jenis_periode;
        $data['periode_selected'] = $periode;
        $data['date_range'] = $date_range;
        $data['total_responden'] = $this->M_monev_kepuasan->get_total_responden($date_range);
        $data['nilai_ikm'] = $this->M_monev_kepuasan->get_nilai_ikm($date_range);
        $data['grade_pkm'] = $this->get_grade($data['nilai_ikm']);
        $data['ringkasan'] = $this->M_monev_kepuasan->get_ringkasan_statistik($date_range);
        $data['unsur_skm'] = [
            ['nama' => 'Persyaratan', 'nilai' => $this->M_monev_kepuasan->get_rata_pendapat($date_range, 'pendapat_pelayanan')],
            ['nama' => 'Prosedur', 'nilai' => $this->M_monev_kepuasan->get_rata_pendapat($date_range, 'pemahaman_prosedur')],
            ['nama' => 'Kecepatan Waktu', 'nilai' => $this->M_monev_kepuasan->get_rata_pendapat($date_range, 'pendapat_kecepatan')],
            ['nama' => 'Biaya/Tarif', 'nilai' => $this->M_monev_kepuasan->get_rata_pendapat($date_range, 'pendapat_biaya')],
            ['nama' => 'Kesesuaian Produk Pelayanan', 'nilai' => $this->M_monev_kepuasan->get_rata_pendapat($date_range, 'pendapat_produk')],
            ['nama' => 'Kompetensi Petugas', 'nilai' => $this->M_monev_kepuasan->get_rata_pendapat($date_range, 'pendapat_kompetensi')],
            ['nama' => 'Perilaku Petugas', 'nilai' => $this->M_monev_kepuasan->get_rata_pendapat($date_range, 'pendapat_perilaku')],
            ['nama' => 'Penanganan Pengaduan', 'nilai' => $this->M_monev_kepuasan->get_rata_pendapat($date_range, 'pendapat_pengaduan')],
            ['nama' => 'Kualitas Sarana Prasarana', 'nilai' => $this->M_monev_kepuasan->get_rata_pendapat($date_range, 'pendapat_kualitas')]
        ];
        
        foreach ($data['unsur_skm'] as &$item) {
            $item['grade'] = $this->get_grade($item['nilai']);
        }
        
        $data['keperluan'] = $this->M_monev_kepuasan->get_keperluan_kunjungan($date_range);
        
        $this->load->view('admin/v_monev_print', $data);
    }

    // ... (method-method lainnya: api_chart_trend, get_date_range, get_grade tetap sama)

    /**
     * Fungsi untuk mendapatkan range tanggal berdasarkan periode
     */
    private function get_date_range($periode) {
        $tahun = 2024; // Tahun berjalan
        
        switch ($periode) {
            // Bulanan
            case 'januari':
                return ['start' => $tahun.'-01-01', 'end' => $tahun.'-01-31', 'label' => 'Januari '.$tahun];
            case 'februari':
                return ['start' => $tahun.'-02-01', 'end' => $tahun.'-02-'.date('t', strtotime($tahun.'-02-01')), 'label' => 'Februari '.$tahun];
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
}