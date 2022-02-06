<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product_model extends CI_Model {

	public function insert($product) {
		$this->db->insert('products', $product);
		return $this->db->insert_id();
	}

	public function update($id, $product) {
		$this->db->where('id', $id);
		return $this->db->update('products', $product);
	}

	public function delete($id) {
		$query = $this->db->select('*')->from('products')->where('id', $id)->limit(1)->get();
		if($query->num_rows() < 1) {
			// exception handling
		}

		$this->db->delete('products', array('id' => $id));
	}

	public function get($id) {
		$query = $this->db->select('*')->from('products')->where('id', $id)->limit(1)->get();
		return $query->row();
	}

	public function get_all() {
		$query = $this->db->select('*')->get('products');
		return $query->result();
	}

}
