<?php
class Blogpost extends MX_Controller
{
  function __construct()
  {
  	parent::__construct();
  	$this->load->model('Dtb_blogpost','blogpost');
  }
  public function index()
  {
  	$this->load->module('templates_');
  	$data['view_module'] = 'blogpost';
  	$data['view_content'] = 'manage';
    $data['view_addoncss'] = array('blogpost_css');
    $data['view_addonjs'] = array('blogpost_js');
    $data['view_addoncustjs'] = array('manage_js');
  	$this->templates_->admin($data);
  }

  public function get_blogpost()
  {
    $list = $this->blogpost->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $dat)
    {
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $dat->BLOG_TITLE;
      $row[] = $dat->BLOG_SLUG;
      $row[] = $dat->BLOG_DATE;
      $row[] = $dat->BLOG_CONTENT;
      // $row[] = $dat->BLOG_PICTURE;
      $row[] ='<div class="hov-img-zoom pos-relative" title="'.$dat->BLOG_PICTURE.'" ><img class="img-responsive img-adm-product" src="'.base_url().'/assets/img/blogpost/'.$dat->BLOG_PICTURE.'"></div>';
      $row[] = '<a href="javascript:void(0)" title="Edit Data" class="btn btn-sm btn-primary btn-responsive" onclick="edit_blogpost('."'".$dat->BLOG_ID."'".')"><span class="glyphicon glyphicon-pencil"></span> </a>';
      $row[] = '<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="delete_blogpost('."'".$dat->BLOG_ID."'".')"><span class="glyphicon glyphicon-trash"></span> </a>';
      $data[] = $row;
    }
    $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->blogpost->count_all(),
            "recordsFiltered" => $this->blogpost->count_filtered(),
            "data" => $data,
    );      
    echo json_encode($output);
  }

  public function save_blogpost()
  {
  	$name = $this->input->post('picture_name');
  	// $name = $this->input->post('blog_picture');
	$this->img_conf($name);
  	if($this->input->post('form_status') == '1')
    {
      $ins = array(
          'blog_title' => $this->input->post('blog_title'),
          'blog_slug' => $this->input->post('blog_title'),
          'blog_date' => $this->input->post('blog_date'),
          'blog_update' => date('Y-m-d H:i:s'),
          'blog_content' => $this->input->post('blog_content'),
          'blog_dtsts' => '1'
      ); 
      if (!empty($_FILES))
	  {
			$this->upload->do_upload('file');
			$logo = $this->upload->data();
	        $ins['blog_picture'] = $logo['file_name'];
	  }
	  $insert = $this->db->insert('mona_blog',$ins);
	  echo json_encode(array("status" => TRUE, 'error' => $this->upload->display_errors()));
    }

    if($this->input->post('form_status') == '2')
    {
    	$upd = array(
          'blog_title' => $this->input->post('blog_title'),
          'blog_slug' => $this->input->post('blog_title'),
          'blog_date' => $this->input->post('blog_date'),
          'blog_update' => date('Y-m-d H:i:s'),
          'blog_content' => $this->input->post('blog_content'),
      	); 
      	if (!empty($_FILES))
	    {
			$this->upload->do_upload('file');
			$logo = $this->upload->data();
	        $upd['blog_picture'] = $logo['file_name'];
	    }
    	$update = $this->db->update('mona_blog',$upd,array('blog_id'=>$this->input->post('blog_id')));
    	echo json_encode(array("status" => TRUE, 'error' => $this->upload->display_errors()));
    }
  }

  public function img_conf($name)
 {
	$nmfile='blog_'.$name;
	$config['upload_path']='./assets/img/blogpost/';			
	$config['allowed_types']='jpg|jpeg|png';
	$config['max_size']='30000';
	$config['file_name']=$nmfile;
	$this->upload->initialize($config);
 }

 public function get_blogpostedit($id)
 {
    $get = $this->db->get_where('mona_blog',array('blog_id'=>$id));
    $check = $get->num_rows();
    if($check > 0)
    {
    	$data['blog_id'] = $get->row()->BLOG_ID;
    	$data['blog_title'] = $get->row()->BLOG_TITLE;
    	$data['blog_date'] = $get->row()->BLOG_DATE;
    	$data['blog_content'] = $get->row()->BLOG_CONTENT;
    }
    echo json_encode($data);
 }

  public function del_blogpost($id)
  {
    $del = array(
      'blog_dtsts' => '0'
    );
    $update = $this->db->update('mona_blog',$del,array('blog_id'=>$id));
    $data['status']=($this->db->affected_rows())?TRUE:FALSE;
    echo json_encode($data);
  }
}