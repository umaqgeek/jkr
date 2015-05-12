<?php
  class M_example extends CI_Model {
	  
	  function getAll() {
		  $this->db->select('*');
		  $this->db->from('example e');
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
		  $this->db->from('example e');
		  $this->db->where('e.e_id', $id);
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  foreach($q->result() as $r) {
				  $d[] = $r;
			  }
			  return $d;
		  }
	  }
	  
	  function add($data) {
		  if($this->db->insert('example', $data)) {
			  return $this->db->insert_id();
		  } else {
			  return 0;
		  }
	  }
	  
	  function edit($id, $data) {
		  $this->db->where('e_id', $id);
		  return $this->db->update('example', $data);
	  }
	  
	  function delete($id) {
		  $this->db->where('e_id', $id);
		  return $this->db->delete('example');
	  }
	
  }

?>