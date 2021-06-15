<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembimbing extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('role_id')!= '2'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
						 Anda Belum Login Sebagai Pegawai!!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
			redirect('pegawai/auth');
		}
	}

	public function index()
	{
		$nip = $this->session->userdata('nip');
		$data['pegawai'] = $this->db->get_where('pegawai',['nip'=>$nip])->row_array();
		$data['judul'] = 'Pembimbing';
		$data['pembimbing'] = $this->db->query("SELECT COUNT(*) AS jml_mahasiswa, pembimbing.*, tb_dosen.* FROM pembimbing, tb_dosen WHERE pembimbing.pembimbing_1=tb_dosen.id_dosen GROUP BY pembimbing.pembimbing_1 HAVING ( COUNT(pembimbing.id_mahasiswa) >= 1)")->result_array();
		$this->load->view('templates_backend/header', $data);
		$this->load->view('templates_backend/topbar_pegawai',$data);
		$this->load->view('templates_backend/sidebar_pegawai');
		$this->load->view('pegawai/pembimbing', $data);
		$this->load->view('templates_backend/footer');
	}
	public function mahasiswa()
	{
		$nip = $this->session->userdata('nip');
		$data['pegawai'] = $this->db->get_where('pegawai',['nip'=>$nip])->row_array();
		$where = $this->uri->segment(4);
		$data['judul'] = 'Data Mahasiswa';
		$prodi = $data['pegawai']['prodi'];
		$data['pembimbing'] = $this->db->get('pembimbing')->row_array();
		$data['mahasiswa'] = $this->db->query("SELECT DISTINCT tb_mahasiswa.id_mhs, tb_mahasiswa.nim, tb_mahasiswa.nama, tb_mahasiswa.prodi 
		FROM pembimbing, tb_mahasiswa WHERE
		 pembimbing.id_mahasiswa=tb_mahasiswa.id_mhs AND pembimbing.pembimbing_1='$where' AND tb_mahasiswa.prodi='$prodi'")->result_array();
		$this->load->view('templates_backend/header', $data);
		$this->load->view('templates_backend/topbar_pegawai',$data);
		$this->load->view('templates_backend/sidebar_pegawai');
		$this->load->view('pegawai/d_mahasiswa', $data);
		$this->load->view('templates_backend/footer');

	}
	public function mahasiswa_pa()
	{
		$nip = $this->session->userdata('nip');
		$data['pegawai'] = $this->db->get_where('pegawai',['nip'=>$nip])->row_array();
		$where = $this->uri->segment(4);
		$data['judul'] = 'Data Mahasiswa';
		$prodi = $data['pegawai']['prodi'];
		$data['pembimbing_pa'] = $this->db->get('pembimbing_pa')->row_array();
		$data['mahasiswa'] = $this->db->query("SELECT DISTINCT tb_mahasiswa.id_mhs, tb_mahasiswa.nim, tb_mahasiswa.nama, tb_mahasiswa.prodi 
		FROM pembimbing_pa, tb_mahasiswa WHERE pembimbing_pa.id_mahasiswa=tb_mahasiswa.id_mhs AND 
		pembimbing_pa.id_dosen='$where' AND tb_mahasiswa.prodi='$prodi'")->result_array();
		$this->load->view('templates_backend/header', $data);
		$this->load->view('templates_backend/topbar_pegawai',$data);
		$this->load->view('templates_backend/sidebar_pegawai');
		$this->load->view('admin/d_mahasiswa_pa', $data);
		$this->load->view('templates_backend/footer');
	}
	public function tambah_pembimbing()
	{
		$data['pembimbing']= $this->db->get('pembimbing')->row_array();	
		$this->form_validation->set_rules('dosen','Dosen','required|trim|is_unique[pembimbing.id_mahasiswa]');
		$this->form_validation->set_rules('mahasiswa','Mahasiswa','required|trim|is_unique[pembimbing.id_mahasiswa]',
		array('is_unique' => 'Mahasiswa ini sudah memiliki Pembimbing!'));
		if($this->form_validation->run()==FALSE){
			$nip = $this->session->userdata('nip');
		$data['pegawai'] = $this->db->get_where('pegawai',['nip'=>$nip])->row_array();
		$prodi = $data['pegawai']['prodi'];
		$data['judul'] = 'Tambah Pembimbing';
		$data['dosen'] = $this->db->get('tb_dosen')->result_array();
		$data['mahasiswa']= $this->db->get_where('tb_mahasiswa', ['prodi' => $prodi])->result_array();	

		$this->load->view('templates_backend/header', $data);
		$this->load->view('templates_backend/topbar_pegawai',$data);
		$this->load->view('templates_backend/sidebar_pegawai');
		$this->load->view('pegawai/tambah_pembimbing', $data);
		$this->load->view('templates_backend/footer');
	}else{
		$dosen = $this->input->post('dosen',true);
		$mahasiswa = $this->input->post('mahasiswa',true);
		$data= array(
			'id_mahasiswa' => $mahasiswa,
			'pembimbing_1' => $dosen
		);

		$this->db->insert('pembimbing', $data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
						 Data Berhasil Ditambah!!!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
		redirect('pegawai/pembimbing/');

	}

	}
	public function pembimbing_pa()
	{
		$nip = $this->session->userdata('nip');
		$data['pegawai'] = $this->db->get_where('pegawai',['nip'=>$nip])->row_array();
		$data['judul'] = 'Pembimbing Akademik';
		$data['pembimbing_pa'] = $this->db->query("SELECT COUNT(*) AS jml_mahasiswa, pembimbing_pa.*, tb_dosen.* FROM pembimbing_pa, tb_dosen WHERE pembimbing_pa.id_dosen=tb_dosen.id_dosen GROUP BY pembimbing_pa.id_dosen HAVING ( COUNT(pembimbing_pa.id_mahasiswa) >= 1)")->result_array();
		$this->load->view('templates_backend/header', $data);
		$this->load->view('templates_backend/topbar_pegawai',$data);
		$this->load->view('templates_backend/sidebar_pegawai');
		$this->load->view('pegawai/pembimbing_pa', $data);
		$this->load->view('templates_backend/footer');
	}
	public function tambah_pembimbing_pa()
	{
		$data['pembimbing_pa']= $this->db->get('pembimbing_pa')->row_array();	
		$this->form_validation->set_rules('dosen','Dosen','required|trim');
		$this->form_validation->set_rules('mahasiswa','Mahasiswa','required|trim|is_unique[pembimbing_pa.id_mahasiswa]',
		array('is_unique' => 'Mahasiswa ini sudah memiliki Pembimbing!'));
		if($this->form_validation->run()==FALSE){
			$nip = $this->session->userdata('nip');
		$data['pegawai'] = $this->db->get_where('pegawai',['nip'=>$nip])->row_array();
		$data['judul'] = 'Tambah Pembimbing Akademik';
		$prodi = $data['pegawai']['prodi'];
		$data['dosen'] = $this->db->get('tb_dosen')->result_array();
		$data['mahasiswa']= $this->db->get_where('tb_mahasiswa', ['prodi'=>$prodi])->result_array();	

		$this->load->view('templates_backend/header', $data);
		$this->load->view('templates_backend/topbar_pegawai',$data);
		$this->load->view('templates_backend/sidebar_pegawai');
		$this->load->view('pegawai/tambah_pembimbing_pa', $data);
		$this->load->view('templates_backend/footer');
	}else{
		$dosen = $this->input->post('dosen',true);
		$mahasiswa = $this->input->post('mahasiswa',true);
		$data= array(
			'id_mahasiswa' => $mahasiswa,
			'id_dosen' => $dosen
		);

		$this->db->insert('pembimbing_pa', $data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
						 Data Berhasil Ditambah!!!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
		redirect('pegawai/pembimbing/pembimbing_pa');

	}

	}

	public function export_excel()
	{
		$data['pembimbing'] = $this->db->query("SELECT COUNT(*) AS jml_mahasiswa, pembimbing.*, tb_dosen.* FROM pembimbing, tb_dosen WHERE pembimbing.pembimbing_1=tb_dosen.id_dosen GROUP BY
		 pembimbing.pembimbing_1 HAVING ( COUNT(pembimbing.id_mahasiswa) >= 1)")->result_array();
		 require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
		 require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		 $object = new PHPExcel();
		 $object->getProperties()->setCreator('Teknik Sipil');
		 $object->getProperties()->setLastModifiedBy('Teknik Sipil');
		 $object->getProperties()->setTitle('Daftar Pembimbing');

		 $object->setActiveSheetIndex(0);
		 $object->getActiveSheet()->setCellValue('A1','NO');
		 $object->getActiveSheet()->setCellValue('B1','Nama Pembimbing');
		 $object->getActiveSheet()->setCellValue('C1','NIP');
		 $object->getActiveSheet()->setCellValue('D1','Jumlah Mahasiswa');
		 $baris = 2;
		 $no = 1;
		 foreach ($data['pembimbing'] as $pb){
			 $object->getActiveSheet()->setCellValue('A'.$baris, $no++);
			 $object->getActiveSheet()->setCellValue('B'.$baris, $pb['nama']);
			 $object->getActiveSheet()->setCellValue('C'.$baris, $pb['nip']);
			 $object->getActiveSheet()->setCellValue('D'.$baris, $pb['jml_mahasiswa']);
			 $baris++;
		 } 
		 $filename="Data-Pembimbing".date("d-m-Y-H-i-s").'.xlsx';
		 $object->getActiveSheet()->setTitle("Data Pembimbing");
		 header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		 header('Content-Disposition: attachment;filename="' .$filename.'"');
		 header('Cache-Control: max-age=0');

		 $writer= PHPExcel_IOFactory::createWriter($object, 'Excel2007');
		 $writer->save('php://output');
		 exit;
		 
	}
	public function export_excel_pa()
	{
		$data['pembimbing'] = $this->db->query("SELECT COUNT(*) AS jml_mahasiswa, pembimbing_pa.*, tb_dosen.* FROM pembimbing_pa, tb_dosen WHERE pembimbing_pa.id_dosen=tb_dosen.id_dosen GROUP BY
		 pembimbing_pa.id_dosen HAVING ( COUNT(pembimbing_pa.id_mahasiswa) >= 1)")->result_array();
		 require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
		 require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		 $object = new PHPExcel();
		 $object->getProperties()->setCreator('Teknik Sipil');
		 $object->getProperties()->setLastModifiedBy('Teknik Sipil');
		 $object->getProperties()->setTitle('Daftar Pembimbing');

		 $object->setActiveSheetIndex(0);
		 $object->getActiveSheet()->setCellValue('A1','NO');
		 $object->getActiveSheet()->setCellValue('B1','Nama Pembimbing');
		 $object->getActiveSheet()->setCellValue('C1','NIP');
		 $object->getActiveSheet()->setCellValue('D1','Jumlah Mahasiswa');
		 $baris = 2;
		 $no = 1;
		 foreach ($data['pembimbing'] as $pb){
			 $object->getActiveSheet()->setCellValue('A'.$baris, $no++);
			 $object->getActiveSheet()->setCellValue('B'.$baris, $pb['nama']);
			 $object->getActiveSheet()->setCellValue('C'.$baris, $pb['nip']);
			 $object->getActiveSheet()->setCellValue('D'.$baris, $pb['jml_mahasiswa']);
			 $baris++;
		 } 
		 $filename="Data-Pembimbing".date("d-m-Y-H-i-s").'.xlsx';
		 $object->getActiveSheet()->setTitle("Data Pembimbing");
		 header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		 header('Content-Disposition: attachment;filename="' .$filename.'"');
		 header('Cache-Control: max-age=0');

		 $writer= PHPExcel_IOFactory::createWriter($object, 'Excel2007');
		 $writer->save('php://output');
		 exit;
		 
	}
	public function hapus_mhs()
	{
		$id = $this->input->post('id_mhs',true);	
		$where = ['id_mahasiswa' => $id];
		$redirect = $this->input->post('redirect_page');
		$this->db->delete('pembimbing',$where);
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
						 Data Berhasil Dihapus!!!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
		redirect('pegawai/pembimbing/');
	}
	public function hapus_mhs_pa()
	{
		$id = $this->input->post('id_mhs',true);	
		$where = ['id_mahasiswa' => $id];
		$redirect = $this->input->post('redirect_page');
		$this->db->delete('pembimbing_pa',$where);
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
						 Data Berhasil Dihapus!!!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
		redirect('pegawai/pembimbing/pembimbing_pa');
	}
}