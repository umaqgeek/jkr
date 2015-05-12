<?php
  class M_month extends CI_Model {
	  
	  function getAll() {
		  $this->db->select('*');
		  $this->db->from('month m');
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
		  $this->db->from('month m');
		  $this->db->where('m.m_id', $id);
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  foreach($q->result() as $r) {
				  $d[] = $r;
			  }
			  return $d;
		  }
	  }
	  
	  function add($data) {
		  if($this->db->insert('month', $data)) {
			  return $this->db->insert_id();
		  } else {
			  return 0;
		  }
	  }
	  
	  function edit($id, $data) {
		  $this->db->where('m_id', $id);
		  return $this->db->update('month', $data);
	  }
	  
	  function delete($id) {
		  $this->db->where('m_id', $id);
		  return $this->db->delete('month');
	  }
	
  }

?>