<?php
  class M_jenis_kerja extends CI_Model {
	  
	  function getAll() {
		  $this->db->select('*');
		  $this->db->from('jenis_kerja jk');
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
		  $this->db->from('jenis_kerja jk');
		  $this->db->where('jk.jk_id', $id);
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  foreach($q->result() as $r) {
				  $d[] = $r;
			  }
			  return $d;
		  }
	  }
	  
	  function add($data) {
		  if($this->db->insert('jenis_kerja', $data)) {
			  return $this->db->insert_id();
		  } else {
			  return 0;
		  }
	  }
	  
	  function edit($id, $data) {
		  $this->db->where('jk_id', $id);
		  return $this->db->update('jenis_kerja', $data);
	  }
	  
	  function delete($id) {
		  $this->db->where('jk_id', $id);
		  return $this->db->delete('jenis_kerja');
	  }
	
  }

?>