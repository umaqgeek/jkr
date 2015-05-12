<?php
$role = isset($user_log['r_id']) ? $user_log['r_id'] : 0;
switch($role) {
	case 1: ?>
<div class="span9">
    <div class="span2">
    	<a href="<?=site_url('jurutera/notaminta'); ?>">
        	<div>
        		<img src="<?=base_url()?>/assets/images/gnome/PNG/64/Gnome-Document-Properties-64.png" />
            	<br/>Pengurusan Nota Minta <span class="getNM" style="color:#F00;"></span>
            </div>
      </a>
    </div>
    <div class="span2">
    	<a href="<?=site_url('jurutera/part'); ?>">
        	<div>
        		<img src="<?=base_url()?>/assets/images/gnome/PNG/64/Gnome-Preferences-System-64.png" />
            	<br/>Pengurusan Alat Ganti
            </div>
      </a>
    </div>
    <div class="span2">
    	<a href="<?=site_url('jurutera/vehicle'); ?>">
        	<img src="<?=base_url()?>/assets/images/gnome/PNG/64/Car-green-64.png" />
        	<br/>Pengurusan Kenderaan
        </a>
    </div>
    <div class="span2">
    	<a href="<?=site_url('jurutera/contractor'); ?>">
        	<img src="<?=base_url()?>/assets/images/gnome/PNG/64/Contractor-64.png" />
        	<br/>Pengurusan Kontraktor
        </a>
    </div>
    <div class="span2">
    	<a href="<?=site_url('jurutera/finance'); ?>">
        	<img src="<?=base_url()?>/assets/images/gnome/PNG/64/Emblem-Money-64.png" />
        	<br/>Pengurusan Kewangan
        </a>
    </div>
    <div class="span2">
    	<a href="<?=site_url('jurutera/report'); ?>">
        	<img src="<?=base_url()?>/assets/images/gnome/PNG/64/Gnome-X-Office-Presentation-64.png" />
        	<br/>Laporan
        </a>
    </div>
</div>
	<?php
		break;
}
?>