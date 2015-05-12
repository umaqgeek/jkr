<?php
  class M_year extends CI_Model {
	  
	  function getAll() {
		  $this->db->select('*');
		  $this->db->from('year y');
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
		  $this->db->from('year y');
		  $this->db->where('y.y_id', $id);
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  foreach($q->result() as $r) {
				  $d[] = $r;
			  }
			  return $d;
		  }
	  }
	  
	  function get_year($year) {
		  $this->db->select('*');
		  $this->db->from('year y');
		  $this->db->where('y.y_desc', $year);
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  foreach($q->result() as $r) {
				  $d[] = $r;
			  }
			  return $d;
		  }
	  }
	  
	  function add($data) {
		  if($this->db->insert('year', $data)) {
			  return $this->db->insert_id();
		  } else {
			  return 0;
		  }
	  }
	  
	  function edit($id, $data) {
		  $this->db->where('y_id', $id);
		  return $this->db->update('year', $data);
	  }
	  
	  function delete($id) {
		  $this->db->where('y_id', $id);
		  return $this->db->delete('year');
	  }
	
  }

?>