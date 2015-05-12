<?php
$role = isset($user_log['r_id']) ? $user_log['r_id'] : 0;
switch($role) {
	case 1: ?>
<ul class="nav pull-right">
    <li class="dropdown">
        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> Jurutera <i class="caret"></i>

        </a>
        <ul class="dropdown-menu">
            <li>
                <a tabindex="-1" href="<?=site_url('jurutera/profil'); ?>">Profil Diri</a>
            </li>
            <li class="divider"></li>
            <li>
                <a tabindex="-1" href="<?=site_url('logout'); ?>">Log Keluar</a>
            </li>
        </ul>
    </li>
</ul>
	<?php
		break;
	case 2: ?>
<ul class="nav pull-right">
    <li class="dropdown">
        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> Juruteknik <i class="caret"></i>

        </a>
        <ul class="dropdown-menu">
            <li>
                <a tabindex="-1" href="<?=site_url('juruteknik/profil'); ?>">Profil Diri</a>
            </li>
            <li class="divider"></li>
            <li>
                <a tabindex="-1" href="<?=site_url('logout'); ?>">Log Keluar</a>
            </li>
        </ul>
    </li>
</ul>
	<?php
		break;
	case 3: ?>
<ul class="nav pull-right">
    <li class="dropdown">
        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> Administrator <i class="caret"></i>

        </a>
        <ul class="dropdown-menu">
            <!--<li>
                <a tabindex="-1" href="<?=site_url('admin/profil'); ?>">Profil Diri</a>
            </li>
            <li class="divider"></li>-->
            <li>
                <a tabindex="-1" href="<?=site_url('logout'); ?>">Log Keluar</a>
            </li>
        </ul>
    </li>
</ul>
	<?php
		break;
	case 4: ?>
<ul class="nav pull-right">
    <li class="dropdown">
        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> Tukang <i class="caret"></i>

        </a>
        <ul class="dropdown-menu">
            <!--<li>
                <a tabindex="-1" href="<?=site_url('tukang/profil'); ?>">Profil Diri</a>
            </li>
            <li class="divider"></li>-->
            <li>
                <a tabindex="-1" href="<?=site_url('logout'); ?>">Log Keluar</a>
            </li>
        </ul>
    </li>
</ul>
	<?php
		break;
}
?>