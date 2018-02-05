<?php
$ustmenu ='
 <form method="post">
    <button name="all" class="mdl-menu__item">All</button>
    <button name="stat" class="mdl-menu__item">Status</button>
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
	color: #004D40;
	
	font-size: 15px;
}
</style>
<div>

<?php
$outputtop = shell_exec('top -b -n 1');
echo "<pre><font id='ifconfig'>$outputtop</font></pre>";
?>
</div>
	</main>
	</div>
	</div>

<?php include 'footer.php';?> 
