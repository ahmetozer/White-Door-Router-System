<?php
$ustmenu ='
 <form method="post">
    <a name="all" class="mdl-menu__item">All</a>
    <a name="stat" class="mdl-menu__item">Status</a>
    </form>
';
 header('Content-Type: text/html; charset=utf-8');
 include 'header.php';
?>
<main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
          <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" style="sheight:90vh;">
<style>
#ifconfig{
	font-family: Monospace, sans-serif;
	color: #263238;
	ffont-family: sans-serif;
}
</style>
<div>

<?php
$cip = $_SERVER['REMOTE_ADDR'];
if(isset($_REQUEST["loc"])) {
header('Location:/rota');
if ($_REQUEST["loc"] == "rt3") {
$output = shell_exec("ip rule del from $cip table rt4;
ip rule del to $cip table rt4;
ip rule add from $cip table rt3;
ip rule add to $cip table rt3 ;
echo 'konum Türkiye'");
}
if ($_REQUEST["loc"] == "rt2") {
$output = shell_exec("ip rule del from $cip table rt4;
ip rule del to $cip table rt4;
ip rule del from $cip table rt3;
ip rule del to $cip table rt3;
echo 'konum Slovenya'");
}
if ($_REQUEST["loc"] == "rt4") {
$output = shell_exec("ip rule del from $cip table rt3;
ip rule del to $cip table rt3;
ip rule add from $cip table rt4;
ip rule add to $cip table rt4 && echo 'konum Finlandiya'");
}

}
echo "<pre><font id='ifconfig'>$output</font></pre>";
?>
<h3>Bu işlem sadece kullanılan bilgisayara etki eder.</h3>
<p>İnternet Çıkış ülkesini seçin</p>
<form action = "?savesettings" method = "post">
<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary" type="submit" name="loc" value="rt3">
  Türkiye
</button>
<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" name="loc" value="rt2">
  Slovenya
</button>
<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--blue" type="submit" name="loc" value="rt4">
  Finlandiya
</button>
</form>



</div>
	</main>
	</div>
	</div>

<?php include 'footer.php';?>
