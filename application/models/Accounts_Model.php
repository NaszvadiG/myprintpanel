<?php

	class Accounts_Model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		
		public function get_account($account_id)
		{
			$query = $this->db->select('*')->get_where('accounts', array('account_id' => $account_id));
			
			if($query && $query->num_rows()==1)
			{
				return $query->row_array();
			}
			else
			{
				return 'f*** error mate';
			}
		}
		
		public function register_account($data)
		{
			if($this->db->insert('accounts', $data) && $this->db->affected_rows()==1)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		
		public function activate_account($account_code)
		{
			$query = $this->db->select('account_code')->where('account_code', $account_code)->get('accounts');
			if($query->num_rows()==1)
			{
				
				if($this->db->where('account_code', $account_code)->update('accounts', array('account_phone_verified' => 1)) && $this->db->affected_rows()==1)
				{
					return true;
				}
				else
				{
					return false;
				}
			}
			else
			{
				return false;
			}
		}
		
		public function login_account($data)
		{
			$query = $this->db->select('account_id, account_fname, account_lname, account_email, account_phone, account_password')->get_where('accounts', array('account_email' => $data['account_email']));
			
			if($query->num_rows()==1)
			{
				$result = $query->row();
				
				if(password_verify($data['account_password'], $result->account_password))
				{
					return $result;
				}
				else
				{
					return false;
				}
			}
			else
			{
				return false;
			}
		}

		
		/*
		* Author: George Dobre
		* Contact: +44 7841 582 659 <george@package7.com>
		* Description: This function generates a 5 char long alphanumeric code
		* that is sent to the user to validate phone number and/or email
		* address.
		* Last modified by: George Dobre
		*/
		
		function crypto_rand_secure($min, $max)
		{
			$range = $max - $min;
			if ($range < 1) return $min; // not so random...
			$log = ceil(log($range, 2));
			$bytes = (int) ($log / 8) + 1; // length in bytes
			$bits = (int) $log + 1; // length in bits
			$filter = (int) (1 << $bits) - 1; // set all lower bits to 1
			do 
			{
				$rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
				$rnd = $rnd & $filter; // discard irrelevant bits
			} while ($rnd > $range);
			
			return $min + $rnd;
		}

		function getToken($length)
		{
			$token = "";
			$codeAlphabet = "ABCDEFGHJKLMNPQRSTUVWXYZ"; // removed I and O's for confussion I = 1; O = 0;
			$codeAlphabet.= "0123456789";
			$max = strlen($codeAlphabet); // edited

			for ($i=0; $i < $length; $i++) {
				$token .= $codeAlphabet[$this->crypto_rand_secure(0, $max-1)];
			}

			return $token;
		}
		
		public function generate_verification_code()
		{
			return strtoupper($this->getToken(5));
		}
	}