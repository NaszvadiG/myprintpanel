<?php

	class Clients_Model extends CI_Model
	{
		
		public function get_clients()
		{
			try {
				$query = $this->db->select('*')->from('clients')->get()->result_array();
				return $query;
			} catch(Exception $ex) {
			}
		}
	}
	
?>