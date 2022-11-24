<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Status extends CI_Controller
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
		$data['title'] = "Type";
		$data['status'] = $this->admin->get('status');
		$this->template->load('templates/dashboard', 'status/data', $data);
	}

	private function _validasi()
	{
		$this->form_validation->set_rules('status', 'Nama Status', 'required|trim');
	}

	public function add()
	{
		$this->_validasi();

		if ($this->form_validation->run() == false) {
			$data['title'] = "Type";
			$this->template->load('templates/dashboard', 'status/add', $data);
		} else {
			$input = $this->input->post(null, true);
			$insert = $this->admin->insert('status', $input);
			if ($insert) {
				set_pesan('data berhasil disimpan');
				redirect('status');
			} else {
				set_pesan('data gagal disimpan', false);
				redirect('status/add');
			}
		}
	}

	public function edit($getId)
	{
		$id = encode_php_tags($getId);
		$this->_validasi();

		if ($this->form_validation->run() == false) {
			$data['title'] = "Type";
			$data['status'] = $this->admin->get('status', ['id_status' => $id]);
			$this->template->load('templates/dashboard', 'status/edit', $data);
		} else {
			$input = $this->input->post(null, true);
			$update = $this->admin->update('status', 'id_status', $id, $input);
			if ($update) {
				set_pesan('data berhasil disimpan');
				redirect('status');
			} else {
				set_pesan('data gagal disimpan', false);
				redirect('status/add');
			}
		}
	}

	public function delete($getId)
	{
		$id = encode_php_tags($getId);
		if ($this->admin->delete('status', 'id_status', $id)) {
			set_pesan('data berhasil dihapus.');
		} else {
			set_pesan('data gagal dihapus.', false);
		}
		redirect('status');
	}
}
