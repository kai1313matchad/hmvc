<?php
class Contactus extends MX_Controller
{
  function __construct()
  {
  	parent::__construct();
    $this->load->model('Contactus_model','contactus');
    $this->load->library('email');
    $this->load->helper('email');
  }

  public function index()
  {
  	$this->load->module('templates_');

  	$data['view_module'] = 'contactus';
  	$data['view_content'] = 'contactus';
    $data['view_addoncss'] = array('contactus_css');
    $data['view_addonjs'] = array('contactus_js');
    $data['view_addoncustjs'] = array('contactus_custjs');
    
    // $data['story'] = $this->Contactus_model->read('mona_store');
  	$this->templates_->shop($data);
  }

  public function readMap()
  {
    $data = $this->db->get('mona_store')->result();
    echo json_encode($data);
  }

  public function simpanContactUs()
  {
    $data = array(
          'ctc_name' => $this->input->post('contact_name'),
          'ctc_phone' => $this->input->post('contact_phone'),
          'ctc_mail' => $this->input->post('contact_mail'),
          'ctc_text' => $this->input->post('contact_message'),
          'ctc_dtsts' => '1'
      ); 
    $insert = $this->db->insert('mona_contactus',$data);
    $data['status']=$insert;

    $email = array();
    $member = array();
   
    // $que = $this->db->get_where('mona_store',array('store_id'=>1));
    // $res = $que->row();
    // $email[] = $res->STORE_EMAIL;
    // $dest = implode(', ', $email);
    $dest='rudy_s@match-advertising.com';
      
    $this->email_conf();
    $from = 'systemmatch@match-advertising.com';
    $to = $dest;
    $subj = 'Contact Us Matchad Online';
    $content = 'Dear Team <br> Diberitahukan bahwa ada calon customer yang menghubungi kita dengan data sebagai berikut<br>
      <table>
        <tr>
          <td>Nama Customer</td>
          <td>
            : '.$this->input->post('contact_name').'
          </td>
        </tr>
        <tr>
          <td>Nomor Telepon</td>
          <td>
            : '.$this->input->post('contact_phone').'
          </td>
        </tr>
        <tr>
          <td>E-mail</td>
          <td>
            : '.$this->input->post('contact_mail').'
          </td>
        </tr>
        <tr>
          <td>Pesan yang ditulis</td>
          <td>
            : '.$this->input->post('contact_message').'
          </td>
        </tr>
      </table>
      <br>Diharapkan perhatiannya';
    $this->email_content($from,$to,$subj,$content);
    // $this->email->send();
    $data['message'] = "Sorry Unable to send email..."; 
    $send = $this->email->send();
    if($send){     
     $data['message'] = "Mail sent...";   
    } 
    // echo json_encode(array("status" => TRUE));
    echo json_encode($data);
  }

  public function email_conf()
    {
      $config = array (
          'protocol'  => 'smtp',          
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'systemmatch@match-advertising.com',
            'smtp_pass' => 'Rahasia2018',
            'mailtype'  => 'html',
            'charset'   => 'utf-8'
        );
      $this->email->initialize($config);  
    }

    public function email_content($from,$to,$subj,$content)
    {   
      $this->email->set_newline("\r\n");
      $this->email->to($to);
      $this->email->from($from);
      $this->email->subject($subj);
      $this->email->message($content);
    } 
}