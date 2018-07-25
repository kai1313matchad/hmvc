<?php
class Under_maintenance extends MX_Controller
{
  function __construct()
  {
    parent::__construct();
  }
  public function index()
  {
    $this->load->module('templates_');
    $data['view_module'] = 'under_maintenance';
    $data['view_content'] = 'undmnt';
    $data['view_addoncss'] = array('undmnt_css');
    $data['view_addoncustjs'] = array('undmnt_js');
    $this->templates_->shop($data);
  }
}