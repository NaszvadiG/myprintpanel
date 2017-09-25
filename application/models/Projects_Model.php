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
		
		public function get_projects()
		{
			try
			{
				$query = $this->db->select('*')->from('projects')->get()->result_array();
				return $query;
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
				$query = $this->db->select('*')->get_where('projects_tasks', array('project_id' => $project_id))->result_array();
			} catch(Exception $e) {
			}
			
			return $query;
		}
	}
	
?>