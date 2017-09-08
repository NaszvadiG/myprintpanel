<?php

	class Emails_Model extends CI_Model
	{
		private $Mandrill_ApiKey = '';
		private $Mailchimp_ApiKey = '';
		
		public function __construct()
		{
			parent::__construct();
		}
		
		public function send_activation_code($email)
		{
			$mandrill = new Mandrill('9GsiyTScJIMKu2CeBpELmg');
			$message = array
			(
				'html' => '<p>Example HTML content</p>',
				'text' => 'Example text content',
				'subject' => 'example subject',
				'from_email' => 'office@myprintpanel.com',
				'from_name' => 'MyPrintPanel',
				'to' => array
				(
					array
					(
						'email' => $email,
						'name' => 'George Dobre',
						'type' => 'to'
					)
				),
				'headers' => array('Reply-To' => 'office@myprintpanel.com')
			);
			
			$async = false;
			$ip_pool = 'Main Pool';
			$result = $mandrill->messages->send($message, $async, $ip_pool);
			return print_r($result);
		}
	}
	
?>