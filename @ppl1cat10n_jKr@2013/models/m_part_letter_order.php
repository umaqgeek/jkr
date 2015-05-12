<?php
  class M_part_letter_order extends CI_Model {
	  
	  function getAll() {
		  $this->db->select('*');
		  $this->db->from('part_letter_order plo');
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
		  $this->db->from('part_letter_order plo');
		  $this->db->where('plo.lo_id', $lo_id);
		  $this->db->group_by('plo.plo_id');
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
		  $this->db->from('part_letter_order plo');
		  $this->db->where('plo.plo_id', $id);
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  foreach($q->result() as $r) {
				  $d[] = $r;
			  }
			  return $d;
		  }
	  }
	  
	  function add($data) {
		  if($this->db->insert('part_letter_order', $data)) {
			  return $this->db->insert_id();
		  } else {
			  return 0;
		  }
	  }
	  
	  function edit($id, $data) {
		  $this->db->where('plo_id', $id);
		  return $this->db->update('part_letter_order', $data);
	  }
	  
	  function delete($id) {
		  $this->db->where('plo_id', $id);
		  return $this->db->delete('part_letter_order');
	  }
	  
	  function delete_letter_order($lo_id) {
		  $this->db->where('lo_id', $lo_id);
		  return $this->db->delete('part_letter_order');
	  }
	
  }

?>