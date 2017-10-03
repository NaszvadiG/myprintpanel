<?php

	class Team extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Team_Model'); // loading the team model
		}
		
		public function index()
		{
			$data = array
			(
				'webpage_title' => 'Team',
				'team'	=>	$this->Team_Model->get_team($this->session->userdata('account_id'))
			);
			
			$this->load->template('team/view_team', $data);
		}
	}