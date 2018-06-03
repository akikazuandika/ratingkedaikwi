<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_Model extends CI_Model {

	public function login($email, $password)
	{
      $this->db->from('customer');
      $this->db->select('name, email, address');
      $this->db->where('email', $email);
      $this->db->where('password', $password);
      $results = $this->db->get();

      if($results->num_rows() > 0){
        return $results->result_array();
      }else{
        return false;
      }
	}

  public function register($email, $password, $name, $address)
	{
      $data = array('name' => $name,
                    'email' => $email,
                    'password' => $password,
                    'address' => $address);
      $query = $this->db->insert('customer', $data);

      if($query == true){
        return true;
      }else{
        return $this->db->error();
      }
	}

  public function getOne($email)
  {
    $this->db->from('customer');
    $this->db->select('name, email, address');
    $this->db->where('email', $email);
    $results = $this->db->get();

    if($results->num_rows() > 0){
      return $results->result_array();
    }else{
      return false;
    }
  }
}
