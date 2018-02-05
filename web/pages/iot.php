<?php
 header('Content-Type: text/html; charset=utf-8');
 include './header.php';

 ?>
 <script language="javascript" type="text/javascript">
setInterval(function(){
$( "#iott" ).load( "/nodemcu" );
}, 1000);
</script>
 <main class="mdl-layout__content mdl-color--grey-100">
    <div class="mdl-grid demo-content">
        <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" style="sheight:90vh;">
			
			<div style="margin-top: 10px; width: 100%;" class="mdl-layout-title">
			
	<div class="typo-styles__demo mdl-typography--display-3" style="text-align: center;">IOT System</div>
			
<div id="iott">
<?php  print file_get_contents("http://10.0.0.216/");  ?>
</div>
			</div>
		</div>
	</div>
</main>
 
 
 
 
 
 
 
 
 
 
 
 
 
 <?php include './footer.php';?> 