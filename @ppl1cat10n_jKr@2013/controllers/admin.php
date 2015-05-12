<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends MY_Controller {
	
	public function __construct(){
		parent::__construct();
		
		if($this->session->userdata('r_id') != 3) {
			redirect(site_url(''));
		}
	}
	
	function index(){
		
		switch($this->session->userdata('r_id'))
		{
			case 3:
				$link = 'admin/v_home';
				$properties['user_log'] = $this->session->all_userdata();
				$this->my_func->getFace($this->load->view('menu/v_menu_admin','',true), $this->load->view($link,$properties,true));
			break;
			default:
				redirect(site_url(''));
			break;
		}
	}
	
	function vehicle() {
		$crud = new grocery_CRUD();
		
		$this->config->set_item('grocery_crud_file_upload_allow_file_types', 'gif|jpeg|jpg|png');
 
    	//$crud->set_theme('datatables');
		$crud->set_table('vehicles');
		$crud->display_as('v_image','Gambar');
		$crud->display_as('v_noloji','No. Loji');
		$crud->display_as('v_registrationno','No. Pendaftaran');
		$crud->display_as('v_jkrno','No. JKR');
		$crud->display_as('v_ownername','Pemilik');
		$crud->display_as('v_group','Kumpulan');
		$crud->display_as('v_maker','Pembuat');
		$crud->display_as('v_model','Model');
		$crud->display_as('v_price','Harga');
		$crud->display_as('v_yearmade','Tahun');
		$crud->display_as('v_location','Lokasi');
		$crud->display_as('v_fileno','No. Fail');
		$crud->display_as('v_category','Kategori');
		$crud->display_as('vs_id','Status');
		
		$crud->set_subject('Kenderaan');
		
		$crud->set_relation('vs_id','vehicles_status','vs_desc');
		
		$crud->set_field_upload('v_image', 'assets/uploads/files');
		
		$crud->callback_after_upload(array($this, 'example_callback_after_upload'));
	 
		$output = $crud->render();
	 
		$link = 'admin/v_vehicle';
		$this->my_func->getFace($this->load->view('menu/v_menu_admin', '', true), $this->load->view($link, $output, true));
	}
	
	function example_callback_after_upload($uploader_response,$field_info, $files_to_upload) {
		$this->load->library('image_moo');
		//Is only one file uploaded so it ok to use it with $uploader_response[0].
		$file_uploaded = $field_info->upload_path.'/'.$uploader_response[0]->name; 
		$this->image_moo->load($file_uploaded)->resize(80,60)->save($file_uploaded,true);
		return true;
	}
	
	function contractor() {
		$crud = new grocery_CRUD();
 
    	//$crud->set_theme('datatables');
		$crud->set_table('contractor');
		$crud->display_as('c_name','Nama Syarikat');
		$crud->display_as('c_personincharge','Nama PIC');
		$crud->display_as('c_phoneno','No. Telefon');
		$crud->display_as('c_address','Alamat');
		$crud->display_as('c_postcode','Poskod');
		$crud->display_as('c_negeri','Negeri');
		$crud->set_subject('Kontraktor');
	 
		$output = $crud->render();
		
		$link = 'admin/v_contractor';
		$this->my_func->getFace($this->load->view('menu/v_menu_admin', '', true), $this->load->view($link, $output, true));
	}
	
	function users() {
		$crud = new grocery_CRUD();
 
    	//$crud->set_theme('datatables');
		$crud->set_table('user');
		$crud->display_as('u_fullname','Nama Penuh');
		$crud->display_as('u_staffno','No. Staf');
		$crud->display_as('u_ic','No. K/P.');
		$crud->display_as('u_phone','No. Telefon');
		$crud->display_as('u_email','Emel');
		$crud->display_as('u_password','Kata Laluan');
		$crud->display_as('r_id','Jenis Akaun');
		$crud->display_as('u_parentid','Bawah Juruteknik');
		
		$crud->set_relation('r_id','role','r_desc');
		$crud->set_relation('u_parentid','user','u_fullname');
		
		$crud->set_subject('Pengguna');
	 
		$output = $crud->render();
		
		$link = 'admin/v_users';
		$this->my_func->getFace($this->load->view('menu/v_menu_admin', '', true), $this->load->view($link, $output, true));
	}
	
	function finance() {
		$crud = new grocery_CRUD();
 
    	//$crud->set_theme('datatables');
		$crud->set_table('finance');
		$crud->display_as('f_code','Kod Kewangan');
		$crud->display_as('f_desc','Penerangan');
		$crud->display_as('f_money','Duit');
		$crud->display_as('f_date','Tarikh Kegunaan');
		$crud->set_subject('Kewangan');
	 
		$output = $crud->render();
		
		$link = 'admin/v_finance';
		$this->my_func->getFace($this->load->view('menu/v_menu_admin', '', true), $this->load->view($link, $output, true));
	}
	
}

?>