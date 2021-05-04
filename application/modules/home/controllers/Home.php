<?php
class Home extends MX_Controller
{
  function __construct()
  {
  	parent::__construct();
  }
  public function index()
  {
    $data['promo'] = $this->getPromo();
    $this->load->module('templates_');
    $data['view_module'] = 'home';
    $data['view_content'] = 'home';
    $data['view_addoncss'] = array('home_css');
    $data['view_addonjs'] = array('home_js');
    $data['view_addoncustjs'] = array('home_custjs');
    $data['read_city'] = [
      ["CITY_ID" => "31", "NAME" => "Jakarta", "IMAGE" => "jakarta.jpg", "VIDEO" => ""],
      ["CITY_ID" => "3578", "NAME" => "Surabaya", "IMAGE" => "surabaya.jpg", "VIDEO" => "https://www.youtube.com/embed/OTywvYONm9U"],
      ["CITY_ID" => "3573", "NAME" => "Malang", "IMAGE" => "malang.jpg", "VIDEO" => "https://www.youtube.com/embed/fTgDcHBjPp0"],
      // ["CITY_ID" => "5171", "NAME" => "Denpasar", "IMAGE" => "bali.jpg", "VIDEO" => ""],
      // ["CITY_ID" => "3273", "NAME" => "Bandung", "IMAGE" => "bandung.jpg", "VIDEO" => ""],
      // ["CITY_ID" => "3271", "NAME" => "Bogor", "IMAGE" => "bogor.jpg", "VIDEO" => ""],
      // ["CITY_ID" => "3471", "NAME" => "Yogyakarta", "IMAGE" => "yogyakarta.jpg", "VIDEO" => ""],
      // ["CITY_ID" => "7171", "NAME" => "Manado", "IMAGE" => "manado.jpg", "VIDEO" => ""],
    ]; 
    $this->templates_->shop($data);
  }
  public function get_mainbanners()
  {
    $data = $this->db->get('mona_mainbanners')->result();
    echo json_encode($data);
  }

  public function getPromo() {
    $promoItems = array(
      'BIB3578000006',
      'BIB3578000007',
      'BIB3578000008',
      'BIB3578000011',
      'BIB3578000013',
    );
    $html = '';
    foreach ($promoItems as $item) {
      $dt = $this->db->get_where('mona_product', array('PROD_CODE'=>$item))->row();
      $pic = $this->db->select('PRODPIC_PATH')->get_where('mona_prodpict', array('PROD_ID'=>$dt->PROD_ID))->row()->PRODPIC_PATH;
      $html .= '<div class="col-md-4 item-slick-promo">
                  <a href="'.base_url().'product/details/'.$dt->PROD_SLUG.'">
                    <img src="'.base_url().'assets/frontend/images/misc/badge-lebaran.png" class="notify-badge" alt="">
                    <img src="'.base_url().'admin'.$pic.'" width="100%" class="img-promo" alt="'.$dt->PROD_NAME.'">
                  </a>
                  <div class="promo-title"><h5>'.$dt->PROD_NAME.'</h5></div>
                </div>';
    }
    return($html);
  }
}