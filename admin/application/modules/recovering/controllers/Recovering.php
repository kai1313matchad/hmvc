<?php
class Recovering extends MX_Controller
{
  function __construct() {
  	parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
    $this->load->model(array('Dtb_galleries'));
  }
  
  public function index() {
  	$this->load->module('templates_');
  	$data['view_module'] = 'recovering';
  	$data['view_content'] = 'recovering';
    $data['view_addoncss'] = array('recovering_css');
    $data['view_addonjs'] = array('recovering_js');
  	$this->templates_->admin($data);
  }

  public function read() {
  	$data['view_module'] = 'recovering';
  	$data['view_content'] = 'recovering_data';
    $data['view_addoncss'] = array('recovering_css');
    $data['view_addonjs'] = array('recovering_js');
    $data['read_recovering'] = $this->db->get('mona_recovering')->result(); 
    $view = $this->load->view('recovering/recovering_data', $data);
    echo $view;
  }

  public function new() {
    $this->load->module('templates_');
    $data['view_module'] = 'recovering';
    $data['view_content'] = 'recovering_form';
    $data['view_addoncss'] = array('recovering_css');
    $data['view_addonjs'] = array('recovering_js');
    $this->templates_->admin($data);
  }

  public function edit($id) {
    $this->load->module('templates_');
    $data['view_module'] = 'recovering';
    $data['view_content'] = 'recovering_form';
    $data['view_addoncss'] = array('recovering_css');
    $data['view_addonjs'] = array('recovering_js');
    $data['read_recovering'] = $this->db->get_where('mona_recovering', array('id' => $id))->row_array();
    $this->templates_->admin($data);
  }

  public function create() {
    $data = json_decode($this->input->post('data'));
    // echo"<pre>";print_r($data);die;
    $this->db->insert('mona_recovering',
      array(
        'TITLE'=> $data->title,
        'DESCRIPTION'=> $data->description,
        'CREATED_AT'=> date('Y-m-d H:i:s'),
        'UPDATED_AT'=> date('Y-m-d H:i:s'),
      )
    );
    $recovering_id = $this->db->insert_id();
    echo json_encode($recovering_id);
  }

  public function update() {
    $data = json_decode($this->input->post('data'));
    // echo"<pre>";print_r($data);die;
    $this->db->update('mona_recovering', 
      array(
        'TITLE'=> $data->title,
        'DESCRIPTION'=> $data->description,
        'UPDATED_AT'=> date('Y-m-d H:i:s'),
      ),
    array('ID' => $data->id));
    echo json_encode($data->id);
  }

  public function delete($id) {
    $this->db->delete('mona_recovering', array('ID' => $id));
    return redirect('recovering');
  }

  public function createImg($id) {
    $nmfile='img_'.time();
    $config['upload_path']='./assets/img/recovering/';
    $config['allowed_types']='jpg|jpeg|png';
    $config['max_size']='2048';
    $config['file_name']= $nmfile; 
    $this->upload->initialize($config);
    if ( ! $this->upload->do_upload('file')) {
      $status = "error";
      $msg = $this->upload->display_errors();
      echo json_encode($status);
    }
    else {
      $dataupload = $this->upload->data();
      $status = "success";
      $msg = $dataupload['file_name']." berhasil diupload";
      $this->db->update('mona_recovering', array(
        'IMAGE' => $dataupload['file_name']
      ), array('ID' => $id));
      echo json_encode($status);
    }
    $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'msg'=>$msg)));
    // echo json_encode($_FILES);
  }

  public function gallery() {
    $this->load->module('templates_');
  	$data['view_module'] = 'recovering';
  	$data['view_content'] = 'recovering-gallery';
    $data['view_addoncss'] = array('recovering_gallerycss');
    $data['view_addonjs'] = array('recovering_galleryjs');
  	$this->templates_->admin($data);
  }

  public function addingImages() {
    $config['upload_path']   = './assets/img/recovering/gallery/';
    $config['allowed_types'] = 'gif|jpg|jpeg|png|ico';
    $config['file_name'] = 'img_'.time();
    // $this->load->library('upload',$config);
    $this->upload->initialize($config);
    if($this->upload->do_upload('imgFile')){
      $token = $this->input->post('token');
      $path = $this->upload->data('file_name');
      $this->db->insert('mona_rcvgalleries',array('pathRcvImage'=>$path,'tokenRcvImage'=>$token));
      echo json_encode('sukses');
    }
    else {
      echo json_encode(array('error'=>$this->upload->display_errors()));
    }
  }

  public function removeImages() {
    $token = $this->input->post('token');
    $img = $this->db->get_where('mona_rcvgalleries', array('tokenRcvImage'=>$token));
    if($img->num_rows() > 0){
      $hasil = $img->row();
      $imgPath = $hasil->pathRcvImage;
      if(file_exists($file = './assets/img/recovering/gallery/'.$imgPath)){
        unlink($file);
      }
      $this->db->delete('mona_rcvgalleries', array('idRcvImage'=>$hasil->idRcvImage));
      echo json_encode(array('File berhasil dihapus', $file));
    }
    else {
      echo json_encode('File tidak ditemukan');
    }
  }

  public function getGalleryList() {
    $list = $this->Dtb_galleries->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dat) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = '<a href="'.base_url().'assets/img/recovering/gallery/'.$dat->pathRcvImage.'" target="blank___"><img src="'.base_url().'assets/img/recovering/gallery/'.$dat->pathRcvImage.'" class="img-thumbnail img-responsive" width="40%"></a>';
			$row[] = $dat->pathRcvImage;
			$row[] = $dat->tokenRcvImage;
      $row[] = '<a href="#" class="btn mb-1 btn-warning"><i class="fa fa-copy"></i></a>';
			$data[] = $row;
		}
		$output = array(
		  "draw" => $_POST['draw'],
			"recordsTotal" => $this->Dtb_galleries->count_all(),
			"recordsFiltered" => $this->Dtb_galleries->count_filtered(),
			"data" => $data,
		);			
		echo json_encode($output);
  }

  //image config		
  public function configImg($path,$minwidth,$minheight) {
    $nmfile='img_'.time();
    $config['upload_path']=$path;
    $config['allowed_types']='jpg|jpeg|png';
    $config['max_size']='3000';
    $config['max_width']='2800';
    $config['max_height']='1800';
    $config['min_width']=$minwidth;
    $config['min_height']=$minheight;
    $config['file_name']=$nmfile;
    $this->upload->initialize($config);
  }
}