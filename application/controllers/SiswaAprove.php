<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SiswaAprove extends CI_Controller
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
		$data['title'] = "Data siswa yang disetujui";
		$data['siswa'] = $this->admin->viewVerfikasi();
		$this->template->load('templates/dashboard', 'pendaftaran/data_siswa_approve', $data);
	}
}
