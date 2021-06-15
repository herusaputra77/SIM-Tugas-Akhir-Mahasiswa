<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dosen extends CI_Model {
  public function jumlah_dosen()
  {
     $hasil = $this->db->query("SELECT COUNT(*) AS jumlahdata FROM tb_dosen");
     if($hasil->num_rows()>0)
     {
       return $hasil->row();
     }
     else
     {
       return 0;
     }
  }
  public function jumlah_proposal()
  {
     $hasil = $this->db->query("SELECT COUNT(*) AS jumlahproposal FROM tb_skripsi");
     if($hasil->num_rows()>0)
     {
       return $hasil->row();
     }
     else
     {
       return 0;
     }
  }
  public function cari_id()
  {
    
  }
  public function jml_bimbingan($where)
  {
     $hasil = $this->db->query("SELECT COUNT(*) AS jumlahdata FROM bimbingan WHERE bimbingan.id_dosen= $where");
     if($hasil->num_rows()>0)
     {
       return $hasil->row();
     }
     else
     {
       return 0;
     }
  }
  public function find_dosen($id)
  {
    $result = $this->db->where('id_dosen', $id)
               ->limit(1)
               ->get('dosen');
    if($result->num_rows() > 0){
      return $result->row();
    }else{
      return array();
    }
  }

  //  public function cek_nip()
  // {
  //   // $nip = set_value('nip');
  //   // $password = set_value('password');
  //   $nip = $this->input->post('nip',true);
  //   $password = $this->input->post('password',true);
  //   $result = $this->db->where('nip', $nip)
  //             ->where('password', $password)
  //             ->limit(1)
  //             ->get('tb_dosen');
  //   if($result->num_rows() > 0){
  //     return $result->row();
  //   }else {
  //     return array();
  //   }
  // }
  public function cek_dosen()
  {
    $kd_dosen = set_value('kd_dosen');
    $password = set_value('password');
    $result = $this->db->where('kd_dosen', $kd_dosen)
              ->where('password', $password)
              ->limit(1)
              ->get('tb_dosen');
    if($result->num_rows() > 0){
      return $result->row();
    }else {
      return array();
    }
  }
    public function cek_role()
  {
    $result = $this->db->get('role');
    if($result->num_rows() > 0){
      return $result->row();
    }else {
      return array();
    }
  }
}
