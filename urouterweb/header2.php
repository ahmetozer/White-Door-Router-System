<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="/main.css">
<title>Urouter sistemi</title>
<body>

<div class="topnav" id="myTopnav">
  <a href="/" >Home</a>
  <a onclick="openNav()" href="#">Firewall</a>
		<a href="/dhcp.php">DHCP</a>
		<a href="/ddns.php">DDNS</a>
		<a href="/dns-server.php">DNS</a>
		<a href="/ppp.php">PPPOE</a>
		<a href="/tunnelbroker.php">Tunnel Broker</a>
		<a href="/torrent.php">Torrent</a>
		<a href="/system-info.php">Sistem Durumu</a>
		<a onclick="openNav2()"href="#">Sistem Dosyaları</a>

		<!-Responsive menü için ->
		 <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>



<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="/firewall/index.php">Firewall</a>
      <a href="/firewall/firewall-4-allow-ip.php">ipv4 izin verilen ipler</a>
      <a href="/firewall/firewall-4-allow-port.php">ipv4 izin verilen portlar</a>
	  <a href="/firewall/firewall-4-block-ip.php">ipv4 engellenen ipler</a>
	  <a href="/firewall/firewall-4-port-forward.php">ipv4 port yönlendirme</a>
	  <a href="/firewall/firewall-6-allow-ip.php">ipv6 izin verilen ipler</a>
	  <a href="/firewall/firewall-6-block-ip.php">ipv6 engellenen ipler</a>
	  <a href="/firewall/firewall-custom-settings.php">özel ayarlar</a>
</div>

<div id="mySidenav2" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav2()">&times;</a>
  	  <a href="/php-runs.php?ifconfig=true">ifconfig</a>
  	  <a href="/php-runs.php?top=true">Top</a>
  	  <a href="/interfaceslive.php">Live Bandwith</a>
      <a href="/etc/cron.php">Crontab</a>
      <a href="/etc/network/interfaces.php">Interfaces</a>
      <a href="/etc/ppp/peers.php">Provider</a>
      <a href="/etc/pulse/client.php">Pulse</a>
	  <a href="/webconsole.php">console</a>
      <a href="/php-runs.php?arp=true">Arp</a>
	  <a href="/syschecker/pings.php">Sys Pings</a>
	  <a href="/syschecker/websites.php">Sys Websites</a>
	  <a href="/syschecker/services.php">Sys Services</a>
	  

</div>
