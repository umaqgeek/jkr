<?php
$role = isset($user_log['r_id']) ? $user_log['r_id'] : 0;
switch($role) {
	case 4: ?>
<div class="span9">
    <div class="span2">
    	<a href="<?=site_url('tukang/broken'); ?>">
        	<img src="<?=base_url()?>/assets/images/gnome/PNG/64/Gnome-Applications-System-64.png" />
            <br/>Pengurusan Log Pendaftaran Kerja
        </a>
    </div>
</div>
	<?php
		break;
}
?>