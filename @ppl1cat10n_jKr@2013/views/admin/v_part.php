<?php 
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
 
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
 
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<br />
<div class="row-fluid">
	<div class="span3" style="margin-left:-800px;">
	<h3>Pengurusan Alat Ganti</h3>
	</div>
</div>

<br /><br />
<?=$output; ?>