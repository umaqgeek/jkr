<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends MY_Controller{
	
	public function __construct(){
		parent::__construct();
		
				
	}
	
	function index(){
	
		$this->load->view('login/v_form');
	
	}
	
	function do_login(){
		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		
		if(empty($user) && empty($pass))
		{
			$this->session->set_flashdata('action_msg','please fill in username and password!');
			redirect('login');
		}
		else
		{
			$check_login = $this->site_sentry->login_routine($user, $pass);
			
			if($check_login == true)
			{
				redirect('main');
			}
			else
			{
				$this->session->set_flashdata('action_msg','invalid username/password!');
				redirect('login');
			}
		}
	}
	
}

?>