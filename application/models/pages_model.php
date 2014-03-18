<?php
	class Pages_model extends CI_Model {

		public function __construct()
		{
			$this->load->database();
		}

		public function get_page_info($slug)
		{
			$query = $this->db->get_where('pages',array('slug'=>$slug));
			if($query->num_rows()>0)
				return $query->row_array();
			else
			{
				$query = $this->db->get_where('pages',array('slug'=>'index'));
				return $query->row_array();
			}
		}

		public function get_other_info()
		{
			$query = $this->db->get('other_info');
			return $query->row_array();
		}

		public function set_order($data)
		{
			if($this->db->insert('orders',$data))
				return TRUE;
			else
				return FALSE;
		}
	}