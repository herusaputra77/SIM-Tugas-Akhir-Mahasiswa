<?php

class Profile extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','download'));
		if($this->session->userdata('role_id')!= '3'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
						 Anda Belum Login Sebagai Dosen!!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
			redirect('dosen/auth');
		}
	}
    public function index()
    {
        $data['judul'] = 'My Profile';
		$kd_dosen = $this->session->userdata('kd_dosen');
        $data['dosen'] = $this->db->get_where('tb_dosen',['kd_dosen'=>$kd_dosen])->row_array();
		$this->load->view('templates_backend/header', $data);
		$this->load->view('templates_backend/topbar_dosen', $data);
		$this->load->view('templates_backend/sidebar_dosen', $data);
        $this->load->view('dosen/profile', $data);
		$this->load->view('templates_backend/footer');
    }
    public function edit_profile()
    {
        $data['judul'] = 'Edit Profile';
        $kd_dosen = $this->session->userdata('kd_dosen');
        $data['jabatan'] = $this->db->get('tb_jabatan')->result_array();
        $data['dosen'] = $this->db->get_where('tb_dosen',['kd_dosen'=>$kd_dosen])->row_array();
		$this->load->view('templates_backend/header', $data);
		$this->load->view('templates_backend/topbar_dosen', $data);
		$this->load->view('templates_backend/sidebar_dosen', $data);
        $this->load->view('dosen/edit_profile', $data);
		$this->load->view('templates_backend/footer');
    }
    public function edit_aksi()
    {
        $kd_dosen = $this->session->userdata('kd_dosen');
        $data['dosen'] = $this->db->get_where('tb_dosen',['kd_dosen'=>$kd_dosen])->row_array();
        $kode_dosen = $this->input->post('kd_dosen', true);
        $nama = $this->input->post('nama', true);
        $nip = $this->input->post('nip', true);
        $keahlian = $this->input->post('keahlian', true);
        $pangkat = $this->input->post('pangkat', true);
        $jabatan_fungsional = $this->input->post('jabatan_fungsional', true);
        $no_telpon = $this->input->post('no_telpon', true);
        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '2048';
            // $config['remove_spaces']  = 'TRUE';
            $config['upload_path'] = './assets/image/dosen';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $old_image = $data['dosen']['image'];
                if ($old_image != 'user.png') {
                    unlink(FCPATH . 'assets/image/dosen/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
            $this->db->set('nama', $nama);	
			$this->db->set('kd_dosen', $kode_dosen);	
            $this->db->set('nip', $nip);
            $this->db->set('keahlian', $keahlian);
            $this->db->set('pangkat', $pangkat);
            $this->db->set('jabatan_fungsional', $jabatan_fungsional);
            $this->db->set('telp', $no_telpon);
            $this->db->where('kd_dosen', $kd_dosen);
            $this->db->update('tb_dosen');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Profile anda sedah di Update.</div>');
            redirect('dosen/profile');
    }
    public function ganti_password()
    {
        $this->form_validation->set_rules('password','Password baru','required|trim|min_length[3]');
        if($this->form_validation->run() == FALSE){

            $data['judul'] = 'Ganti Password';
            $kd_dosen = $this->session->userdata('kd_dosen');
            $data['dosen'] = $this->db->get_where('tb_dosen',['kd_dosen'=>$kd_dosen])->row_array();
            $this->load->view('templates_backend/header', $data);
            $this->load->view('templates_backend/topbar_dosen', $data);
            $this->load->view('templates_backend/sidebar_dosen', $data);
            $this->load->view('dosen/ganti_psw', $data);
            $this->load->view('templates_backend/footer');
        }else{
            $kd_dosen = $this->session->userdata('kd_dosen');
            $password_br = $this->input->post('password',true);
            $this->db->set('password',$password_br);
            $this->db->where('kd_dosen',$kd_dosen);
            $this->db->update('tb_dosen');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Password anda sudah diganti.</div>');

            redirect('dosen/auth');

        }
    }
}