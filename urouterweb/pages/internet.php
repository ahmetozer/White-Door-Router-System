<?php
    if (empty($_POST["pppmtuuconf"])) {
    include '/urouter/urouterweb/php-saves/internet.php';
  } else {

$dnsserver = array (
    'pppmtuuconf' => $_POST['pppmtuuconf'], 
    'pppmruuconf' => $_POST['pppmruuconf'], 
    'pppmrruuconf' => $_POST['pppmrruuconf'],
	'pppuseruconf' => $_POST['pppuseruconf'],
	'ppppassworduconf' => $_POST['ppppassworduconf'],
	'pppholdtime' => $_POST['pppholdtime']);

$results = var_export($dnsserver, true) ;

$myfile = fopen("/urouter/urouterweb/php-saves/internet.php", "w") or die("Unable to open file!");
fwrite($myfile, '<?php
$fwa = ');
fwrite($myfile, $results);
fwrite($myfile, '?>');
fclose($myfile);



$fwabash = ("###
#PPP config
###
#pppoe connection mru mru mrru config WR
pppmtuuconf='".$_POST['pppmtuuconf']."'
pppmruuconf='".$_POST['pppmruuconf']."'
pppmrruuconf='".$_POST['pppmrruuconf']."'

#pppoe username password config WR
pppuseruconf='".$_POST['pppuseruconf']."'
ppppassworduconf='".$_POST['ppppassworduconf']."'
pppholdtime='".$_POST['pppholdtime']."'"
);

$myfwbash = fopen("/urouter/uconf/ppp.urouter", "w") or die("Unable to open file!");
fwrite($myfwbash, $fwabash);
fclose($myfwbash);
exec("dos2unix /urouter/uconf/ppp.urouter");
exec("cp /urouter/uconf/ppp.urouter /urouter/uroutertmp/uconf/");
exec("poff");
exec("killall -9 pppd");
exec("pon provideruconf");
exec("service bind9 restart");

header("location:/internet");
exit;
 }
  
//////////
$ustmenu ='
    <a href="?start" class="mdl-menu__item">PPPOE Start</a>
    <a href="?stop" class="mdl-menu__item">PPPOE Stop</a>
	<a href="?restart" class="mdl-menu__item">PPPOE Restart</a>
';
 header('Content-Type: text/html; charset=utf-8');
 include './header.php';

    if (isset($_GET['start']))
    {
         exec('pon provideruconf');
		 header("location:/internet");
    }
        if (isset($_GET['stop']))
    {
		exec('poff');
		header("location:/internet");
    }
        if (isset($_GET['restart']))
    {
		exec('poff && pon provideruconf');
		header("location:/internet");
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
			
	<div class="typo-styles__demo mdl-typography--display-3" style="text-align: center;">Internet Settings</div>
			
<form method="post" action="?savesettings">
	
<div class="mdl-card__actions mdl-card--border"> 
<section id="demo-textfield-wrapper" class=""  style="margin-left: 10px;">
          <div class="mdc-textfield mdc-textfield--upgraded" style="width: 100%">
            <input type="email" class="mdc-textfield__input" id="nat-server" name="pppuseruconf" aria-controls="my-textfield-helptext" data-demo-no-auto-js="" autocomplete="drouterpppoeuser" value="<?php echo $fwa[pppuseruconf]; ?>" required="" style="width: 100%">
            <label for="my-textfield" class="mdc-textfield__label mdc-textfield__label--float-above texin">PPPOE Username</label>
          </div>
          <p id="my-textfield-helptext" class="mdc-textfield-helptext mdc-textfield-helptext--persistent" style="display: block;" aria-hidden="true">
           e.g (testuser@turknet)
          </p>
</section>
</div>
<div class="mdl-card__actions mdl-card--border"> 
<section id="demo-textfield-wrapper" class=""  style="margin-left: 10px;">
          <div class="mdc-textfield mdc-textfield--upgraded" style="width: 100%">
            <input type="text" class="mdc-textfield__input" id="nat-server" name="ppppassworduconf" aria-controls="my-textfield-helptext" data-demo-no-auto-js="" autocomplete="drouterpppoepass" value="<?php echo $fwa[ppppassworduconf]; ?>" required="" style="width: 100%">
            <label for="my-textfield" class="mdc-textfield__label mdc-textfield__label--float-above texin">PPPOE Password</label>
          </div>
          <p id="my-textfield-helptext" class="mdc-textfield-helptext mdc-textfield-helptext--persistent" style="display: block;" aria-hidden="true">
           e.g (yourisppassword)
          </p>
</section>
</div>
<div class="mdl-card__actions mdl-card--border"> 
<section id="demo-textfield-wrapper" class=""  style="margin-left: 10px;">
          <div class="mdc-textfield mdc-textfield--upgraded" style="width: 100%">
            <input type="number" class="mdc-textfield__input" id="nat-server" name="pppmtuuconf" aria-controls="my-textfield-helptext" data-demo-no-auto-js="" min="150" max="1500" autocomplete="droutermtu" value="<?php echo $fwa[pppmtuuconf]; ?>" required="" style="width: 100%">
            <label for="my-textfield" class="mdc-textfield__label mdc-textfield__label--float-above texin">MTU</label>
          </div>
          <p id="my-textfield-helptext" class="mdc-textfield-helptext mdc-textfield-helptext--persistent" style="display: block;" aria-hidden="true">
           e.g (1492) 
          </p>
</section>
</div>
<div class="mdl-card__actions mdl-card--border"> 
<section id="demo-textfield-wrapper" class=""  style="margin-left: 10px;">
          <div class="mdc-textfield mdc-textfield--upgraded" style="width: 100%">
            <input type="number" class="mdc-textfield__input" id="nat-server" name="pppmruuconf" aria-controls="my-textfield-helptext" data-demo-no-auto-js="" min="150" max="1500" autocomplete="droutermru" value="<?php echo $fwa[pppmruuconf]; ?>" required="" style="width: 100%">
            <label for="my-textfield" class="mdc-textfield__label mdc-textfield__label--float-above texin">MRU</label>
          </div>
          <p id="my-textfield-helptext" class="mdc-textfield-helptext mdc-textfield-helptext--persistent" style="display: block;" aria-hidden="true">
           e.g (1490)
          </p>
</section>
</div>
<div class="mdl-card__actions mdl-card--border"> 
<section id="demo-textfield-wrapper" class=""  style="margin-left: 10px;">
          <div class="mdc-textfield mdc-textfield--upgraded" style="width: 100%">
            <input type="number" class="mdc-textfield__input" id="nat-server" name="pppmrruuconf" aria-controls="my-textfield-helptext" data-demo-no-auto-js="" min="150" max="1500" autocomplete="droutermrru" value="<?php echo $fwa[pppmrruuconf]; ?>" required="" style="width: 100%">
            <label for="my-textfield" class="mdc-textfield__label mdc-textfield__label--float-above texin">MRRU</label>
          </div>
          <p id="my-textfield-helptext" class="mdc-textfield-helptext mdc-textfield-helptext--persistent" style="display: block;" aria-hidden="true">
           e.g (1490)
          </p>
</section>
</div>
<div class="mdl-card__actions mdl-card--border"> 
<section id="demo-textfield-wrapper" class=""  style="margin-left: 10px;">
          <div class="mdc-textfield mdc-textfield--upgraded" style="width: 100%">
            <input type="number" class="mdc-textfield__input" id="nat-server" name="pppholdtime" aria-controls="my-textfield-helptext" data-demo-no-auto-js="" min="1" max="1500" autocomplete="drouterholdtime" value="<?php echo $fwa[pppholdtime]; ?>" required="" style="width: 100%">
            <label for="my-textfield" class="mdc-textfield__label mdc-textfield__label--float-above texin">Hold time</label>
          </div>
          <p id="my-textfield-helptext" class="mdc-textfield-helptext mdc-textfield-helptext--persistent" style="display: block;" aria-hidden="true">
           e.g (100)
          </p>
</section>
</div>
</div>
	<button id="savedfw" class="mdl-button mdl-js-button mdl-button--primary" type="sumbit" style="margin: 15px;width:100%;">Save</button>
</form>	


			</div>
		</div>
	</div>
</main>
	
<?php include './footer.php';?> 