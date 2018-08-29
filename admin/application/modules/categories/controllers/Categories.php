<?php
class Categories extends MX_Controller
{
  function __construct()
  {
  	parent::__construct();
  }
  public function billboard()
  {
  	$this->load->module('templates_');
  	$data['view_module'] = 'categories';
  	$data['view_content'] = 'billboard';
    $data['view_addoncss'] = array('categories_css');
    $data['view_addonjs'] = array('categories_js');
    $data['view_addoncustjs'] = array('billboard_custjs');
  	$this->templates_->admin($data);
  }
}