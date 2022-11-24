<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AsetModel extends CI_Model
{
	public function getAset()
	{
		$this->db->select('*');
		$this->db->from('aset');
		$this->db->join('satuan', 'satuan.id = aset.satuan_id');
		$this->db->join('jenis', 'jenis.id = aset.jenis_id');

		$query = $this->db->query();
		return $query->result();
	}
}
