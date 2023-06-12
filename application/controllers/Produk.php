<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('data');
	}
	public function index()
	{

		if (!isset($_GET['stat'])) {
			$data['produk'] = $this->data->read('produk', '*', 'null')->result();
		} else {
			$data['produk'] = $this->data->read('produk', '*', ['status' => $_GET['stat']])->result();
		}
		$this->load->view('produk',$data);
	}

	function add()
	{
		if ($this->data->add('produk', $_POST)) {
			echo 'true';
		} else {
			echo 'false';
		};
	}

	function getdata()
	{
		$id = $_POST['id_produk'];
		$data = $this->data->read('produk', '*', ['id_produk' => $id], 'null', 'null');

		echo json_encode($data->row());
	}

	function delete()
	{
		$this->db->where($_POST);
		if ($this->db->delete('produk')) {
			echo 'true';
		};
	}

	function edit()
	{
		$id = $_POST['id_produk'];
		unset($_POST['id_produk']);
		if ($this->data->update('produk', ['id_produk' => $id], $_POST)) {
			echo 'true';
		} else {
			echo 'false';
		}
	}
}
