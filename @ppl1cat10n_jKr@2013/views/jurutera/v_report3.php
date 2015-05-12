

<div class="row-fluid">
	<div class="span6" style="margin-left:-800px;">
        <h3>Laporan Kewangan</h3>
	</div>
</div>

<div class="span10">
    <div class="span10">
    	<button type="button" onclick="location.href='<?=site_url('jurutera/report');?>'">Kembali</button>
    </div>
</div>

<?php
$code = "-1";
if(isset($_POST['ser_kew'])) {
	$code = $_POST['ser_kew'];
}
?>

<div class="span10">
    <div class="span10">
		<?php if($finance) { ?>
        <form method="post" action="" name="f1" id="f1">
		<table border="0" cellspacing="0" cellpadding="5">
			  <tr>
			    <th colspan="2" align="left" valign="top" scope="row">Pilih Kod Laporan :- &nbsp;</th>
	      </tr>
          <?php foreach($finance as $f) { ?>
			  <tr>
			    <td align="left" valign="top">
                <input <?php if (!(strcmp($code, $f->f_id))) {echo "checked=\"checked\"";} ?> 
                onclick="document.getElementById('f1').submit();" 
                type="radio" name="ser_kew" id="ser_kew_<?=$f->f_id; ?>" value="<?=$f->f_id; ?>" />
                &nbsp;</td>
			    <td align="left" valign="top">
                <?=$f->f_code; ?> (<?=$f->f_desc; ?>)
                &nbsp;</td>
	      </tr>
          <?php } ?>
	  </table>
      </form>
      
      <?php 
	  $totalguna = 0;
	  if(isset($kew)) {
		  foreach($kew as $ke) {
			  $totalguna += $ke->lo_expenses;
		  }
	  }
	  ?>
      
      <?php if(isset($fin)) { ?>
      <table class="table">
      		<!--<tr>
                <th colspan="2">Peruntukan asal</th>
                <th colspan="3">: RM <?=number_format(($fin[0]->f_money+$totalguna), 2); ?></th>
            </tr>-->
            <tr>
                <th colspan="2">Peruntukan asal <?=$fin[0]->f_code; ?></th>
                <th colspan="3">: RM <?=number_format($fin[0]->f_money, 2); ?></th>
            </tr>
            <tr>
                <th colspan="2">Peruntukan telah digunakan</th>
                <th colspan="3">: RM <?=number_format($totalguna, 2); ?></th>
            </tr>
      		<tr>
                <th colspan="2">Baki peruntukan</th>
                <th colspan="3">: RM <?=number_format($fin[0]->f_money-$totalguna, 2); ?></th>
            </tr>
            <tr>
                <th width="10%">Bil.</th>
                <th width="30%">Nama Kontraktor</th>
                <th width="20%">Unit</th>
                <th width="20%">No. Nota Minta</th>
                <th width="20%">Kos</th>
            </tr>
            <?php if(isset($kewangan)) { ?>
            <?php $i=1; foreach($kewangan as $k) { ?>
            <tr>
            	<td><?=$i++; ?>.</td>
                <td><?=$k->c_name; ?></td>
                <td><?php $bl_unit = $this->my_func->getUnit($k->bl_unit); echo $bl_unit[0]; ?></td>
                <td><?=$k->bl_unit; ?></td>
                <td><?=$k->lo_expenses; ?></td>
            </tr>
            <?php } ?>
	  		<?php } else { ?>
            <tr>
            	<td colspan="5"><em>Tiada peruntukan digunakan untuk kod kewangan ini ...</em></td>
            </tr>
            <?php } ?>
      </table>
      <?php } ?>
      
<?php } else {
			echo "<h3><em>Tiada kod kewangan ditetapkan! <a href='" . site_url('jurutera/finance') . "'>Tetapkan kewangan </a>...</em></h3>";
		}
		?>
    </div>
</div>