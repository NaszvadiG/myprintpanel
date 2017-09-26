<?php

	class Teams extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
		}
		
		public function index()
		{
			$data = array
			(
				'webpage_title' => 'Teams'
			);
			
			$this->load->template('teams/view_teams', $data);
		}
	}
	
?>