<?php
class Categories extends MX_Controller
{
  function __construct()
  {
  	parent::__construct();
    $this->load->model('Dtb_billboardall','billboardall');
    $this->load->model('Dtb_provinceall','provinceall');
    $this->load->model('Dtb_districtall','districtall');
    $this->load->model('Dtb_subdistrictall','subdistrictall');
    $this->load->model('Dtb_sizeall','sizeall');
    $this->load->model('Dtb_constructionall','constructall');
  }
  public function billboard()
  {
  	$this->load->module('templates_');
  	$data['view_module'] = 'categories';
  	$data['view_content'] = 'billboard';
    $data['view_addoncss'] = array('categories_css');
    $data['view_addonjs'] = array('categories_js');
    $data['view_addoncustjs'] = array('billboard_js');
  	$this->templates_->admin($data);
  }

  public function province()
  {
    $this->load->module('templates_');
    $data['view_module'] = 'categories';
    $data['view_content'] = 'province';
    $data['view_addoncss'] = array('categories_css');
    $data['view_addonjs'] = array('categories_js');
    $data['view_addoncustjs'] = array('province_js');
    $this->templates_->admin($data);
  }

  public function district()
  {
    $this->load->module('templates_');
    $data['view_module'] = 'categories';
    $data['view_content'] = 'district';
    $data['view_addoncss'] = array('categories_css');
    $data['view_addonjs'] = array('categories_js');
    $data['view_addoncustjs'] = array('district_js');
    $this->templates_->admin($data);
  }

  public function subdistrict()
  {
    $this->load->module('templates_');
    $data['view_module'] = 'categories';
    $data['view_content'] = 'subdistrict';
    $data['view_addoncss'] = array('categories_css');
    $data['view_addonjs'] = array('categories_js');
    $data['view_addoncustjs'] = array('subdistrict_js');
    $this->templates_->admin($data);
  }

  public function size()
  {
    $this->load->module('templates_');
    $data['view_module'] = 'categories';
    $data['view_content'] = 'billboardsize';
    $data['view_addoncss'] = array('categories_css');
    $data['view_addonjs'] = array('categories_js');
    $data['view_addoncustjs'] = array('billboardsize_js');
    $this->templates_->admin($data);
  }

  public function construct()
  {
    $this->load->module('templates_');
    $data['view_module'] = 'categories';
    $data['view_content'] = 'construct_sts';
    $data['view_addoncss'] = array('categories_css');
    $data['view_addonjs'] = array('categories_js');
    $data['view_addoncustjs'] = array('construct_sts_js');
    $this->templates_->admin($data);
  }

