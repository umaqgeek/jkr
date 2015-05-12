<?php
$role = isset($user_log['r_id']) ? $user_log['r_id'] : 0;
switch($role) {
	case 1: ?><a class="brand" href="<?=site_url('jurutera'); ?>">Jurutera Admin Panel</a><?php
		break;
	case 2: ?><a class="brand" href="<?=site_url('juruteknik'); ?>">Juruteknik Admin Panel</a><?php
		break;
	case 3: ?><a class="brand" href="<?=site_url('admin'); ?>">Administrator Panel</a><?php
		break;
	case 4: ?><a class="brand" href="<?=site_url('tukang'); ?>">Tukang Panel</a><?php
		break;
	default: ?><a class="brand" href="<?=site_url(''); ?>">Jabatan Kerja Raya</a><?php
		break;
}
?>