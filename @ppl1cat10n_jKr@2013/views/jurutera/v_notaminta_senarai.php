<script type="text/javascript">
$(document).ready(function() {
	
	$(".padam").click(function() {
		if(ask('Padam data ini?')) {
			var id = $(this).attr("idd");
			location.href = "<?=site_url('jurutera/notamintadelete');?>/"+id;
		}
	});
	
	$(".papar").click(function() {
		var id = $(this).attr("idd");
		var url = "<?=site_url('jurutera/paparsurat'); ?>/"+id;
		newwindow=window.open(url,'name','height=600,width=1000,scrollbar=1');
		if (window.focus) {newwindow.focus()}
	});
	
	$(".kemaskini").click(function() {
		var id = $(this).attr("idd");
		location.href = "<?=site_url('jurutera/notamintaedit');?>/"+id;
	});
	
	$(".kelulusan").click(function() {
		var id = $(this).attr("idd");
		var stat = $(this).attr("stat");
		var lo_id = new Array();
		lo_id[0] = id;
		$.post("<?=site_url('jurutera/notamintalulus');?>/"+stat, { 
			'lo_id[]': lo_id }, function(data) {
				location.href = "<?=site_url('jurutera/notaminta/x'); ?>";
		});
	});
	
	$(".kelulusanall").click(function() {
		var nilai = $("#nilai_i").attr("value");
		var stat = $(this).attr("stat");
		var lo_id = new Array();
		j=0;
		for(i=0; i<nilai; i++) {
			var ch_box = $("#ch_"+i);
			if(ch_box.is(':checked')) {
				lo_id[j] = ch_box.val();
				j++;
			}
		}
		$.post("<?=site_url('jurutera/notamintalulus');?>/"+stat, { 
			'lo_id[]': lo_id }, function(data) {
				location.href = "<?=site_url('jurutera/notaminta/x'); ?>";
		});
	});
	
	$("#ch_all").click(function() {
		var nilai = $("#nilai_i").attr("value");
		var cek = $("#ch_all").is(':checked');
		for(i=0; i<nilai; i++) {
			if(cek === true) {
				$("#ch_"+i).prop('checked', true);
			} else {
				$("#ch_"+i).prop('checked', false);
			}
		}
	});
});
</script>

<div class="row-fluid">
	<div class="span3" style="margin-left:-800px;">
        <h3>Senarai Nota Minta</h3>
        <button type="button" stat="1" class="btn kelulusanall">Lulus Semua</button>
        <button type="button" stat="2" class="btn kelulusanall">Tidak Lulus Semua</button>
	</div>
</div>

<div class="row-fluid">
	<div class="span12">
		
        <table class="table">
            <tr>
                <th>Bil.</th>
                <th><input type="checkbox" id="ch_all" /></th>
                <th>No. Nota Minta</th>
                <th>Kontraktor</th>
                <th>No. Pendaftaran</th>
                <th>Tarikh Lapor</th>
                <th>Direkod Oleh</th>
                <th>Status</th>
                <th>&nbsp;</th>
            </tr>
