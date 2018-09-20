<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$response = json_encode(array('success' => 'true', 'message' => 'System running'));
		$this->output
			->set_content_type('application/json')
			->set_status_header(200)
			->set_output($response);
	}

	public function login()
	{
		$telp = xss_clean($this->input->post('telp'));
		$password = xss_clean($this->input->post('password'));
		$passDb = $this->customer_model->getPass($telp)[0]['password'];
		if(verifyPassword($password, $passDb) != false){
				$data = $this->customer_model->getOne($telp);
				$response = json_encode(array('success' => 'true', 'results' => $data[0]));
				$this->output
					->set_content_type('application/json')
					->set_status_header(200)
					->set_output($response);
		}else{
			$response = json_encode(array('success' => 'false', 'message' => "Wrong username or password"));
			$this->output
				->set_content_type('application/json')
				->set_status_header(401)
				->set_output($response);
		}
  	}

  	public function register()
	{
	    $password = xss_clean($this->input->post('password'));
	    $name = xss_clean($this->input->post('name'));
		$telp = xss_clean($this->input->post('telp'));

		$isRegisteredPhone = $this->customer_model->getOne($telp);

		$encPassword = genPassword($password);

	    if($isRegisteredPhone == false){
		      	$register = $this->customer_model->register($encPassword, $name, $telp);
		      	if($register == true){
					$response = json_encode(array('success' => 'true', 'message' => "Success"));
					$this->output
						->set_content_type('application/json')
						->set_status_header(200)
						->set_output($response);
			    }else{
					$response = json_encode(array('success' => 'false', 'message' => "Failed"));
					$this->output
						->set_content_type('application/json')
						->set_status_header(400)
						->set_output($response);
			    }

		}else if($isRegisteredPhone != false){

		$response = json_encode(array('success' => 'false', 'message' => "Phone has been registered. Use another phone number"));
			$this->output
				->set_content_type('application/json')
				->set_status_header(400)
				->set_output($response);
		}
  }

	public function getStoreById()
	{
		$id = $this->uri->segment(4);
		$store = $this->store_model->getOne($id);
		if($store != false){
			$response = json_encode(array('success' => 'true', 'results' => $store[0]));
			$this->output
				->set_content_type('application/json')
				->set_status_header(200)
				->set_output($response);
		}else{
			$response = json_encode(array('success' => 'false', 'message' => 'Store not found'));
			$this->output
				->set_content_type('application/json')
				->set_status_header(404)
				->set_output($response);
		}
	}

	public function rate()
	{
		$res;
		$id_store = xss_clean($this->input->post('id_store'));
		$telp = xss_clean($this->input->post('telp'));
		$value = xss_clean($this->input->post('value'));
		$comment = xss_clean($this->input->post('comment'));
		$typeRate = xss_clean($this->input->post('type_rate'));
		
		if($typeRate == "rating_product"){
				$res = $this->rate_model->rateProduct($id_store, $telp, $value, $comment);
		}else if($typeRate == "rating_service"){
				$res = $this->rate_model->rateService($id_store, $telp, $value, $comment);
		}

		if($id_store == "" || $telp == "" || $value == "" || $comment == "" || $typeRate == ""){
			$response = json_encode(array('success' => 'false', 'message' => 'Invalid input'));
			$this->output
				->set_content_type('application/json')
				->set_status_header(400)
				->set_output($response);
		}else{
			if($res != null && $res == true){
				$response = json_encode(array('success' => 'true', 'message' => "Store rated"));
				$this->output
					->set_content_type('application/json')
					->set_status_header(200)
					->set_output($response);
			}else{
				$response = json_encode(array('success' => 'false', 'message' => 'Failed'));
				$this->output
					->set_content_type('application/json')
					->set_status_header(500)
					->set_output($response);
			}
		}
	}

	public function store()
	{
		$page = $this->input->get('page');
		$perPage = $this->input->get('per-page');
		$store = $this->store_model->getAll($page, $perPage);
		if($store != false){
			$response = json_encode(array('success' => 'true', 'results' => $store));
			$this->output
				->set_content_type('application/json')
				->set_status_header(200)
				->set_output($response);
		}else{
			$response = json_encode(array('success' => 'false', 'message' => 'Failed'));
			$this->output
				->set_content_type('application/json')
				->set_status_header(500)
				->set_output($response);
		}
	}
}
