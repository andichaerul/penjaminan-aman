<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_profile extends CI_Controller
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
		$data["title"] = "User Profile";
		$data["content"] = "user_profile";
		$this->load->view('layout/main', $data);
	}

	public function simpan()
	{
		$nama_lengkap = $this->input->post("nama_lengkap");
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$c_password = $this->input->post("c_password");

		// validasi cPassword
		if ($password != $c_password) {
			$this->responseFail("password", "Confirm password salah");
		}
		if (empty($password) || empty($c_password)) {
			$this->responseFail("password", "Password tidak boleh kosong");
		}

		$this->db->trans_start();
		$dataUser = [
			'username' => $username,
			'password' => md5($password),
		];
		$this->db->where('id', $this->session->userdata("id_user"));
		$this->db->update('users', $dataUser);

		$dataProfile = [
			'nama_lengkap' => $nama_lengkap
		];
		$this->db->where('id_user', $this->session->userdata("id_user"));
		$this->db->update('user_profile', $dataProfile);
		$this->db->trans_complete();
		$data = [
			"status" => "success",
		];
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($data);
	}

	private function responseFail($label, $pesan)
	{
		$data = [
			"status" => "fail",
			"label" => $label,
			"pesan" => $pesan,
		];
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($data);
		die;
	}
}
