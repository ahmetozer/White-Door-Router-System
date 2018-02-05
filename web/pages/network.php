 <?php
    if (empty($_POST["ppplogin"])) {
    include '/urouter/urouterweb/php-saves/ppp.php';
  } else {

$pppoe = array (
    'ppplogin' => $_POST['ppplogin'], 
    'ppppassword' => $_POST['ppppassword'], 
    'pppmtu' => $_POST['pppmtu'],
	'pppmru' => $_POST['pppmru'],
	'pppmrru' => $_POST['pppmrru'],
	'pppholdtime' => $_POST['pppholdtime']);

$results = var_export($pppoe, true) ;


$myfile = fopen("/urouter/urouterweb/php-saves/ppp.php", "w") or die("Unable to open file!");
fwrite($myfile, '<?php
$pppoe= ');

fwrite($myfile, $results);
fwrite($myfile, '?>');

fclose($myfile);

$pppbash = ("###
#PPP config
###
#pppoe connection mru mru mrru config WR
pppmtuuconf='" . $_POST['pppmtu'] . "'
pppmruuconf='" . $_POST['pppmru'] . "'
pppmrruuconf='" . $_POST['pppmrru'] . "'

#pppoe username password config WR
pppuseruconf='" . $_POST['ppplogin'] . "'
ppppassworduconf='" . $_POST['ppppassword'] . "'
pppholdtime='" . $_POST['pppholdtime'] . "'"
);

//$pppwbash = fopen("/urouter/uconf/ppp.urouter", "w") or die("Unable to open file!");
//fwrite($pppwbash, $pppbash);
//fclose($pppwbash);

header("location:/network");
exit;
  }
  
?>
<?php
$ustmenu ='
 <form method="post">
    <a href="/ipv4-whitelist" class="mdl-menu__item">Whitelist</a>
    <button name="stat" class="mdl-menu__item">Status</button>
    </form>
';
 header('Content-Type: text/html; charset=utf-8');
 include './header.php';
?>

<?php


?>

<main class="mdl-layout__content mdl-color--grey-100">
    <div class="mdl-grid demo-content">
        <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" style="sheight:90vh;">
			
			<div style="margin-top: 10px; width: 100%;" class="mdl-layout-title">
			
	<div class="typo-styles__demo mdl-typography--display-3" style="text-align: center;">Network Settings</div>
			
<form method="post" action="?savesettings">
	

<div class="mdl-card__actions mdl-card--border"> 
<section id="demo-textfield-wrapper" class=""  style="margin-left: 10px;">
          <div class="mdc-textfield mdc-textfield--upgraded">
            <input type="text" class="mdc-textfield__input" id="nat-interfaces" name="ppplogin" aria-controls="my-textfield-helptext" data-demo-no-auto-js="" autocomplete="drouterinterface" value="<?php echo $pppoe[ppplogin]; ?>" required="">
            <label for="my-textfield" class="mdc-textfield__label mdc-textfield__label--float-above" style="font-size: 20px; color: blue;">PPPOE Login</label>
          </div>
          <p id="my-textfield-helptext" class="mdc-textfield-helptext mdc-textfield-helptext--persistent" style="display: block;" aria-hidden="true">
           e.g (lincon48@turk.net)
          </p>
</section>
</div>

<div class="mdl-card__actions mdl-card--border"> 
<section id="demo-textfield-wrapper" class=""  style="margin-left: 10px;">
          <div class="mdc-textfield mdc-textfield--upgraded">
            <input type="text" class="mdc-textfield__input" id="nat-interfaces" name="ppppassword"  aria-controls="my-textfield-helptext" data-demo-no-auto-js="" autocomplete="drouterinterface" value="<?php echo $pppoe[ppppassword]; ?>" required="">
            <label for="my-textfield" class="mdc-textfield__label mdc-textfield__label--float-above" style="font-size: 20px; color: blue; width:100%">PPPOE Password</label>
          </div>
          <p id="my-textfield-helptext" class="mdc-textfield-helptext mdc-textfield-helptext--persistent" style="display: block;" aria-hidden="true">
           e.g (myisppassword)
          </p>
</section>
</div>

<div class="mdl-card__actions mdl-card--border"> 
<section id="demo-textfield-wrapper" class=""  style="margin-left: 10px;">
          <div class="mdc-textfield mdc-textfield--upgraded">
            <input type="text" class="mdc-textfield__input" id="nat-interfaces" name="pppmtu"  aria-controls="my-textfield-helptext" data-demo-no-auto-js="" autocomplete="drouterinterface" value="<?php echo $pppoe[pppmtu]; ?>" required="">
            <label for="my-textfield" class="mdc-textfield__label mdc-textfield__label--float-above" style="font-size: 20px; color: blue; width:100%">PPPOE MTU</label>
          </div>
          <p id="my-textfield-helptext" class="mdc-textfield-helptext mdc-textfield-helptext--persistent" style="display: block;" aria-hidden="true">
           e.g (1492)
          </p>
</section>
</div>

<div class="mdl-card__actions mdl-card--border"> 
<section id="demo-textfield-wrapper" class=""  style="margin-left: 10px;">
          <div class="mdc-textfield mdc-textfield--upgraded">
            <input type="text" class="mdc-textfield__input" id="nat-interfaces" name="pppmru"  aria-controls="my-textfield-helptext" data-demo-no-auto-js="" autocomplete="drouterinterface" value="<?php echo $pppoe[pppmru]; ?>" required="">
            <label for="my-textfield" class="mdc-textfield__label mdc-textfield__label--float-above" style="font-size: 20px; color: blue; width:100%">PPPOE MRU</label>
          </div>
          <p id="my-textfield-helptext" class="mdc-textfield-helptext mdc-textfield-helptext--persistent" style="display: block;" aria-hidden="true">
           e.g (1492)
          </p>
</section>
</div>

<div class="mdl-card__actions mdl-card--border"> 
<section id="demo-textfield-wrapper" class=""  style="margin-left: 10px;">
          <div class="mdc-textfield mdc-textfield--upgraded">
            <input type="text" class="mdc-textfield__input" id="nat-interfaces" name="pppmrru"  aria-controls="my-textfield-helptext" data-demo-no-auto-js="" autocomplete="drouterinterface" value="<?php echo $pppoe[pppmrru]; ?>" required="">
            <label for="my-textfield" class="mdc-textfield__label mdc-textfield__label--float-above" style="font-size: 20px; color: blue; width:100%">PPPOE MRRU</label>
          </div>
          <p id="my-textfield-helptext" class="mdc-textfield-helptext mdc-textfield-helptext--persistent" style="display: block;" aria-hidden="true">
           e.g (1492)
          </p>
</section>
</div>

<div class="mdl-card__actions mdl-card--border"> 
<section id="demo-textfield-wrapper" class=""  style="margin-left: 10px;">
          <div class="mdc-textfield mdc-textfield--upgraded">
            <input type="text" class="mdc-textfield__input" id="nat-interfaces" name="pppholdtime"  aria-controls="my-textfield-helptext" data-demo-no-auto-js="" autocomplete="drouterinterface" value="<?php echo $pppoe[pppholdtime]; ?>" required="">
            <label for="my-textfield" class="mdc-textfield__label mdc-textfield__label--float-above" style="font-size: 20px; color: blue; width:100%">PPPOE Hold Time</label>
          </div>
          <p id="my-textfield-helptext" class="mdc-textfield-helptext mdc-textfield-helptext--persistent" style="display: block;" aria-hidden="true">
           e.g (100)
          </p>
</section>
</div>



	<button id="savedfw" class="mdl-button mdl-js-button mdl-button--primary" type="sumbit" style="margin: 15px;">Save</button>
</form>	
			</div>
		</div>
	</div>
  </div>

	
	
	
	
</main>





	
<?php include './footer.php';?> 