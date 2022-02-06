<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id')) {
			redirect('login');
		} else {
			if(!$this->session->userdata('is_admin')) {
				redirect('login');
			}
		}
		$this->load->model('product_model');
		$this->load->helper('date');
	}

	function index()
	{
		$products = $this->product_model->get_all();
		$this->load->view('admin/product/index', array('products' => $products));
	}

	function create()
	{
		$this->load->view('admin/product/create');
	}

	function edit($id)
	{
		$product = $this->product_model->get($id);
		$this->load->view('admin/product/edit', array('product' => $product));
	}

	function store()
	{
		$this->load->library('form_validation');
		$config = array(
			'upload_path' => "./uploads/",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'overwrite' => TRUE,
			'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_height' => "768",
			'max_width' => "1024"
		);
		$this->load->library('upload', $config);
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');

		if ($this->form_validation->run()) {
			// if image exists, store image in uploads folder then save the image name
			$filename = 'default.png';
			if(! $this->upload->do_upload('image')) {
				$errors = array('error' => $this->upload->display_errors());
			} else {
				$upload_data = $this->upload->data();
				$filename = $upload_data['file_name'];
			}

			$product = array (
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'status' => 1, // default active
				'image' => $filename
			);

			$this->product_model->insert($product);
		} else {
			$this->create();
		}

		redirect('/product');
	}

	public function update($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');

		$config = array(
			'upload_path' => "./uploads/",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'overwrite' => TRUE,
			'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_height' => "768",
			'max_width' => "1024"
		);
		$this->load->library('upload', $config);

		if ($this->form_validation->run()) {
			$old_data = $this->product_model->get($id);
			// if image exists, store image in uploads folder then save the image name
			$product = array (
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
			);

			if(! $this->upload->do_upload('image')) {
				$errors = array('error' => $this->upload->display_errors());
			} else {
				$old_image = $old_data->image;

				//remove old image
				if($old_image !== 'default.png') {
					unlink("uploads/".$old_image);
				}
				$upload_data = $this->upload->data();
				$filename = $upload_data['file_name'];
				$product['image'] = $filename;
			}

			$now = date('Y-m-d H:i:s');
			$product['updated_at'] = $now;
			$this->product_model->update($id, $product);
		} else {
			$errors = $this->form_validation->error_array();
			$this->session->set_flashdata('errors', $errors);
			redirect(base_url('product/edit/'. $id));
		}

		redirect('/product');
	}

	public function show($id) {
		$product = $this->product_model->get($id);
		$this->load->view('admin/product/show',array('product' => $product));
	}

	public function delete($id)
	{
		// remove image
		$old_data = $this->product_model->get($id);
		$old_image = $old_data->image;
		if($old_image !== 'default.png') {
			unlink("uploads/".$old_image);
		}

		$this->product_model->delete($id);
		redirect('/product');
	}

	public function status($id, $status)
	{
		$status = $status == 'enable' ? 1 : 0;
		$now = date('Y-m-d H:i:s');
		$data = array(
			'status' => $status,
			'updated_at' => $now
		);
		$this->product_model->update($id, $data);
		redirect('/product');
	}
}
