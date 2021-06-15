<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','download'));
		if($this->session->userdata('role_id')!= '3'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
						 Anda Belum Login Sebagai Dosen!!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
			redirect('dosen/auth');
		}
	}
	public function index()
	{
		// $data['mahasiswa'] = $this->db->query("SELECT COUNT(*) AS jumlahdata FROM tb_mahasiswa")->row();
		$data['judul'] = 'Dosen';
		$kd_dosen = $this->session->userdata('kd_dosen');
		$data['dosen'] = $this->db->get_where('tb_dosen',['kd_dosen'=>$kd_dosen])->row_array();
		$this->load->view('templates_backend/header', $data);
		$this->load->view('templates_backend/topbar_dosen', $data);
		$this->load->view('templates_backend/sidebar_dosen', $data);
		$this->load->view('dosen/dashboard', $data);
		$this->load->view('templates_backend/footer');
	}
}