<?php
class Product extends MX_Controller
{
  function __construct()
  {
  	parent::__construct();
  }
  public function index()
  {
  	$this->load->module('templates_');
  	$data['view_module'] = 'product';
  	$data['view_content'] = 'product';
    $data['view_addoncss'] = array('product_css');
    $data['view_addonjs'] = array('product_js');
    $data['view_addoncustjs'] = array('product_custjs');
    $data['ctg'] = $this->get_categories();
    $data['lok'] = $this->get_location();
    $data['size'] = $this->get_size();
  	$this->templates_->shop($data);
  }

  public function filter()
  {
    $this->load->module('templates_');
    $data['view_module'] = 'product';
    $data['view_content'] = 'product';
    $data['view_addoncss'] = array('product_css');
    $data['view_addonjs'] = array('product_js');
    $data['view_addoncustjs'] = array('product_custjs');
    $data['ctg'] = $this->get_categories();
    $data['lok'] = $this->get_location();
    $data['size'] = $this->get_size();
    $this->templates_->shop($data);
  }

  public function z()
  {
    $slug = ($this->uri->segment(3))?$this->uri->segment(3):NULL;
    $get = $this->db->get_where('mona_product',array('prod_short'=>$slug));
    if($get->num_rows()>0)
    {
      redirect('product/details/'.$get->row()->PROD_SLUG);
    }
    else
    {
      redirect('Error_404');
    }
  }

  public function details()
  {
    $this->load->module('socialmeta');
    $slug = ($this->uri->segment(3))?$this->uri->segment(3):NULL;
    $get = $this->db->get_where('mona_product',array('prod_slug'=>$slug));
    if($get->num_rows()>0)
    {
      $getDet = $this->db->join('mona_prodsize b','b.prsz_id = a.prsz_id')->join('mona_district c','c.dis_id = a.dis_id')->where('a.prod_id',$get->row()->PROD_ID)->get('mona_product a')->row();
      $light = ($getDet->PROD_LIGHTING != '0')?'Backlite':'Frontlite';
      $price = $get->row()->PROD_PRICE;
      $contract = array(6,3,1);
      $retail_price = array();
      foreach ($contract as $con)
      {
        $ret = abs($price)/10*$con;
        $retail_price[] = '<span class="m-text17">Rp '.number_format($ret).'</span><span class="m-text17c">/'.$con.' Months</span><br>';
      }
      $data['meta_addon'] = $this->socialmeta->socialtag($getDet->PROD_ID);
      $data['prod_retail'] = $retail_price;
      $data['prod_name'] = $get->row()->PROD_NAME;
      $data['prod_price'] = 'Rp '.number_format($get->row()->PROD_PRICE);
      $data['prod_spcprice'] = ($get->row()->PROD_SPCPRICE > 0)?'Rp '.number_format($get->row()->PROD_SPCPRICE):NULL;
      $data['prod_spcdura'] = $get->row()->PROD_SPCDURA;
      $data['prod_code'] = $get->row()->PROD_CODE;
      $data['prod_categories'] = $this->db->get_where('mona_prodtype',array('prt_id'=>$get->row()->PRT_ID))->row()->PRT_NAME;
      $data['prod_pic'] = $this->get_img($get->row()->PROD_ID);
      $picfs = $get->row()->PROD_PIC;
      $data['prod_fs'] = ($picfs == '')?'/assets/img/factsheet/default.jpg':$picfs;
      $data['prod_vidurl'] = '<iframe src="'.$get->row()->PROD_VIDLINK.'"></iframe>';
      $data['prod_mapurl'] = '<iframe src="'.$get->row()->PROD_MAPLINK.'"></iframe>';
      $data['prod_desc'] = 'Location '.$getDet->DIS_NAME.', '.$getDet->PROD_STREETADDR.'<br>'.'Size '.$getDet->PRSZ_NAME.'<br>'.'Lighting '.$light.'<br>'.$getDet->PROD_DESCRIPTION;
      $this->load->module('templates_');
      $data['view_module'] = 'product';
      $data['view_content'] = 'product_details';
      $data['view_addoncss'] = array('product_details_css');
      $data['view_addonjs'] = array('product_details_js');
      $data['view_addoncustjs'] = array('product_details_custjs');
      $this->templates_->shop($data);
    }
    else
    {
      redirect('Error_404');
    }
  }

