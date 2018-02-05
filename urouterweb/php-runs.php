<div id="headbuttons" class="headbuttons"> <?php
 header('Content-Type: text/html; charset=utf-8');
 include 'header.php';?> </div>
 <script src="/menu.js" type="text/javascript" charset="utf-8"></script>
<?php

if ($_GET['urouter-cloudflare-update']) {
  # This code will run if ?run=true is set.
  exec("/urouter/uconfmaker/bin/urouter-cloudflare-update");
}

if ($_GET['urouter-create-shortcut']) {
  # This code will run if ?run=true is set.
  exec("/urouter/uconfmaker/bin/urouter-create-shortcut");
}

if ($_GET['urouter-dhcpd-releases']) {
  # This code will run if ?run=true is set.
$out = array();
exec("/urouter/uconfmaker/bin/urouter-dhcpd-releases", $out);
foreach($out as $line) {
 echo "<pre><font id='exectop'>$line</font></pre>";
}
}

if ($_GET['urouter-duckdns']) {
  # This code will run if ?run=true is set.
  exec("/urouter/uconfmaker/bin/urouter-duckdns");
}

if ($_GET['urouter-firewall-on']) {
  # This code will run if ?run=true is set.
  exec("/urouter/uconfmaker/bin/urouter-firewall-on");
}

if ($_GET['urouter-firewall-off']) {
  # This code will run if ?run=true is set.
  exec("/urouter/uconfmaker/bin/urouter-firewall-off");
}


if ($_GET['urouter-tunnelbroker']) {
  # This code will run if ?run=true is set.
  exec("/urouter/uconfmaker/bin/urouter-tunnelbroker");
  exec("/urouter/uconfmaker/bin/urouter-tunnelbroker-u");
}

if ($_GET['ifconfig']) {
  # This code will run if ?run=true is set.
$output = shell_exec('ifconfig');
echo "<pre><font id='exectop'>$output</font></pre>";
}

if ($_GET['arp']) {
  # This code will run if ?run=true is set.
$out2 = array();
exec("/urouter/uconfmaker/bin/urouter-tools arp", $out2);
foreach($out2 as $output2) {
 echo "<pre><font id='exectop'>$output2</font></pre>";
}
}

if ($_GET['top']) {
  # This code will run if ?run=true is set.
$output3 = shell_exec('top -b -n 1');
echo "<pre><font id='exectop'>$output3</font></pre>";
}

if ($_GET['lsdisk']) {
  # This code will run if ?run=true is set.
$output4 =  shell_exec("/urouter/uconfmaker/bin/urouter-tools lsdisk");
echo "<pre><font id='exectop'>Disk Name &nbsp;&nbsp;Disk system loc </font></pre>";
echo "<pre><font id='exectop'>$output4</font></pre>";

}

if ($_GET['reboot']) {
  # This code will run if ?run=true is set.
  exec("reboot");
}

if ($_GET['run']) {
  # This code will run if ?run=true is set.
  exec("/urouter/uconfmaker/bin/");
}


?>