<?php
if(!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * Site Sentry security library for Code Igniter applications
 * Author: James Nicol, Glossopteris Web Designs & Development, www.glossopteris.com, April 2006
 *
 *
 */

class Site_sentry {

    function Site_sentry() {
        $this -> obj = &get_instance();
    }
	
	function is_logged_in()
	{
		if($this -> obj -> session)
		{
			if($this -> obj -> session -> userdata('logged_in')){
				return TRUE;
			}
			else
				return FALSE;												 
		}else
		{
			return FALSE;
		}
	}
	
	function login_routine($user='', $pass='')
	{
		$CI = $this -> obj;
		
		$CI -> load -> library('encrypt');
		
		$logged_in = false;
		
		//logging example below :-
		
		//echo $enc = $CI->encrypt->encode($pass);
		//echo '<br>'.$CI->encrypt->decode($enc);
		//*
		$CI->db->select('*');
		$CI->db->where("u.u_ic", $user);
		$CI->db->where("u.u_password", $pass);
		$query = $CI->db->get('user u');
		
		$r = $query->num_rows();
		
		//login student
		if($r > 0)
		{
			foreach($query->result() as $row)
			{
				  $logged_in = true;
				  $data_session["u_id"] = $row->u_id;
				  $data_session["u_fullname"] = $row->u_fullname;
				  $data_session["u_staffno"] = $row->u_staffno;
				  $data_session["u_ic"] = $row->u_ic;
				  $data_session["u_phone"] = $row->u_phone;
				  $data_session["u_email"] = $row->u_email;
				  $data_session["u_password"] = $row->u_password;
				  $data_session["r_id"] = $row->r_id;
				  $data_session["logged_in"] = $logged_in;
				  
				  $CI->session->set_userdata($data_session);
			}
			
		}
		//*/
		
		return $logged_in;
		
	}

}

?>