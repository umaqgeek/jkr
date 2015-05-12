<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tukang extends MY_Controller {
	
	public function __construct(){
		parent::__construct();
		
		if($this->session->userdata('r_id') != 4) {
			redirect(site_url(''));
		}
	}
	
	function index(){
		
		switch($this->session->userdata('r_id'))
		{
			case 4:
				$link = 'tukang/v_home';
				$properties['user_log'] = $this->session->all_userdata();
				$this->my_func->getFace($this->load->view('menu/v_menu_tukang','',true), $this->load->view($link,$properties,true));
			break;
			default:
				redirect(site_url(''));
			break;
		}
	}
	
	function brokenadd() {
		$user = $this->m_user->get($this->session->userdata('u_id'));
		$data = array(
			'bl_unit' => $this->my_func->getNoUnit($this->input->post('bl_unit')),
			'bl_recorddate' => date('Y-m-d H:i:s'),
			'bl_settledate' => $this->my_func->datetosql($this->input->post('bl_settledate')),
			'bl_repairstatus' => $this->input->post('bl_repairstatus'),
			'bl_reason' => '',
			'bl_harga' => 0.00,
			'c_id' => 0,
			'v_id' => $this->input->post('v_id'),
			's_id' => $this->input->post('s_id'),
			'f_id' => 0,
			'bl_remarks' => $this->input->post('bl_remarks'),
			'bl_nodo' => '0',
			'pe_id' => 0,
			'bl_nosebutharga' => '0',
			'jk_id' => $this->input->post('jk_id'),
			'bl_status' => 1,
			'u_id' => $user[0]->u_parentid
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
		
		redirect(site_url('tukang/broken/1/1/'.$broken_log));
		
	}
	
	function brokenedit($bl_id=0) {
		if($this->input->post('bl_id')) {
			$bl_id = $this->input->post('bl_id');
			$data = array(
				'bl_unit' => $this->my_func->getNoUnit2($this->input->post('bl_unit'), $this->input->post('old_bl_unit')),
				'bl_recorddate' => date('Y-m-d H:i:s'),
				'bl_settledate' => $this->my_func->datetosql($this->input->post('bl_settledate')),
				'bl_repairstatus' => $this->input->post('bl_repairstatus'),
				'bl_reason' => '',
				'bl_harga' => 0.00,
				'c_id' => 0,
				'v_id' => $this->input->post('v_id'),
				's_id' => $this->input->post('s_id'),
				'f_id' => 0,
				'bl_remarks' => $this->input->post('bl_remarks'),
				'bl_nodo' => '0',
				'pe_id' => 0,
				'bl_nosebutharga' => '0',
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
			
			redirect(site_url('tukang/brokenedit/'.$bl_id.'/2'));
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
			$link = 'tukang/v_rosak_ubah';
			$this->my_func->getFace($this->load->view('menu/v_menu_tukang','',true), $this->load->view($link,$properties,true));
		}
	}
	
	function brokenexport() {
		$tarikh = date('dmYHis');
		$file = "logkerja" . $tarikh . ".xls";
		$user = $this->m_user->get($this->session->userdata('u_id'));
		$broken_log = $this->m_broken_log->getAll($user[0]->u_parentid, 'desc', 0);
		$test = "<table><tr><th>Bil.</th><th>Unit</th><th>Tarikh Rekod</th><th>Tarikh Siap</th><th>Status Baiki</th><th>Harga</th><th>Kontraktor</th><th>No. Pendaftaran</th><th>Perihal Kerosakan</th><th>Kod Peruntukan Kewangan</th></tr>";
		if($broken_log) {
			$i = 1;
			foreach($broken_log as $bl) {
				$test .= "<tr>
					<td>" . ($i++) . ".</td>
					<td>" . $bl->bl_unit . "</td>
					<td>" . $this->my_func->sqltodate($bl->bl_recorddate) . "</td>
					<td>" . $this->my_func->sqltodate($bl->bl_settledate) . "</td>
					<td>" . $this->my_func->getStatusBL($bl->bl_repairstatus) . " &nbsp;
						";
				if($bl->bl_repairstatus == 2) { $test .= '('.$bl->bl_reason.')'; }
				$test .= "</td>
					<td>RM " . $bl->bl_harga . "</td>
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
	
	function brokendelete($bl_id) {
		if(!empty($bl_id)) {
			if($this->m_broken_log->delete($bl_id)) {
				$this->m_worker->delete_broken_log($bl_id);
				$this->m_broken_log_component->delete_broken_log($bl_id);
				$this->m_letter_order->delete_broken_log($bl_id);
			}
		}
		redirect(site_url('tukang/broken/2'));
	}
	
	function broken($stat=2) {
		$properties = '';
		$link = 'tukang/v_rosak';
		switch($stat) {
			case 1:
				$properties['vehicles'] = $this->m_vehicles->getAll();
				$properties['state'] = $this->m_state->getAll();
				$properties['broken_log_unit'] = $this->m_broken_log_unit->getAll();
				$properties['jenis_kerja'] = $this->m_jenis_kerja->getAll();
				$link = 'tukang/v_rosak_tambah';
				break;
			case 2: 
				$user = $this->m_user->get($this->session->userdata('u_id'));
				$properties['broken_log'] = $this->m_broken_log->getAll($user[0]->u_parentid, 'desc', 0);
				$link = 'tukang/v_rosak_senarai';
				break;
			case 3:
				$properties['bl_id'] = $this->uri->segment(4);
				$bl_exist = $this->m_broken_log->get($properties['bl_id']);
				if($bl_exist) {
					$properties['broken_log'] = $this->m_broken_log->getAll($this->session->userdata('u_id'), 'desc', 0);
					$link = 'tukang/v_rosak_tambah2';
				} else {
					redirect(site_url('tukang/broken'));
				}
				break;
		}
		$this->my_func->getFace($this->load->view('menu/v_menu_tukang','',true), $this->load->view($link,$properties,true));
	}
	
	function profil() {
		$properties['profil'] = $this->m_user->get($this->session->userdata('u_id'));
		$link = 'tukang/v_user';
		$this->my_func->getFace($this->load->view('menu/v_menu_tukang', '', true), $this->load->view($link, $properties, true));
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
		redirect(site_url('tukang/profil'));
	}
	
}

?>