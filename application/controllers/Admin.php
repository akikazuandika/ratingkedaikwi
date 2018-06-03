<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    isLoggedIn();
  }

  public function logout()
  {
    session_destroy();
    redirect("/admin");
  }

	public function index()
	{
		$this->load->view('welcome_message');
	}

  public function store()
  {
    $page = 0;
    $perPage = 5;

    if($this->input->get("page")){
      $page = (int) $this->input->get("page") - 1;
    }

    if($this->input->get("per-page")){
      $perPage = (int) $this->input->get("per-page");
    }

    $data['stores'] = $this->store_model->getAll($page, $perPage);

    if($data['stores'] == false){
        echo "<a href='". base_url("/admin/store/add") ."'>Add</a><br>";
       die("Data kosong");
    };

    $rateProduct;
    $rateService;
    for ($i=0; $i < count($data['stores']); $i++) {
        if($this->rate_model->getRateProduct($data['stores'][$i]['id_store']) != false){
            $rateProduct[$i] = $this->rate_model->getRateProduct($data['stores'][$i]['id_store']);
        }else{
            $rateProduct[$i] = array('value' => 0);
        }

        if($this->rate_model->getRateService($data['stores'][$i]['id_store']) != false){
            $rateService[$i] = $this->rate_model->getRateService($data['stores'][$i]['id_store']);
        }else{
            $rateService[$i] = array('value' => 0);
        }

    }

    $rateProductFinal = array();
    for ($i=0; $i < count($rateProduct); $i++) {
        for ($a=0; $a < count($rateProduct[$i]); $a++) {
              $rateProductFinal[$i]['value'] += $rateProduct[$i][$a]['value'];
        }
        $data['stores'][$i]['rating_product'] = $rateProductFinal[$i]['value'] / count($rateProduct[$i]);
    }

    $rateServiceFinal = array();
    for ($i=0; $i < count($rateService); $i++) {
        for ($a=0; $a < count($rateService[$i]); $a++) {
              $rateServiceFinal[$i]['value'] += $rateService[$i][$a]['value'];
        }
        $data['stores'][$i]['rating_service'] = $rateServiceFinal[$i]['value'] / count($rateService[$i]);
    }

    $this->load->view('page/store', $data);
  }

  public function getStoreById()
  {
    $id = $this->uri->segment(4);
    $store = $this->store_model->getOne($id)[0];
    $rateProduct = $this->rate_model->getRateProduct($id);
    $rateService = $this->rate_model->getRateService($id);

    $rateProductFinal = array('value' => 0);
    for ($i=0; $i < count($rateProduct); $i++) {
        $rateProductFinal['value'] += $rateProduct[$i]['value'];
        $rateProductFinal['comment'][$i] = $rateProduct[$i]['comment'];
    }

    $rateProductFinal['value'] = $rateProductFinal['value'] / count($rateProduct);

    $rateServiceFinal = array('value' => 0);
    for ($i=0; $i < count($rateService); $i++) {
        $rateServiceFinal['value'] += $rateService[$i]['value'];
        $rateServiceFinal['comment'][$i] = $rateService[$i]['comment'];
    }

    $rateServiceFinal['value'] = $rateServiceFinal['value'] / count($rateService);

    $data = array('detail' => $store,
                  'rating_product' => $rateProductFinal,
                  'rating_service' => $rateServiceFinal
                  );

    $this->load->view('page/storeid', $data);
  }

  public function addStore()
  {
    $name = xss_clean($this->input->post("store_name"));
    $location = xss_clean($this->input->post("store_location"));
    $image = xss_clean($this->input->post("image"));

    if($this->input->post("btnSave") != null){
        $data = array('store_name' => $name, "store_location" => $location);
        if($image != ""){
          $data['image'] = $image;
        }
        $edit = $this->store_model->add($data);

        if($edit == true){
          redirect("/admin/store");
        }else{
          echo "Failed";
        }
    }

    $this->load->view("page/editStore", $data);
  }

  public function editStore()
  {
    $id = $this->uri->segment(4);

    $name = xss_clean($this->input->post("store_name"));
    $location = xss_clean($this->input->post("store_location"));
    $image = xss_clean($this->input->post("image"));

    $data['store'] = $this->store_model->getOne($id)[0];

    if($this->input->post("btnSave") != null){
        $data = array('store_name' => $name, "store_location" => $location);
        if($image != ""){
          $data['image'] = $image;
        }
        $edit = $this->store_model->edit($id, $data);

        if($edit == true){
          redirect("/admin/store");
        }else{
          echo "Failed";
        }
    }

    $this->load->view("page/editStore", $data);
  }

  public function deleteStore()
  {
    $id = $this->uri->segment(4);
    $delete = $this->store_model->delete($id);
    if($delete == true){
        redirect("/admin/store");
    }else{
        echo "Failed";
    }

  }
}
