<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model {

	public function login($telp, $password)
	{
      $this->db->from('customer');
      $this->db->select('name, telp');
      $this->db->where('telp', $telp);
      $this->db->where('password', $password);
      $results = $this->db->get();

      if($results->num_rows() > 0){
        return $results->result_array();
      }else{
        return false;
      }
	}

	public function getPass($telp)
  {
    $this->db->from('customer');
    $this->db->select('password');
    $this->db->where('telp', $telp);
    $results = $this->db->get();

    if($results->num_rows() > 0){
      return $results->result_array();
    }else{
      return false;
    }
  }

  public function register($password, $name, $telp)
	{
      $data = array('name' => $name,
                    'password' => $password,
										'telp' => $telp);
      $query = $this->db->insert('customer', $data);

      if($query == true){
        return true;
      }else{
        return $this->db->error();
      }
	}

  public function getOne($telp)
  {
    $this->db->from('customer');
    $this->db->select('name, telp');
    $this->db->where('telp', $telp);
    $results = $this->db->get();

    if($results->num_rows() > 0){
      return $results->result_array();
    }else{
      return false;
    }
  }
}
