<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
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
		$nip = $this->session->userdata('nip');
		$data['admin'] = $this->db->get_where('pegawai', ['nip' => $nip])->row_array();
		$data['judul'] = 'Mahasiswa';

		$data['mahasiswa'] = $this->db->get('tb_mahasiswa')->result();
		$this->load->view('templates_backend/header', $data);
		$this->load->view('templates_backend/topbar');
		$this->load->view('templates_backend/sidebar_admin');
		$this->load->view('admin/mahasiswa', $data);
		$this->load->view('templates_backend/footer');
	}
	public function tambah()
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$nip = $this->session->userdata('nip');
			$data['prodi'] = $this->db->get('tb_prodi')->result_array();
			$data['admin'] = $this->db->get_where('pegawai', ['nip' => $nip])->row_array();
			$data['judul'] = 'Tambah Mahasiswa';
			$this->load->view('templates_backend/header', $data);
			$this->load->view('templates_backend/topbar');
			$this->load->view('templates_backend/sidebar_admin');
			$this->load->view('admin/tambah_mahasiswa', $data);
			$this->load->view('templates_backend/footer');
		} else {
			$nim = $this->input->post('nim', true);
			$nama = $this->input->post('nama', true);
			$alamat = $this->input->post('alamat', true);
			$prodi = $this->input->post('prodi', true);
			$telp = $this->input->post('telp', true);
			// $upload_image = $_FILES['image']['name'];

			// if ($upload_image) {
			//     $config['upload_path'] ='./assets/image/mahasiswa/';
			// 	$config['allowed_types'] = 'jpg|jpeg|png|';
			// 	$config['max_size'] = '4096';
			// $this->load->library('upload', $config);
			// if($this->upload->do_upload('image')){
			// 	$upload_image =$this->upload->data('file_name');
			// }else{
			// 	echo $this->upload->display_errors();



			$data = array(
				'nim' => $nim,
				'nama' => $nama,
				'alamat' => $alamat,
				'telp' => $telp,
				'prodi' => $prodi,
				'password' => '123',
				'image' => 'user.png'
			);
			$this->m_mahasiswa->input_data($data, 'tb_mahasiswa');
			redirect('admin/mahasiswa/');
		}
	}
	public function hapus()
	{
		$id = $this->input->post('id_mhs');
		$where = ['id_mhs' => $id];
		$this->db->delete('tb_mahasiswa', $where);
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						 Data Berhasil Dihapus!!!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
		redirect('admin/mahasiswa/');
	}

	public function detail($id)
	{
		$nip = $this->session->userdata('nip');
		$data['admin'] = $this->db->get_where('pegawai', ['nip' => $nip])->row_array();
		$data['judul'] = 'Detail Mahasiswa';
		$data['mahasiswa'] = $this->db->get_where('tb_mahasiswa', ['id_mhs' => $id])->result_array();
		$this->load->view('templates_backend/header', $data);
		$this->load->view('templates_backend/topbar');
		$this->load->view('templates_backend/sidebar_admin');
		$this->load->view('admin/detail_mahasiswa', $data);
		$this->load->view('templates_backend/footer');
	}
	public function edit_aksi()
	{
		$id_mhs = $this->input->post('id_mhs', true);
		$nim = $this->input->post('nim', true);
		$nama = $this->input->post('nama', true);
		$redirect = $this->input->post('redirect_page', true);
		$prodi = $this->input->post('prodi', true);
		$alamat = $this->input->post('alamat', true);
		$telp = $this->input->post('no_telpon', true);

		$data = array(
			'nim' => $nim,
			'nama' => $nama,
			'alamat' => $alamat,
			'telp' => $telp,
			'prodi' => $prodi
		);

		$this->db->where('id_mhs', $id_mhs);
		$this->db->update('tb_mahasiswa', $data);
		redirect($redirect);
	}
	public function _rules()
	{
		$this->form_validation->set_rules('nim', 'NIM', 'required|numeric|trim');
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('prodi', 'Prodi', 'required|trim');
		$this->form_validation->set_rules('telp', 'Telpon', 'required|trim');
	}
}
