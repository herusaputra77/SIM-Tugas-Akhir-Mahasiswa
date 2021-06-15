<?php

class Profile extends CI_Controller 
{
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
		$data['pegawai'] = $this->db->get_where('pegawai',['nip'=>$nip])->row_array();
        $data['judul'] = 'My Profile';
		$this->load->view('templates_backend/header', $data);
		$this->load->view('templates_backend/topbar_pegawai',$data);
		$this->load->view('templates_backend/sidebar_pegawai');
		$this->load->view('pegawai/profile', $data);
		$this->load->view('templates_backend/footer');
	
	}
	public function edit_profile()
	{
		$nip = $this->session->userdata('nip');
		$data['pegawai'] = $this->db->get_where('pegawai',['nip'=>$nip])->row_array();
        $data['judul'] = 'Ganti Profile';
		$this->load->view('templates_backend/header', $data);
        $this->load->view('templates_backend/topbar_pegawai',$data);
        $this->load->view('templates_backend/sidebar_pegawai');
		$this->load->view('pegawai/ganti_profile', $data);
		$this->load->view('templates_backend/footer');
	}
	public function edit_aksi()
	{
		$nip = $this->session->userdata('nip');
        $data['pegawai'] = $this->db->get_where('pegawai',['nip'=>$nip])->row_array();
        $nama = $this->input->post('nama', true);
        $nip = $this->input->post('nip', true);
        $no_telpon = $this->input->post('no_telpon', true);
        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '2048';
            $config['upload_path'] = './assets/image/pegawai';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $old_image = $data['pegawai']['image'];
                if ($old_image != 'user.png') {
                    unlink(FCPATH . 'assets/image/pegawai/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
            $this->db->set('nama', $nama);		
            $this->db->set('telp', $no_telpon);
            $this->db->where('nip', $nip);
            $this->db->update('pegawai');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Profile anda sedah di Update.</div>');
            redirect('pegawai/profile');
	}
	public function ganti_password()
    {
        $this->form_validation->set_rules('password','Password baru','required|trim|min_length[3]');
        if($this->form_validation->run() == FALSE){

            $data['judul'] = 'Ganti Password';
            $nip = $this->session->userdata('nip');
            $data['pegawai'] = $this->db->get_where('pegawai',['nip'=>$nip])->row_array();
            $this->load->view('templates_backend/header', $data);
            		$this->load->view('templates_backend/sidebar_pegawai');
            $this->load->view('pegawai/ganti_psw', $data);
            $this->load->view('templates_backend/footer');
        }else{
            $nip = $this->session->userdata('nip');
            $password_br = $this->input->post('password',true);
            $this->db->set('password',$password_br);
            $this->db->where('nip',$nip);
            $this->db->update('pegawai');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Password anda sudah diganti.</div>');

            redirect('pegawai/auth/');

        }
    }
}
