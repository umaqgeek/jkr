<?php
  class M_services extends CI_Model {
	  
	  function getAll() {
		  $this->db->select('*');
		  $this->db->from('services s');
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  foreach($q->result() as $r) {
				  $d[] = $r;
			  }
			  return $d;
		  }
	  }
	  
	  function getAll_letter_order($lo_id) {
		  $this->db->select('*');
		  $this->db->from('services s');
		  $this->db->where('s.lo_id', $lo_id);
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
		  $this->db->from('services s');
		  $this->db->where('s.ser_id', $id);
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  foreach($q->result() as $r) {
				  $d[] = $r;
			  }
			  return $d;
		  }
	  }
	  
	  function add($data) {
		  if($this->db->insert('services', $data)) {
			  return $this->db->insert_id();
		  } else {
			  return 0;
		  }
	  }
	  
	  function edit($id, $data) {
		  $this->db->where('ser_id', $id);
		  return $this->db->update('services', $data);
	  }
	  
	  function delete($id) {
		  $this->db->where('ser_id', $id);
		  return $this->db->delete('services');
	  }
	  
	  function delete_letter_order($lo_id) {
		  $this->db->where('lo_id', $lo_id);
		  return $this->db->delete('services');
	  }
	
  }

?>