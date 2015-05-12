
 <link href="<?=base_url()?>bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?=base_url()?>bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="<?=base_url()?>assets/styles.css" rel="stylesheet" media="screen">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="<?=base_url()?>js/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <title>Sistem Pengurusan Kenderaan CKM Melaka</title><body id="login">
    <div class="container">
<div class="row-fluid">
	<div class="span12">
		<div class="row-fluid">
			<?php
			if($this->session->flashdata('action_msg'))
	{
		$action_msg = $this->session->flashdata('action_msg');
		?>
		<div class="alert alert-error">
			<?=$action_msg?>
		</div>
		<?php
	}else
		$action_msg = "";
		?>
		</div>
	</div>
  <div class="span12">
    <div class="row-fluid">
      <div class="span6 offset3 form-signin-header" style="background: none; height:100px; " >
        <div class="row-fluid">
          <div class="span3">
            <img src="<?=base_url()?>assets/images/logo.png" style="height:80px;"/>
          </div>
          <div class="span6">
            <span align="center"><h4>Sistem Pengurusan Kenderaan <br/>CKM Melaka</h4></span>
          </div>
          <div class="span3">
            <img src="<?=base_url()?>assets/images/jkr.png" style="height:70px;"/>

          </div>
        </div>

      </div>
    </div>
    <?php
    if(isset($_POST['signin']))
	{
		$name=$_POST['email'];
		if($name=="juruteknik@gmail.com"){
			header( 'Location: http://localhost/jkrmockup/dashboard_juruteknik.php' );
		}
		else {
			header( 'Location: http://localhost/jkrmockup/dashboard_jurutera.php' );
		}
	}
    ?>
      <?php
	$att_label = array('style'=>'cursor:pointer;');
	$attributes = array('class' => 'span6 offset3 form-signin','style'=>'background:none');
	
	
	echo form_open('login/do_login',$attributes);
	//$row[] = array(array('data' => $action_msg, 'style' => 'color:red', 'colspan' => 3));
	$row[] = array(
				  form_label('No. K/P.','username',$att_label),
				  ':',
				  form_input(
							 array(
								   'type'=>'text',
								   'name'=>'username',
								   'id'=>'username'
								   )
							 )
				  );
	$row[] = array(
			  form_label('Kata Laluan','password',$att_label),
			  ':',
			  form_input(
						 array(
							   'type'=>'password',
							   'name'=>'password',
							   'id'=>'password'
							   
							   )
						 )
			  );
	
	$row[] = array(
				   form_button(array('name'=>'submit','type'=>'submit','value'=>'Login','content'=>'Log Masuk','class'=>'btn btn-large btn-primary')),
				   '',
				    form_button(array('name'=>'submit','type'=>'reset','value'=>'true','content'=>'Set Semula','class'=>'btn btn-large'))
				   );
	
	echo $this->table->generate($row);
	echo form_close();
?>
      </div>
</div>
    </div> <!-- /container -->
   <script src="<?=base_url()?>js/jquery-ui.js"></script>
    <script src="<?=base_url()?>bootstrap/js/bootstrap.min.js"></script>
  </body>
