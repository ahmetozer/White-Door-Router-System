<?php
    if (empty($_POST["listenon"])) {
    include '/urouter/urouterweb/php-saves/dns.php';
  } else {

$dnsserver = array (
    'listenon' => $_POST['listenon'], 
    'recursion' => $_POST['recursion'], 
    'dnssecvalidation' => $_POST['dnssecvalidation'],
	'dnssecenable' => $_POST['dnssecenable'],
	'authnxdomain' => $_POST['authnxdomain'],
	'dns64' => $_POST['dns64'],
	'nat64server' => $_POST['nat64server'],
	'alldnsrequestfipv4' => $_POST['alldnsrequestfipv4'],
	'alldnsrequestfipv6' => $_POST['alldnsrequestfipv6'],
	'bind9forwardonly' => $_POST['bind9forwardonly'],
	'bind9resolverenabled' => $_POST['bind9resolverenabled'],
	'dnsserver' => $_POST['dnsserver']);

$results = var_export($dnsserver, true) ;

include '/urouter/urouterweb/php-saves/dns.php';

$myfile = fopen("/urouter/urouterweb/php-saves/dns.php", "w") or die("Unable to open file!");
fwrite($myfile, '<?php
$fwa = ');
fwrite($myfile, $results);
fwrite($myfile, '?>');
fclose($myfile);

//////////////////// BASH icin ceviri baslangici
if ($_POST['listenon'] == '3' ) {
	$listenon = 'any';
} elseif ($_POST['listenon'] == '2') {
	$listenon ='localnet';
} else {
	$listenon ='localhost';
}

if ($_POST['recursion'] == 'on') {
$recursion = 'yes';
} else {
$recursion = 'no';
}

if ($_POST['dnssecvalidation'] == 'on') {
$dnssecvalidation = 'yes';
} else {
$dnssecvalidation = 'no';
}

if ($_POST['dnssecenable'] == 'on') {
$dnssecenable = 'yes';
} else {
$dnssecenable = 'no';
}

if ($_POST['authnxdomain'] == 'on') {
$authnxdomain = 'yes';
} else {
$authnxdomain = 'no';
}

if ($_POST['dns64'] == 'on') {
$dns64 = '1';
} else {
$dns64 = '0';
}

if ($_POST['alldnsrequestfipv4'] == 'on') {
$alldnsrequestfipv4 = '1';
} else {
$alldnsrequestfipv4 = '0';
}

if ($_POST['alldnsrequestfipv6'] == 'on') {
$alldnsrequestfipv6 = '1';
} else {
$alldnsrequestfipv6 = '0';
}

if ($_POST['bind9forwardonly'] == 'on') {
$bind9forwardonly = '1';
} else {
$bind9forwardonly = '0';
}

if ($_POST['bind9resolverenabled'] == 'on') {
$bind9resolverenabled = '1';
} else {
$bind9resolverenabled = '0';
}
//////////////////// BASH icin ceviri sonu

$fwabash = ("###
#Bind9 config
###
bind9listenonipv4uconf='".$listenon."' #Bind9 dinleme
bind9listenonipv6uconf='".$listenon."'
bind9allowqueryuconf='".$listenon."'
bind9recursionuconf='".$recursion."'
bind9dnssecvalidationuconf='".$dnssecvalidation."'
bind9dnssecenableuconf='".$dnssecenable."'
bind9authnxdomain='".$authnxdomain."'
nat64bind9enableduconf='".$dns64."'  #İpv6 support all domains
nat64serveripuconf='".$_POST['nat64server']."'
#nat64serveripuconf='2001:470:783a:ffff::/96'
alldnsrequestfipv4uconf='".$alldnsrequestfipv4."' #all ipv4 dns request forward to system #iptables
alldnsrequestfipv6uconf='".$alldnsrequestfipv6."' #all ipv6 dns request forward to system #iptables
bind9forwardonlyuconf='".$bind9forwardonly."'
bind9resolverenableduconf='".$bind9resolverenabled."'
bind9resolveruconf='".$_POST['dnsserver']."'"
);

$myfwbash = fopen("/urouter/uconf/dnsserver.urouter", "w") or die("Unable to open file!");
fwrite($myfwbash, $fwabash);
fclose($myfwbash);
exec("cp /urouter/uconf/dnsserver.urouter /urouter/uroutertmp/uconf/");
exec("/urouter/uconfmaker/etc/bind/named.conf");
exec("service bind9 restart");

if ($fwa[alldnsrequestfipv4] == $_POST['alldnsrequestfipv4']) {
////
if ($fwa[alldnsrequestfipv6] == $_POST['alldnsrequestfipv6'] ) {
	echo '<!--same dns settings-->'; 
} else {
	exec("/urouter/uconfmaker/bin/urouter-firewall-on");
}
////
} else {
	exec("/urouter/uconfmaker/bin/urouter-firewall-on");
}

	
	



header("location:/dns");
exit;
  }
  
?>
<?php
$ustmenu ='
    <a href="?start" class="mdl-menu__item">DNS Server Start</a>
    <a href="?stop" class="mdl-menu__item">DNS Server Stop</a>
	<a href="?restart" class="mdl-menu__item">DNS Server Restart</a>
';
 header('Content-Type: text/html; charset=utf-8');
 include './header.php';

    if (isset($_GET['start']))
    {
         exec('service bind9 start');
		 header("location:/dns");
    }
        if (isset($_GET['stop']))
    {
		exec('service bind9 stop');
		header("location:/dns");
    }
        if (isset($_GET['restart']))
    {
		exec('service bind9 restart');
		header("location:/dns");
    }
?>

<main class="mdl-layout__content mdl-color--grey-100">
    <div class="mdl-grid demo-content">
        <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" style="sheight:90vh;">
			
			<div style="margin-top: 10px; width: 100%;" class="mdl-layout-title">
			
	<div class="typo-styles__demo mdl-typography--display-3" style="text-align: center;">DNS Server Settings</div>
			
<form method="post" action="?savesettings">
	
<div class="mdl-card__actions mdl-card--border" style="margin-top: 10px; width: 100%;"> 

<li class="mdl-list__item">
    <span class="mdl-list__item-primary-content">
      Listen network type.
    </span>
  </li>



		<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-1" style="margin: 10px;">
      <input type="radio" id="option-1" class="mdl-radio__button" name="listenon" value="1" <?php if ( $fwa[listenon]=="1" ) echo "checked";?> >
      <span class="mdl-radio__label">Localhost</span>
    </label>
	
	
	<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2" style="margin: 10px;">
      <input type="radio" id="option-2" class="mdl-radio__button" name="listenon" value="2" <?php if ( $fwa[listenon]=="2" ) echo "checked";?> disabled>
      <span class="mdl-radio__label">LocalNet</span>
    </label>
	
	<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-3" style="margin: 10px;">
      <input type="radio" id="option-3" class="mdl-radio__button" name="listenon" value="3" <?php if ( $fwa[listenon]=="3" ) echo "checked";?> >
      <span class="mdl-radio__label">Internet</span>
    </label>
	</div>
	
<div class="mdl-card__actions mdl-card--border"> 
	<div class="mdc-form-field">
		<div class="mdc-checkbox">
		<input type="checkbox" id="checkbox-1" class="mdc-checkbox__native-control" name="recursion" <?php if ( $fwa[recursion]=="on" ) echo "checked";?> />
			<div class="mdc-checkbox__background">
			<svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24"><path class="mdc-checkbox__checkmark__path" fill="none" stroke="white" d="M1.73,12.91 8.1,19.28 22.79,4.59"/></svg>
			<div class="mdc-checkbox__mixedmark"></div>
			</div>
		</div>
		<label for="checkbox-1" class="mdl-checkbox__label">Recursion</label>
	</div>
</div>
	
<div class="mdl-card__actions mdl-card--border"> 
	<div class="mdc-form-field">
		<div class="mdc-checkbox">
    <input type="checkbox" id="checkbox-2" class="mdc-checkbox__native-control" name="dnssecvalidation" <?php if ( $fwa[dnssecvalidation]=="on" ) echo "checked";?> />
		<div class="mdc-checkbox__background">
				<svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24"><path class="mdc-checkbox__checkmark__path" fill="none" stroke="white" d="M1.73,12.91 8.1,19.28 22.79,4.59"/></svg>
				<div class="mdc-checkbox__mixedmark"></div>
			</div>
		</div>
		<label for="checkbox-2" class="mdl-checkbox__label">DNSSEC validation.</label>
	</div>
</div>
	
<div class="mdl-card__actions mdl-card--border">
	<div class="mdc-form-field">
		<div class="mdc-checkbox">
    <input type="checkbox" id="checkbox-3" class="mdc-checkbox__native-control" name="dnssecenable" <?php if ( $fwa[dnssecenable]=="on" ) echo "checked";?> />
		<div class="mdc-checkbox__background">
				<svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24"><path class="mdc-checkbox__checkmark__path" fill="none" stroke="white" d="M1.73,12.91 8.1,19.28 22.79,4.59"/></svg>
				<div class="mdc-checkbox__mixedmark"></div>
			</div>
		</div>
		<label for="checkbox-3" class="mdl-checkbox__label">DNSSEC enable.</label>
	</div>
</div>
<div class="mdl-card__actions mdl-card--border"> 
<div class="mdc-form-field">
		<div class="mdc-checkbox">
    <input type="checkbox" id="checkbox-4" class="mdc-checkbox__native-control" name="authnxdomain" <?php if ( $fwa[authnxdomain]=="on" ) echo "checked";?> />
		<div class="mdc-checkbox__background">
				<svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24"><path class="mdc-checkbox__checkmark__path" fill="none" stroke="white" d="M1.73,12.91 8.1,19.28 22.79,4.59"/></svg>
				<div class="mdc-checkbox__mixedmark"></div>
			</div>
		</div>
		<label for="checkbox-4" class="mdl-checkbox__label">Auth NX Domain.</label>
</div>
</div>
	
<div class="mdl-card__actions mdl-card--border"> 
	<div class="mdc-form-field">
		<div class="mdc-checkbox">
    <input type="checkbox" id="checkbox-5" class="mdc-checkbox__native-control" name="dns64" <?php if ( $fwa[dns64]=="on" ) echo "checked";?> />
		<div class="mdc-checkbox__background">
				<svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24"><path class="mdc-checkbox__checkmark__path" fill="none" stroke="white" d="M1.73,12.91 8.1,19.28 22.79,4.59"/></svg>
				<div class="mdc-checkbox__mixedmark"></div>
			</div>
		</div>
		<label for="checkbox-5" class="mdl-checkbox__label">Enable DNS64.</label>
	</div>
</div>

<div class="mdl-card__actions mdl-card--border"> 
	<div class="mdc-form-field">
		<div class="mdc-checkbox">
    <input type="checkbox" id="checkbox-10" class="mdc-checkbox__native-control" name="alldnsrequestfipv4" <?php if ( $fwa[alldnsrequestfipv4]=="on" ) echo "checked";?> />
		<div class="mdc-checkbox__background">
				<svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24"><path class="mdc-checkbox__checkmark__path" fill="none" stroke="white" d="M1.73,12.91 8.1,19.28 22.79,4.59"/></svg>
				<div class="mdc-checkbox__mixedmark"></div>
			</div>
		</div>
		<label for="checkbox-10" class="mdl-checkbox__label">IPv4 all request forward to router.</label>
	</div>
</div>

<div class="mdl-card__actions mdl-card--border"> 
	<div class="mdc-form-field">
		<div class="mdc-checkbox">
    <input type="checkbox" id="checkbox-9" class="mdc-checkbox__native-control" name="alldnsrequestfipv6" <?php if ( $fwa[alldnsrequestfipv6]=="on" ) echo "checked";?> />
		<div class="mdc-checkbox__background">
				<svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24"><path class="mdc-checkbox__checkmark__path" fill="none" stroke="white" d="M1.73,12.91 8.1,19.28 22.79,4.59"/></svg>
				<div class="mdc-checkbox__mixedmark"></div>
			</div>
		</div>
		<label for="checkbox-9" class="mdl-checkbox__label">IPv6 all request forward to router.</label>
	</div>
</div>

<div class="mdl-card__actions mdl-card--border"> 
	<div class="mdc-form-field">
		<div class="mdc-checkbox">
    <input type="checkbox" id="checkbox-6" class="mdc-checkbox__native-control" name="bind9forwardonly" <?php if ( $fwa[bind9forwardonly]=="on" ) echo "checked";?> />
		<div class="mdc-checkbox__background">
				<svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24"><path class="mdc-checkbox__checkmark__path" fill="none" stroke="white" d="M1.73,12.91 8.1,19.28 22.79,4.59"/></svg>
				<div class="mdc-checkbox__mixedmark"></div>
			</div>
		</div>
		<label for="checkbox-6" class="mdl-checkbox__label">DNS Server forward only.</label>
	</div>
</div>

<div class="mdl-card__actions mdl-card--border"> 
	<div class="mdc-form-field">
		<div class="mdc-checkbox">
    <input type="checkbox" id="checkbox-7" class="mdc-checkbox__native-control" name="bind9resolverenabled" <?php if ( $fwa[bind9resolverenabled]=="on" ) echo "checked";?> />
		<div class="mdc-checkbox__background">
				<svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24"><path class="mdc-checkbox__checkmark__path" fill="none" stroke="white" d="M1.73,12.91 8.1,19.28 22.79,4.59"/></svg>
				<div class="mdc-checkbox__mixedmark"></div>
			</div>
		</div>
		<label for="checkbox-7" class="mdl-checkbox__label">Enable forwarders.</label>
	</div>
</div>

<div class="mdl-card__actions mdl-card--border"> 
<section id="demo-textfield-wrapper" class=""  style="margin-left: 10px;">
          <div class="mdc-textfield mdc-textfield--upgraded">
            <input type="text" class="mdc-textfield__input" id="nat-server" name="nat64server" aria-controls="my-textfield-helptext" data-demo-no-auto-js="" autocomplete="drouterinterface" value="<?php echo $fwa[nat64server]; ?>" required="">
            <label for="my-textfield" class="mdc-textfield__label mdc-textfield__label--float-above">NAT64 Server</label>
          </div>
          <p id="my-textfield-helptext" class="mdc-textfield-helptext mdc-textfield-helptext--persistent" style="display: block;" aria-hidden="true">
           e.g (2001:67c:27e4:11::/96) Only IPv6 block, don't include brackets.
          </p>
</section>
</div>

<div class="mdl-card__actions mdl-card--border"> 
<section id="demo-textfield-wrapper" class=""  style="margin-left: 10px;">
          <div class="mdc-textfield mdc-textfield--upgraded" style="width: 100%">
            <input type="text" class="mdc-textfield__input" id="nat-server" name="dnsserver" aria-controls="my-textfield-helptext" data-demo-no-auto-js="" autocomplete="drouterdnserver" value="<?php echo $fwa[dnsserver]; ?>" required="" style="width: 100%">
            <label for="my-textfield" class="mdc-textfield__label mdc-textfield__label--float-above">DNS Servers</label>
          </div>
          <p id="my-textfield-helptext" class="mdc-textfield-helptext mdc-textfield-helptext--persistent" style="display: block;" aria-hidden="true">
           e.g (2001:470:20::2,2001:4860:4860::8888,8.8.8.8) DNS servers, don't include brackets.
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