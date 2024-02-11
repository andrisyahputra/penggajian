<?php
class PenggajianModel extends CI_Model
{

	public function get_data($table)
	{
		return $this->db->get($table);
	}
	public function insert($data, $table)
	{
		return $this->db->insert($table, $data);
	}
	public function update($data, $where, $table)
	{
		return $this->db->update($table, $data, $where);
	}
	public function delete($where, $table)
	{
		$this->db->query($where);
		$this->db->delete($table, $where);
	}
	public function insert_batch($table, $data)
	{
		$jumlah = count($data);
		if ($jumlah > 0) {
			$this->db->insert_batch($table, $data);
		}
	}
	public function cek_login($username, $password)
	{
		$result = $this->db->where('username', $username)
			->where('password', md5($password))
			->limit(1)
			->get('data_pegawai');

		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return false;
		}
	}
}
