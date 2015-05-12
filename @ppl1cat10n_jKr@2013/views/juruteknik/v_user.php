<?php $p = $profil[0]; ?>

<script type="text/javascript">
$(document).ready(function() {
	$("#u_password_old").prop('disabled', true);
	$("#u_password_old").prop('value', '');
	$("#u_password_old").attr('placeholder', '');
	$("#u_password_new").prop('disabled', true);
	$("#u_password_new").prop('value', '');
	$("#u_password_new").attr('placeholder', '');
	$("#ch_pwd2").click(function() {
		var cek = $("#ch_pwd2").is(':checked');
		if(cek === true) {
			$("#u_password_old").prop('disabled', false);
			$("#u_password_old").attr('placeholder', 'Sila isikan kata laluan lama');
			$("#u_password_new").prop('disabled', false);
			$("#u_password_new").attr('placeholder', 'Sila isikan kata laluan baru');
		} else {
			$("#u_password_old").prop('disabled', true);
			$("#u_password_old").prop('value', '');
			$("#u_password_old").attr('placeholder', '');
			$("#u_password_new").prop('disabled', true);
			$("#u_password_new").prop('value', '');
			$("#u_password_new").attr('placeholder', '');
		}
	});
});
</script>

<div class="row-fluid">
	<div class="span3" style="margin-left:-800px;">
	<h3>Profil Diri</h3>
	</div>
</div>
 <div class="row-fluid">
	
    	<form class="form-horizontal" id="form1" name="form1" method="post" action="<?=site_url('juruteknik/profiledit');?>">
        
        <input type="hidden" name="u_id" id="u_id" value="<?=$p->u_id; ?>" />
        
		<div class="span12">
                  
                  <div class="control-group">
				    <label class="control-label" for="con_id">Name Penuh : </label>
				    <div class="controls">
                      <input type="text" name="u_fullname" id="u_fullname" value="<?=$p->u_fullname; ?>" />
				    </div>
				  </div>
                  
                  <div class="control-group">
				    <label class="control-label" for="con_id">No. Staf : </label>
				    <div class="controls">
                      <input type="text" name="u_staffno" id="u_staffno" value="<?=$p->u_staffno; ?>" />
				    </div>
				  </div>
                  
                  <div class="control-group">
				    <label class="control-label" for="con_id">No. K/P : </label>
				    <div class="controls">
                      <input type="text" name="u_ic" id="u_ic" value="<?=$p->u_ic; ?>" />
				    </div>
				  </div>
                  
                  <div class="control-group">
				    <label class="control-label" for="con_id">No. Telefon : </label>
				    <div class="controls">
                      <input type="text" name="u_phone" id="u_phone" value="<?=$p->u_phone; ?>" />
				    </div>
				  </div>
                  
                  <div class="control-group">
				    <label class="control-label" for="con_id">Emel : </label>
				    <div class="controls">
                      <input type="text" name="u_email" id="u_email" value="<?=$p->u_email; ?>" />
				    </div>
				  </div>
                  
                  <div class="control-group">
				    <label class="control-label" for="con_id">Tukar Kata Laluan </label>
				    <div class="controls">
                      <input type="checkbox" name="ch_pwd2" id="ch_pwd2" />
				    </div>
				  </div>
                  
                  <div class="control-group">
				    <label class="control-label" for="con_id">Kata Laluan Lama : </label>
				    <div class="controls">
                      <input type="password" name="u_password_old" id="u_password_old" value="" />
				    </div>
				  </div>
                  
                  <div class="control-group">
				    <label class="control-label" for="con_id">Kata Laluan Baru : </label>
				    <div class="controls">
                      <input type="password" name="u_password_new" id="u_password_new" value="" />
				    </div>
				  </div>
                  
                  <div class="control-group">
				    <div class="controls">
				     
				      <button type="submit" class="btn">Simpan</button>
				        <button type="reset" class="btn">Padam</button>
				    </div>
				  </div>
				
         </div>
         </form>
	</div><!-- end row fluid -->
    
<?php if($this->session->flashdata('msg')) { ?>
	<script>alert('<?=$this->session->flashdata('msg'); ?>');</script>
<?php } ?>