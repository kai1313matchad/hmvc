<?php
class Pagination extends MX_Controller
{
  function __construct()
  {
  	parent::__construct();
    $this->load->model('M_pagination','pgn');
    $this->load->helper('text');
    $this->load->helper('tglindo_helper');
    // $this->load->model('Post_model');
  }
  public function loadProdRecord($rowno=0)
  {
    $rowperpage = 12;
  	//Row Position
    if($rowno != 0)
    {
      $rowno = ($rowno-1) * $rowperpage;
    }

    //All Records Count
    $allcount = $this->pgn->getrecordProdCount();

    //Get Records
    $records = $this->pgn->getProdData($rowno,$rowperpage);
    // foreach ($records as $res)
    // {
    //   # code...
    // }

    //Pagination Config
    $config['base_url'] = base_url().'Pagination/loadProdRecord';
    $config['use_page_numbers'] = TRUE;
    $config['total_rows'] = $allcount;
    $config['per_page'] = $rowperpage;
    $config['first_link'] = '<<';
    $config['last_link'] = '>>';
    $config['cur_tag_open'] = '<a href="" class="item-pagination flex-c-m trans-0-4 active-pagination">';
    $config['cur_tag_close'] = '</a>';
    $config['attributes'] = array('class' => 'item-pagination flex-c-m trans-0-4');
    $this->pagination->initialize($config);

    //Initial array
    $data['pagination'] = $this->pagination->create_links();
    $data['result'] = $records;
    $data['row'] = $rowno;

    echo json_encode($data);
  }

  public function loadProdRecordtoexpensive($rowno=0)
  {
    $rowperpage = 12;
    //Row Position
    if($rowno != 0)
    {
      $rowno = ($rowno-1) * $rowperpage;
    }

    //All Records Count
    $allcount = $this->pgn->getrecordProdCount();

    //Get Records
    $records = $this->pgn->getProdDataExpensive($rowno,$rowperpage);
    foreach ($records as $res)
    {
      # code...
    }

    //Pagination Config
    $config['base_url'] = base_url().'Pagination/loadProdRecordtoexpensive';
    $config['use_page_numbers'] = TRUE;
    $config['total_rows'] = $allcount;
    $config['per_page'] = $rowperpage;
    $config['first_link'] = '<<';
    $config['last_link'] = '>>';
    $config['cur_tag_open'] = '<a href="" class="item-pagination flex-c-m trans-0-4 active-pagination">';
    $config['cur_tag_close'] = '</a>';
    $config['attributes'] = array('class' => 'item-pagination flex-c-m trans-0-4');
    $this->pagination->initialize($config);

    //Initial array
    $data['pagination'] = $this->pagination->create_links();
    $data['result'] = $records;
    $data['row'] = $rowno;

    echo json_encode($data);
  }

  public function loadProdRecordtocheap($rowno=0)
  {
    $rowperpage = 12;
    //Row Position
    if($rowno != 0)
    {
      $rowno = ($rowno-1) * $rowperpage;
    }

    //All Records Count
    $allcount = $this->pgn->getrecordProdCount();

    //Get Records
    $records = $this->pgn->getProdDataCheap($rowno,$rowperpage);
    foreach ($records as $res)
    {
      # code...
    }

    //Pagination Config
    $config['base_url'] = base_url().'Pagination/loadProdRecordtocheap';
    $config['use_page_numbers'] = TRUE;
    $config['total_rows'] = $allcount;
    $config['per_page'] = $rowperpage;
    $config['first_link'] = '<<';
    $config['last_link'] = '>>';
    $config['cur_tag_open'] = '<a href="" class="item-pagination flex-c-m trans-0-4 active-pagination">';
    $config['cur_tag_close'] = '</a>';
    $config['attributes'] = array('class' => 'item-pagination flex-c-m trans-0-4');
    $this->pagination->initialize($config);

    //Initial array
    $data['pagination'] = $this->pagination->create_links();
    $data['result'] = $records;
    $data['row'] = $rowno;

    echo json_encode($data);
  }

  public function loadProdRecordAtoZ($rowno=0)
  {
    $rowperpage = 12;
    //Row Position
    if($rowno != 0)
    {
      $rowno = ($rowno-1) * $rowperpage;
    }

    //All Records Count
    $allcount = $this->pgn->getrecordProdCount();

    //Get Records
    $records = $this->pgn->getProdDataAtoZ($rowno,$rowperpage);
    foreach ($records as $res)
    {
      # code...
    }

    //Pagination Config
    $config['base_url'] = base_url().'Pagination/loadProdRecordAtoZ';
    $config['use_page_numbers'] = TRUE;
    $config['total_rows'] = $allcount;
    $config['per_page'] = $rowperpage;
    $config['first_link'] = '<<';
    $config['last_link'] = '>>';
    $config['cur_tag_open'] = '<a href="" class="item-pagination flex-c-m trans-0-4 active-pagination">';
    $config['cur_tag_close'] = '</a>';
    $config['attributes'] = array('class' => 'item-pagination flex-c-m trans-0-4');
    $this->pagination->initialize($config);

    //Initial array
    $data['pagination'] = $this->pagination->create_links();
    $data['result'] = $records;
    $data['row'] = $rowno;

    echo json_encode($data);
  }

