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

		$username = xss_clean($this->input->post('username'));
		$password = xss_clean($this->input->post('password'));
		$submit = xss_clean($this->input->post('btnSubmit'));

		if (isset($_POST['btnSubmit'])) {
			
			$passDb = $this->admin_model->getPass($username);

			if(verifyPassword($password, $passDb[0]['password']) == true){
				$admin = $this->admin_model->settings($username);
				$this->session->set_userdata('username', $username);
				$this->session->set_userdata('name', $admin[0]['name']);
				redirect('/admin/store');
			}else{
				echo "Wrong username or password";
			}
		}




		$this->load->view('admin/login');
	}
}
