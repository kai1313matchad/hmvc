<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class M_gen extends CI_Model
	{
		//generate number
		public function gen_number($col,$table,$suf)
		{
			$this->db->select_max($col,'code');
			$que = $this->db->get($table);
			$ext = $que->row();
			$max = $ext->code;
			if($max == null)
			{
				$max = $suf.'-00000';
			}
			// $num = (int) substr($max,4,5);
			$num = (int) substr($max,-5);
			$num++;
			$kode = $suf.'-';
			$res = $kode . sprintf('%05s',$num);
			return $res;
		}
	}
?>