<?php

	class Accounts_Model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		
		public function register_account($data)
		{
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
			do {
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
		
		public function generateVerificationCode()
		{
			return strtoupper($this->getToken(5));
		}
	}