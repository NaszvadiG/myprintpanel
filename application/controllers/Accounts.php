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
			
			
			$this->form_validation->set_rules('account_name', 'Full name', 'required');
			$this->form_validation->set_rules('account_phone', 'Phone', 'required|is_unique[accounts.account_phone]|regex_match[/^[0-9]{11}$/]');
			$this->form_validation->set_rules('account_email', 'Email', 'required|valid_email|is_unique[accounts.account_email]');
			$this->form_validation->set_rules('account_password', 'Password', 'required');
			
			if ($this->form_validation->run() === FALSE)
			{	
				$this->load->view('accounts/register');
			}
			else
			{
				$account_name = explode(' ', $this->input->post('account_name'));
				
				if(count($account_name)==2)
				{
					$account_fname = $account_name[0];
					$account_lname	= $account_name[1];
				}
				else // multiple names
				{
					$account_fname = array();
					
					foreach($account_name as $name)
					{
						// remove last name
						if($name!=$account_name[count($account_name)-1])
						{
							array_push($account_fname, $name);
						}
					}
					
					$account_fname = implode(' ', $account_fname);
					$account_lname = $account_name[count($account_name)-1]; // Last chunk from the array will be the last name
				}
				
				$data = array
				(
					'account_fname' => $account_fname,
					'account_lname' => $account_lname,
					'account_email' => $this->input->post('account_email'),
					'account_phone' => $this->input->post('account_phone'),
					'account_password' => password_encrypt($this->input->post('account_password')),
					'account_code'	=>	$this->Accounts_Model->generate_verification_code(),
					'account_created' => date('Y-m-d H:i:s')
				);
				
				$this->Accounts_Model->register_account($data);
				$this->load->template('accounts/activate');
			}
		}
		
		public function login()
		{
		}
		
		
	}
	
?>