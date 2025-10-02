<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_layanan_permintaan_data extends CI_Model {

    private $table = 'layanan_permintaan_data';

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }
    public function get_by_id($nomor)
{
    return $this->db->get_where($this->table, ['nomor' => $nomor])->row();
}

public function update($nomor, $data)
{
    $this->db->where('nomor', $nomor);
    return $this->db->update($this->table, $data);
}

public function delete($nomor)
{
    return $this->db->delete($this->table, ['nomor' => $nomor]);
}

}
