<?php

	class Teams extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Teams_Model');
		}
		
		public function index()
		{
			$data = array
			(
				'webpage_title' => 'Teams',
				'style' => ' be-color-header be-color-header-warning',
				'members' => $this->Teams_Model->get_team($this->session->userdata('account_id'))
			);
			
			$this->load->template('teams/view_teams', $data);
		}
		
		public function add_member($account_id)
		{
			echo 'aici se adauga membrii';
		}
	}
	
?>