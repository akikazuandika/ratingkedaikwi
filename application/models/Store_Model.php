<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store_Model extends CI_Model {

  public function getOne($id)
  {
    $this->db->from('store');
    $this->db->select('*');
    $this->db->where('id_store', $id);
    $results = $this->db->get();

    if($results->num_rows() > 0){
      return $results->result_array();
    }else{
      return false;
    }
  }

  public function getAll($page, $perPage)
  {
    $this->db->from('store');
    $this->db->select('*');
    $this->db->limit( $perPage, $page);
    $results = $this->db->get();

    if($results->num_rows() > 0){
      return $results->result_array();
    }else{
      return false;
    }
  }

  public function add($data)
  {
    $query = $this->db->insert("store",$data);

    if($query == true){
      return true;
    }else{
      return false;
    }
  }

  public function edit($id, $data)
  {
    $this->db->where('id_store', $id);
    $this->db->set($data);
    $query = $this->db->update("store");

    if($query == true){
      return true;
    }else{
      return false;
    }
  }

  public function delete($id)
  {
    $this->db->where('id_store', $id);
    $query = $this->db->delete("store");

    if($query == true){
      $this->db->where('id_store', $id);
      $query2 = $this->db->delete("rating_product");
      $this->db->where('id_store', $id);
      $query3 = $this->db->delete("rating_service");
      return true;
    }else{
      return false;
    }
  }
}
