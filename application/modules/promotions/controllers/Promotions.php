<?php
class Promotions extends MX_Controller
{
  function __construct()
  {
  	parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }
  
  public function index()
  {
  	$this->load->module('templates_');
  	$data['view_module'] = 'promotions';
  	$data['view_content'] = 'promotion';
    $data['view_addoncss'] = array('promotion_css');
    $data['view_addonjs'] = array('promotion_js');
    $data['read_city'] = [
      ["CITY_ID" => "31", "NAME" => "Jakarta", "IMAGE" => "jakarta.jpg"],
      ["CITY_ID" => "3578", "NAME" => "Surabaya", "IMAGE" => "surabaya.jpg"],
      ["CITY_ID" => "3573", "NAME" => "Malang", "IMAGE" => "malang.jpg"],
      ["CITY_ID" => "5171", "NAME" => "Denpasar", "IMAGE" => "bali.jpg"],
      ["CITY_ID" => "3273", "NAME" => "Bandung", "IMAGE" => "bandung.jpg"],
      ["CITY_ID" => "3271", "NAME" => "Bogor", "IMAGE" => "bogor.jpg"],
      ["CITY_ID" => "3471", "NAME" => "Yogyakarta", "IMAGE" => "yogyakarta.jpg"],
      ["CITY_ID" => "7171", "NAME" => "Manado", "IMAGE" => "manado.jpg"],
    ]; 
  	$this->templates_->shop($data);
  }

  public function read()
  {
    $this->load->model('Promotions_model', 'modelPromotions');
    $this->load->module('templates_');

    $city = $this->input->get('city');
    $limit = $this->input->get('limit');
    $page = $this->input->get('page');
    $data['read_city'] = [
      ["CITY_ID" => "31", "NAME" => "Jakarta", "IMAGE" => "jakarta.jpg"],
      ["CITY_ID" => "3578", "NAME" => "Surabaya", "IMAGE" => "surabaya.jpg"],
      ["CITY_ID" => "3573", "NAME" => "Malang", "IMAGE" => "malang.jpg"],
      ["CITY_ID" => "5171", "NAME" => "Denpasar", "IMAGE" => "bali.jpg"],
      ["CITY_ID" => "3273", "NAME" => "Bandung", "IMAGE" => "bandung.jpg"],
      ["CITY_ID" => "3271", "NAME" => "Bogor", "IMAGE" => "bogor.jpg"],
      ["CITY_ID" => "3471", "NAME" => "Yogyakarta", "IMAGE" => "yogyakarta.jpg"],
      ["CITY_ID" => "7171", "NAME" => "Manado", "IMAGE" => "manado.jpg"],
    ]; 
    $total_data = $this->modelPromotions->countData();
    // echo $total_data;die;
  	$data['view_module'] = 'promotions';
  	$data['view_content'] = 'promotion_data';
    $data['view_addoncss'] = array('promotion_css');
    $data['view_addonjs'] = array('promotion_js');

    $page_count = ceil($total_data / $limit);
    $page_active = (isset($page)) ? $page : 1;
    $page_first = ($limit * $page_active) - $limit;

    $data['city'] = $city;
    $data['page_count'] = $page_count;
    $data['page_active'] = $page_active;
    $data['page_limit'] = $limit;
    $data['read_promotion'] = $this->modelPromotions->readData($limit, $page_first); 
    $this->templates_->shop($data);
  }
}