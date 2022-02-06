<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller {

	private $api_key = "ca59a6a0208e90731934eeded0494ed9"; // assume this api key is stored in db or env file

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
		$this->load->helper('curl_helper');
		$this->load->model('user_model');
		$this->load->model('product_model');
		$this->load->model('product_list_model');

		$count_all = $this->user_model->count_all_users();
		$count_active= $this->user_model->count_active_users();

		$count_active_having_product_list = $this->user_model->count_active_users_having_product_list()->count;
		$count_active_products = $this->product_model->count_active_products();

		$count_active_products_not_belong_to_any_user = $this->product_model->count_active_products_not_belong_to_any_user()->count;

		$caap = $this->product_list_model->count_attached_active_products();
		$count_attached_active_products = $caap->amount ? $caap->amount : 0;

		$tpaap = $this->product_list_model->total_price_attached_active_products();
		$total_price_attached_active_products = $tpaap->total ? $tpaap->total : 0;

		$total_price_attached_active_products_per_user = $this->product_list_model->total_price_attached_active_products_per_user();

		$url = "http://api.exchangeratesapi.io/v1/latest?access_key=".$this->api_key
			."&symbols=USD,RON";
		$curl_data = json_decode(curl_get($url));
//		var_dump($curl_data);
//		exit;
		$data = array(
			'count_all' => $count_all,
			'count_active' => $count_active,
			'count_active_having_product_list' => $count_active_having_product_list,
			'count_active_products' => $count_active_products,
			'count_active_products_not_belong_to_any_user' => $count_active_products_not_belong_to_any_user,
			'count_attached_active_products' => $count_attached_active_products,
			'total_price_attached_active_products' => $total_price_attached_active_products,
			'total_price_attached_active_products_per_user' => $total_price_attached_active_products_per_user,
			'exchange_rates' => $curl_data
		);
		$this->load->view('admin/dashboard', $data);
	}
}

