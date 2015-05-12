<?php
  class M_state extends CI_Model {
	  
	  function getAll() {
		  $this->db->select('*');
		  $this->db->from('state s');
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
		  $this->db->from('state s');
		  $this->db->where('s.s_id', $id);
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  foreach($q->result() as $r) {
				  $d[] = $r;
			  }
			  return $d;
		  }
	  }
	  
	  function add($data) {
		  if($this->db->insert('state', $data)) {
			  return $this->db->insert_id();
		  } else {
			  return 0;
		  }
	  }
	  
	  function edit($id, $data) {
		  $this->db->where('s_id', $id);
		  return $this->db->update('state', $data);
	  }
	  
	  function delete($id) {
		  $this->db->where('s_id', $id);
		  return $this->db->delete('state');
	  }
	
  }

?>