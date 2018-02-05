<pre>
<?php
$arp_scan = shell_exec('arp-scan --interface=eth0 --localnet');
$arp_scan = explode("\n", $arp_scan);
$matches;
foreach($arp_scan as $scan) {
	
	$matches = array();
	
	if(preg_match('/^([0-9\.]+)[[:space:]]+([0-9a-f:]+)[[:space:]]+(.+)$/', $scan, $matches) !== 1) {
		continue;
	}
	
	$ip = $matches[1];
	$mac = $matches[2];
	$desc = $matches[3];
	
	echo "Found device with mac address $mac ($desc) and ip $ip\n";
}
?>
</pre>