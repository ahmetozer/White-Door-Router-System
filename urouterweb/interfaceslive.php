<div id="headbuttons" class="headbuttons"> <?php
 header('Content-Type: text/html; charset=utf-8');
 include 'header.php';?> </div>

 <script src="/menu.js" type="text/javascript" charset="utf-8"></script>
<?php
  # This code will run if ?run=true is set.
$interfacesspeedlive = array();
exec("/urouter/uconfmaker/bin/urouter-tools webliveinterfacestatus", $interfacesspeedlive);
foreach($interfacesspeedlive as $interfacesspeedlive2) {
 echo "<pre><font id='exectop'>$interfacesspeedlive2</font></pre>";
}
?>