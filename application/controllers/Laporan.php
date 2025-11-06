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
        
        // Redirect menggunakan base_url() untuk memastikan path benar
        redirect(base_url('Laporan/' . strtolower($jenis)));
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

        if ($this->M_laporan->update($id, $data)) {
            $this->session->set_flashdata('success', 'Data berhasil diupdate');
        } else {
            $this->session->set_flashdata('error', 'Gagal mengupdate data');
        }

        // Redirect menggunakan base_url()
        redirect(base_url('Laporan/' . strtolower($jenis)));
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
        
        if ($this->M_laporan->delete($id)) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data');
        }
        
        // Redirect berdasarkan jenis laporan
        redirect(base_url('Laporan/' . strtolower($jenis)));
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
        $upload_bukti = $this->_upload_file('bukti_file');

        $data = [
            'jenis_laporan' => $jenis,
            'periode'       => $this->input->post('periode'),
            'tanggal'       => $this->input->post('tanggal'),
            'nama_file'     => $this->input->post('nama_file'),
            'bukti_file'    => $upload_bukti,
        ];

        $this->M_laporan->insert($data);
        
        // Redirect menggunakan base_url() untuk memastikan path benar
        redirect(base_url('Laporan/kompu'));
    }

    public function update_kompu()
    {
        $id = $this->input->post('id');
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

        if ($this->M_laporan->update($id, $data)) {
            $this->session->set_flashdata('success', 'Data berhasil diupdate');
        } else {
            $this->session->set_flashdata('error', 'Gagal mengupdate data');
        }

        // Redirect ke kompu
        redirect(base_url('Laporan/kompu'));
    }

    public function delete_kompu($id)
    {
        $laporan = $this->M_laporan->get_by_id($id);

        if ($laporan && !empty($laporan->bukti_file)) {
            $path = FCPATH . 'uploads/bukti/' . $laporan->bukti_file;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        
        if ($this->M_laporan->delete($id)) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data');
        }
        
        // Redirect ke kompu
        redirect(base_url('Laporan/kompu'));
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
        $upload_bukti = $this->_upload_file('bukti_file');

        $data = [
            'jenis_laporan' => $jenis,
            'periode'       => $this->input->post('periode'),
            'tanggal'       => $this->input->post('tanggal'),
            'nama_file'     => $this->input->post('nama_file'),
            'bukti_file'    => $upload_bukti,
        ];

        $this->M_laporan->insert($data);
        
        // Redirect menggunakan base_url() untuk memastikan path benar
        redirect(base_url('Laporan/skm'));
    }

    public function update_skm()
    {
        $id = $this->input->post('id');
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

        if ($this->M_laporan->update($id, $data)) {
            $this->session->set_flashdata('success', 'Data berhasil diupdate');
        } else {
            $this->session->set_flashdata('error', 'Gagal mengupdate data');
        }

        // Redirect ke skm
        redirect(base_url('Laporan/skm'));
    }

    public function delete_skm($id)
    {
        $laporan = $this->M_laporan->get_by_id($id);

        if ($laporan && !empty($laporan->bukti_file)) {
            $path = FCPATH . 'uploads/bukti/' . $laporan->bukti_file;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        
        if ($this->M_laporan->delete($id)) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data');
        }
        
        // Redirect ke skm
        redirect(base_url('Laporan/skm'));
    }

    private function _upload_file($field_name, $old_file = null)
{
    if (!empty($_FILES[$field_name]['name'])) {
        $upload_path = FCPATH . 'uploads/bukti/';
        
        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0777, true);
        }

        $original_name = $_FILES[$field_name]['name'];
        
        if (file_exists($upload_path . $original_name)) {
            $file_extension = pathinfo($original_name, PATHINFO_EXTENSION);
            $file_name_without_ext = pathinfo($original_name, PATHINFO_FILENAME);
            $new_file_name = $file_name_without_ext . '_' . time() . '.' . $file_extension;
        } else {
            $new_file_name = $original_name;
        }

        $config['upload_path']   = $upload_path;
        $config['allowed_types'] = 'pdf';
        $config['max_size']      = 8120; // ⬅️ UBAH INI: 5MB = 5120 KB
        $config['file_name']     = $new_file_name;
        $config['overwrite']     = false;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload($field_name)) {
            if ($old_file && file_exists($upload_path . $old_file)) {
                unlink($upload_path . $old_file);
            }
            return $this->upload->data('file_name');
        } else {
            $error = $this->upload->display_errors();
            log_message('error', 'Upload Error: ' . $error);
            $this->session->set_flashdata('error', 'Gagal upload file: ' . $error);
            return $old_file;
        }
    }
    return $old_file;
}
}