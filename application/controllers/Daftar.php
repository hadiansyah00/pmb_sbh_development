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
		$this->form_validation->set_rules('jk', 'Jenis Kelamin ', 'required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'tanggal Lahir', 'required');
		$this->form_validation->set_rules('agama_id', 'agama ', 'required');


		$this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required');
		$this->form_validation->set_rules('no_telp_ibu', 'No Telp Ibu', 'required');
		$this->form_validation->set_rules('penghasilan_id', 'Penghasilan ', 'required');
		$this->form_validation->set_rules('tempat_lahir_ibu', 'Tempat Lahir Ibu', 'required');
		$this->form_validation->set_rules('alamat_ibu', 'Alamat Ibu / Wali', 'required');

		$this->form_validation->set_rules('kelas', 'Kelas', 'required');
		$this->form_validation->set_rules('sts_pendaftaran', 'Status ', 'required');
		$this->form_validation->set_rules('asal_sekolah', 'Asal Sekolah ', 'required');
		$this->form_validation->set_rules('jenis_sekolah', 'Jenis Sekolah ', 'required');
		$this->form_validation->set_rules('jurs_id_asal', 'Jurusan Asal Sekolah ', 'required');
		$this->form_validation->set_rules('jurusan_id', 'Program Study ', 'required');

		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('provinsi_id', 'Provinsi ', 'required');
		$this->form_validation->set_rules('kecamatan_id', 'Kecamatan ', 'required');
		$this->form_validation->set_rules('kabupaten_id', 'Kabupaten ', 'required');
	}
	public function add()
	{
		$this->_validasi();
		if ($this->form_validation->run() == false) {
			$data['title'] = "";
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
			$data['jurs_asal'] = $this->admin->get('jurs_asal');
			$data['penghasilan'] = $this->admin->get('tbl_penghasilan');
			$data['siswa'] = $this->admin->getDaftar();
			$this->template->load('templates/dashboard', 'pendaftaran/add', $data);
		} else {

			$input = $this->input->post(null, true);
			$input['status_siswa']        = '2';

			$input['tgl_insert']          = date('y-m-d');
			$insert = $this->admin->insert('pendaftaran', $input);

			if ($insert) {
				set_pesan('data berhasil disimpan.');
				redirect('dashboard');
			} else {
				set_pesan_danger('Opps ada kesalahan!');
				redirect('daftar/add');
			}
		}
	}



	public function edit($getId)
	{
		$id = encode_php_tags($getId);
		$this->_validasi();

		if ($this->form_validation->run() == false) {
			$data['title'] = "";
			$data['agama'] = $this->admin->get('agama');
			$data['prodi'] = $this->admin->get('prodi');
			$data['provinsi'] = $this->admin->get('provinsi');
			$data['kabupaten'] = $this->admin->get('kabupaten');
			$data['kecamatan'] = $this->admin->get('kecamatan');
			$data['jurs_asal'] = $this->admin->get('jurs_asal');
			$data['penghasilan'] = $this->admin->get('tbl_penghasilan');
			$data['sw'] = $this->admin->showDaftar($id)->row_array();
			$data['siswa'] = $this->admin->get('pendaftaran', ['id_daftar' => $id]);
			$this->template->load('templates/dashboard', 'status/edit', $data);
		} else {
			$input = $this->input->post(null, true);
			$update = $this->admin->update('pendaftaran', 'id_daftar', $id, $input);
			if ($update) {
				set_pesan('data berhasil disimpan');
				redirect('status');
			} else {
				set_pesan('data gagal disimpan', false);
				redirect('status/edit');
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
		redirect('status');
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
