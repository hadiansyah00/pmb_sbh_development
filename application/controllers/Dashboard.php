<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_login();

		$this->load->model('Admin_model', 'admin');
	}

	public function index()
	{
		$data['title'] = "Dashboard";
		$data['daftar'] = $this->admin->getDaftar();
		$data['siswa'] = $this->admin->get('pendaftaran');
		$data['tahun'] = $this->admin->getAktif()->row_array();
		$this->template->load('templates/dashboard', 'dashboard', $data);
	}
}
