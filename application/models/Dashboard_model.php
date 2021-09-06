<?php
class Dashboard_model extends CI_Model
{
	public function amount($status)
	{
		$data = $this->db->query("SELECT SUM(budget_nominal) AS budgetNominal FROM pengajuan_budget WHERE status ='{$status}' AND user_id = '{$this->session->userdata("id_user")}' ");
		return $data->row("budgetNominal");
	}

	public function list()
	{
		$userId = $this->session->userdata("id_user");
		$data = $this->db->query("SELECT
		*,
	CASE `status` 
			WHEN '1' THEN 'Menunggu'
			WHEN '2' THEN 'Disetujui'
			WHEN '3' THEN 'Ditolak'
	END AS strStatus
		FROM
			pengajuan_budget 
	WHERE
		user_id = '{$userId}'");
		return $data;
	}
}
