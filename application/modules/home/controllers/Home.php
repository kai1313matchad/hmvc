<?php
class Home extends MX_Controller
{
  function __construct()
  {
  	parent::__construct();
  }
  public function index()
  {
    $slug = ($this->uri->segment(1))?$this->uri->segment(1):NULL;
    var_dump($slug);
    if($slug != NULL)
    {
      $get = $this->db->get_where('mona_product',array('prod_short'=>$slug));
      if($get->num_rows()>0)
      {
        redirect('product/details/'.$get->row()->PROD_SLUG);
      }
      else
      {
        redirect('Error_404');
      }
    }
    else
    {
      $this->load->module('templates_');
      $data['view_module'] = 'home';
      $data['view_content'] = 'home';
      $data['view_addoncss'] = array('home_css');
      $data['view_addonjs'] = array('home_js');
      $data['view_addoncustjs'] = array('home_custjs');
      $this->templates_->shop($data);
    }
  }
  public function get_mainbanners()
  {
    $data = $this->db->get('mona_mainbanners')->result();
    echo json_encode($data);
  }
}