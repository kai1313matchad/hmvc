<?php
class Recovering extends MX_Controller
{
  function __construct()
  {
  	parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }
  
  public function index()
  {
  	$this->load->module('templates_');
  	$data['view_module'] = 'recovering';
  	$data['view_content'] = 'recovering';
    $data['view_addoncss'] = array('recovering_css');
    $data['view_addonjs'] = array('recovering_js');
  	$this->templates_->admin($data);
  }

  public function read()
  {
  	$data['view_module'] = 'recovering';
  	$data['view_content'] = 'recovering_data';
    $data['view_addoncss'] = array('recovering_css');
    $data['view_addonjs'] = array('recovering_js');
    $data['read_recovering'] = $this->db->get('mona_recovering')->result(); 
    $view = $this->load->view('recovering/recovering_data', $data);
    echo $view;
  }

  public function new()
  {
    $this->load->module('templates_');
    $data['view_module'] = 'recovering';
    $data['view_content'] = 'recovering_form';
    $data['view_addoncss'] = array('recovering_css');
    $data['view_addonjs'] = array('recovering_js');
    $this->templates_->admin($data);
  }

  public function edit($id)
  {
    $this->load->module('templates_');
    $data['view_module'] = 'recovering';
    $data['view_content'] = 'recovering_form';
    $data['view_addoncss'] = array('recovering_css');
    $data['view_addonjs'] = array('recovering_js');
    $data['read_recovering'] = $this->db->get_where('mona_recovering', array('id' => $id))->row_array();
    $this->templates_->admin($data);
  }

  public function create()
  {
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

  public function update()
  {
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

  public function delete($id)
  {
    $this->db->delete('mona_recovering', array('ID' => $id));
    return redirect('recovering');
  }

  public function createImg($id)
  {
    $nmfile='img_'.time();
    $config['upload_path']='./assets/img/recovering/';
    $config['allowed_types']='jpg|jpeg|png';
    $config['max_size']='2048';
    $config['file_name']= $nmfile; 
    $this->upload->initialize($config);
    if ( ! $this->upload->do_upload('file')){
        $status = "error";
        $msg = $this->upload->display_errors();
        echo json_encode($status);
    }
    else{
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
}