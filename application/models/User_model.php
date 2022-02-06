<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model {

	public function insert($user) {
		$this->db->insert('users', $user);
		return $this->db->insert_id();
	}

	public function update($id, $user) {
		$this->db->where('id', $id);
		return $this->db->update('users', $user);
	}

	public function delete($id) {
		$query = $this->db->select('*')->from('users')->where('id', $id)->limit(1)->get();
		if($query->num_rows() < 1) {
			// exception handling
		}
		$this->db->delete('users', array('id' => $id));
	}

	public function get($id) {
		$query = $this->db->select('*')->from('users')->where('id', $id)->limit(1)->get();
		if($query->num_rows() < 1) {
			// exception handling
		}
		return $query->row_array();
	}

	public function get_all() {
		$query = $this->db->select('*')->get('users');
		return $query->result_array();
	}

	function verify_email($key)
	{
		$this->db->where('activation_code', $key);
		$this->db->where('verified', 0);
		$query = $this->db->get('users');
		if($query->num_rows() > 0) {
			$data = array(
				'verified'  => 1
			);
			$this->db->where('activation_code', $key);
			$this->db->update('users', $data);
			return true;
		} else {
			return false;
		}
	}

	function can_login($email, $password)
	{
		$this->db->where('email', $email);
		$query = $this->db->get('users');

		if($query->num_rows() > 0) {
			foreach($query->result() as $row) {
				if($row->verified == true) {
					$store_password = $this->encryption->decrypt($row->password);
					if($password == $store_password) {
						$this->session->set_userdata('id', $row->id);
						$this->session->set_userdata('is_admin', $row->is_admin);
						return TRUE;
					} else {
						return 'Wrong Password';
					}
				} else {
					return 'First verified your email address';
				}
			}
		} else {
			return 'Wrong Email Address';
		}
	}

	function count_all_users()
	{
		$this->db->where('is_admin', 0);
		$this->db->from('users');
		return $this->db->count_all_results();
	}

	function count_active_users()
	{
		$this->db->where('is_admin', 0);
		$this->db->where('status', 1);
		$this->db->where('verified', 1);
		$this->db->from('users');
		return $this->db->count_all_results();
	}
}
