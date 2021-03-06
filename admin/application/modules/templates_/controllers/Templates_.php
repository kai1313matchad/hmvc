<?php
class Templates_ extends MX_Controller
{
  function __construct()
  {
  	parent::__construct();
  }
  public function shop($data)
  {
    $data['basic_css'] = TRUE;
    $data['shop_css'] = TRUE;
    $data['module'] = $data['view_module'];
    $data['content'] = $data['view_content'];
    $data['addon_css'] = array();
    if(isset($data['view_addoncss']))
    {
      $data['addon_css'] = $data['view_addoncss'];
    }
    $data['addon_js'] = array();
    if(isset($data['view_addonjs']))
    {
      $data['addon_js'] = $data['view_addonjs'];
    }
    if(isset($data['view_addoncustjs']))
    {
      $data['addon_custjs'] = $data['view_addoncustjs'];
    }
  	$this->load->view('baseshop',$data);
  }
  public function admin($data)
  {
    $data['basic_css'] = TRUE;
    $data['admin_css'] = TRUE;
    $data['module'] = $data['view_module'];
    $data['content'] = $data['view_content'];
    $data['addon_css'] = array();
    if(isset($data['view_addoncss']))
    {
      $data['addon_css'] = $data['view_addoncss'];
    }
    $data['addon_js'] = array();
    if(isset($data['view_addonjs']))
    {
      $data['addon_js'] = $data['view_addonjs'];
    }
    if(isset($data['view_addoncustjs']))
    {
      $data['addon_custjs'] = $data['view_addoncustjs'];
    }
    $this->load->view('baseadmin',$data);
  }
  public function signin($data)
  {
    $data['basic_css'] = TRUE;
    $data['admin_css'] = TRUE;
    $data['module'] = $data['view_module'];
    $data['content'] = $data['view_content'];
    $data['addon_css'] = array();
    if(isset($data['view_addoncss']))
    {
      $data['addon_css'] = $data['view_addoncss'];
    }
    $data['addon_js'] = array();
    if(isset($data['view_addonjs']))
    {
      $data['addon_js'] = $data['view_addonjs'];
    }
    if(isset($data['view_addoncustjs']))
    {
      $data['addon_custjs'] = $data['view_addoncustjs'];
    }
    $this->load->view('loginform',$data);
  }
  public function basic_css()
  {
  	$this->load->view('basic_css');
  }
  public function shop_css()
  {
    $this->load->view('shop_css');
  }
}