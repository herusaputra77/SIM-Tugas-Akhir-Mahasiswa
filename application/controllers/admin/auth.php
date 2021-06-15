<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function index()
	{
		$data['judul'] = 'Login Pegawai';
		$this->load->view('templates/header', $data);
		$this->load->view('admin/login');
		$this->load->view('templates/footer');
	}
	public function login()
	{
		$this->_rules();
		if($this->form_validation->run()== FALSE){
			$this->index();
		}else{
			$nip = $this->input->post('nip',true);
			$password = $this->input->post('password',true);
			$auth= $this->m_pegawai->cek_nip();
			if($auth== FALSE)
				{
					$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
						 NIP dan Password anda salah!!!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
					redirect('admin/auth');
				}else{
					$this->session->set_userdata('nama',$auth->nama);	
					$this->session->set_userdata('nip',$auth->nip);
					$this->session->set_userdata('role_id',$auth->role_id);
					

					switch($auth->role_id){
						case 1 : redirect('admin/dashboard');
						break;
						case 2 : redirect('pegawai/dashboard');
						break;
						default: break;
					}

				}	
				
		}
	}
	public function logout()
	{
		 $this->session->unset_userdata('nip');
        $this->session->unset_userdata('nama');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('admin/auth/');
	}
	public function _rules()
	{
		$this->form_validation->set_rules('nip','nip','required|numeric|trim');
		$this->form_validation->set_rules('password','Password','required|trim');

	}
}