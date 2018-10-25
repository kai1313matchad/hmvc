<?php
class Aboutus extends MX_Controller
{
  function __construct()
  {
  	parent::__construct();
    $this->load->model('Aboutus_model');
  }

  public function index()
  {
  	$this->load->module('templates_');

  	$data['view_module'] = 'aboutus';
  	$data['view_content'] = 'aboutus';
    $data['view_addoncss'] = array('aboutus_css');
    $data['view_addonjs'] = array('aboutus_js');
    $data['view_addoncustjs'] = array('aboutus_custjs');
    // $data['story'] = $this->Aboutus_model->read('mona_store');
  	$this->templates_->shop($data);
  }

  public function readStory()
  {
    $data = $this->db->get('mona_store')->result();
    echo json_encode($data);
  }
}