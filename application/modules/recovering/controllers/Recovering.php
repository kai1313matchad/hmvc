<?php
class Recovering extends MX_Controller {
  function __construct() {
  	parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }
  
  public function index() {
  	$this->load->module('templates_');
  	$data['view_module'] = 'recovering';
  	$data['view_content'] = 'recovering';
    $data['view_addoncss'] = array('recovering_css');
    $data['view_addonjs'] = array('recovering_js');
  	$this->templates_->shop($data);
  }

  public function read() {
    $this->load->model('Recovering_model', 'modelRecovering');
    $this->load->module('templates_');
    $this->load->helper('text');

    $limit = $this->input->get('limit');
    $page = $this->input->get('page');
    $total_data = $this->modelRecovering->countData();
    // echo $total_data;die;
  	$data['view_module'] = 'recovering';
  	$data['view_content'] = 'recovering_data';
    $data['view_addoncss'] = array('recovering_css');
    $data['view_addonjs'] = array('recovering_js');

    $page_count = ceil($total_data / $limit);
    $page_active = (isset($page)) ? $page : 1;
    $page_first = ($limit * $page_active) - $limit;

    $data['page_count'] = $page_count;
    $data['page_active'] = $page_active;
    $data['page_limit'] = $limit;
    $data['read_recovering'] = $this->modelRecovering->readData($limit, $page_first); 
    $data['read_recovering_recent'] = $this->modelRecovering->readRecent(); 
    $this->templates_->shop($data);
  }

  public function detail() {
    $this->load->model('Recovering_model', 'modelRecovering');
    $this->load->module('templates_');
    $this->load->helper('text');

    $id = $this->input->get('id');

    $data['view_module'] = 'recovering';
  	$data['view_content'] = 'recovering_detail';
    $data['view_addoncss'] = array('recovering_css');
    $data['view_addonjs'] = array('recovering_js');
    $data['read_recovering'] = $this->modelRecovering->readDetail($id);
    $data['read_recovering_recent'] = $this->modelRecovering->readRecent(); 
    $this->templates_->shop($data);
  }
}