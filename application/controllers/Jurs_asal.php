<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurs_asal extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_login();

		$this->load->model('Admin_model', 'admin');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = "Jurusan Asal Sekolah";
		$data['jurs_asal'] = $this->admin->get('jurs_asal');
		$this->template->load('templates/dashboard', 'jurs_asal/data', $data);
	}

	private function _validasi()
	{
		$this->form_validation->set_rules('jurs_asal', 'Nama Jurusan Asal Sekolah', 'required|trim');
	}

	public function add()
	{
		$this->_validasi();

		if ($this->form_validation->run() == false) {
			$data['title'] = "Tambah Jurusan Asal Sekolah";
			$this->template->load('templates/dashboard', 'jurs_asal/add', $data);
		} else {
			$input = $this->input->post(null, true);
			$insert = $this->admin->insert('jurs_asal', $input);
			if ($insert) {
				set_pesan('data berhasil disimpan');
				redirect('jurs_asal');
			} else {
				set_pesan('data gagal disimpan', false);
				redirect('jurs_asal/add');
			}
		}
	}

	public function edit($getId)
	{
		$id = encode_php_tags($getId);
		$this->_validasi();

		if ($this->form_validation->run() == false) {
			$data['title'] = "Edit Agama";
			$data['jurs_asal'] = $this->admin->get('jurs_asal', ['id_jurs_asal_sek' => $id]);
			$this->template->load('templates/dashboard', 'jurs_asal/edit', $data);
		} else {
			$input = $this->input->post(null, true);
			$update = $this->admin->update('jurs_asal', 'id_jurs_asal_sek', $id, $input);
			if ($update) {
				set_pesan('data berhasil disimpan');
				redirect('jurs_asal');
			} else {
				set_pesan_danger('data gagal disimpan', false);
				redirect('jurs_asal/add');
			}
		}
	}

	public function delete($getId)
	{
		$id = encode_php_tags($getId);
		if ($this->admin->delete('jurs_asal', 'id_jurs_asal_sek', $id)) {
			set_pesan('data berhasil dihapus.');
		} else {
			set_pesan_danger('data gagal dihapus.', false);
		}
		redirect('jurs_asal');
	}
}
