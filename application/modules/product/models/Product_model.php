<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Product_model extends CI_Model{
	  public function readData($page, $limit, $filter) {
      // echo"<pre>";print_r($filter);die;
      $this->db->select('*');
      $this->db->from('mona_product');
      $this->db->join('mona_prodpict', 'mona_prodpict.PROD_ID = mona_product.PROD_ID');
      $this->db->join('mona_prodtype', 'mona_prodtype.PRT_ID = mona_product.PRT_ID', 'left');
      $this->db->join('mona_prodsize', 'mona_prodsize.PRSZ_ID = mona_product.PRSZ_ID', 'left');
      if ($filter['search'] != '') {
        $this->db->like('mona_product.PROD_NAME', $filter['search']);
      }
      if ($filter['category'] != '') {
        $this->db->where('mona_prodtype.PRT_ID', $filter['category']);
      }
      if ($filter['size'] != '') {
        $this->db->where('mona_prodsize.PRSZ_ID', $filter['size']);
      }
      if ($filter['city'] != '') {
        $this->db->where('mona_product.DIS_ID', $filter['city']);
        $this->db->or_where('mona_product.PROV_ID', $filter['city']);
      }
      $this->db->limit($page, $limit);
      if ($filter['sort'] == 'sortNameASC' || $filter['sort'] == 'sortNameDESC') {
        $this->db->order_by('mona_product.PROD_NAME', $filter['sort'] == 'sortNameASC' ? 'ASC' : 'DESC');
      }
      else if ($filter['sort'] == 'sortPriceASC' || $filter['sort'] == 'sortPriceDESC') {
        $this->db->order_by('mona_product.PROD_PRICE', $filter['sort'] == 'sortPriceASC' ? 'ASC' : 'DESC');
      }
      else {
        $this->db->order_by('mona_product.PROD_ID', 'DESC');
      }
      $data = $this->db->get()->result_array();
      return $data;
    }

    public function countData($filter) {
      $this->db->select('*');
      $this->db->from('mona_product');
      $this->db->join('mona_prodpict', 'mona_prodpict.PROD_ID = mona_product.PROD_ID');
      $this->db->join('mona_prodtype', 'mona_prodtype.PRT_ID = mona_product.PRT_ID', 'left');
      $this->db->join('mona_prodsize', 'mona_prodsize.PRSZ_ID = mona_product.PRSZ_ID', 'left');
      $this->db->where('mona_product.PROD_STS', 1);
      if ($filter['search'] != '') {
        $this->db->like('mona_product.PROD_NAME', $filter['search']);
      }
      if ($filter['category'] != '') {
        $this->db->where('mona_prodtype.PRT_ID', $filter['category']);
      }
      if ($filter['size'] != '') {
        $this->db->where('mona_prodsize.PRSZ_ID', $filter['size']);
      }
      if ($filter['city'] != '') {
        $this->db->where('mona_product.DIS_ID', $filter['city']);
        $this->db->or_where('mona_product.PROV_ID', $filter['city']);
      }
      $data = $this->db->get()->num_rows();
      return $data;
    }
}