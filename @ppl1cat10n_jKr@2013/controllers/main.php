<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main extends MY_Controller{
	
	public function __construct(){
		parent::__construct();
		
				
	}
	
	function index(){
		
		switch($this->session->userdata('r_id'))
		{
			case 1:
				redirect(site_url('jurutera'));
			break;
			case 2:
				redirect(site_url('juruteknik'));
			break;
			case 3:
				redirect(site_url('admin'));
			break;
			case 4:
				redirect(site_url('tukang'));
			break;
			default:
				//1. menubar.
				//2. content.
				$this->my_func->getFace($this->load->view('menu/v_menu','',true), $this->load->view('v_home','',true));
			break;
		}
	}
	
}

?>