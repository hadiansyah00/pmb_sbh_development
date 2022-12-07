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
		$data['title'] = "";
		$data['siswa'] = $this->admin->getDaftar();
		$this->template->load('templates/dashboard', 'status/data', $data);
	}

	private function _validasi()
	{
		$this->form_validation->set_rules('status', 'Nama Status', 'required|trim');
	}
}
