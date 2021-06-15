<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {
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
		$data['judul'] = 'Dosen';
		$data['dosen'] = $this->db->get('tb_dosen')->result();
		$nip = $this->session->userdata('nip');
		$data['admin'] = $this->db->get_where('pegawai',['nip'=>$nip])->row_array();
		$this->load->view('templates_backend/header', $data);
		$this->load->view('templates_backend/topbar');
		$this->load->view('templates_backend/sidebar_admin');
		$this->load->view('admin/dosen', $data);
		$this->load->view('templates_backend/footer');
	}
	public function tambah()
	{
		$this->_rules();
		if($this->form_validation->run()== FALSE){
			$nip = $this->session->userdata('nip');
		$data['admin'] = $this->db->get_where('pegawai',['nip'=>$nip])->row_array();
		$data['judul'] = 'Tambah Dosen';
		$data['dosen'] = $this->db->get('tb_dosen')->result();
		$data['jabatan'] = $this->db->get('tb_jabatan')->result_array();
		$this->load->view('templates_backend/header', $data);
		$this->load->view('templates_backend/topbar');
		$this->load->view('templates_backend/sidebar_admin');
		$this->load->view('admin/tambah_dosen', $data);
		$this->load->view('templates_backend/footer');
		}else{
			$kd_dosen = $this->input->post('kd_dosen',true);
			$nama = $this->input->post('nama',true);
			$nip = $this->input->post('nip',true);
			$keahlian = $this->input->post('keahlian',true);
			$pangkat = $this->input->post('pangkat',true);
			$jabatan_fungsional = $this->input->post('jabatan_fungsional',true);
			$telp = $this->input->post('telp',true);
			// $upload_image = $_FILES['image']['name'];
			// if ($upload_image) {
            //     $config['upload_path'] ='./assets/image/dosen/';
			// 	$config['allowed_types'] = 'jpg|jpeg|png|';
			// 	$config['max_size'] = '4096';
			// $this->load->library('upload', $config);
			// if($this->upload->do_upload('image')){
			// 	$upload_image =$this->upload->data('file_name');
			// }else{
			// 	echo $this->upload->display_errors();
			// }

			// }
			$data= array(
				'kd_dosen' =>$kd_dosen,
				'role_id' => '3',
				'nama' => $nama,
				'password' => '123',
				'nip' => $nip,
				'keahlian' =>$keahlian,
				'pangkat' =>$pangkat,
				'jabatan_fungsional' =>$jabatan_fungsional,
				'telp' =>$telp,
				'image' => 'user.png'
			);
			$this->db->insert('tb_dosen',$data);
			redirect('admin/dosen/');	
		}
	}
	public function hapus()
	{
		$id = $this->input->post('id_dosen',true);
		$where = ['id_dosen'=>$id];
		$this->db->delete('tb_dosen',$where);
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
						 Data Berhasil Dihapus!!!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
		redirect('admin/dosen/');

	}
	public function detail_dosen($id)
	{
		$data['judul'] = 'Detail Dosen';
		$nip = $this->session->userdata('nip');
		$data['admin'] = $this->db->get_where('pegawai',['nip'=>$nip])->row_array();
		$data['dosen'] = $this->db->get_where('tb_dosen', ['id_dosen' => $id])->result_array();
		$data['jabatan'] = $this->db->get('tb_jabatan')->result_array();
		$this->load->view('templates_backend/header', $data);
		$this->load->view('templates_backend/topbar');
		$this->load->view('templates_backend/sidebar_admin');
		$this->load->view('admin/detail_dosen', $data);
		$this->load->view('templates_backend/footer');
	}

	public function edit_aksi()
	{
		$redirect = $this->input->post('redirect_page',true);
		$id_dosen = $this->input->post('id_dosen', true);
		$kd_dosen = $this->input->post('kd_dosen', true);
		$nama = $this->input->post('nama', true);
		$nip = $this->input->post('nip', true);
		$pangkat = $this->input->post('pangkat', true);
		$jabatan = $this->input->post('jabatan', true);
		$keahlian = $this->input->post('keahlian', true);
		
		$this->db->set('kd_dosen', $kd_dosen);
		$this->db->set('nama', $nama);
		$this->db->set('nip', $nip);
		$this->db->set('pangkat', $pangkat);
		$this->db->set('jabatan_fungsional', $jabatan);
		$this->db->set('keahlian', $keahlian);
		$this->db->where('id_dosen', $id_dosen);
		$data['update'] = $this->db->update('tb_dosen');
		redirect($redirect);
	}
	public function _rules()
	{
		$this->form_validation->set_rules('kd_dosen','Kode','required|numeric|trim');
		$this->form_validation->set_rules('nama','Nama','required|trim');
		$this->form_validation->set_rules('nip','NIP','required|trim');
		$this->form_validation->set_rules('telp','Telpon','required|trim');
	}
	
}