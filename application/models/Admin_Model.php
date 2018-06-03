<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Model extends CI_Model {

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
}
