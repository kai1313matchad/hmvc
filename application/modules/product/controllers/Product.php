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
  	$this->templates_->shop($data);
  }
  public function details()
  {
    $slug = ($this->uri->segment(3))?$this->uri->segment(3):NULL;
    $get = $this->db->get_where('mona_product',array('prod_slug'=>$slug));
    if($get->num_rows()>0)
    {
      $price = $get->row()->PROD_PRICE;
      $contract = array(6,3,1);
      $retail_price = array();
      foreach ($contract as $con)
      {
        $ret = abs($price)/10*$con;
        $retail_price[] = '<span class="m-text17">Rp '.number_format($ret).'</span><span class="m-text17c">/'.$con.' Months</span><br>';
      }
      $data['prod_retail'] = $retail_price;
      $data['prod_name'] = $get->row()->PROD_NAME;
      $data['prod_price'] = 'Rp '.number_format($get->row()->PROD_PRICE);
      $data['prod_spcprice'] = ($get->row()->PROD_SPCPRICE > 0)?'Rp '.number_format($get->row()->PROD_SPCPRICE):NULL;
      $data['prod_code'] = $get->row()->PROD_CODE;
      $data['prod_categories'] = $this->db->get_where('mona_prodtype',array('prt_id'=>$get->row()->PRT_ID))->row()->PRT_NAME;
      $data['prod_pic'] = $this->get_img($get->row()->PROD_ID);
      $data['prod_vidurl'] = '<iframe src="'.$get->row()->PROD_VIDLINK.'"></iframe>';
      $data['prod_desc'] = $get->row()->PROD_DESCRIPTION;
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
    $get = $this->db->get('mona_prodtype')->result();
    $rs = array();
    foreach ($get as $dt)
    {
      $rs[] = '<li class="p-t-4">
        <a href="#" class="s-text13 active1">
          '.$dt->PRT_NAME.'
        </a>
      </li>';
    }
    return $rs;
  }
}