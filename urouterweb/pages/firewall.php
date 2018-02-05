 <?php
    if (empty($_POST["dropiface"])) {
    include '/urouter/urouterweb/php-saves/firewall.php';
  } else {

$firewall = array (
    'dropiface' => $_POST['dropiface'], 
    'allowiface' => $_POST['allowiface'], 
    'allowport' => $_POST['allowport'],
	'ipv4whitelist' => $_POST['ipv4whitelist'],
	'ipv6whitelist' => $_POST['ipv6whitelist'],
	'allownatv4' => $_POST['allownatv4'],
	'allownatv6' => $_POST['allownatv6'],
	'ipv4blocklist' => $_POST['ipv4blocklist'],
	'ipv6blocklist' => $_POST['ipv6blocklist'],
	'allowdnsservers' => $_POST['allowdnsservers'],
	'ipv4portforward' => $_POST['ipv4portforward'],
	'natdevices' => $_POST['natdevices']);

$results = var_export($firewall, true) ;


$myfile = fopen("/urouter/urouterweb/php-saves/firewall.php", "w") or die("Unable to open file!");
fwrite($myfile, '<?php
$fwa = ');

fwrite($myfile, $results);
fwrite($myfile, '?>');

fclose($myfile);

$fwabash = ("###   Firewall Settings    ###
ipv4dropinternetinterfaceuconf='" . $_POST['dropiface'] . "'				# 0 disable  1 drop tcp , 2 drop UDP , 3 Drop TCP and UDP , 4 Drop all types
ipv4enablepinginternetinterfaceuconf='" . $_POST['allowiface'] . "'		# ping (icmp) connections from internet to the router
ipv4enableinternetinterfaceportsuconf='" . $_POST['allowport'] ."'		# Allow ports all ip or allow ports custom ip range
ipv4enableipfrominternetuconf='" . $_POST['ipv4whitelist'] . "'				# ipv4 whitelist
ipv4enablenatuconf='" . $_POST['allownatv4'] . "'							# ipv4 nat 
ipv6enablenatuconf='" . $_POST['allownatv6'] . "'							# ipv6 nat 
ipv4portforwarduconf='" . $_POST['ipv4portforward'] . "'							# Enable port forward.
ipv4blocklistuconf='" . $_POST['ipv4blocklist'] . "'							# Enable block list ipv4
ipv6enableipfrominternetuconf='" . $_POST['ipv6whitelist'] . "'				# IPV6 whitelist
ipv6blocklistuconf='" . $_POST['ipv6blocklist'] . "'							# Enable IPV6 blocklist
firewallallowdnsserveripuconf='" . $_POST['allowdnsservers'] ."'				# Allow dns query from internet to the router
ipv4natinterfacesuconf=\"" . $_POST['natdevices'] . "\"				# Nat izin verilen aygıtlar"
);

$myfwbash = fopen("/urouter/uconf/firewall.urouter", "w") or die("Unable to open file!");
fwrite($myfwbash, $fwabash);
fclose($myfwbash);
exec("dos2unix /urouter/uconf/firewall.urouter");
exec("cp /urouter/uconf/firewall.urouter /urouter/uroutertmp/uconf/");
exec("/urouter/uconfmaker/bin/urouter-firewall-on");
header("location:/firewall");
exit;
  }
  
?>
<?php
$ustmenu ='
    <a href="/ipv4-whitelist" class="mdl-menu__item">Whitelist</a>
	<a href="?start" class="mdl-menu__item">Firewall Start</a>
    <a href="?stop" class="mdl-menu__item">Firewall Stop</a>
	<a href="?restart" class="mdl-menu__item">Firewall Restart</a>
	<a href="/edit?file=/urouter/uconf/firewall/firewall-custom-settings.urouter" class="mdl-menu__item">Firewall Custom Settings</a>
';
 header('Content-Type: text/html; charset=utf-8');
 include './header.php';
?>

<?php
    if (isset($_GET['start']))
    {
         exec('bash /urouter/uroutertmp/bin/urouter-firewall-on');
		 header("location:/firewall");
    }
        if (isset($_GET['stop']))
    {
		exec('bash /urouter/uroutertmp/bin/urouter-firewall-off');
		header("location:/firewall");
    }
        if (isset($_GET['restart']))
    {
		exec('bash /urouter/uroutertmp/bin/urouter-firewall-off');
		exec('bash /urouter/uroutertmp/bin/urouter-firewall-on');
		header("location:/firewall");
    }
?>

<main class="mdl-layout__content mdl-color--grey-100">
    <div class="mdl-grid demo-content">
        <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" style="sheight:90vh;">
			
			<div style="margin-top: 10px; width: 100%;" class="mdl-layout-title">
			
	<div class="typo-styles__demo mdl-typography--display-3" style="text-align: center;">Firewall Settings</div>
			
<form method="post" action="?savesettings">
	
<div class="mdl-card__actions mdl-card--border" style="margin-top: 10px; width: 100%;"> 

<li class="mdl-list__item">
    <span class="mdl-list__item-primary-content">
      Block requests from internet to the router . (Not your home network)
    </span>
  </li>



	<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-1" style="margin: 10px;">
      <input type="radio" id="option-1" class="mdl-radio__button" name="dropiface" value="5" <?php if ( $fwa[dropiface]=="5" ) echo "checked";?> >
      <span class="mdl-radio__label">Disabled</span>
    </label>
	
	<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-4" style="margin: 10px;">
      <input type="radio" id="option-1" class="mdl-radio__button" name="dropiface" value="1" <?php if ( $fwa[dropiface]=="1" ) echo "checked";?> >
      <span class="mdl-radio__label">Drop TCP</span>
    </label>
	
	<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-4" style="margin: 10px;">
      <input type="radio" id="option-1" class="mdl-radio__button" name="dropiface" value="1" <?php if ( $fwa[dropiface]=="1" ) echo "checked";?> >
      <span class="mdl-radio__label">Drop UDP</span>
    </label>
	
	<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2" style="margin: 10px;">
      <input type="radio" id="option-2" class="mdl-radio__button" name="dropiface" value="3" <?php if ( $fwa[dropiface]=="3" ) echo "checked";?> >
      <span class="mdl-radio__label">Drop TCP-UDP</span>
    </label>
	
	<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-3" style="margin: 10px;">
      <input type="radio" id="option-3" class="mdl-radio__button" name="dropiface" value="4" <?php if ( $fwa[dropiface]=="4" ) echo "checked";?> >
      <span class="mdl-radio__label">Drop ALL</span>
    </label>
	</div>
	
<div class="mdl-card__actions mdl-card--border"> 
	<div class="mdc-form-field">
		<div class="mdc-checkbox">
		<input type="checkbox" id="checkbox-1" class="mdc-checkbox__native-control" name="allowiface" <?php if ( $fwa[allowiface]=="on" ) echo "checked";?> />
			<div class="mdc-checkbox__background">
			<svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24"><path class="mdc-checkbox__checkmark__path" fill="none" stroke="white" d="M1.73,12.91 8.1,19.28 22.79,4.59"/></svg>
			<div class="mdc-checkbox__mixedmark"></div>
			</div>
		</div>
		<label for="checkbox-1" class="mdl-checkbox__label">Allow Ping (ICMP Packets) from internet to router.</label>
	</div>
</div>
	
<div class="mdl-card__actions mdl-card--border"> 
	<div class="mdc-form-field">
		<div class="mdc-checkbox">
    <input type="checkbox" id="checkbox-2" class="mdc-checkbox__native-control" name="allowport" <?php if ( $fwa[allowport]=="on" ) echo "checked";?> />
		<div class="mdc-checkbox__background">
				<svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24"><path class="mdc-checkbox__checkmark__path" fill="none" stroke="white" d="M1.73,12.91 8.1,19.28 22.79,4.59"/></svg>
				<div class="mdc-checkbox__mixedmark"></div>
			</div>
		</div>
		<label for="checkbox-2" class="mdl-checkbox__label">Allow custom Ports from internet to router.</label>
	</div>
</div>
	
<div class="mdl-card__actions mdl-card--border">
	<div class="mdc-form-field">
		<div class="mdc-checkbox">
    <input type="checkbox" id="checkbox-3" class="mdc-checkbox__native-control" name="ipv4whitelist" <?php if ( $fwa[ipv4whitelist]=="on" ) echo "checked";?> />
		<div class="mdc-checkbox__background">
				<svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24"><path class="mdc-checkbox__checkmark__path" fill="none" stroke="white" d="M1.73,12.91 8.1,19.28 22.79,4.59"/></svg>
				<div class="mdc-checkbox__mixedmark"></div>
			</div>
		</div>
		<label for="checkbox-3" class="mdl-checkbox__label">Allow IPv4 whitelist.</label>
	</div>
</div>
<div class="mdl-card__actions mdl-card--border"> 
<div class="mdc-form-field">
		<div class="mdc-checkbox">
    <input type="checkbox" id="checkbox-4" class="mdc-checkbox__native-control" name="ipv6whitelist" <?php if ( $fwa[ipv6whitelist]=="on" ) echo "checked";?> />
		<div class="mdc-checkbox__background">
				<svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24"><path class="mdc-checkbox__checkmark__path" fill="none" stroke="white" d="M1.73,12.91 8.1,19.28 22.79,4.59"/></svg>
				<div class="mdc-checkbox__mixedmark"></div>
			</div>
		</div>
		<label for="checkbox-4" class="mdl-checkbox__label">Allow IPv6 whitelist.</label>
</div>
</div>
	
<div class="mdl-card__actions mdl-card--border"> 
	<div class="mdc-form-field">
		<div class="mdc-checkbox">
    <input type="checkbox" id="checkbox-5" class="mdc-checkbox__native-control" name="allownatv4" <?php if ( $fwa[allownatv4]=="on" ) echo "checked";?> />
		<div class="mdc-checkbox__background">
				<svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24"><path class="mdc-checkbox__checkmark__path" fill="none" stroke="white" d="M1.73,12.91 8.1,19.28 22.79,4.59"/></svg>
				<div class="mdc-checkbox__mixedmark"></div>
			</div>
		</div>
		<label for="checkbox-5" class="mdl-checkbox__label">Enable IPv4 NAT.</label>
	</div>
</div>

<div class="mdl-card__actions mdl-card--border"> 
	<div class="mdc-form-field">
		<div class="mdc-checkbox">
    <input type="checkbox" id="checkbox-10" class="mdc-checkbox__native-control" name="allownatv6" <?php if ( $fwa[allownatv6]=="on" ) echo "checked";?> />
		<div class="mdc-checkbox__background">
				<svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24"><path class="mdc-checkbox__checkmark__path" fill="none" stroke="white" d="M1.73,12.91 8.1,19.28 22.79,4.59"/></svg>
				<div class="mdc-checkbox__mixedmark"></div>
			</div>
		</div>
		<label for="checkbox-10" class="mdl-checkbox__label">Enable IPv6 NAT.</label>
	</div>
</div>

<div class="mdl-card__actions mdl-card--border"> 
	<div class="mdc-form-field">
		<div class="mdc-checkbox">
    <input type="checkbox" id="checkbox-9" class="mdc-checkbox__native-control" name="ipv4portforward" <?php if ( $fwa[ipv4portforward]=="on" ) echo "checked";?> />
		<div class="mdc-checkbox__background">
				<svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24"><path class="mdc-checkbox__checkmark__path" fill="none" stroke="white" d="M1.73,12.91 8.1,19.28 22.79,4.59"/></svg>
				<div class="mdc-checkbox__mixedmark"></div>
			</div>
		</div>
		<label for="checkbox-9" class="mdl-checkbox__label">Enable IPv4 port forward.</label>
	</div>
</div>

<div class="mdl-card__actions mdl-card--border"> 
	<div class="mdc-form-field">
		<div class="mdc-checkbox">
    <input type="checkbox" id="checkbox-6" class="mdc-checkbox__native-control" name="ipv4blocklist" <?php if ( $fwa[ipv4blocklist]=="on" ) echo "checked";?> />
		<div class="mdc-checkbox__background">
				<svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24"><path class="mdc-checkbox__checkmark__path" fill="none" stroke="white" d="M1.73,12.91 8.1,19.28 22.79,4.59"/></svg>
				<div class="mdc-checkbox__mixedmark"></div>
			</div>
		</div>
		<label for="checkbox-6" class="mdl-checkbox__label">Enable IPv4 Block list.</label>
	</div>
</div>

<div class="mdl-card__actions mdl-card--border"> 
	<div class="mdc-form-field">
		<div class="mdc-checkbox">
    <input type="checkbox" id="checkbox-7" class="mdc-checkbox__native-control" name="ipv6blocklist" <?php if ( $fwa[ipv6blocklist]=="on" ) echo "checked";?> />
		<div class="mdc-checkbox__background">
				<svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24"><path class="mdc-checkbox__checkmark__path" fill="none" stroke="white" d="M1.73,12.91 8.1,19.28 22.79,4.59"/></svg>
				<div class="mdc-checkbox__mixedmark"></div>
			</div>
		</div>
		<label for="checkbox-7" class="mdl-checkbox__label">Enable IPv6 Block list.</label>
	</div>
</div>

<div class="mdl-card__actions mdl-card--border"> 
	<div class="mdc-form-field">
		<div class="mdc-checkbox">
    <input type="checkbox" id="checkbox-8" class="mdc-checkbox__native-control" name="allowdnsservers" <?php if ( $fwa[allowdnsservers]=="on" ) echo "checked";?> />
		<div class="mdc-checkbox__background">
				<svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24"><path class="mdc-checkbox__checkmark__path" fill="none" stroke="white" d="M1.73,12.91 8.1,19.28 22.79,4.59"/></svg>
				<div class="mdc-checkbox__mixedmark"></div>
			</div>
		</div>
		<label for="checkbox-8" class="mdl-checkbox__label">Allow DNS Server from internet to the router.</label>
	</div>
</div>


<div class="mdl-card__actions mdl-card--border"> 
<section id="demo-textfield-wrapper" class=""  style="margin-left: 10px;">
          <div class="mdc-textfield mdc-textfield--upgraded">
            <input type="text" class="mdc-textfield__input" id="nat-interfaces" name="natdevices"" aria-controls="my-textfield-helptext" data-demo-no-auto-js="" autocomplete="drouterinterface" value="<?php echo $fwa[natdevices]; ?>" required="">
            <label for="my-textfield" class="mdc-textfield__label mdc-textfield__label--float-above">NAT Interfaces</label>
          </div>
          <p id="my-textfield-helptext" class="mdc-textfield-helptext mdc-textfield-helptext--persistent" style="display: block;" aria-hidden="true">
           e.g (ppp0,eth0) Only interface name and comma, don't include brackets.
          </p>
</section>
</div>


	<button id="savedfw" class="mdl-button mdl-js-button mdl-button--primary" type="sumbit" style="margin: 15px;width:100%;">Save</button>
</form>	
			</div>
		</div>
	</div>
</main>
	
<?php include './footer.php';?> 