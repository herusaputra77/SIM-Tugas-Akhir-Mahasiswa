<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function index()
	{
		$data['judul'] = 'Login Dosen';
		$this->load->view('templates/header', $data);
		$this->load->view('dosen/login');
		$this->load->view('templates/footer');
	}
	public function login()
	{
		$this->_rules();
		if($this->form_validation->run()== FALSE){
			$this->index();
		}else{
			$kd_dosen = $this->input->post('kd_dosen',true);
			$password = $this->input->post('password', true);
			$auth = $this->m_dosen->cek_dosen($kd_dosen, $password);
			$role = $this->m_dosen->cek_role();
			if($auth == false)
				{
					$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
						 Kode Dosen dan Password anda salah!!!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
					redirect('dosen/auth');
				}else{
					$this->session->set_userdata('id_dosen',$auth->id_dosen);
					$this->session->set_userdata('kd_dosen',$auth->kd_dosen);
					$this->session->set_userdata('nip',$auth->nip);	
					$this->session->set_userdata('nama',$auth->nama);
					$this->session->set_userdata('role_id',$auth->role_id);	
					redirect('dosen/dashboard/');
					// $this->session->set_userdata('nip',$auth->nip);

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
		 $this->session->unset_userdata('nip');
		 $this->session->unset_userdata('kd_dosen');
        $this->session->unset_userdata('nama');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('dosen/auth/');
	}
	public function _rules()
	{
		$this->form_validation->set_rules('kd_dosen','Kode Dosen','required|numeric|trim');
		$this->form_validation->set_rules('password','Password','required|trim');

	}
}