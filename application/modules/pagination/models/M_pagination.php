<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class M_pagination extends CI_Model 
	{
		// Fetch records
	  public function getProdData($rowno,$rowperpage)
	  {
	    $this->db->select('*');
	    $this->db->from('mona_product a');
	    $this->db->join('mona_prodtype b','b.prt_id = a.prt_id');
	    $this->db->join('mona_prodsize c','c.prsz_id = a.prsz_id');
	    $this->db->join('mona_construct_sts d','d.cons_id = a.cons_id');
	    $this->db->join('mona_province e','e.prov_id = a.prov_id');
	    $this->db->join('mona_district f','f.dis_id = a.dis_id');
	    // $this->db->join('mona_subdistrict g','g.subdis_id = a.subdis_id');
	    $this->db->join('mona_prodpict h','h.prod_id = a.prod_id');
	    $this->db->where('h.prodpic_id = (select max(prodpic_id) from mona_prodpict where prod_id = a.prod_id)');
	    $this->db->limit($rowperpage,$rowno);
	    $this->db->order_by('a.prod_name');
	    $query = $this->db->get();
	    return $query->result_array();
	  }

	  // Select total records
	  public function getrecordProdCount()
	  {
	    $this->db->select('count(*) as allcount');
	    $this->db->from('mona_product a');
	    $this->db->join('mona_prodtype b','b.prt_id = a.prt_id');
	    $this->db->join('mona_prodsize c','c.prsz_id = a.prsz_id');
	    $this->db->join('mona_construct_sts d','d.cons_id = a.cons_id');
	    $this->db->join('mona_province e','e.prov_id = a.prov_id');
	    $this->db->join('mona_district f','f.dis_id = a.dis_id');
	    $this->db->join('mona_subdistrict g','g.subdis_id = a.subdis_id');
	    $this->db->join('mona_prodpict h','h.prod_id = a.prod_id');
	    $this->db->where('h.prodpic_id = (select max(prodpic_id) from mona_prodpict where prod_id = a.prod_id)');
	    $query = $this->db->get();
	    $result = $query->result_array();
	    return $result[0]['allcount'];
	  }
	}
?>