<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tahunakademik extends CI_Controller
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
		$data['ta'] = $this->admin->get('ta');
		$this->template->load('templates/dashboard', 'ta/data', $data);
	}

	private function _validasi()
	{
		$this->form_validation->set_rules('ta', 'Nama ta', 'required|trim');
	}

	public function add()
	{
		$this->_validasi();

		if ($this->form_validation->run() == false) {
			$data['title'] = "";
			$this->template->load('templates/dashboard', 'ta/add', $data);
		} else {
			// $input = $this->input->post('status_ta', 0);
			$input = $this->input->post(null, true);
			$insert = $this->admin->insert('ta', $input);
			if ($insert) {
				set_pesan('data berhasil disimpan');
				redirect('tahunakademik');
			} else {
				set_pesan('data gagal disimpan', false);
				redirect('tahunakademik/add');
			}
		}
	}

	public function edit($getId)
	{
		$id = encode_php_tags($getId);
		$this->_validasi();

		if ($this->form_validation->run() == false) {
			$data['title'] = "";
			$data['ta'] = $this->admin->get('ta', ['id_ta' => $id]);
			$this->template->load('templates/dashboard', 'ta/edit', $data);
		} else {
			$input = $this->input->post(null, true);
			$update = $this->admin->update('ta', 'id_ta', $id, $input);
			if ($update) {
				set_pesan('data berhasil disimpan');
				redirect('tahunakademik');
			} else {
				set_pesan('data gagal disimpan', false);
				redirect('tahunakademik/add');
			}
		}
	}

	public function delete($getId)
	{
		$id = encode_php_tags($getId);
		if ($this->admin->delete('ta', 'id_ta', $id)) {
			set_pesan('data berhasil dihapus.');
		} else {
			set_pesan('data gagal dihapus.', false);
		}
		redirect('tahunakademik');
	}

	public function setTa($getId)
	{
		$id = encode_php_tags($getId);
		//reset status tahun akademik
		$status = array('status_ta' => 0);
		$this->db->update('ta', $status);

		//Set aktif tahun akademik
		$where = array('id_ta' => $id);
		$data = array('status_ta' => 1);

		$this->db->update('ta', $data, $where);
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
		redirect('tahunakademik');
	}
}
