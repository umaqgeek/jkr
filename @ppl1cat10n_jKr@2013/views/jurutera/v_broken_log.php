<?php if($broken_log) { $bl = $broken_log[0]; ?>

<h4>Penerangan Barang Rosak</h4>
 
<div class="row-fluid">
	<div class="span6">
   	  <table width="100%" border="0" cellspacing="0" cellpadding="5">
      	<tr>
        	<th align="left" valign="top" scope="row">Tarikh Lapor</th>
   	      <td align="left" valign="top">:</td>
    	    <td align="left" valign="top"><?=$this->my_func->sqltodate($bl->bl_recorddate); ?>&nbsp;</td>
  	    </tr>
        <tr>
        	<th align="left" valign="top" scope="row">Tarikh Siap</th>
   	      <td align="left" valign="top">:</td>
    	    <td align="left" valign="top"><?=$this->my_func->sqltodate($bl->bl_settledate); ?>&nbsp;</td>
  	    </tr>
        <tr>
        	<th align="left" valign="top" scope="row">Status</th>
   	      <td align="left" valign="top">:</td>
    	    <td align="left" valign="top"><?=$this->my_func->getStatusBL($bl->bl_repairstatus); ?>&nbsp;</td>
  	    </tr>
        <tr>
        	<th align="left" valign="top" scope="row">Harga</th>
   	      <td align="left" valign="top">:</td>
    	    <td align="left" valign="top"><?=$bl->bl_harga; ?>&nbsp;</td>
  	    </tr>
        <tr>
        	<th align="left" valign="top" scope="row">Kontraktor</th>
   	      <td align="left" valign="top">:</td>
    	    <td align="left" valign="top"><?=$bl->c_name; ?>&nbsp;</td>
  	    </tr>
        <tr>
        	<th align="left" valign="top" scope="row">No. Pendaftaran</th>
   	      <td align="left" valign="top">:</td>
    	    <td align="left" valign="top"><?=$bl->v_registrationno; ?>&nbsp;</td>
  	    </tr>
        <tr>
        	<th align="left" valign="top" scope="row">Daerah</th>
   	      <td align="left" valign="top">:</td>
    	    <td align="left" valign="top"><?=$bl->s_name; ?>&nbsp;</td>
  	    </tr>
        <tr>
        	<th align="left" valign="top" scope="row">Rekod oleh</th>
   	      <td align="left" valign="top">:</td>
    	    <td align="left" valign="top"><?=$bl->u_fullname; ?> (<?=$bl->u_staffno; ?>)&nbsp;</td>
  	    </tr>
  	  </table>
	</div>
  <div class="span6">
      <table width="100%" border="0" cellspacing="0" cellpadding="5">
      	<tr>
        	<th align="left" valign="top" scope="row">Sumber Kewangan &amp; Jenis Pembaikan</th>
    	    <td align="left" valign="top">:</td>
    	    <td align="left" valign="top"><?=$bl->f_code; ?> (<?=$bl->f_desc; ?>)&nbsp;</td>
  	    </tr>
        <tr>
        	<th align="left" valign="top" scope="row">Perihal Kerosakan</th>
    	    <td align="left" valign="top">:</td>
    	    <td align="left" valign="top"><?=$bl->bl_remarks; ?>&nbsp;</td>
  	    </tr>
        <tr>
        	<th align="left" valign="top" scope="row">No. D/O</th>
    	    <td align="left" valign="top">:</td>
    	    <td align="left" valign="top"><?=$bl->bl_nodo; ?>&nbsp;</td>
  	    </tr>
        <tr>
        	<th align="left" valign="top" scope="row">Perolehan</th>
    	    <td align="left" valign="top">:</td>
    	    <td align="left" valign="top"><?=$bl->pe_desc; ?>&nbsp;</td>
  	    </tr>
        <tr>
        	<th align="left" valign="top" scope="row">No. Sebut Harga</th>
    	    <td align="left" valign="top">:</td>
    	    <td align="left" valign="top"><?=$bl->bl_nosebutharga; ?>&nbsp;</td>
  	    </tr>
  	  </table>
  </div>
</div>
 
<?php } else { ?>
<h4><em>- Tiada rekod -</em></h4>
<?php } ?>