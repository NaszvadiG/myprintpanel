<?php
	use \DrewM\MailChimp\MailChimp;
	
	class Accounts extends CI_Controller
	{
		public $default_mailchimp_list = '6b72c053d5';
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Accounts_Model');
		}
		
		public function login_page()
		{
			$MailChimp = new MailChimp('a1d719672e086bef83555e8f42d03403-us16');
			
			$result = $MailChimp->post('lists/' . $this->default_mailchimp_list . '/members', [
				'email_address' => 'george@gritnet.uk',
				'status'        => 'subscribed',
			]);
			
			echo '<pre>';
			print_r($result);
			echo '</pre>';

			$this->load->view('accounts/login');
		}
		
		public function register_page()
		{
			
			
			$this->form_validation->set_rules('account_fname', 'First name', 'required');
			$this->form_validation->set_rules('account_lname', 'Last name', 'required');
			$this->form_validation->set_rules('account_phone', 'Phone', 'required|is_unique[accounts.account_phone]|regex_match[/^[0-9]{10}$/]');
			$this->form_validation->set_rules('account_email', 'Email', 'required|valid_email|is_unique[accounts.account_email]');
			$this->form_validation->set_rules('account_password', 'Password', 'required');
			
			if ($this->form_validation->run() === FALSE)
			{	
				echo phpinfo();
				echo $this->Accounts_Model->generateVerificationCode();
				$this->load->view('accounts/register');
			}
			else
			{
				$this->Accounts_Model->insert_account();
				$this->load->template('accounts/activate');
			}
		}
		
		public function login()
		{
		}
		
		
	}
	
?>