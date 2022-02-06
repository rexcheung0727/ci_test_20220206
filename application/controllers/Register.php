<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

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
		$this->load->view('pages/register');
	}

	function validation()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run()) {
			$activation_code = md5(rand());
			$encrypted_password = $this->encryption->encrypt($this->input->post('password'));
			$data = array(
				'username'  => $this->input->post('username'),
				'email'  => $this->input->post('email'),
				'password' => $encrypted_password,
				'activation_code' => $activation_code,
				'is_admin' => FALSE,
				'status' => 1, // default 1 - active
				'verified' => FALSE,
			);

			$id = $this->user_model->insert($data);
			if($id > 0) {
				$config = array(
					'protocol' => 'smtp',
					'smtp_host' => 'mail.s1531.sureserver.com',
					'smtp_port' => 465,
					'smtp_crypto' => 'ssl',
					'smtp_user' => 'no-reply@ebook.esmart.org.hk',
					'smtp_pass' => 'fechk2021',
					'mailtype' => 'html',
					'charset' => 'utf-8',
					'crlf' => "\r\n",
					'newline' => "\r\n",
					'starttls' => TRUE,
					'validation' => TRUE
				);
				$message = 	"
						<html>
						<head>
							<title>Verification Code</title>
						</head>
						<body>
							<h2>Thank you for Registeration.</h2>
							<p>Please click the link below to activate your account. <a href='".base_url()."register/verify_email/".$activation_code."'>link</a>.</p>
						</body>
						</html>
						";
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				$this->email->from($config['smtp_user']);
				$this->email->to($this->input->post('email'));
				$this->email->subject('Signup Verification Email');
				$this->email->message($message);

				if($this->email->send()) {
					$this->session->set_flashdata('message', 'Check in your email for email verification mail');
					redirect('register');
				}
			}
		} else {
			$this->index();
		}
	}

	function verify_email()
	{
		if($this->uri->segment(3)) {
			$verification_key = $this->uri->segment(3);
			if($this->user_model->verify_email($verification_key)) {
				$data['message'] = '<h1>Your Email has been successfully verified, now you can login from <a href="'.base_url().'login">here</a></h1>';
			} else {
				$data['message'] = '<h1>Invalid Link</h1>';
			}
			$this->load->view('pages/email_verification', $data);
		}
	}

}

?>
