<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function index()
	{
		$this->load->model('M_transaksi');

		$data = array(
			'transaksi' => $this->M_transaksi->get_data()
		);

		$this->load->view('data_transaksi', $data);
	}

	public function tambah()
	{
		$this->load->view('tambah_transaksi');
	}

	public function simpan()
	{
		$this->load->model('M_transaksi');

		$data = array(
			// 'nim' => $this->input->post('nim'),
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'kode' => $this->input->post('kode'),
			'nominal' => str_replace('.','',$this->input->post('nominal')),
			'bayar' => str_replace('.','',$this->input->post('bayar')),
			'tanggal' => date('Y/m/d',strtotime($this->input->post('tanggal'))),
			'keterangan' => $this->input->post('keterangan'),
			// 'alamat' => $this->input->post('alamat')
		);

		$mhs = $this->M_transaksi->simpan($data);

		if($mhs){
			echo "Data Berhasil Disimpan!";
			redirect("transaksi");
		}else{
			echo "Data Gagal Disimpan!";
		}

	}

	public function edit($id)
	{
		$this->load->model('M_transaksi');

		$data = array(
			'transaksi' => $this->M_transaksi->edit_data($id)
		);
		

		$this->load->view('edit_transaksi', $data);
	}

	public function update()
	{
		$this->load->model('M_transaksi');

		$id['id'] = $this->input->post("id");

		$data = array(
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'kode' => $this->input->post('kode'),
			'nominal' => str_replace('.','',$this->input->post('nominal')),
			'bayar' => str_replace('.','',$this->input->post('bayar')),
			'tanggal' => date('Y/m/d',strtotime($this->input->post('tanggal'))),
			'keterangan' => $this->input->post('keterangan'),
		);
		// print_r($data);

		$mhs = $this->M_transaksi->update_transaksi($data, $id);

		if($mhs){
			echo "Data Berhasil Diupdate!";
			redirect('transaksi');
		}else{
			echo "Data Gagal diupdate!";
		}
	}

	public function hapus($id)
	{
		$this->load->model('M_transaksi');

		$id_mhs['id'] = $id;

		$mhs = $this->M_transaksi->hapus_transaksi($id_mhs);

		if($mhs){
			echo "Data Berhasil Dihapus!";
			redirect('transaksi');
		}else{
			echo "Data Gagal Dihapus!";
		}
	}
}
