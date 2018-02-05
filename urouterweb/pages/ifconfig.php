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
if(isset($_POST["all"])) {
    $secenek = '-a';
    }
        if(isset($_POST["stat"])) {
    $secenek = '-s';
    }
$output = shell_exec("ifconfig $secenek");
echo "<div style='margin: 3%;white-space: pre-line; overflow-y: auto'><font id='ifconfig'>$output</font></div>";
?>
</div>
	</main>
	</div>
	</div>

<?php include 'footer.php';?> 
