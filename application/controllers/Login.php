<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('username')) {
      redirect("/admin/store");
    }
	}

	public function index()
	{
		$this->load->view('page/login');
		$username = xss_clean($this->input->post('username'));
		$password = xss_clean($this->input->post('password'));

		$admin = $this->admin_model->login($username, $password);

		if($admin != false){
			$this->session->set_userdata('username', $username);
			redirect('/admin/store');
		}else{
			echo "Wrong username or password";
		}
	}
}
