   <?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class M_admin extends CI_Model {
       public function __construct() {
           parent::__construct();
       }

       // Count total guests in the guest book
       public function count_tamu() {
           return $this->db->count_all('buku_tamu');
       }

       // Calculate average satisfaction rating
    //    public function avg_kepuasan() {
    //        $this->db->select_avg('nilai_kepuasan');
    //        $query = $this->db->get('buku_tamu');
    //        return $query->row()->nilai_kepuasan;
    //    }

       // Count total complaints
       public function count_aduan() {
           return $this->db->count_all('aduan');
       }

       // Count complaints that are in process
       public function count_aduan_proses() {
           $this->db->where('status', 'proses');
           return $this->db->count_all_results('aduan');
       }

       // Get all guest book entries
       public function get_tamu() {
           return $this->db->get('buku_tamu')->result();
       }

       // Get all complaints
       public function get_aduan() {
           return $this->db->get('aduan')->result();
       }
   }
   
   
?>