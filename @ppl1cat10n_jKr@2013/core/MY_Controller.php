<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

   function __construct()
    {
        parent::__construct();
		

		$unlocked = array('login');

				if ( ! $this->site_sentry->is_logged_in() AND ! in_array(strtolower(get_class($this)), $unlocked))
				{
					redirect('login/');
				}

    }

}

?>