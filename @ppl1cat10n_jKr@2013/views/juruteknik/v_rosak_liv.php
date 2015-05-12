<?php if($broken_log) { $bll = $broken_log[0]; } else { redirect(site_url('juruteknik/broken')); } ?>

<script type="text/javascript">
$(document).ready(function() {
	$("#bl_nolo").prop('disabled', true);
	$("#bl_nolo").attr('placeholder', '');
	$("#bl_invoice").prop('disabled', true);
	$("#bl_invoice").attr('placeholder', '');
	$("#bl_voucher").prop('disabled', true);
	$("#bl_voucher").attr('placeholder', '');
	$("#bl_nolo_cbx").click(function() {
		var cek = $(this).is(':checked');
		if(cek === true) {
			$("#bl_nolo").prop('disabled', false);
			$("#bl_nolo").attr('placeholder', 'Sila isikan no. L.O.');
		} else {
			$("#bl_nolo").prop('disabled', true);
			$("#bl_nolo").attr('placeholder', '');
		}
	});
	$("#bl_invoice_cbx").click(function() {
		var cek = $(this).is(':checked');
		if(cek === true) {
			$("#bl_invoice").prop('disabled', false);
			$("#bl_invoice").attr('placeholder', 'Sila isikan no. invoice');
		} else {
			$("#bl_invoice").prop('disabled', true);
			$("#bl_invoice").attr('placeholder', '');
		}
	});
	$("#bl_voucher_cbx").click(function() {
		var cek = $(this).is(':checked');
		if(cek === true) {
			$("#bl_voucher").prop('disabled', false);
			$("#bl_voucher").attr('placeholder', 'Sila isikan no. vaucher');
		} else {
			$("#bl_voucher").prop('disabled', true);
			$("#bl_voucher").attr('placeholder', '');
		}
	});
});
</script>

<div class="row-fluid">
	<div class="span3" style="margin-left:-800px;">
	<h3>Kemaskini Log Kerja</h3>
	</div>
</div>

<div class="row-fluid">
	
		<div class="span9">
				  <form class="form-horizontal" id="form1" name="form1" method="post" action="<?=site_url('juruteknik/brokenliv');?>">
                  
                  <input type="hidden" name="bl_id" id="bl_id" value="<?=$bll->bl_id; ?>" />
                  
                  <div class="control-group">
				    <label class="control-label" for="bl_nolo"></label>
                    <div class="controls">
                    	<table>
                        	<tr>
                            	<td>Unit</td>
                                <td>:</td>
                                <td><?=$bll->bl_unit; ?></td>
                            </tr>
                            <tr>
                            	<td>Tarikh Rekod</td>
                                <td>:</td>
                                <td><?=$this->my_func->sqltodate($bll->bl_recorddate); ?></td>
                            </tr>
                            <tr>
                            	<td>Tarikh Siap</td>
                                <td>:</td>
                                <td><?=$this->my_func->sqltodate($bll->bl_settledate); ?></td>
                            </tr>
                            <tr>
                            	<td>Status Baiki</td>
                                <td>:</td>
                                <td><?=$this->my_func->getStatusBL($bll->bl_repairstatus); ?></td>
                            </tr>
                            <tr>
                            	<td>Harga</td>
                                <td>:</td>
                                <td>RM <?=$bll->bl_harga; ?></td>
                            </tr>
                            <tr>
                            	<td>Kontraktor</td>
                                <td>:</td>
                                <td><?=$bll->c_name; ?></td>
                            </tr>
                            <tr>
                            	<td>No. Pendaftaran</td>
                                <td>:</td>
                                <td><?=$bll->v_registrationno; ?></td>
                            </tr>
                            <tr>
                            	<td>Perihal Kerosakan</td>
                                <td>:</td>
                                <td><?=$bll->bl_remarks; ?></td>
                            </tr>
                            <tr>
                            	<td>Kod Peruntukan Kewangan</td>
                                <td>:</td>
                                <td><?=$bll->f_code; ?></td>
                            </tr>
                        </table>
				    </div>
				  </div>
                  
                  <div class="control-group">
				    <label class="control-label" for="bl_nolo">No. L.O. : </label>
				    <div class="controls">
                       <input type="text" name="bl_nolo" id="bl_nolo" value="<?=$bll->bl_nolo; ?>" />
                       <input type="checkbox" name="bl_nolo_cbx" id="bl_nolo_cbx" />
				    </div>
				  </div>
                  
                  <div class="control-group">
				    <label class="control-label" for="bl_invoice">No. Invoice : </label>
				    <div class="controls">
                       <input type="text" name="bl_invoice" id="bl_invoice" value="<?=$bll->bl_invoice; ?>" />
                       <input type="checkbox" name="bl_invoice_cbx" id="bl_invoice_cbx" />
				    </div>
				  </div>
                  
                  <div class="control-group">
				    <label class="control-label" for="bl_voucher">No. Vaucher : </label>
				    <div class="controls">
                       <input type="text" name="bl_voucher" id="bl_voucher" value="<?=$bll->bl_voucher; ?>" />
                       <input type="checkbox" name="bl_voucher_cbx" id="bl_voucher_cbx" />
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
         
</div>

<?php if($this->uri->segment(4) == 2) { ?>
<script>alert('Ubah berjaya!');location.href='<?= site_url('juruteknik/broken');?>';</script>
<?php } ?>