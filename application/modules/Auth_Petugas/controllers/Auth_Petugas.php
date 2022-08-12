<?php
	defined('BASEPATH') or exit('No direct script access allowed');

	/**
	 * 
	 */
	class Auth_Petugas extends MX_Controller
	{

		public function __construct()
		{
			parent::__construct();
			$this->load->library('form_validation');
		}

		public function index()
		{

			//validasi input
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			//jika validasi gagal
			if ($this->form_validation->run() == false) {
				$data['title'] = 'Login Admin Pendaftaran Paud dan TK';
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
			$role = $this->input->post('role');

			$user = $this->db->get_where('petugas',['email' => $email])->row_array();

			//jika user ada
			if ($user) {

				//cek password
				if (password_verify($password, $user['password'])) 
				{
					$data = [
						'id'			=> $user['id'],
						'fullname'		=> $user['fullname'],
						'email'			=> $user['email'],
						'nik'			=> $user['nik'],
						'nama_berkas'	=> $user['nama_berkas'],
						'role'			=> $user['role'],
						'telp'			=> $user['telp']
					];
					$this->session->set_userdata($data);
					redirect('Dashboard');
					
				}

				//jika password salah
				else{
					$this->session->set_flashdata('message',
						'<div class="alert alert-danger" role="alert">Wrong password!</div>');
					redirect('aut_Petugas');
				}
			}

			//jika user tidak ada
			else{
					$this->session->set_flashdata('message',
						'<div class="alert alert-danger" role="alert">Email is not registered!</div>');
					redirect('auth_petugas');
				}
		}

		public function registration()
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
			}else{
				$data = [
					'fullname' => htmlspecialchars($this->input->post('fullname', true)),
					'nik' => htmlspecialchars($this->input->post('nik', true)),
					'email' => htmlspecialchars($this->input->post('email', true)),
					'password' => password_hash($this->input->post('password'),
						PASSWORD_DEFAULT)

				];

				$this->db->insert('petugas', $data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulations! your account has been created. Please login!</div>');
				redirect('auth_petugas', 'refresh');
			}
		}

		public function logout(){
			//hapus session
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('role');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logout!</div>');
			session_destroy();
			redirect('auth_petugas');
		}
	}
?>