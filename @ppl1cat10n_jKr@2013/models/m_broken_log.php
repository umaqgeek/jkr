<?php
  class M_broken_log extends CI_Model {
	  
	  function getAll($u_id=0, $order='', $status=0) {
		  $this->db->select('*');
		  $this->db->from('broken_log bl');
		  $this->db->join('vehicles v', 'v.v_id = bl.v_id', 'left');
		  $this->db->join('contractor c', 'c.c_id = bl.c_id', 'left');
		  $this->db->join('state s', 's.s_id = bl.s_id', 'left');
		  $this->db->join('finance f', 'f.f_id = bl.f_id', 'left');
		  $this->db->join('perolehan pe', 'pe.pe_id = bl.pe_id', 'left');
		  if($u_id != 0) {
			  $this->db->where('bl.u_id', $u_id);
		  }
		  if($status != 0) {
			  $this->db->where('bl.bl_status', $status);
		  }
		  if($order != '') {
			  $this->db->order_by('bl.bl_id', $order);
		  }
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  foreach($q->result() as $r) {
				  $d[] = $r;
			  }
			  return $d;
		  }
	  }
	  
	  function getAll_unit($unit) {
		  $this->db->select('bl.bl_unit');
		  $this->db->from('broken_log bl');
		  $this->db->like('bl.bl_unit', $unit); 
		  $this->db->order_by('bl.bl_id', 'desc');
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  $r = $q->result();
			  return $r[0]->bl_unit;
		  }
	  }
	  
	  function get($id) {
		  $this->db->select('*, bl.bl_id as bl_idx');
		  $this->db->from('broken_log bl');
		  $this->db->join('vehicles v', 'v.v_id = bl.v_id', 'left');
		  $this->db->join('contractor c', 'c.c_id = bl.c_id', 'left');
		  $this->db->join('state s', 's.s_id = bl.s_id', 'left');
		  $this->db->join('finance f', 'f.f_id = bl.f_id', 'left');
		  $this->db->join('user u', 'u.u_id = bl.u_id', 'left');
		  $this->db->join('perolehan pe', 'pe.pe_id = bl.pe_id', 'left');
		  $this->db->join('jenis_kerja jk', 'jk.jk_id = bl.jk_id', 'left');
		  $this->db->join('letter_order lo', 'lo.bl_id = bl.bl_id', 'left');
		  $this->db->where('bl.bl_id', $id);
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  foreach($q->result() as $r) {
				  $d[] = $r;
			  }
			  return $d;
		  }
	  }
	  
	  function get_report($bl_unit='-1', $s_id='-1', $year='-1', $month='-1') {
		  $this->db->select('*');
		  $this->db->from('broken_log bl');
		  $this->db->join('vehicles v', 'v.v_id = bl.v_id', 'left');
		  $this->db->join('contractor c', 'c.c_id = bl.c_id', 'left');
		  $this->db->join('state s', 's.s_id = bl.s_id', 'left');
		  $this->db->join('finance f', 'f.f_id = bl.f_id', 'left');
		  $this->db->join('user u', 'u.u_id = bl.u_id', 'left');
		  $this->db->join('perolehan pe', 'pe.pe_id = bl.pe_id', 'left');
		  $this->db->join('jenis_kerja jk', 'jk.jk_id = bl.jk_id', 'left');
		  $this->db->join('letter_order lo', 'lo.bl_id = bl.bl_id', 'left');
		  if($bl_unit != '-1') {
			  $this->db->like('bl.bl_unit', $bl_unit);
		  }
		  if($s_id != '-1') {
			  $this->db->where('bl.s_id', $s_id);
		  }
		  if($year != '-1') {
			  $this->db->where('YEAR(bl.bl_recorddate)', 'YEAR("'.$year.'")' , FALSE);
		  }
		  if($month != '-1') {
			  $this->db->where('MONTH(bl.bl_recorddate)', 'MONTH("'.$month.'")' , FALSE);
		  }
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  foreach($q->result() as $r) {
				  $d[] = $r;
			  }
			  return $d;
		  }
	  }
	  
	  function get_report2($v_id=0, $tarikhmula="0000-00-00", $tarikhakhir="0000-00-00") {
		  $this->db->select('*');
		  $this->db->from('broken_log bl');
		  $this->db->join('vehicles v', 'v.v_id = bl.v_id', 'left');
		  $this->db->join('contractor c', 'c.c_id = bl.c_id', 'left');
		  $this->db->join('state s', 's.s_id = bl.s_id', 'left');
		  $this->db->join('finance f', 'f.f_id = bl.f_id', 'left');
		  $this->db->join('user u', 'u.u_id = bl.u_id', 'left');
		  $this->db->join('perolehan pe', 'pe.pe_id = bl.pe_id', 'left');
		  $this->db->join('jenis_kerja jk', 'jk.jk_id = bl.jk_id', 'left');
		  if($v_id != 0) {
			  $this->db->where('bl.v_id', $v_id);
		  }
		  if(strcmp($tarikhmula, "0000-00-00") != 0 && strcmp($tarikhakhir, "0000-00-00") != 0) {
			  $this->db->where('bl.bl_recorddate BETWEEN DATE(\''.$tarikhmula.'\') AND DATE(\''.$tarikhakhir.'\')');
		  }
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  foreach($q->result() as $r) {
				  $d[] = $r;
			  }
			  return $d;
		  }
	  }
	  
	  function add($data) {
		  if($this->db->insert('broken_log', $data)) {
			  return $this->db->insert_id();
		  } else {
			  return 0;
		  }
	  }
	  
	  function edit($id, $data) {
		  $this->db->where('bl_id', $id);
		  return $this->db->update('broken_log', $data);
	  }
	  
	  function delete($id) {
		  $this->db->where('bl_id', $id);
		  return $this->db->delete('broken_log');
	  }
	
  }

?>