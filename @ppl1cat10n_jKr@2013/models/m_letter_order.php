<?php
  class M_letter_order extends CI_Model {
	  
	  function getAll($u_id=0, $order='') {
		  $this->db->select('*');
		  $this->db->from('letter_order lo');
		  $this->db->join('broken_log bl', 'bl.bl_id = lo.bl_id', 'left');
		  $this->db->join('state s', 's.s_id = bl.s_id', 'left');
		  $this->db->join('finance f', 'f.f_id = bl.f_id', 'left');
		  $this->db->join('contractor c', 'c.c_id = bl.c_id', 'left');
		  $this->db->join('vehicles v', 'v.v_id = bl.v_id', 'left');
		  $this->db->join('user u', 'u.u_id = lo.lo_approvedby', 'left');
		  if($u_id != 0) {
			  $this->db->where('lo.u_id', $u_id);
		  }
		  if($order != '') {
			  $this->db->order_by('lo.lo_id', $order);
		  }
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  foreach($q->result() as $r) {
				  $d[] = $r;
			  }
			  return $d;
		  }
	  }
	  
	  function getReportContractor($f_id=array()) {
		  /*SELECT *, SUM(lo.lo_expenses) AS exp FROM letter_order lo, broken_log bl, contractor c WHERE lo.bl_id = bl.bl_id AND bl.c_id = c.c_id GROUP BY bl.c_id*/
		  $this->db->select('*, SUM(lo.lo_expenses) AS expenses');
		  $this->db->from('letter_order lo, broken_log bl, contractor c');
		  $this->db->where('lo.bl_id = bl.bl_id');
		  $this->db->where('bl.c_id = c.c_id');
		  if($f_id != 0) {
			  $ayat = '(';
			  for($i=0; $i<sizeof($f_id)-1; $i++) {
				  $ayat .= 'bl.f_id = '.$f_id[$i].' OR ';
			  }
			  if(sizeof($f_id) > 0) {
				  $ayat .= 'bl.f_id = '.$f_id[sizeof($f_id)-1].')';
			  	  $this->db->where($ayat);
			  }
		  }
		  $this->db->group_by('bl.c_id');
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  foreach($q->result() as $r) {
				  $d[] = $r;
			  }
			  return $d;
		  }
	  }
	  
	  function getAll2($u_id=0, $order='') {
		  $this->db->select('*');
		  $this->db->from('letter_order lo');
		  $this->db->join('broken_log bl', 'bl.bl_id = lo.bl_id', 'left');
		  $this->db->join('state s', 's.s_id = bl.s_id', 'left');
		  $this->db->join('finance f', 'f.f_id = bl.f_id', 'left');
		  $this->db->join('contractor c', 'c.c_id = bl.c_id', 'left');
		  $this->db->join('vehicles v', 'v.v_id = bl.v_id', 'left');
		  $this->db->join('user u', 'u.u_id = lo.u_id', 'left');
		  if($u_id != 0) {
			  $this->db->where('lo.u_id', $u_id);
		  }
		  if($order != '') {
			  $this->db->order_by('lo.lo_id', $order);
		  }
		  $this->db->order_by('lo.lo_approvedby', 'asc');
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  foreach($q->result() as $r) {
				  $d[] = $r;
			  }
			  return $d;
		  }
	  }
	  
	  function getAll4($order='') {
		  $this->db->select('*');
		  $this->db->from('letter_order lo');
		  $this->db->join('broken_log bl', 'bl.bl_id = lo.bl_id', 'left');
		  $this->db->join('state s', 's.s_id = bl.s_id', 'left');
		  $this->db->join('finance f', 'f.f_id = bl.f_id', 'left');
		  $this->db->join('contractor c', 'c.c_id = bl.c_id', 'left');
		  $this->db->join('vehicles v', 'v.v_id = bl.v_id', 'left');
		  $this->db->join('user u', 'u.u_id = lo.u_id', 'left');
		  if($order != '') {
			  $this->db->order_by('lo.lo_approvedby', $order);
		  }
		  $this->db->order_by('lo.lo_id', 'desc');
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  foreach($q->result() as $r) {
				  $d[] = $r;
			  }
			  return $d;
		  }
	  }
	  
	  function getAll3($stat=0) {
		  $this->db->select('*');
		  $this->db->from('letter_order lo');
		  $this->db->join('broken_log bl', 'bl.bl_id = lo.bl_id', 'left');
		  $this->db->join('state s', 's.s_id = bl.s_id', 'left');
		  $this->db->join('finance f', 'f.f_id = bl.f_id', 'left');
		  $this->db->join('contractor c', 'c.c_id = bl.c_id', 'left');
		  $this->db->join('vehicles v', 'v.v_id = bl.v_id', 'left');
		  $this->db->join('user u', 'u.u_id = lo.u_id', 'left');
		  $this->db->where('lo.lo_approvedby', $stat);
		  $q = $this->db->get();
		  return $q->num_rows();
	  }
	  
	  function get($id) {
		  $this->db->select('*');
		  $this->db->from('letter_order lo');
		  $this->db->join('broken_log bl', 'bl.bl_id = lo.bl_id', 'left');
		  $this->db->join('state s', 's.s_id = bl.s_id', 'left');
		  $this->db->join('finance f', 'f.f_id = bl.f_id', 'left');
		  $this->db->join('contractor c', 'c.c_id = bl.c_id', 'left');
		  $this->db->join('vehicles v', 'v.v_id = bl.v_id', 'left');
		  $this->db->join('user u', 'u.u_id = lo.lo_approvedby', 'left');
		  $this->db->where('lo.lo_id', $id);
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  foreach($q->result() as $r) {
				  $d[] = $r;
			  }
			  return $d;
		  }
	  }
	  
	  function get_user($id) {
		  $this->db->select('*');
		  $this->db->from('letter_order lo');
		  $this->db->join('user u', 'u.u_id = lo.u_id', 'left');
		  $this->db->where('lo.lo_id', $id);
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  foreach($q->result() as $r) {
				  $d[] = $r;
			  }
			  return $d;
		  }
	  }
	  
	  function add($data) {
		  if($this->db->insert('letter_order', $data)) {
			  return $this->db->insert_id();
		  } else {
			  return 0;
		  }
	  }
	  
	  function edit($id, $data) {
		  $this->db->where('lo_id', $id);
		  return $this->db->update('letter_order', $data);
	  }
	  
	  function delete($id) {
		  $this->db->where('lo_id', $id);
		  return $this->db->delete('letter_order');
	  }
	  
	  function delete_broken_log($bl_id) {
		  $this->db->where('bl_id', $bl_id);
		  return $this->db->delete('letter_order');
	  }
	  
	  function is_brokenlog_exist($bl_id) {
		  $this->db->select('*');
		  $this->db->from('letter_order lo');
		  $this->db->where('lo.bl_id', $bl_id);
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  return false;
		  } else {
			  return true;
		  }
	  }
	  
	  function getExpenses($bl_id) {
		  $this->db->select('*');
		  $this->db->from('letter_order lo');
		  $this->db->where('lo.bl_id', $bl_id);
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  $r = $q->result();
			  return number_format($r[0]->lo_expenses, 2);
		  } else {
			  return number_format(0.00, 2);
		  }
	  }
	
  }

?>