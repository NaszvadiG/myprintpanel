<?php

	class SMS_Model extends CI_Model
	{
		private $TextMagic_ApiKey = 'Wt0HWLpMMhsnitKTSuQa2qW45gf4h9';
		
		public function __construct()
		{
			parent::__construct();
		}
		
		public function send_sms($phone = '07841582659')
		{
			$request = curl_init();
			curl_setopt($request, CURLOPT_URL, $this->_Endpoint . '/company/' . $company_number);
			curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($request, CURLOPT_USERPWD, $this->_ApiKey . ':');
			$result = curl_exec($request);
			$status = intval(curl_getinfo($request, CURLINFO_HTTP_CODE));
			curl_close($request);
		}
	}
	
?>