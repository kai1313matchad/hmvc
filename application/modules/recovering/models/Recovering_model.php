<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recovering_model extends CI_Model{
	public function readData($page, $limit) 
    {
        $this->db->order_by('CREATED_AT', 'desc');
        $data = $this->db->get('mona_recovering', $limit, $page);
        return $data->result_array();
    }

	public function readRecent() 
    {
        $this->db->order_by('CREATED_AT', 'desc');
        $data = $this->db->get('mona_recovering', 7);
        return $data->result_array();
    }

    public function readDetail($id)
    {
        $data = $this->db->get_where('mona_recovering', array('ID' => $id));
        return $data->row_array();
    }

    public function countData()
    {
        return $this->db->get('mona_recovering')->num_rows();
    }
}