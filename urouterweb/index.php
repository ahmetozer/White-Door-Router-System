<?php
/* Bulunulan dizinde başka bir sayfaya yönlendirelim */
$konak  = $_SERVER['HTTP_HOST'];
$konum2 = $_SERVER['REQUEST_URI'];
#$yol   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
#$ek = 'sayfam.php';
#header("Location: https://$konak$yol/$ek");
#include "$yol.php";
$konum = strtok($konum2, '?');

$path_parts = pathinfo($_SERVER['REQUEST_URI']);
$dirname = $path_parts['dirname'];
$basename = $path_parts['basename'];
$extension = $path_parts['extension'];
$filename = $path_parts['filename'];// PHP 5.2.0'dan beri.
#echo "$konum";

if ( "$konak" == "10.0.0.5:1453" || "$konak" == "10.0.0.5:809" || "$konak" == "212.154.12.48:61453" || "$konak" == "212.154.12.48" || "$konak" == "router.ahmetozer.org" ) {
if ( $extension == "woff2" || $extension == "css" || $extension == "js" || $extension == "min.js") {
header('Expires: '.gmdate('D, d M Y H:i:s \G\M\T', time() + (60 * 60)));

echo file_get_contents(substr($konum, 1));
exit;
}
} else {
	echo "<title>Router - Dijitaller.net</title>
	<div style='center;margin: 20%;'>
	<h1 style='color: red; text-align:'> '$konak' Bilinmeyen Ad
	</br>'$konak' Unknown Domain
	</br> <a href='https://dijitaller.net'>dijitaller.net</a></h1>
	</div>";
	exit;
}

if ( $konum == "/" ) {
	include "pages/home.php";
    exit;
}
if ( $konum == "/404" ) {
	echo "<title>Router - Dijitaller.net</title>
	<div style='center;margin: 20%;'>
	<h1 style='color: red; text-align:'> '$konak' Bilinmeyen Ad
	</br>'$konak' Unknown Domain
	</br> <a href='https://dijitaller.net'>dijitaller.net</a></h1>
	</div>";
    exit;
}
if (file_exists("pages$konum.php")) {
    include "pages$konum.php";
	exit;
}

if ( $konum == "/nodemcu" ) {
	print file_get_contents("http://10.0.0.216/");
	exit;
}

http_response_code(404);
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<title>Router - Dijitaller.net</title>
<style>
body
{
    position: fixed;
    overflow: hidden;
    width: 100%;
}
</style>
	<div style='center;margin: 20%;'>
	<h1 style='color: red; text-align:'> '$konak' Error 404
	</br> Dijitaller.net Router System V0.80
	</br> <a href='https://dijitaller.net'>dijitaller.net</a>
	</br><a href='javascript:history.back()'>Go Back</a>
	</br><a href='/'>Home Page</a>
	</h1>
	</div>";
?>
