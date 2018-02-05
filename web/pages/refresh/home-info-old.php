<?php
 $defaultinterface0 = array();
exec("ip route | head -n1 | cut -d' ' -f 3", $defaultinterface0);
foreach($defaultinterface0 as $defaultinterface) {
}
?>

                <h3 style="font-size: 25px">info</h3>
                <ul>
                  <li>
                    <span style="font-size:16px;float: left;">İp Adress:</span> <span style="float: right;"><?php echo exec("ifconfig $defaultinterface | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}'"); ?></span>
					
                  </li>
                  <li>
                    <span style="font-size:16px;float: left;clear: left;">Call Usage:</span> <span style="float: right;"><?php echo exec("ifconfig $defaultinterface | grep 'RX bytes' | cut -d'(' -f2 | cut -d')' -f1"); ?> </span>
                  </li>
                  <li>
                    <span style="font-size:16px;float: left;clear: left;">Call start at:</span> <span style="float: right;"><?php

$fh = fopen('/urouter/logs/pppoe-connected-at.txt','r');
while ($line = fgets($fh)) {
  // <... Do your work with the line ...>
  echo($line);
}
fclose($fh);
?> </span>
                  </li>
                  <li>
                    <span style="font-size:16px;float: left;clear: left;">Uptime:</span> <span style="float: right;"><?php
					$str   = @file_get_contents('/proc/uptime');
$num   = floatval($str);
$secs  = fmod($num, 60); $num = intdiv($num, 60);
$mins  = $num % 60;      $num = intdiv($num, 60);
$hours = $num % 24;      $num = intdiv($num, 24);
$days  = $num;
echo "$days day $hours hour $mins min";
					?></span>
                  </li>
				</ul>