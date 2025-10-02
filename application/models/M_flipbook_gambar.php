<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_flipbook_gambar extends CI_Model {

    // Ambil semua file gambar dari folder uploads/flipbook_demo/
    public function get_images() {
        $folder = FCPATH.'uploads/flipbook_demo/';
        $files = array_diff(scandir($folder), array('.', '..'));

        $images = [];
        foreach($files as $file){
            // filter file gambar saja
            if (preg_match('/\.(jpg|jpeg|png|gif)$/i', $file)) {
                $images[] = [
                    'nama_file' => $file,
                    'bukti_file'=> base_url('assets/template/assets/img/'.$file),
                    'jenis_laporan' => 'Gambar Demo',
                    'periode' => 'Demo'
                ];
            }
        }
        return $images;
    }
}
