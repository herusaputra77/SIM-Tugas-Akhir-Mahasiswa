<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('role_id') != '1') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						 Anda Belum Login Sebagai Admin!!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
			redirect('admin/auth');
		}
	}
	public function index()
	{
		// $data['mahasiswa'] = $this->db->query("SELECT COUNT(*) AS jumlahdata FROM tb_mahasiswa")->row();
		$nip = $this->session->userdata('nip');
		$data['admin'] = $this->db->get_where('pegawai', ['nip' => $nip])->row_array();
		$data['mahasiswa'] = $this->m_mahasiswa->jumlah_mhs();
		$data['dosen'] = $this->m_dosen->jumlah_dosen();
		$data['proposal'] = $this->m_dosen->jumlah_proposal();
		$data['pegawai'] = $this->m_pegawai->jumlah_pegawai();

		$data['judul'] = 'Dashboard';
		$this->load->view('templates_backend/header', $data);
		$this->load->view('templates_backend/topbar', $data);
		$this->load->view('templates_backend/sidebar_admin');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('templates_backend/footer');
	}
}
