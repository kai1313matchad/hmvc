<?php
class Products extends MX_Controller
{
  function __construct()
  {
  	parent::__construct();
    $this->load->model('crud/M_gen','gen');
    $this->load->model('Dtb_productall','prodall');
  }
  public function index()
  {
  	$this->load->module('templates_');
  	$data['view_module'] = 'products';
  	$data['view_content'] = 'product';
    $data['view_addoncss'] = array('product_css');
    $data['view_addonjs'] = array('product_js');
    $data['view_addoncustjs'] = array('product_custjs');
  	$this->templates_->admin($data);
  }
  public function crud($id)
  {
    if($id != 'add')
    {
      $get = $this->db->get_where('mona_product',array('prod_code'=>$id));
      $check = $get->num_rows();
      if($check > 0)
      {
        $this->load->module('templates_');
        $data['view_module'] = 'products';
        $data['view_content'] = 'product_crud';
        $data['view_addoncss'] = array('productcrud_css');
        $data['view_addonjs'] = array('productcrud_js');
        $data['view_addoncustjs'] = array('productcrud_custjs');
        $data['prod_code'] = $get->row()->PROD_CODE;
        $data['prod_id'] = $get->row()->PROD_ID;
        $this->templates_->admin($data);
      }
      else
      {
        redirect('Products');
      }
    }
    else
    {      
      $this->load->module('templates_');
      $data['view_module'] = 'products';
      $data['view_content'] = 'product_crud';
      $data['view_addoncss'] = array('productcrud_css');
      $data['view_addonjs'] = array('productcrud_js');
      $data['view_addoncustjs'] = array('productcrud_custjs');
      $data['prod_code'] = NULL;
      $data['prod_id'] = $this->add_product();
      $this->templates_->admin($data);
    }
  }
  public function add_product()
  {
    $this->db->insert('mona_product',array('prod_dtsts'=>'0','prod_code'=>'void'.rand()));
    $insID = $this->db->insert_id();
    return $insID;
  }
  public function upload_pic()
  {
    if (!empty($_FILES)) 
    {
      $token = $this->input->post('token_code');
      $id = $this->input->post('id');      
      $this->img_config_();
      if ($this->upload->do_upload('file'))
      {
        $fileData = $this->upload->data();
        $imgname = $fileData['file_name'];
        $imgpath = './assets/img/product/'.$imgname;
        $data = array(
          'prod_id' => $id,
          'prodpic_path' => $imgpath,
          'prodpic_token' => $token,
        );
        $insert = $this->db->insert('mona_prodpict',$data);
      }
    }
  }
  public function remove_pic()
  {
    $token = $this->input->post('token');
    $pict = $this->db->get_where('mona_prodpict',array('prodpic_token'=>$token));
    if($pict->num_rows() > 0)
    {
      $pictdt = $pict->row();
      $path = $pictdt->PRODPIC_PATH;
      if(file_exists($file = $path))
      {
        unlink($file);
      }
      $del = $this->db->delete('mona_prodpict',array('prodpic_token'=>$token));
    }
  }
  public function get_pic($id)
  {
    $data = $this->db->from('mona_prodpict a')
                      ->join('mona_product b','b.prod_id = a.prod_id')
                      ->where('b.prod_id',$id)
                      ->get()->result();
    echo json_encode($data);
  }
  public function test()
  {
    $affix = $this->input->post('prodtype');
    $subdis = $this->input->post('subdistrict');
    $id = $this->gen_num_('mona_product','prod_id',$affix,$subdis);
    $ins = array(
      'prod_id'=>$id,
      'prov_id'=>$this->input->post('province'),
      'dis_id'=>$this->input->post('district'),
      'subdis_id'=>$subdis,
      'prt_id'=>$affix,
      'prod_name'=>$this->input->post('productname'),
      'prod_slug'=>url_title($this->input->post('productname'), 'dash', true)
    );
    $insert = $this->db->insert('mona_product',$ins);
    $data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
    // $kode = $this->input->post('productname');
    // $data['msg'] = url_title($kode, 'dash', true);
    echo json_encode($data);
  }
  public function gen_num_($tb,$col,$affix,$subdis)
  {
    $this->db->select_max($col,'code');
    $que = $this->db->get_where($tb,array('prt_id'=>$affix));
    $ext = $que->row();
    $max = $ext->code;
    $len = strlen($affix);
    $sub = substr($max,$len,-6);
    if($max == null || $sub != $subdis)
    {
      $max = $affix.$subdis.'000000';
    }    
    $num = (int) substr($max,-6);
    $num++;
    $kode = $affix.$subdis;
    $res = $kode . sprintf('%06s',$num);
    return $res;
  }
  public function get_productall()
  {
    $list = $this->prodall->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $dat)
    {
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $dat->PROD_CODE;
      $row[] = $dat->PROD_NAME;
      $row[] = number_format($dat->PROD_PRICE);     
      $row[] = '<a href="'.base_url().$dat->PROD_PIC.'" target="blank__"><img class="img-responsive img-adm-product" src="'.base_url().$dat->PROD_PIC.'"></a>';
      $row[] = '<a href="Products/crud/'.$dat->PROD_CODE.'" target="blank__" title="Edit Data" class="btn btn-sm btn-primary btn-responsive"><span class="glyphicon glyphicon-pencil"></span> </a>';
      $row[] = '<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="delete_prod('."'".$dat->PROD_ID."'".')"><span class="glyphicon glyphicon-trash"></span> </a>';
      $data[] = $row;
    }
    $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->prodall->count_all(),
            "recordsFiltered" => $this->prodall->count_filtered(),
            "data" => $data,
    );      
    echo json_encode($output);
  }
  public function get_prodrow($id)
  {
    $que = $this->db->get_where('mona_product',array('prod_id'=>$id));
    $data = $que->row();
    echo json_encode($data);
  }
  public function get_dropsize()
  {
    $data = $this->db->get_where('mona_prodsize',array('prsz_dtsts'=>'1'))->result();
    echo json_encode($data);
  }
  public function get_dropcons()
  {
    $data = $this->db->get_where('mona_construct_sts',array('cons_dtsts'=>'1'))->result();
    echo json_encode($data);
  }
  public function get_dropprov($tb)
  {
    $data = $this->db->order_by('prov_name')->get($tb)->result();
    echo json_encode($data);
  }
  public function get_dropdistrict($id)
  {
    if($id != 'N')
    {
      $data = $this->db->order_by('dis_name')->get_where('mona_district',array('prov_id'=>$id))->result();
    }
    else
    {
      $data = $this->db->order_by('dis_name')->get('mona_district')->result();
    }
    echo json_encode($data);
  }
  public function get_dropsubdistrict($id)
  {
    if($id != 'N')
    {
      $data = $this->db->order_by('subdis_name')->get_where('mona_subdistrict',array('dis_id'=>$id))->result();
    }
    else
    {
      $data = $this->db->order_by('subdis_name')->get('mona_subdistrict')->result();
    }    
    echo json_encode($data);
  }
  public function get_dropprodtype($tb)
  {
    $data = $this->db->order_by('prt_id')->get($tb)->result();
    echo json_encode($data);
  }
  public function save_products()
  {
    $id=$this->input->post('productid');
    $get = $this->db->get_where('mona_product',array('prod_id'=>$id))->row()->PROD_CODE;
    $affix = $this->input->post('prodtype');
    $subdis = $this->input->post('subdistrict');
    $code = $this->gen_num_('mona_product','prod_code',$affix,$subdis);
    if(substr($get,0,4)!='void')
    {    
      $newid = $this->add_product();
      $upd = array(
        'prov_id'=>$this->input->post('province'),
        'dis_id'=>$this->input->post('district'),
        'subdis_id'=>$this->input->post('subdistrict'),
        'prt_id'=>$this->input->post('prodtype'),
        'prsz_id'=>$this->input->post('prodsize'),
        'cons_id'=>$this->input->post('prodcons'),
        'prod_code'=>$code,
        'prod_name'=>$this->input->post('productname'),
        'prod_slug'=>url_title($this->input->post('productname'), 'dash', true),
        'prod_streetaddr'=>$this->input->post('streetaddr'),
        'prod_price'=>($this->input->post('productprice') != '')?$this->input->post('productprice'):0,
        'prod_spcprice'=>($this->input->post('specialprice') != '')?$this->input->post('specialprice'):0,
        'prod_description'=>$this->input->post('proddesc'),
        'prod_sts'=>'1',
        'prod_dtsts'=>'1'
      ); 
      $update = $this->db->update('mona_product',$upd,array('prod_id'=>$newid));
      $data['msg'] = $this->db->error();
      $data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
    }
    else
    {
      $upd = array(
        'prov_id'=>$this->input->post('province'),
        'dis_id'=>$this->input->post('district'),
        'subdis_id'=>$this->input->post('subdistrict'),
        'prt_id'=>$this->input->post('prodtype'),
        'prsz_id'=>$this->input->post('prodsize'),
        'cons_id'=>$this->input->post('prodcons'),
        'prod_code'=>$code,
        'prod_name'=>$this->input->post('productname'),
        'prod_slug'=>url_title($this->input->post('productname'), 'dash', true),
        'prod_streetaddr'=>$this->input->post('streetaddr'),
        'prod_price'=>($this->input->post('productprice') != '')?$this->input->post('productprice'):0,
        'prod_spcprice'=>($this->input->post('specialprice') != '')?$this->input->post('specialprice'):0,
        'prod_description'=>$this->input->post('proddesc'),
        'prod_sts'=>'1',
        'prod_dtsts'=>'1'
      ); 
      $update = $this->db->update('mona_product',$upd,array('prod_id'=>$id));
      $data['msg'] = $this->db->error();
      $data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
    }
    echo json_encode($data);
  }
  public function save_product()
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
  public function del_product($id)
  {
    $del = array(
      'prod_dtsts' => '0'
    );
    $update = $this->db->update('mona_product',$del,array('prod_id'=>$id));
    $data['status']=($this->db->affected_rows())?TRUE:FALSE;
    echo json_encode($data);
  }
  public function _validate_product()
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
    $config['upload_path']='./assets/img/product/';
    $config['allowed_types']='jpg|jpeg|png';
    $config['max_size']='2048';
    $config['file_name']=$nmfile;
    $this->upload->initialize($config);
  }
}