<?php 
$lo = $letter_order[0]; 
$lo_user = $letter_order_user[0];
?>
<style type="text/css">
<!--
.tbl_temp {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-style: normal;
	font-variant: normal;
	font-weight: normal;
}
.signature1 {
	font-size: 9px;
}
-->
</style>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="tbl_temp">
  <tr>
    <td colspan="4"><img src="<?=base_url(); ?>images/surat/banner.jpg" alt="banner" width="100%" height="92" /></td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">JABATAN KERJA RAYA (MEKANIKAL) MELAKA,</td>
    <td width="174">NO.NOTA MINTA : </td>
    <td width="164"><?=$lo->bl_unit; ?>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">JALAN TAMING SARI,</td>
    <td>NO.NOTA MINTA SPEK :</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">PETI SURAT 96,</td>
    <td>NO.PESANAN TEMPATAN :</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">75906 MELAKA</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="124">Tel: (06)2854733          </td>
    <td width="203">Fax: (06)2827087</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="left" valign="top"><table width="90%" border="1" cellspacing="0" cellpadding="5" class="tbl_temp">
      <tr>
        <td><?=$lo->c_name; ?>&nbsp;</td>
      </tr>
      <tr>
        <td height="50"><?=$lo->c_address; ?><br /><?=$lo->c_postcode; ?>&nbsp;<?=$lo->c_negeri; ?>&nbsp;</td>
      </tr>
      <tr>
        <td>PIC: <?=$lo->c_personincharge; ?>&nbsp;<?=$lo->c_phoneno; ?>&nbsp;</td>
      </tr>
    </table></td>
    <td colspan="2" align="left" valign="top"><table width="100%" border="1" cellspacing="0" cellpadding="5" class="tbl_temp">
      <tr bgcolor="#99FFFF">
        <td colspan="4" align="center" valign="top">PESANAN TEMPATAN/INDES KERJA UNTUK (TUJUAN):</td>
        </tr>
      <tr>
        <td colspan="2" align="center" valign="top" bgcolor="#99FFFF">NO. JPJ : <?=$lo->v_registrationno; ?></td>
        <td colspan="2" align="center" valign="top"><?=$lo->c_name; ?>&nbsp;</td>
        </tr>
      <tr>
        <td width="25%" align="center" valign="top"><?=$lo->v_model; ?>&nbsp;</td>
        <td width="25%" align="center" valign="top"><?=$lo->v_group; ?>&nbsp;</td>
        <td width="25%" align="center" valign="top"><?=$lo->v_maker; ?>&nbsp;</td>
        <td width="25%" align="center" valign="top"><?=$lo->v_location; ?>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="4" align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="left" valign="top"><p>TUAN,<br>
    Sukacita jika dapat mengeluarkan pesanan Tempatan / Inden Kerja bagi perkara berikut :-</p></td>
  </tr>
  <tr>
    <td colspan="4" align="left" valign="top">&nbsp;</td>
  </tr>
  
  <?php $total=0; if($part) { ?>
  <tr>
    <td colspan="4" align="left" valign="top"><strong>ALAT GANTI</strong></td>
  </tr>
  <tr>
    <td colspan="4" align="left" valign="top">
    <table class="tbl_temp" width="100%" border="1" cellspacing="0" cellpadding="5">
      <tr bgcolor="#99FFFF">
        <th width="5%" align="center" valign="top" scope="col">BIL</th>
        <th width="30%" align="center" valign="top" scope="col">JENIS BARANG</th>
        <th width="20%" align="center" valign="top" scope="col">NO. ALAT GANTI</th>
        <th width="10%" align="center" valign="top" scope="col">KUANTITI</th>
        <th width="15%" align="center" valign="top" scope="col">HARGA (RM)</th>
        <th width="20%" align="center" valign="top" scope="col">JUMLAH (RM)</th>
      </tr>
      <?php $i=1; foreach($part as $p) { ?>
      <tr>
        <td align="center" valign="top"><?=$i++; ?>&nbsp;</td>
        <td align="center" valign="top"><?=$p->plo_name; ?>&nbsp;</td>
        <td align="center" valign="top"><?=$p->plo_partno; ?>&nbsp;</td>
        <td align="center" valign="top"><?=$p->plo_quantity; ?>&nbsp;</td>
        <td align="center" valign="top"><?=$p->plo_totalprice; ?>&nbsp;</td>
        <td align="center" valign="top"><strong><?=$p->plo_quantity*$p->plo_totalprice; ?></strong>&nbsp;
			<?php $total += ($p->plo_quantity*$p->plo_totalprice); ?>
        </td>
      </tr>
      <?php } ?>
      <tr>
      	<td colspan="5" align="right" valign="top"><strong>JUMLAH</strong></td>
        <td align="center" valign="top"><strong><?=$total; ?></strong>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="4" align="left" valign="top" class="tbl_border">&nbsp;</td>
  </tr>
  <?php } ?>
  
  <?php $total2=0; if($upah) { ?>
  <tr>
    <td colspan="4" align="left" valign="top" class="tbl_border"><strong>UPAH PEKERJA</strong></td>
  </tr>
  <tr>
    <td colspan="4" align="left" valign="top" class="tbl_border"><table class="tbl_temp" width="100%" border="1" cellspacing="0" cellpadding="5">
      <tr bgcolor="#99FFFF">
        <th width="5%" align="center" valign="top" scope="col">BIL</th>
        <th width="75%" align="center" valign="top" scope="col">PERKARA</th>
        <th width="20%" align="center" valign="top" scope="col">JUMLAH (RM)</th>
      </tr>
      <?php $i=1; foreach($upah as $u) { ?>
      <tr>
        <td align="center" valign="top"><?=$i++; ?>&nbsp;</td>
        <td align="center" valign="top"><?=$u->ser_desc; ?>&nbsp;</td>
        <td align="center" valign="top"><strong><?=$u->ser_totalprice; ?></strong>&nbsp;<?php $total2 += $u->ser_totalprice; ?></td>
      </tr>
      <?php } ?>
      <tr>
      	<td colspan="2" align="right" valign="top"><strong>JUMLAH</strong></td>
        <td align="center" valign="top"><strong><?=$total2; ?></strong>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="4" align="left" valign="top" class="tbl_border">&nbsp;</td>
  </tr>
  <?php } ?>
  
  <tr>
    <td colspan="4" align="left" valign="top" class="tbl_border"><table class="tbl_temp" width="100%" border="1" cellspacing="0" cellpadding="5">
      <tr>
      	<td align="right" valign="top" width="80%"><strong>JUMLAH BESAR</strong></td>
        <td align="center" valign="top"><strong><?=$total+$total2; ?></strong>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="4" align="left" valign="top" class="tbl_border">&nbsp;</td>
  </tr>
  
  <tr>
    <td colspan="4" align="left" valign="top" class="tbl_border"><table class="tbl_temp" width="100%" border="1" cellspacing="0" cellpadding="5">
    
    <!--
      <tr valign="top">
        <td width="50%" align="center"><table width="100%" border="0" cellspacing="0" cellpadding="1" class="tbl_temp">
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Kod Peruntukan: <strong>
              <?=$lo->f_code; ?>
            </strong></td>
          </tr>
          <tr>
            <td>Penerangan: <strong>
              <?=$lo->f_desc; ?>
            </strong></td>
          </tr>
          <tr>
            <td>Peruntukan Semasa: RM</td>
          </tr>
          <tr>
            <td>Tarikh: <strong>
              <?=date('d/m/Y'); ?>
            </strong>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        <td align="center"><table width="100%" border="0" cellspacing="0" cellpadding="1" class="tbl_temp">
          <tr>
            <td>&nbsp;</td>
            </tr>
          <tr>
            <td><strong>T/T Pemohon:</strong></td>
            </tr>
          <tr>
            <td>Nama Pemohon: <strong>
              <?=$lo_user->u_fullname; ?>
              </strong></td>
            </tr>
          <tr>
            <td>Tarikh: <strong>
              <?=$this->my_func->sqltodate($lo_user->lo_createddate); ?>
              </strong></td>
            </tr>
          <tr>
            <td><strong>T/T Ketua Unit:</strong></td>
            </tr>
          <tr>
            <td>Nama / Cop Ketua Unit:</td>
            </tr>
          <tr>
            <td>&nbsp;</td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td align="center" valign="middle">REKOD</td>
        <td align="center" valign="middle">AKAUN PELULUS</td>
      </tr>
      <tr valign="top">
        <td align="center"><table width="100%" border="0" cellspacing="0" cellpadding="1" class="tbl_temp">
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Baki Peruntukan: <strong>RM

            </strong></td>
          </tr>
          <tr>
            <td>T/T PT Kew:</td>
          </tr>
          <tr>
            <td>Nama PT Kew: </td>
          </tr>
          <tr>
            <td>Tarikh: <strong>
              <?=date('d/m/Y'); ?>
            </strong></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        <td align="center"><table width="100%" border="0" cellspacing="0" cellpadding="1" class="tbl_temp">
          <tr>
            <td>&nbsp;</td>
            </tr>
          <tr>
            <td>T/TPELULUS:</td>
            </tr>
          <tr>
            <td>NAMA/COP PELULUS: <strong>
              <?=$lo->u_fullname; ?>
              </strong></td>
            </tr>
          <tr>
            <td>TARIKH:</td>
            </tr>
          <tr>
            <td>&nbsp;</td>
            </tr>
        </table></td>
      </tr>
      -->
      
      <tr valign="top">
        <td colspan="2" align="center"><table width="100%" border="1" cellpadding="5" cellspacing="0">
          <tr>
            <td width="34%" align="center"><span class="signature1"><strong>PEMERIKSAAN KENDERAAN / JENTERA / MESIN / DIJALANKAN OLEH</strong></span></td>
            <td colspan="2" align="center"><span class="signature1"><strong>PEGAWAI YANG MEMOHON</strong></span></td>
            <td width="32%" colspan="2" align="center"><span class="signature1"><strong>KEPUTUSAN PERMOHONAN</strong></span></td>
          </tr>
          <tr>
            <td align="center" valign="top"><table width="100%" border="0" cellpadding="5" cellspacing="0">
              <tr>
                <td width="31%"><strong><span class="signature1">Nama</span></strong></td>
                <td width="69%"><strong><span class="signature1">:</span></strong></td>
              </tr>
              <tr>
                <td><strong><span class="signature1">Jawatan</span></strong></td>
                <td><strong><span class="signature1">:</span></strong></td>
              </tr>
              <tr>
                <td colspan="2" align="center"><p>&nbsp;</p>
                  <p><strong><span class="signature1">.......................................<br />
                  TANDATANGAN</span></strong></p></td>
              </tr>
            </table></td>
            <td colspan="2" align="center" valign="top"><table width="100%" border="0" cellpadding="5" cellspacing="0">
              <tr>
                <td width="41%" align="left"><strong><span class="signature1">Tandatangan Pemohon</span></strong></td>
                <td width="59%" align="left" class="signature1"><strong>:</strong></td>
                </tr>
              <tr>
                <td align="left" class="signature1"><strong>Nama / Cop Pemohon</strong></td>
                <td align="left" class="signature1"><strong>:</strong></td>
                </tr>
              <tr>
                <td align="left" class="signature1"><strong>Nama Pemohon</strong></td>
                <td align="left" class="signature1"><strong>: <?=$sess['u_fullname']; ?></strong></td>
              </tr>
              <tr>
                <td align="left" class="signature1"><strong>Tarikh</strong></td>
                <td align="left" class="signature1"><strong>: <?=date('d/m/Y'); ?></strong></td>
                </tr>
            </table></td>
            <td colspan="2" align="center" valign="top"><table width="100%" border="0" cellpadding="5" cellspacing="0">
              <tr>
                <td colspan="2" align="center" class="signature1"><strong>LULUS / TOLAK</strong></td>
              </tr>
              <tr>
                <td width="38%" class="signature1"><strong>Tandatangan Pelulus</strong></td>
                <td width="62%" class="signature1"><strong>:</strong></td>
              </tr>
              <tr>
                <td class="signature1"><strong>Nama / Cop Pelulus</strong></td>
                <td class="signature1"><strong>:</strong></td>
              </tr>
              <tr>
                <td class="signature1"><strong>Nama Pelulus.</strong></td>
                <td class="signature1"><strong>: 
                  
                </strong></td>
              </tr>
              <tr>
                <td class="signature1"><strong>Tarikh</strong></td>
                <td class="signature1"><strong>: 
                  
                </strong></td>
              </tr>
            </table></td>
            </tr>
          <tr>
            <td colspan="5" class="signature1"><strong>BAHAGIAN KEWANGAN</strong></td>
            </tr>
          <tr>
            <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="1" class="tbl_temp">
              <tr>
                <td><span class="signature1">(i)</span></td>
                <td><span class="signature1">Baki Peruntukan di bawah Kod Aktiviti /asal: RM</span></td>
              </tr>
              <tr>
                <td><span class="signature1">(ii)</span></td>
                <td><span class="signature1">Permohonan disokong dengan peruntukan: <strong>
                  <?=$lo->f_code; ?>
                  </strong></span></td>
              </tr>
              <tr>
                <td><span class="signature1">(iii)</span></td>
                <td><span class="signature1">Penerangan: <strong>
                  <?=$lo->f_desc; ?>
                </strong></span></td>
              </tr>
              <tr>
                <td><span class="signature1">(iv)</span></td>
                <td><span class="signature1">Peruntukan Semasa: RM</span></td>
              </tr>
            </table></td>
            <td colspan="3" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="1" class="tbl_temp">
              <tr>
                <td><span class="signature1">(v)</span></td>
                <td><span class="signature1">Tandatangan PA / KPT Kewangan: </span></td>
              </tr>
              <tr>
                <td><span class="signature1">(vi)</span></td>
                <td><span class="signature1">Nama / Cop PT Kewangan:: </span></td>
              </tr>
              <tr>
                <td><span class="signature1">(vii)</span></td>
                <td><span class="signature1">Tarikh: <strong>
                  <!--<?=date('d/m/Y'); ?>-->
                </strong></span></td>
              </tr>
            </table></td>
            </tr>
        </table></td>
        </tr>
    </table></td>
  </tr>
</table>
<script type="text/javascript">
window.print();
</script>