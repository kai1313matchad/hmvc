<?php
class Promotions extends MX_Controller
{
  function __construct()
  {
  	parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }
  
  public function index()
  {
  	$this->load->module('templates_');
  	$data['view_module'] = 'promotions';
  	$data['view_content'] = 'promotion';
    $data['view_addoncss'] = array('promotion_css');
    $data['view_addonjs'] = array('promotion_js');
  	$this->templates_->admin($data);
  }

  public function read()
  {
  	$data['view_module'] = 'promotions';
  	$data['view_content'] = 'promotion_data';
    $data['view_addoncss'] = array('promotion_css');
    $data['view_addonjs'] = array('promotion_js');
    $data['read_promotion'] = $this->db->get('mona_promotions')->result(); 
    $view = $this->load->view('promotions/promotion_data', $data);
    echo $view;
  }

  public function new()
  {
    $this->load->module('templates_');
    $data['view_module'] = 'promotions';
    $data['view_content'] = 'promotion_form';
    $data['view_addoncss'] = array('promotioncrud_css');
    $data['view_addonjs'] = array('promotioncrud_js');
    $data['read_product'] = $this->db->get('mona_product')->result(); 
    $data['read_city'] = [
      ["CITY_ID" => "1", "NAME" => "Jakarta"],
      ["CITY_ID" => "2", "NAME" => "Surabaya"],
      ["CITY_ID" => "3", "NAME" => "Malang"],
      ["CITY_ID" => "4", "NAME" => "Bali"],
      ["CITY_ID" => "5", "NAME" => "Bandung"],
      ["CITY_ID" => "6", "NAME" => "Bogor"],
      ["CITY_ID" => "7", "NAME" => "Bogor"],
      ["CITY_ID" => "8", "NAME" => "Makassar"],
      ["CITY_ID" => "9", "NAME" => "Manado"],
    ]; 
    $this->templates_->admin($data);
  }

  public function edit($id)
  {
    $this->load->module('templates_');
    $data['view_module'] = 'promotions';
    $data['view_content'] = 'promotion_form';
    $data['view_addoncss'] = array('promotioncrud_css');
    $data['view_addonjs'] = array('promotioncrud_js');
    $data['read_city'] = [
      ["CITY_ID" => "1", "NAME" => "Jakarta"],
      ["CITY_ID" => "2", "NAME" => "Surabaya"],
      ["CITY_ID" => "3", "NAME" => "Malang"],
      ["CITY_ID" => "4", "NAME" => "Bali"],
      ["CITY_ID" => "5", "NAME" => "Bandung"],
      ["CITY_ID" => "6", "NAME" => "Bogor"],
      ["CITY_ID" => "7", "NAME" => "Bogor"],
      ["CITY_ID" => "8", "NAME" => "Makassar"],
      ["CITY_ID" => "9", "NAME" => "Manado"],
    ]; 
    $data['read_product'] = $this->db->get('mona_product')->result(); 
    $data['read_promotion'] = $this->db->get_where('mona_promotions', array('id' => $id))->row_array();
    $data['read_promotion_detail'] = $this->db->get_where('mona_promotion_details', array('promo_id' => $data['read_promotion']['ID']))->result();
    $this->templates_->admin($data);
  }

  public function create()
  {
    $data = json_decode($this->input->post('data'));
    // echo"<pre>";print_r($data);die;
    $this->db->insert('mona_promotions',
      array(
        'TITLE'=> $data->title,
        'CITY'=> $data->city,
        'START_DATE'=> $data->startdate,
        'END_DATE'=> $data->enddate,
        'STATUS'=> 'active',
      )
    );
    $promotion_id = $this->db->insert_id();

    foreach ($data->related_product as $key => $value) {
      $this->db->insert('mona_promotion_details',
        array(
          'PROD_ID'=> $value,
          'PROMO_ID'=> $promotion_id,
        )
      );
    }
    echo json_encode($promotion_id);
  }

  public function update()
  {
    $data = json_decode($this->input->post('data'));
    // echo"<pre>";print_r($data);die;
    $this->db->update('mona_promotions', 
      array(
        'TITLE'=> $data->title,
        'CITY'=> $data->city,
        'START_DATE'=> $data->startdate,
        'END_DATE'=> $data->enddate,
        'STATUS'=> 'active',
      ),
    array('ID' => $data->id));

    $this->db->delete('mona_promotion_details', array('PROMO_ID' => $data->id));

    foreach ($data->related_product as $key => $value) {
      $this->db->insert('mona_promotion_details',
        array(
          'PROD_ID'=> $value,
          'PROMO_ID'=> $data->id,
        )
      );
    }
    echo json_encode($data->id);
  }

  public function delete($id)
  {
    $this->db->delete('mona_promotion_details', array('PROMO_ID' => $id));
    $this->db->delete('mona_promotions', array('ID' => $id));
    return redirect('promotions');
  }

  public function createBgImg($id)
  {
    $nmfile='img_'.time();
    $config['upload_path']='./assets/img/promotion/';
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
        $this->db->update('mona_promotions', array(
          'BACKGROUND' => $dataupload['file_name']
        ), array('ID' => $id));
        echo json_encode($status);
    }
    $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'msg'=>$msg)));
    // echo json_encode($_FILES);
  }

  public function createBadgeImg($id)
  {
    $nmfile='img_'.time();
    $config['upload_path']='./assets/img/badge/';
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
        $this->db->update('mona_promotions', array(
          'BADGE' => $dataupload['file_name']
        ), array('ID' => $id));
        echo json_encode($status);
    }
    $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'msg'=>$msg)));
    // echo json_encode($_FILES);
  }
}