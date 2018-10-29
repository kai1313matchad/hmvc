<?php
class Z extends MX_Controller
{
  function __construct()
  {
  	parent::__construct();
  }
  public function ly()
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
}