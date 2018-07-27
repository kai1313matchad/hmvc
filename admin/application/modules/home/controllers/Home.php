<?php
class Home extends MX_Controller
{
  function __construct()
  {
  	parent::__construct();
  }
  public function index()
  {
  	$this->load->module('templates_');
  	$data['view_module'] = 'home';
  	$data['view_content'] = 'home';
    $data['view_addoncss'] = array('home_css');
    $data['view_addonjs'] = array('home_js');
  	$this->templates_->shop($data);
  }
}