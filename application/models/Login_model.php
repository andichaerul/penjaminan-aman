<?php
class Login_model extends CI_Model
{

	public function auth($username, $password)
	{
		$data = $this->db->query("
			SELECT *,users.id AS userId
			FROM users 
			JOIN user_profile ON user_profile.id_user = users.id
			WHERE username = '{$username}' 
			AND password = '{$password}'
			");
		if ($data->num_rows() > 0) {
			$this->setSession($data);
		} else {
			$this->responseLoginFail();
		}
	}

	private function responseLoginSuccess()
	{
		header('Content-Type: application/json; charset=utf-8');
		$data = [
			"login" => "success",
		];
		echo json_encode($data);
	}

	private function responseLoginFail()
	{
		header('Content-Type: application/json; charset=utf-8');
		$data = [
			"login" => "fail",
		];
		echo json_encode($data);
	}

	private function setSession($profile)
	{
		$setSession = [
			'username'  => $profile->row("username"),
			'nama_lengkap'  => $profile->row("nama_lengkap"),
			'level'  => $profile->row("level"),
			'id_user'  => $profile->row("userId"),
			'login' => "login"
		];
		$this->session->set_userdata($setSession);
		$this->responseLoginSuccess();
	}
}
