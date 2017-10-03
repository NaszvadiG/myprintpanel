<?php

	class Team_Model extends CI_Model
	{
		public $_Rows = NULL;
		
		public function __construct()
		{
			parent::__construct();
		}
		
		public function get_team($account_id)
		{
			$query = $this->db->select('*')->get_where('accounts', array('account_parent' => $account_id));
			
			if($query->num_rows()==0)
			{
				return false;
			}
			else
			{
				return $query->result_array();
			}
		}
	}