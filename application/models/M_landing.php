<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_landing extends CI_Model {

    public function insert_feedback($data) {
        $this->db->insert('buku_tamu', $data);
    }
}

?>
