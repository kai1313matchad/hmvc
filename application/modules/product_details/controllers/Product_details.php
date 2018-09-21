<?php
class Product_details extends MX_Controller
{
  function __construct()
  {
  	parent::__construct();
  }
  public function index()
  {
    // $slug = ($this->uri->segment(2))?$this->uri->segment(2):NULL;
    // var_dump($slug);
  	$this->load->module('templates_');
  	$data['view_module'] = 'product_details';
  	$data['view_content'] = 'product_details';
    $data['view_addoncss'] = array('product_details_css');
    $data['view_addonjs'] = array('product_details_js');
    $data['view_addoncustjs'] = array('product_custjs');
  	$this->templates_->shop($data);
  }
}