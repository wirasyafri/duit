<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {

	public function get_data()
	{
		$this->db->select('*');
		$this->db->from('tb_transaksi');
		$this->db->order_by('id', 'DESC');

		return $this->db->get();
	}
	public function simpan($data)
	{
		return $this->db->insert('tb_transaksi', $data);
	}

	public function edit_data($id)
	{
		return $this->db->where('id', $id)->get('tb_transaksi')->row();
	}

	public function update_transaksi($data, $id)
	{
		return $this->db->update('tb_transaksi', $data, $id);
	}

	public function hapus_transaksi($id_mhs)
	{
		return $this->db->delete('tb_transaksi', $id_mhs);
	}
}