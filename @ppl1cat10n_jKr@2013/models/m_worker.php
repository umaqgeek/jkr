<?php
  class M_worker extends CI_Model {
	  
	  function getAll() {
		  $this->db->select('*');
		  $this->db->from('worker w');
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
		  $this->db->from('worker w');
		  $this->db->where('w.bl_id', $bl_id);
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
		  $this->db->from('worker w');
		  $this->db->where('w.w_id', $id);
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  foreach($q->result() as $r) {
				  $d[] = $r;
			  }
			  return $d;
		  }
	  }
	  
	  function add($data) {
		  if($this->db->insert('worker', $data)) {
			  return $this->db->insert_id();
		  } else {
			  return 0;
		  }
	  }
	  
	  function edit($id, $data) {
		  $this->db->where('w_id', $id);
		  return $this->db->update('worker', $data);
	  }
	  
	  function delete($id) {
		  $this->db->where('w_id', $id);
		  return $this->db->delete('worker');
	  }
	  
	  function delete_broken_log($bl_id) {
		  $this->db->where('bl_id', $bl_id);
		  return $this->db->delete('worker');
	  }
	
  }

?>