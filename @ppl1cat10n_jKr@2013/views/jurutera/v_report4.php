<style type="text/css">
<!--
.tablenota {
	font-size: 10px;
}
-->
</style>
<div class="row-fluid">
	<div class="span6" style="margin-left:-800px;">
        <h3>Laporan Harta Modal</h3>
	</div>
</div>

<div class="span10">
    <div class="span10">
    	<button type="button" onclick="location.href='<?=site_url('jurutera/report');?>'">Kembali</button>
    </div>
</div>

<div class="span10">
  <div class="span10">
  
<script type="text/javascript">
  $(function() {
    $( "#tarikhmula" ).datepicker({ dateFormat: "dd/mm/yy" });
	$( "#tarikhakhir" ).datepicker({ dateFormat: "dd/mm/yy" });
	$("#kosong1").click(function() {
		$( "#tarikhmula" ).attr("value","00/00/0000");
	});
	$("#kosong2").click(function() {
		$( "#tarikhakhir" ).attr("value","00/00/0000");
	});
  });
</script>

<form action="" method="post" name="f1" id="f1">
<table cellpadding="5">
  <tr>
    <td>No. Pendaftaran</td>
    <td>:</td>
    <td><select name="v_id" id="v_id">
	  <option value="0" <?php if (!(strcmp(0, $v_id))) {echo "selected=\"selected\"";} ?>>-- Paparkan Semua --</option>
        <?php if($vehicles) { foreach($vehicles as $v) { ?>
        <option value="<?=$v->v_id; ?>" <?php if (!(strcmp($v->v_id, $v_id))) {echo "selected=\"selected\"";} ?>><?=$v->v_registrationno; ?></option>
        <?php } } ?>
	</select></td>
  </tr>
  <tr>
    <td>Tarikh Mula</td>
    <td>:</td>
    <td><input name="tarikhmula" type="text" id="tarikhmula" value="<?=$tarikhmula; ?>" readonly="readonly" />
      <input type="button" name="kosong1" id="kosong1" value="Kosongkan" />      &nbsp;</td>
  </tr>
  <tr>
    <td>Tarikh Akhir</td>
    <td>:</td>
    <td><input name="tarikhakhir" type="text" id="tarikhakhir" value="<?=$tarikhakhir; ?>" readonly="readonly" />
      <input type="button" name="kosong2" id="kosong2" value="Kosongkan" />&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" value="Cari" /></td>
  </tr>
</table>
</form>

