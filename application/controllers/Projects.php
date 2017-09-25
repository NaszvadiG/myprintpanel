<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Projects extends CI_Controller
	{
		public $ActiveCollab_Authenticator 	= 	null;
		public $ActiveCollab_Accounts 			= 	null;
		public $ActiveCollab_Token 				= 	null;
		public $ActiveCollab_Client 			= 	null;
		
		public function __construct()
		{
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->model('Clients_Model');
			$this->load->model('Projects_Model');
			
			$this->ActiveCollab_Authenticator = new \ActiveCollab\SDK\Authenticator\Cloud('ACME Inc', 'My Awesome Application', 'george@package7.com', 'Dobre2017');
			$this->ActiveCollab_Token = $this->ActiveCollab_Authenticator->issueToken(150407);
			
			if ($this->ActiveCollab_Token instanceof \ActiveCollab\SDK\TokenInterface) 
			{
				// print $ActiveCollab_Token->getUrl() . "\n";
				// print $ActiveCollab_Token->getToken() . "\n";
				$this->ActiveCollab_Client = new \ActiveCollab\SDK\Client($this->ActiveCollab_Token);
			} 
			else 
			{
				print "Invalid response\n";
				die();
			}
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
					try 
					{
						$activecollab_project = $this->ActiveCollab_Client->post('projects/', ['name' => $this->input->post('project_name'), 'body' => $this->input->post('project_description'), 'labels' => array('NEW')])->getJson();
						$activecollab_project_id = $activecollab_project['single']['id'];
						$this->Projects_Model->update_project(array('activecollab_project_id' => $activecollab_project_id), $this->Projects_Model->_LastId);
					} 
					catch(AppException $e) 
					{
						// print $e->getMessage() . '<br><br>';
						// var_dump($e->getServerResponse()); (need more info?)
					}
					
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
			$project_data = $this->Projects_Model->get_project($project_id);
			$project_tasks_data = $this->Projects_Model->get_project_tasks($project_id);
			$i = 0;
			foreach($project_tasks_data as $task)
			{
				$activecollab = $this->ActiveCollab_Client->get('projects/' . $project_data['activecollab_project_id'] . '/tasks/' . $task['activecollab_project_task_id'])->getJSON();
				
				$project_tasks_data[$i]['activecollab'] = $activecollab['single'];
				$i++;
			}
			
			echo '<pre>';
			print_r($project_tasks_data);
			echo '</pre>';
			
			$data = array
			(
				'webpage_title' => $project_data['project_name'],
				'project' => $project_data,
				'project_tasks' => $project_tasks_data
			);
			
			// echo '<pre>';
			// print_r($this->ActiveCollab_Client->get('labels')->getJSON());
			// echo '</pre>';
			
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
					try 
					{
						$activecollab_project_task = $this->ActiveCollab_Client->post('projects/' . $this->input->post('activecollab_project_id') . '/tasks', ['name' => $this->input->post('project_task_name'), 'body' => $this->input->post('project_task_description'), 'labels' => array('NEW')])->getJson();
						$activecollab_project_task_id = $activecollab_project_task['single']['id'];
						$this->Projects_Model->update_project_task(array('activecollab_project_task_id' => $activecollab_project_task_id), $this->Projects_Model->_LastId);
					} 
					catch(AppException $e) 
					{
						// print $e->getMessage() . '<br><br>';
						// var_dump($e->getServerResponse()); (need more info?)
					}
					
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
	}
	
?>