<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('id'))
		{
			redirect('home');
		}
		$this->load->library('form_validation');
		$this->load->library('encryption');
		$this->load->model('user_model');
	}

	function index()
	{
		$this->load->view('pages/login');
	}

	function validation()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run()) {

			$result = $this->user_model->can_login($this->input->post('email'), $this->input->post('password'));
			
			if($result === TRUE) {
				if($this->session->userdata('is_admin')) {
					redirect('admin');
				} else {
					redirect('home');
				}
			} else {
				$this->session->set_flashdata('message', $result);
				$this->index();
			}
		} else {
			redirect('login');
		}
	}

}

?>
