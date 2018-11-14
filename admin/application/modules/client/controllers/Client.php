<?php
class Client extends MX_Controller
{
  function __construct()
  {
  	parent::__construct();
  }
  public function index()
  {
  	$this->load->module('templates_');
  	$data['view_module'] = 'client';
  	$data['view_content'] = 'client';
    $data['view_addoncss'] = array('client_css');
    $data['view_addonjs'] = array('client_js');
    $data['view_addoncustjs'] = array('client_custjs');
  	$this->templates_->admin($data);
  }
  public function master()
  {
    $this->load->module('templates_');
    $data['view_module'] = 'client';
    $data['view_content'] = 'masterclient';
    $data['view_addoncss'] = array('masterclient_css');
    $data['view_addonjs'] = array('masterclient_js');
    $data['view_addoncustjs'] = array('masterclient_custjs');
    $this->templates_->admin($data);
  }
  public function getHisClientAll()
  {
    $data = $this->db->join('mona_product b','b.prod_id = a.prod_id')->join('mona_client c','c.client_id = a.client_id')->order_by('b.prod_name')->get('mona_history_client a')->result();
    echo json_encode($data);
  }
  public function getProductAll()
  {
    $data = $this->db->order_by('prod_name')->get_where('mona_product',array('prod_dtsts'=>'1'))->result();
    echo json_encode($data);
  }
  public function getClientAll()
  {
    $data = $this->db->order_by('client_name')->get_where('mona_client',array('client_dtsts'=>'1'))->result();
    echo json_encode($data);
  }
  public function getClient($id)
  {
    $data = $this->db->get_where('mona_client',array('client_id'=>$id))->row();
    echo json_encode($data);
  }
  public function getHisClient($id)
  {
    $data = $this->db->get_where('mona_history_client',array('hiscl_id'=>$id))->row();
    echo json_encode($data);
  }
  public function saveclient()
  {
    $this->_validate_client();
    $sts = $this->input->post('formsts');
    if($sts != '1')
    {
      $ins = array(
        'client_name'=>$this->input->post('clientname'),
        'client_info'=>$this->input->post('clientinfo'),
        'client_dtsts'=>'1'
      );
      $this->db->insert('mona_client',$ins);
      $data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
    }
    else
    {
      $upd = array(
        'client_name'=>$this->input->post('clientname'),
        'client_info'=>$this->input->post('clientinfo'),
        'client_dtsts'=>'1'
      );
      $this->db->update('mona_client',$upd,array('client_id'=>$this->input->post('clientid')));
      $data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
    }
    echo json_encode($data);
  }
  public function savehisclient()
  {
    $this->_validate_hisclient();
    $sts = $this->input->post('formsts');
    $hisId = $this->input->post('hisclientid');
    $clientId = $this->input->post('client');
    $prodId = $this->input->post('product');
    $dateStr = $this->input->post('perstart');
    $dateEnd = $this->input->post('perend');
    if($sts != '1')
    {
      $ins = array(
        'client_id'=>$clientId,
        'prod_id'=>$prodId,
        'hiscl_datestart'=>$dateStr,
        'hiscl_dateend'=>$dateEnd
      );
      $this->db->insert('mona_history_client',$ins);
      $data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
      $updProd = array(
        'prod_rentdue'=>$dateEnd
      );
      $this->db->update('mona_product',$updProd,array('prod_id'=>$prodId));
      $data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
    }
    else
    {
      $upd = array(
        'client_id'=>$clientId,
        'prod_id'=>$prodId,
        'hiscl_datestart'=>$dateStr,
        'hiscl_dateend'=>$dateEnd
      );
      $this->db->update('mona_history_client',$upd,array('hiscl_id'=>$hisId));
      $data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
      $updProd = array(
        'prod_rentdue'=>$dateEnd
      );
      $this->db->update('mona_product',$updProd,array('prod_id'=>$prodId));
      $data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
    }
    echo json_encode($data);
  }
  function delClient($id)
  {
    $upd = array(
      'client_dtsts'=>'0'
    );
    $this->db->update('mona_client',$upd,array('client_id'=>$id));
    $data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
    echo json_encode($data);
  }
  function delHisClient($id)
  {
    $prodId = $this->db->get_where('mona_history_client',array('hiscl_id'=>$id))->row()->PROD_ID;
    $this->db->delete('mona_history_client',array('hiscl_id'=>$id));
    $perEnd = $this->db->get_where('mona_history_client',array('prod_id'=>$prodId))->last_row()->HISCL_DATEEND;
    $updProd = array(
        'prod_rentdue'=>$perEnd
      );
      $this->db->update('mona_product',$updProd,array('prod_id'=>$prodId));
    $data['status'] = ($this->db->affected_rows())?TRUE:FALSE;
    echo json_encode($data);
  }
  public function _validate_client()
  {
    $data = array();
    $data['error_string'] = array();
    $data['inputerror'] = array();
    $data['status'] = TRUE;
    if($this->input->post('clientname') == '')
    {
      $data['inputerror'][] = 'clientname';
      $data['error_string'][] = 'Client Name Cannot be Null';
      $data['status'] = FALSE;
    }
    if($this->input->post('clientinfo') == '')
    {
      $data['inputerror'][] = 'clientinfo';
      $data['error_string'][] = 'Client Info Cannot be Null';
      $data['status'] = FALSE;
    }
    if($data['status'] === FALSE)
    {
      echo json_encode($data);
      exit();
    }
  }
  public function _validate_hisclient()
  {
    $data = array();
    $data['error_string'] = array();
    $data['inputerror'] = array();
    $data['status'] = TRUE;
    if($this->input->post('product') == '')
    {
      $data['inputerror'][] = 'product';
      $data['error_string'][] = 'Product Cannot be Null';
      $data['status'] = FALSE;
    }
    if($this->input->post('client') == '')
    {
      $data['inputerror'][] = 'client';
      $data['error_string'][] = 'Client Cannot be Null';
      $data['status'] = FALSE;
    }
    if($this->input->post('perstart') == '')
    {
      $data['inputerror'][] = 'perstart';
      $data['error_string'][] = 'Date Start Cannot be Null';
      $data['status'] = FALSE;
    }
    if($this->input->post('perend') == '')
    {
      $data['inputerror'][] = 'perend';
      $data['error_string'][] = 'Date End Cannot be Null';
      $data['status'] = FALSE;
    }
    if($data['status'] === FALSE)
    {
      echo json_encode($data);
      exit();
    }
  }
}