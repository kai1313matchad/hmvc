<?php
class Dashboard extends MX_Controller
{
  function __construct()
  {
  	parent::__construct();
  }
  public function index()
  {
    $this->load->library('users/ion_auth');
    if (!$this->ion_auth->logged_in())
    {
      // redirect them to the login page
      redirect('Signin', 'refresh');
    }
    elseif(!$this->ion_auth->is_admin())
    {
      $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
      redirect('Signin');
    }
  	else
    {
      $this->load->module('templates_');
      $data['view_module'] = 'dashboard';
      $data['view_content'] = 'dash';
      // $data['view_addoncss'] = array('dash_css');
      // $data['view_addonjs'] = array('dash_js');
      $this->templates_->admin($data);
    }
  }
}