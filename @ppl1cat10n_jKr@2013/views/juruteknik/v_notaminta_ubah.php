<script type="text/javascript">
$(document).ready(function() {
	
	$("#tbl_add").click(function() {
		$('#tbl_1 tr:last').after('<tr><td>Perkara</td><td>:</td><td><textarea name="ser_desc[]" cols="" rows=""></textarea></td><td>&nbsp;</td><td>Harga</td><td>:</td><td><input type="text" name="ser_totalprice[]" value="0.00" /><input type="hidden" name="ser_id[]" value="0" /></td></tr>');
	});
	
	$("#tbl_add2").click(function() {
		$('#tbl_2 tr:last').after('<tr><td>Alat Ganti</td><td>:</td><td><input type="text" name="plo_name[]" /></td><td>&nbsp;</td><td>No. Alat Ganti</td><td>:</td><td><input type="text" name="plo_partno[]" /></td></tr><tr><td>Kuantiti</td><td>:</td><td><input type="text" name="plo_quantity[]" value="0" /></td><td>&nbsp;</td><td>Harga</td><td>:</td><td><input type="text" name="plo_totalprice[]" value="0.00" /></td></tr><tr><td colspan="7"><input type="hidden" name="plo_id[]" value="0" /><input type="hidden" name="plo_datetime[]" value="<?=date('Y-m-d H:i:s'); ?>" /><hr /></td></tr>');
	});
	
	$(".buang").click(function() {
		var idd = $(this).attr("item");
		$.get('<?=site_url('juruteknik/partdelete'); ?>/'+idd);
		$("#tr1_"+idd).remove();
		$("#tr2_"+idd).remove();
		$("#tr3_"+idd).remove();
	});
	
	$(".buang2").click(function() {
		var idd = $(this).attr("item");
		$.get('<?=site_url('juruteknik/servicedelete'); ?>/'+idd);
		$("#tr21_"+idd).remove();
	});
});
</script>


<div class="row-fluid">
	<div class="span3" style="margin-left:-800px;">
	<h3>Ubah Nota Minta</h3>
	</div>
</div>
 <div class="row-fluid">
	
		<div class="span9">
				  <form class="form-horizontal" id="form1" name="form1" method="post" action="<?=site_url('juruteknik/notamintaedit');?>">
                  
                  <input type="hidden" name="lo_id" id="lo_id" value="<?=$this->uri->segment(3); ?>" />
                  
                  <div class="control-group">
				    <label class="control-label" for="con_id">Tarikh Nota Minta</label>
				    <div class="controls">
                    	<?php if($this->uri->segment(3)) { ?>
                        	<?php
							$lo_createddate_temp = $broken_log[0]->lo_createddate;
							$lo_createddate = explode(" ", $lo_createddate_temp);
							?>
                    		<input type="date" name="lo_createddate" id="lo_createddate" value="<?=$lo_createddate[0]; ?>" />
                        <?php } else { ?>
                        	<input type="date" name="lo_createddate" id="lo_createddate" value="<?=date('Y-m-d')?>" />
                        <?php } ?>
                    </div>
                  </div>
                  
                  <div class="control-group">
				    <label class="control-label" for="con_id">Kenderaan Rosak</label>
				    <div class="controls">
                    
                    <?php if($this->uri->segment(3)) { ?>
                    		<input type="text" readonly="readonly" value="<?=$broken_log[0]->v_registrationno; ?>" name="v_registrationno" />
                    		<input type="hidden" value="<?=$broken_log[0]->bl_idx; ?>" name="bl_id" id="bl_id" />
                    <?php } else { ?>
                    		<select name="bl_id" id="bl_id">
                            <option value="0">-- Sila pilih kenderaan --</option>
                            <?php if($broken_log) { foreach($broken_log as $bl) { ?>
                            <option value="<?=$bl->bl_id; ?>"><?=$bl->v_registrationno; ?> 
                            (<?=$this->my_func->sqltodate($bl->bl_recorddate); ?>)</option>
                            <?php } } ?>
                              </select>          		
                    <?php } ?>
                      
                      <button type="button" class="btn lihatlog" url="<?=site_url('juruteknik/getLog'); ?>">Lihat Log</button>

<!-- start popup -->
<div id="toPopup5" class="toPopup">
	<div class="close"></div>
	<span class="ecs_tooltip">Tekan 'Esc' untuk tutup <span class="arrow"></span></span>
    <div id="popup_content"> <!--your content start-->  

<div id="loglihat"></div>

    </div> <!--your content end-->
</div> <!--toPopup end-->
<div class="loader"></div>
<div id="backgroundPopup"></div>
<!-- end popup -->
                      
				    </div>
				  </div>
                  
                  <div class="control-group">
				    <label class="control-label" for="bl_nosebutharga">Senarai Alat Ganti </label>
				    <div class="controls">
				   <button type="button" id="tbl_add2">Tambah Alat Ganti</button><br />
					<table border="0" cellspacing="0" cellpadding="0" id="tbl_2">
