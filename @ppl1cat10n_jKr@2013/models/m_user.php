<?php
  class M_user extends CI_Model {
	  
	  function getAll() {
		  $this->db->select('*');
		  $this->db->from('user u');
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
		  $this->db->from('user u');
		  $this->db->where('u.u_id', $id);
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  foreach($q->result() as $r) {
				  $d[] = $r;
			  }
			  return $d;
		  }
	  }
	  
	  function getPelulus($lo_approvedby) {
		  $this->db->select('*');
		  $this->db->from('user u');
		  $this->db->where('u.u_id', $lo_approvedby);
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  foreach($q->result() as $r) {
				  $d[] = $r;
			  }
			  return $d[0]->u_fullname;
		  } else {
			  return "-";
		  }
	  }
	  
	  function add($data) {
		  if($this->db->insert('user', $data)) {
			  return $this->db->insert_id();
		  } else {
			  return 0;
		  }
	  }
	  
	  function edit($id, $data) {
		  $this->db->where('u_id', $id);
		  return $this->db->update('user', $data);
	  }
	  
	  function delete($id) {
		  $this->db->where('u_id', $id);
		  return $this->db->delete('user');
	  }
	
  }

?>