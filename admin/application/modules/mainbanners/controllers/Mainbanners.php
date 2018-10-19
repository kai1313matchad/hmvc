<?php
class Mainbanners extends MX_Controller
{
  function __construct()
  {
  	parent::__construct();
    $this->load->model('crud/M_gen','gen');
    $this->load->model('Dtb_mainbannerall','bannall');
  }
  public function index()
  {
  	$this->load->module('templates_');
  	$data['view_module'] = 'mainbanners';
  	$data['view_content'] = 'banners';
    $data['view_addoncss'] = array('banners_css');
    $data['view_addonjs'] = array('banners_js');
    $data['view_addoncustjs'] = array('banners_custjs');
  	$this->templates_->admin($data);
  }
  public function get_mainbannerall()
  {
    $list = $this->bannall->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $dat)
    {
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = '<div class="col-sm-12"><input class="form-control" name="bannername['.$dat->MBANN_ID.']" value="'.$dat->MBANN_NAME.'"></div>';
      $row[] = '<div class="col-sm-12"><input class="form-control" name="bannerlink['.$dat->MBANN_ID.']" value="'.$dat->MBANN_LINK.'"></div>';
      $row[] = '<div class="hov-img-zoom pos-relative" onclick="img_modal('.$dat->MBANN_ID.')" title="click to change"><img class="img-responsive img-adm-product" src="'.base_url().$dat->MBANN_IMGPATH.'"></div>';
      $row[] = '<a href="javascript:void(0)" title="Update Data" class="btn btn-sm btn-primary btn-responsive" onclick="edit_banner('."'".$dat->MBANN_ID."'".')"><i class="fa fa-save"></i></a>';
      $row[] = '<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="delete_banner('."'".$dat->MBANN_ID."'".')"><i class="fa fa-trash"></i></a>';
      $data[] = $row;
    }
    $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->bannall->count_all(),
            "recordsFiltered" => $this->bannall->count_filtered(),
            "data" => $data,
    );
    echo json_encode($output);
  }
  public function get_bannerrow($id)
  {
    $que = $this->db->get_where('mona_product',array('prod_id'=>$id));
    $data = $que->row();
    echo json_encode($data);
  }
  public function add_banner()
  {
    $add = array(
      'mbann_name'=>'Banner Name',
      'mbann_link'=>'Banner Link',
      'mbann_imgpath'=>'/assets/img/banner/default.jpg'
    );
    $insert = $this->db->insert('mona_mainbanners',$add);
    $data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
    echo json_encode($data);
  }
  public function save_img()
  {
    $id = $this->input->post('bannerid');
    $getimg = $this->db->get_where('mona_mainbanners',array('mbann_id'=>$id))->row()->MBANN_IMGPATH;
    $this->img_config_();
    if(!$this->upload->do_upload('file'))
    {
      $data['error_str'] = $this->upload->display_errors();
      $data['error_str_sts'] = TRUE;
      $data['status'] = FALSE;
      echo json_encode($data);
      exit();
    }
    else
    {
      $fileinfo_ = $this->upload->data();
      $path = '/assets/img/banner/'.$fileinfo_['file_name'];
      $upd = array(
        'mbann_imgpath'=>$path
      );
      $update = $this->db->update('mona_mainbanners',$upd,array('mbann_id'=>$this->input->post('bannerid')));
      $unlink = ($getimg != '/assets/img/banner/default.jpg')?@unlink('.'.$getimg):'DEFAULT';
      $data['status']=($this->db->affected_rows())?TRUE:FALSE;
    }
    echo json_encode($data);
  }
  public function update_banner()
  {
    $id = $this->input->post('bann_id');
    $bann_nm = $this->input->post('bann_name');
    $bann_ln = $this->input->post('bann_link');
    $upd = array(
      'mbann_name'=>$bann_nm,
      'mbann_link'=>$bann_ln,
    );
    $update = $this->db->update('mona_mainbanners',$upd,array('mbann_id'=>$id));
    $data['status']=($this->db->affected_rows())?TRUE:FALSE;
    echo json_encode($data);
  }
  public function save_banner()
  {
    $this->_validate_product();
    if($this->input->post('form_status') == '1')
    {
      $this->img_config_();
      if(!$this->upload->do_upload('file'))
      {
        $data['error_str'] = $this->upload->display_errors();
        $data['error_str_sts'] = TRUE;
        $data['status'] = FALSE;
        echo json_encode($data);
        exit();
      }
      else
      {
        $fileinfo_ = $this->upload->data();
        $path = '/assets/img/product/'.$fileinfo_['file_name'];
        $ins = array(
          'prod_id' => $this->input->post('productid'),
          'prod_name' => $this->input->post('productname'),
          'prod_price' => $this->input->post('productprice'),
          'prod_pic' => $path,
          'prod_dtsts' => '1'
        );
        $insert = $this->db->insert('mona_product',$ins);
        $data['status']=($this->db->affected_rows())?TRUE:FALSE;
      }     
    }
    if($this->input->post('form_status') == '2')
    {
      if(empty($_FILES['file']['name']))
      {
        $upd = array(
          'prod_name' => $this->input->post('productname'),
          'prod_price' => $this->input->post('productprice'),
          'prod_dtsts' => '1'
        );
        $update = $this->db->update('mona_product',$upd,array('prod_id'=>$this->input->post('productid')));
        $data['status']=($this->db->affected_rows())?TRUE:FALSE;
      }
      else
      {
        $this->img_config_();
        if(!$this->upload->do_upload('file'))
        {
          $data['error_str'] = $this->upload->display_errors();
          $data['error_str_sts'] = TRUE;
          $data['status'] = FALSE;
          echo json_encode($data);
          exit();
        }
        else
        {
          $fileinfo_ = $this->upload->data();
          $path = '/assets/img/product/'.$fileinfo_['file_name'];
          $upd = array(
            'prod_name' => $this->input->post('productname'),
            'prod_price' => $this->input->post('productprice'),
            'prod_pic' => $path,
            'prod_dtsts' => '1'
          );
          $update = $this->db->update('mona_product',$upd,array('prod_id'=>$this->input->post('productid')));
          $data['status']=($this->db->affected_rows())?TRUE:FALSE;
        }
      }     
    }
    echo json_encode($data);
  }
  public function del_banner($id)
  {
    $del = $this->db->delete('mona_mainbanners',array('mbann_id'=>$id));
    $data['status']=($this->db->affected_rows())?TRUE:FALSE;
    echo json_encode($data);
  }
  public function _validate_banner()
  {
    $data = array();
    $data['error_string'] = array();
    $data['inputerror'] = array();
    $data['status'] = TRUE;
  
    if($this->input->post('productid') == '')
    {
      $data['inputerror'][] = 'productid';
      $data['error_string'][] = 'Kode Produk Tidak Boleh Kosong';
      $data['status'] = FALSE;
    }

    if($this->input->post('productname') == '')
    {
      $data['inputerror'][] = 'productname';
      $data['error_string'][] = 'Nama Produk Tidak Boleh Kosong';
      $data['status'] = FALSE;
    }
    if($this->input->post('form_status') == '1')
    {
      $this->form_validation->set_rules('productid', 'Productid', 'is_unique[mona_product.PROD_ID]');
      if($this->form_validation->run() == FALSE)
      {
        $data['inputerror'][] = 'productid';
        $data['error_string'][] = 'Kode Produk Sudah Terpakai';
        $data['status'] = FALSE;
      }
      $this->form_validation->set_rules('productname', 'Productname', 'is_unique[mona_product.PROD_NAME]');
      if($this->form_validation->run() == FALSE)
      {
        $data['inputerror'][] = 'productname';
        $data['error_string'][] = 'Nama Produk Tidak Boleh Sama';
        $data['status'] = FALSE;
      }
      if(empty($_FILES['file']['name']))
      {
        $data['inputerror'][] = 'productpic';
        $data['error_string'][] = 'Gambar Produk Tidak Boleh Kosong';
        $data['status'] = FALSE;
      }
    }
    if($this->input->post('productprice') == '')
    {
      $data['inputerror'][] = 'productprice';
      $data['error_string'][] = 'Harga Produk Tidak Boleh Kosong';
      $data['status'] = FALSE;
    }
    if($data['status'] === FALSE)
    {
      echo json_encode($data);
      exit();
    }
  }
  public function img_config_()
  {
    $nmfile='img_'.time();
    $config['upload_path']='./assets/img/banner/';
    $config['allowed_types']='jpg|jpeg|png';
    $config['max_size']='2048';
    $config['file_name']=$nmfile;
    $this->upload->initialize($config);
  }
}