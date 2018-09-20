<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rate_model extends CI_Model {

  public function rateProduct($id_store, $telp, $value, $comment)
  {
    $data = array('id_store' => $id_store,
                'telp' => $telp,
                'value' => $value,
                'comment' => $comment);

    $this->db->where("id_store", $id_store);
    $this->db->where("telp", $telp);
    $this->db->from("rating_product");
    $isRated = $this->db->get();

    //If user has rated store update value and comment
    if($isRated->num_rows() > 0){

        $this->db->where("id_store", $id_store);
        $this->db->where("telp", $telp);
        $this->db->set("value", $value);
        $this->db->set("comment", $comment);

        $update = $this->db->update("rating_product");

        if($update == true){
            return true;
        }else{
            return $this->db->error();
        }

    }else{
        $query = $this->db->insert('rating_product', $data);

        if($query == true){
            $this->db->where('id_store', $id_store);
            $this->db->set('count_rating_product', 'count_rating_product+1', false);
            $query2 = $this->db->update('store');

            if($query2 == true){
                $this->db->where('telp', $telp);
                $this->db->set('point', 'point+1', false);
                $query3 = $this->db->update('customer');

                if($query3 == true){
                    return true;
                }else{
                    return $this->db->error();
                }

            }else{
                return $this->db->error();
            }

        }else{
            return $this->db->error();
        }
    }

  }

  public function rateService($id_store, $telp, $value, $comment)
  {
    $data = array(  'id_store' => $id_store,
                    'telp' => $telp,
                    'value' => $value,
                    'comment' => $comment);
    $this->db->where("id_store", $id_store);
    $this->db->where("telp", $telp);
    $this->db->from("rating_service");
    $isRated = $this->db->get();

    if($isRated->num_rows() > 0){
        $this->db->where("id_store", $id_store);
        $this->db->where("telp", $telp);
        $this->db->set("value", $value);
        $this->db->set("comment", $comment);

        $update = $this->db->update("rating_service");

        if($update == true){
            return true;
        }else{
            return $this->db->error();
        }
    }else{
        $query = $this->db->insert('rating_service', $data);

        if($query == true){
            $this->db->where('id_store', $id_store);
            $this->db->set('count_rating_service', 'count_rating_service+1', false);
            $query2 = $this->db->update('store');

            if($query2 == true){   
                $this->db->where('telp', $telp);
                $this->db->set('point', 'point+1', false);
                $query3 = $this->db->update('customer');

        if($query3 == true){
            return true;
            }else{
                    return $this->db->error();
            }

            }else{
                return $this->db->error();
            }
        }else{
            return $this->db->error();
        }
    }
  }

  public function getRateProduct($id)
  {
    $this->db->from('rating_product');
    $this->db->select('value, comment');
    $this->db->where("id_store", $id);
    $query = $this->db->get();

    if($query->num_rows() > 0){
      return $query->result_array();
    }else{
      return false;
    }
  }

  public function getRateService($id)
  {
    $this->db->from('rating_service');
    $this->db->select('value, comment');
    $this->db->where("id_store", $id);
    $query = $this->db->get();

    if($query->num_rows() > 0){
      return $query->result_array();
    }else{
      return false;
    }
  }
}
