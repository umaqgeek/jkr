<script type="text/javascript">
$(document).ready(function() {
	$(".padam").click(function() {
		if(ask('Padam data ini?')) {
			var id = $(this).attr("idd");
			location.href = "<?=site_url('tukang/brokendelete');?>/"+id;
		}
	});
	$(".kemaskini").click(function() {
		var id = $(this).attr("idd");
		location.href = "<?=site_url('tukang/brokenedit');?>/"+id;
	});
	$(".nota").click(function() {
		var id = $(this).attr("idd");
		location.href = "<?=site_url('tukang/notaminta/1');?>/"+id;
	});
	$(".lo").click(function() {
		var id = $(this).attr("idd");
		location.href = "<?=site_url('tukang/brokenliv');?>/"+id;
	});
});
</script>

<div class="row-fluid">
	<div class="span3" style="margin-left:-800px;">
	<h3>Senarai Log Kerja</h3>
	</div>
</div>

<div class="span8 offset4">
	<div class="span2">
    	<a href="<?=site_url('tukang/broken/1')?>"><img src="<?=base_url()?>/assets/images/gnome/PNG/64/Gnome-List-Add-64.png" />
        <br/><span style="margin-left:-20px;">Daftar Log Kerja</span></a>
    </div>
    <div class="span2">
    	<a href="<?=site_url('tukang/brokenexport')?>"><img src="<?=base_url()?>/assets/images/gnome/PNG/64/Gnome-Document-Save-64.png" />
        <br/><span style="margin-left:-20px;">Export Log</span></a>
    </div>
</div>

<div class="row-fluid">
	<div class="span12">
		
        <table class="table">
            <tr>
                <th>Bil.</th>
                <th>Unit</th>
                <th>Tarikh Rekod</th>
                <th>Tarikh Siap</th>
                <th>Status Baiki</th>
                <th>Harga</th>
                <th>Kontraktor</th>
                <th>No. Pendaftaran</th>
                <th>Perihal Kerosakan</th>
                <th>Kod Peruntukan Kewangan</th>
                <th>&nbsp;</th>
            </tr>
<?php 
if($broken_log) {
	$i = 1;
	foreach($broken_log as $bl) {
?>
			<tr>
            	<td><?=$i++; ?>.</td>
                <td><?=$bl->bl_unit; ?></td>
                <td><?=$this->my_func->sqltodate($bl->bl_recorddate); ?></td>
                <td><?=$this->my_func->sqltodate($bl->bl_settledate); ?></td>
                <td>
					<?=$this->my_func->getStatusBL($bl->bl_repairstatus); ?> &nbsp;
					<!--<?php if($bl->bl_repairstatus == 2) { echo '('.$bl->bl_reason.')'; } ?>-->
                </td>
                <td>RM <?=$bl->bl_harga; ?></td>
                <td><?=$bl->c_name; ?></td>
                <td><?=$bl->v_registrationno; ?></td>
                <td><?=$bl->bl_remarks; ?></td>
                <td><?=$bl->f_code; ?></td>
                <td>
                	<button type="button" class="btn pekerja1" idd="<?=$bl->bl_id;?>">Pekerja</button>
                    
<!-- start popup -->
<div id="toPopup3<?=$bl->bl_id;?>" class="toPopup">
	<div class="close"></div>
	<span class="ecs_tooltip">Tekan 'Esc' untuk tutup <span class="arrow"></span></span>
    <div id="popup_content"> <!--your content start-->  
<table class="table">
	<tr>
    	<th width="10%">Bil.</th>
        <th>Nama</th>
        <th>&nbsp;</th>
    </tr>
    <?php
	$worker = $this->m_worker->getAll_broken_log($bl->bl_id);
	if($worker) {
		$ii=1; 
		foreach($worker as $w) { ?>
	<tr>
    	<td><?=$ii++; ?></td>
        <td><?=$w->w_name; ?></td>
        <td>&nbsp;</td>
    </tr>
	<?php } } else { ?>
    <tr>
    	<td colspan="3">- Tiada rekod -</td>
    </tr>
    <?php } ?>
</table>
    </div> <!--your content end-->
</div> <!--toPopup end-->
<div class="loader"></div>
<div id="backgroundPopup"></div>
<!-- end popup -->

					<button type="button" class="btn padam" idd="<?=$bl->bl_id;?>">Padam</button>
<?php if($bl->bl_status == 1) { ?>
                	<button type="button" class="btn kemaskini" idd="<?=$bl->bl_id;?>">Kemaskini</button>
<?php } ?>
                    
                </td>
            </tr>
<?php
	}
} else {
?>
			<tr>
            	<td colspan="10">- Tiada Rekod -</td>
            </tr>
<?php
}
?>
        </table>
        
    </div>
</div>