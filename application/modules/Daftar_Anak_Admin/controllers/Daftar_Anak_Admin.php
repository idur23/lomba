<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_Anak_Admin extends MX_Controller {
	function __construct()
	{
		parent::__construct();
		{
			$this->load->model(array(
				'daftar_anak/daftar_anak_model'	=> 'anak'
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
		$data['anak'] = $this->anak->ambil_data()->result_array();
		// $data['genre'] = $this->genre->ambil_data()->result_array();
		// $data['jenis'] = $this->jenis->ambil_data()->result_array();
		// $data['komik'] = $this->komik->ambil_data()->result_array();
		// $data['upload'] = $this->upload_model->ambil_data()->result_array();
		// $data['total_genre'] = $this->genre->jumlah();
		// $data['total_jenis'] = $this->jenis->jumlah();
		// $data['total_judul'] = $this->judul->jumlah();
		// $data['total_komik'] = $this->komik->jumlah();
		$this->load->view('index', $data);
	}
	function index_user()
	{
		$this->load->view('user');
	}
	function tambah()
	{
		$this->load->view('dashboard_tambah');
	}
	function cari()
	{
		$keyword = $this->input->post('keyword');
		$data['anak'] = $this->anak->search($keyword);
		print(var_dump($data));
		// $this->load->view('index',$data);
	}
	function hapus($id)
	{
		$where = array('id'=> $id);
		$this->anak->hapus_data($where,'anak');
		$this->session->set_flashdata('msg','Data Berhasil di Hapus');
		redirect('Daftar_Anak_Admin');
	}
	function edit($id)
	{
		$where = array('id' => $id);
		$data['anak'] = $this->anak->edit_data($where,'anak')->result();
		$this->load->view('edit',$data);
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
			$query = $this->db->insert('pengaduan', $data);
			redirect('dashboard');
		}
	}
	function hapus_upload($id)
	{
		$_id = $this->db->get_where('anak',['id'=>$id])->row();
		$query = $this->db->delete('anak',['id'=>$id]);
		if($query){
			unlink("upload/".$_id->nama_berkas);
		}
		redirect('Daftar_Anak_Admin');
	}
	function tampil_edit($id)
	{
		$where = array('id' => $id);
		$data['anak'] = $this->anak->edit_data($where,'anak')->result();
		$this->load->view('edit',$data);
	}
	function upload_edit()
	{
		$berkas = $_FILES['berkas']['name'];
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$nik = $this->input->post('nik');
		$alamat = $this->input->post('alamat');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$old = $this->input->post('old');
		// $type_berkas = $this->upload->data('file_ext');
		// $ukuran_berkas = $this->upload->data('file_size');
		$query = $this->db->get_where('anak', ['id' => $id])->row();
		// print_r($_FILES);
		// exit();
			$data = array(
				'tempat_lahir'			=> $tempat_lahir,
				'tanggal_lahir'			=> $tanggal_lahir,
				'alamat'				=> $alamat,
				'nik'					=> $nik,
				'nama_berkas'			=> $old,
				'nama'					=> $nama
			);
			$where = array(
				'id' => $id
			);
			$this->anak->update_data($where, $data,'anak');
					$this->session->set_flashdata('msg','Data Berhasil di Update');
					redirect('Daftar_Anak_Admin');
		
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
	function print()
	{
		$data['anak'] = $this->anak->ambil_data()->result_array();
		$this->load->view('print',$data);
	}
}