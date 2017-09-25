<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Clients extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Clients_Model'); 
		}
		
		public function index()
		{
			$data = array
			(
				'webpage_title' => 'Clients',
				'clients' => $this->Clients_Model->get_clients()
			);
			
			$this->load->template('clients/view_clients', $data);
		}
		
		public function add_clients()
		{
			$data = array
			(
				'webpage_title' => 'Add client'
			);
			
			$this->load->template('clients/add_clients', $data);
		}	
	}
	
?>