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
		$this->load->view('admin/dashboard');
	}
}