  public function get_billboardall()
  {
    $list = $this->billboardall->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $dat)
    {
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $dat->PRT_NAME;
      $row[] = $dat->PRT_INFO;
      $row[] = '<a href="javascript:void(0)" title="Edit Data" class="btn btn-sm btn-primary btn-responsive" onclick="edit_type('."'".$dat->PRT_ID."'".')"><span class="glyphicon glyphicon-pencil"></span> </a>';
      $row[] = '<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="delete_type('."'".$dat->PRT_ID."'".')"><span class="glyphicon glyphicon-trash"></span> </a>';
      $data[] = $row;
    }
    $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->billboardall->count_all(),
            "recordsFiltered" => $this->billboardall->count_filtered(),
            "data" => $data,
    );      
    echo json_encode($output);
  }

  public function get_provinceall()
  {
    $list = $this->provinceall->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $dat)
    {
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $dat->PROV_NAME;
      $row[] = $dat->PROV_URL;
      $row[] = $dat->PROV_PIC;
      $row[] = '<a href="javascript:void(0)" title="Edit Data" class="btn btn-sm btn-primary btn-responsive" onclick="edit_prov('."'".$dat->PROV_ID."'".')"><span class="glyphicon glyphicon-pencil"></span> </a>';
      $row[] = '<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="delete_prov('."'".$dat->PROV_ID."'".')"><span class="glyphicon glyphicon-trash"></span> </a>';
      $data[] = $row;
    }
    $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->provinceall->count_all(),
            "recordsFiltered" => $this->provinceall->count_filtered(),
            "data" => $data,
    );      
    echo json_encode($output);
  }

  public function get_districtall()
  {
    $list = $this->districtall->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $dat)
    {
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $dat->DIS_NAME;
      $row[] = $dat->DIS_TYPEID;
      // $row[] = $dat->PROV_PIC;
      $row[] = '<a href="javascript:void(0)" title="Edit Data" class="btn btn-sm btn-primary btn-responsive" onclick="edit_district('."'".$dat->DIS_ID."'".')"><span class="glyphicon glyphicon-pencil"></span> </a>';
      $row[] = '<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="delete_district('."'".$dat->DIS_ID."'".')"><span class="glyphicon glyphicon-trash"></span> </a>';
      $data[] = $row;
    }
    $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->districtall->count_all(),
            "recordsFiltered" => $this->districtall->count_filtered(),
            "data" => $data,
    );      
    echo json_encode($output);
  }

  public function get_subdistrictall()
  {
    $list = $this->subdistrictall->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $dat)
    {
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $dat->SUBDIS_NAME;
      $row[] = '<a href="javascript:void(0)" title="Edit Data" class="btn btn-sm btn-primary btn-responsive" onclick="edit_subdistrict('."'".$dat->SUBDIS_ID."'".')"><span class="glyphicon glyphicon-pencil"></span> </a>';
      $row[] = '<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="delete_subdistrict('."'".$dat->SUBDIS_ID."'".')"><span class="glyphicon glyphicon-trash"></span> </a>';
      $data[] = $row;
    }
    $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->subdistrictall->count_all(),
            "recordsFiltered" => $this->subdistrictall->count_filtered(),
            "data" => $data,
    );      
    echo json_encode($output);
  }

  public function get_billboardsizeall()
  {
    $list = $this->sizeall->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $dat)
    {
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $dat->PRSZ_NAME;
      $row[] = $dat->PRSZ_INFO;
      $row[] = '<a href="javascript:void(0)" title="Edit Data" class="btn btn-sm btn-primary btn-responsive" onclick="edit_size('."'".$dat->PRSZ_ID."'".')"><span class="glyphicon glyphicon-pencil"></span> </a>';
      $row[] = '<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="delete_size('."'".$dat->PRSZ_ID."'".')"><span class="glyphicon glyphicon-trash"></span> </a>';
      $data[] = $row;
    }
    $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->sizeall->count_all(),
            "recordsFiltered" => $this->sizeall->count_filtered(),
            "data" => $data,
    );      
    echo json_encode($output);
  }

   public function get_constructall()
  {
    $list = $this->constructall->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $dat)
    {
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $dat->CONS_NAME;
      $row[] = $dat->CONS_INFO;
      $row[] = '<a href="javascript:void(0)" title="Edit Data" class="btn btn-sm btn-primary btn-responsive" onclick="edit_construct('."'".$dat->CONS_ID."'".')"><span class="glyphicon glyphicon-pencil"></span> </a>';
      $row[] = '<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="delete_construct('."'".$dat->CONS_ID."'".')"><span class="glyphicon glyphicon-trash"></span> </a>';
      $data[] = $row;
    }
    $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->constructall->count_all(),
            "recordsFiltered" => $this->constructall->count_filtered(),
            "data" => $data,
    );      
    echo json_encode($output);
  }

  public function save_type()
  {
    if($this->input->post('form_status') == '1')
    {   
        $this->_validate_type();
        $ins = array(
          'prt_id' => $this->input->post('bbtype_id'),
          'prt_name' => $this->input->post('bbtype_name'),
          'prt_info' => $this->input->post('bbtype_info'),
          'prt_dtsts' => '1'
        );
        $insert = $this->db->insert('mona_prodtype',$ins);
        $data['status']=($this->db->affected_rows())?TRUE:FALSE;    
    }
    if($this->input->post('form_status') == '2')
    {
          $upd = array(
            'prt_name' => $this->input->post('bbtype_name'),
            'prt_info' => $this->input->post('bbtype_info'),
            'prt_dtsts' => '1'
          );
          $update = $this->db->update('mona_prodtype',$upd,array('prt_id'=>$this->input->post('bbtype_id')));
          $data['status']=($this->db->affected_rows())?TRUE:FALSE;    
    }
    echo json_encode($data);
  }

  public function save_province()
  {
    if($this->input->post('form_status') == '1')
    {   
        $this->_validate_province();
        $ins = array(
          'prov_id' => $this->input->post('province_id'),
          'prov_name' => $this->input->post('province_name'),
          'prov_url' => $this->input->post('province_url'),
          'prov_pic' => $this->input->post('province_pic'),
          'prov_dtsts' => '1'
        );
        $insert = $this->db->insert('mona_province',$ins);
        $data['status']=($this->db->affected_rows())?TRUE:FALSE;    
    }
    if($this->input->post('form_status') == '2')
    {
          $upd = array(
            'prov_name' => $this->input->post('province_name'),
            'prov_url' => $this->input->post('province_url'),
            'prov_pic' => $this->input->post('province_pic'),
            'prov_dtsts' => '1'
          );
          $update = $this->db->update('mona_province',$upd,array('prov_id'=>$this->input->post('province_id')));
          $data['status']=($this->db->affected_rows())?TRUE:FALSE;    
    }
    echo json_encode($data);
  }

  public function save_district()
  {
    if($this->input->post('form_status') == '1')
    {   
        $this->_validate_district();
        $ins = array(
          'dis_id' => $this->input->post('district_id'),
          'dis_name' => $this->input->post('district_name'),
          'prov_id' => $this->input->post('district_province'),
          'dis_typeid' => $this->input->post('district_type'),
          'dis_dtsts' => '1'
        );
        $insert = $this->db->insert('mona_district',$ins);
        $data['status']=($this->db->affected_rows())?TRUE:FALSE;    
    }
    if($this->input->post('form_status') == '2')
    {
          $upd = array(
            'dis_name' => $this->input->post('district_name'),
            'prov_id' => $this->input->post('district_province'),
            'dis_typeid' => $this->input->post('district_type'),
            'dis_dtsts' => '1'
          );
          $update = $this->db->update('mona_district',$upd,array('dis_id'=>$this->input->post('district_id')));
          $data['status']=($this->db->affected_rows())?TRUE:FALSE;    
    }
    echo json_encode($data);
  }

  public function save_subdistrict()
  {
    if($this->input->post('form_status') == '1')
    {   
        $this->_validate_subdistrict();
        $ins = array(
          'subdis_id' => $this->input->post('subdistrict_id'),
          'subdis_name' => $this->input->post('subdistrict_name'),
          'dis_id' => $this->input->post('subdistrict_district'),
          'subdis_dtsts' => '1'
        );
        $insert = $this->db->insert('mona_subdistrict',$ins);
        $data['status']=($this->db->affected_rows())?TRUE:FALSE;    
    }
    if($this->input->post('form_status') == '2')
    {
          $upd = array(
            'subdis_name' => $this->input->post('subdistrict_name'),
            'dis_id' => $this->input->post('subdistrict_district'),
            'subdis_dtsts' => '1'
          );
          $update = $this->db->update('mona_subdistrict',$upd,array('subdis_id'=>$this->input->post('subdistrict_id')));
          $data['status']=($this->db->affected_rows())?TRUE:FALSE;    
    }
    echo json_encode($data);
  }

  public function save_size()
  {
    if($this->input->post('form_status') == '1')
    {   
        $this->_validate_size();
        $ins = array(
          'prsz_id' => $this->input->post('bbsize_id'),
          'prsz_name' => $this->input->post('bbsize_name'),
          'prsz_info' => $this->input->post('bbsize_info'),
          'prsz_dtsts' => '1'
        );
        $insert = $this->db->insert('mona_prodsize',$ins);
        $data['status']=($this->db->affected_rows())?TRUE:FALSE;    
    }
    if($this->input->post('form_status') == '2')
    {
          $upd = array(
            'prsz_name' => $this->input->post('bbsize_name'),
            'prsz_info' => $this->input->post('bbsize_info'),
            'prsz_dtsts' => '1'
          );
          $update = $this->db->update('mona_prodsize',$upd,array('prsz_id'=>$this->input->post('bbsize_id')));
          $data['status']=($this->db->affected_rows())?TRUE:FALSE;    
    }
    echo json_encode($data);
  }

  public function save_construct()
  {
    if($this->input->post('form_status') == '1')
    {   
        // $this->_validate_size();
        $ins = array(
          'cons_id' => $this->input->post('construct_id'),
          'cons_name' => $this->input->post('construct_name'),
          'cons_info' => $this->input->post('construct_status'),
          'cons_dtsts' => '1'
        );
        $insert = $this->db->insert('mona_construct_sts',$ins);
        $data['status']=($this->db->affected_rows())?TRUE:FALSE;    
    }
    if($this->input->post('form_status') == '2')
    {
          $upd = array(
            'cons_name' => $this->input->post('construct_name'),
            'cons_info' => $this->input->post('construct_status'),
            'cons_dtsts' => '1'
          );
          $update = $this->db->update('mona_construct_sts',$upd,array('cons_id'=>$this->input->post('construct_id')));
          $data['status']=($this->db->affected_rows())?TRUE:FALSE;    
    }
    echo json_encode($data);
  }

  public function del_type($id)
  {
    $del = array(
      'prt_dtsts' => '0'
    );
    $update = $this->db->update('mona_prodtype',$del,array('prt_id'=>$id));
    $data['status']=($this->db->affected_rows())?TRUE:FALSE;
    echo json_encode($data);
  }

  public function del_prov($id)
  {
    $del = array(
      'prov_dtsts' => '0'
    );
    $update = $this->db->update('mona_province',$del,array('prov_id'=>$id));
    $data['status']=($this->db->affected_rows())?TRUE:FALSE;
    echo json_encode($data);
  }

  public function del_district($id)
  {
    $del = array(
      'dis_dtsts' => '0'
    );
    $update = $this->db->update('mona_district',$del,array('dis_id'=>$id));
    $data['status']=($this->db->affected_rows())?TRUE:FALSE;
    echo json_encode($data);
  }

  public function del_subdistrict($id)
  {
    $del = array(
      'subdis_dtsts' => '0'
    );
    $update = $this->db->update('mona_subdistrict',$del,array('subdis_id'=>$id));
    $data['status']=($this->db->affected_rows())?TRUE:FALSE;
    echo json_encode($data);
  }

  public function del_size($id)
  {
    $del = array(
      'prsz_dtsts' => '0'
    );
    $update = $this->db->update('mona_prodsize',$del,array('prsz_id'=>$id));
    $data['status']=($this->db->affected_rows())?TRUE:FALSE;
    echo json_encode($data);
  }

  public function del_construct($id)
  {
    $del = array(
      'cons_dtsts' => '0'
    );
    $update = $this->db->update('mona_construct_sts',$del,array('cons_id'=>$id));
    $data['status']=($this->db->affected_rows())?TRUE:FALSE;
    echo json_encode($data);
  }

  public function _validate_type()
  {
    $data = array();
    $data['error_string'] = array();
    $data['inputerror'] = array();
    $data['status'] = TRUE;

    if($this->input->post('bbtype_id') == '')
    {
      $data['inputerror'][] = 'bbtype_id';
      $data['error_string'][] = 'Type ID Tidak Boleh Kosong';
      $data['status'] = FALSE;
    }

    if($this->input->post('form_status') == '1')
    {
      $this->form_validation->set_rules('bbtype_id', 'bbtype_id', 'is_unique[mona_prodtype.PRT_ID]');
      if($this->form_validation->run() == FALSE)
      {
        $data['inputerror'][] = 'bbtype_id';
        $data['error_string'][] = 'Type ID Sudah Terpakai';
        $data['status'] = FALSE;
      }
    }
    
    if($data['status'] === FALSE)
    {
      echo json_encode($data);
      exit();
    }
  }

   public function _validate_province()
  {
    $data = array();
    $data['error_string'] = array();
    $data['inputerror'] = array();
    $data['status'] = TRUE;

    if($this->input->post('province_id') == '')
    {
      $data['inputerror'][] = 'province_id';
      $data['error_string'][] = 'Type ID Tidak Boleh Kosong';
      $data['status'] = FALSE;
    }

    if($this->input->post('form_status') == '1')
    {
      $this->form_validation->set_rules('province_id', 'prov_id', 'is_unique[mona_province.PROV_ID]');
      if($this->form_validation->run() == FALSE)
      {
        $data['inputerror'][] = 'province_id';
        $data['error_string'][] = 'Type ID Sudah Terpakai';
        $data['status'] = FALSE;
      }
    }

    if($data['status'] === FALSE)
    {
      echo json_encode($data);
      exit();
    }
  }

   public function _validate_district()
  {
    $data = array();
    $data['error_string'] = array();
    $data['inputerror'] = array();
    $data['status'] = TRUE;

    if($this->input->post('district_id') == '')
    {
      $data['inputerror'][] = 'district_id';
      $data['error_string'][] = 'District ID Tidak Boleh Kosong';
      $data['status'] = FALSE;
    }

    if($this->input->post('form_status') == '1')
    {
      $this->form_validation->set_rules('district_id', 'dis_id', 'is_unique[mona_district.DIS_ID]');
      if($this->form_validation->run() == FALSE)
      {
        $data['inputerror'][] = 'district_id';
        $data['error_string'][] = 'Type ID Sudah Terpakai';
        $data['status'] = FALSE;
      }
    }

    if($data['status'] === FALSE)
    {
      echo json_encode($data);
      exit();
    }
  }

  public function _validate_subdistrict()
  {
    $data = array();
    $data['error_string'] = array();
    $data['inputerror'] = array();
    $data['status'] = TRUE;

    if($this->input->post('subdistrict_id') == '')
    {
      $data['inputerror'][] = 'subdistrict_id';
      $data['error_string'][] = 'Subdistrict ID Tidak Boleh Kosong';
      $data['status'] = FALSE;
    }

    if($this->input->post('form_status') == '1')
    {
      $this->form_validation->set_rules('subdistrict_id', 'subdis_id', 'is_unique[mona_subdistrict.SUBDIS_ID]');
      if($this->form_validation->run() == FALSE)
      {
        $data['inputerror'][] = 'subdistrict_id';
        $data['error_string'][] = 'Subdistrict ID Sudah Terpakai';
        $data['status'] = FALSE;
      }
    }

    if($data['status'] === FALSE)
    {
      echo json_encode($data);
      exit();
    }
  }

  public function _validate_size()
  {
    $data = array();
    $data['error_string'] = array();
    $data['inputerror'] = array();
    $data['status'] = TRUE;

    if($this->input->post('form_status') == '1')
    {
      $this->form_validation->set_rules('bbsize_id', 'prsz_id', 'is_unique[mona_prodtype.PRSZ_ID]');
      if($this->form_validation->run() == FALSE)
      {
        $data['inputerror'][] = 'bbsize_id';
        $data['error_string'][] = 'Size ID Sudah Terpakai';
        $data['status'] = FALSE;
      }
    }
    
    if($data['status'] === FALSE)
    {
      echo json_encode($data);
      exit();
    }
  }

  public function _validate_construct()
  {
    $data = array();
    $data['error_string'] = array();
    $data['inputerror'] = array();
    $data['status'] = TRUE;

    if($this->input->post('form_status') == '1')
    {
      $this->form_validation->set_rules('construct_id', 'cons_id', 'is_unique[mona_prodtype.CONS_ID]');
      if($this->form_validation->run() == FALSE)
      {
        $data['inputerror'][] = 'construct_id';
        $data['error_string'][] = 'Construct STS ID Sudah Terpakai';
        $data['status'] = FALSE;
      }
    }
    
    if($data['status'] === FALSE)
    {
      echo json_encode($data);
      exit();
    }
  }

  public function get_bbtypetoedit($id)
    {
      $data = $this->billboardall->get_by_id('mona_prodtype',array('prt_id'=>$id));
      echo json_encode($data);
    }

  public function get_provincetoedit($id)
    {
      $data = $this->provinceall->get_by_id('mona_province',array('prov_id'=>$id));
      echo json_encode($data);
    }

  public function get_districttoedit($id)
    {
      $data = $this->districtall->get_by_id('mona_district',array('dis_id'=>$id));
      echo json_encode($data);
    }

  public function get_subdistricttoedit($id)
    {
      $data = $this->subdistrictall->get_by_id('mona_subdistrict',array('subdis_id'=>$id));
      echo json_encode($data);
    }

  public function get_bbsizetoedit($id)
    {
      $data = $this->sizeall->get_by_id('mona_prodsize',array('prsz_id'=>$id));
      echo json_encode($data);
    }

  public function get_constructtoedit($id)
    {
      $data = $this->constructall->get_by_id('mona_construct_sts',array('cons_id'=>$id));
      echo json_encode($data);
    }

  public function get_dropprov($tb)
  {
    //$data = $this->db->order_by('prov_name')->get($tb)->result();
    $data = $this->provinceall->order_by('mona_province','prov_name');
    echo json_encode($data);
  }

  public function get_dropdistrict()
  {
    $data = $this->districtall->order_by('mona_district','dis_name');
    echo json_encode($data);
  }
}