<?php if($part) { foreach($part as $pa) { ?>
					  <tr id="tr1_<?=$pa->plo_id; ?>">
					    <td>Alat Ganti</td>
					    <td>:</td>
					    <td><input type="text" name="plo_name[]" value="<?=$pa->plo_name; ?>" /></td>
                        <td>&nbsp;</td>
					    <td>No. Alat Ganti</td>
					    <td>:</td>
					    <td><input type="text" name="plo_partno[]" value="<?=$pa->plo_partno; ?>" /></td>
                        <td>
                        	<span style="cursor:pointer" class="buang" item="<?=$pa->plo_id; ?>">
                            	<img src="<?=base_url(); ?>/assets/images/gnome/PNG/32/Gnome-Process-Stop-32.png" />
                            </span>
                        </td>
                      </tr>
                      <tr id="tr2_<?=$pa->plo_id; ?>">
					    <td>Kuantiti</td>
					    <td>:</td>
					    <td><input type="text" name="plo_quantity[]" value="<?=$pa->plo_quantity; ?>" /></td>
                        <td>&nbsp;</td>
					    <td>Harga</td>
					    <td>:</td>
					    <td><input type="text" name="plo_totalprice[]" value="<?=$pa->plo_totalprice; ?>" /></td>
                        <td>&nbsp;</td>
					  </tr>
                      <tr id="tr3_<?=$pa->plo_id; ?>">
                      	<td colspan="7">
                        	<input type="hidden" name="plo_id[]" value="<?=$pa->plo_id; ?>" />
                            <input type="hidden" name="plo_datetime[]" value="<?=$pa->plo_datetime; ?>" />
                            <hr />
                        </td>
                        <td>&nbsp;</td>
                      </tr>
<?php } } else { ?>
					  <tr>
					    <td>Alat Ganti</td>
					    <td>:</td>
					    <td><input type="text" name="plo_name[]" /></td>
                        <td>&nbsp;</td>
					    <td>No. Alat Ganti</td>
					    <td>:</td>
					    <td><input type="text" name="plo_partno[]" /></td>
                      </tr>
                      <tr>
					    <td>Kuantiti</td>
					    <td>:</td>
					    <td><input type="text" name="plo_quantity[]" value="0" /></td>
                        <td>&nbsp;</td>
					    <td>Harga</td>
					    <td>:</td>
					    <td><input type="text" name="plo_totalprice[]" value="0.00" /></td>
					  </tr>
                      <tr>
                      	<td colspan="7">
                        	<input type="hidden" name="plo_id[]" value="0" />
                            <input type="hidden" name="plo_datetime[]" value="<?=date('Y-m-d H:i:s'); ?>" />
                            <hr />
                        </td>
                      </tr>
<?php } ?>
					</table>
				    </div>
				  </div>
                  
                  <div class="control-group">
				    <label class="control-label" for="con_id">Kontraktor</label>
				    <div class="controls">
                    
                    <?php if($this->uri->segment(3)) { ?>
                    	<input type="text" readonly="readonly" value="<?=$broken_log[0]->c_name; ?>" name="c_name" />
                    	<input type="hidden" value="<?=$broken_log[0]->c_id; ?>" name="c_id" id="c_id" />
                    <?php } else { ?>
                         <select name="c_id" id="c_id">
                        <option value="0">-- Sila pilih Kontraktor --</option>
                        <?php if($contractor) { foreach($contractor as $c) { ?>
                        <option value="<?=$c->c_id ?>"><?=$c->c_name ?></option>
                        <?php } } ?>
                          </select>
                    <?php } ?>
                      
				    </div>
				  </div>
				   
				   <div class="control-group">
				    <label class="control-label" for="bl_nosebutharga">Upah </label>
				    <div class="controls">
				   <button type="button" id="tbl_add">Tambah Upah</button><br />
					<table border="0" cellspacing="0" cellpadding="0" id="tbl_1">
<?php if($service) { foreach($service as $se) { ?>
					  <tr id="tr21_<?=$se->ser_id; ?>">
					    <td>Perkara</td>
					    <td>:</td>
					    <td><textarea name="ser_desc[]" cols="" rows=""><?=$se->ser_desc; ?></textarea></td>
                        <td>&nbsp;</td>
                        <td>Harga</td>
					    <td>:</td>
					    <td>
                        	<input type="text" name="ser_totalprice[]" value="<?=$se->ser_totalprice; ?>" />
                            <input type="hidden" name="ser_id[]" value="<?=$se->ser_id; ?>" />
                        </td>
                        <td>
                        	<span style="cursor:pointer" class="buang2" item="<?=$se->ser_id; ?>">
                            	<img src="<?=base_url(); ?>/assets/images/gnome/PNG/32/Gnome-Process-Stop-32.png" />
                            </span>
                        </td>
					  </tr>
<?php } } else { ?>
					  <tr>
					    <td>Perkara</td>
					    <td>:</td>
					    <td><textarea name="ser_desc[]" cols="" rows=""></textarea></td>
                        <td>&nbsp;</td>
                        <td>Harga</td>
					    <td>:</td>
					    <td>
                        	<input type="text" name="ser_totalprice[]" value="0.00" />
                            <input type="hidden" name="ser_id[]" value="0" />
                        </td>
					  </tr>
<?php } ?>
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




