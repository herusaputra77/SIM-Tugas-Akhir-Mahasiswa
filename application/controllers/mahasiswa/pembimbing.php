<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembimbing extends CI_Controller {
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
		$data['judul'] = 'Pembimbing Skripsi';
		$nim = $this->session->userdata('nim');
		$data['mahasiswa'] = $this->db->get_where('tb_mahasiswa',['nim'=>$nim])->row_array();
		$data['pembimbing'] = $this->db->query("SELECT pembimbing.*, tb_mahasiswa.nim, tb_dosen.* FROM pembimbing, tb_mahasiswa, tb_dosen WHERE pembimbing.id_mahasiswa=tb_mahasiswa.id_mhs AND pembimbing.pembimbing_1=tb_dosen.id_dosen  AND tb_mahasiswa.nim='$nim'")->row_array();
		// $data['pembimbing2'] = $this->db->query("SELECT pembimbing.*, tb_mahasiswa.nim, tb_dosen.* FROM pembimbing, tb_mahasiswa, tb_dosen WHERE pembimbing.id_mahasiswa=tb_mahasiswa.id_mhs AND pembimbing.pembimbing_2=tb_dosen.id_dosen  AND tb_mahasiswa.nim='$nim'")->row_array();
		$this->load->view('templates_backend/header', $data);
		$this->load->view('templates_backend/topbar_mahasiswa', $data);
		$this->load->view('templates_backend/sidebar_mahasiswa', $data);
		$this->load->view('mahasiswa/pembimbing', $data);
		$this->load->view('templates_backend/footer');
	}
	public function pembimbing_a()
	{
		$data['judul'] = 'Pembimbing Akademik';
		$nim = $this->session->userdata('nim');
		$data['mahasiswa'] = $this->db->get_where('tb_mahasiswa',['nim'=>$nim])->row_array();
		$data['pembimbing_pa'] = $this->db->query("SELECT pembimbing_pa.*, tb_mahasiswa.nim, tb_dosen.* FROM pembimbing_pa, tb_mahasiswa, tb_dosen WHERE pembimbing_pa.id_mahasiswa=tb_mahasiswa.id_mhs AND pembimbing_pa.id_dosen=tb_dosen.id_dosen  AND tb_mahasiswa.nim='$nim'")->row_array();
		// $data['pembimbing2'] = $this->db->query("SELECT pembimbing.*, tb_mahasiswa.nim, tb_dosen.* FROM pembimbing, tb_mahasiswa, tb_dosen WHERE pembimbing.id_mahasiswa=tb_mahasiswa.id_mhs AND pembimbing.pembimbing_2=tb_dosen.id_dosen  AND tb_mahasiswa.nim='$nim'")->row_array();
		$this->load->view('templates_backend/header', $data);
		$this->load->view('templates_backend/topbar_mahasiswa', $data);
		$this->load->view('templates_backend/sidebar_mahasiswa', $data);
		$this->load->view('mahasiswa/pembimbing_a', $data);
		$this->load->view('templates_backend/footer');
	}
	public function bimbingan()
	{
		$this->form_validation->set_rules('ket','Keterangan','required');

		if($this->form_validation->run() == FALSE){
		$nim = $this->session->userdata('nim');
		$data['judul'] = 'Pembimbing 1';
		$data['pembimbing'] = $this->db->query("SELECT pembimbing.*, tb_mahasiswa.nim, tb_dosen.* FROM pembimbing, tb_mahasiswa, tb_dosen WHERE pembimbing.id_mahasiswa=tb_mahasiswa.id_mhs AND pembimbing.pembimbing_1=tb_dosen.id_dosen  AND tb_mahasiswa.nim='$nim'")->row_array();
		// $id_dosen = $this->m_dosen->find_dosen($id);
		$data['mahasiswa'] = $this->db->get_where('tb_mahasiswa',['nim'=>$nim])->row_array();
		$this->load->view('templates_backend/header', $data);
		$this->load->view('templates_backend/topbar_mahasiswa', $data);
		$this->load->view('templates_backend/sidebar_mahasiswa', $data);
		$this->load->view('mahasiswa/bimbingan', $data);
		$this->load->view('templates_backend/footer');
		}else{
			$id_dosen = $this->input->post('id_dosen',true);
			$id_mahasiswa = $this->input->post('id_mahasiswa',true);
			$nip = $this->input->post('nip',true);
			$nim = $this->input->post('nim',true);
			$ket = $this->input->post('ket', true);
			$file = $_FILES['file']['name'];
			
			if ($file) {
				$config['allowed_types'] = 'pdf|docx|doc';
				$config['max_size']      = '';
				$config['remove_spaces']  = 'TRUE';
				$config['upload_path'] = './assets/file/mahasiswa';
	
				$this->load->library('upload', $config);
	
				if ($this->upload->do_upload('file')) {
					$this->upload->data('file_name');
				} else {
					echo $this->upload->display_errors();
				}
			}
			$data = array(
				'id_mhs' => $id_mahasiswa,
				'id_dosen' => $id_dosen,
				'nim' => $nim,
				'nip' => $nip,
				'keterangan' => $ket,
				'files' => $file,
				'tgl_bimbingan' => time()
			);
			$this->db->insert('bimbingan', $data);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
						 Bimbingan Sudah Dikirim!!!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
			redirect('mahasiswa/pembimbing/bimbingan');
		}
	}
	public function riwayat()
	{
		$data['judul'] = 'Riwayat';
		$nim = $this->session->userdata('nim');
		$data['riwayat'] = $this->db->query("SELECT bimbingan.*, tb_dosen.nama, tb_komentar.komentar, tb_komentar.tgl_komentar FROM bimbingan, tb_dosen ,tb_komentar
		WHERE bimbingan.id_dosen=tb_dosen.id_dosen AND bimbingan.id_bimbingan=tb_komentar.id_bimbingan AND bimbingan.nim='$nim'")->result_array();
		$data['mahasiswa'] = $this->db->get_where('tb_mahasiswa',['nim'=>$nim])->row_array();
		$this->load->view('templates_backend/header', $data);
		$this->load->view('templates_backend/topbar_mahasiswa', $data);
		$this->load->view('templates_backend/sidebar_mahasiswa', $data);
		$this->load->view('mahasiswa/riwayat', $data);
		$this->load->view('templates_backend/footer');
		
	}
}