<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product_list_model extends CI_Model {

	public function insert($data) {
		$this->db->insert('product_list', $data);
		return $this->db->insert_id();
	}

	public function update($id, $data) {
		$this->db->where('id', $id);
		return $this->db->update('product_list', $data);
	}

	public function delete($id) {
		$query = $this->db->select('*')->from('product_list')->where('id', $id)->limit(1)->get();
		if($query->num_rows() < 1) {
			// exception handling
		}

		$this->db->delete('product_list', array('id' => $id));
	}

	public function get($id) {
		$query = $this->db->select('*')->from('product_list')->where('id', $id)->limit(1)->get();
		return $query->row();
	}

	public function get_all() {
		$query = $this->db->select('*')->get('product_list');
		return $query->result();
	}

	public function get_by_user_and_product($user_id, $product_id) {
		$query = $this->db->get_where('product_list',
			array('user_id' => $user_id, 'product_id' => $product_id)
		);
		return $query->row();
	}

	public function upsert($data) {
		$query = $this->db->get_where('product_list',
			array('user_id' => $data['user_id'], 'product_id' => $data['product_id'])
		);
		if($query->num_rows() < 1) {
			return $this->insert($data);
		} else {
			$id = ($query->row())->id;
			$this->db->where('id', $id);
			return $this->db->update('product_list', $data);
		}
	}

	public function count_attached_active_products()
	{
		$sql = "SELECT SUM(qty) amount
				FROM product_list pl 
				LEFT JOIN products p ON pl.product_id = p.id
				WHERE p.status = 1
		";
		return $this->db->query($sql)->row();
	}

}
