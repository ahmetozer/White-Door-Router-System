<?php
if (isset($_REQUEST["netmall"])) {
system("vnstat -i ".$_REQUEST["netmall"]." --oneline | cut -d';' -f11");
}
if (isset($_REQUEST["netmes"])) {
system("vnstat -i ".$_REQUEST["netmes"]." --oneline | cut -d';' -f12");
}
if (isset($_REQUEST["netmdown"])) {
system("vnstat -i ".$_REQUEST["netmdown"]." --oneline | cut -d';' -f9");
}
if (isset($_REQUEST["netddown"])) {
system("vnstat -i ".$_REQUEST["netddown"]." --oneline | cut -d';' -f4");
}
if (isset($_REQUEST["netmup"])) {
system("vnstat -i ".$_REQUEST["netmup"]." --oneline | cut -d';' -f10");
}
if (isset($_REQUEST["netdup"])) {
system("vnstat -i ".$_REQUEST["netdup"]." --oneline | cut -d';' -f5");
}

if (isset($_REQUEST["netsupdown"])) {
$startdown = file_get_contents('/sys/class/net/'.$_REQUEST["netsupdown"].'/statistics/rx_bytes');
$startup = file_get_contents('/sys/class/net/'.$_REQUEST["netsupdown"].'/statistics/tx_bytes');
usleep(500000);
$enddown = file_get_contents('/sys/class/net/'.$_REQUEST["netsupdown"].'/statistics/rx_bytes');
$endup = file_get_contents('/sys/class/net/'.$_REQUEST["netsupdown"].'/statistics/tx_bytes');
$sonucdown = ($enddown - $startdown) * 16;
$sonucup = ($endup - $startup) * 16;
$sonuc = $sonucdown + $sonucup;
echo $sonuc;
}

if (isset($_REQUEST["netsdown"])) {
$start = file_get_contents('/sys/class/net/'.$_REQUEST["netsdown"].'/statistics/rx_bytes');
usleep(500000);
$end = file_get_contents('/sys/class/net/'.$_REQUEST["netsdown"].'/statistics/rx_bytes');
$sonuc = ($end - $start) * 16;
echo $sonuc;
}

if (isset($_REQUEST["netsup"])) {
$start = file_get_contents('/sys/class/net/'.$_REQUEST["netsup"].'/statistics/tx_bytes');
usleep(500000);
$end = file_get_contents('/sys/class/net/'.$_REQUEST["netsup"].'/statistics/tx_bytes');
$sonuc = ($end - $start) * 16;
echo $sonuc;
}



if (isset($_REQUEST["system"])) {
function sistem($istek) {
	$sonuc = array(
	"ac-voltage" => file_get_contents('/sys/devices/platform/soc@01c00000/1c2ac00.i2c/i2c-0/0-0034/ac/voltage'),
	"ac-amperage" => file_get_contents('/sys/devices/platform/soc@01c00000/1c2ac00.i2c/i2c-0/0-0034/ac/amperage'),
	"ac-watt" => file_get_contents('/sys/devices/platform/soc@01c00000/1c2ac00.i2c/i2c-0/0-0034/ac/voltage') * file_get_contents('/sys/devices/platform/soc@01c00000/1c2ac00.i2c/i2c-0/0-0034/ac/amperage') / 1000000000000,
	"pmu-voltage" => file_get_contents('/sys/devices/platform/soc@01c00000/1c2ac00.i2c/i2c-0/0-0034/pmu/voltage'),
	"pmu-temp" => file_get_contents('/sys/devices/platform/soc@01c00000/1c2ac00.i2c/i2c-0/0-0034/pmu/temp') / 1000,
	"cpu-temp" => file_get_contents('/sys/devices/virtual/thermal/thermal_zone0/temp') / 1000,
	);
	echo $sonuc[$istek];
	//$donus = trim(preg_replace('/\s\s+/', ' ', $donus));
	//return $donus;
}
sistem($_REQUEST["system"]);
}

if (isset($_REQUEST["net"])) {
function net($netinterface) {
echo file_get_contents('/sys/class/net/'. $netinterface);
}
net($_REQUEST["net"]);
}

if (isset($_REQUEST["uptime"])){
	$str   = @file_get_contents('/proc/uptime');
$num   = floatval($str);
$secs  = fmod($num, 60); $num = intdiv($num, 60);
$mins  = $num % 60;      $num = intdiv($num, 60);
$hours = $num % 24;      $num = intdiv($num, 24);
$days  = $num;
echo "$days day $hours hour $mins min";
}

if (isset($_REQUEST["calltime"])){
	$fh = fopen('/urouter/logs/pppoe-connected-at.txt','r');
while ($line = fgets($fh)) {
  // <... Do your work with the line ...>
  echo($line);
}
fclose($fh);
}
if (isset($_REQUEST["wanip"])){
$defaultinterface0 = array();
exec("ip route | head -n1 | cut -d' ' -f 3", $defaultinterface0);
foreach($defaultinterface0 as $defaultinterface) {
 echo exec("ifconfig $defaultinterface | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}'");
}

}

if (isset($_REQUEST["cpuusage"])){
$exec_loads = sys_getloadavg();
$exec_cores = trim(shell_exec("grep -P '^processor' /proc/cpuinfo|wc -l"));
echo round($exec_loads[1]/($exec_cores + 1)*100, 0) . '';
}

if (isset($_REQUEST["diskusage"])){
echo exec("df / | tail -n +2 | awk '{print $5}' |sed 's/%//'");
}

if (isset($_REQUEST["memusage"])){
$exec_free = explode("\n", trim(shell_exec('free')));
$get_mem = preg_split("/[\s]+/", $exec_free[1]);
echo round($get_mem[2]/$get_mem[1]*100, 0) . '';
}

?>