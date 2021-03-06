<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Projects_Model extends CI_Model
	{
		public $_LastId = NULL;
		
		public function __construct()
		{
			parent::__construct();
		}
		
		
		/* 
		* 
		*/
		
		public function add_project($data)
		{
			try 
			{
				$query = $this->db->insert('projects', $data);
				
				// check if any row was affected by the insert as there is 
				// no process of finding out if the insert took place or not
				// @george
				
				if($this->db->affected_rows() == 0)
				{
					return false;
				}
				else
				{
					$this->_LastId = $this->db->insert_id();
					return true;
				}
			}
			catch(Exception $ex)
			{
				throw new Exception($ex->getMessage());
			}
		}
		
		public function update_project($data, $id = NULL)
		{
			try 
			{
				if($id==NULL)
				{
				}
				else
				{
					$query = $this->db->where('project_id', $id)->update('projects', $data);
				}
				
				if($this->db->affected_rows() == 0)
				{
					return false;
				}
				else
				{
					return true;
				}
			}
			catch(Exception $ex)
			{
				throw new Exception($ex->getMessage());
			}
		}
		
		public function get_client_id($account_id)
		{
			try
			{
				$query = $this->db->select('account_parent')->get_where('accounts', array('account_id' => $account_id));
				
				if($query->num_rows() == 1)
				{
					$result = $query->row_array();
					
					// account is owner, we can proceed on retriving the client_id
					if(empty($result['account_parent']) || is_null($result['account_parent']))
					{
						$query = $this->db->select('client_id')->get_where('clients', array('account_id' => $account_id));
						
						if($query->num_rows() == 1)
						{
							$return = $query->row_array();
							return $return['client_id'];
						}
						else
						{
							return false;
						}
					}
					else
					{
						// account is not an owner, we can itinerate through the accounts
						$query = $this->db->select('client_id')->get_where('clients', array('account_id' => $result['account_parent']));
						
						if($query->num_rows() == 1)
						{
							$return = $query->row_array();
							return $return['client_id'];
						}
						else
						{
							return false;
						}
					}
				}
				else
				{
					// account doesn't exist
					return false;
				}
			}
			catch(Exception $ex)
			{
			}
		}
		
		public function get_projects($client_id = null)
		{
			try
			{
				if($client_id === null)
				{
					$query = $this->db->select('*')->from('projects')->get();
				}
				else
				{
					$query = $this->db->select('*')->get_where('projects', array('client_id' => $client_id));
				}
				
				if($query->num_rows() == 0)
				{
					return false;
				}
				else
				{
					return $query->result_array();
				}
			}
			catch(Exception $ex)
			{
				throw new Exception($ex->getMessage());
			}
		}
		
		public function get_project($project_id)
		{
			try
			{
				$query = $this->db->get_where('projects', array('project_id' => $project_id))->row_array();
				return $query;
			}
			catch(Exception $ex)
			{
				throw new Exception($ex->getMessage());
			}
		}
		
		public function get_projects_milestones($project_id)
		{
		}
		
		public function add_projects_milestones($data)
		{
			try 
			{
				$query = $this->db->insert('projects_milestones', $data);
				
				// check if any row was affected by the insert as there is 
				// no process of finding out if the insert took place or not
				// @george
				
				if($this->db->affected_rows() == 0)
				{
					return false;
				}
				else
				{
					$this->_LastId = $this->db->insert_id();
					return true;
				}
			}
			catch(Exception $ex)
			{
				throw new Exception($ex->getMessage());
			}
		}
		
		public function get_tasks($project_id)
		{
			try
			{
				$query = $this->db->select('*')->get_where('projects_tasks', array('project_id' => $project_id))->result_array();
				return $query;
			}
			catch(Exception $ex)
			{
				throw new Exception($ex->getMessage());
			}
		}
		
		public function add_project_task($data)
		{
			try
			{
				$query = $this->db->insert('projects_tasks', $data);
				
				if($this->db->affected_rows() == 0)
				{
					return false;
				}
				else
				{
					$this->_LastId = $this->db->insert_id();
					return true;
				}
			}
			catch(Exception $ex)
			{
				throw new Exception($ex->getMessage());
			}
		}
		
		
		
		public function update_project_task($data, $id = NULL)
		{
			try 
			{
				if($id==NULL)
				{
				}
				else
				{
					$query = $this->db->where('project_task_id', $id)->update('projects_tasks', $data);
				}
				
				if($this->db->affected_rows() == 0)
				{
					return false;
				}
				else
				{
					return true;
				}
			}
			catch(Exception $ex)
			{
				throw new Exception($ex->getMessage());
			}
		}
		
		public function get_project_tasks($project_id)
		{
			try {
				$query = $this->db->query("SELECT * FROM projects_tasks AS t1 LEFT JOIN accounts AS t2 ON t2.account_id=t1.asignee_id WHERE project_id='$project_id' ORDER BY project_task_created DESC")->result_array();
			} catch(Exception $e) {
			}
			
			return $query;
		}
		
		public function get_project_task($project_id, $project_task_id)
		{
			try 
			{
				$query = $this->db->select('*')->from('projects_tasks')->where('project_id', $project_id)->where('project_task_id', $project_task_id)->get();
			
				if($query->num_rows()==1)
				{
					return $query->row_array();
				}
				else
				{
					return false;
				}
			}
			catch(Exception $e)
			{
			}
		}
		
		public function add_project_task_comment($data)
		{
			try
			{
				$query = $this->db->insert('projects_tasks_comments', $data);
				
				if($this->db->affected_rows() == 0)
				{
					return false;
				}
				else
				{
					$this->_LastId = $this->db->insert_id();
					return true;
				}
			}
			catch(Exception $ex)
			{
				throw new Exception($ex->getMessage());
			}
		}
		
		public function get_project_task_comments($project_task_id)
		{
			try
			{
				$query = $this->db->query("SELECT * FROM projects_tasks_comments AS t1 LEFT JOIN projects_tasks AS t2 ON t2.project_task_id=t1.project_task_id LEFT JOIN accounts AS t3 ON t3.account_id=t1.account_id WHERE t1.project_task_id='$project_task_id' ORDER BY project_task_comment_created DESC");
				
				if($query->num_rows()==0)
				{
					return false;
				}
				else
				{
					return $query->result_array();
				}
			}
			catch(Exception $ex)
			{
				throw new Exception($ex->getMessage());
			}
		}
		
		public function get_project_notes($project_id)
		{
			try {
				$query = $this->db->query("SELECT * FROM projects_notes AS t1 LEFT JOIN accounts AS t2 ON t2.account_id=t1.account_id WHERE t1.project_id='$project_id'");
				
				if($query->num_rows()==0)
				{
					return false;
				}
				else
				{
					return $query->result_array();
				}
			}
			catch(Exception $e)
			{
			}
		}
		
		
		
		public function add_project_note($data)
		{
			try 
			{
				$query = $this->db->insert('projects_notes', $data);
				
				if($this->db->affected_rows() == 0)
				{
					return false;
				}
				else
				{
					$this->_LastId = $this->db->insert_id();
					return true;
				}
			}
			catch(Exception $ex)
			{
				throw new Exception($ex->getMessage());
			}
		}
		
		public function get_asignee($project_task_id)
		{
			try {
				$query = $this->db->query("SELECT * FROM projects_tasks AS t1 LEFT JOIN accounts AS t2 ON t2.account_id=t1.account_id");
				
				if($query->num_rows()==1)
				{
					return $query->row_array();
				}
				else
				{
					return false;
				}
			}
			catch(Exception $e)
			{
			}
		}
	}
	
?>