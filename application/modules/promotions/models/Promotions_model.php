<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promotions_model extends CI_Model{
	public function readData($page, $limit) 
    {
        $data = $this->db->get('mona_promotions', $limit, $page)->result_array();
        return $data;
    }

    public function countData()
    {
        return $this->db->get('mona_promotions')->num_rows();
    }
}