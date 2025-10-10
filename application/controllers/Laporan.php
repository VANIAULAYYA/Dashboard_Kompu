<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_laporan');
        $this->load->helper(['form','url']);
    }

    // ================== LAPORAN PPID ==================
    public function ppid()
    {
        $data['Laporan'] = $this->M_laporan->get_all('PPID');
        $data['jenis']   = 'PPID';
        $this->load->view('admin/v_laporan_ppid', $data);
    }

    public function simpan()
    {
        $jenis = $this->input->post('jenis_laporan');
        $upload_bukti = $this->_upload_file('bukti_file');

        $data = [
            'jenis_laporan' => $jenis,
            'periode'       => $this->input->post('periode'),
            'tanggal'       => $this->input->post('tanggal'),
            'nama_file'     => $this->input->post('nama_file'),
            'bukti_file'    => $upload_bukti,
        ];

        $this->M_laporan->insert($data);
        redirect('Laporan/' . strtolower($jenis));
    }

    public function update()
    {
        $id    = $this->input->post('id');
        $jenis = $this->input->post('jenis_laporan');

        $laporan = $this->M_laporan->get_by_id($id);
        $upload_bukti = $this->_upload_file('bukti_file', $laporan->bukti_file);

        $data = [
            'jenis_laporan' => $jenis,
            'periode'       => $this->input->post('periode'),
            'tanggal'       => $this->input->post('tanggal'),
            'nama_file'     => $this->input->post('nama_file'),
            'bukti_file'    => $upload_bukti,
        ];

        $this->M_laporan->update($id, $data);
        redirect('Laporan/' . strtolower($jenis));
    }

    public function delete($id)
    {
        $laporan = $this->M_laporan->get_by_id($id);

        if ($laporan && !empty($laporan->bukti_file)) {
            $path = FCPATH . 'uploads/bukti/' . $laporan->bukti_file;
            if (file_exists($path)) {
                unlink($path);
            }
        }

        $jenis = $laporan->jenis_laporan;
        $this->M_laporan->delete($id);
        redirect('Laporan/' . strtolower($jenis));
    }

    private function _upload_file($field_name, $old_file = null)
    {
        if (!empty($_FILES[$field_name]['name'])) {
            $config['upload_path']   = './uploads/bukti/';
            $config['allowed_types'] = 'pdf';
            $config['max_size']      = 2048; // 2MB
            $config['file_name']     = time() . '_' . $_FILES[$field_name]['name'];
            $config['overwrite']     = true;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload($field_name)) {
                if ($old_file && file_exists('./uploads/bukti/' . $old_file)) {
                    unlink('./uploads/bukti/' . $old_file);
                }
                return $this->upload->data('file_name');
            } else {
                log_message('error', $this->upload->display_errors());
                return $old_file;
            }
        }
        return $old_file;
    }


    // ================== LAPORAN KOMPU ==================
    public function kompu()
    {
        $data['Laporan'] = $this->M_laporan->get_all('KOMPU');
        $data['jenis']   = 'KOMPU';
        $this->load->view('admin/v_laporan_kompu', $data);
    }

    public function simpan_kompu()
    {
        $jenis = $this->input->post('jenis_laporan');
        $data = [
            'jenis_laporan' => $jenis,
            'periode'       => $this->input->post('periode'),
            'tanggal'       => $this->input->post('tanggal'),
            'nama_file'     => $this->input->post('nama_file'),
            'bukti_file'    => $this->input->post('bukti_file'),
        ];
        $this->M_laporan->insert($data);
        redirect('Laporan/' . strtolower($jenis));
    }

    public function update_kompu()
    {
        $id = $this->input->post('id');
        $jenis = $this->input->post('jenis_laporan');
        $data = [
            'jenis_laporan' => $jenis,
            'periode'       => $this->input->post('periode'),
            'tanggal'       => $this->input->post('tanggal'),
            'nama_file'     => $this->input->post('nama_file'),
            'bukti_file'    => $this->input->post('bukti_file'),
        ];
        $this->M_laporan->update($id, $data);
        redirect('Laporan/' . strtolower($jenis));
    }

    public function delete_kompu($id)
    {
        $laporan = $this->M_laporan->get_by_id($id);
        $jenis = $laporan->jenis_laporan;
        $this->M_laporan->delete($id);
        redirect('Laporan/' . strtolower($jenis));
    }

    // ===================== SKM =====================
    public function skm()
    {
        $data['Laporan'] = $this->M_laporan->get_all('SKM');
        $data['jenis']   = 'SKM';
        $this->load->view('admin/v_skm', $data);
    }

    public function simpan_skm()
    {
        $jenis = $this->input->post('jenis_laporan');
        $data = [
            'jenis_laporan' => $jenis,
            'periode'       => $this->input->post('periode'),
            'tanggal'       => $this->input->post('tanggal'),
            'nama_file'     => $this->input->post('nama_file'),
            'bukti_file'    => $this->input->post('bukti_file'),
        ];
        $this->M_laporan->insert($data);
        redirect('Laporan/' . strtolower($jenis));
    }

    public function update_skm()
    {
        $id = $this->input->post('id');
        $jenis = $this->input->post('jenis_laporan');
        $data = [
            'jenis_laporan' => $jenis,
            'periode'       => $this->input->post('periode'),
            'tanggal'       => $this->input->post('tanggal'),
            'nama_file'     => $this->input->post('nama_file'),
            'bukti_file'    => $this->input->post('bukti_file'),
        ];
        $this->M_laporan->update($id, $data);
        redirect('Laporan/' . strtolower($jenis));
    }

    public function delete_skm($id)
    {
        $laporan = $this->M_laporan->get_by_id($id);
        $jenis = $laporan->jenis_laporan;
        $this->M_laporan->delete($id);
        redirect('Laporan/' . strtolower($jenis));
    }
}
