<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function index()
	{
		// $data['mahasiswa'] = $this->db->query("SELECT COUNT(*) AS jumlahdata FROM tb_mahasiswa")->row();
		$data['judul'] = 'Dashboard';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('dashboard', $data);
		$this->load->view('templates/footer');
	}
}