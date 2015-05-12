<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class My_Func {
	
	public function __construct(){
		$this->obj = &get_instance();
	}
	
	public function convert($str) {
		$str = str_replace("%20", " ", $str);
		
		return $str;
	}
	
	public function getFace($menubar, $content) {
		$CI = $this->obj;
		$data['menu_content'] = $menubar;
		$data['main_content'] = $content;
		$data['user_log'] = $CI->session->all_userdata();
		$data['menu_title'] = $CI->load->view('header/v_title.php', $data, true);
		$data['menu_user'] = $CI->load->view('header/v_user.php', $data, true);
		$CI->load->view('v_main', $data);
	}
	
	public function datetosql($date) {
		$d = explode("/", $date);
		if($date === "") {
			return "0000-00-00";
		} else {
			return $d[2]."-".$d[1]."-".$d[0];
		}
	}
	
	public function sqltodate($date) {
		$d1 = explode(" ", $date);
		$d2 = explode("-", $d1[0]);
		if($date === "") {
			return "0000-00-00";
		} else {
			return $d2[2]."/".$d2[1]."/".$d2[0];
		}
	}
	
	public function trimNumber($no) {
		if($no < 10) {
			return '00'.$no;
		} else if($no < 100) {
			return '0'.$no;
		} else if($no < 1000) {
			return $no;
		} else {
			return '001';
		}
	}
	
	public function getNoUnit($unit) {
		$CI = $this->obj;
		$bl_unit = $CI->m_broken_log->getAll_unit($unit);
		$year = date('Y');
		if(!empty($bl_unit)) {
			$d = explode('/', $bl_unit);
			$n = intval($d[1])+1 < 1000 ? intval($d[1])+1 : 1;
			if($year == $d[2]) {
				$m = $this->trimNumber($n);
				return $unit.'/'.$m.'/'.$year;
			} else {
				return $unit.'/001/'.$year;
			}
		} else {
			return $unit.'/001/'.$year;
		}
	}
	
	public function getNoUnit2($unit, $old_unit) {
		// unit=KR, old_unit=KB/001/2013
		$CI = $this->obj;
		$year = date('Y');
		if($old_unit != '' && $old_unit != NULL) {
			$old = explode('/', $old_unit);
			// old[0]=KB, old[1]=001, old[2]=2013
			$new_unit = $unit.'/'.$old[1].'/'.$old[2]; //susunan unit baru
			// new unit = KR/001/2013
			if($new_unit == $old_unit) {
				return $old_unit;
			} else {
				$bl_unit = $CI->m_broken_log->getAll_unit($unit); //unit=KR
				if(!empty($bl_unit)) {
					// bl_unit=KR/002/2013
					$new = explode('/', $bl_unit);
					// new[0]=KR, new[1]=002, new[2]=2013
					$n = intval($new[1])+1 < 1000 ? intval($new[1])+1 : 1;
					// n=3
					$m = $this->trimNumber($n);
					// m=003
					if($new[2] == $old[2]) {
						// return KR/003/2013
						return $unit.'/'.$m.'/'.$new[2];
					} else {
						return $unit.'/'.$m.'/'.$year;
					}
				} else {
					return $unit.'/001/'.$year;
				}
			}
		} else {
			return '00/001/'.$year;
		}
	}
	
	public function getStatusBL($stat) {
		switch($stat) {
			case 1: return 'SIAP';
			case 2: return 'SEDANG DIBAIKI';
		}
	}
	
	public function getStatusNM($stat) {
		if($stat != 0) {
			return 'LULUS';
		} else {
			return '-';
		}
	}
	
	public function getUnit($bl_unit) {
		return explode("/", $bl_unit);
	}
	
	public function getPekerja($bl_id) {
		$worker = "";
		$CI = $this->obj;
		$data = $CI->m_worker->getAll_broken_log($bl_id);
		if($data) {
			foreach($data as $d) {
				$worker .= $d->w_name . "<br />";
			}
		}
		return $worker;
	}
	
	//function definition goes after here
}
?>