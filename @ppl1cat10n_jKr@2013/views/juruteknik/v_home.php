<?php
$role = isset($user_log['r_id']) ? $user_log['r_id'] : 0;
switch($role) {
	case 2: ?>
<div class="span9">
    <div class="span2">
    	<a href="<?=site_url('juruteknik/broken'); ?>">
        	<img src="<?=base_url()?>/assets/images/gnome/PNG/64/Gnome-Applications-System-64.png" />
            <br/>Pengurusan Log Pendaftaran Kerja
        </a>
    </div>
    <div class="span2">
    	<a href="<?=site_url('juruteknik/notaminta'); ?>">
        	<img src="<?=base_url()?>/assets/images/gnome/PNG/64/Gnome-Document-Properties-64.png" />
            <br/>Pengurusan Nota Minta
        </a>
    </div>
    <div class="span2">
    	<a href="<?=site_url('juruteknik/part'); ?>">
        	<div>
        		<img src="<?=base_url()?>/assets/images/gnome/PNG/64/Gnome-Preferences-System-64.png" />
            	<br/>Pengurusan Alat Ganti
            </div>
      </a>
    </div>
    <div class="span2">
    	<a href="<?=site_url('juruteknik/vehicle'); ?>">
        	<img src="<?=base_url()?>/assets/images/gnome/PNG/64/Car-green-64.png" />
        	<br/>Pengurusan Kenderaan
        </a>
    </div>
    <div class="span2">
    	<a href="<?=site_url('juruteknik/contractor'); ?>">
        	<img src="<?=base_url()?>/assets/images/gnome/PNG/64/Contractor-64.png" />
        	<br/>Pengurusan Kontraktor
        </a>
    </div>
</div>
	<?php
		break;
}
?>