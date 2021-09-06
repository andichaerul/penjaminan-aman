<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan_budget extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('login') != "login") {
			redirect('login', 'refresh');
		}
	}

	public function index()
	{
		$data["title"] = "Pengajuan Budget";
		$data["content"] = "pengajuan_budget";
		$this->load->view('layout/main', $data);
	}

	public function simpan()
	{
		$nominal = $this->input->post("nominal");
		$deskripsi = $this->input->post("deskripsi");
		$dataInsert = [
			"user_id" => $this->session->userdata('id_user'),
			"status" => 1,
			"budget_nominal" => $nominal,
			"req_deskripsi" => $deskripsi,
			"tgl" => date("Y-m-d"),
		];
		$this->db->insert('pengajuan_budget', $dataInsert);
		header('Content-Type: application/json; charset=utf-8');
		$data = [
			"status" => "success",
		];
		echo json_encode($data);
	}
}
