<?php
  class M_broken_log_component extends CI_Model {
	  
	  function getAll() {
		  $this->db->select('*');
		  $this->db->from('broken_log_component blc');
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  foreach($q->result() as $r) {
				  $d[] = $r;
			  }
			  return $d;
		  }
	  }
	  
	  function getAll_broken_log($bl_id=0) {
		  $this->db->select('*');
		  $this->db->from('broken_log_component blc');
		  $this->db->where('blc.bl_id', $bl_id);
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
		  $this->db->from('broken_log_component blc');
		  $this->db->where('blc.blc_id', $id);
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  foreach($q->result() as $r) {
				  $d[] = $r;
			  }
			  return $d;
		  }
	  }
	  
	  function add($data) {
		  if($this->db->insert('broken_log_component', $data)) {
			  return $this->db->insert_id();
		  } else {
			  return 0;
		  }
	  }
	  
	  function edit($id, $data) {
		  $this->db->where('blc_id', $id);
		  return $this->db->update('broken_log_component', $data);
	  }
	  
	  function delete($id) {
		  $this->db->where('blc_id', $id);
		  return $this->db->delete('broken_log_component');
	  }
	  
	  function delete_broken_log($bl_id) {
		  $this->db->where('bl_id', $bl_id);
		  return $this->db->delete('broken_log_component');
	  }
	
  }

?>