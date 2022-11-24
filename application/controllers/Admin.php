<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	

	private function _has_login()
	{
		if ($this->session->has_userdata('login_session')) {
			redirect('admin/dashboardadmin');
		}
	}

	public function index()
	{
		$this->_has_login();

		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login Admin PMB STIKes Bogor Husada';
			$this->template->load('templates/auth', 'auth/login_admin', $data);
		} else {
			$input = $this->input->post(null, true);

			$cek_username = $this->auth->cek_username($input['username']);
			if ($cek_username > 0) {
				$password = $this->auth->get_password($input['username']);
				if (password_verify($input['password'], $password)) {
					$user_db = $this->auth->userdata($input['username']);
					if ($user_db['is_active'] != 1) {
						set_pesan('akun anda belum aktif/dinonaktifkan. Silahkan hubungi admin.', false);
						redirect('Admin');
					} else {
						$userdata = [
							'user'  => $user_db['id_user'],
							'role'  => $user_db['role'],
							'timestamp' => time()
						];
						$this->session->set_userdata('login_session', $userdata);
						redirect('admin/dashboardadmin');
					}
				} else {
					set_pesan('password salah', false);
					redirect('admin');
				}
			} else {
				set_pesan('username belum terdaftar', false);
				redirect('admin');
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('login_session');

		set_pesan('anda telah berhasil logout');
		redirect('auth');
	}

	public function blocked()
	{
		$this->load->view('auth/blocked');
	}


}
