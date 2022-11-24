<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Auth_model', 'auth');
		$this->load->model('Admin_model', 'admin');
	}

	private function _has_login()
	{
		if ($this->session->has_userdata('login_session')) {
			redirect('dashboard');
		}
	}

	public function index()
	{
		$this->_has_login();

		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login PMB STIKes Bogor Husada';
			$this->template->load('templates/auth', 'auth/login', $data);
		} else {
			$input = $this->input->post(null, true);

			$cek_username = $this->auth->cek_username($input['username']);
			if ($cek_username > 0) {
				$password = $this->auth->get_password($input['username']);
				if (password_verify($input['password'], $password)) {
					$user_db = $this->auth->userdata($input['username']);
					if ($user_db['is_active'] != 1) {
						set_pesan('akun anda belum aktif/dinonaktifkan. Silahkan hubungi admin.', false);
						redirect('login');
					} 
					
					else {
						$userdata = [
							'user'  => $user_db['id_user'],
							'role'  => $user_db['role'],
							'timestamp' => time()
						];
						$this->session->set_userdata('login_session', $userdata);
						redirect('dashboard');
					}
					
				} else {
					set_pesan('password salah', false);
					redirect('auth');
				}
			} else {
				set_pesan('username belum terdaftar', false);
				redirect('auth');
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('login_session');

		set_pesan('anda telah berhasil logout');
		redirect('auth');
	}

	public function register()
	{

		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]|alpha_numeric');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[3]|trim');
		$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]|trim');
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'Email telah terdaftar!'
		]);
		$this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|trim');
		$token = base64_encode(random_bytes(32));
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Buat Akun';
			
			$this->template->load('templates/auth', 'auth/register', $data);
		} else {
			$email = $this->input->post('email', true);
			$input = $this->input->post(null, true);
			unset($input['password2']);
	
		
			$input['password']      = password_hash($input['password'], PASSWORD_DEFAULT);
			$input['role']          = 'mahasiswa';
			$input['foto']          = 'user.png';
			$input['is_active']     = 0;
			$input['created_at']    = time();


			// siapkan token
			$token = base64_encode(random_bytes(32));
			$user_token = [
				'email' => $email,
				'token' => $token,
				'date_created' => time()
			];

			$query  = $this->admin->insert('user', $input);
			$query = $this->_sendEmail($token, 'verify');
			$query = $this->db->insert('user_token', $user_token);
			if ($query) {
				set_pesan('daftar berhasil. Selanjutnya silahkan untuk cek email untuk mengaktifkan akun anda.');
				redirect('login');
			} else {
				set_pesan('gagal menyimpan ke database', false);
				redirect('register');
			}
		}
	}

	private function _sendEmail($token, $type)
	{
		$config = [
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'protocol'  => 'smtp',
			'smtp_host' => 'smtp.gmail.com', // atau smptp lainnya                
			'smtp_user' => 'admin_workspace@sbh.ac.id',  // Email gmail admin aplikasi
			'smtp_pass'   => 'pbiksimkrbtwwhfe',  // Password Gmail atau Sandi Aplikasi Gmail
			'smtp_crypto' => 'ssl',
			'smtp_port'   => 465,
			'crlf'    => "\r\n",
			'newline' => "\r\n"

		];
		$this->load->library('email', $config);
		$this->email->initialize($config);
		$this->email->from('admin_workspace@sbh.ac.id', 'STIKes Bogor Husada');
		$this->email->to($this->input->post('email'));

		if ($type == 'verify') {
			$this->email->subject('Account Verification');
			$this->email->message('Click this link to verify you account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
		} else if ($type == 'forgot') {
			$this->email->subject('Reset Password');
			$this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
		}

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}
	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

			if ($user_token) {
				if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
					$this->db->set('is_active', 1);
					$this->db->where('email', $email);
					$this->db->update('user');
					$this->db->delete('user_token', ['email' => $email]);
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' Telah Sukses ! Silahkan login.</div>');
					redirect('auth');
				} else {
					$this->db->delete('user', ['email' => $email]);
					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun Aktivasi Gagal! Token Kadaluarsa.</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun Aktivasi Gagal!  Tokden salah</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun Aktivasi Gagal!  Email salah.</div>');
			redirect('auth');
		}
	}
	public function blocked()
	{
		$this->load->view('auth/blocked');
	}


	public function forgotpassword()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Lupa Password';
			$this->template->load('templates/auth', 'auth/lupa_password', $data);
		} else {
			$email = $this->input->post('email');
			$user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

			if ($user) {
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $email,
					'token' => $token,
					'date_created' => time()
				];
				$this->db->insert('user_token', $user_token);
				$this->_sendEmail($token, 'forgot');
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Please check your email to reset your password!</div>');
				redirect('auth/forgotpassword');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered or activated!</div>');
				redirect('auth/forgotpassword');
			}
		}
	}
	public function resetPassword()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

			if ($user_token) {
				$this->session->set_userdata('reset_email', $email);
				$this->changePassword();
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong token.</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong email.</div>');
			redirect('auth');
		}
	}

	public function changePassword()
	{


		if (!$this->session->userdata('reset_email')) {
			redirect('auth/ganti_password');
		}

		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Change Password';
			$this->template->load('templates/auth', 'auth/ganti_password', $data);
		} else {
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');
			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('user');
			$this->session->unset_userdata('reset_email');
			$this->db->delete('user_token', ['email' => $email]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been changed! Please login.</div>');
			redirect('auth');
		}
	}
}
