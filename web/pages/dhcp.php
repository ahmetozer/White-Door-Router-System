<?php
    if (empty($_POST["subnet4uconf"])) {
    include '/urouter/urouterweb/php-saves/dhcp.php';
  } else {

$dhcpserver = array (
    'subnet4uconf' => $_POST['subnet4uconf'], 
    'dhcprangeone4uconf' => $_POST['dhcprangeone4uconf'], 
    'dhcpbroadcast4uconf' => $_POST['dhcpbroadcast4uconf'],
	'netmask4uconf' => $_POST['netmask4uconf'],
	'dhcprangetwo4uconf' => $_POST['dhcprangetwo4uconf'],
	'routers4uconf' => $_POST['routers4uconf'],
	'leasetime4uconf' => $_POST['leasetime4uconf'],
	'domainname4uconf' => $_POST['domainname4uconf'],
	'dhcpdnsone4uconf' => $_POST['dhcpdnsone4uconf'],
	'dhcpdnstwo4uconf' => $_POST['dhcpdnstwo4uconf'],
	'staticip4enableduconf' => $_POST['staticip4enableduconf'],
	'domainname6uconf' => $_POST['domainname4uconf'],
	'ipv6adressuconf' => $_POST['ipv6adressuconf'],
	'dhcpdnsone6uconf' => $_POST['dhcpdnsone6uconf'],
	'dhcpdnstwo6uconf' => $_POST['dhcpdnstwo6uconf'],
	'leasetime6uconf' => $_POST['leasetime4uconf']);

$results = var_export($dhcpserver, true) ;

$myfile = fopen('/urouter/urouterweb/php-saves/dhcp.php', 'w') or die('Unable to open file!');
fwrite($myfile, '<?php
$fwa = ');
fwrite($myfile, $results);
fwrite($myfile, '?>');
fclose($myfile);


$fwabash = ("#ipv4 WR
subnet4uconf='".$_POST['subnet4uconf']."'
netmask4uconf='".$_POST['netmask4uconf']."' 
dhcprangeone4uconf='".$_POST['dhcprangeone4uconf']."'
dhcprangetwo4uconf='".$_POST['dhcprangetwo4uconf']."'
dhcpbroadcast4uconf='".$_POST['dhcpbroadcast4uconf']."'
routers4uconf='".$_POST['routers4uconf']."'
leasetime4uconf='".$_POST['leasetime4uconf']."'
domainname4uconf='".$_POST['domainname4uconf']."'
dhcpdnsone4uconf='".$_POST['dhcpdnsone4uconf']."'
dhcpdnstwo4uconf='".$_POST['dhcpdnstwo4uconf']."'
dhcpinterface4uconf=\"".$_POST['dhcpinterface4uconf']."\"
staticip4uconf='/urouter/uconf/staticip4.urouter'
staticip4enableduconf='".$_POST['staticip4enableduconf']."'
#ipv6 WR
domainname6uconf=\"".$_POST['domainname4uconf']."\"
ipv6adressuconf=\"".$_POST['ipv6adressuconf']."\" # Tunnelbroker
dhcpdnsone6uconf=(".$_POST['dhcpdnsone6uconf'].")
dhcpdnstwo6uconf='".$_POST['dhcpdnstwo6uconf']."'
leasetime6uconf=\"".$_POST['leasetime4uconf']."\"");

iconv(mb_detect_encoding($fwabash, mb_detect_order(), true), "UTF-8", $fwabash);

$myfwbash = fopen('/urouter/uconf/dhcp.urouter', 'w') or die('Unable to open file!');
fwrite($myfwbash, $fwabash);
fclose($myfwbash);
exec("dos2unix /urouter/uconf/dhcp.urouter");
exec("cp /urouter/uconf/dhcp.urouter /urouter/uroutertmp/uconf/");
exec("/urouter/uconfmaker/etc/dhcp/dhcpd.conf");
exec("/urouter/uconfmaker/etc/dhcp/dhcpd6.conf");
exec('service isc-dhcp-server restart & service isc-dhcp-server6 restart');
header("location:/dhcp");
exit;
  }
  
$ustmenu ='<a href="?start" class="mdl-menu__item">DHCP Server Start</a>
<a href="?stop" class="mdl-menu__item">DHCP Server Stop</a>
<a href="?restart" class="mdl-menu__item">DHCP Server Restart</a>
<a href="edit?file=/urouter/uconf/dhcp-ipv4.urouter" class="mdl-menu__item">Custom IPV4 Config</a>
<a href="edit?file=/urouter/uconf/staticip4.urouter" class="mdl-menu__item">Localnet Static IP</a>
';
 header('Content-Type: text/html; charset=utf-8');
 include './header.php';

    if (isset($_GET['start']))
    {
         exec('service isc-dhcp-server start & service isc-dhcp-server6 start');
		 header("location:/dhcp");
    }
        if (isset($_GET['stop']))
    {
		exec('service isc-dhcp-server stop & service isc-dhcp-server6 stop');
		header("location:/dhcp");
    }
        if (isset($_GET['restart']))
    {
		exec('service isc-dhcp-server restart & service isc-dhcp-server6 restart');
		header("location:/dhcp");
    }
?>
<style>
.texin {
	font-size: 20px; color: black;
}
</style>
<main class="mdl-layout__content mdl-color--grey-100">
    <div class="mdl-grid demo-content">
        <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" style="sheight:90vh;">
			
			<div style="margin-top: 10px; width: 100%;" class="mdl-layout-title">
			
	<div class="typo-styles__demo mdl-typography--display-3" style="text-align: center;">DHCP Server Settings</div>
	
<form method="post" action="?savesettings">

<div class="mdl-card__actions mdl-card--border"> 
<section id="demo-textfield-wrapper" class=""  style="margin-left: 10px;">
          <div class="mdc-textfield mdc-textfield--upgraded" style="width: 100%">
            <input type="text" class="mdc-textfield__input" id="subnet4uconf" name="subnet4uconf" aria-controls="my-textfield-helptext" data-demo-no-auto-js="" autocomplete="droutersubnet" value="<?php echo $fwa[subnet4uconf]; ?>" required="">
            <label for="my-textfield" class="mdc-textfield__label mdc-textfield__label--float-above texin">Subnet</label>
          </div>
          <p id="my-textfield-helptext" class="mdc-textfield-helptext mdc-textfield-helptext--persistent" style="display: block;" aria-hidden="true">
           e.g (10.0.0.0) don't include brackets.
          </p>
</section>
</div>

<div class="mdl-card__actions mdl-card--border"> 
<section id="demo-textfield-wrapper" class=""  style="margin-left: 10px;">
          <div class="mdc-textfield mdc-textfield--upgraded" style="width: 100%">
            <input type="text" class="mdc-textfield__input" id="dhcprangeone4uconf" name="dhcprangeone4uconf" aria-controls="my-textfield-helptext" data-demo-no-auto-js="" autocomplete="drouterrangestart" value="<?php echo $fwa[dhcprangeone4uconf]; ?>" required="">
            <label for="my-textfield" class="mdc-textfield__label mdc-textfield__label--float-above texin">Range start</label>
          </div>
          <p id="my-textfield-helptext" class="mdc-textfield-helptext mdc-textfield-helptext--persistent" style="display: block;" aria-hidden="true">
           e.g (10.0.0.10) don't include brackets.
          </p>
</section>
</div>

<div class="mdl-card__actions mdl-card--border"> 
<section id="demo-textfield-wrapper" class=""  style="margin-left: 10px;">
          <div class="mdc-textfield mdc-textfield--upgraded" style="width: 100%">
            <input type="text" class="mdc-textfield__input" id="dhcprangetwo4uconf" name="dhcprangetwo4uconf" aria-controls="my-textfield-helptext" data-demo-no-auto-js="" autocomplete="drouterrangeend" value="<?php echo $fwa[dhcprangetwo4uconf]; ?>" required="">
            <label for="my-textfield" class="mdc-textfield__label mdc-textfield__label--float-above texin">Range end</label>
          </div>
          <p id="my-textfield-helptext" class="mdc-textfield-helptext mdc-textfield-helptext--persistent" style="display: block;" aria-hidden="true">
           e.g (10.0.0.250) don't include brackets.
          </p>
</section>
</div>

<div class="mdl-card__actions mdl-card--border"> 
<section id="demo-textfield-wrapper" class=""  style="margin-left: 10px;">
          <div class="mdc-textfield mdc-textfield--upgraded" style="width: 100%">
            <input type="text" class="mdc-textfield__input" id="dhcpbroadcast4uconf" name="dhcpbroadcast4uconf" aria-controls="my-textfield-helptext" data-demo-no-auto-js="" autocomplete="drouterbroadcast" value="<?php echo $fwa[dhcpbroadcast4uconf]; ?>" required="">
            <label for="my-textfield" class="mdc-textfield__label mdc-textfield__label--float-above texin">Broadcast Adress</label>
          </div>
          <p id="my-textfield-helptext" class="mdc-textfield-helptext mdc-textfield-helptext--persistent" style="display: block;" aria-hidden="true">
           e.g (10.0.0.255) don't include brackets.
          </p>
</section>
</div>

<div class="mdl-card__actions mdl-card--border"> 
<section id="demo-textfield-wrapper" class=""  style="margin-left: 10px;">
          <div class="mdc-textfield mdc-textfield--upgraded" style="width: 100%">
            <input type="text" class="mdc-textfield__input" id="netmask4uconf" name="netmask4uconf" aria-controls="my-textfield-helptext" data-demo-no-auto-js="" autocomplete="drouternetmask" value="<?php echo $fwa[netmask4uconf]; ?>" required="">
            <label for="my-textfield" class="mdc-textfield__label mdc-textfield__label--float-above texin">Netmask</label>
          </div>
          <p id="my-textfield-helptext" class="mdc-textfield-helptext mdc-textfield-helptext--persistent" style="display: block;" aria-hidden="true">
           e.g (255.255.255.0) don't include brackets.
          </p>
</section>
</div>

<div class="mdl-card__actions mdl-card--border"> 
<section id="demo-textfield-wrapper" class=""  style="margin-left: 10px;">
          <div class="mdc-textfield mdc-textfield--upgraded" style="width: 100%">
            <input type="text" class="mdc-textfield__input" id="routers4uconf" name="routers4uconf" aria-controls="my-textfield-helptext" data-demo-no-auto-js="" autocomplete="droutergateway" value="<?php echo $fwa[routers4uconf]; ?>" required="">
            <label for="my-textfield" class="mdc-textfield__label mdc-textfield__label--float-above texin">Gateway</label>
          </div>
          <p id="my-textfield-helptext" class="mdc-textfield-helptext mdc-textfield-helptext--persistent" style="display: block;" aria-hidden="true">
           e.g (10.0.0.5) don't include brackets.
          </p>
</section>
</div>

<div class="mdl-card__actions mdl-card--border"> 
<section id="demo-textfield-wrapper" class=""  style="margin-left: 10px;">
          <div class="mdc-textfield mdc-textfield--upgraded" style="width: 100%">
            <input type="number" class="mdc-textfield__input" id="leasetime4uconf" name="leasetime4uconf" aria-controls="my-textfield-helptext" data-demo-no-auto-js="" autocomplete="drouterleasetime" value="<?php echo $fwa[leasetime4uconf]; ?>" required="">
            <label for="my-textfield" class="mdc-textfield__label mdc-textfield__label--float-above texin">Max lease time</label>
          </div>
          <p id="my-textfield-helptext" class="mdc-textfield-helptext mdc-textfield-helptext--persistent" style="display: block;" aria-hidden="true">
           e.g (7200) don't include brackets.
          </p>
</section>
</div>

<div class="mdl-card__actions mdl-card--border"> 
<section id="demo-textfield-wrapper" class=""  style="margin-left: 10px;">
          <div class="mdc-textfield mdc-textfield--upgraded" style="width: 100%">
            <input type="text" class="mdc-textfield__input" id="domainname4uconf" name="domainname4uconf" aria-controls="my-textfield-helptext" data-demo-no-auto-js="" autocomplete="drouterdomainname" value="<?php echo $fwa[domainname4uconf]; ?>" required="">
            <label for="my-textfield" class="mdc-textfield__label mdc-textfield__label--float-above texin">Domain Name</label>
          </div>
          <p id="my-textfield-helptext" class="mdc-textfield-helptext mdc-textfield-helptext--persistent" style="display: block;" aria-hidden="true">
           e.g (home.ahmetozer.org) don't include brackets.
          </p>
</section>
</div>

<div class="mdl-card__actions mdl-card--border"> 
<section id="demo-textfield-wrapper" class=""  style="margin-left: 10px;">
          <div class="mdc-textfield mdc-textfield--upgraded" style="width: 100%">
            <input type="text" class="mdc-textfield__input" id="dhcpdnsone4uconf" name="dhcpdnsone4uconf" aria-controls="my-textfield-helptext" data-demo-no-auto-js="" autocomplete="drouterdnsserver1" value="<?php echo $fwa[dhcpdnsone4uconf]; ?>" required="">
            <label for="my-textfield" class="mdc-textfield__label mdc-textfield__label--float-above texin">IPv4 DNS server 1</label>
          </div>
          <p id="my-textfield-helptext" class="mdc-textfield-helptext mdc-textfield-helptext--persistent" style="display: block;" aria-hidden="true">
           e.g (10.0.0.5) don't include brackets.
          </p>
</section>
</div>

<div class="mdl-card__actions mdl-card--border"> 
<section id="demo-textfield-wrapper" class=""  style="margin-left: 10px;">
          <div class="mdc-textfield mdc-textfield--upgraded" style="width: 100%">
            <input type="text" class="mdc-textfield__input" id="dhcpdnstwo4uconf" name="dhcpdnstwo4uconf" aria-controls="my-textfield-helptext" data-demo-no-auto-js="" autocomplete="drouterdnsserver2" value="<?php echo $fwa[dhcpdnstwo4uconf]; ?>" required="">
            <label for="my-textfield" class="mdc-textfield__label mdc-textfield__label--float-above texin">IPv4 DNS Server 2</label>
          </div>
          <p id="my-textfield-helptext" class="mdc-textfield-helptext mdc-textfield-helptext--persistent" style="display: block;" aria-hidden="true">
           e.g (8.8.8.8) don't include brackets.
          </p>
</section>
</div>

<div class="mdl-card__actions mdl-card--border"> 
<section id="demo-textfield-wrapper" class=""  style="margin-left: 10px;">
          <div class="mdc-textfield mdc-textfield--upgraded" style="width: 100%">
            <input type="text" class="mdc-textfield__input" id="ipv6adressuconf" name="ipv6adressuconf" aria-controls="my-textfield-helptext" data-demo-no-auto-js="" autocomplete="drouteripv6adressuconf" value="<?php echo $fwa[ipv6adressuconf]; ?>" required="">
            <label for="my-textfield" class="mdc-textfield__label mdc-textfield__label--float-above texin">IPv6 Adress</label>
          </div>
          <p id="my-textfield-helptext" class="mdc-textfield-helptext mdc-textfield-helptext--persistent" style="display: block;" aria-hidden="true">
           e.g (2001:470:1f1c:600) Only IPv6 block, don't include brackets.
          </p>
</section>
</div>

<div class="mdl-card__actions mdl-card--border"> 
<section id="demo-textfield-wrapper" class=""  style="margin-left: 10px;">
          <div class="mdc-textfield mdc-textfield--upgraded" style="width: 100%">
            <input type="text" class="mdc-textfield__input" id="dhcpdnsone6uconf" name="dhcpdnsone6uconf" aria-controls="my-textfield-helptext" data-demo-no-auto-js="" autocomplete="drouterdhcpdnsone6uconf" value="<?php echo $fwa[dhcpdnsone6uconf]; ?>" required="">
            <label for="my-textfield" class="mdc-textfield__label mdc-textfield__label--float-above texin">IPv6 DNS Server 1</label>
          </div>
          <p id="my-textfield-helptext" class="mdc-textfield-helptext mdc-textfield-helptext--persistent" style="display: block;" aria-hidden="true">
           e.g (2001:470:1f1c:600::2) don't include brackets.
          </p>
</section>
</div>

<div class="mdl-card__actions mdl-card--border"> 
<section id="demo-textfield-wrapper" class=""  style="margin-left: 10px;">
          <div class="mdc-textfield mdc-textfield--upgraded" style="width: 100%">
            <input type="text" class="mdc-textfield__input" id="dhcpdnstwo6uconf" name="dhcpdnstwo6uconf" aria-controls="my-textfield-helptext" data-demo-no-auto-js="" autocomplete="drouterdhcpdnstwo6uconf" value="<?php echo $fwa[dhcpdnstwo6uconf]; ?>" required="" style="width: 100%">
            <label for="my-textfield" class="mdc-textfield__label mdc-textfield__label--float-above texin">IPv6 DNS Server 2</label>
          </div>
          <p id="my-textfield-helptext" class="mdc-textfield-helptext mdc-textfield-helptext--persistent" style="display: block;" aria-hidden="true">
           e.g (2001:4860:4860::8888) don't include brackets.
          </p>
</section>
</div>

<!-- Checkbox start -->	
<div class="mdl-card__actions mdl-card--border"> 
	<div class="mdc-form-field">
		<div class="mdc-checkbox">
		<input type="checkbox" id="checkbox-1" class="mdc-checkbox__native-control" name="staticip4enableduconf" <?php if ( $fwa[staticip4enableduconf]=="on" ) echo "checked";?> />
			<div class="mdc-checkbox__background">
			<svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24"><path class="mdc-checkbox__checkmark__path" fill="none" stroke="white" d="M1.73,12.91 8.1,19.28 22.79,4.59"/></svg>
			<div class="mdc-checkbox__mixedmark"></div>
			</div>
		</div>
		<label for="checkbox-1" class="mdl-checkbox__label">IPv4 list enable</label>
	</div>
</div>
<!-- Checkbox end -->	

	<button id="savedfw" class="mdl-button mdl-js-button mdl-button--primary" type="sumbit" style="margin: 15px;">Save</button>
</form>	


			</div>
		</div>
	</div>
</main>
	
<?php include './footer.php';?> 