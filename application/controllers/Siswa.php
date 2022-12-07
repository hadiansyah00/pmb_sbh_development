<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
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
		$data['title'] = "Data Siswa yang Daftar";
		$data['sw'] = $this->admin->viewSiswa();
		$data['siswa'] = $this->admin->viewDaftar();
		$data['tahun'] = $this->admin->getAktif()->row_array();
		$this->template->load('templates/dashboard', 'pendaftaran/data_siswa', $data);
	}

	public function AktivasiSiswa($getId)
	{

		$id = encode_php_tags($getId);
		//reset status tahun akademik
		$status = array('sts_verfikasi' => 0);
		$this->db->update('pendaftaran', $status);

		//Set aktif tahun akademik
		$where = array('id_daftar' => $id);
		$data = array('status_siswa' => 3);

		$this->db->update('pendaftaran', $data, $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>

				Data
				<strong class="green">
					Siswa Telah Aktip
				</strong>
			</div>'
		);
		redirect('siswa');
	}
	public function TolakSiswa($getId)
	{

		$id = encode_php_tags($getId);
		//reset status tahun akademik
		$status = array('sts_verfikasi' => 0);
		$this->db->update('pendaftaran', $status);

		//Set aktif tahun akademik
		$where = array('id_daftar' => $id);
		$data = array('status_siswa' => 4);

		$this->db->update('pendaftaran', $data, $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>

				Data
				<strong class="green">
					Tahun Akademik Telah Aktif!
				</strong>
			</div>'
		);
		redirect('siswa');
	}
	public function views($getId)
	{

		$id = encode_php_tags($getId);


		$data['title'] = "View Data Siswa";
		$data['siswa'] = $this->admin->showDaftar($id)->row_array();
		// $data['siswa'] = $this->admin->showDaftar('pendaftaran', ['id_daftar' => $id]);
		$this->template->load('templates/dashboard', 'pendaftaran/view', $data);
	}
}
