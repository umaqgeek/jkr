<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Jurutera extends MY_Controller {
	
	public function __construct(){
		parent::__construct();
		
		if($this->session->userdata('r_id') != 1) {
			redirect(site_url(''));
		}
	}
	
	function index(){
		
		switch($this->session->userdata('r_id'))
		{
			case 1:
				$link = 'jurutera/v_home';
				$properties['user_log'] = $this->session->all_userdata();
				$this->my_func->getFace($this->load->view('menu/v_menu_jurutera','',true), $this->load->view($link,$properties,true));
			break;
			default:
				redirect(site_url(''));
			break;
		}
	}
	
	function notaminta($stat=1, $bl_id=0) {
		$properties = '';
		$link = 'jurutera/v_notaminta';
		switch($stat) {
			case 1: 
				$properties['nota_minta'] = $this->m_letter_order->getAll4('asc');
				$link = 'jurutera/v_notaminta_senarai';
				break;
			default:
				redirect(site_url('jurutera/notaminta'));
		}
		$this->my_func->getFace($this->load->view('menu/v_menu_jurutera','',true), $this->load->view($link,$properties,true));
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
						$this->m_finance->edit($f_id, $f_data);
						if($this->m_letter_order->delete($lo_id)) {
							$this->m_services->delete_letter_order($lo_id);
							$this->m_part_letter_order->delete_letter_order($lo_id);
						}
					}
				}
			}
		}
		redirect(site_url('jurutera/notaminta/1'));
	}
	
	function paparsurat($lo_id=0) {
		$data['letter_order'] = $this->m_letter_order->get($lo_id);
		$data['letter_order_user'] = $this->m_letter_order->get_user($lo_id);
		$data['part'] = $this->m_part_letter_order->getAll_letter_order($lo_id);
		$data['upah'] = $this->m_services->getAll_letter_order($lo_id);
		$sess = $this->session->all_userdata();
		$data['sess'] = $sess;
		$this->load->view('jurutera/v_surat', $data);
	}
	
	function notamintaedit($lo_id=0) {
		if($this->input->post('lo_id')) {
			
			$lo_id = $this->input->post('lo_id');
			
			if($lo_id != 0) {
				
				$ser_id = $this->input->post('ser_id');
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
			redirect(site_url('jurutera/notaminta'));
		} else {
			$lo = $this->m_letter_order->get($lo_id);
			if($lo) {
				$bl_id = $lo[0]->bl_id;
				$properties['broken_log'] = $this->m_broken_log->get($bl_id);
				$properties['part'] = $this->m_part_letter_order->getAll_letter_order($lo_id);
				$properties['service'] = $this->m_services->getAll_letter_order($lo_id);
				$link = 'jurutera/v_notaminta_ubah';
				$this->my_func->getFace($this->load->view('menu/v_menu_jurutera','',true), $this->load->view($link,$properties,true));
			} else {
				redirect(site_url('jurutera/notaminta'));
			}
		}
	}
	
	function getLog($bl_id=0) {
		$d['broken_log'] = $this->m_broken_log->get($bl_id);
		echo $this->load->view('jurutera/v_broken_log', $d, true);
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
	
	function notamintalulus($stat=0, $lo_id=0, $all=0) {
		$lo_id = $this->input->post('lo_id');
		for($i=0; $i<sizeof($lo_id); $i++) {
			if($stat != 0) {
				switch($stat) {
					case 1:
						$data = array(
							'lo_approveddate' => date('Y-m-d H:i:s'),
							'lo_approvedby' => $this->session->userdata('u_id')
						);
						break;
					case 2:
						$data = array(
							'lo_approveddate' => '0000-00-00 00:00:00',
							'lo_approvedby' => 0
						);
						break;
				}
				$this->m_letter_order->edit($lo_id[$i], $data);
			}
		}
	}
	
	function tolakkewangan() {
		$lo_id = $this->input->post('lo_id');
		$f_code = $this->input->post('f_code');
		$lo_expenses = $this->input->post('lo_expenses');
		$data_lo = array(
			'lo_expenses' => $lo_expenses
		);
		$this->m_letter_order->edit($lo_id, $data_lo); //tetapkan penggunaan kewangan kepada nota minta
		$finance = $this->m_finance->get_code($f_code);
		$f_money = $finance[0]->f_money;
		$f_money -= $lo_expenses; //tolak kewangan
		$data_f = array(
			'f_money' => $f_money
		);
		$this->m_finance->edit_code($f_code, $data_f);
		echo "<script>window.close();</script>";
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
	 
		$link = 'jurutera/v_vehicle';
		$this->my_func->getFace($this->load->view('menu/v_menu_jurutera', '', true), $this->load->view($link, $output, true));
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
		
		$link = 'jurutera/v_contractor';
		$this->my_func->getFace($this->load->view('menu/v_menu_jurutera', '', true), $this->load->view($link, $output, true));
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
		
		$link = 'jurutera/v_finance';
		$this->my_func->getFace($this->load->view('menu/v_menu_jurutera', '', true), $this->load->view($link, $output, true));
	}
	
	function part() {
		$crud = new grocery_CRUD();
		
		/*
		SELECT * 
		FROM part_letter_order plo 
		LEFT JOIN letter_order lo ON plo.lo_id = lo.lo_id
		LEFT JOIN broken_log bl ON lo.bl_id = bl.bl_id
		LEFT JOIN vehicles v ON bl.v_id = v.v_id
		GROUP BY plo.plo_id
		*/
 
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
		
		$link = 'jurutera/v_part';
		$this->my_func->getFace($this->load->view('menu/v_menu_jurutera', '', true), $this->load->view($link, $output, true));
	}
	
	function profil() {
		$properties['profil'] = $this->m_user->get($this->session->userdata('u_id'));
		$link = 'jurutera/v_user';
		$this->my_func->getFace($this->load->view('menu/v_menu_jurutera', '', true), $this->load->view($link, $properties, true));
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
			$new_pwd = $this->input->post('u_password_old');
			if($old_pwd == $new_pwd) {
				$new_pwd = $this->input->post('u_password_new');
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
		redirect(site_url('jurutera/profil'));
	}
	
	function getNotaMintaCount($stat=0) {
		$num_row = $this->m_letter_order->getAll3($stat);
		if($num_row != 0) {
			echo '<strong>(' . $num_row . ')</strong>';
		}
	}
	
	function report($stat=0) {
		switch($stat) {
			case 1:
				$properties['report1'] = '';
				$properties['year'] = $this->m_year->getAll();
				$properties['month'] = $this->m_month->getAll();
				$properties['broken_log_unit'] = $this->m_broken_log_unit->getAll();
				$properties['state'] = $this->m_state->getAll();
				if($this->input->post('post_f1')) {
					$unit = $this->input->post('ser_unit');
					$daerah = $this->input->post('ser_daerah');
					$tahun = $this->input->post('ser_tahun');
					$bulan = $this->input->post('ser_bulan');
					$properties['broken_log'] = $this->m_broken_log->get_report($unit, $daerah, $tahun, $bulan);
				}
				$link = 'jurutera/v_report1';
				break;
			case 2:
				$properties['report2'] = $this->m_letter_order->getReportContractor();
				if($this->input->post('ser_kew')) {
					$f_id = $this->input->post('ser_kew');
					//print_r($f_id); die();
					$properties['report2'] = $this->m_letter_order->getReportContractor($f_id);
				}
				$properties['finance'] = $this->m_finance->getAll();
				$link = 'jurutera/v_report2';
				break;
			case 3:
				if($this->input->post('ser_kew')) {
					$f_id = $this->input->post('ser_kew');
					$properties['kewangan'] = $this->m_finance->getReport11($f_id);
					$properties['kew'] = $this->m_finance->getReport11($f_id);
					$properties['fin'] = $this->m_finance->get($f_id);
				}
				$properties['report3'] = $this->m_letter_order->getReportContractor();
				$properties['finance'] = $this->m_finance->getAll();
				$link = 'jurutera/v_report3';
				break;
			case 4:
				$properties['vehicles'] = $this->m_vehicles->getUsedVehicles();
				$properties['v_id'] = 0;
				$properties['tarikhmula'] = "00/00/0000";
				$properties['tarikhakhir'] = "00/00/0000";
				if($this->input->post('v_id')) {
					$properties['v_id'] = $this->input->post('v_id');
					$properties['tarikhmula'] = $this->input->post('tarikhmula');
					$properties['tarikhakhir'] = $this->input->post('tarikhakhir');
					if($properties['v_id'] != 0) {
						$properties['report4'] = $this->m_broken_log->get_report2($properties['v_id'], $this->my_func->datetosql($properties['tarikhmula']), $this->my_func->datetosql($properties['tarikhakhir']));
					}
				}
				if($this->input->post('tarikhmula')) {
					$properties['tarikhmula'] = $this->input->post('tarikhmula');
				}
				if($this->input->post('tarikhakhir')) {
					$properties['tarikhakhir'] = $this->input->post('tarikhakhir');
				}
				if($properties['v_id'] == 0) {
					$veh = $this->m_vehicles->getUsedVehicles();
					if($veh) { 
					foreach($veh as $vh) {
						$properties['report5'][] = $this->m_broken_log->get_report2($vh->v_id, $this->my_func->datetosql($properties['tarikhmula']), $this->my_func->datetosql($properties['tarikhakhir']));
						}
					}
				}
				$link = 'jurutera/v_report4';
				break;
			default:
				$properties[''] = '';
				$link = 'jurutera/v_report';
				break;
		}
		$this->my_func->getFace($this->load->view('menu/v_menu_jurutera', '', true), $this->load->view($link, $properties, true));
	}
	
	function exportReport1() {
		$tarikh = date('dmYHis');
		$file = "Laporan_Log_Kerja_" . $tarikh . ".xls";
		$unit = $this->input->post('unit');
		$daerah = $this->input->post('daerah');
		$tahun = $this->input->post('tahun');
		$bulan = $this->input->post('bulan');
		$broken_log = $this->m_broken_log->get_report($unit, $daerah, $tahun, $bulan);
		$test = '<table class="table" cellpadding="0" cellspacing="0">';
		if($unit != '-1') {
			$u = $this->m_broken_log_unit->get_code($unit);
			if($u) {
				$test .= '<tr>
					<th colspan="2" align="left" valign="top">Unit</th>
					<th colspan="1" align="left" valign="top">:</th>
					<th colspan="5" align="left" valign="top">'.$u[0]->blu_desc.' ('.$u[0]->blu_code.')</th>
				</tr>';
			}
		}
		if($daerah != '-1') {
			$d = $this->m_state->get($daerah);
			if($d) {
				$test .= '<tr>
					<th colspan="2" align="left" valign="top">Daerah</th>
					<th colspan="1" align="left" valign="top">:</th>
					<th colspan="5" align="left" valign="top">'.$d[0]->s_name.'</th>
				</tr>';
			}
		}
		if($tahun != '-1') {
			$t = explode('-', $tahun);
			$test .= '<tr>
        		<th colspan="2" align="left" valign="top">Tahun</th>
				<th colspan="1" align="left" valign="top">:</th>
				<th colspan="5" align="left" valign="top">'.$t[0].'</th>
			</tr>';
		}
		if($bulan != '-1') {
			$bln = explode('-', $bulan);
			if(!empty($bln[1])) {
				$b = $this->m_month->get($bln[1]);
				if($b) {
					$test .= '<tr>
						<th colspan="2" align="left" valign="top">Bulan</th>
						<th colspan="1" align="left" valign="top">:</th>
						<th colspan="5" align="left" valign="top">'.$b[0]->m_desc.'</th>
					</tr>';
				}
			}
		}
		$test .= '<tr>
        		<th colspan="8" align="left" valign="top">&nbsp;</th>
			</tr>
		<tr><td><strong>Bilangan: '.sizeof($broken_log).'</strong></td></tr>
		<tr>
        	<th width="2%" align="left" valign="top">Bil.</th>
        	<th width="5%" align="left" valign="top">No Unit</th>
            <th width="5%" align="left" valign="top">Tarikh</th>
            <th width="5%" align="left" valign="top">Kod Kewangan</th>
            <th width="5%" align="left" valign="top">Nombor L/O</th>
            <th width="7%" align="left" valign="top">No. Kenderaan</th>
            <th width="5%" align="left" valign="top">Kump.</th>
            <th width="5%" align="left" valign="top">Model</th>
            <th width="5%" align="left" valign="top">Pembuat</th>
            <th width="5%" align="left" valign="top">Lokasi</th>
            <th width="9%" align="left" valign="top">Perihal Kerosakan</th>
            <th width="5%" align="left" valign="top">Status</th>
            <th width="8%" align="left" valign="top">Jenis Pembaikian</th>
            <th width="5%" align="left" valign="top">Pekerja</th>
            <th width="8%" align="left" valign="top">Kontraktor</th>
            <th width="5%" align="left" valign="top">Harga (RM)</th>
            <th width="7%" align="left" valign="top">Pembuat Log</th>
            <th width="7%" align="left" valign="top">Status Lulus</th>
            <th width="12%" align="left" valign="top">Pelulus</th>
        </tr>';
		if($broken_log) { 
			$i=1; 
			foreach($broken_log as $bl) { 
				$test .= '<tr>
				  <td align="left" valign="top">'.$i++.'.&nbsp;</td>
				  <td align="left" valign="top">'.$bl->bl_unit.'&nbsp;</td>
				  <td align="left" valign="top">'.$this->my_func->sqltodate($bl->bl_recorddate).'&nbsp;</td>
				  <td align="left" valign="top">'.$bl->f_code.'&nbsp;</td>
      	          <td align="left" valign="top">'.$bl->bl_nolo.'&nbsp;</td>
				  <td align="left" valign="top">'.$bl->v_registrationno.'&nbsp;</td>
				  <td align="left" valign="top">'.$bl->v_group.'&nbsp;</td>
      	  		  <td align="left" valign="top">'.$bl->v_model.'&nbsp;</td>
      	  		  <td align="left" valign="top">'.$bl->v_maker.'&nbsp;</td>
      	  		  <td align="left" valign="top">'.$bl->v_location.'&nbsp;</td>
				  <td align="left" valign="top">'.$bl->bl_remarks.'&nbsp;</td>
				  <td align="left" valign="top">'.$this->my_func->getStatusBL($bl->bl_repairstatus).'&nbsp;</td>
				  <td align="left" valign="top">'.$bl->jk_desc.'&nbsp;</td>
				  <td align="left" valign="top">'.$this->my_func->getPekerja($bl->bl_id).'&nbsp;</td>
				  <td align="left" valign="top">'.$bl->c_name.'&nbsp;</td>
				  <td align="left" valign="top">'.$this->m_letter_order->getExpenses($bl->bl_id).'</td>
				  <td align="left" valign="top">'.$bl->u_fullname.'&nbsp;</td>
         		  <td align="left" valign="top">'.$this->my_func->getStatusNM($bl->lo_approvedby).'&nbsp;</td>
          		  <td align="left" valign="top">'.$this->m_user->getPelulus($bl->lo_approvedby).'&nbsp;</td>
				</tr>'; 
			} 
		}
		$test .= "</table>";
		header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=$file");
		echo $test;
	}
	
	function exportReport22() {
		$tarikh = date('dmYHis');
		$file = "Laporan_Log_Kerja_" . $tarikh . ".xls";
		$test = '';
		
		header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=$file");
		echo $test;
	}
	
	function exportReport2_all() {
		$tarikh = date('dmYHis');
		$file = "Laporan_Log_Kerja_" . $tarikh . ".xls";
		$tarikhmula = $this->input->post('tarikhmula');
		$tarikhakhir = $this->input->post('tarikhakhir');
		$veh = $this->m_vehicles->getUsedVehicles();
		if($veh) { 
			foreach($veh as $vh) {
				$report5[] = $this->m_broken_log->get_report2($vh->v_id, $this->my_func->datetosql($tarikhmula), $this->my_func->datetosql($tarikhakhir));
			}
		}
		$test = '';
		if(isset($report5)) { 
			foreach($report5 as $r5) { 
				if(isset($r5)) {
			$test .= '<hr /><table>
		<tr>
			<td colspan="6" align="right" valign="top">KEW.PA-14</td>
		</tr>
		<tr>
			<th colspan="6" align="center" valign="top">DAFTAR PENYELENGGARAAN HARTA MODAL</th>
		</tr>
		<tr>
			<td colspan="6" align="center" valign="top">(diisi oleh Pegawai Aset)</td>
		</tr>
		<tr>
			<td colspan="6">&nbsp;</td>
		</tr>
		<tr>
			<td width="8%" valign="top"><strong>Kategori</strong></td>
			<td width="38%" valign="top"><strong> : 
			  '. $r5[0]->v_category . '
			</strong></td>
			<td width="3%" valign="top">&nbsp;</td>
			<td width="18%" valign="top"><strong>No. Siri Pendaftaran</strong></td>
			<td width="31%" valign="top"><strong> : 
			  ' . $r5[0]->v_registrationno . '
			</strong></td>
			<td width="2%" valign="top">&nbsp;</td>
		</tr>
		<tr>
			<td valign="top"><strong>Jenis</strong></td>
			<td valign="top"><strong> : 
			  ' . $r5[0]->v_group . '
			</strong></td>
			<td valign="top">&nbsp;</td>
			<td valign="top"><strong>Lokasi</strong></td>
			<td valign="top"><strong> : 
			  ' . $r5[0]->v_location . '
			</strong></td>
			<td valign="top">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="6">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="6">
				<table border="1">
					<tr>
						<th align="center" valign="top">(a)<br />Tarikh</th>
						<th align="center" valign="top">(b)<br />Butir-butir kerja</th>
						<th align="center" valign="top">(c)<br />No. Kontrak/Pesanan<br />Kerajaan dan Tarikh</th>
						<th align="center" valign="top">(d)<br />Nama Syarikat/Jabatan<br />Yang Menyelenggara</th>
						<th align="center" valign="top">(e)<br />Kos (RM)</th>
						<th align="center" valign="top">(f)<br />Nama dan<br />Tandatangan</th>
					</tr>';
					
					foreach($r5 as $r) {
						$test .= '
						<tr>
							<td>' . $this->my_func->sqltodate($r->bl_recorddate) . '</td>
							<td>' . $r->bl_remarks . '</td>
							<td>' . $r->bl_nolo . '</td>
							<td>' . $r->c_name . '</td>
							<td>' . $r->bl_harga . '</td>
							<td>' . $r->u_fullname . '</td>
						</tr>';
					}
					
					$test .= '
				</table>
			</td>
		</tr>
		<tr>
		  <td colspan="6">&nbsp;</td>
		</tr>
		<tr>
		  <td colspan="6"><table cellspacing="0" cellpadding="0">
			<col width="81">
			<col width="287">
			<col width="246">
			<col width="200">
			<tr>
			  <td width="81" valign="top"><span class="tablenota">Nota         :</span></td>
			  <td width="733" colspan="3" valign="top"><span class="tablenota"><strong>a)    Tarikh pembaikan/penyelenggaraan yang telah dilakukan bagi harta modal    berkenaan.</strong></span></td>
			</tr>
			<tr>
			  <td valign="top"></td>
			  <td valign="top"><span class="tablenota"><strong>b) Butir-butir kerja </strong></span></td>
			  <td valign="top"></td>
			  <td valign="top"></td>
			</tr>
			<tr>
			  <td valign="top"></td>
			  <td colspan="2" valign="top"><span class="tablenota">    Keterangan mengenai kerja-kerja pembaikan    termasuk alat ganti yang dibeli</span></td>
			  <td valign="top"></td>
			</tr>
			<tr>
			  <td valign="top"></td>
			  <td colspan="2" valign="top"><span class="tablenota"><strong>c) No. kontrak/No.    Pesanan Kerajaan beserta tarikh</strong></span></td>
			  <td valign="top"></td>
			</tr>
			<tr>
			  <td valign="top"></td>
			  <td colspan="2" valign="top"><span class="tablenota">    No. Rujukan Pesanan Kerajaan/ No.Kontrak    berserta tarikh.</span></td>
			  <td valign="top"></td>
			</tr>
			<tr>
			  <td valign="top"></td>
			  <td colspan="2" valign="top"><span class="tablenota"><strong>d) Nama Syarikat/Jabatan    yang menyelenggara</strong></span></td>
			  <td valign="top"></td>
			</tr>
			<tr>
			  <td valign="top"></td>
			  <td colspan="2" valign="top"><span class="tablenota">    Nama syarikat atau Jabatan yang    melaksanakan kerja-kerja penyelenggaraan. </span></td>
			  <td valign="top"></td>
			</tr>
			<tr>
			  <td valign="top"></td>
			  <td valign="top"><span class="tablenota"><strong>e) Kos</strong></span></td>
			  <td valign="top"></td>
			  <td valign="top"></td>
			</tr>
			<tr>
			  <td valign="top"></td>
			  <td colspan="2" valign="top"><span class="tablenota">    Kos Alat ganti atau kos pembaikan atau    kedua-duanya sekali. </span></td>
			  <td valign="top"></td>
			</tr>
			<tr>
			  <td valign="top"></td>
			  <td valign="top"><span class="tablenota"><strong>f)  Nama dan Tandatangan</strong></span></td>
			  <td valign="top"></td>
			  <td valign="top"></td>
			</tr>
			<tr>
			  <td valign="top"></td>
			  <td colspan="3" valign="top"><span class="tablenota">    Pegawai Aset/ Pengangkutan hendaklah    menandatangani bagi mengesahkan butir-butir penyelenggaraan tersebut. </span></td>
			</tr>
		  </table></td>
		</tr>';
			$test .= "</table>";
		} } }
		header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=$file");
		echo $test;
	}
	
	function exportReport2() {
		$tarikh = date('dmYHis');
		$file = "Laporan_Log_Kerja_" . $tarikh . ".xls";
		$v_id = $this->input->post('v_id');
		$tarikhmula = $this->input->post('tarikhmula');
		$tarikhakhir = $this->input->post('tarikhakhir');
		$report4 = $this->m_broken_log->get_report2($v_id, $this->my_func->datetosql($tarikhmula), $this->my_func->datetosql($tarikhakhir));
		$test = '';
		if($report4) {
			$test = '<table>
		<tr>
			<td colspan="6" align="right" valign="top">KEW.PA-14</td>
		</tr>
		<tr>
			<th colspan="6" align="center" valign="top">DAFTAR PENYELENGGARAAN HARTA MODAL</th>
		</tr>
		<tr>
			<td colspan="6" align="center" valign="top">(diisi oleh Pegawai Aset)</td>
		</tr>
		<tr>
			<td colspan="6">&nbsp;</td>
		</tr>
		<tr>
			<td width="8%" valign="top"><strong>Kategori</strong></td>
			<td width="38%" valign="top"><strong> : 
			  '. $report4[0]->v_category . '
			</strong></td>
			<td width="3%" valign="top">&nbsp;</td>
			<td width="18%" valign="top"><strong>No. Siri Pendaftaran</strong></td>
			<td width="31%" valign="top"><strong> : 
			  ' . $report4[0]->v_registrationno . '
			</strong></td>
			<td width="2%" valign="top">&nbsp;</td>
		</tr>
		<tr>
			<td valign="top"><strong>Jenis</strong></td>
			<td valign="top"><strong> : 
			  ' . $report4[0]->v_group . '
			</strong></td>
			<td valign="top">&nbsp;</td>
			<td valign="top"><strong>Lokasi</strong></td>
			<td valign="top"><strong> : 
			  ' . $report4[0]->v_location . '
			</strong></td>
			<td valign="top">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="6">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="6">
				<table border="1">
					<tr>
						<th align="center" valign="top">(a)<br />Tarikh</th>
						<th align="center" valign="top">(b)<br />Butir-butir kerja</th>
						<th align="center" valign="top">(c)<br />No. Kontrak/Pesanan<br />Kerajaan dan Tarikh</th>
						<th align="center" valign="top">(d)<br />Nama Syarikat/Jabatan<br />Yang Menyelenggara</th>
						<th align="center" valign="top">(e)<br />Kos (RM)</th>
						<th align="center" valign="top">(f)<br />Nama dan<br />Tandatangan</th>
					</tr>';
					
					foreach($report4 as $r) {
						$test .= '
						<tr>
							<td>' . $this->my_func->sqltodate($r->bl_recorddate) . '</td>
							<td>' . $r->bl_remarks . '</td>
							<td>' . $r->bl_nolo . '</td>
							<td>' . $r->c_name . '</td>
							<td>' . $r->bl_harga . '</td>
							<td>' . $r->u_fullname . '</td>
						</tr>';
					}
					
					$test .= '
				</table>
			</td>
		</tr>
		<tr>
		  <td colspan="6">&nbsp;</td>
		</tr>
		<tr>
		  <td colspan="6"><table cellspacing="0" cellpadding="0">
			<col width="81">
			<col width="287">
			<col width="246">
			<col width="200">
			<tr>
			  <td width="81" valign="top"><span class="tablenota">Nota         :</span></td>
			  <td width="733" colspan="3" valign="top"><span class="tablenota"><strong>a)    Tarikh pembaikan/penyelenggaraan yang telah dilakukan bagi harta modal    berkenaan.</strong></span></td>
			</tr>
			<tr>
			  <td valign="top"></td>
			  <td valign="top"><span class="tablenota"><strong>b) Butir-butir kerja </strong></span></td>
			  <td valign="top"></td>
			  <td valign="top"></td>
			</tr>
			<tr>
			  <td valign="top"></td>
			  <td colspan="2" valign="top"><span class="tablenota">    Keterangan mengenai kerja-kerja pembaikan    termasuk alat ganti yang dibeli</span></td>
			  <td valign="top"></td>
			</tr>
			<tr>
			  <td valign="top"></td>
			  <td colspan="2" valign="top"><span class="tablenota"><strong>c) No. kontrak/No.    Pesanan Kerajaan beserta tarikh</strong></span></td>
			  <td valign="top"></td>
			</tr>
			<tr>
			  <td valign="top"></td>
			  <td colspan="2" valign="top"><span class="tablenota">    No. Rujukan Pesanan Kerajaan/ No.Kontrak    berserta tarikh.</span></td>
			  <td valign="top"></td>
			</tr>
			<tr>
			  <td valign="top"></td>
			  <td colspan="2" valign="top"><span class="tablenota"><strong>d) Nama Syarikat/Jabatan    yang menyelenggara</strong></span></td>
			  <td valign="top"></td>
			</tr>
			<tr>
			  <td valign="top"></td>
			  <td colspan="2" valign="top"><span class="tablenota">    Nama syarikat atau Jabatan yang    melaksanakan kerja-kerja penyelenggaraan. </span></td>
			  <td valign="top"></td>
			</tr>
			<tr>
			  <td valign="top"></td>
			  <td valign="top"><span class="tablenota"><strong>e) Kos</strong></span></td>
			  <td valign="top"></td>
			  <td valign="top"></td>
			</tr>
			<tr>
			  <td valign="top"></td>
			  <td colspan="2" valign="top"><span class="tablenota">    Kos Alat ganti atau kos pembaikan atau    kedua-duanya sekali. </span></td>
			  <td valign="top"></td>
			</tr>
			<tr>
			  <td valign="top"></td>
			  <td valign="top"><span class="tablenota"><strong>f)  Nama dan Tandatangan</strong></span></td>
			  <td valign="top"></td>
			  <td valign="top"></td>
			</tr>
			<tr>
			  <td valign="top"></td>
			  <td colspan="3" valign="top"><span class="tablenota">    Pegawai Aset/ Pengangkutan hendaklah    menandatangani bagi mengesahkan butir-butir penyelenggaraan tersebut. </span></td>
			</tr>
		  </table></td>
		</tr>';
			$test .= "</table>";
		}
		header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=$file");
		echo $test;
	}
	
}

?>