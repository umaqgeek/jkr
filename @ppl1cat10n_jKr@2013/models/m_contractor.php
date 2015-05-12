<?php
  class M_contractor extends CI_Model {
	  
	  function getAll() {
		  $this->db->select('*');
		  $this->db->from('contractor c');
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
		  $this->db->from('contractor c');
		  $this->db->where('c.c_id', $id);
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  foreach($q->result() as $r) {
				  $d[] = $r;
			  }
			  return $d;
		  }
	  }
	  
	  function add($data) {
		  if($this->db->insert('contractor', $data)) {
			  return $this->db->insert_id();
		  } else {
			  return 0;
		  }
	  }
	  
	  function edit($id, $data) {
		  $this->db->where('c_id', $id);
		  return $this->db->update('contractor', $data);
	  }
	  
	  function delete($id) {
		  $this->db->where('c_id', $id);
		  return $this->db->delete('contractor');
	  }
	
  }

?>