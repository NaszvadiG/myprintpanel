<?php

	class Projects extends CI_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Projects_Model');
		}
		
		public function add_project()
		{
		}
	}
	
?>