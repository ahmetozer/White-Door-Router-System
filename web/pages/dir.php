<?php
$ustmenu ='

';
 header('Content-Type: text/html; charset=utf-8');
 include 'header.php';
?>


<main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
          <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" >

		  
		  
<?php
if(isset($_GET["l"])) {
    $konum = $_GET["l"];
    } else {
    $konum = '/urouter';
    }
$output = shell_exec("ls -lh $konum");
echo "<pre><font id='ifconfig'>$output</font></pre>";
?>



</div>
	</main>
	</div>
	
	</div>

<?php include 'footer.php';?> 