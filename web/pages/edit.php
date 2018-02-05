<?php
$file = $_GET['file'];

if (file_exists($file)) {

	// configuration

	$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$parts = parse_url($url);
	parse_str($parts['query'], $query);
	

	// check if form has been submitted
	if (isset($_POST['text']))
	{
		// save the text contents
	file_put_contents($file, $_POST['text']);
	$fileuft8 = file_get_contents("$file");
	$fileuft8 = str_replace("\r", "", $fileuft8);
	file_put_contents("$file", $fileuft8);

		// redirect to form again
		header(sprintf('Location: %s', $url));
		printf('<a href="%s">Moved</a>.', htmlspecialchars($url));
		exit();
	}

	// read the textfile
	$text = file_get_contents($file);
} else {
    $text = "File '$file' Not found !!! 
	#UROUTER
	";
}
?>

<?php
$ustmenu ='
<input type="submit" form="myForm" class="mdl-menu__item" value="kaydet"/>
';
 header('Content-Type: text/html; charset=utf-8');
 include 'header.php';
?>
<main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
          <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" >
<style>
#ta {
display: flex;
position:sticky;

top: 0;
left: 0;
right: 0;
bottom: 0;
height: 100%;
width: 100%;
}

</style>
<div style='width: 100%;'>

<form id="myForm" action="" method="post">
<div style='width: 100%; height: 70%'>
<textarea id="ta" name="text" charset="utf-8" style='width: 100%;height: 100%;'><?php echo htmlspecialchars($text) ?></textarea> 
</div>
<script src="/ace-builds/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
<script src="/ace-builds/textarea.js" type="text/javascript" charset="utf-8"></script>
</form>







</div>
	</main>
	</div>
	
	</div>

<?php include 'footer.php';?> 
