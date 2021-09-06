<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_notifikasi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('login') != "login") {
			redirect('login', 'refresh');
		}
		$this->load->model("user_notifikasi_model");
	}

	public function index()
	{
		$data = $this->user_notifikasi_model->get();
		$notif = [];
		foreach ($data->result() as $row) {
			$user_id = $this->session->userdata('id_user');
			$notif[] = [
				"id" => $row->id,
				"pesan" => ($row->status == "2") ? "Hy, Pengajuan budget dengan no ref " . noSurat($user_id, $row->id, $row->tgl) . " telah disetujui" : "Hy, Pengajuan budget dengan no ref " . noSurat($user_id, $row->id, $row->tgl) . " di tolak karena " . $row->alasan_tolak . "",
			];
		}
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($notif);
	}

	public function view()
	{
		$id = $this->input->get("id");
		$update = [
			"dilihat" => '1'
		];
		$this->db->where('id', $id);
		$this->db->update('pengajuan_budget', $update);
		redirect(base_url("dashboard"), 'refresh');
	}
}
