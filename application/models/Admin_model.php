<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
	public function get($table, $data = null, $where = null)
	{
		if ($data != null) {
			return $this->db->get_where($table, $data)->row_array();
		} else {
			return $this->db->get_where($table, $where)->result_array();
		}
	}

	public function update($table, $pk, $id, $data)
	{
		$this->db->where($pk, $id);
		return $this->db->update($table, $data);
	}

	public function insert($table, $data, $batch = false)
	{
		return $batch ? $this->db->insert_batch($table, $data) : $this->db->insert($table, $data);
	}

	public function delete($table, $pk, $id)
	{
		return $this->db->delete($table, [$pk => $id]);
	}

	public function getUsers($id)
	{
		/**
		 * ID disini adalah untuk data yang tidak ingin ditampilkan. 
		 * Maksud saya disini adalah 
		 * tidak ingin menampilkan data user yang digunakan, 
		 * pada managemen data user
		 */
		$this->db->where('id_user !=', $id);
		return $this->db->get('user')->result_array();
	}

	public function getBarang()
	{
		$this->db->join('jenis j', 'b.jenis_id = j.id_jenis');
		$this->db->join('satuan s', 'b.satuan_id = s.id_satuan');
		$this->db->join('gudang g', 'b.gudang_id = g.id_gudang');
		$this->db->order_by('id_barang');
		return $this->db->get('barang b')->result_array();
	}
	public function getUser2()
	{

		return $this->db->get('user')->result_array();
	}
	public function getAset()

	{
		$this->db->join('jenis j', 'a.jenis_id = j.id_jenis');
		$this->db->join('satuan s', 'a.satuan_id = s.id_satuan');
		$this->db->join('gudang g ', 'a.gudang_id = g.id_gudang');
		$this->db->join('status st', 'a.status_id = st.id_status');
		return $this->db->get('aset a')->result_array();
	}

	public function getBiodata()

	{
		$this->db->join('periode_pmb p', 'u.periode_id = p.id_periode');
		return $this->db->get('user u')->result_array();
	}


	public function getBarangMasuk($limit = null, $id_barang = null, $range = null)
	{
		$this->db->select('*');
		$this->db->join('user u', 'bm.user_id = u.id_user');
		$this->db->join('supplier sp', 'bm.supplier_id = sp.id_supplier');
		$this->db->join('barang b', 'bm.barang_id = b.id_barang');
		$this->db->join('satuan s', 'b.satuan_id = s.id_satuan');
		if ($limit != null) {
			$this->db->limit($limit);
		}

		if ($id_barang != null) {
			$this->db->where('id_barang', $id_barang);
		}

		if ($range != null) {
			$this->db->where('tanggal_masuk' . ' >=', $range['mulai']);
			$this->db->where('tanggal_masuk' . ' <=', $range['akhir']);
		}

		$this->db->order_by('id_barang_masuk', 'DESC');
		return $this->db->get('barang_masuk bm')->result_array();
	}

	public function getDaftar($limit = null, $id_daftar = null)
	{
		$userId = $this->session->userdata('login_session')['user'];
		$this->db->select('*');

		$this->db->join('user u', 'p.user_id = u.id_user');
		$this->db->join('agama a', 'p.agama_id = a.id_agama');
		$this->db->join('provinsi i', 'p.provinsi_id = i.id_provinsi');
		$this->db->join('kecamatan n', 'p.kecamatan_id = n.id_kecamatan');
		$this->db->join('kabupaten k', 'p.kabupaten_id = k.id_kabupaten');
		$this->db->join('prodi o', 'p.jurusan_id = o.id_jurusan');
		$this->db->join('tbl_penghasilan e', 'p.penghasilan_id = e.id_penghasilan');
		$this->db->join('jurs_asal ju', 'p.jurs_id_asal = ju.id_jurs_asal_sek');

		if ($limit != null) {
			$this->db->limit($limit);
		}
		if ($id_daftar != null) {
			$this->db->where('id_daftar', $id_daftar);
		}

		$this->db->where('id_user', $userId);
		$this->db->order_by('user_id', 'DESC');
		return $this->db->get('pendaftaran p')->result_array();
	}

	public function getBarangKeluar($limit = null, $id_barang = null, $range = null)
	{
		$this->db->select('*');
		$this->db->join('user u', 'bk.user_id = u.id_user');
		$this->db->join('barang b', 'bk.barang_id = b.id_barang');
		$this->db->join('satuan s', 'b.satuan_id = s.id_satuan');
		if ($limit != null) {
			$this->db->limit($limit);
		}
		if ($id_barang != null) {
			$this->db->where('id_barang', $id_barang);
		}
		if ($range != null) {
			$this->db->where('tanggal_keluar' . ' >=', $range['mulai']);
			$this->db->where('tanggal_keluar' . ' <=', $range['akhir']);
		}
		$this->db->order_by('id_barang_keluar', 'DESC');
		return $this->db->get('barang_keluar bk')->result_array();
	}

	public function getMax($table, $field, $kode = null)
	{
		$this->db->select_max($field);
		if ($kode != null) {
			$this->db->like($field, $kode, 'after');
		}
		return $this->db->get($table)->row_array()[$field];
	}

	public function count($table)
	{
		return $this->db->count_all($table);
	}

	public function sum($table, $field)
	{
		$this->db->select_sum($field);
		return $this->db->get($table)->row_array()[$field];
	}

	public function min($table, $field, $min)
	{
		$field = $field . ' <=';
		$this->db->where($field, $min);
		return $this->db->get($table)->result_array();
	}

	public function chartBarangMasuk($bulan)
	{
		$like = 'T-BM-' . date('y') . $bulan;
		$this->db->like('id_barang_masuk', $like, 'after');
		return count($this->db->get('barang_masuk')->result_array());
	}

	public function chartBarangKeluar($bulan)
	{
		$like = 'T-BK-' . date('y') . $bulan;
		$this->db->like('id_barang_keluar', $like, 'after');
		return count($this->db->get('barang_keluar')->result_array());
	}

	public function laporan($table, $mulai, $akhir)
	{
		$tgl = $table == 'barang_masuk' ? 'tanggal_masuk' : 'tanggal_keluar';
		$this->db->where($tgl . ' >=', $mulai);
		$this->db->where($tgl . ' <=', $akhir);
		return $this->db->get($table)->result_array();
	}

	public function cekStok($id)
	{
		$this->db->join('satuan s', 'b.satuan_id=s.id_satuan');
		return $this->db->get_where('barang b', ['id_barang' => $id])->row_array();
	}
	function get_periode($periode_id)
	{
		$query = $this->db->get_where('periode', array('periode_periode_id' => $periode_id));
		return $query;
	}

	public function getAktif()
	{
		$data = "SELECT *FROM ta WHERE status_ta = 1";
		return $this->db->query($data);
	}
	function viewBerkas()
	{
		$hasil = $this->db->query("SELECT * FROM berkas");
		return $hasil;
	}

	function simpanBerkas($id_berkas, $file_berkas, $keterangan)
	{
		$hasil = $this->db->query("INSERT INTO berkas (id_berkas,file_berkas,keterangan) 
		VALUES ('$id_berkas','$file_berkas','$keterangan')");
		return $hasil;
	}
	public function getProvinsi()
	{
		$hasil = $this->db->query("SELECT * FROM provinsi");
		return $hasil;
	}


	function get_all_provinsi()
	{
		$this->db->select('*');
		$this->db->from('provinsi');
		$query = $this->db->get();

		return $query->result();
	}
	// public function getKabupaten($id_provinsi)
	// {

	// 	$this->db->select('*');
	// 	$this->db->join('provinsi p', 'k.id_provinsi = p.id_provinsi');
	// 	$this->db->where('k.id_provinsi', $id_provinsi);
	// 	return $this->db->get('kabupaten k')->result_array();
	// 	// return $this->db->table('kabupaten')
	// 	// 	->where('id_provinsi', $id_provinsi)
	// 	// 	->get()
	// 	// 	->getResultArray();
	// }

	// public function getKecamatan($id_kabupaten)
	// {
	// 	$this->db->select('*');
	// 	$this->db->join('provinsi p', 'c.id_provinsi = p.id_provinsi');
	// 	$this->db->join('kabupaten k', 'c.id_kabupaten = k.id_kabupaten');
	// 	$this->db->where('c.id_kabupaten', $id_kabupaten);
	// 	return $this->db->get('kecamatan c')->result_array();
	// 	// return $this->db->table('kecamatan')
	// 	// 	->where('id_kabupaten', $id_kabupaten)
	// 	// 	->get()
	// 	// 	->getResultArray();
	// }
}
