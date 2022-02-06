<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller
{
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
		$userid = $this->session->userdata('id');
		echo "<h2>This is admin panel</h2>";
		echo '<br /><br /><br /><h1>Welcome User ['.$userid.']</h1>';
		echo '<p><a href="' . base_url() . 'logout">Logout</a></p>';
	}
}

