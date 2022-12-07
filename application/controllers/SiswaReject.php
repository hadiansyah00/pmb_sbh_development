<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SiswaReject extends CI_Controller
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
		$data['title'] = "Data siswa yang ditolak";
		$data['siswa'] = $this->admin->viewReject();
		$data['tahun'] = $this->admin->getAktif()->row_array();
		$this->template->load('templates/dashboard', 'pendaftaran/data_siswa_reject', $data);
	}
}
