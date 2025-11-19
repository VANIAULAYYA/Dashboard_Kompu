<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_layanan_permintaan_data');
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
            'title' => 'Layanan Permintaan Data',
            'Layanan' => $this->M_layanan_permintaan_data->get_all(),
            'tahun_available' => $this->M_layanan_permintaan_data->get_available_years(),
            'tahun_selected' => date('Y'),
            'jenis_periode' => 'semua',
            'periode_selected' => 'semua',
            'periode_label' => 'Semua Data'
        ];
        $this->load->view('admin/v_layanan_permintaan_data', $data);
    }

    // CREATE - tampil form tambah
    public function tambah()
    {
        $data = [
            'title' => 'Tambah Layanan Permintaan Data'
        ];
        $this->load->view('admin/v_layanan_form', $data);
    }

    // CREATE - simpan data baru DENGAN AUTO GENERATE PDF
    public function simpan()
    {
        $data = [
            'via'               => $this->input->post('via'),
            'status_pemohon'    => $this->input->post('status_pemohon'),
            'pengirim'          => $this->input->post('pengirim'),
            'tanggal_surat'     => $this->input->post('tanggal_surat'),
            'nomor_surat'       => $this->input->post('nomor_surat'),
            'perihal'           => $this->input->post('perihal'),
            'diterima_ppid'     => $this->input->post('diterima_ppid'),
            'link_bukti_surat'  => $this->input->post('link_bukti_surat'),
            'tindak_lanjut'     => $this->input->post('tindak_lanjut'),
            'status'            => $this->input->post('status'),
            'link_bukti_surat_penyelesaian'    => $this->input->post('link_bukti_surat_penyelesaian'),
        ];

        // 1. Simpan data ke database dan ambil ID-nya
        $id_permohonan = $this->M_layanan_permintaan_data->insert($data);
        
        // 2. Auto generate PDF dokumen
        $pdf_path = $this->generate_pdf_document($id_permohonan);
        
        // 3. Update database dengan path PDF
        $update_data = ['pdf_path' => $pdf_path];
        $this->M_layanan_permintaan_data->update($id_permohonan, $update_data);

        $this->session->set_flashdata('success', 'Data berhasil disimpan dan dokumen PDF telah dibuat.');
        redirect('Layanan');
    }

    // UPDATE - tampil form edit
    public function edit($nomor)
    {
        $data = [
            'title' => 'Edit Layanan Permintaan Data',
            'Layanan' => $this->M_layanan_permintaan_data->get_by_id($nomor)
        ];

        if (!$data['Layanan']) {
            show_error('Data tidak ditemukan');
        }

        $this->load->view('admin/v_layanan_edit', $data);
    }

    // UPDATE - simpan perubahan
    public function update()
    {
        $nomor = $this->input->post('nomor');

        $data = [
            'via'               => $this->input->post('via'),
            'status_pemohon'    => $this->input->post('status_pemohon'),
            'pengirim'          => $this->input->post('pengirim'),
            'tanggal_surat'     => $this->input->post('tanggal_surat'),
            'nomor_surat'       => $this->input->post('nomor_surat'),
            'perihal'           => $this->input->post('perihal'),
            'diterima_ppid'     => $this->input->post('diterima_ppid'),
            'link_bukti_surat'  => $this->input->post('link_bukti_surat'),
            'tindak_lanjut'     => $this->input->post('tindak_lanjut'),
            'status'            => $this->input->post('status'),
            'link_bukti_surat_penyelesaian'    => $this->input->post('link_bukti_surat_penyelesaian'),
        ];

        $this->M_layanan_permintaan_data->update($nomor, $data);
        
        $this->session->set_flashdata('success', 'Data berhasil diupdate.');
        redirect('Layanan');
    }

    // DELETE
    public function delete($nomor)
    {
        $this->M_layanan_permintaan_data->delete($nomor);
        $this->session->set_flashdata('success', 'Data berhasil dihapus.');
        redirect('Layanan');
    }

    // ========= FUNCTION AUTO GENERATE PDF =========
private function generate_pdf_document($id_permohonan) 
{
    $data['permohonan'] = $this->M_layanan_permintaan_data->get_by_id($id_permohonan);
    
    // ✅ Load view dengan encoding UTF-8
    $html_content = $this->load->view('cetak_formulir', $data, TRUE);
    
    $filename = 'formulir_permohonan_' . $id_permohonan . '_' . date('YmdHis') . '.html';
    $filepath = 'uploads/documents/' . $filename;
    
    // ✅ Simpan dengan encoding UTF-8
    file_put_contents(FCPATH . $filepath, $html_content);
    
    return $filepath;
}

