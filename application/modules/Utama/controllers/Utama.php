<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utama extends MX_Controller {
	function __construct()
	{
		parent::__construct();
		{
			$this->load->model(array(
				// 'Pengaduan/pengaduan_model'	=> 'pengaduan',
				// 'utama_model'	=> 'tanggapan',
				// 'tanggap_model'	=> 'tanggap',
				// 'dashboard_model'	=> 'dashboard',
				// 'upload_model',
				// 'genre/model_genre'	=> 'genre',
				// 'jenis/model_jenis'	=> 'jenis',
				// 'judul/model_judul'	=> 'judul',
				// 'komik/model_komik'	=> 'komik',
			));
			$this->load->helper(array('form','url'));
			$this->load->library('form_validation');
		}
	}
	function index()
	{
		// $data['pengaduan'] = $this->pengaduan->ambil_data()->result_array();
		// $data['tanggapan'] = $this->tanggapan->ambil_data()->result_array();
		// $data['tanggap'] = $this->tanggap->ambil_data()->result_array();
		// $data['user'] = $this->dashboard->ambil_data()->result_array();
		// $data['genre'] = $this->genre->ambil_data()->result_array();
		// $data['jenis'] = $this->jenis->ambil_data()->result_array();
		// $data['komik'] = $this->komik->ambil_data()->result_array();
		// $data['upload'] = $this->upload_model->ambil_data()->result_array();
		// $data['total_genre'] = $this->genre->jumlah();
		// $data['total_jenis'] = $this->jenis->jumlah();
		// $data['total_judul'] = $this->judul->jumlah();
		// $data['total_komik'] = $this->komik->jumlah();
		$this->load->view('index');
	}
	function index_user()
	{

		$this->load->view('user');
	}
	function tambah()
	{
		$data['pengaduan'] = $this->pengaduan->ambil_data()->result_array();
		$data['tanggapan'] = $this->tanggapan->ambil_data()->result_array();
		$this->load->view('tambah',$data);
	}
	function tambah_aksi()
	{
		$pengaduan = $this->input->post('pengaduan');
		$tanggapan = $this->input->post('tanggapan');
		$data = array(
			'id_pengaduan' => $pengaduan,
			'tanggapan' => $tanggapan,
		);
		$this->tanggapan->input_data($data,'penanggapan');
		$this->session->set_flashdata('msg','Berhasil Tambah Data');
		redirect('Tanggapan_Admin');
	}
	function hapus($id_tanggapan)
	{
		$where = array('id_tanggapan'=> $id_tanggapan);
		$this->tanggap->hapus_data($where,'penanggapan');
		$this->session->set_flashdata('msg','Data Berhasil di Hapus');
		redirect('Tanggapan_Admin');
	}
	function edit($id_tanggapan)
	{
		$where = array('id_tanggapan' => $id_tanggapan);
		$data['tanggap'] = $this->tanggap->edit_data($where, 'penanggapan')->result();
		$this->load->view('more',$data);
	}
	function update()
	{
		$id 		= $this->input->post('id');
		$nama 		= $this->input->post('nama');
		$penerbit 	= $this->input->post('penerbit');
		$penulis 	= $this->input->post('penulis');

		$data = array(
			'nama' 		=> $nama,
			'penerbit' 	=> $penerbit,
			'penulis' 	=> $penulis
		);

		$where = array(
			'id' => $id
		);

		$this->dashboard->update_data($where,$data,'rincian_buku');
		redirect('http://localhost:8080/hmvc2/');

	}
	function index_upload()
	{
		$this->load->view('form_upload');
	}
	public function aksi_upload()
	{
		// print_r($_FILES);
		// exit();
		$config['upload_path']		= './upload/';
		$config['allowed_types']	= 'jpg|png|jpeg|tmp';
		$config['max_size']			= 976563;
		$config['max_width']		= 4320;
		$config['max_height']		= 7680;
		$config['encrypt_name']		= TRUE;
		$this->load->library('upload',$config);
		if(! $this->upload->do_upload('berkas'))
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('form_upload',$error);
		}else{
			$_data = array('upload_data' => $this->upload->data());
			$data = array(
				'nama_berkas' => $_data['upload_data']['file_name'],
				'keterangan_berkas' => $this->input->post('keterangan_berkas'),
				'type_berkas' => $_data['upload_data']['file_ext'],
				'ukuran_berkas' => $_data['upload_data']['file_size']
			);
			// $data['nama_berkas']		= $this->upload->data("file_name");
			// $data['keterangan_berkas']	= $this->input->post('keterangan_berkas');
			// $data['type_berkas']		= $this->upload->data('file_ext');
			// $data['ukuran_berkas']		= $this->upload->data('file_size');
			$query = $this->db->insert('tb_berkas', $data);
			redirect('dashboard');
		}
	}
	function hapus_upload($id)
	{
		$_id = $this->db->get_where('tb_berkas',['id'=>$id])->row();
		$query = $this->db->delete('tb_berkas',['id'=>$id]);
		if($query){
			unlink("upload/*".$_id->nama_berkas);
		}
		redirect('http://localhost:8080/hmvc2/');
	}
	function tampil_edit($id)
	{
		$where = array('id' => $id);
		$data['tb_berkas'] = $this->upload_model->edit_data($where,'tb_berkas')->result();
		$this->load->view('edit_upload',$data);
	}
	function upload_edit()
	{
		// print_r($_FILES);
		// exit();
		$id = $this->input->post('id');
		$config['upload_path']		= './upload/';
		$config['allowed_types']	= 'jpg|png|jpeg|tmp';
		$config['max_size']			= 976563;
		$config['max_width']		= 4320;
		$config['max_height']		= 7680;
		$config['encrypt_name']		= TRUE;

		$this->load->library('upload',$config);

		if(! $this->upload->do_upload('berkas')){
			echo 'Anda Belum Update';
		}else{
			$nama_berkas = $this->upload->data("file_name");
			$keterangan_berkas = $this->input->post('keterangan_berkas');
			$type_berkas = $this->upload->data('file_ext');
			$ukuran_berkas = $this->upload->data('file_size');

			$this->upload_model->update(array(
				'nama_berkas' => $nama_berkas,
				'keterangan_berkas' => $keterangan_berkas,
				'type_berkas' => $type_berkas,
				'ukuran_berkas' => $ukuran_berkas
			),array('id' => $this->input->post('id'))
		);
			$this->session->set_flashdata('msg','Data Berhasil di Update');
			redirect('http://localhost:8080/hmvc2/');
		}
		$data['ambil_data'] = $this->upload_model->get_by_id($id);
		$this->load->view('edit_upload',$data);
	}
	function multi_upload()
	{
		$this->load->view('multiple_upload');
	}
	function proses()
	{
		$config['upload_path']          = './upload/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']				= 976563;
		$config['max_width']			= 4320;
		$config['max_height']			= 7680;
		$config['encrypt_name']			= TRUE;
		$this->load->library('upload',$config);
		$keterangan_berkas = $this->input->post('keterangan_berkas');
		$jumlah_berkas = count($_FILES['berkas']['name']);
		for($i = 0; $i < $jumlah_berkas;$i++)
		{
            if(!empty($_FILES['berkas']['name'][$i])){

				$_FILES['file']['name'] = $_FILES['berkas']['name'][$i];
				$_FILES['file']['type'] = $_FILES['berkas']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['berkas']['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES['berkas']['error'][$i];
				$_FILES['file']['size'] = $_FILES['berkas']['size'][$i];
	   
				if($this->upload->do_upload('file')){
					
					$uploadData = $this->upload->data();
					$data['nama_berkas'] = $uploadData['file_name'];
					$data['keterangan_berkas'] = $keterangan_berkas[$i];
					$data['type_berkas'] = $uploadData['file_ext'];
					$data['ukuran_berkas'] = $uploadData['file_size'];
					$this->db->insert('tb_berkas',$data);
				}
			}
		}

		redirect('dashboard');
	}
	function checkbox()
	{
		$data['genre'] = $this->genre->ambil_data()->result_array();
		$this->load->view('head');
		$this->load->view('checkbox',$data);
		$this->load->view('js');
	}
	function insert_checkbox()
	{
		if ($_POST) {
			$checkbox = $this->input->post('nama_genre');
			$genre = implode(",", $checkbox);

			$data = array(
				'nama_genre' => $genre
			);
			$this->dashboard->input_data($data,'rincian_buku');
			redirect('dashboard');
		}
		$this->load->view('dashboard');
	}
}