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
		$level = $this->session->userdata('level');
		switch ($level) {
			case 'staf':
				$this->notifStaf();
				break;
			case 'supervisor':
				$this->notifSupervisor();
				break;
		}
	}

	private function notifStaf()
	{
		$data = $this->user_notifikasi_model->staf();
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

	private function notifSupervisor()
	{
		$data = $this->user_notifikasi_model->supervisor();
		$notif = [];
		foreach ($data->result() as $row) {
			$user_id = $this->session->userdata('id_user');
			$notif[] = [
				"id" => $row->id,
				"pesan" => "Anda memiliki request pengajuan budget no ref " . noSurat($user_id, $row->id, $row->tgl) . "",
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

	public function view_spv()
	{
		$id = $this->input->get("id");
		$update = [
			"dilihat_spv" => '1'
		];
		$this->db->where('id', $id);
		$this->db->update('pengajuan_budget', $update);
		redirect(base_url("dashboard"), 'refresh');
	}
}
