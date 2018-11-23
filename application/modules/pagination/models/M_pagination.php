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
	    $this->db->join('mona_prodpict h','h.prod_id = a.prod_id');
	    $this->db->where('h.prodpic_id = (select max(prodpic_id) from mona_prodpict where prod_id = a.prod_id)');
	    $this->db->limit($rowperpage,$rowno);
	    $this->db->order_by('e.prov_name,f.dis_name');
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
	    $this->db->join('mona_prodpict h','h.prod_id = a.prod_id');
	    $this->db->where('h.prodpic_id = (select max(prodpic_id) from mona_prodpict where prod_id = a.prod_id)');
	    $query = $this->db->get();
	    $result = $query->result_array();
	    return $result[0]['allcount'];
	  }

	  public function getProdDataExpensive($rowno,$rowperpage)
	  {
	    $this->db->select('*');
	    $this->db->from('mona_product a');
	    $this->db->join('mona_prodtype b','b.prt_id = a.prt_id');
	    $this->db->join('mona_prodsize c','c.prsz_id = a.prsz_id');
	    $this->db->join('mona_construct_sts d','d.cons_id = a.cons_id');
	    $this->db->join('mona_province e','e.prov_id = a.prov_id');
	    $this->db->join('mona_district f','f.dis_id = a.dis_id');
	    $this->db->join('mona_prodpict h','h.prod_id = a.prod_id');
	    $this->db->where('h.prodpic_id = (select max(prodpic_id) from mona_prodpict where prod_id = a.prod_id)');
	    $this->db->limit($rowperpage,$rowno);
	    $this->db->order_by('a.prod_price','asc');
	    $query = $this->db->get();
	    return $query->result_array();
	  }

	  public function getProdDataCheap($rowno,$rowperpage)
	  {
	    $this->db->select('*');
	    $this->db->from('mona_product a');
	    $this->db->join('mona_prodtype b','b.prt_id = a.prt_id');
	    $this->db->join('mona_prodsize c','c.prsz_id = a.prsz_id');
	    $this->db->join('mona_construct_sts d','d.cons_id = a.cons_id');
	    $this->db->join('mona_province e','e.prov_id = a.prov_id');
	    $this->db->join('mona_district f','f.dis_id = a.dis_id');
	    $this->db->join('mona_prodpict h','h.prod_id = a.prod_id');
	    $this->db->where('h.prodpic_id = (select max(prodpic_id) from mona_prodpict where prod_id = a.prod_id)');
	    $this->db->limit($rowperpage,$rowno);
	    $this->db->order_by('a.prod_price','desc');
	    $query = $this->db->get();
	    return $query->result_array();
	  }

	  public function getProdDataAtoZ($rowno,$rowperpage)
	  {
	    $this->db->select('*');
	    $this->db->from('mona_product a');
	    $this->db->join('mona_prodtype b','b.prt_id = a.prt_id');
	    $this->db->join('mona_prodsize c','c.prsz_id = a.prsz_id');
	    $this->db->join('mona_construct_sts d','d.cons_id = a.cons_id');
	    $this->db->join('mona_province e','e.prov_id = a.prov_id');
	    $this->db->join('mona_district f','f.dis_id = a.dis_id');
	    $this->db->join('mona_prodpict h','h.prod_id = a.prod_id');
	    $this->db->where('h.prodpic_id = (select max(prodpic_id) from mona_prodpict where prod_id = a.prod_id)');
	    $this->db->limit($rowperpage,$rowno);
	    $this->db->order_by('a.prod_name','asc');
	    $query = $this->db->get();
	    return $query->result_array();
	  }

	  public function getProdDataZtoA($rowno,$rowperpage)
	  {
	    $this->db->select('*');
	    $this->db->from('mona_product a');
	    $this->db->join('mona_prodtype b','b.prt_id = a.prt_id');
	    $this->db->join('mona_prodsize c','c.prsz_id = a.prsz_id');
	    $this->db->join('mona_construct_sts d','d.cons_id = a.cons_id');
	    $this->db->join('mona_province e','e.prov_id = a.prov_id');
	    $this->db->join('mona_district f','f.dis_id = a.dis_id');
	    $this->db->join('mona_prodpict h','h.prod_id = a.prod_id');
	    $this->db->where('h.prodpic_id = (select max(prodpic_id) from mona_prodpict where prod_id = a.prod_id)');
	    $this->db->limit($rowperpage,$rowno);
	    $this->db->order_by('a.prod_name','desc');
	    $query = $this->db->get();
	    return $query->result_array();
	  }

	  public function getProdDataFilter($rowno,$rowperpage,$kategori,$location,$size,$text)
	  {
	    $this->db->select('*');
	    $this->db->from('mona_product a');
	    $this->db->join('mona_prodtype b','b.prt_id = a.prt_id');
	    $this->db->join('mona_prodsize c','c.prsz_id = a.prsz_id');
	    $this->db->join('mona_construct_sts d','d.cons_id = a.cons_id');
	    $this->db->join('mona_province e','e.prov_id = a.prov_id');
	    $this->db->join('mona_district f','f.dis_id = a.dis_id');
	    $this->db->join('mona_prodpict h','h.prod_id = a.prod_id');
	    $this->db->where('h.prodpic_id = (select max(prodpic_id) from mona_prodpict where prod_id = a.prod_id)');
	    if ($kategori != '0')
	    {
	    	$this->db->where('a.prt_id',$kategori);
	    }
	    if ($size != '0')
	    {
	    	$this->db->where('a.prsz_id',$size);
	    }
	    if ($location != '0')
	    {
	    	$this->db->where('a.dis_id',$location);
	    }
	    if ($text != '0')
	    {
	    	$this->db->like('a.prod_name',$text);
	    }
	    $this->db->limit($rowperpage,$rowno);
	    $this->db->order_by('a.prod_name');
	    $query = $this->db->get();
	    return $query->result_array();
	  }

	  public function getrecordProdCountFilter($kategori,$location,$size,$text)
	  {
	    $this->db->select('count(*) as allcount');
	    $this->db->from('mona_product a');
	    $this->db->join('mona_prodtype b','b.prt_id = a.prt_id');
	    $this->db->join('mona_prodsize c','c.prsz_id = a.prsz_id');
	    $this->db->join('mona_construct_sts d','d.cons_id = a.cons_id');
	    $this->db->join('mona_province e','e.prov_id = a.prov_id');
	    $this->db->join('mona_district f','f.dis_id = a.dis_id');
	    $this->db->join('mona_prodpict h','h.prod_id = a.prod_id');
	    $this->db->where('h.prodpic_id = (select max(prodpic_id) from mona_prodpict where prod_id = a.prod_id)');
	    if ($kategori != '0')
	    {
	    	$this->db->where('a.prt_id',$kategori);
	    }
	    if ($size != '0')
	    {
	    	$this->db->where('a.prsz_id',$size);
	    }
	    if ($location != '0')
	    {
	    	$this->db->where('a.dis_id',$location);
	    }
	    if ($text != '0')
	    {
	    	$this->db->like('a.prod_name',$text);
	    }
	    $query = $this->db->get();
	    $result = $query->result_array();
	    return $result[0]['allcount'];
 		}

 	  public function getBlogData($rowno,$rowperpage)
	  {
	    $this->db->select('*');
	    $this->db->from('mona_blog');
	    $this->db->where('BLOG_DTSTS','1');
	    $this->db->limit($rowperpage,$rowno);
	    $query = $this->db->get();
	    return $query->result_array();
	  }

	  // Select total records
	  public function getrecordBlogCount()
	  {
	    $this->db->select('count(*) as allcount');
	    $this->db->from('mona_blog');
	    $this->db->where('BLOG_DTSTS','1');
	    $query = $this->db->get();
	    $result = $query->result_array();
	    return $result[0]['allcount'];
	  }	

	  public function getBlogDetail($id)
	  {
	  	$this->db->select('*');
	    $this->db->from('mona_blog');
	    $this->db->where('BLOG_ID',$id);
	    $this->db->where('BLOG_DTSTS','1');
	    $query = $this->db->get();
	    return $query->result_array();
	  }
	}
?>