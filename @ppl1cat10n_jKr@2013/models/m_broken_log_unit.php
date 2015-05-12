<?php
  class M_broken_log_unit extends CI_Model {
	  
	  function getAll() {
		  $this->db->select('*');
		  $this->db->from('broken_log_unit blu');
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
		  $this->db->from('broken_log_unit blu');
		  $this->db->where('blu.blu_id', $id);
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  foreach($q->result() as $r) {
				  $d[] = $r;
			  }
			  return $d;
		  }
	  }
	  
	  function get_code($blu_code) {
		  $this->db->select('*');
		  $this->db->from('broken_log_unit blu');
		  $this->db->where('blu.blu_code', $blu_code);
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  foreach($q->result() as $r) {
				  $d[] = $r;
			  }
			  return $d;
		  }
	  }
	  
	  function add($data) {
		  if($this->db->insert('broken_log_unit', $data)) {
			  return $this->db->insert_id();
		  } else {
			  return 0;
		  }
	  }
	  
	  function edit($id, $data) {
		  $this->db->where('blu_id', $id);
		  return $this->db->update('broken_log_unit', $data);
	  }
	  
	  function delete($id) {
		  $this->db->where('blu_id', $id);
		  return $this->db->delete('broken_log_unit');
	  }
	
  }

?>