<?php
if(isset($report5)) { ?>
<form method="post" action="<?=site_url('jurutera/exportReport2_all'); ?>" name="f_export2_all">
	<input type="hidden" name="tarikhmula" value="<?=$tarikhmula; ?>" />
    <input type="hidden" name="tarikhakhir" value="<?=$tarikhakhir; ?>" />
    <input type="submit" value="Export All" />
</form>
<?php foreach($report5 as $r5) { if(isset($r5)) { ?>

<hr />
<table width="100%">
	<tr>
    	<td colspan="6" align="right" valign="top">KEW.PA-14</td>
    </tr>
    <tr>
    	<th colspan="6" align="center" valign="top">DAFTAR PENYELENGGARAAN HARTA MODAL</th>
    </tr>
    <tr>
    	<td colspan="6" align="center" valign="top">(diisi oleh Pegawai Aset)</td>
    </tr>
    <tr>
    	<td colspan="6">&nbsp;</td>
    </tr>
    <tr>
    	<td width="8%" valign="top"><strong>Kategori</strong></td>
        <td width="38%" valign="top"><strong> : 
          <?=$r5[0]->v_category; ?>
        </strong></td>
        <td width="3%" valign="top">&nbsp;</td>
        <td width="18%" valign="top"><strong>No. Siri Pendaftaran</strong></td>
        <td width="31%" valign="top"><strong> : 
          <?=$r5[0]->v_registrationno; ?>
        </strong></td>
        <td width="2%" valign="top">&nbsp;</td>
    </tr>
    <tr>
    	<td valign="top"><strong>Jenis</strong></td>
        <td valign="top"><strong> : 
          <?=$r5[0]->v_group; ?>
        </strong></td>
        <td valign="top">&nbsp;</td>
        <td valign="top"><strong>Lokasi</strong></td>
        <td valign="top"><strong> : 
          <?=$r5[0]->v_location; ?>
        </strong></td>
        <td valign="top">&nbsp;</td>
    </tr>
    <tr>
    	<td colspan="6">&nbsp;</td>
    </tr>
    <tr>
    	<td colspan="6">
        	<table border="1" width="100%">
            	<tr>
                    <th align="center" valign="top">(a)<br />Tarikh</th>
                    <th align="center" valign="top">(b)<br />Butir-butir kerja</th>
                    <th align="center" valign="top">(c)<br />No. Kontrak/Pesanan<br />Kerajaan dan Tarikh</th>
                    <th align="center" valign="top">(d)<br />Nama Syarikat/Jabatan<br />Yang Menyelenggara</th>
                    <th align="center" valign="top">(e)<br />Kos (RM)</th>
                    <th align="center" valign="top">(f)<br />Nama dan<br />Tandatangan</th>
                </tr>
                <?php foreach($r5 as $r) { ?>
                <tr>
                    <td><?=$this->my_func->sqltodate($r->bl_recorddate); ?></td>
                    <td><?=$r->bl_remarks; ?></td>
                    <td><?=$r->bl_nolo; ?></td>
                    <td><?=$r->c_name; ?></td>
                    <td><?=$r->bl_harga; ?></td>
                    <td><?=$r->u_fullname; ?></td>
                </tr>
                <?php } ?>
            </table>
        </td>
    </tr>
    <tr>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="6"><table cellspacing="0" cellpadding="0">
        <col width="81">
        <col width="287">
        <col width="246">
        <col width="200">
        <tr>
          <td width="81" valign="top"><span class="tablenota">Nota         :</span></td>
          <td width="733" colspan="3" valign="top"><span class="tablenota"><strong>a)    Tarikh pembaikan/penyelenggaraan yang telah dilakukan bagi harta modal    berkenaan.</strong></span></td>
        </tr>
        <tr>
          <td valign="top"></td>
          <td valign="top"><span class="tablenota"><strong>b) Butir-butir kerja </strong></span></td>
          <td valign="top"></td>
          <td valign="top"></td>
        </tr>
        <tr>
          <td valign="top"></td>
          <td colspan="2" valign="top"><span class="tablenota">    Keterangan mengenai kerja-kerja pembaikan    termasuk alat ganti yang dibeli</span></td>
          <td valign="top"></td>
        </tr>
        <tr>
          <td valign="top"></td>
          <td colspan="2" valign="top"><span class="tablenota"><strong>c) No. kontrak/No.    Pesanan Kerajaan beserta tarikh</strong></span></td>
          <td valign="top"></td>
        </tr>
        <tr>
          <td valign="top"></td>
          <td colspan="2" valign="top"><span class="tablenota">    No. Rujukan Pesanan Kerajaan/ No.Kontrak    berserta tarikh.</span></td>
          <td valign="top"></td>
        </tr>
        <tr>
          <td valign="top"></td>
          <td colspan="2" valign="top"><span class="tablenota"><strong>d) Nama Syarikat/Jabatan    yang menyelenggara</strong></span></td>
          <td valign="top"></td>
        </tr>
        <tr>
          <td valign="top"></td>
          <td colspan="2" valign="top"><span class="tablenota">    Nama syarikat atau Jabatan yang    melaksanakan kerja-kerja penyelenggaraan. </span></td>
          <td valign="top"></td>
        </tr>
        <tr>
          <td valign="top"></td>
          <td valign="top"><span class="tablenota"><strong>e) Kos</strong></span></td>
          <td valign="top"></td>
          <td valign="top"></td>
        </tr>
        <tr>
          <td valign="top"></td>
          <td colspan="2" valign="top"><span class="tablenota">    Kos Alat ganti atau kos pembaikan atau    kedua-duanya sekali. </span></td>
          <td valign="top"></td>
        </tr>
        <tr>
          <td valign="top"></td>
          <td valign="top"><span class="tablenota"><strong>f)  Nama dan Tandatangan</strong></span></td>
          <td valign="top"></td>
          <td valign="top"></td>
        </tr>
        <tr>
          <td valign="top"></td>
          <td colspan="3" valign="top"><span class="tablenota">    Pegawai Aset/ Pengangkutan hendaklah    menandatangani bagi mengesahkan butir-butir penyelenggaraan tersebut. </span></td>
        </tr>
      </table></td>
    </tr>
</table>
<?php } } } ?>

