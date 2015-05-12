<?php
$role = isset($user_log['r_id']) ? $user_log['r_id'] : 0;
switch($role) {
	case 3: ?>
<div class="span9">
	<div class="span2">
    	<a href="<?=site_url('admin/users'); ?>">
        	<img src="<?=base_url()?>/assets/images/gnome/PNG/64/Gnome-System-Users-64.png" />
        	<br/>Pengurusan Pengguna
        </a>
    </div>
    <div class="span2">
    	<a href="<?=site_url('admin/vehicle'); ?>">
        	<img src="<?=base_url()?>/assets/images/gnome/PNG/64/Car-green-64.png" />
        	<br/>Pengurusan Kenderaan
        </a>
    </div>
    <div class="span2">
    	<a href="<?=site_url('admin/contractor'); ?>">
        	<img src="<?=base_url()?>/assets/images/gnome/PNG/64/Contractor-64.png" />
        	<br/>Pengurusan Kontraktor
        </a>
    </div>
    <div class="span2">
    	<a href="<?=site_url('admin/finance'); ?>">
        	<img src="<?=base_url()?>/assets/images/gnome/PNG/64/Emblem-Money-64.png" />
        	<br/>Pengurusan Kewangan
        </a>
    </div>
    <div class="span2">
    	<a href="<?=site_url('admin/part'); ?>">
        	<div>
        		<img src="<?=base_url()?>/assets/images/gnome/PNG/64/Gnome-Preferences-System-64.png" />
            	<br/>Pengurusan Alat Ganti
            </div>
      </a>
    </div>
</div>
	<?php
		break;
}
?>