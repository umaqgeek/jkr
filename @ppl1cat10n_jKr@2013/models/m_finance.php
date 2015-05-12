<?php
  class M_finance extends CI_Model {
	  
	  function getAll_year($date='0000-00-00') {
		  $this->db->select('*');
		  $this->db->from('finance f');
		  if(strcmp($date, '0000-00-00') != 0) {
			  $this->db->where('YEAR(f.f_date) = YEAR(\''.$date.'\')'); 
		  }
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  foreach($q->result() as $r) {
				  $d[] = $r;
			  }
			  return $d;
		  }
	  }
	  
	  function getAll() {
		  $this->db->select('*');
		  $this->db->from('finance f');
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  foreach($q->result() as $r) {
				  $d[] = $r;
			  }
			  return $d;
		  }
	  }
	  
	  function get($id) {
		  $this->db->select('*');
		  $this->db->from('finance f');
		  $this->db->where('f.f_id', $id);
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  foreach($q->result() as $r) {
				  $d[] = $r;
			  }
			  return $d;
		  }
	  }
	  
	  function get_code($f_code) {
		  $this->db->select('*');
		  $this->db->from('finance f');
		  $this->db->where('f.f_code', $f_code);
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  foreach($q->result() as $r) {
				  $d[] = $r;
			  }
			  return $d;
		  }
	  }
	  
	  function add($data) {
		  if($this->db->insert('finance', $data)) {
			  return $this->db->insert_id();
		  } else {
			  return 0;
		  }
	  }
	  
	  function edit($id, $data) {
		  $this->db->where('f_id', $id);
		  return $this->db->update('finance', $data);
	  }
	  
	  function edit_code($f_code, $data) {
		  $this->db->where('f_code', $f_code);
		  return $this->db->update('finance', $data);
	  }
	  
	  function delete($id) {
		  $this->db->where('f_id', $id);
		  return $this->db->delete('finance');
	  }
	  
	  function getReport1($f_code=' ') {
		  /*SELECT c.c_name, bl.bl_unit, lo.lo_expenses, f.f_code, f.f_desc, f.f_money FROM contractor c, broken_log bl, letter_order lo, finance f WHERE c.c_id = bl.c_id AND bl.bl_id = lo.bl_id AND f.f_id = bl.f_id AND f.f_code LIKE '%F26%'*/
		  $this->db->select('c.c_name, bl.bl_unit, lo.lo_expenses, f.f_code, f.f_desc, f.f_money');
		  $this->db->from('contractor c, broken_log bl, letter_order lo, finance f');
		  $this->db->where('c.c_id = bl.c_id');
		  $this->db->where('bl.bl_id = lo.bl_id');
		  $this->db->where('f.f_id = bl.f_id');
		  if($f_code != ' ') {
			  $this->db->like('f.f_code', $f_code);
		  }
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  foreach($q->result() as $r) {
				  $d[] = $r;
			  }
			  return $d;
		  }
	  }
	  
	  function getReport11($f_id=' ') {
		  /*SELECT c.c_name, bl.bl_unit, lo.lo_expenses, f.f_code, f.f_desc, f.f_money FROM contractor c, broken_log bl, letter_order lo, finance f WHERE c.c_id = bl.c_id AND bl.bl_id = lo.bl_id AND f.f_id = bl.f_id AND f.f_id = 10*/
		  $this->db->select('c.c_name, bl.bl_unit, lo.lo_expenses, f.f_code, f.f_desc, f.f_money');
		  $this->db->from('contractor c, broken_log bl, letter_order lo, finance f');
		  $this->db->where('c.c_id = bl.c_id');
		  $this->db->where('bl.bl_id = lo.bl_id');
		  $this->db->where('f.f_id = bl.f_id');
		  if($f_id != ' ') {
			  $this->db->where('f.f_id', $f_id);
		  }
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  foreach($q->result() as $r) {
				  $d[] = $r;
			  }
			  return $d;
		  }
	  }
	
  }

?>