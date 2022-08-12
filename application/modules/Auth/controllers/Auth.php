<?php
	defined('BASEPATH') or exit('No direct script access allowed');

	/**
	 * 
	 */
	class Auth extends MX_Controller
	{

		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->helper(array('form','url'));
			$this->load->library('form_validation');
		}

		public function index()
		{

			//validasi input
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			//jika validasi gagal
			if ($this->form_validation->run() == false) {
				$data['title'] = 'Login Pengaduan Masyarakat';
				$this->load->view('template/login_header', $data);
				$this->load->view('login');
				$this->load->view('Admin/js');
			}else{
				//jika berhasil
				$this->_login();
			}
		}

		private function _login()
		{
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$user = $this->db->get_where('user',['email' => $email])->row_array();

			//jika user ada
			if ($user) {

				//cek password
				if (password_verify($password, $user['password'])) 
				{
					$data = [
						'fullname'			=> $user['fullname'],
						'email'				=> $user['email'],
						'nik'				=> $user['nik'],
						'telp'				=> $user['telp'],
						'nama_berkas'		=> $user['nama_berkas'],
					];
					// print_r(var_dump($data));
					$this->session->set_userdata($data);
					redirect('dashboard_rakyat');
					
				}

				//jika password salah
				else{
					$this->session->set_flashdata('message',
						'<div class="alert alert-danger" role="alert">Wrong password!</div>');
					redirect('auth');
				}
			}

			//jika user tidak ada
			else{
					$this->session->set_flashdata('message',
						'<div class="alert alert-danger" role="alert">Email is not registered!</div>');
					redirect('auth');
				}
		}

		public function registration()
		{

			$this->form_validation->set_rules('fullname', 'Fullname', 'trim|required');
			$this->form_validation->set_rules('nik', 'NIK', 'trim|required', 'trim|required|min_length[16]', ['min_length' => 'Password too short!']);
			$this->form_validation->set_rules('telp', 'Telp', 'trim|required');

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

				$this->db->insert('user', $data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulations! your account has been created. Please login!</div>');
				redirect('auth', 'refresh');
				}
			}	
		}

		public function logout(){
			//hapus session
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('role');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logout!</div>');
			redirect('auth');
		}
	}
?>