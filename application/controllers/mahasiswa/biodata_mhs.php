<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Biodata_mhs extends CI_Controller {
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
        $data['judul'] = 'Biodata Mahasiswa';
		$nim = $this->session->userdata('nim');
		$data['mahasiswa'] = $this->db->get_where('tb_mahasiswa',['nim'=>$nim])->row_array();
		$this->load->view('templates_backend/header', $data);
		$this->load->view('templates_backend/topbar_mahasiswa', $data);
		$this->load->view('templates_backend/sidebar_mahasiswa', $data);
		$this->load->view('mahasiswa/biodata', $data);
		$this->load->view('templates_backend/footer');
	
	}
	public function ganti_biodata()
	{
		$nim = $this->session->userdata('nim');
		$data['mahasiswa'] = $this->db->get_where('tb_mahasiswa',['nim'=>$nim])->row_array();
		$id_mhs = $this->input->post('id_mhs', true);
		$nim = $this->input->post('nim', true);
		$nama = $this->input->post('nama', true);
		$prodi = $this->input->post('prodi', true);
		$alamat = $this->input->post('alamat', true);
		$no_telpon = $this->input->post('prodi', true);
		$upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '2048';
            $config['upload_path'] = './assets/image/mahasiswa';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $old_image = $data['mahasiswa']['image'];
                if ($old_image != 'user.png') {
                    unlink(FCPATH . 'assets/image/mahasiswa/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }

		$data = array(
			'nim' => $nim,
			'nama' => $nama,
			'alamat' => $alamat,
			'telp' => $no_telpon,
			'prodi' => $prodi

		);

		$this->db->where('id_mhs', $id_mhs);
		$this->db->update('tb_mahasiswa', $data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
						 Data Berhasil Di Ganti!!!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');

		redirect('mahasiswa/biodata_mhs/');
		
		
	}
	public function ganti_psw()
	{
		$this->form_validation->set_rules('password','Password baru','required|trim|min_length[3]');
        if($this->form_validation->run() == FALSE){

            $data['judul'] = 'Ganti Password';
			$nim = $this->session->userdata('nim');
			$data['mahasiswa'] = $this->db->get_where('tb_mahasiswa',['nim'=>$nim])->row_array();
            $this->load->view('templates_backend/header', $data);
            $this->load->view('templates_backend/topbar_mahasiswa', $data);
            $this->load->view('templates_backend/sidebar_mahasiswa', $data);
            $this->load->view('mahasiswa/ganti_psw', $data);
            $this->load->view('templates_backend/footer');
        }else{
            $nim = $this->session->userdata('nim');
            $password_br = $this->input->post('password',true);
            $this->db->set('password',$password_br);
            $this->db->where('nim',$nim);
            $this->db->update('tb_mahasiswa');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Password anda sudah diganti.</div>');

            redirect('mahasiswa/auth');

        }
	}

}

/* End of file Biodata_mhs.php */
