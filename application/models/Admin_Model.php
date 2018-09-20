<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function login($username, $password)
	{
      $this->db->from('admin');
      $this->db->select('name, username');
      $this->db->where('username', $username);
      $this->db->where('password', $password);
      $results = $this->db->get();

      if($results->num_rows() > 0){
        return $results->result_array();
      }else{
        return false;
      }
	}

  public function getOne($username)
  {
    $this->db->from('customer');
    $this->db->select('name, username');
    $this->db->where('username', $username);
    $results = $this->db->get();

    if($results->num_rows() > 0){
      return $results->result_array();
    }else{
      return false;
    }
  }

	public function getPass($username)
  {
    $this->db->from('admin');
    $this->db->select('password');
    $this->db->where('username', $username);
    $results = $this->db->get();

    if($results->num_rows() > 0){
      return $results->result_array();
    }else{
      return false;
    }
  }

	public function settings($username)
	{
		$this->db->from('admin');
    $this->db->select('name, username, password, email, photo');
    $this->db->where('username', $username);
    $results = $this->db->get();

    if($results->num_rows() > 0){
      return $results->result_array();
    }else{
      return false;
    }
	}

	public function changePass($username, $password)
	{
		$this->db->where("username", $username);
		$this->db->set("password", $password);

		$update = $this->db->update("admin");
		if($update == true){
				return true;
		}else{
				return $this->db->error();
		}
	}
}
