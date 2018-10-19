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
    $data['message'] = $this->session->flashdata('message');
    $data['view_addonjs'] = array('login_js');
    $this->templates_->signin($data);
  }
  public function login()
  {
    $this->form_validation->set_rules('identity', 'identity','required');
    $this->form_validation->set_rules('password', 'password','required');
    if ($this->form_validation->run() === TRUE)
    {
      $remember = (bool)$this->input->post('remember');
      if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
      {
        $this->session->set_flashdata('message', $this->ion_auth->messages());
        redirect('dashboard', 'refresh');
      }
      else
      {
        $this->session->set_flashdata('message', $this->ion_auth->errors());        
        redirect('signin');
      }
    }
    else
    {
      var_dump('validasi error');
      redirect('signin');
    }
  }
  public function logout()
  {
    // log the user out
    $logout = $this->ion_auth->logout();

    // redirect them to the login page
    $this->session->set_flashdata('message', 'Logout Success');
    redirect('signin');
  }
}