<?php
class Socialmeta extends MX_Controller
{
  function __construct()
  {
  	parent::__construct();
  }
  
  public function socialtag($id)
  {
    $getProd = $this->db->join('mona_prodsize b','b.prsz_id = a.prsz_id')->join('mona_district c','c.dis_id = a.dis_id')->join('mona_prodtype')->where('a.prod_id',$id)->get('mona_product a')->row();
    $getPic = $this->db->get_where('mona_prodpict',array('prod_id'=>$getProd->PROD_ID))->last_row()->PRODPIC_PATH;
    $desc = 'Tipe : '
    $res = array();
    $res[] = '<meta name="twitter:card" content="summary_large_image">';
    $res[] = '<meta name="twitter:site" content="www.matchadonline.com">';
    $res[] = '<meta name="twitter:title" content="'.$getProd->PROD_NAME.'">';
    $res[] = '<meta name="twitter:description" content="Page description less than 200 characters">';
    $res[] = '<meta name="twitter:creator" content="www.matchadonline.com">';
    $res[] = '<meta name="twitter:image" content="'.base_url().'admin'.$getPic.'">';
    $res[] = '<meta name="twitter:data1" content="Rp '.(($getProd->PROD_PRICE)/10).'">';
    $res[] = '<meta name="twitter:label1" content="Price">';

    $res[] = '<meta property="og:title" content="'.$getProd->PROD_NAME.'" />';
    $res[] = '<meta property="og:type" content="product.item" />';
    $res[] = '<meta property="og:url" content="'.base_url().'product/details/'.$getProd->PROD_SLUG.'" />';
    $res[] = '<meta property="og:image" content="'.base_url().'admin'.$getPic.'" />';
    $res[] = '<meta property="og:description" content="Description Here" />';
    $res[] = '<meta property="og:site_name" content="Match Ad Online" />';
    $res[] = '<meta property="product:price:amount" content="'.(($getProd->PROD_PRICE)/10).'" />';
    $res[] = '<meta property="product:price:currency" content="Rp" />';
    return $res;
  }
}