<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('role_id')!= '4'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
						 Anda Belum Login Sebagai Mahasiswa!!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
			redirect('mahasiswa/auth');
		}
	}
	public function index()
	{
		// $data['mahasiswa'] = $this->db->query("SELECT COUNT(*) AS jumlahdata FROM tb_mahasiswa")->row();
		$data['judul'] = 'Informasi Akademik';
		$nim = $this->session->userdata('nim');
		$data['mahasiswa'] = $this->db->get_where('tb_mahasiswa',['nim'=>$nim])->row_array();
		$this->load->view('templates_backend/header', $data);
		$this->load->view('templates_backend/topbar_mahasiswa', $data);
		$this->load->view('templates_backend/sidebar_mahasiswa', $data);
		$this->load->view('mahasiswa/dashboard', $data);
		$this->load->view('templates_backend/footer');
	}
}