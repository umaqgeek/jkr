<?php
$name = "";
$num = "";
if($report2) {
	foreach($report2 as $r1) {
		$name .= ", '" . $r1->c_name . "'";
		$num .= ", " . $r1->expenses;
	}
}
?>

<div class="row-fluid">
	<div class="span6" style="margin-left:-800px;">
        <h3>Laporan Kekayaan Kontraktor</h3>
	</div>
</div>

<div class="span10">
    <div class="span10">
    	<button type="button" onclick="location.href='<?=site_url('jurutera/report');?>'">Kembali</button>
    </div>
</div>

<div class="span10">
    <div class="span10">

<?php
$code2 = array("0");
if(isset($_POST['ser_kew_0'])) {
	$code2 = array("0");
}
$code = array("-1");
if(isset($_POST['ser_kew'])) {
	$code = $_POST['ser_kew'];
	$code2 = array("-1");
}
?>

<?php if($finance) { ?>

<script type="text/javascript">
function uncheckAll() {
	for(i=1; i<10000; i++) {
		document.getElementById('ser_kew_'+i).checked = false;
	}
}
function uncheckAll2() {
	document.getElementById('ser_kew_0').checked = false;
}
</script>

        <input type="button" value="Export" onclick="window.print();" />

        <form method="post" action="" name="f1" id="f1">
        <input type="submit" value="Cari" />
		<table border="0" cellspacing="0" cellpadding="5">
			  <tr>
			    <th colspan="2" align="left" valign="top" scope="row">Pilih Kod Laporan :- &nbsp;</th>
	      </tr>
          <tr>
			    <td align="left" valign="top">
                <input <?php if (in_array("0", $code2)) {echo "checked=\"checked\"";} ?> 
                  type="checkbox" name="ser_kew_0" id="ser_kew_0" value="0" onclick="uncheckAll();" />
                &nbsp;</td>
			    <td align="left" valign="top">
                Semua
                &nbsp;</td>
	      </tr>
          <?php foreach($finance as $f) { ?>
			  <tr>
			    <td align="left" valign="top">
			      <input <?php if (in_array($f->f_id, $code)) {echo "checked=\"checked\"";} ?> 
                  type="checkbox" name="ser_kew[]" id="ser_kew_<?=$f->f_id; ?>" value="<?=$f->f_id; ?>" onclick="uncheckAll2();" />
                &nbsp;</td>
			    <td align="left" valign="top">
                <?=$f->f_code; ?> (<?=$f->f_desc; ?>)
                &nbsp;</td>
	      </tr>
          <?php } ?>
	  </table>
      </form>
<?php } ?>
    
    
    	<script type="text/javascript" src="<?=base_url(); ?>/js/jsapi"></script>
		<script type="text/javascript">
          google.load('visualization', '1');
        </script>
        <script type="text/javascript">
          function drawVisualization() {
            var wrapper = new google.visualization.ChartWrapper({
              chartType: 'ColumnChart',
              dataTable: [[''<?php echo $name; ?>],
                          [''<?php echo $num; ?>]],
              options: {'title': 'Nilai Kewangan (RM)'},
              containerId: 'visualization'
            });
            wrapper.draw();
          }
          google.setOnLoadCallback(drawVisualization);
        </script>
        <div id="visualization" style="height:600px;"></div>
    </div>
</div>
