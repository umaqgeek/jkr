<?php
  class M_perolehan extends CI_Model {
	  
	  function getAll() {
		  $this->db->select('*');
		  $this->db->from('perolehan pe');
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
		  $this->db->from('perolehan pe');
		  $this->db->where('pe.pe_id', $id);
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  foreach($q->result() as $r) {
				  $d[] = $r;
			  }
			  return $d;
		  }
	  }
	  
	  function add($data) {
		  if($this->db->insert('perolehan', $data)) {
			  return $this->db->insert_id();
		  } else {
			  return 0;
		  }
	  }
	  
	  function edit($id, $data) {
		  $this->db->where('pe_id', $id);
		  return $this->db->update('perolehan', $data);
	  }
	  
	  function delete($id) {
		  $this->db->where('pe_id', $id);
		  return $this->db->delete('perolehan');
	  }
	
  }

?>