  public function loadProdRecordZtoA($rowno=0)
  {
    $rowperpage = 12;
    //Row Position
    if($rowno != 0)
    {
      $rowno = ($rowno-1) * $rowperpage;
    }

    //All Records Count
    $allcount = $this->pgn->getrecordProdCount();

    //Get Records
    $records = $this->pgn->getProdDataZtoA($rowno,$rowperpage);
    foreach ($records as $res)
    {
      # code...
    }

    //Pagination Config
    $config['base_url'] = base_url().'Pagination/loadProdRecordZtoA';
    $config['use_page_numbers'] = TRUE;
    $config['total_rows'] = $allcount;
    $config['per_page'] = $rowperpage;
    $config['first_link'] = '<<';
    $config['last_link'] = '>>';
    $config['cur_tag_open'] = '<a href="" class="item-pagination flex-c-m trans-0-4 active-pagination">';
    $config['cur_tag_close'] = '</a>';
    $config['attributes'] = array('class' => 'item-pagination flex-c-m trans-0-4');
    $this->pagination->initialize($config);

    //Initial array
    $data['pagination'] = $this->pagination->create_links();
    $data['result'] = $records;
    $data['row'] = $rowno;

    echo json_encode($data);
  }

  public function loadProdRecordFilter($rowno=0)
  {
    $rowperpage = 12;
    //Row Position
    if($rowno != 0)
    {
      $rowno = ($rowno-1) * $rowperpage;
    }
    $kat = $this->input->post('ctg');
    $loc = $this->input->post('loc');
    $siz = $this->input->post('siz');
    $txt = $this->input->post('prod_name');
    //All Records Count
    $allcount = $this->pgn->getrecordProdCountFilter($kat,$loc,$siz,$txt);
    //Get Records
    $records = $this->pgn->getProdDataFilter($rowno,$rowperpage,$kat,$loc,$siz,$txt);
    //Pagination Config
    $config['base_url'] = base_url().'Pagination/loadProdRecordFilter';
    $config['use_page_numbers'] = TRUE;
    $config['total_rows'] = $allcount;
    $config['per_page'] = $rowperpage;
    $config['cur_tag_open'] = '<a href="" class="item-pagination flex-c-m trans-0-4 active-pagination">';
    $config['cur_tag_close'] = '</a>';
    $config['attributes'] = array('class' => 'item-pagination flex-c-m trans-0-4');
    $this->pagination->initialize($config);
    //Initial array
    $data['pagination'] = $this->pagination->create_links();
    $data['result'] = $records;
    $data['row'] = $rowno;
    echo json_encode($data);
  }

  public function loadBlogRecord($rowno=0)
  {
    $rowperpage = 3;
    //Row Position
    if($rowno != 0)
    {
      $rowno = ($rowno - 1) * $rowperpage;
    }

    //All Records Count
    $allcount = $this->pgn->getrecordBlogCount();

    //Get Records
    $records = $this->pgn->getBlogData($rowno,$rowperpage);
    // foreach ($records as $res)
    // {
    //   # code...
    // }

    //Pagination Config
    // $config['base_url'] = base_url('Blogpost/index/');
    // $config['use_page_numbers'] = TRUE;
    // $config['total_rows'] = $allcount;
    // $config['per_page'] = $rowperpage;
    // $config['first_link'] = '<<';
    // $config['last_link'] = '>>';
    // $config['cur_tag_open'] = '<a href="" class="item-pagination flex-c-m trans-0-4 active-pagination">';
    // $config['cur_tag_close'] = '</a>';
    // $config['attributes'] = array('class' => 'item-pagination flex-c-m trans-0-4');

    $config['base_url'] = base_url('Pagination/loadBlogRecord/');
    $config['total_rows'] = $allcount;
    $config['per_page'] = 3;

    $config['num_tag_open'] = '<li>';
    $config['num_tag_close']= '</li>';
    $config['first_link'] = '<<';
    $config['last_link'] = '>>';
    $config['prev_link']    = '&lt;';
    $config['prev_tag_open']='<li>';
    $config['prev_tag_close']='</li>';
    $config['next_link']    = '&gt;';
    $config['next_tag_open']='<li>';
    $config['next_tag_close']='</li>';
    // $config['cur_tag_open']='<li class="active disabled"><a href="#">';
    // $config['cur_tag_close']='</a></li>';
    $config['cur_tag_open'] = '<a href="" class="item-pagination flex-c-m trans-0-4 active-pagination">';
    $config['cur_tag_close'] = '</a>';
    $config['first_tag_open']='<li>';
    $config['first_tag_close']='</li>';
    $config['last_tag_open']='<li>';
    $config['last_tag_close']='</li>';
    $config['attributes'] = array('class' => 'item-pagination flex-c-m trans-0-4');
    $this->pagination->initialize($config);

    //Initial array
    $data['pagination'] = $this->pagination->create_links();
    $data['result'] = $records;
    $data['row'] = $rowno;

    echo json_encode($data);
  }
  function ajax_picktgl($tgl)
  {
    $data['tgl']=tgl_indo($tgl);
    echo json_encode($data);
  }
}