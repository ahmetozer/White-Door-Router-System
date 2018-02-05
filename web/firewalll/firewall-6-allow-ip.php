<?php

// configuration

$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$parts = parse_url($url);
parse_str($parts['query'], $query);
$file = '/urouter/uconf/firewall/firewall-6-allow-ip.urouter';

// check if form has been submitted
if (isset($_POST['text']))
{
    // save the text contents
    file_put_contents($file, $_POST['text']);
$fileuft8 = file_get_contents("$file");
$fileuft8 = str_replace("\r", "", $fileuft8);
file_put_contents("$file", $fileuft8);
exec("/urouter/uconfmaker/bin/urouter-firewall-on");
    // redirect to form again
    header(sprintf('Location: %s', $url));
    printf('<a href="%s">Moved</a>.', htmlspecialchars($url));
    exit();
}

// read the textfile
$text = file_get_contents($file);

?>
<!-- HTML form -->

<div id="headbuttons" class="headbuttons"> <?php
 header('Content-Type: text/html; charset=utf-8');
 include '../header.php';?> </div>
<form id="myForm" action="" method="post">
<div id="indexstyle">
<textarea id="ta" name="text"><?php echo htmlspecialchars($text) ?></textarea> 
</div>
<script src="/ace-builds/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
<script src="/ace-builds/textarea.js" type="text/javascript" charset="utf-8"></script>
<input type="submit" class="button button2" value="Kaydet"/>
<input type="reset" class="button button2" value="Geri al"/>
</form>