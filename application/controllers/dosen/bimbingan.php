<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bimbingan extends CI_Controller {
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
		// $data['mahasiswa'] = $this->db->query("SELECT COUNT(*) AS jumlahdata FROM tb_mahasiswa")->row();
		$data['judul'] = 'Bimbingan';
		$kd_dosen = $this->session->userdata('kd_dosen');
		$id_dosen = $this->session->userdata('id_dosen');
		$data['dosen'] = $this->db->get_where('tb_dosen',['kd_dosen'=>$kd_dosen])->row_array();
		$data['bimbingan1'] = $this->db->query("SELECT pembimbing.*, tb_mahasiswa.* FROM pembimbing, tb_mahasiswa WHERE pembimbing.id_mahasiswa=tb_mahasiswa.id_mhs AND pembimbing.pembimbing_1='$id_dosen'")->result_array();
		// $data['bimbingan1'] = $this->db->query("SELECT tb.mahasiswa.nama, bimbingan.*, tb_mahasiswa.nim, tb_mahasiswa.nama as nama_mhs, tb_dosen.* FROM bimbingan, tb_mahasiswa, tb_dosen WHERE bimbingan.id_mhs=tb_mahasiswa.id_mhs AND bimbingan.id_dosen=tb_dosen.id_dosen AND bimbingan.nip='$nip' ORDER BY tb_mahasiswa.nama")->result_array();
		// $data= $this->m_dosen->jml_bimbingan($id_dosen);
		// $data['bimbingan'] = $this->db->get_where('bimbingan')->result_array();
		$this->load->view('templates_backend/header', $data);
		$this->load->view('templates_backend/topbar_dosen', $data);
		$this->load->view('templates_backend/sidebar_dosen', $data);
		$this->load->view('dosen/bimbingan', $data);
		$this->load->view('templates_backend/footer');
		
	}
	public function detail_bimbingan()
	{
		$where = $this->uri->segment(4);
		$data['detail'] = $this->db->query("SELECT bimbingan.*, tb_mahasiswa.nama FROM bimbingan, tb_mahasiswa WHERE bimbingan.nim=tb_mahasiswa.nim  AND bimbingan.nim='$where'")->result_array();
		$data['nim'] = $this->db->query("SELECT bimbingan.*, tb_mahasiswa.nama, tb_mahasiswa.nim FROM bimbingan, tb_mahasiswa WHERE bimbingan.nim=tb_mahasiswa.nim  AND bimbingan.nim='$where'")->row_array();
		$data['judul'] = 'Detail Bimbingan';
		$nip = $this->session->userdata('nip');
		$data['dosen'] = $this->db->get_where('tb_dosen',['nip'=>$nip])->row_array();
		$this->load->view('templates_backend/header', $data);
		$this->load->view('templates_backend/topbar_dosen', $data);
		$this->load->view('templates_backend/sidebar_dosen', $data);
		$this->load->view('dosen/detail_bimbingan', $data);
		$this->load->view('templates_backend/footer');
	}
	public function berkas()
	{
		$where = $this->uri->segment(4);
		$data['judul'] = 'Detail Berkas';
		$kd_dosen = $this->session->userdata('kd_dosen');
		$data['dosen'] = $this->db->get_where('tb_dosen',['kd_dosen'=>$kd_dosen])->row_array();
		$data['mahasiswa'] = $this->db->get('tb_mahasiswa')->row_array();
		$data['berkas'] = $this->db->query("SELECT bimbingan.*, tb_mahasiswa.nama FROM bimbingan, tb_mahasiswa WHERE bimbingan.nim=tb_mahasiswa.nim AND bimbingan.id_bimbingan='$where'")->result_array();
		$this->load->view('templates_backend/header', $data);
		$this->load->view('templates_backend/topbar_dosen', $data);
		$this->load->view('templates_backend/sidebar_dosen', $data);
		$this->load->view('dosen/berkas', $data);
		$this->load->view('templates_backend/footer');
	}
	public function download($file)
	{
		$this->load->helper('download');
		$name = $file;
		$data = './assets/file/mahasiswa/'.$file; 
		force_download($name, $data); 
		redirect('index','refresh');
	}
	public function proposal()
	{
		$data['judul'] = 'Detail Proposal Judul';
		$nip = $this->session->userdata('nip');
		$id_dosen = $this->session->userdata('id_dosen');
		$kd_dosen = $this->session->userdata('kd_dosen');
		$data['dosen'] = $this->db->get_where('tb_dosen',['nip'=>$nip])->row_array();
		$data['proposal'] = $this->db->query("SELECT DISTINCT tb_skripsi.*, tb_mahasiswa.nama FROM tb_skripsi, tb_mahasiswa, tb_dosen WHERE 
		tb_skripsi.nim=tb_mahasiswa.nim AND tb_skripsi.id_dosen_pa=tb_dosen.id_dosen AND tb_dosen.id_dosen='$id_dosen'")->result_array();
		$data['proposal_ta'] = $this->db->query("SELECT DISTINCT tb_skripsi.*, tb_mahasiswa.nama FROM tb_skripsi, tb_mahasiswa, tb_dosen WHERE 
		tb_skripsi.nim=tb_mahasiswa.nim AND tb_skripsi.id_dosen_ta=tb_dosen.id_dosen AND tb_dosen.id_dosen='$id_dosen'")->result_array();
		$this->load->view('templates_backend/header', $data);
		$this->load->view('templates_backend/topbar_dosen', $data);
		$this->load->view('templates_backend/sidebar_dosen', $data);
		$this->load->view('dosen/proposal', $data);
		$this->load->view('templates_backend/footer');


	}
	public function setuju()
    {
        $id = $this->input->post('id_skripsi');
        $this->db->set('status','Disetujui Pembimbing');
        $this->db->where('id_skripsi', $id);
        $this->db->update('tb_skripsi');
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
						 Judul Skripsi Disetujui!!!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');

        redirect('dosen/bimbingan/proposal');

    }
    public function tolak()
    {
		$id = $this->input->post('id_skripsi');
		$komentar = $this->input->post('komentar');
		$this->db->set('status','Ditolak Pembimbing');
		$this->db->set('komentar',$komentar);
        $this->db->where('id_skripsi', $id);
        $this->db->update('tb_skripsi');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
						 Judul Skripsi Ditolak!!!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');

		redirect('dosen/bimbingan/proposal');

    }
	public function tambah_komentar()
	{
		$this->form_validation->set_rules('komentar','Komentar','required|trim');
		$redirect_page = $this->input->post('redirect_page');
		if($this->form_validation->run() == FALSE){
			redirect($redirect_page);
		}else{
		$id_bimbingan = $this->input->post('id_bimbingan',true);
		$komentar = $this->input->post('komentar', true);
		$data= array(
			'id_bimbingan' => $id_bimbingan,
			'komentar' => $komentar,
			'tgl_komentar' => time()
				);
		$result=$this->db->insert('tb_komentar', $data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
						 Komentar anda sudah di kirim!!!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
		redirect('dosen/bimbingan/');	
		}
	}
	public function export_excel($id)
	{
		$where = $this->uri->segment(4);
		$data['detail'] = $this->db->query("SELECT bimbingan.*, tb_mahasiswa.nama FROM bimbingan,
		 tb_mahasiswa WHERE bimbingan.nim=tb_mahasiswa.nim  AND bimbingan.nim='$id'")->result_array();
		 require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
		 require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		 $object = new PHPExcel();
		 $object->getProperties()->setCreator('Teknik Sipil');
		 $object->getProperties()->setLastModifiedBy('Teknik Sipil');
		 $object->getProperties()->setTitle('Data Bimbingan');

		 $object->setActiveSheetIndex(0);
		 $object->getActiveSheet()->setCellValue('A1','NO');
		 $object->getActiveSheet()->setCellValue('B1','Nama Mahasiswa');
		 $object->getActiveSheet()->setCellValue('C1','NIM');
		 $object->getActiveSheet()->setCellValue('D1','Tanggal Bimbingan');
		 $baris = 2;
		 $no = 1;
		 foreach ($data['detail'] as $dt){
			 $object->getActiveSheet()->setCellValue('A'.$baris, $no++);
			 $object->getActiveSheet()->setCellValue('B'.$baris, $dt['nama']);
			 $object->getActiveSheet()->setCellValue('C'.$baris, $dt['nim']);
			 $object->getActiveSheet()->setCellValue('D'.$baris, date('d F Y', $dt['tgl_bimbingan']));
			 $baris++;
		 } 
		 $filename="Data-Bimbingan".date("d-m-Y-H-i-s").'.xlsx';
		 $object->getActiveSheet()->setTitle("Data Bimbingan");
		 header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		 header('Content-Disposition: attachment;filename="' .$filename.'"');
		 header('Cache-Control: max-age=0');

		 $writer= PHPExcel_IOFactory::createWriter($object, 'Excel2007');
		 $writer->save('php://output');
		 exit;
		 
	}
	public function proposal_ditolak_pa($id)
	{
		$data['judul'] = 'Detail Proposal';
		$id_skripsi = ['id_skripsi' => $id];
		$kd_dosen = $this->session->userdata('kd_dosen');
		$data['dosen'] = $this->db->get_where('tb_dosen',['kd_dosen'=>$kd_dosen])->row_array();
		$data['mahasiswa'] = $this->db->get('tb_mahasiswa')->row_array();
		$data['proposal'] = $this->db->get_where('tb_skripsi', $id_skripsi)->row_array();
		$this->load->view('templates_backend/header', $data);
		$this->load->view('templates_backend/topbar_dosen', $data);
		$this->load->view('templates_backend/sidebar_dosen', $data);
		$this->load->view('dosen/d_proposal_ditolak', $data);
		$this->load->view('templates_backend/footer');
		var_dump($data['proposal']);
	}
	public function detail_proposal_ta($id)
	{
		$data['judul'] = 'Detail Proposal';
		$id_skripsi = ['id_skripsi' => $id];
		$kd_dosen = $this->session->userdata('kd_dosen');
		$data['dosen'] = $this->db->get_where('tb_dosen',['kd_dosen'=>$kd_dosen])->row_array();
		$data['mahasiswa'] = $this->db->get('tb_mahasiswa')->row_array();
		$data['proposal_ta'] = $this->db->get_where('tb_skripsi', $id_skripsi)->row_array();
		$this->load->view('templates_backend/header', $data);
		$this->load->view('templates_backend/topbar_dosen', $data);
		$this->load->view('templates_backend/sidebar_dosen', $data);
		$this->load->view('dosen/d_proposal_ta', $data);
		$this->load->view('templates_backend/footer');
	}
	// public function download()
	// {
	// 	$id = $this->input->post('id_bimbingan',true);
	// 	$where= ['id_bimbingan' =>$id];
	// 	$data= $this->db->get_where('bimbingan', $where)->row_array();
	// 	force_download('assets/file'.$data['files'], NULL);
		
	// }
}