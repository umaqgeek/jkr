<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Juruteknik extends MY_Controller {
	
	public function __construct(){
		parent::__construct();
		
		if($this->session->userdata('r_id') != 2) {
			redirect(site_url(''));
		}
	}
	
	function index(){
		
		switch($this->session->userdata('r_id'))
		{
			case 2:
				$link = 'juruteknik/v_home';
				$properties['user_log'] = $this->session->all_userdata();
				$this->my_func->getFace($this->load->view('menu/v_menu_juruteknik','',true), $this->load->view($link,$properties,true));
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
	 
		$link = 'juruteknik/v_vehicle';
		$this->my_func->getFace($this->load->view('menu/v_menu_juruteknik', '', true), $this->load->view($link, $output, true));
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
		
		$link = 'juruteknik/v_contractor';
		$this->my_func->getFace($this->load->view('menu/v_menu_juruteknik', '', true), $this->load->view($link, $output, true));
	}
	
	function part() {
		$crud = new grocery_CRUD();
 
    	//$crud->set_theme('datatables');
		$crud->set_table('part_letter_order');
		
		$crud->display_as('plo_name','Nama');
		$crud->display_as('plo_partno','No. Alat Ganti');
		$crud->display_as('plo_quantity','Kuantiti');
		$crud->display_as('plo_totalprice','Harga');
		$crud->display_as('plo_datetime','Masa Daftar');
		
		$crud->columns('plo_name','plo_partno','plo_quantity','plo_totalprice','plo_datetime');
		
		$crud->edit_fields('plo_name','plo_partno','plo_quantity','plo_totalprice','plo_datetime');
		
		$crud->set_subject('Alat Ganti');
		
		$crud->unset_add();
	 
		$output = $crud->render();
		
		$link = 'juruteknik/v_part';
		$this->my_func->getFace($this->load->view('menu/v_menu_juruteknik', '', true), $this->load->view($link, $output, true));
	}
	
	function broken($stat=2) {
		$properties = '';
		$link = 'juruteknik/v_rosak';
		switch($stat) {
			case 1: 
				$properties['contractor'] = $this->m_contractor->getAll();
				$properties['vehicles'] = $this->m_vehicles->getAll();
				$properties['state'] = $this->m_state->getAll();
				$properties['finance'] = $this->m_finance->getAll_year(date('Y-m-d'));
				$properties['broken_log_unit'] = $this->m_broken_log_unit->getAll();
				$properties['perolehan'] = $this->m_perolehan->getAll();
				$properties['jenis_kerja'] = $this->m_jenis_kerja->getAll();
				$link = 'juruteknik/v_rosak_tambah';
				break;
			case 2: 
				$properties['broken_log'] = $this->m_broken_log->getAll($this->session->userdata('u_id'), 'desc', 0);
				$link = 'juruteknik/v_rosak_senarai';
				break;
			case 3:
				$properties['bl_id'] = $this->uri->segment(4);
				$bl_exist = $this->m_broken_log->get($properties['bl_id']);
				if($bl_exist) {
					$properties['broken_log'] = $this->m_broken_log->getAll($this->session->userdata('u_id'), 'desc', 0);
					$link = 'juruteknik/v_rosak_tambah2';
				} else {
					redirect(site_url('juruteknik/broken'));
				}
				break;
		}
		$this->my_func->getFace($this->load->view('menu/v_menu_juruteknik','',true), $this->load->view($link,$properties,true));
	}
	
	function brokenexport() {
		$tarikh = date('dmYHis');
		$file = "logkerja" . $tarikh . ".xls";
		$broken_log = $this->m_broken_log->getAll($this->session->userdata('u_id'), 'desc', 0);
		$test = "<table><tr><th>Bil.</th><th>Unit</th><th>Tarikh Rekod</th><th>Tarikh Siap</th><th>Status Baiki</th><th>Harga</th><th>Kontraktor</th><th>No. Pendaftaran</th><th>Perihal Kerosakan</th><th>Kod Peruntukan Kewangan</th></tr>";
		if($broken_log) {
			$i = 1;
			foreach($broken_log as $bl) {
				$harga1 = $this->m_letter_order->getExpenses($bl->bl_id);
				$harga1 = $harga1 == 0.00 ? $bl->bl_harga : $harga1;
				$test .= "<tr>
					<td>" . ($i++) . ".</td>
					<td>" . $bl->bl_unit . "</td>
					<td>" . $this->my_func->sqltodate($bl->bl_recorddate) . "</td>
					<td>" . $this->my_func->sqltodate($bl->bl_settledate) . "</td>
					<td>" . $this->my_func->getStatusBL($bl->bl_repairstatus) . " &nbsp;
						";
				if($bl->bl_repairstatus == 2) { $test .= '('.$bl->bl_reason.')'; }
				$test .= "</td>
					<td>RM " . $harga1 . "</td>
					<td>" . $bl->c_name . "</td>
					<td>" . $bl->v_registrationno . "</td>
					<td>" . $bl->bl_remarks . "</td>
					<td>" . $bl->f_code . "</td>
				</tr>";
			}
		}
		$test .= "</table>";
		header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=$file");
		echo $test;
	}
	
	function brokenedit($bl_id=0) {
		if($this->input->post('bl_id')) {
			//print_r($this->input->post()); die();
			$bl_id = $this->input->post('bl_id');
			$harga = 0.00;
			try {
				$harga = $this->input->post('bl_harga');
				$harga /= 10;
				$harga *= 10;
			} catch(Exception $e) {
				$harga = 0.00;
			}
			$data = array(
				'bl_unit' => $this->my_func->getNoUnit2($this->input->post('bl_unit'), $this->input->post('old_bl_unit')),
				'bl_recorddate' => date('Y-m-d H:i:s'),
				'bl_settledate' => $this->my_func->datetosql($this->input->post('bl_settledate')),
				'bl_repairstatus' => $this->input->post('bl_repairstatus'),
				'bl_reason' => '',
				'bl_harga' => $harga,
				'c_id' => $this->input->post('con_id'),
				'v_id' => $this->input->post('v_id'),
				's_id' => $this->input->post('s_id'),
				'f_id' => $this->input->post('f_id'),
				'bl_remarks' => $this->input->post('bl_remarks'),
				'bl_nodo' => $this->input->post('bl_nodo'),
				'pe_id' => $this->input->post('pe_id'),
				'bl_nosebutharga' => $this->input->post('bl_nosebutharga'),
				'jk_id' => $this->input->post('jk_id')
			);
			$broken_log = $this->m_broken_log->edit($bl_id, $data);
			
			if($bl_id != 0) {
				$w_name = $this->input->post('w_name');
				$w_id = $this->input->post('w_id');
				for($i=0; $i<sizeof($w_name); $i++) {
					if($w_name[$i] != "" && $w_name[$i] != NULL) {
						$data_worker = array(
							'w_name' => $w_name[$i],
							'bl_id' => $bl_id
						);
						if($w_id[$i] == 0) {
							$this->m_worker->add($data_worker);
						} else {
							$this->m_worker->edit($w_id[$i], $data_worker);
						}
					}
				}
			}
			
			redirect(site_url('juruteknik/brokenedit/'.$bl_id.'/2'));
		} else {
			$properties['broken_log'] = $this->m_broken_log->get($bl_id);
			$properties['contractor'] = $this->m_contractor->getAll();
			$properties['vehicles'] = $this->m_vehicles->getAll();
			$properties['state'] = $this->m_state->getAll();
			$properties['finance'] = $this->m_finance->getAll();
			$properties['worker'] = $this->m_worker->getAll_broken_log($bl_id);
			$properties['broken_log_unit'] = $this->m_broken_log_unit->getAll();
			$properties['perolehan'] = $this->m_perolehan->getAll();
			$properties['jenis_kerja'] = $this->m_jenis_kerja->getAll();
			$properties['bl_id'] = $bl_id;
			$link = 'juruteknik/v_rosak_ubah';
			$this->my_func->getFace($this->load->view('menu/v_menu_juruteknik','',true), $this->load->view($link,$properties,true));
		}
	}
	
	function brokenliv($bl_id=0) {
		if($this->input->post('bl_id')) {
			$bl_id = $this->input->post('bl_id');
			if($this->input->post('bl_nolo_cbx')) {
				$data = array(
					'bl_nolo' => $this->input->post('bl_nolo'),
					'bl_date_nolo' => date('Y-m-d H:i:s')
				);
				$this->m_broken_log->edit($bl_id, $data);
			}
			if($this->input->post('bl_invoice_cbx')) {
				$data = array(
					'bl_invoice' => $this->input->post('bl_invoice'),
					'bl_date_invoice' => date('Y-m-d H:i:s')
				);
				$this->m_broken_log->edit($bl_id, $data);
			}
			if($this->input->post('bl_voucher_cbx')) {
				$data = array(
					'bl_voucher' => $this->input->post('bl_voucher'),
					'bl_date_voucher' => date('Y-m-d H:i:s')
				);
				$this->m_broken_log->edit($bl_id, $data);
			}
			redirect(site_url('juruteknik/brokenliv/'.$bl_id.'/2'));
		} else {
			$properties['broken_log'] = $this->m_broken_log->get($bl_id);
			$link = 'juruteknik/v_rosak_liv';
			$this->my_func->getFace($this->load->view('menu/v_menu_juruteknik','',true), $this->load->view($link,$properties,true));
		}
	}
	
	function notamintaedit($lo_id=0) {
		if($this->input->post('lo_id')) {
			
			$lo_id = $this->input->post('lo_id');
			
			if($lo_id != 0) {
				
				$ser_id = $this->input->post('ser_id');
				$ser_desc = $this->input->post('ser_desc');
				$ser_totalprice = $this->input->post('ser_totalprice');
				
				$data_lo = array(
					'lo_createddate' => $this->input->post('lo_createddate')." ".date('H:i:s')
				);
				$edit_lo = $this->m_letter_order->edit($lo_id, $data_lo);
				
				for($i=0; $i<sizeof($ser_desc); $i++) {
					try {
						$harga = $ser_totalprice[$i];
						$harga /= 10;
						$harga *= 10;
					} catch(Exception $e) {
						$harga = 0.00;
					}
					if($ser_desc[$i] != "" && $ser_desc[$i] != NULL) {
						$data_services = array(
							'ser_desc' => $ser_desc[$i],
							'ser_totalprice' => $harga,
							'lo_id' => $lo_id
						);
						if($ser_id[$i] != 0) {
							$this->m_services->edit($ser_id[$i], $data_services);
						} else {
							$this->m_services->add($data_services);
						}
					}
				}
				
				$plo_id = $this->input->post('plo_id');
				$plo_name = $this->input->post('plo_name');
				$plo_partno = $this->input->post('plo_partno');
				$plo_quantity = $this->input->post('plo_quantity');
				$plo_totalprice = $this->input->post('plo_totalprice');
				$plo_datetime = $this->input->post('plo_datetime');
				
				for($i=0; $i<sizeof($plo_name); $i++) {
					if($plo_name[$i] != "" && $plo_name[$i] != NULL) {
						$data_part_letter_order = array(
							'lo_id' => $lo_id,
							'plo_name' => $plo_name[$i],
							'plo_partno' => $plo_partno[$i],
							'plo_quantity' => $plo_quantity[$i],
							'plo_totalprice' => $plo_totalprice[$i],
							'plo_datetime' => $plo_datetime[$i]
						);
						if($plo_id[$i] != 0) {
							$this->m_part_letter_order->edit($plo_id[$i], $data_part_letter_order);
						} else {
							$this->m_part_letter_order->add($data_part_letter_order);
						}
					}
				}
			}
			
			$this->session->set_flashdata('notamintaubah', 'Ubah Nota Minta Berjaya..');
			redirect(site_url('juruteknik/notaminta'));
		} else {
			$lo = $this->m_letter_order->get($lo_id);
			if($lo) {
				$bl_id = $lo[0]->bl_id;
				$properties['broken_log'] = $this->m_broken_log->get($bl_id);
				$properties['part'] = $this->m_part_letter_order->getAll_letter_order($lo_id);
				$properties['service'] = $this->m_services->getAll_letter_order($lo_id);
				$link = 'juruteknik/v_notaminta_ubah';
				$this->my_func->getFace($this->load->view('menu/v_menu_juruteknik','',true), $this->load->view($link,$properties,true));
			} else {
				redirect(site_url('juruteknik/notaminta'));
			}
		}
	}
	
	function brokenadd() {
		$harga = 0.00;
		try {
			$harga = $this->input->post('bl_harga');
			$harga /= 10;
			$harga *= 10;
		} catch(Exception $e) {
			$harga = 0.00;
		}
		$data = array(
			'bl_unit' => $this->my_func->getNoUnit($this->input->post('bl_unit')),
			'bl_recorddate' => date('Y-m-d H:i:s'),
			'bl_settledate' => $this->my_func->datetosql($this->input->post('bl_settledate')),
			'bl_repairstatus' => $this->input->post('bl_repairstatus'),
			'bl_reason' => '',
			'bl_harga' => $harga,
			'c_id' => $this->input->post('con_id'),
			'v_id' => $this->input->post('v_id'),
			's_id' => $this->input->post('s_id'),
			'f_id' => $this->input->post('f_id'),
			'bl_remarks' => $this->input->post('bl_remarks'),
			'bl_nodo' => $this->input->post('bl_nodo'),
			'pe_id' => $this->input->post('pe_id'),
			'bl_nosebutharga' => $this->input->post('bl_nosebutharga'),
			'jk_id' => $this->input->post('jk_id'),
			'bl_status' => 1,
			'u_id' => $this->session->userdata('u_id')
		);
		$broken_log = $this->m_broken_log->add($data);
		
		if($broken_log != 0) {
			$w_name = $this->input->post('w_name');
			for($i=0; $i<sizeof($w_name); $i++) {
				if($w_name[$i] != "" && $w_name[$i] != NULL) {
					$data_worker = array(
						'w_name' => $w_name[$i],
						'bl_id' => $broken_log
					);
					$this->m_worker->add($data_worker);
				}
			}
		}
		
		redirect(site_url('juruteknik/broken/1/1/'.$broken_log));
		
	}
	
	function notaminta($stat=2, $bl_id=0) {
		$properties = '';
		$link = 'juruteknik/v_notaminta';
		switch($stat) {
			case 1: 
				if($bl_id != 0) {
					$properties['broken_log'] = $this->m_broken_log->get($bl_id);
				} else {
					$properties['broken_log'] = $this->m_broken_log->getAll($this->session->userdata('u_id'), '', 0);
					$properties['contractor'] = $this->m_contractor->getAll();
				}
				$link = 'juruteknik/v_notaminta_tambah';
				break;
			case 2: 
				$properties['nota_minta'] = $this->m_letter_order->getAll($this->session->userdata('u_id'), 'desc');
				$link = 'juruteknik/v_notaminta_senarai';
				break;
		}
		$this->my_func->getFace($this->load->view('menu/v_menu_juruteknik','',true), $this->load->view($link,$properties,true));
	}
	
	function notamintaadd() {
		$bl_id = $this->input->post('bl_id');
		$data = array(
			'bl_id' => $bl_id,
			'u_id' => $this->session->userdata('u_id'),
			'lo_expenses' => 0.00,
			'lo_createddate' => $this->input->post('lo_createddate')." ".date('H:i:s'),
			'lo_approveddate' => '0000-00-00',
			'lo_approvedby' => 0
		);
		$letter_order = $this->m_letter_order->add($data);
		$total_expenses = 0.00;
		$f_code = '';
		if($letter_order != 0) {
			$data_broken_log = array(
				'bl_status' => 2
			);
			$this->m_broken_log->edit($bl_id, $data_broken_log);
			
			$ser_desc = $this->input->post('ser_desc');
			$ser_totalprice = $this->input->post('ser_totalprice');
			for($i=0; $i<sizeof($ser_desc); $i++) {
				try {
					$harga = $ser_totalprice[$i];
					$harga /= 10;
					$harga *= 10;
				} catch(Exception $e) {
					$harga = 0.00;
				}
				if($ser_desc[$i] != "" && $ser_desc[$i] != NULL) {
					$data_services = array(
						'ser_desc' => $ser_desc[$i],
						'ser_totalprice' => $harga,
						'lo_id' => $letter_order
					);
					$this->m_services->add($data_services);
					$total_expenses += $harga;
				}
			}
			
			$plo_name = $this->input->post('plo_name');
			$plo_partno = $this->input->post('plo_partno');
			$plo_quantity = $this->input->post('plo_quantity');
			$plo_totalprice = $this->input->post('plo_totalprice');
			for($i=0; $i<sizeof($plo_name); $i++) {
				if($plo_name[$i] != "" && $plo_name[$i] != NULL) {
					$data_part_letter_order = array(
						'lo_id' => $letter_order,
						'plo_name' => $plo_name[$i],
						'plo_partno' => $plo_partno[$i],
						'plo_quantity' => $plo_quantity[$i],
						'plo_totalprice' => $plo_totalprice[$i],
						'plo_datetime' => date('Y-m-d H:i:s')
					);
					$this->m_part_letter_order->add($data_part_letter_order);
					$total_expenses += ($plo_totalprice[$i] * $plo_quantity[$i]);
				}
			}
			$bl_temp = $this->m_broken_log->get($bl_id);
			if($bl_temp) {
				$f_code = $bl_temp[0]->f_id;
				
				$data_broken_log = array(
					'bl_harga' => $total_expenses
				);
				$this->m_broken_log->edit($bl_id, $data_broken_log);
				
			}
			$this->tolakkewangan($letter_order, $f_code, $total_expenses);
		}
		redirect(site_url('juruteknik/notaminta'));
	}
	
	function tukaq() {
		$lo = $this->m_letter_order->getAll();
		foreach($lo as $l) {
			$lo_id = $l->lo_id;
			$bl_id = $l->bl_id;
			$lo_expenses = $l->lo_expenses;
			$data = array(
				'bl_harga' => $lo_expenses
			);
			$this->m_broken_log->edit($bl_id, $data);
		}
		echo "Done Sync ..";
	}
	
	function tolakkewangan($lo_id=0, $f_code='', $lo_expenses=0.00) {
		if($lo_id != 0 && $f_code != '' && $lo_expenses != 0.00) {
			$data_lo = array(
				'lo_expenses' => $lo_expenses
			);
			$this->m_letter_order->edit($lo_id, $data_lo); //tetapkan penggunaan kewangan kepada nota minta
			$finance = $this->m_finance->get($f_code);
			$f_money = $finance[0]->f_money;
			$f_money -= $lo_expenses; //tolak kewangan
			$data_f = array(
				'f_money' => $f_money
			);
			//$this->m_finance->edit($f_code, $data_f);
		} else {
			redirect(site_url('juruteknik'));
		}
	}
	
	function brokendelete($bl_id) {
		if(!empty($bl_id)) {
			if($this->m_broken_log->delete($bl_id)) {
				$this->m_worker->delete_broken_log($bl_id);
				$this->m_broken_log_component->delete_broken_log($bl_id);
				$this->m_letter_order->delete_broken_log($bl_id);
			}
		}
		redirect(site_url('juruteknik/broken/2'));
	}
	
	function notamintadelete($lo_id) {
		if(!empty($lo_id)) {
			$lo = $this->m_letter_order->get($lo_id);
			if($lo) {
				$lo_expenses = $lo[0]->lo_expenses;
				$bl_id = $lo[0]->bl_id;
				$bl = $this->m_broken_log->get($bl_id);
				if($bl) {
					$f_id = $bl[0]->f_id;
					$f = $this->m_finance->get($f_id);
					if($f) {
						$f_money = $f[0]->f_money;
						$f_money += $lo_expenses;
						$f_data = array('f_money' => $f_money);
						//$this->m_finance->edit($f_id, $f_data);
						if($this->m_letter_order->delete($lo_id)) {
							$this->m_services->delete_letter_order($lo_id);
							$this->m_part_letter_order->delete_letter_order($lo_id);
						}
					}
				}
				$bl_edit = $this->m_broken_log->edit($bl_id, array('bl_status'=>1));
			}
		}
		redirect(site_url('juruteknik/notaminta/2'));
	}
	
	function test1($str='') {
		echo $str;
	}
	
	function paparsurat($lo_id=0) {
		$data['letter_order'] = $this->m_letter_order->get($lo_id);
		$data['letter_order_user'] = $this->m_letter_order->get_user($lo_id);
		$data['part'] = $this->m_part_letter_order->getAll_letter_order($lo_id);
		$data['upah'] = $this->m_services->getAll_letter_order($lo_id);
		$sess = $this->session->all_userdata();
		$data['sess'] = $sess;
		$this->load->view('juruteknik/v_surat', $data);
	}
	
	function getLog($bl_id=0) {
		$d['broken_log'] = $this->m_broken_log->get($bl_id);
		echo $this->load->view('juruteknik/v_broken_log', $d, true);
	}
	
	function partdelete($plo_id=0) {
		if($plo_id != 0) {
			$this->m_part_letter_order->delete($plo_id);
		}
	}
	
	function servicedelete($ser_id=0) {
		if($ser_id != 0) {
			$this->m_services->delete($ser_id);
		}
	}
	
	function profil() {
		$properties['profil'] = $this->m_user->get($this->session->userdata('u_id'));
		$link = 'juruteknik/v_user';
		$this->my_func->getFace($this->load->view('menu/v_menu_juruteknik', '', true), $this->load->view($link, $properties, true));
	}
	
	function profiledit() {
		$ch_pwd2 = $this->input->post('ch_pwd2') == 'on' ? true : false;
		$u_id = $this->input->post('u_id');
		$data = array(
			'u_fullname' => $this->input->post('u_fullname'),
			'u_staffno' => $this->input->post('u_staffno'),
			'u_ic' => $this->input->post('u_ic'),
			'u_phone' => $this->input->post('u_phone'),
			'u_email' => $this->input->post('u_email')
		);
		$this->m_user->edit($u_id, $data);
		$bol = true;
		if($ch_pwd2) {
			$user = $this->m_user->get($u_id);
			$old_pwd = $user[0]->u_password;
			$new_pwd = strtoupper(md5($this->input->post('u_password_old')));
			if($old_pwd == $new_pwd) {
				$new_pwd = strtoupper(md5($this->input->post('u_password_new')));
				$data2 = array(
					'u_password' => $new_pwd
				);
				$this->m_user->edit($u_id, $data2);
				$bol = true;
			} else {
				$bol = false;
			}
		}
		if($bol) {
			$this->session->set_flashdata('msg', 'Ubah profil selesai..');
		} else {
			$this->session->set_flashdata('msg', 'Kata Laluan lama adalah salah!');
		}
		redirect(site_url('juruteknik/profil'));
	}
	
}

?>