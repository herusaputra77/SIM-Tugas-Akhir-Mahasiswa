<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model {
  public function jumlah_pegawai()
  {
     $hasil = $this->db->query("SELECT COUNT(*) AS jumlahdata FROM pegawai");
     if($hasil->num_rows()>0)
     {
       return $hasil->row();
     }
     else
     {
       return 0;
     }
  }
   public function cek_nip()
  {
    $nip = set_value('nip');
    $password = set_value('password');
    $result = $this->db->where('nip', $nip)
              ->where('password', $password)
              ->limit(1)
              ->get('pegawai');
    if($result->num_rows() > 0){
      return $result->row();
    }else {
      return array();
    }
  }
}