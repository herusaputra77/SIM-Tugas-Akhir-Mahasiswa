<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Proposal extends CI_Controller {
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
        $data['judul'] = 'Pengajuan Judul Skripsi';
		$nim = $this->session->userdata('nim');
        $data['mahasiswa'] = $this->db->get_where('tb_mahasiswa',['nim'=>$nim])->row_array();
        $data['proposal'] = $this->db->get_where('tb_skripsi', ['nim'=>$nim])->result_array();
        $data['validasi'] = $this->db->get_where('tb_skripsi', ['nim'=>$nim])->result_array();
		$this->load->view('templates_backend/header', $data);
		$this->load->view('templates_backend/topbar_mahasiswa', $data);
		$this->load->view('templates_backend/sidebar_mahasiswa', $data);
		$this->load->view('mahasiswa/proposal', $data);
		$this->load->view('templates_backend/footer');
    }

    public function daftar()
    {
        $data['judul'] = 'Input Judul Skripsi';
		$nim = $this->session->userdata('nim');
        $data['mahasiswa'] = $this->db->get_where('tb_mahasiswa',['nim'=>$nim])->row_array();
        $id_mhs = $this->session->userdata('id_mhs');
        $data['pembimbing'] = $this->db->query("SELECT pembimbing.*, tb_mahasiswa.nim
         FROM pembimbing, tb_mahasiswa  WHERE pembimbing.id_mahasiswa=tb_mahasiswa.id_mhs AND tb_mahasiswa.nim='$nim'")->row_array();
        $data['pembimbing_pa'] = $this->db->query("SELECT pembimbing_pa.*, tb_mahasiswa.nim
         FROM pembimbing_pa, tb_mahasiswa  WHERE pembimbing_pa.id_mahasiswa=tb_mahasiswa.id_mhs AND tb_mahasiswa.nim='$nim'")->row_array();
		$this->load->view('templates_backend/header', $data);
		$this->load->view('templates_backend/topbar_mahasiswa', $data);
		$this->load->view('templates_backend/sidebar_mahasiswa', $data);
		$this->load->view('mahasiswa/tambah_judul', $data);
		$this->load->view('templates_backend/footer');

    }

    public function insert_data()
    {
        $this->form_validation->set_rules('judul_skripsi', 'Judul Skripsi', 'trim|required');
        // $this->form_validation->set_rules('file', 'File Skripsi', 'trim|required');
        if($this->form_validation->run() == FALSE){
            $data['judul'] = 'Input Judul Skripsi';
        $nim = $this->session->userdata('nim');
        $data['mahasiswa'] = $this->db->get_where('tb_mahasiswa',['nim'=>$nim])->row_array();
		$this->load->view('templates_backend/header', $data);
		$this->load->view('templates_backend/topbar_mahasiswa', $data);
		$this->load->view('templates_backend/sidebar_mahasiswa', $data);
		$this->load->view('mahasiswa/tambah_judul', $data);
        $this->load->view('templates_backend/footer');
        
    }else{
           
        $judul_skripsi = $this->input->post('judul_skripsi',true);
        $dosen_ta = $this->input->post('dosen_ta',true);
        $dosen_pa = $this->input->post('dosen_pa',true);
        $nim = $this->session->userdata('nim');
        $upload_file = $_FILES['file']['name'];

            if ($upload_file) {
                $config['upload_path'] ='./assets/file/proposal';
				$config['allowed_types'] = 'pdf|docx|doc';
                $config['max_size'] = 0;
                // $config['remove_spaces'] = false;
                // $config['encrypt_name'] = false;
			$this->load->library('upload', $config);
			if($this->upload->do_upload('file')){
				$upload_file =$this->upload->data('file_name');
			}else{
                $error = array('error' =>$this->upload->display_errors()) ;
                
				}
            }
            $pembimbing_pa = array(
                'id_dosen_pa' => $dosen_pa,
                'id_dosen_ta' => $dosen_ta,
                'nim' => $nim,
                'judul_skripsi' => $judul_skripsi,
                'status' => 'Draft',
                'file' => $upload_file,
                'tgl_input' => time(),
                'komentar' => ''
            );
            $this->db->insert('tb_skripsi',$pembimbing_pa);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
						 Proposal Sudah di Input Silahkan Tunggu Konfirmasi Selanjutnya!!!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
            redirect('mahasiswa/proposal');

        }
        
        
    }

    public function detail($id)
    {
        $id_skripsi = ['id_skripsi' => $id];
        $data['judul'] = 'Pengajuan Judul Skripsi';
		$nim = $this->session->userdata('nim');
        $data['mahasiswa'] = $this->db->get_where('tb_mahasiswa',['nim'=>$nim])->row_array();
        $data['proposal'] = $this->db->get_where('tb_skripsi', ['id_skripsi'=>$id])->row_array();
		$this->load->view('templates_backend/header', $data);
		$this->load->view('templates_backend/topbar_mahasiswa', $data);
		$this->load->view('templates_backend/sidebar_mahasiswa', $data);
		$this->load->view('mahasiswa/detail_judul', $data);
        $this->load->view('templates_backend/footer');
    }
    public function validasi()
    {
        $id = $this->input->post('id_skripsi');
        $data= ['status' => 'Diajukan'];

        $this->db->set('status','Diajukan');
        $this->db->where('id_skripsi', $id);
        $this->db->update('tb_skripsi');

        redirect('mahasiswa/proposal');
    }

    public function ganti($id)
    {
        $data['judul'] = 'Mengganti Judul Skripsi';
		$nim = $this->session->userdata('nim');
        $data['mahasiswa'] = $this->db->get_where('tb_mahasiswa',['nim'=>$nim])->row_array();
        $data['proposal'] = $this->db->get_where('tb_skripsi', ['id_skripsi'=>$id])->row_array();
		$this->load->view('templates_backend/header', $data);
		$this->load->view('templates_backend/topbar_mahasiswa', $data);
		$this->load->view('templates_backend/sidebar_mahasiswa', $data);
		$this->load->view('mahasiswa/ganti_judul', $data);
        $this->load->view('templates_backend/footer');

    }
    public function update_skripsi()
    {
        $this->form_validation->set_rules('judul_skripsi', 'Judul Skripsi', 'trim|required');
        // $this->form_validation->set_rules('file', 'File Skripsi', 'trim|required');
        if($this->form_validation->run() == FALSE){
            $data['judul'] = 'Input Judul Skripsi';
            $nim = $this->session->userdata('nim');
            $data['mahasiswa'] = $this->db->get_where('tb_mahasiswa',['nim'=>$nim])->row_array();
            
		$this->load->view('templates_backend/header', $data);
		$this->load->view('templates_backend/topbar_mahasiswa', $data);
		$this->load->view('templates_backend/sidebar_mahasiswa', $data);
		$this->load->view('mahasiswa/ganti_judul', $data);
		$this->load->view('templates_backend/footer');

        }else{
            $id_skripsi = $this->input->post('id_skripsi');
            $where = array('id_skripsi' => $id_skripsi);
            $judul_skripsi = $this->input->post('judul_skripsi',true);
        $nim = $this->session->userdata('nim');
        $data['proposal'] = $this->db->get_where('tb_skripsi', ['id_skripsi'=>$id_skripsi])->row_array();
        $upload_file = $_FILES['file']['name'];

            if ($upload_file) {
                $config['allowed_types'] = 'pdf|docx|doc';
                $config['max_size'] = 0;
                $config['remove_spaces'] = true;
                $config['upload_path'] ='./assets/file/proposal';
                // $config['encrypt_name'] = true;
			$this->load->library('upload', $config);
                // if($this->upload->do_upload('file')){
                //     $upload_file =$this->upload->data('file_name');
                // }else{
                //     $error = array( 'error' => $this->upload->display_errors()) ;
                //     $this->load->view('mahasiswa/ganti_judul', $error);
                //  }
                 if ($this->upload->do_upload('file')) {
                    $old_file = $data['proposal']['file'];
                    if ($old_file != 'user.pdf') {
                        unlink(FCPATH . 'assets/file/proposal/' . $old_file);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('file', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $data = array(
                'nim' => $nim,
                'judul_skripsi' => $judul_skripsi,
                'status' => 'Draft',
                'file' => $upload_file,
                'tgl_input' => time()
            );
            $this->db->update('tb_skripsi',$data, $where);
            redirect('mahasiswa/proposal');

        }
    }

}

/* End of file Proposal.php */
