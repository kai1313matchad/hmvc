<?php
class Blogpost extends MX_Controller
{
  function __construct()
  {
  	parent::__construct();
    $this->load->model('Post_model');
  }

  public function index()
  {
  	$this->load->module('templates_');
 //  	$this->load->library('pagination');

	// $config['base_url'] = base_url('Blogpost/index/');
	// $config['total_rows'] = $this->Post_model->total_rows('mona_blog');
	$config['per_page'] = 3;

	// $config['num_tag_open'] = '<li>';
	// $config['num_tag_close']= '</li>';
	// $config['prev_link'] 	= '&lt;';
	// $config['prev_tag_open']='<li>';
	// $config['prev_tag_close']='</li>';
	// $config['next_link'] 	= '&gt;';
	// $config['next_tag_open']='<li>';
	// $config['next_tag_close']='</li>';
	// $config['cur_tag_open']='<li class="active disabled"><a href="#">';
	// $config['cur_tag_close']='</a></li>';
	// $config['first_tag_open']='<li>';
	// $config['first_tag_close']='</li>';
	// $config['last_tag_open']='<li>';
	// $config['last_tag_close']='</li>';
	
	// $this->pagination->initialize($config);		

	$limit = $config['per_page'];
	$offset = (int) $this->uri->segment(3);

  	$data['view_module'] = 'blogpost';
  	$data['view_content'] = 'blog';
    $data['view_addoncss'] = array('blog_css');
    $data['view_addonjs'] = array('blog_js');
    $data['view_addoncustjs'] = array('blog_custjs');
    // $data['record'] = $this->Post_model->read('mona_blog', $limit, $offset);
    // $data['pagination'] = $this->pagination->create_links();
  	$this->templates_->shop($data);
  }

  public function read($id){
  	    $this->load->module('templates_');
		$data['record']=$this->Post_model->baca_artikel($id);
		// $data['komentar']=$this->Post_model->read_komen($id);
		$data['view_module'] = 'blogpost';
	  	$data['view_content'] = 'blog';
	    $data['view_addoncss'] = array('blog_css');
	    $data['view_addonjs'] = array('blog_js');
	    $data['view_addoncustjs'] = array('blog_custjs');
		// $this->load->view('blog_details',$data);
		$this->templates_->shop($data);
	}

  public function pictBlog($offset){
  	$config['per_page'] = 3;
  	$limit = $config['per_page'];
	// $offset = (int) $this->uri->segment(3);
  	$this->Post_model->read('mona_blog', $limit, $offset);
  }
}