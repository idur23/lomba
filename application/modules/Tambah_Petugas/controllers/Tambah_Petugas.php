<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tambah_Petugas extends MX_Controller {
	function __construct()
	{
		parent::__construct();
		{
			$this->load->model(array(
				'dashboard/dashboard_model'	=> 'dashboard',
				'tambah_petugas_model'		=> 'tambah_petugas',
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
		$data['petugas'] = $this->tambah_petugas->ambil_data()->result_array();
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
		$this->load->view('tambah');
	}
	function tambah_aksi()
	{
		$this->form_validation->set_rules('fullname', 'Fullname', 'trim|required');
		$this->form_validation->set_rules('nik', 'NIK', 'trim|required');

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]', ['is_unique' => 'This email has already registered!']);

		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|matches[password2]', ['matches' => 'Password not match!', 'min_length' => 'Password too short!']);

		$this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Registrasi Pengaduan Masyarakat';
			$this->load->view('template/login_header', $data);
			$this->load->view('registration');
			$this->load->view('Admin/js');
		}
		else
		{
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
				$this->load->view('Auth/registration',$error);
			}else{
				$_data = array('upload_data' => $this->upload->data());
				$data = [
					'nama_berkas'	=> $_data['upload_data']['file_name'],
					'fullname'		=> htmlspecialchars($this->input->post('fullname', true)),
					'nik'			=> htmlspecialchars($this->input->post('nik', true)),
					'telp'			=> htmlspecialchars($this->input->post('telp', true)),
					'email'			=> htmlspecialchars($this->input->post('email', true)),
					'password'		=> password_hash($this->input->post('password'), PASSWORD_DEFAULT)
				];

			$this->db->insert('petugas', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulations! your account has been created. Please login!</div>');
			redirect('Tambah_Petugas', 'refresh');
			}
		}	
	}
	function hapus($id)
	{
		$where = array('id'=> $id);
		$this->tambah_petugas->hapus_data($where,'petugas');
		$this->session->set_flashdata('msg','Data Berhasil di Hapus');
		redirect('Tambah_Petugas');
	}
	function edit($id)
	{
		$where = array('id' => $id);
		$data['petugas'] = $this->tambah_petugas->edit_data($where,'petugas')->result();
		$this->load->view('edit',$data);
	}
	function update()
	{
		$id 		= $this->input->post('id');
		$fullname 	= $this->input->post('fullname');
		$email 		= $this->input->post('email');
		$telp 		= $this->input->post('telp');
		$nik 		= $this->input->post('nik');
		$role 		= $this->input->post('role');
		$berkas 	= $_FILES['berkas']['name'];

		if ($berkas == null) {
			$data = array(
			'telp' 		=> $telp,
			'role'		=> $role
			);

			$where = array(
				'id' => $id
			);

			$this->tambah_petugas->update_data($where,$data,'petugas');
			redirect('Tambah_Petugas');
			}
			else{	

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
					$berkas = $this->upload->data('file_name');
	                unlink("upload/" . $query->nama_berkas);
					
				}
					$data = array(
						'nama_berkas'	=> $berkas,
						'telp'	=> $telp,
						'role'		=> $role
					);
					$where = array(
						'id' => $id
					);
					$this->tambah_petugas->update_data($where, $data,'petugas');
			}
					$this->session->set_flashdata('msg','Data Berhasil di Update');
					redirect('Tambah_Petugas');
		

		

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
		redirect('http://localhost:8080/laporan/Tambah_Petugas');
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
			redirect('http://localhost:8080/laporan/Tambah_Petugas');
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