<?php if(isset($report4)) { ?>

<form method="post" action="<?=site_url('jurutera/exportReport2'); ?>" name="f_export2">
    <input type="hidden" name="v_id" value="<?=$v_id; ?>" />
    <input type="hidden" name="tarikhmula" value="<?=$tarikhmula; ?>" />
    <input type="hidden" name="tarikhakhir" value="<?=$tarikhakhir; ?>" />
    <input type="submit" value="Export" />
</form>

<table width="100%">
	<tr>
    	<td colspan="6" align="right" valign="top">KEW.PA-14</td>
    </tr>
    <tr>
    	<th colspan="6" align="center" valign="top">DAFTAR PENYELENGGARAAN HARTA MODAL</th>
    </tr>
    <tr>
    	<td colspan="6" align="center" valign="top">(diisi oleh Pegawai Aset)</td>
    </tr>
    <tr>
    	<td colspan="6">&nbsp;</td>
    </tr>
    <tr>
    	<td width="8%" valign="top"><strong>Kategori</strong></td>
        <td width="38%" valign="top"><strong> : 
          <?=$report4[0]->v_category; ?>
        </strong></td>
        <td width="3%" valign="top">&nbsp;</td>
        <td width="18%" valign="top"><strong>No. Siri Pendaftaran</strong></td>
        <td width="31%" valign="top"><strong> : 
          <?=$report4[0]->v_registrationno; ?>
        </strong></td>
        <td width="2%" valign="top">&nbsp;</td>
    </tr>
    <tr>
    	<td valign="top"><strong>Jenis</strong></td>
        <td valign="top"><strong> : 
          <?=$report4[0]->v_group; ?>
        </strong></td>
        <td valign="top">&nbsp;</td>
        <td valign="top"><strong>Lokasi</strong></td>
        <td valign="top"><strong> : 
          <?=$report4[0]->v_location; ?>
        </strong></td>
        <td valign="top">&nbsp;</td>
    </tr>
    <tr>
    	<td colspan="6">&nbsp;</td>
    </tr>
    <tr>
    	<td colspan="6">
        	<table border="1" width="100%">
            	<tr>
                    <th align="center" valign="top">(a)<br />Tarikh</th>
                    <th align="center" valign="top">(b)<br />Butir-butir kerja</th>
                    <th align="center" valign="top">(c)<br />No. Kontrak/Pesanan<br />Kerajaan dan Tarikh</th>
                    <th align="center" valign="top">(d)<br />Nama Syarikat/Jabatan<br />Yang Menyelenggara</th>
                    <th align="center" valign="top">(e)<br />Kos (RM)</th>
                    <th align="center" valign="top">(f)<br />Nama dan<br />Tandatangan</th>
                </tr>
                <?php foreach($report4 as $r) { ?>
                <tr>
                    <td><?=$this->my_func->sqltodate($r->bl_recorddate); ?></td>
                    <td><?=$r->bl_remarks; ?></td>
                    <td><?=$r->bl_nolo; ?></td>
                    <td><?=$r->c_name; ?></td>
                    <td><?=$r->bl_harga; ?></td>
                    <td><?=$r->u_fullname; ?></td>
                </tr>
                <?php } ?>
            </table>
        </td>
    </tr>
    <tr>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="6"><table cellspacing="0" cellpadding="0">
        <col width="81">
        <col width="287">
        <col width="246">
        <col width="200">
        <tr>
          <td width="81" valign="top"><span class="tablenota">Nota         :</span></td>
          <td width="733" colspan="3" valign="top"><span class="tablenota"><strong>a)    Tarikh pembaikan/penyelenggaraan yang telah dilakukan bagi harta modal    berkenaan.</strong></span></td>
        </tr>
        <tr>
          <td valign="top"></td>
          <td valign="top"><span class="tablenota"><strong>b) Butir-butir kerja </strong></span></td>
          <td valign="top"></td>
          <td valign="top"></td>
        </tr>
        <tr>
          <td valign="top"></td>
          <td colspan="2" valign="top"><span class="tablenota">    Keterangan mengenai kerja-kerja pembaikan    termasuk alat ganti yang dibeli</span></td>
          <td valign="top"></td>
        </tr>
        <tr>
          <td valign="top"></td>
          <td colspan="2" valign="top"><span class="tablenota"><strong>c) No. kontrak/No.    Pesanan Kerajaan beserta tarikh</strong></span></td>
          <td valign="top"></td>
        </tr>
        <tr>
          <td valign="top"></td>
          <td colspan="2" valign="top"><span class="tablenota">    No. Rujukan Pesanan Kerajaan/ No.Kontrak    berserta tarikh.</span></td>
          <td valign="top"></td>
        </tr>
        <tr>
          <td valign="top"></td>
          <td colspan="2" valign="top"><span class="tablenota"><strong>d) Nama Syarikat/Jabatan    yang menyelenggara</strong></span></td>
          <td valign="top"></td>
        </tr>
        <tr>
          <td valign="top"></td>
          <td colspan="2" valign="top"><span class="tablenota">    Nama syarikat atau Jabatan yang    melaksanakan kerja-kerja penyelenggaraan. </span></td>
          <td valign="top"></td>
        </tr>
        <tr>
          <td valign="top"></td>
          <td valign="top"><span class="tablenota"><strong>e) Kos</strong></span></td>
          <td valign="top"></td>
          <td valign="top"></td>
        </tr>
        <tr>
          <td valign="top"></td>
          <td colspan="2" valign="top"><span class="tablenota">    Kos Alat ganti atau kos pembaikan atau    kedua-duanya sekali. </span></td>
          <td valign="top"></td>
        </tr>
        <tr>
          <td valign="top"></td>
          <td valign="top"><span class="tablenota"><strong>f)  Nama dan Tandatangan</strong></span></td>
          <td valign="top"></td>
          <td valign="top"></td>
        </tr>
        <tr>
          <td valign="top"></td>
          <td colspan="3" valign="top"><span class="tablenota">    Pegawai Aset/ Pengangkutan hendaklah    menandatangani bagi mengesahkan butir-butir penyelenggaraan tersebut. </span></td>
        </tr>
      </table></td>
    </tr>
</table>
<?php } ?>
    
  </div>
</div>