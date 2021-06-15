<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas_akhir extends CI_Controller {
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

    public function proposal()
    {
        $nip = $this->session->userdata('nip');
		$data['admin'] = $this->db->get_where('pegawai',['nip'=>$nip])->row_array();
        $data['judul'] = 'Proposal';
        $data['proposal'] = $this->db->query("SELECT DISTINCT tb_skripsi.id_skripsi, tb_skripsi.*,tb_mahasiswa.nama as nama_mhs, tb_dosen.nama as nama_dosen
        From  tb_dosen, tb_skripsi, tb_mahasiswa WHERE tb_mahasiswa.nim=tb_skripsi.nim AND tb_dosen.id_dosen=tb_skripsi.id_dosen_ta")->result_array();
        $data['status'] = $this->db->get('tb_skripsi')->result_array();
		$this->load->view('templates_backend/header', $data);
		$this->load->view('templates_backend/topbar');
		$this->load->view('templates_backend/sidebar_admin');
		$this->load->view('admin/proposal', $data);
        $this->load->view('templates_backend/footer');
        
    }
    public function detail_proposal($id)
    {
        $data['judul'] = 'Proposal';
        $data['proposal'] = $this->db->query("SELECT tb_skripsi.*, tb_mahasiswa.nama FROM tb_skripsi,
        tb_mahasiswa WHERE tb_skripsi.nim=tb_mahasiswa.nim AND tb_skripsi.id_skripsi='$id'")->row_array(); 
        $nip = $this->session->userdata('nip');
	  	$data['admin'] = $this->db->get_where('pegawai',['nip'=>$nip])->row_array();
        
        $this->load->view('templates_backend/header', $data);
		$this->load->view('templates_backend/topbar');
		$this->load->view('templates_backend/sidebar_admin');
		$this->load->view('admin/detail_proposal', $data);
        $this->load->view('templates_backend/footer');
    }
    public function setuju()
    {
        $id = $this->input->post('id_skripsi');
        $this->db->set('status','Disetujui Prodi');
        $this->db->where('id_skripsi', $id);
        $this->db->update('tb_skripsi');
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
						 Judul Skripsi Disetujui!!!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');

        redirect('admin/tugas_akhir/proposal');

    }
    public function tolak()
    {
        $id = $this->input->post('id_skripsi');
        $komentar = $this->input->post('komentar');
        $this->db->set('status','Ditolak Prodi');
        $this->db->set('komentar',$komentar);
        $this->db->where('id_skripsi', $id);
        $this->db->update('tb_skripsi');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
						 Judul Skripsi Ditolak!!!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');

        redirect('admin/tugas_akhir/proposal');

    }
    public function bimbingan()
    {
      $data['judul'] = 'Bimbingan';
      $nip = $this->session->userdata('nip');
      $data['admin'] = $this->db->get_where('pegawai',['nip'=>$nip])->row_array();
      $data['bimbingan'] = $this->db->query("SELECT bimbingan.*, tb_mahasiswa.nama as nama_mhs, tb_dosen.nama FROM bimbingan, tb_mahasiswa, tb_dosen WHERE
       bimbingan.id_mhs=tb_mahasiswa.id_mhs AND bimbingan.id_dosen=tb_dosen.id_dosen")->result_array();
      $this->load->view('templates_backend/header',$data);
      $this->load->view('templates_backend/topbar', $data);
      $this->load->view('templates_backend/sidebar_admin');
      $this->load->view('admin/detail_bimbingan', $data);
      $this->load->view('templates_backend/footer');
    }

}

/* End of file Tugas_akhir.php */