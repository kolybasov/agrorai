<?php
	class Admin_model extends CI_Model {

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

		public function get_new_orders()
		{
			$this->db->select('order_id');
			$query = $this->db->get_where('orders',array('is_new'=>'1'));
			$count = $query->num_rows;
			if($count > 0)
				return $count;
			else
				return '';
		}

		public function get_orders($cat)
		{
            if($cat == 'new')
                $this->db->where('is_new',1);
            else if($cat == 'archive')
                $this->db->where('is_archived',1);
            else
                $this->db->where('is_archived',0);
			$query = $this->db->get('orders');
			return $query->result_array();
		}

		public function set_old_order($id)
		{
            foreach($id as $order_id)
            {
                $this->db->where('order_id',$order_id);
                if(!$this->db->update('orders',array('is_new'=>0)))
                    return FALSE;
            }
            return TRUE;
		}

        public function set_archive_order($id)
        {
            foreach($id as $order_id)
            {
                $this->db->where('order_id',$order_id);
                if(!$this->db->update('orders',array('is_archived'=>1)))
                    return FALSE;
            }
            return TRUE;
        }

        public function delete_order($id)
        {
            foreach($id as $order_id)
            {
                if(!$this->db->delete('orders',array('order_id'=>$order_id)))
                    return FALSE;
            }
            return TRUE;
        }

		public function get_order($id)
		{
			$query = $this->db->get_where('orders',array('order_id'=>$id));
			return $query->row_array();
		}

        public function update_prices($data)
        {
            $this->db->where('info_id', 1);
            if($this->db->update('other_info',$data))
                return TRUE;
            else
                return FALSE;
        }

        public function update_info($data)
        {
            $this->db->where('info_id', 1);
            if($this->db->update('other_info',$data))
                return TRUE;
            else
                return FALSE;
        }

        public function get_info($select)
        {
            if($select == 'prices')
                $this->db->select('bean_price, oil_price');
            else
                $this->db->select('email, phone, name');
            $query = $this->db->get('other_info');
            return $query->row_array();
        }
	}