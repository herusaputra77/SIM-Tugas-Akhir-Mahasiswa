<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('role_id')!= '1'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
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
		$data['admin'] = $this->db->get_where('pegawai',['nip'=>$nip])->row_array();
		$data['judul'] = 'Pegawai';
		$data['pegawai'] = $this->db->get('pegawai')->result();
		$this->load->view('templates_backend/header', $data);
		$this->load->view('templates_backend/topbar',$data);
		$this->load->view('templates_backend/sidebar_admin');
		$this->load->view('admin/pegawai', $data);
		$this->load->view('templates_backend/footer');
	}
	public function tambah()
	{
		$this->_rules();
		if($this->form_validation->run()== FALSE){
			$nip = $this->session->userdata('nip');
			$data['prodi'] = $this->db->get('tb_prodi')->result_array();
		$data['admin'] = $this->db->get_where('pegawai',['nip'=>$nip])->row_array();
		$data['judul'] = 'Tambah Pegawai';
		$this->load->view('templates_backend/header', $data);
		$this->load->view('templates_backend/topbar');
		$this->load->view('templates_backend/sidebar_admin');
		$this->load->view('admin/tambah_pegawai',$data);
		$this->load->view('templates_backend/footer');
		}else{	
			$nama = $this->input->post('nama',true);
			$prodi = $this->input->post('prodi',true);
			$nip = $this->input->post('nip',true);
			$telp = $this->input->post('telp',true);
			$hak_akses = $this->input->post('hak_akses',true);
			
			$data= array(
				'role_id' => $hak_akses,
				'nip' => $nip,
				'prodi' => $prodi,
				'nama' => $nama,
				'password' => '123',
				'telp' =>$telp,
				'image' => 'user.png'
			);
			$this->db->insert('pegawai',$data);
			redirect('admin/pegawai/');	
		}
	}

	public function hapus()
	{
		$id = $this->input->post('id_pegawai');
		$where = array('id_pegawai' => $id);
		$this->db->delete('pegawai', $where);
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
						 Data Berhasil Dihapus!!!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
		redirect('admin/pegawai/');
	}
	public function detail($id)
	{
		$data['prodi'] = $this->db->get('tb_prodi')->result_array();
		$nip = $this->session->userdata('nip');
		$data['admin'] = $this->db->get_where('pegawai',['nip'=>$nip])->row_array();
		$data['detail'] = $this->db->get_where('pegawai',['id_pegawai' => $id])->result_array();
		$data['judul'] = 'Tambah Pegawai';
		$this->load->view('templates_backend/header', $data);
		$this->load->view('templates_backend/topbar');
		$this->load->view('templates_backend/sidebar_admin');
		$this->load->view('admin/detail_pegawai',$data);
		$this->load->view('templates_backend/footer');
		
	}
	public function edit_aksi()
	{
		$nama = $this->input->post('nama',true);
		$prodi = $this->input->post('prodi',true);
		$redirect = $this->input->post('redirect_page',true);
		$nip = $this->input->post('nip',true);
		$id_pegawai = $this->input->post('id_pegawai',true);
		$hak_akses = $this->input->post('hak_akses',true);
		$no_telpon = $this->input->post('no_telpon',true);

		$data= array(
			'role_id' => $hak_akses,
			'nip' => $nip,
			'prodi' => $prodi,
			'nama' => $nama,
			'telp' => $no_telpon

		);
		$this->db->where('id_pegawai',$id_pegawai);
		$this->db->update('pegawai',$data);
		$this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
						 Data Berhasil Di Edit!!!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
		redirect($redirect);
	}
	public function _rules()
	{
		$this->form_validation->set_rules('nama','Nama','required|trim');
		$this->form_validation->set_rules('nip','NIP','required|trim');
		$this->form_validation->set_rules('telp','Telpon','required|trim');
		$this->form_validation->set_rules('hak_akses','Hak Akses','required|trim');
	}
}