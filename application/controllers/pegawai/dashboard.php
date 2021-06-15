<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('role_id')!= '2'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
						 Anda Belum Login Sebagai Pegawai!!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
			redirect('admin/auth');
		}
	}

	public function index()
	{
		$nip = $this->session->userdata('nip');
		$data['mahasiswa'] = $this->m_mahasiswa->jumlah_mhs();
		$data['dosen'] = $this->m_dosen->jumlah_dosen();
		$data['proposal'] = $this->m_dosen->jumlah_proposal();
		$data['pegawai'] = $this->m_pegawai->jumlah_pegawai();
		$data['pegawai'] = $this->db->get_where('pegawai',['nip'=>$nip])->row_array();
		$prodi = $data['pegawai']['prodi'];
		$data['judul'] = 'Dashboard';
		$data['jml_mhs'] = $this->db->query("SELECT COUNT(*) AS jumlahdata FROM tb_mahasiswa, pegawai WHERE tb_mahasiswa.prodi = pegawai.prodi AND
		tb_mahasiswa.prodi = '$prodi'")->row_array();
		$this->load->view('templates_backend/header', $data);
		$this->load->view('templates_backend/topbar_pegawai',$data);
		$this->load->view('templates_backend/sidebar_pegawai');
		$this->load->view('pegawai/dashboard', $data);
		$this->load->view('templates_backend/footer');
	}
}