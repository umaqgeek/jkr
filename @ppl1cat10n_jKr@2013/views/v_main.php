<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistem Pengurusan Kenderaan CKM Melaka</title>
<script language="javascript">
 var base_url = "<?=base_url()?>"
</script>
<script language="javascript" src="<?=base_url()?>assets/grocery_crud/js/jquery-1.8.2.js"></script>
<script language="javascript" src="<?=base_url()?>js/jquery-1.9.1.js"></script>
<link href="<?=base_url()?>bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
       
        <link href="<?=base_url()?>bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="<?=base_url()?>js/vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="<?=base_url()?>assets/styles.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
	
<script language="javascript" src="<?=base_url()?>js/common.js"></script>

<link rel="stylesheet" href="<?=base_url()?>css/jquery-ui.css" />
<script src="<?=base_url()?>js/jquery-ui.js"></script>
        <script src="<?=base_url()?>js/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	
<script type="text/javascript" src="<?=base_url()?>/js/popup.js"></script>
<?php $this->load->view('header/v_popupcss','') ?>


<script>
$(function() {
	$( ".datepicker" ).datepicker({ 
		dateFormat: "dd/mm/yy" 
	});
});

function ask(q) {
	return confirm(q);
}
</script>

<script type="text/javascript">
function kuarnm() {
	$(document).ready(function() {
		$(".getNM").load("<?=site_url('jurutera/getNotaMintaCount'); ?>");
	});
	setTimeout("kuarnm()", 500);
}
kuarnm();
</script>

<?php
	if(isset($head_content))
	{
		echo $head_content;
	}
?>
</head>

<body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    
                    
                    <?=$menu_title?>
                    
                    
                    <div class="nav-collapse collapse">
                    
                    
                    
                        <?=$menu_user?>
                        
                        
                        
                        <ul class="nav">
                            <!--<li class="active">
                                <a href="#">Dashboard</a>
                            </li>
                            
			    <!--top menu juruteknik -->
			    <?=$menu_content?>
			    <!-- end topmenu -->
			    <!--
					<li>
                                <a href="senarai_inventori.php">Inventori</a>
                            </li>
                            <li>
                                <a href="#">Kerosakan</a>
                            </li>
                              <li>
                                <a href="#">Nota Minta</a>
                            </li>
                            
                             <li>
                                <a href="#">Print Nota Minta</a>
                            </li>
                            <li>
                                <a href="#">Kontraktor</a>
                            </li>-->
                            
                           
                               
                           
                            
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
               <!-- <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li class="active">
                            <a href="index.html"><i class="icon-chevron-right"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="senarai_inventori.php"><i class="icon-chevron-right"></i> Inventori</a>
                        </li>
                        <li>
                            <a href="stats.html"><i class="icon-chevron-right"></i> Kerosakan</a>
                        </li>
                        <li>
                            <a href="buttons.html"><i class="icon-chevron-right"></i> Nota Minta</a>
                        </li>
                        <li>
                            <a href="interface.html"><i class="icon-chevron-right"></i> Print Nota Minta</a>
                        </li>
                         <li>
                            <a href="interface.html"><i class="icon-chevron-right"></i> Print Nota Minta</a>
                        </li>
                         <li>
                            <a href="interface.html"><i class="icon-chevron-right"></i> Kontraktor</a>
                        </li>
                        
                    </ul>
                </div>-->
                
                <!--/span-->
                <div class="span9" id="content">
                    <div class="row-fluid">
          
                        	
                    	</div>
                    
                    
                </div>
                
                <!-- main menu -->
                 <div class="row-fluid">
                <!-- start v_home juruteknik -->
		<?=$main_content?>
		<!-- end v_home -->
                 </div>
                <!-- end main menu -->
                
            </div>
            <hr>
           <!-- <footer>
                <p>&copy; Tuffah Informatics 2013</p>
            </footer>-->
        </div>
        <!--/.fluid-container-->
      
        <script src="<?=base_url()?>bootstrap/js/bootstrap.min.js"></script>
        <script src="<?=base_url()?>js/vendors/easypiechart/jquery.easy-pie-chart.js"></script>
        <script src="<?=base_url()?>assets/scripts.js"></script>
        <script>
        $(function() {
            // Easy pie charts
            $('.chart').easyPieChart({animate: 1000});
        });
        </script>
    </body>

<!--<body>
<div id="container">
    <div id="header">header</div>
    <div id="contentleft" style="visibility:inherit"><?php /* ?><?=$menu_content?><?php */ ?></div>
    <div id="contentright" style="position:relative; height:100%"><?php /* ?><?=$main_content?><?php */ ?></div>
    <div id="footer"></div>
</div>
</body>-->
</html>