<?php 
$i = 0;
if($nota_minta) {
	foreach($nota_minta as $nm) {
?>
			<tr>
            	<td><?=++$i; ?>.</td>
                <td><input type="checkbox" id="ch_<?=$i-1;?>" value="<?=$nm->lo_id;?>" /></td>
                <td><?=$nm->bl_unit; ?></td>
                <td><?=$nm->c_name; ?></td>
                <td><?=$nm->v_registrationno; ?></td>
                <td><?=$this->my_func->sqltodate($nm->lo_createddate); ?></td>
                <td><?=$nm->u_fullname; ?> (<?=$nm->u_staffno; ?>)</td>
                <td><?=$this->my_func->getStatusNM($nm->lo_approvedby); ?></td>
                <td>
                	<button type="button" class="btn pekerja" idd="<?=$nm->lo_id;?>">Upah</button>
                    
<!-- start popup -->
<div id="toPopup1<?=$nm->lo_id;?>" class="toPopup">
	<div class="close"></div>
	<span class="ecs_tooltip">Tekan 'Esc' untuk tutup <span class="arrow"></span></span>
    <div id="popup_content"> <!--your content start-->  
<table class="table">
	<tr>
    	<th>Bil.</th>
        <th>Perkara Upah</th>
        <th>Harga</th>
        <th>&nbsp;</th>
    </tr>
    <?php
	$upah1 = $this->m_services->getAll_letter_order($nm->lo_id);
	if($upah1) {
		$ii=1; 
		foreach($upah1 as $up) { ?>
	<tr>
    	<td><?=$ii++; ?></td>
        <td><?=$up->ser_desc; ?></td>
        <td>RM <?=$up->ser_totalprice; ?></td>
        <td>&nbsp;</td>
    </tr>
	<?php } } else { ?>
    <tr>
    	<td colspan="4">- Tiada rekod -</td>
    </tr>
    <?php } ?>
</table>
    </div> <!--your content end-->
</div> <!--toPopup end-->
<div class="loader"></div>
<div id="backgroundPopup"></div>
<!-- end popup -->
                    
                	<button type="button" class="btn komponen" idd="<?=$nm->lo_id;?>">Alat Ganti</button><br />
                    
<!-- start popup -->
<div id="toPopup2<?=$nm->lo_id;?>" class="toPopup">
	<div class="close"></div>
	<span class="ecs_tooltip">Tekan 'Esc' untuk tutup <span class="arrow"></span></span>
    <div id="popup_content"> <!--your content start-->  
<table class="table">
	<tr>
    	<th>Bil.</th>
        <th>Nama Part</th>
        <th>No. Part</th>
        <th>Kuantiti</th>
        <th>Harga</th>
        <th>Masa Tempah</th>
        <th>&nbsp;</th>
    </tr>
    <?php
	$part1 = $this->m_part_letter_order->getAll_letter_order($nm->lo_id);
	if($part1) {
		$ii=1; 
		foreach($part1 as $pa) { ?>
	<tr>
    	<td><?=$ii++; ?></td>
        <td><?=$pa->plo_name; ?></td>
        <td><?=$pa->plo_partno; ?></td>
        <td><?=$pa->plo_quantity; ?></td>
        <td>RM <?=$pa->plo_totalprice; ?></td>
        <td><?=$this->my_func->sqltodate($pa->plo_datetime); ?></td>
        <td>&nbsp;</td>
    </tr>
	<?php } } else { ?>
    <tr>
    	<td colspan="4">- Tiada rekod -</td>
    </tr>
    <?php } ?>
</table>
    </div> <!--your content end-->
</div> <!--toPopup end-->
<div class="loader"></div>
<div id="backgroundPopup"></div>
<!-- end popup -->
                    
                    <button type="button" class="btn padam" idd="<?=$nm->lo_id;?>">Padam</button>
                	<button type="button" class="btn kemaskini" idd="<?=$nm->lo_id;?>">Kemaskini</button><br />
                    <button type="button" class="btn papar" idd="<?=$nm->lo_id;?>">Papar Surat</button>
<?php if($nm->lo_approvedby == 0) { ?>
                	<button type="button" class="btn kelulusan" stat="1" idd="<?=$nm->lo_id;?>">Lulus</button>
<?php } else { ?>
					<button type="button" class="btn kelulusan" stat="2" idd="<?=$nm->lo_id;?>">Tidak Lulus</button>
<?php } ?>
                
                </td>
            </tr>
<?php
	}
} else {
?>
			<tr>
            	<td colspan="8">- Tiada Rekod -</td>
            </tr>
<?php
}
?>
        </table>
<input type="hidden" name="nilai_i" id="nilai_i" value="<?=$i; ?>" />        
    </div>
</div>

<?php if($this->session->flashdata('notamintaubah')) { ?>
	<script>alert('<?=$this->session->flashdata('notamintaubah'); ?>');</script>
<?php } ?>