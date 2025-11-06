<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_layanan_pengaduan');
        $this->load->helper(['form', 'url']);
        
        // Tambahkan session check seperti di Admin
        if(!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
    }

    // READ - Index (Dashboard/Default View)
    public function index()
    {
        $data = [
            'title' => 'Layanan Pengaduan',
            'Pengaduan' => $this->M_layanan_pengaduan->get_all(),
            'tahun_available' => $this->M_layanan_pengaduan->get_available_years(),
            'tahun_selected' => date('Y'),
            'jenis_periode' => 'semua',
            'periode_selected' => 'semua',
            'periode_label' => 'Semua Data'
        ];
        $this->load->view('admin/v_layanan_pengaduan', $data);
    }

    // CREATE - tampil form tambah
    public function tambah()
    {
        $data = [
            'title' => 'Tambah Layanan Pengaduan'
        ];
        $this->load->view('admin/v_pengaduan_form', $data);
    }

    // CREATE - simpan data baru
    public function simpan()
    {
        $data = [
            'via' => $this->input->post('via'),
            'status_pengirim' => $this->input->post('status_pengirim'),
            'jenis' => $this->input->post('jenis'),
            'pengirim' => $this->input->post('pengirim'),
            'tanggal' => $this->input->post('tanggal'),
            'nomor_surat' => $this->input->post('nomor_surat'),
            'perihal' => $this->input->post('perihal'),
            'bukti_perihal' => $this->input->post('bukti_perihal'),
            'diterima_ppid' => $this->input->post('diterima_ppid'),
            'tindaklanjut' => $this->input->post('tindaklanjut'),
            'bukti_tindak_lanjut' => $this->input->post('bukti_tindak_lanjut'),
            'keterangan' => $this->input->post('keterangan'),
            'bukti_keterangan' => $this->input->post('bukti_keterangan'),
            'sumber' => $this->input->post('sumber'),
            'status' => $this->input->post('status')
        ];

        $this->M_layanan_pengaduan->insert($data);
        redirect('Pengaduan');
    }

    // UPDATE - tampil form edit
    public function edit($no)
    {
        $data = [
            'title' => 'Edit Layanan Pengaduan',
            'Pengaduan' => $this->M_layanan_pengaduan->get_by_id($no)
        ];

        if (!$data['Pengaduan']) {
            show_error("Data dengan ID $no tidak ditemukan");
        }

        $this->load->view('admin/v_pengaduan_edit', $data);
    }

    // UPDATE - simpan perubahan
    public function update()
    {
        $no = $this->input->post('no');
        $data = [
            'via' => $this->input->post('via'),
            'status_pengirim' => $this->input->post('status_pengirim'),
            'jenis' => $this->input->post('jenis'),
            'pengirim' => $this->input->post('pengirim'),
            'tanggal' => $this->input->post('tanggal'),
            'nomor_surat' => $this->input->post('nomor_surat'),
            'perihal' => $this->input->post('perihal'),
            'bukti_perihal' => $this->input->post('bukti_perihal'),
            'diterima_ppid' => $this->input->post('diterima_ppid'),
            'tindaklanjut' => $this->input->post('tindaklanjut'),
            'bukti_tindak_lanjut' => $this->input->post('bukti_tindak_lanjut'),
            'keterangan' => $this->input->post('keterangan'),
            'bukti_keterangan' => $this->input->post('bukti_keterangan'),
            'sumber' => $this->input->post('sumber'),
            'status' => $this->input->post('status')
        ];

        $this->M_layanan_pengaduan->update($no, $data);
        redirect('Pengaduan');
    }

    // DELETE
    public function delete($no)
    {
        $this->M_layanan_pengaduan->delete($no);
        redirect('Pengaduan');
    }

    // ========= HALAMAN PENGADUAN DENGAN FILTER =========
    public function filter()
    {
        // Ambil parameter filter
        $jenis_periode = $this->input->get('jenis_periode') ? $this->input->get('jenis_periode') : 'triwulan';
        $periode = $this->input->get('periode') ? $this->input->get('periode') : 'triwulan1';
        $tahun = $this->input->get('tahun') ? $this->input->get('tahun') : date('Y');
        
        // Ambil tahun yang tersedia dari database
        $tahun_available = $this->M_layanan_pengaduan->get_available_years();
        
        // Handle date range
        if ($jenis_periode == 'semua') {
            $date_range = ['start' => null, 'end' => null, 'label' => 'Semua Data'];
            $periode = 'semua';
            $tahun = 'semua';
        } elseif ($jenis_periode == 'tahunan') {
            $periode = 'tahunan';
            $tahun_for_range = ($tahun == 'semua') ? null : $tahun;
            $date_range = $this->get_date_range($periode, $tahun_for_range);
        } else {
            $tahun_for_range = ($tahun == 'semua') ? null : $tahun;
            $date_range = $this->get_date_range($periode, $tahun_for_range);
        }
        
        // Get data dengan filter
        $data = [
            'title' => 'Layanan Pengaduan',
            'Pengaduan' => $this->M_layanan_pengaduan->get_with_filter($date_range),
            'tahun_available' => $tahun_available,
            'tahun_selected' => $tahun,
            'jenis_periode' => $jenis_periode,
            'periode_selected' => $periode,
            'periode_label' => $date_range['label']
        ];
        
        $this->load->view('admin/v_layanan_pengaduan', $data);
    }

    // ========= FUNGSI GET DATE RANGE SEPERTI DI ADMIN =========
    
    /**
     * Fungsi untuk mendapatkan range tanggal berdasarkan periode
     */
    private function get_date_range($periode, $tahun = null)
    {
        if ($tahun === null) {
            $tahun = date('Y');
        }
        
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

    // 📊 EXPORT EXCEL PENGADUAN
    public function export_excel_pengaduan() {
        // Ambil parameter filter
        $jenis_periode = $this->input->get('jenis_periode') ? $this->input->get('jenis_periode') : 'semua';
        $periode = $this->input->get('periode') ? $this->input->get('periode') : 'semua';
        $tahun = $this->input->get('tahun') ? $this->input->get('tahun') : 'semua';
        
        // Handle date range
        if ($jenis_periode == 'semua') {
            $date_range = ['start' => null, 'end' => null, 'label' => 'Semua Data'];
        } elseif ($jenis_periode == 'tahunan') {
            $tahun_for_range = ($tahun == 'semua') ? null : $tahun;
            $date_range = $this->get_date_range('tahunan', $tahun_for_range);
        } else {
            $tahun_for_range = ($tahun == 'semua') ? null : $tahun;
            $date_range = $this->get_date_range($periode, $tahun_for_range);
        }
        
        // Gunakan model untuk konsistensi
        $all_data = $this->M_layanan_pengaduan->get_with_filter($date_range);
        
        // Export ke Excel
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"pengaduan_" . date('Y-m-d') . ".xls\"");
        header("Cache-Control: max-age=0");
        
        echo "<html><head><meta charset=\"UTF-8\"><style>table { border-collapse: collapse; width: 100%; } th, td { border: 1px solid #000; padding: 8px; } th { background-color: #f2f2f2; }</style></head><body>";
        
        echo "<h2>LAPORAN PENGADUAN</h2>";
        echo "<h3>BBWS BRANTAS</h3>";
        echo "<p><strong>Periode:</strong> " . $date_range['label'] . "</p>";
        echo "<p><strong>Tanggal Export:</strong> " . date('d/m/Y H:i:s') . "</p>";
        
        echo "<table border='1'>";
        echo "<tr>
            <th>No</th>
            <th>Via</th>
            <th>Status Pengirim</th>
            <th>Jenis</th>
            <th>Pengirim</th>
            <th>Tanggal</th>
            <th>Nomor Surat</th>
            <th>Perihal</th>
            <th>Diterima PPID</th>
            <th>Tindak Lanjut</th>
            <th>Keterangan</th>
            <th>Sumber</th>
            <th>Status</th>
        </tr>";
        
        $no = 1;
        foreach($all_data as $p) {
            echo "<tr>
                <td>{$no}</td>
                <td>{$p->via}</td>
                <td>{$p->status_pengirim}</td>
                <td>{$p->jenis}</td>
                <td>{$p->pengirim}</td>
                <td>" . ($p->tanggal ? date('d/m/Y', strtotime($p->tanggal)) : '') . "</td>
                <td>{$p->nomor_surat}</td>
                <td>{$p->perihal}</td>
                <td>" . ($p->diterima_ppid ? date('d/m/Y', strtotime($p->diterima_ppid)) : '') . "</td>
                <td>{$p->tindaklanjut}</td>
                <td>{$p->keterangan}</td>
                <td>{$p->sumber}</td>
                <td>{$p->status}</td>
            </tr>";
            $no++;
        }
        echo "</table></body></html>";
        exit;
    }

    // 📊 EXPORT PDF PENGADUAN
    public function export_pdf_pengaduan() {
        // Ambil parameter filter
        $jenis_periode = $this->input->get('jenis_periode') ? $this->input->get('jenis_periode') : 'semua';
        $periode = $this->input->get('periode') ? $this->input->get('periode') : 'semua';
        $tahun = $this->input->get('tahun') ? $this->input->get('tahun') : 'semua';
        
        // Handle date range
        if ($jenis_periode == 'semua') {
            $date_range = ['start' => null, 'end' => null, 'label' => 'Semua Data'];
        } elseif ($jenis_periode == 'tahunan') {
            $tahun_for_range = ($tahun == 'semua') ? null : $tahun;
            $date_range = $this->get_date_range('tahunan', $tahun_for_range);
        } else {
            $tahun_for_range = ($tahun == 'semua') ? null : $tahun;
            $date_range = $this->get_date_range($periode, $tahun_for_range);
        }
        
        // Get data dengan filter
        $data = [
            'pengaduan_data' => $this->M_layanan_pengaduan->get_with_filter($date_range),
            'periode_label' => $date_range['label']
        ];
        
        $this->load->view('admin/export_pengaduan_pdf', $data);
    }

    // 📊 DASHBOARD STATISTICS
public function dashboard_stats()
{
    $data = [
        'title' => 'Dashboard Layanan Pengaduan',
        'total_pengaduan' => $this->M_layanan_pengaduan->count_all(),
        'pengaduan_baru' => $this->M_layanan_pengaduan->count_by_status('baru'),
        'pengaduan_diproses' => $this->M_layanan_pengaduan->count_by_status('diproses'),
        'pengaduan_selesai' => $this->M_layanan_pengaduan->count_by_status('selesai'),
        'recent_pengaduan' => $this->M_layanan_pengaduan->get_recent(5),
        'chart_data' => $this->M_layanan_pengaduan->get_chart_data(date('Y'))
    ];
    
    // DEBUG: Cek data chart
    echo "<pre>";
    print_r($data['chart_data']);
    echo "</pre>";
    exit;
    
    $this->load->view('admin/v_dashboard_pengaduan', $data);
}
}