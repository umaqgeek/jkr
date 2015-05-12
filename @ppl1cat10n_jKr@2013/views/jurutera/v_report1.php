<div class="row-fluid">
	<div class="span6" style="margin-left:-800px;">
        <h3>Laporan Log Kerja</h3>
	</div>
</div>

<div class="span10">
    <div class="span10">
    	<button type="button" onclick="location.href='<?=site_url('jurutera/report');?>'">Kembali</button>
    </div>
</div>

<?php
$unit = "-1";
$daerah = "-1";
$tahun = "-1";
$bulan = "-1";
if($this->input->post('post_f1')) {
	$unit = $this->input->post('ser_unit');
	$daerah = $this->input->post('ser_daerah');
	$tahun = $this->input->post('ser_tahun');
	$bulan = $this->input->post('ser_bulan');
}
?>

<div class="span12">
    <div class="span12">
    	<form method="post" action="" name="f1" id="f1">
        <input type="hidden" name="post_f1" value="1" />
		<table border="0" cellspacing="0" cellpadding="0">
		  <tr>
          	<th colspan="3" align="left" valign="middle" scope="row" height="50px">Carian :- &nbsp;</th>
	      </tr>
          <tr>
          	<td align="left" valign="top" width="10%">Unit</td>
            <td align="left" valign="top" width="2%">:</td>
            <td align="left" valign="top" width="50%">
            	<select name="ser_unit">
            	  <option value="-1" <?php if (!(strcmp(-1, $unit))) {echo "selected=\"selected\"";} ?>>-- Sila Pilih Unit --</option>
                  <?php if($broken_log_unit) { foreach($broken_log_unit as $blu) { ?>
                  <option value="<?=$blu->blu_code; ?>" <?php if (!(strcmp($blu->blu_code, $unit))) {echo "selected=\"selected\"";} ?>><?=$blu->blu_desc; ?></option>
                  <?php } } ?>
                </select>
            </td>
	      </tr>
          <tr>
          	<td align="left" valign="top">Daerah</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top">
              <select name="ser_daerah">
           	    <option value="-1" <?php if (!(strcmp(-1, $daerah))) {echo "selected=\"selected\"";} ?>>-- Sila Pilih Daerah --</option>
                  <?php if($state) { foreach($state as $s) { ?>
                  <option value="<?=$s->s_id; ?>" <?php if (!(strcmp($s->s_id, $daerah))) {echo "selected=\"selected\"";} ?>><?=$s->s_name; ?></option>
                  <?php } } ?>
                </select>
            </td>
	      </tr>
          <tr>
          	<td align="left" valign="top">Tahun</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top">
              <select name="ser_tahun">
           	    <option value="-1" <?php if (!(strcmp(-1, $tahun))) {echo "selected=\"selected\"";} ?>>-- Sila Pilih Tahun --</option>
                  <?php if($year) { foreach($year as $y) { ?>
                  <option value="<?=$y->y_desc; ?>-00-00" <?php if (!(strcmp($y->y_desc.'-00-00', $tahun))) {echo "selected=\"selected\"";} ?>><?=$y->y_desc; ?></option>
                  <?php } } ?>
                </select>
            </td>
	      </tr>
          <tr>
          	<td align="left" valign="top">Bulan</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top">
              <select name="ser_bulan">
           	    <option value="-1" <?php if (!(strcmp(-1, $bulan))) {echo "selected=\"selected\"";} ?>>-- Sila Pilih Bulan --</option>
                  <?php if($month) { foreach($month as $m) { ?>
                  <option value="0000-<?=$m->m_id; ?>-00" <?php if (!(strcmp('0000-'.$m->m_id.'-00', $bulan))) {echo "selected=\"selected\"";} ?>><?=$m->m_desc; ?></option>
                  <?php } } ?>
                </select>
            </td>
	      </tr>
          <tr>
          	<td align="left" valign="top" colspan="3">
            	<input type="submit" value="Cari" />
            </td>
	      </tr>
	  </table>
      </form>
      
      <?php 
	  if($this->input->post('post_f1')) {
		  $unit = $this->input->post('ser_unit');
		  $daerah = $this->input->post('ser_daerah');
		  $tahun = $this->input->post('ser_tahun');
		  $bulan = $this->input->post('ser_bulan');
	  ?>
      <form method="post" action="<?=site_url('jurutera/exportReport1'); ?>" name="f_export1">
      <input type="hidden" name="unit" value="<?=$unit; ?>" />
      <input type="hidden" name="daerah" value="<?=$daerah; ?>" />
      <input type="hidden" name="tahun" value="<?=$tahun; ?>" />
      <input type="hidden" name="bulan" value="<?=$bulan; ?>" />
      <input type="submit" value="Export" />
      </form>
      <?php } ?>
      <?php if(isset($broken_log)) {
		  echo "<strong>Bilangan: " . sizeof($broken_log) . "</strong><br /><br />";
	  } ?>
      <table cellpadding="0" cellspacing="0" class="table">
      	<tr>
        	<th width="2%" align="left" valign="top">Bil.</th>
        	<th width="5%" align="left" valign="top">No Unit</th>
            <th width="5%" align="left" valign="top">Tarikh</th>
            <th width="5%" align="left" valign="top">Kod Kewangan</th>
            <th width="5%" align="left" valign="top">Nombor L/O</th>
            <th width="7%" align="left" valign="top">No. Kenderaan</th>
            <th width="5%" align="left" valign="top">Kump.</th>
            <th width="5%" align="left" valign="top">Model</th>
            <th width="5%" align="left" valign="top">Pembuat</th>
            <th width="5%" align="left" valign="top">Lokasi</th>
            <th width="9%" align="left" valign="top">Perihal Kerosakan</th>
            <th width="5%" align="left" valign="top">Status</th>
            <th width="8%" align="left" valign="top">Jenis Pembaikian</th>
            <th width="5%" align="left" valign="top">Pekerja</th>
            <th width="8%" align="left" valign="top">Kontraktor</th>
            <th width="5%" align="left" valign="top">Harga (RM)</th>
            <th width="7%" align="left" valign="top">Pembuat Log</th>
            <th width="7%" align="left" valign="top">Status Lulus</th>
            <th width="12%" align="left" valign="top">Pelulus</th>
        </tr>
      	<?php if(isset($broken_log)) { $i=1; foreach($broken_log as $bl) { ?>
        <tr>
      	  <td align="left" valign="top"><?=$i++; ?>.&nbsp;</td>
      	  <td align="left" valign="top"><?=$bl->bl_unit; ?>&nbsp;</td>
      	  <td align="left" valign="top"><?=$this->my_func->sqltodate($bl->bl_recorddate); ?>&nbsp;</td>
      	  <td align="left" valign="top"><?=$bl->f_code; ?>&nbsp;</td>
      	  <td align="left" valign="top"><?=$bl->bl_nolo; ?>&nbsp;</td>
      	  <td align="left" valign="top"><?=$bl->v_registrationno; ?>&nbsp;</td>
      	  <td align="left" valign="top"><?=$bl->v_group; ?>&nbsp;</td>
      	  <td align="left" valign="top"><?=$bl->v_model; ?>&nbsp;</td>
      	  <td align="left" valign="top"><?=$bl->v_maker; ?>&nbsp;</td>
      	  <td align="left" valign="top"><?=$bl->v_location; ?>&nbsp;</td>
      	  <td align="left" valign="top"><?=$bl->bl_remarks; ?>&nbsp;</td>
      	  <td align="left" valign="top"><?=$this->my_func->getStatusBL($bl->bl_repairstatus); ?>&nbsp;</td>
      	  <td align="left" valign="top"><?=$bl->jk_desc; ?>&nbsp;</td>
      	  <td align="left" valign="top"><?=$this->my_func->getPekerja($bl->bl_id); ?>&nbsp;</td>
      	  <td align="left" valign="top"><?=$bl->c_name; ?>&nbsp;</td>
          <td align="left" valign="top"><?php echo $this->m_letter_order->getExpenses($bl->bl_id); ?></td>
          <td align="left" valign="top"><?=$bl->u_fullname; ?>&nbsp;</td>
          <td align="left" valign="top"><?=$this->my_func->getStatusNM($bl->lo_approvedby); ?>&nbsp;</td>
          <td align="left" valign="top"><?=$this->m_user->getPelulus($bl->lo_approvedby); ?>&nbsp;</td>
   	    </tr>
        <?php } } else { ?>
        <tr>
        	<td colspan="19"><em>Tiada laporan ...</em></td>
        </tr>
        <?php } ?>
      </table>
    </div>
</div>