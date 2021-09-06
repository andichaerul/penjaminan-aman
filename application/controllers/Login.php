<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("login_model");
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function auth()
	{
		$username = $this->input->post("username");
		$password = md5($this->input->post("password"));
		$this->login_model->auth($username, $password);
	}
}
