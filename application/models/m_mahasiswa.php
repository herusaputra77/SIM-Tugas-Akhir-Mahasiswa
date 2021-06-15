<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mahasiswa extends CI_Model {
  public function jumlah_mhs()
  {
     $hasil = $this->db->query("SELECT COUNT(*) AS jumlahdata FROM tb_mahasiswa");
     if($hasil->num_rows()>0)
     {
       return $hasil->row();
     }
     else
     {
       return 0;
     }
  }
  public function input_data($data, $table)
    {
  	 $this->db->insert($table, $data);
    }
  public function cek_nim()
  {
    $nim = set_value('nim');
    $password = set_value('password');
    $result = $this->db->where('nim', $nim)
              ->where('password', $password)
              ->limit(1)
              ->get('tb_mahasiswa');
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
  // public function cari_pembimbing() 
  // { 
  //   $nim = $this->session->userdata('nim');
  //   $result= $this->db->query("SELECT bimbingan.*, tb_mahasiswa.nim, tb_dosen.nama FROM bimbingan, tb_mahasiswa, tb_dosen WHERE bimbingan.id_mahasiswa=tb_mahasiswa.id_mhs AND bimbingan.id_pembimbing_1=tb_dosen.id_dosen  AND tb_mahasiswa.nim='$nim' ");
  //    if($result->num_rows() > 0){
  //     return $result->row();
  //   }else {
  //     return array();
  //   }
  // }
}