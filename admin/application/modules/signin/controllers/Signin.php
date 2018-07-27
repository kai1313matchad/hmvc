<?php
class Signin extends MX_Controller
{
  function __construct()
  {
  	parent::__construct();
  }
  public function index()
  {
    $this->load->module('templates_');
    $data['view_module'] = 'signin';
    $data['view_content'] = 'login';
    $data['view_addoncss'] = array('login_css');
    // $data['view_addonjs'] = array('dash_js');
    $this->templates_->signin($data);
  }
  public function login()
  {
    
  }
}