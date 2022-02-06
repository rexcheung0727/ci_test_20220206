<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id')) {
			redirect('login');
		} else {
			if(!$this->session->userdata('is_admin')) {
				redirect('login');
			}
		}

	}

	function index()
	{
		$this->load->model('user_model');
		$count_all = $this->user_model->count_all_users();
		$count_active= $this->user_model->count_active_users();

		$data = array(
			'count_all' => $count_all,
			'count_active' => $count_active,
		);
		$this->load->view('admin/dashboard', $data);
	}
}

