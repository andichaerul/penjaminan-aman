<?php
class user_notifikasi_model extends CI_Model
{
	public function get()
	{
		$id_user = $this->session->userdata('id_user');
		$data = $this->db->query("SELECT * FROM pengajuan_budget WHERE user_id ='{$id_user}' AND dilihat ='0' AND `status` IN ('2','3')");
		return $data;
	}
}