// Di Controller sebelum load view
public function view_pdf($id) {
    $this->load->model('M_layanan_permintaan_data', 'layanan_model');
    $data['permohonan'] = $this->layanan_model->get_by_id($id);
    
    // Jika dari Layanan Permintaan, generate buku_tamu_id
    if ($data['permohonan'] && !isset($data['permohonan']->buku_tamu_id)) {
        $data['permohonan']->buku_tamu_id = 'BT-' . date('Y') . '-' . str_pad($data['permohonan']->nomor, 3, '0', STR_PAD_LEFT);
    }
    
    $this->load->view('cetak_formulir', $data);
}

    // Function untuk download PDF
    public function download_pdf($id) 
    {
        $permohonan = $this->M_layanan_permintaan_data->get_by_id($id);
        
        if ($permohonan && !empty($permohonan->pdf_path) && file_exists(FCPATH . $permohonan->pdf_path)) {
            header('Content-Type: text/html');
            header('Content-Disposition: attachment; filename="formulir_permohonan_' . $id . '.html"');
            readfile(FCPATH . $permohonan->pdf_path);
            exit;
        } else {
            show_error('File dokumen tidak ditemukan');
        }
    }

    // ========= HALAMAN LAYANAN DENGAN FILTER =========
    public function filter()
    {
        // Ambil parameter filter
        $jenis_periode = $this->input->get('jenis_periode') ? $this->input->get('jenis_periode') : 'triwulan';
        $periode = $this->input->get('periode') ? $this->input->get('periode') : 'triwulan1';
        $tahun = $this->input->get('tahun') ? $this->input->get('tahun') : date('Y');
        
        // Ambil tahun yang tersedia dari database
        $tahun_available = $this->M_layanan_permintaan_data->get_available_years();
        
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
            'title' => 'Layanan Permintaan Data',
            'Layanan' => $this->M_layanan_permintaan_data->get_with_filter($date_range),
            'tahun_available' => $tahun_available,
            'tahun_selected' => $tahun,
            'jenis_periode' => $jenis_periode,
            'periode_selected' => $periode,
            'periode_label' => $date_range['label']
        ];
        
        $this->load->view('admin/v_layanan_permintaan_data', $data);
    }

    /**
     * Helper function untuk generate date range
     */
    private function get_date_range($periode, $tahun = null)
{
    if ($tahun === null) {
        $tahun = date('Y');
    }
    
    switch ($periode) {
        // === TAMBAHKAN BULANAN ===
        case 'januari': 
            return ['start' => $tahun.'-01-01', 'end' => $tahun.'-01-31 23:59:59', 'label' => 'Januari '.$tahun];
        case 'februari': 
            $end_day = date('t', strtotime($tahun.'-02-01'));
            return ['start' => $tahun.'-02-01', 'end' => $tahun.'-02-'.$end_day.' 23:59:59', 'label' => 'Februari '.$tahun];
        case 'maret': 
            return ['start' => $tahun.'-03-01', 'end' => $tahun.'-03-31 23:59:59', 'label' => 'Maret '.$tahun];
        case 'april': 
            return ['start' => $tahun.'-04-01', 'end' => $tahun.'-04-30 23:59:59', 'label' => 'April '.$tahun];
        case 'mei': 
            return ['start' => $tahun.'-05-01', 'end' => $tahun.'-05-31 23:59:59', 'label' => 'Mei '.$tahun];
        case 'juni': 
            return ['start' => $tahun.'-06-01', 'end' => $tahun.'-06-30 23:59:59', 'label' => 'Juni '.$tahun];
        case 'juli': 
            return ['start' => $tahun.'-07-01', 'end' => $tahun.'-07-31 23:59:59', 'label' => 'Juli '.$tahun];
        case 'agustus': 
            return ['start' => $tahun.'-08-01', 'end' => $tahun.'-08-31 23:59:59', 'label' => 'Agustus '.$tahun];
        case 'september': 
            return ['start' => $tahun.'-09-01', 'end' => $tahun.'-09-30 23:59:59', 'label' => 'September '.$tahun];
        case 'oktober': 
            return ['start' => $tahun.'-10-01', 'end' => $tahun.'-10-31 23:59:59', 'label' => 'Oktober '.$tahun];
        case 'november': 
            return ['start' => $tahun.'-11-01', 'end' => $tahun.'-11-30 23:59:59', 'label' => 'November '.$tahun];
        case 'desember': 
            return ['start' => $tahun.'-12-01', 'end' => $tahun.'-12-31 23:59:59', 'label' => 'Desember '.$tahun];
            
        // === YANG SUDAH ADA ===
        case 'triwulan1':
            $start = $tahun . '-01-01';
            $end = $tahun . '-03-31 23:59:59';
            $label = 'Triwulan I (' . $tahun . ')';
            break;
            
        case 'triwulan2':
            $start = $tahun . '-04-01';
            $end = $tahun . '-06-30 23:59:59';
            $label = 'Triwulan II (' . $tahun . ')';
            break;
            
        case 'triwulan3':
            $start = $tahun . '-07-01';
            $end = $tahun . '-09-30 23:59:59';
            $label = 'Triwulan III (' . $tahun . ')';
            break;
            
        case 'triwulan4':
            $start = $tahun . '-10-01';
            $end = $tahun . '-12-31 23:59:59';
            $label = 'Triwulan IV (' . $tahun . ')';
            break;
            
        case 'tahunan':
            $start = $tahun . '-01-01';
            $end = $tahun . '-12-31 23:59:59';
            $label = 'Tahun ' . $tahun;
            break;
            
        case 'semester1':
            $start = $tahun . '-01-01';
            $end = $tahun . '-06-30 23:59:59';
            $label = 'Semester I (' . $tahun . ')';
            break;
            
        case 'semester2':
            $start = $tahun . '-07-01';
            $end = $tahun . '-12-31 23:59:59';
            $label = 'Semester II (' . $tahun . ')';
            break;
        }
        
    return [
        'start' => $start,
        'end' => $end,
        'label' => $label
    ];
}

    // 📊 EXPORT PDF PERMINTAAN DATA
    public function export_permintaan_data() {
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
            'permintaan_data' => $this->M_layanan_permintaan_data->get_with_filter($date_range),
            'periode_label' => $date_range['label']
        ];
        
        $this->load->view('admin/export_permintaan_data', $data);
    }

    // 📊 EXPORT EXCEL PERMINTAAN DATA
    public function export_excel_permintaan_data() {
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
        $all_data = $this->M_layanan_permintaan_data->get_with_filter($date_range);
        
        // Export ke Excel
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"permintaan_data_" . date('Y-m-d') . ".xls\"");
        header("Cache-Control: max-age=0");
        
        echo "<html><head><meta charset=\"UTF-8\"><style>table { border-collapse: collapse; width: 100%; } th, td { border: 1px solid #000; padding: 8px; } th { background-color: #f2f2f2; }</style></head><body>";
        
        echo "<h2>LAPORAN PERMINTAAN DATA</h2>";
        echo "<h3>BBWS BRANTAS</h3>";
        echo "<p><strong>Periode:</strong> " . $date_range['label'] . "</p>";
        echo "<p><strong>Tanggal Export:</strong> " . date('d/m/Y H:i:s') . "</p>";
        
        echo "<table border='1'>";
        echo "<tr>
            <th>No</th>
            <th>Via</th>
            <th>Status Pemohon</th>
            <th>Pengirim</th>
            <th>Tanggal Surat</th>
            <th>Nomor Surat</th>
            <th>Perihal</th>
            <th>Diterima PPID</th>
            <th>Tindak Lanjut</th>
            <th>Status</th>
        </tr>";
        
        $no = 1;
        foreach($all_data as $p) {
            echo "<tr>
                <td>{$no}</td>
                <td>{$p->via}</td>
                <td>{$p->status_pemohon}</td>
                <td>{$p->pengirim}</td>
                <td>" . ($p->tanggal_surat ? date('d/m/Y', strtotime($p->tanggal_surat)) : '') . "</td>
                <td>{$p->nomor_surat}</td>
                <td>{$p->perihal}</td>
                <td>" . ($p->diterima_ppid ? date('d/m/Y', strtotime($p->diterima_ppid)) : '') . "</td>
                <td>{$p->tindak_lanjut}</td>
                <td>{$p->status}</td>
            </tr>";
            $no++;
        }
        echo "</table></body></html>";
        exit;
    }

    // 📊 DASHBOARD STATISTICS
    public function dashboard_stats()
    {
        $data = [
            'title' => 'Dashboard Layanan Permintaan Data',
            'total_permintaan' => $this->M_layanan_permintaan_data->count_all(),
            'permintaan_baru' => $this->M_layanan_permintaan_data->count_by_status('baru'),
            'permintaan_diproses' => $this->M_layanan_permintaan_data->count_by_status('diproses'),
            'permintaan_selesai' => $this->M_layanan_permintaan_data->count_by_status('selesai'),
            'recent_permintaan' => $this->M_layanan_permintaan_data->get_recent(5),
            'chart_data' => $this->M_layanan_permintaan_data->get_chart_data(date('Y'))
        ];
        
        $this->load->view('admin/v_dashboard_layanan', $data);
    }

    // Tambahkan di bawah fungsi download_pdf
public function back()
{
    $return_url = $this->session->userdata('pdf_return_url');
    $this->session->unset_userdata('pdf_return_url');
    
    if ($return_url) {
        redirect($return_url);
    } else {
        redirect('Layanan'); // Fallback ke index
    }
}
}