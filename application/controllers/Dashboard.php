<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('login') != "login") {
			redirect('login', 'refresh');
		}
		$this->load->model("dashboard_model");
	}

	public function index()
	{
		$data["title"] = "Dashboard";
		$data["content"] = "dashboard_staf";
		$data["amount"] = [
			"menunggu" =>  number_format($menunggu = $this->dashboard_model->amount(1)),
			"disetujui" =>  number_format($disetujui = $this->dashboard_model->amount(2)),
			"ditolak" =>  number_format($ditolak = $this->dashboard_model->amount(3)),
			"total" => number_format($menunggu + $disetujui + $ditolak),
		];
		$data["list"] = $this->dashboard_model->list();
		$this->load->view('layout/main', $data);
	}
}
