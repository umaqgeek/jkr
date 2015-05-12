<script type="text/javascript">
$(document).ready(function() {
	$(".padam").click(function() {
		if(ask('Padam data ini?')) {
			var id = $(this).attr("idd");
			location.href = "<?=site_url('juruteknik/notamintadelete');?>/"+id;
		}
	});
	$(".papar").click(function() {
		var id = $(this).attr("idd");
		var url = "<?=site_url('juruteknik/paparsurat'); ?>/"+id;
		newwindow=window.open(url,'name','height=600,width=1000,scrollbars=1');
		if (window.focus) {newwindow.focus()}
	});
	$(".kemaskini").click(function() {
		var id = $(this).attr("idd");
		location.href = "<?=site_url('juruteknik/notamintaedit');?>/"+id;
	});
});
</script>

<div class="row-fluid">
	<div class="span3" style="margin-left:-800px;">
	<h3>Senarai Nota Minta</h3>
	</div>
</div>

<div class="span8 offset4">
	<div class="span4">
		<a href="<?=site_url('juruteknik/notaminta/1')?>"><img src="<?=base_url()?>/assets/images/gnome/PNG/64/Gnome-List-Add-64.png" />
		<br/><span style="margin-left:-20px;">Tambah Nota Minta</span></a>
	</div>
</div>

<div class="row-fluid">
	<div class="span12">
		
        <table class="table">
            <tr>
                <th>Bil.</th>
                <th>No. Nota Minta</th>
                <th>Kontraktor</th>
                <th>No. Pendaftaran</th>
                <th>Tarikh Lapor</th>
                <th>Tarikh Diluluskan</th>
                <th>Diluluskan Oleh</th>
                <th>&nbsp;</th>
            </tr>
<?php 
if($nota_minta) {
	$i = 1;
	foreach($nota_minta as $nm) {
?>
			<tr>
            	<td><?=$i++; ?>.</td>
                <td><?=$nm->bl_unit; ?></td>
                <td><?=$nm->c_name; ?></td>
                <td><?=$nm->v_registrationno; ?></td>
                <td><?=$this->my_func->sqltodate($nm->lo_createddate); ?></td>
                <td><?=$this->my_func->sqltodate($nm->lo_approveddate); ?></td>
                <td><?=$nm->u_fullname; ?></td>
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
         
<?php if($nm->lo_approvedby == 0) { ?>           
                    <button type="button" class="btn padam" idd="<?=$nm->lo_id;?>">Padam</button>
                	<button type="button" class="btn kemaskini" idd="<?=$nm->lo_id;?>">Kemaskini</button><br />
<?php } ?>
                    
                    <button type="button" class="btn papar" idd="<?=$nm->lo_id;?>">Papar Surat</button>
                    
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
        
    </div>
</div>

<?php if($this->session->flashdata('notamintaubah')) { ?>
	<script>alert('<?=$this->session->flashdata('notamintaubah'); ?>');</script>
<?php } ?>