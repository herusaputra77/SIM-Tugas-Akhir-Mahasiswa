<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas_akhir extends CI_Controller {
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
    public function bimbingan()
    {
        $nip = $this->session->userdata('nip');
        $data['pegawai'] = $this->db->get_where('pegawai',['nip'=>$nip])->row_array();
        $prodi = $data['pegawai']['prodi'];
        $data['judul'] = 'Bimbingan';
        $data['bimbingan'] = $this->db->query("SELECT bimbingan.*, tb_mahasiswa.nama as nama_mhs, tb_mahasiswa.prodi, tb_dosen.nama FROM bimbingan, tb_mahasiswa , tb_dosen WHERE
        tb_mahasiswa.id_mhs=bimbingan.id_mhs AND tb_dosen.id_dosen=bimbingan.id_dosen AND tb_mahasiswa.prodi='$prodi'")->result_array();
        $data['status'] = $this->db->get('tb_skripsi')->result_array();
		$this->load->view('templates_backend/header', $data);
        $this->load->view('templates_backend/topbar_pegawai',$data);
        $this->load->view('templates_backend/sidebar_pegawai');
		$this->load->view('pegawai/bimbingan', $data);
        $this->load->view('templates_backend/footer');
    }
    public function proposal()
    {
        $nip = $this->session->userdata('nip');
        $data['pegawai'] = $this->db->get_where('pegawai',['nip'=>$nip])->row_array();
        $prodi = $data['pegawai']['prodi'];
        $data['judul'] = 'Proposal';
        $data['proposal'] = $this->db->query("SELECT tb_skripsi.*, tb_mahasiswa.nama, tb_mahasiswa.prodi, tb_dosen.nama as nama_dosen FROM tb_skripsi,
        tb_mahasiswa, tb_dosen WHERE tb_skripsi.nim=tb_mahasiswa.nim AND tb_skripsi.id_dosen_ta=tb_dosen.id_dosen AND tb_mahasiswa.prodi='$prodi'")->result_array(); 
        $data['status'] = $this->db->get('tb_skripsi')->result_array();
		$this->load->view('templates_backend/header', $data);
        $this->load->view('templates_backend/topbar_pegawai',$data);
        $this->load->view('templates_backend/sidebar_pegawai');
		$this->load->view('pegawai/proposal', $data);
        $this->load->view('templates_backend/footer');
        
    }
     
    public function detail_proposal($id)
    {
        $data['judul'] = 'Proposal';
        $data['proposal'] = $this->db->query("SELECT tb_skripsi.*, tb_mahasiswa.nama FROM tb_skripsi,
        tb_mahasiswa WHERE tb_skripsi.nim=tb_mahasiswa.nim AND tb_skripsi.id_skripsi='$id'")->row_array(); 
        $nip = $this->session->userdata('nip');
		$data['pegawai'] = $this->db->get_where('pegawai',['nip'=>$nip])->row_array();
        
        $this->load->view('templates_backend/header', $data);
        $this->load->view('templates_backend/topbar_pegawai',$data);
		$this->load->view('templates_backend/sidebar_pegawai');
		$this->load->view('pegawai/detail_proposal', $data);
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

        redirect('pegawai/tugas_akhir/proposal');

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

        redirect('pegawai/tugas_akhir/proposal');

    }

}

/* End of file Tugas_akhir.php */