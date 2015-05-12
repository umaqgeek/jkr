<script type="text/javascript">
$(document).ready(function() {
	
	$("#tbl_add").click(function() {
		$('#tbl_1 tr:last').after('<tr><td>Perkara</td><td>:</td><td><textarea name="ser_desc[]" cols="" rows=""></textarea></td><td>&nbsp;</td><td>Harga</td><td>:</td><td><input type="text" name="ser_totalprice[]" value="0.00" /></td></tr>');
	});
	
	$("#tbl_add2").click(function() {
		$('#tbl_2 tr:last').after('<tr><td>Alat Ganti</td><td>:</td><td><input type="text" name="plo_name[]" /></td><td>&nbsp;</td><td>No. Alat Ganti</td><td>:</td><td><input type="text" name="plo_partno[]" /></td></tr><tr><td>Kuantiti</td><td>:</td><td><input type="text" name="plo_quantity[]" value="0" /></td><td>&nbsp;</td><td>Harga</td><td>:</td><td><input type="text" name="plo_totalprice[]" value="0.00" /></td></tr><tr><td colspan="7"><hr /></td></tr>');
	});
});
</script>


<div class="row-fluid">
	<div class="span3" style="margin-left:-800px;">
	<h3>Tambah Nota Minta</h3>
	</div>
</div>
 <div class="row-fluid">
	<?php //print_r($broken_log[0]); die(); ?>
		<div class="span9">
				  <form class="form-horizontal" id="form1" name="form1" method="post" action="<?=site_url('juruteknik/notamintaadd');?>">
                  
                  <div class="control-group">
				    <label class="control-label" for="con_id">Kenderaan Rosak</label>
				    <div class="controls">
                    	<input type="date" name="lo_createddate" value="<?=date('Y-m-d')?>" />
                    </div>
                  </div>
                  
                  <div class="control-group">
				    <label class="control-label" for="con_id">Kenderaan Rosak</label>
				    <div class="controls">
                    
                    <?php if($this->uri->segment(4)) { ?>
                    		<input type="text" readonly="readonly" value="<?=$broken_log[0]->v_registrationno; ?>" name="v_registrationno" />
                    		<input type="hidden" value="<?=$broken_log[0]->bl_idx; ?>" name="bl_id" id="bl_id" />
                    <?php } else { ?>
                    		<select name="bl_id" id="bl_id">
                            <option value="0">-- Sila pilih kenderaan --</option>
                            <?php if($broken_log) { foreach($broken_log as $bl) { ?>
								<?php if($this->m_letter_order->is_brokenlog_exist($bl->bl_id)) { ?>
                                <option value="<?=$bl->bl_id; ?>"><?=$bl->v_registrationno; ?> 
                                (<?=$this->my_func->sqltodate($bl->bl_recorddate); ?>)</option>
                                <?php } ?>
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
                      	<td colspan="7"><hr /></td>
                      </tr>
					</table>
				    </div>
				  </div>
                  
                  <!--<div class="control-group">
				    <label class="control-label" for="con_id">Kontraktor</label>
				    <div class="controls">
                    
                    <?php if($this->uri->segment(4)) { ?>
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
				  </div>-->
				   
				   <div class="control-group">
				    <label class="control-label" for="bl_nosebutharga">Upah </label>
				    <div class="controls">
				   <button type="button" id="tbl_add">Tambah Upah</button><br />
					<table border="0" cellspacing="0" cellpadding="0" id="tbl_1">
					  <tr>
					    <td>Perkara</td>
					    <td>:</td>
					    <td><textarea name="ser_desc[]" cols="" rows=""></textarea></td>
                        <td>&nbsp;</td>
                        <td>Harga</td>
					    <td>:</td>
					    <td><input type="text" name="ser_totalprice[]" value="0.00" /></td>
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




