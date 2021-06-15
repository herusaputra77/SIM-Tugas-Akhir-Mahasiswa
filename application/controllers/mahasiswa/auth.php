<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function index()
	{
		$data['judul'] = 'Login Mahasiswa';
		$this->load->view('templates/header', $data);
		$this->load->view('mahasiswa/login');
		$this->load->view('templates/footer');
	}
	public function login()
	{
		$this->_rules();
		if($this->form_validation->run()== FALSE){
			$this->index();
		}else{
			$nim = $this->input->post('nim',true);
			$password = $this->input->post('password',true);
			$auth= $this->m_mahasiswa->cek_nim();
			$role = $this->m_mahasiswa->cek_role();
			if($auth== FALSE)
				{
					$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
						 NIM dan Password anda salah!!!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
					redirect('mahasiswa/auth');
				}else{
					$this->session->set_userdata('nama',$auth->nama);	
					$this->session->set_userdata('id_mhs',$auth->id_mhs);	
					$this->session->set_userdata('nim',$auth->nim);
					$this->session->set_userdata('role_id',$auth->role_id);
					redirect('mahasiswa/dashboard/');

					// switch($auth->role_id){
					// 	case 1 : redirect('admin/dashboard_admin');
					// 	break;
					// 	case 2 : redirect('Welcome');
					// 	break;
					// 	default: break;
					}
				
		}
	}
	public function logout()
	{
		 $this->session->unset_userdata('nim');
        $this->session->unset_userdata('nama');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('mahasiswa/auth/');
	}
	public function _rules()
	{
		$this->form_validation->set_rules('nim','NIM','required|numeric|trim');
		$this->form_validation->set_rules('password','Password','required|trim');

	}
}