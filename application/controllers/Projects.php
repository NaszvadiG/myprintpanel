<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Projects extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			
			if ( ! $this->session->userdata('account_loggedin'))
			{ 
				$allowed = array(
					'some_method_in_this_controller',
					'other_method_in_this_controller',
				);
				if ( ! in_array($this->router->fetch_method(), $allowed))
				{
					redirect('login');
				}
			}
			
			$this->load->library('form_validation');
			$this->load->library('pagination');
			$this->load->model('Clients_Model');
			$this->load->model('Projects_Model');
		}
		
		public function index()
		{
			
			
			// echo '<pre>';
			// print_r($client->get('/projects/10/tasks')->getJson());
			// echo '</pre>';
			// echo '<pre>';
			// print_r($authenticator);
			// echo '</pre>';
					
					
			$data = array
			(
				'webpage_title' => 'Available project',
				'projects' => $this->Projects_Model->get_projects(),
				'clients' => $this->Clients_Model->get_clients()
			);
			
			$this->load->template('projects/view_projects', $data);
		}
		
		public function add_project()
		{
			$this->form_validation->set_rules('project_name', 'Name', 'required');
			$this->form_validation->set_rules('project_description', 'Description', 'required');
			
			if($this->form_validation->run() === FALSE)
			{
				echo validation_errors();
			}
			else
			{
				$data = array
				(
					'account_id' => $this->session->userdata('account_id'),
					'project_name' => $this->input->post('project_name'),
					'project_description' => $this->input->post('project_description'),
					'project_created' => date('Y-m-d H:i:s')
				);
				
				if($this->Projects_Model->add_project($data)==true)
				{
					$response = array
					(
						'status' => 200,
						'url' => base_url('projects/view/' . $this->Projects_Model->_LastId)
					);
					
					header('Content-Type: application/json');
					echo json_encode($response);
				}
				else
				{
					echo 'not ok';
				}
			}
		}
		
		public function view_project($project_id)
		{
			$config['base_url'] = 'http://example.com/index.php/test/page/';
$config['total_rows'] = 200;
$config['per_page'] = 20;

$this->pagination->initialize($config);

			$project_data = $this->Projects_Model->get_project($project_id);
			$project_tasks_data = $this->Projects_Model->get_project_tasks($project_id);
			
			$data = array
			(
				'webpage_title' => $project_data['project_name'],
				'project' => $project_data,
				'project_tasks' => $project_tasks_data
			);
			
			$this->load->template('projects/view_project', $data);
		}
		
		public function add_project_milestone()
		{
			/*$data = array
			(
				'project_id'	=>	$this->input->post('project_id'),
				'account_id'	=>	$this->session->userdata('account_id'),
				'project_milestone_name'	=>	$this->input->post('project_milestone_name')
			);
			
			$this->Projects_Model->add_projects_milestones($data);*/
			
			print_r($_POST);
		}
		
		public function add_project_task()
		{
			$this->form_validation->set_rules('project_task_name', 'Name', 'required');
			$this->form_validation->set_rules('project_task_description', 'Description', 'required');
			
			if($this->form_validation->run() === FALSE)
			{
				echo validation_errors();
			}
			else
			{
				$data = array
				(
					'project_id'				=>	$this->input->post('project_id'),
					'account_id'				=>	$this->session->userdata('account_id'),
					'project_task_name' 		=> 	$this->input->post('project_task_name'),
					'project_task_description' 	=> 	$this->input->post('project_task_description'),
					'project_task_created'		=>	get_current_datetime()
				);
				
				if($this->Projects_Model->add_project_task($data)==true)
				{
					$response = array
					(
						'status' => 200,
						'url' => base_url('projects/view/' . $this->input->post('project_id'))
					);
					
					header('Content-Type: application/json');
					echo json_encode($response);
				}
				else
				{
					echo 'not ok';
				}
			}
		}
		
		public function delete_project($project_id)
		{
			$this->load->template('delete_project', $data);
		}
		
		public function view_project_task($project_id, $project_task_id)
		{
			$data = $this->Projects_Model->get_project_task($project_id, $project_task_id);
			$this->load->template('projects/view_project_task', $data);
		}
		
		public function add_project_discussion()
		{
			$this->form_validation->set_rules('project_discussion_content', 'Content', 'required');
			
			if($this->form_validation->run() === FALSE)
			{
				echo validation_errors();
			}
			else
			{
				
				echo 'bine ba';
			}
		}
	}
	
?>