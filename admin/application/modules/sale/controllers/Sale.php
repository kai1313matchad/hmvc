<?php
class Sale extends MX_Controller
{
  function __construct()
  {
  	parent::__construct();
  }
  public function index()
  {
  	$this->load->module('templates_');
  	$data['view_module'] = 'sale';
  	$data['view_content'] = 'sale';
    $data['view_addoncss'] = array('sale_css');
    $data['view_addonjs'] = array('sale_js');
  	$this->templates_->shop($data);
  }
}