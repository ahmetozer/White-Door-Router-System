<?php
$ustmenu ='<a name="torrentcalistir" href="?torrentstart" class="mdl-menu__item">Start Torrent</a>
    <a name="torrentidurdur" href="?torrentstop" class="mdl-menu__item">Stop Torrent</a>';
 header('Content-Type: text/html; charset=utf-8');
 include 'header.php';?>
<main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
          <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" style="height:90vh;">
<!-- <iframe src="/deluge" class="iframesysteminfo" ></iframe> -->

<iframe src="/transmission/web/" style='margin: 2px;width: 100%;height: 100%;border:none;' ></iframe>
 

<!-- 
make sure all html elements that have an ID are unique and name the buttons submit 
-->
<?php
    if (isset($_GET['torrentstart']))
    {
         exec('bash /urouter/uconfmaker/bin/urouter-tools torrentstart');
		 header("location:/torrent");
    }
        if (isset($_GET['torrentstop']))
    {
         exec('bash /urouter/uconfmaker/bin/urouter-tools torrentstop');
		 header("Cache-Control: no-cache, must-revalidate");
		 header("location:/torrent");
    }
?>

   
	</main>
	</div>
	</div>

<?php include 'footer.php';?> 