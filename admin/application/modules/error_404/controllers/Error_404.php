<?php
class Error_404 extends MX_Controller
{
  function __construct()
  {
  	parent::__construct();
  }
  public function index()
  {
    $this->load->view('404');
      // $this->load->module('templates_');
      // $data['view_module'] = 'error_404';
      // $data['view_content'] = '404';
      // $data['view_addoncss'] = array('404_css');
      // $data['view_addoncustjs'] = array('404_js');
      // $this->templates_->admin($data);
  }
}