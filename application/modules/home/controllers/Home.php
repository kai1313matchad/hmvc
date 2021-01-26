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

      // 'BIB3572000001',
      // 'BAL3514000001',
      // 'BIB3574000001',
      // 'BIB3574000002',
      // 'BIB3512000002',
      // 'BAL3509000001',
      // 'BAL3509000003',
      // 'BAL3509000002',
      // 'BIB3174000001',
      // 'BIB3578000020',
      // 'BIB3578000011',
      // 'BIB3578000024',
      // 'BIB3578000008',
      // 'BIB3578000019',
      // 'BIB3578000021',
      // 'BIB3578000022',
      // 'BIB3515000002'
    );
    $html = '';
    foreach ($promoItems as $item) {
      $dt = $this->db->get_where('mona_product', array('PROD_CODE'=>$item))->row();
      $pic = $this->db->select('PRODPIC_PATH')->get_where('mona_prodpict', array('PROD_ID'=>$dt->PROD_ID))->row()->PRODPIC_PATH;
      $html .= '<div class="col-md-4 item-slick-promo">
                  <a href="'.base_url().'product/details/'.$dt->PROD_SLUG.'">
                    <img src="'.base_url().'assets/frontend/images/misc/badgeimlek.png" class="notify-badge" alt="">
                    <img src="'.base_url().'admin'.$pic.'" width="100%" class="img-promo" alt="'.$dt->PROD_NAME.'">
                  </a>
                  <div class="promo-title"><h5>'.$dt->PROD_NAME.'</h5></div>
                </div>';
    }
    return($html);
  }
}