  public function get_img($id)
  {
    $get = $this->db->from('mona_prodpict a')
              ->join('mona_product b','b.prod_id = a.prod_id')
              ->where('a.prod_id',$id)
              ->get()->result();
    $data = array();
    foreach ($get as $img)
    {
      $data[] = '<div class="item-slick3" data-thumb="'.base_url().'admin'.$img->PRODPIC_PATH.'">
              <div class="wrap-pic-w hov-img-zoom">
                <img src="'.base_url().'admin'.$img->PRODPIC_PATH.'" alt="IMG-PRODUCT">
              </div>
            </div>';
    }
    return $data;
  }  

  public function get_categories()
  {
    $get = $this->db->get_where('mona_prodtype',array('prt_dtsts'=>'1'))->result();
    $rs = array();
    $cnt = 0;
    foreach ($get as $dt)
    {
      $cnt++;
      $rs[$cnt]['PRT_ID'] = $dt->PRT_ID;
      $rs[$cnt]['PRT_NAME'] = $dt->PRT_NAME;
    }
    return $rs;
  }

    public function get_location()
  {
    $get = $this->db->get('mona_district')->result();
    $rs = array();
    $cnt=0;
    foreach ($get as $dt)
    {
      $cnt++;
      $rs[$cnt]['DIS_ID'] = $dt->DIS_ID;
      $rs[$cnt]['DIS_NAME'] = $dt->DIS_NAME;
    }
    return $rs;
  }
  public function get_size()
  {
    $get = $this->db->get_where('mona_prodsize',array('prsz_dtsts'=>'1'))->result();
    $rs = array();
    $cnt=0;
    foreach ($get as $dt)
    {
      $cnt++;
      $rs[$cnt]['PRSZ_ID']= $dt->PRSZ_ID;
      $rs[$cnt]['PRSZ_NAME']= $dt->PRSZ_NAME;
    }
    return $rs;
  }

  // NEW ADDED BY RADIX
  public function read()
  {
    $this->load->model('Product_model', 'modelProduct');
    $this->load->module('templates_');
    
    $limit = $this->input->get('limit');
    $page = $this->input->get('page');
    $data['read_city'] = [
      ["CITY_ID" => "31", "NAME" => "Jakarta", "IMAGE" => "jakarta.jpg"],
      ["CITY_ID" => "3578", "NAME" => "Surabaya", "IMAGE" => "surabaya.jpg"],
      ["CITY_ID" => "3573", "NAME" => "Malang", "IMAGE" => "malang.jpg"],
      ["CITY_ID" => "5171", "NAME" => "Denpasar", "IMAGE" => "bali.jpg"],
      ["CITY_ID" => "3273", "NAME" => "Bandung", "IMAGE" => "bandung.jpg"],
      ["CITY_ID" => "3271", "NAME" => "Bogor", "IMAGE" => "bogor.jpg"],
      ["CITY_ID" => "3471", "NAME" => "Yogyakarta", "IMAGE" => "yogyakarta.jpg"],
      ["CITY_ID" => "7171", "NAME" => "Manado", "IMAGE" => "manado.jpg"],
    ]; 
    
    $filter['search'] = $this->input->get('search');
    $filter['category'] = $this->input->get('category');
    $filter['size'] = $this->input->get('size');
    $filter['city'] = $this->input->get('city');
    $filter['sort'] = $this->input->get('sort');

    $total_data = $this->modelProduct->countData($filter);
    // echo $filter['sortName'];die;
  	$data['view_module'] = 'product';
  	$data['view_content'] = 'product_city';
    $data['view_addoncss'] = array('product_css');
    $data['view_addonjs'] = array('product_js');

    $page_count = ceil($total_data / $limit);
    $page_active = (isset($page)) ? $page : 1;
    $page_first = ($limit * $page_active) - $limit;

    $data['page_count'] = $page_count;
    $data['page_active'] = $page_active;
    $data['page_limit'] = $limit;
    $data['ctg'] = $this->get_categories();
    $data['lok'] = $this->get_location();
    $data['size'] = $this->get_size();
    $data['read_product'] = $this->modelProduct->readData($limit, $page_first, $filter); 

    // echo"<pre>";print_r($data['read_product']);die;
    $this->templates_->shop($data);
  }
}