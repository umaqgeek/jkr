<?php
  class M_vehicles extends CI_Model {
	  
	  function getUsedVehicles() {
		  /* SELECT * FROM vehicles v, broken_log bl WHERE v.v_id = bl.v_id GROUP BY v.v_id */
		  $this->db->select('*');
		  $this->db->from('vehicles v, broken_log bl');
		  $this->db->where('v.v_id = bl.v_id');
		  $this->db->group_by('v.v_id');
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  foreach($q->result() as $r) {
				  $d[] = $r;
			  }
			  return $d;
		  }
	  }
	  
	  function getAll() {
		  $this->db->select('*');
		  $this->db->from('vehicles v');
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
		  $this->db->from('vehicles v');
		  $this->db->where('v.v_id', $id);
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  foreach($q->result() as $r) {
				  $d[] = $r;
			  }
			  return $d;
		  }
	  }
	  
	  function add($data) {
		  if($this->db->insert('vehicles', $data)) {
			  return $this->db->insert_id();
		  } else {
			  return 0;
		  }
	  }
	  
	  function edit($id, $data) {
		  $this->db->where('v_id', $id);
		  return $this->db->update('vehicles', $data);
	  }
	  
	  function delete($id) {
		  $this->db->where('v_id', $id);
		  return $this->db->delete('vehicles');
	  }
	
  }

?>