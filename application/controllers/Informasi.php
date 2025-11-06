<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_layanan_informasi');
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
            'title' => 'Layanan Informasi',
            'Informasi' => $this->M_layanan_informasi->get_all(),
            'tahun_available' => $this->M_layanan_informasi->get_available_years(),
            'tahun_selected' => date('Y'),
            'jenis_periode' => 'semua',
            'periode_selected' => 'semua',
            'periode_label' => 'Semua Data'
        ];
        $this->load->view('admin/v_layanan_informasi', $data);
    }

    // CREATE - tampil form tambah
    public function tambah()
    {
        $data = [
            'title' => 'Tambah Layanan Informasi'
        ];
        $this->load->view('admin/v_informasi_form', $data);
    }

    // CREATE - simpan data baru
    public function simpan()
{
    $data = [
        'kegiatan'         => $this->input->post('kegiatan'),
        'lokasi'           => $this->input->post('lokasi'),
        'uraian'           => $this->input->post('uraian'),
        'tanggal'          => $this->input->post('tanggal'),
        'jumlah_like'      => $this->input->post('jumlah_like'), // ✅ BACA DARI FORM
        'jumlah_komentar'  => $this->input->post('jumlah_komentar'), // ✅ BACA DARI FORM
        'keterangan'       => $this->input->post('keterangan'),
        'bukti_tautan'     => $this->input->post('bukti_tautan'),
    ];

    $this->M_layanan_informasi->insert($data);
    redirect('Informasi');
}

    // UPDATE - tampil form edit
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Layanan Informasi',
            'Informasi' => $this->M_layanan_informasi->get_by_id($id)
        ];

        if (!$data['Informasi']) {
            show_error("Data dengan ID $id tidak ditemukan");
        }

        $this->load->view('admin/v_informasi_edit', $data);
    }

    // UPDATE - simpan perubahan
    public function update()
    {
        $id = $this->input->post('no');
        $data = [
            'kegiatan'        => $this->input->post('kegiatan'),
            'lokasi'          => $this->input->post('lokasi'),
            'uraian'          => $this->input->post('uraian'),
            'tanggal'         => $this->input->post('tanggal'),
            'jumlah_like'     => $this->input->post('jumlah_like'),
            'jumlah_komentar' => $this->input->post('jumlah_komentar'),
            'keterangan'      => $this->input->post('keterangan'),
            'bukti_tautan'    => $this->input->post('bukti_tautan'),
        ];

        $this->M_layanan_informasi->update($id, $data);
        redirect('Informasi');
    }

    // DELETE
    public function delete($id)
    {
        $this->M_layanan_informasi->delete($id);
        redirect('Informasi');
    }

    // ========= HALAMAN INFORMASI DENGAN FILTER =========
    public function filter()
    {
        // Ambil parameter filter
        $jenis_periode = $this->input->get('jenis_periode') ? $this->input->get('jenis_periode') : 'triwulan';
        $periode = $this->input->get('periode') ? $this->input->get('periode') : 'triwulan1';
        $tahun = $this->input->get('tahun') ? $this->input->get('tahun') : date('Y');
        
        // Ambil tahun yang tersedia dari database
        $tahun_available = $this->M_layanan_informasi->get_available_years();
        
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
            'title' => 'Layanan Informasi',
            'Informasi' => $this->M_layanan_informasi->get_with_filter($date_range),
            'tahun_available' => $tahun_available,
            'tahun_selected' => $tahun,
            'jenis_periode' => $jenis_periode,
            'periode_selected' => $periode,
            'periode_label' => $date_range['label']
        ];
        
        $this->load->view('admin/v_layanan_informasi', $data);
    }

    // ========= FUNGSI GET DATE RANGE SEPERTI DI ADMIN =========
    
    /**
     * Fungsi untuk mendapatkan range tanggal berdasarkan periode
     * SAMA PERSIS DENGAN YANG DI ADMIN CONTROLLER
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

    public function export_informasi() {
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
    
    // Query langsung di controller
    $this->db->from('layanan_informasi');
    
    if ($date_range['start'] && $date_range['end']) {
        $this->db->where('tanggal >=', $date_range['start']);
        $this->db->where('tanggal <=', $date_range['end']);
    }
    
    $this->db->order_by('tanggal', 'ASC');
    $informasi_data = $this->db->get()->result();
    
    $data = [
        'informasi_data' => $informasi_data,
        'periode_label' => $date_range['label']
    ];
    
    $this->load->view('admin/export_informasi', $data);
}

// 📊 EXPORT EXCEL INFORMASI
public function export_excel_informasi() {
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
    
    // Query langsung di controller
    $this->db->from('layanan_informasi');
    
    if ($date_range['start'] && $date_range['end']) {
        $this->db->where('tanggal >=', $date_range['start']);
        $this->db->where('tanggal <=', $date_range['end']);
    }
    
    $this->db->order_by('tanggal', 'ASC');
    $all_data = $this->db->get()->result();
    
    // Export ke Excel
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"informasi_" . date('Y-m-d') . ".xls\"");
    header("Cache-Control: max-age=0");
    
    echo "<html><head><meta charset=\"UTF-8\"><style>table { border-collapse: collapse; width: 100%; } th, td { border: 1px solid #000; padding: 8px; } th { background-color: #f2f2f2; }</style></head><body>";
    
    echo "<h2>LAPORAN LAYANAN INFORMASI</h2>";
    echo "<h3>BBWS BRANTAS</h3>";
    echo "<p><strong>Periode:</strong> " . $date_range['label'] . "</p>";
    echo "<p><strong>Tanggal Export:</strong> " . date('d/m/Y H:i:s') . "</p>";
    
    echo "<table border='1'>";
    echo "<tr>
        <th>No</th>
        <th>Kegiatan</th>
        <th>Lokasi</th>
        <th>Uraian</th>
        <th>Tanggal</th>
        <th>Jumlah Like</th>
        <th>Jumlah Komentar</th>
        <th>Keterangan</th>
    </tr>";
    
    $no = 1;
    foreach($all_data as $i) {
        echo "<tr>
            <td>{$no}</td>
            <td>{$i->kegiatan}</td>
            <td>{$i->lokasi}</td>
            <td>{$i->uraian}</td>
            <td>{$i->tanggal}</td>
            <td>{$i->jumlah_like}</td>
            <td>{$i->jumlah_komentar}</td>
            <td>{$i->keterangan}</td>
        </tr>";
        $no++;
    }
    echo "</table></body></html>";
    exit;
}
}