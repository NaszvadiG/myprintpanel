<?php

	class Homepage extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			if ( ! $this->session->userdata('logged_in'))
			{ 
				// Allow some methods?
				$allowed = array(
					'some_method_in_this_controller',
					'other_method_in_this_controller',
				);
				if ( ! in_array($this->router->fetch_method(), $allowed))
				{
					redirect('login');
				}
			}
		}
		
		public function index()
		{
			$this->load->view('homepage');
		}
	}
	
?>