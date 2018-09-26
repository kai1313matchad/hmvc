<?php
class Pagination extends MX_Controller
{
  function __construct()
  {
  	parent::__construct();
    $this->load->model('M_pagination','pgn');
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
    foreach ($records as $res)
    {
      # code...
    }

    //Pagination Config
    $config['base_url'] = base_url().'Pagination/loadProdRecord';
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
    $config['base_url'] = base_url().'Pagination/loadProdRecord';
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
    $config['base_url'] = base_url().'Pagination/loadProdRecord';
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
    $config['base_url'] = base_url().'Pagination/loadProdRecord';
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
    $config['base_url'] = base_url().'Pagination/loadProdRecord';
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
}