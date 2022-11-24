<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar extends CI_Controller
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
		$data['title'] = "Form Pendaftaran";
		$data['daftar'] = $this->admin->getDaftar();
		$this->template->load('templates/dashboard', 'pendaftaran/data', $data);
	}
	private function _validasi()
	{
		$this->form_validation->set_rules('nik', 'nik', 'required|trim');
		$this->form_validation->set_rules('nisn', 'nisn ', 'required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'tanggal Lahir', 'required');
		$this->form_validation->set_rules('agama_id', 'agama ', 'required');
	}
	public function add()
	{
		$this->_validasi();
		if ($this->form_validation->run() == false) {
			$data['title'] = "Form Pendaftaran";
			// Mendapatkan dan men-generate kode transaksi barang masuk
			$kode = 'PMB' . date('-dmy');
			$kode_terakhir = $this->admin->getMax('pendaftaran', 'id_daftar', $kode);
			$kode_tambah = substr($kode_terakhir, -5, 5);
			$kode_tambah++;
			$number = str_pad($kode_tambah, 3, '0', STR_PAD_LEFT);
			$data['id_daftar'] = $kode . $number;
			$data['agama'] = $this->admin->get('agama');
			$data['prodi'] = $this->admin->get('prodi');
			$data['provinsi'] = $this->admin->get('provinsi');
			$data['kabupaten'] = $this->admin->get('kabupaten');
			$data['kecamatan'] = $this->admin->get('kecamatan');
			$data['penghasilan'] = $this->admin->get('tbl_penghasilan');
			$this->template->load('templates/dashboard', 'pendaftaran/add', $data);
		} else {

			$input = $this->input->post(null, true);
			// $data = array(
			// 	'id_ta'			=> $a,
			// 	'nik'			=> htmlspecialchars($this->input->post('nik')),
			// 	'nisn'			=> htmlspecialchars($this->input->post('nisn')),
			// 	'jk'			=> htmlspecialchars($this->input->post('jk')),
			// 	'tempat_lahir'	=> htmlspecialchars($this->input->post('tempat_lahir')),
			// 	'id_agama'		=> htmlspecialchars($this->input->post('agama_id'))
			// );
			$insert = $this->admin->insert('pendaftaran', $input);

			if ($insert) {
				set_pesan('data berhasil disimpan.');
				redirect('daftar');
			} else {
				set_pesan_danger('Opps ada kesalahan!');
				redirect('daftar/add');
			}
		}
	}
	public function delete($getId)
	{
		$id = encode_php_tags($getId);
		if ($this->admin->delete('pendaftaran', 'id_daftar', $id)) {
			set_pesan('data berhasil dihapus.');
		} else {
			set_pesan('data gagal dihapus.', false);
		}
		redirect('daftar');
	}
	public function dataKabupaten($id_provinsi)
	{
		$data = $this->admin->get_where('provinsi', $id_provinsi);
		echo '<option value="">--Pilih Kecamatan--</option>';
		foreach ($data as $key => $value) {
			echo '<option value="' . $value['id_kabupaten'] . '">' . $value['nama_kabupaten'] . '</option>';
		}
	}

	public function dataKecamatan($id_kabupaten)
	{
		$data = $this->admin->get_where('kabupaten', $id_kabupaten);
		echo '<option value="">--Pilih Kecamatan--</option>';
		foreach ($data as $key => $value) {
			echo '<option value="' . $value['id_kecamatan'] . '">' . $value['nama_kecamatan'] . '</option>';
		}
	}
}
