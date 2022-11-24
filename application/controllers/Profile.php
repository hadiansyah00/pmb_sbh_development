<?php
error_reporting(0);
?>
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
	protected $user;

	public function __construct()
	{
		parent::__construct();
		cek_login();

		$this->load->model('Admin_model', 'admin');
		$this->load->library('form_validation');

		$userId = $this->session->userdata('login_session')['user'];
		$this->user = $this->admin->get('user', ['id_user' => $userId]);
	}

	public function index()
	{
		$data['title'] = "Biodata";
		$data['user'] = $this->user;
		$data['berkas'] = $this->admin->get('berkas');
		$this->template->load('templates/dashboard', 'profile/user', $data);
	}

	private function _validasi()
	{
		$db = $this->admin->get('user', ['id_user' => $this->input->post('id_user', true)]);
		$username = $this->input->post('username', true);
		$email = $this->input->post('email', true);

		$uniq_username = $db['username'] == $username ? '' : '|is_unique[user.username]';
		$uniq_email = $db['email'] == $email ? '' : '|is_unique[user.email]';

		$this->form_validation->set_rules('username', 'Username', 'required|trim|alpha_numeric' . $uniq_username);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email' . $uniq_email);
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|trim|numeric');
	}

	private function _config()
	{
		$config['upload_path']      = "./assets/img/avatar";
		$config['allowed_types']    = 'gif|jpg|jpeg|png|pdf';
		$config['encrypt_name']     = TRUE;
		$config['max_size']         = '2048';

		$this->load->library('upload', $config);
	}

	public function Biodata()
	{
		$this->_validasi();
		$this->_config();

		if ($this->form_validation->run() == false) {
			$data['title'] = "Biodata";
			$data['periode'] = $this->admin->get('periode_pmb');
			$data['user'] = $this->user;
			$this->template->load('templates/dashboard', 'profile/form_biodata', $data);
		} else {
			$input = $this->input->post(null, true);
			if (empty($_FILES['foto']['name'])) {
				$insert = $this->admin->update('user', 'id_user', $input['id_user'], $input);
				if ($insert) {
					set_pesan('perubahan berhasil disimpan.');
				} else {
					set_pesan_danger('perubahan tidak disimpan.');
				}
				redirect('profile/biodata');
			} else {
				if ($this->upload->do_upload('foto') == false) {
					echo $this->upload->display_errors();
					die;
				} else {
					if (userdata('foto') != 'user.png') {
						$old_image = FCPATH . 'assets/img/avatar/' . userdata('foto');
						if (!unlink($old_image)) {
							set_pesan_danger('gagal hapus foto lama.');
							redirect('profile/setting');
						}
					}

					$input['foto'] = $this->upload->data('file_name');
					$update = $this->admin->update('user', 'id_user', $input['id_user'], $input);
					if ($update) {
						set_pesan('perubahan berhasil disimpan.');
					} else {
						set_pesan_danger('gagal menyimpan perubahan');
					}
					redirect('profile/setting');
				}
			}
		}
	}

	public function ubahpassword()
	{
		$this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim');
		$this->form_validation->set_rules('password_baru', 'Password Baru', 'required|trim|min_length[3]|differs[password_lama]');
		$this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'matches[password_baru]');

		if ($this->form_validation->run() == false) {
			$data['title'] = "Ubah Password";
			$this->template->load('templates/dashboard', 'profile/ubahpassword', $data);
		} else {
			$input = $this->input->post(null, true);
			if (password_verify($input['password_lama'], userdata('password'))) {
				$new_pass = ['password' => password_hash($input['password_baru'], PASSWORD_DEFAULT)];
				$query = $this->admin->update('user', 'id_user', userdata('id_user'), $new_pass);

				if ($query) {
					set_pesan('password berhasil diubah.');
				} else {
					set_pesan('gagal ubah password', false);
				}
			} else {
				set_pesan('password lama salah.', false);
			}
			redirect('profile/ubahpassword');
		}
	}

	function get_periode()
	{
		$periode_id = $this->input->post('id', TRUE);
		// $data = $this->product_model->get($category_id)->result();
		$data['periode'] = $this->admin->get_periode($periode_id)->result();
		echo json_encode($data);
	}
	private function validasi_berkas()
	{
		$this->form_validation->set_rules('nama_berkas', 'Nama Berkas', 'required|trim');
	}
	private function config_berkas()
	{
		$config['upload_path']      = "./assets/img/avatar";
		$config['allowed_types']    = 'pdf';
		$config['encrypt_name']     = TRUE;
		$config['max_size']         = '2048';

		$this->load->library('upload', $config);
	}
	//Upload Berkas
	public function addBerkas()
	{

		$this->_config();

		if ($this->form_validation->run() == false) {
			$data['title'] = "";
			$this->template->load('templates/dashboard', 'profile/add_berkas', $data);
		} else {
			$input = $this->input->post(null, true);
			if (@$_FILES['file_berkas']['name'] != null) {
				if ($this->upload->do_upload('file_berkas')) {
					$input['file_berkas'] = $this->upload->data('file_name');
					$this->admin->insert('berkas', $input);
					if ($this->db->affected_rows() > 0) {
						$this->session->set_flashdata('Succes', 'Data Berhasil Disimpan');
					}
					redirect('berkas');
				} else {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('error', $error);
					redirect('berkas/addBerkas');
				}
			} else {
				$input['file_berkas'] = null;
				$this->admin->insert('berkas', $input);
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('Succes', 'Data Berhasil Disimpan');
					redirect('berkas');
				} else {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('error', $error);
					redirect('berkas/addBerkas');
				}
			}
		}
	}
}
