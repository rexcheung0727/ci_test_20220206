<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id')) {
			redirect('login');
		}
		$this->load->model('product_model');
		$this->load->model('product_list_model');

	}

	function index()
	{
		$products = $this->product_model->get_all();
		$this->load->view('front/product/list', array('products' => $products));
	}

	function product($id)
	{
		$product = $this->product_model->get($id);
		$user_id = $this->session->userdata('id');
		$product_list = $this->product_list_model->get_by_user_and_product($user_id, $id);
		$this->load->view('front/product/detail', array('product' => $product, 'product_list' => $product_list));
	}

	function add()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('user_id', 'user id', 'required|numeric');
		$this->form_validation->set_rules('product_id', 'product id', 'required|numeric');
		$this->form_validation->set_rules('price', 'Price', 'required|numeric');
		$this->form_validation->set_rules('qty', 'Quantity', 'required|numeric');

		if($this->form_validation->run()) {
			$data = array(
				'user_id'  => $this->input->post('user_id'),
				'product_id'  => $this->input->post('product_id'),
				'qty' => $this->input->post('qty'),
				'price' => $this->input->post('price'),
			);

			$this->product_list_model->upsert($data);
			$this->session->set_flashdata('message', 'Product was added to your list');
			redirect('/home');
		} else {
//			redirect()->back();
			$this->product($this->input->post('product_id'));
		}
	}
}

