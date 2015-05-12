<script type="text/javascript">
$(document).ready(function() {
	$("#tbl_add").click(function() {
		$('#tbl_1 tr:last').after('<tr><td>Nama</td><td>:</td><td><input type="text" name="w_name[]" /></td></tr>');
	});
});
</script>


<div class="row-fluid">
	<div class="span3" style="margin-left:-800px;">
	<h3>Tambah Log Kerja</h3>
	</div>
</div>
 <div class="row-fluid">
	
		<div class="span9">
				  <form class="form-horizontal" id="form1" name="form1" method="post" action="<?=site_url('juruteknik/brokenadd');?>">
				  
                  <div class="control-group">
				    <label class="control-label" for="con_id">Unit</label>
				    <div class="controls">
				     <select name="bl_unit" id="bl_unit">
					<option value="00">-- Sila pilih Unit --</option>
					<?php if($broken_log_unit) { foreach($broken_log_unit as $blu) { ?>
					<option value="<?=$blu->blu_code ?>"><?=$blu->blu_desc ?></option>
					<?php } } ?>
				      </select>
				    </div>
				  </div>
				    
				    <div class="control-group">
				    <label class="control-label" for="bl_settledate">Tarikh Siap</label>
				    <div class="controls">
				      <input type="text" class="datepicker" id="bl_settledate" name="bl_settledate" placeholder="Tarikh Siap">
				    </div>
				  </div>
		
			  
			  <label class="control-label" for="bl_repairstatus">Status</label>
			  <div class="control-group offset2">
			  <label class="radio" style="margin-left:20px;">
				  <input type="radio" name="bl_repairstatus" id="bl_repairstatus_0" value="1" checked>
				  Siap
				</label>
				<label class="radio" style="margin-left:20px;">
				  <input type="radio" name="bl_repairstatus" id="bl_repairstatus_1" value="2">
				  Sedang Dibaiki
				</label>
				</div>
                
                <div class="control-group">
				    <label class="control-label" for="bl_remarks">Perihal Kerosakan</label>
				    <div class="controls">
				       <textarea name="bl_remarks" id="bl_remarks" cols="45" rows="5" placeholder="Nyatakan perihal kerosakan"></textarea>
				    </div>
				  </div>

				  <div class="control-group">
				    <label class="control-label" for="bl_harga">Harga</label>
				    <div class="controls">
				      <input type="text" id="bl_harga" name="bl_harga" placeholder="Harga">
				    </div>
				  </div>
				  
				   <div class="control-group">
				    <label class="control-label" for="con_id">Kontraktor</label>
				    <div class="controls">
				     <select name="con_id" id="con_id">
					<option value="0">-- Sila pilih Kontraktor --</option>
					<?php if($contractor) { foreach($contractor as $c) { ?>
					<option value="<?=$c->c_id ?>"><?=$c->c_name ?></option>
					<?php } } ?>
				      </select>
				    </div>
				  </div>
				  
				   <div class="control-group">
				    <label class="control-label" for="v_id">No. Pendaftaran</label>
				    <div class="controls">
				     <select name="v_id" id="v_id">
					<option value="0">-- Sila pilih Kenderaan --</option>
					<?php if($vehicles) { foreach($vehicles as $v) { ?>
					<option value="<?=$v->v_id ?>"><?=$v->v_registrationno ?></option>
					<?php } } ?>
				      </select>
				    </div>
				  </div>
				  
				   <div class="control-group">
				    <label class="control-label" for="s_id">Daerah</label>
				    <div class="controls">
				      <select name="s_id" id="s_id">
					<option value="0">-- Sila pilih Daerah --</option>
					<?php if($state) { foreach($state as $s) { ?>
					<option value="<?=$s->s_id ?>"><?=$s->s_name ?></option>
					<?php } } ?>
				      </select>
				    </div>
				  </div>
				  
				  <div class="control-group">
				    <label class="control-label" for="f_id">Sumber Kewangan &amp; Jenis Pembaikan </label>
				    <div class="controls">
				   <?php if($finance) { $i=0; foreach($finance as $f) { ?>
					<tr>
					  <td><label>
					    <input type="radio" name="f_id" value="<?=$f->f_id; ?>" id="f_id_<?=$i++; ?>" <?php if($i==1) { echo "checked"; } ?> />
					    (<?=$f->f_code; ?>) <?=$f->f_desc; ?></label></td>
					</tr>
				      <?php } } ?>
				    </div>
				  </div>
                  
                  <div class="control-group">
				    <label class="control-label" for="jk_id">Jenis Kerja </label>
				    <div class="controls">
                    <select name="jk_id" id="jk_id">
					<option value="0">-- Sila pilih Jenis Kerja --</option>
					<?php if($jenis_kerja) { foreach($jenis_kerja as $jk) { ?>
					<option value="<?=$jk->jk_id ?>"><?=$jk->jk_desc ?></option>
					<?php } } ?>
				      </select>
				    </div>
				  </div>
				  
				  <div class="control-group">
				    <label class="control-label" for="bl_nodo">No. D/O </label>
				    <div class="controls">
				    <input type="text" name="bl_nodo" id="bl_nodo"/>
				    </div>
				  </div>
				  
				   <div class="control-group">
				    <label class="control-label" for="bl_perolehan">Perolehan </label>
				    <div class="controls">
                    <select name="pe_id" id="pe_id">
					<option value="0">-- Sila pilih Jenis Perolehan --</option>
					<?php if($perolehan) { foreach($perolehan as $pe) { ?>
					<option value="<?=$pe->pe_id ?>"><?=$pe->pe_desc ?></option>
					<?php } } ?>
				      </select>
				    </div>
				  </div>
				   
				   <div class="control-group">
				    <label class="control-label" for="bl_nosebutharga">No. Sebut Harga </label>
				    <div class="controls">
				   <input type="text" name="bl_nosebutharga" id="bl_nosebutharga" />
				    </div>
				  </div>
				   
				   <div class="control-group">
				    <label class="control-label" for="bl_nosebutharga">Pekerja </label>
				    <div class="controls">
				   <button type="button" id="tbl_add">Tambah Pekerja</button><br />
					<table border="0" cellspacing="0" cellpadding="0" id="tbl_1">
					  <tr>
					    <td>Nama</td>
					    <td>:</td>
					    <td><input type="text" name="w_name[]" /></td>
					  </tr>
				      </table>
				    </div>
				  </div>
				 
				  <div class="control-group">
				    <div class="controls">
				     
				      <button type="submit" class="btn">Simpan</button>
				        <button type="reset" class="btn">Padam</button>
				    </div>
				  </div>
				</form>
                 </div>
	</div><!-- end row fluid -->



<?php if($this->uri->segment(4)) { $broken_log = $this->uri->segment(5) ? $this->uri->segment(5) : 0; ?>
<script>alert('Tambah berjaya!');location.href='<?= site_url('juruteknik/broken/3/'.$broken_log);?>';</script>
<?php } ?>
