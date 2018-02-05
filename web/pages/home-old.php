<?php

// configuration

$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$parts = parse_url($url);
parse_str($parts['query'], $query);
$file = '/urouter/uconf/urouter.uconf';

// check if form has been submitted
if (isset($_POST['text']))
{
    // save the text contents
    file_put_contents($file, $_POST['text']);
$fileuft8 = file_get_contents("$file");
$fileuft8 = str_replace("\r", "", $fileuft8);
file_put_contents("$file", $fileuft8);
exec("cp /urouter/uconf/urouter.uconf /urouter/uroutertmp/uconf/");
    // redirect to form again
    header(sprintf('Location: %s', $url));
    printf('<a href="%s">Moved</a>.', htmlspecialchars($url));
    exit();
}

// read the textfile
$text = file_get_contents($file);

?>
<!-- HTML form -->
<?php
$ustmenu ='<a href="https://www.google.com" class="mdl-menu__item">Yeniden Başlat</a>
            <a href="/administration" class="mdl-menu__item">Administration</a>
            <li class="mdl-menu__item">Hakkında</li>';
 header('Content-Type: text/html; charset=utf-8');
 include 'header.php';
 
 $defaultinterface0 = array();
exec("ip route | head -n1 | cut -d' ' -f 3", $defaultinterface0);
foreach($defaultinterface0 as $defaultinterface) {
 echo "<!-- Default interface $defaultinterface -->";
}
 
 ?>
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>

<script>
    setTimeout(function(){ 
$( "#liveband" ).load( "/pages/bw/band.txt" );
    }, 1500);  
</script>

<script language="javascript" type="text/javascript">
setInterval(function(){
$( "#datausage" ).load( "/pages/refresh/home-datausage.php" );
$( "#infosystem" ).load( "/pages/refresh/home-info.php" );
}, 5000);
</script>
 
 
 
 
 
 
 
       <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
          <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" id="liveband">
<div style="height: 150px;"></div>

          </div>
          <div class="demo-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--8-col">
        
<form id="myForm" action="" method="post">
<div id="indexstyle">
<textarea id="ta" name="text"><?php echo htmlspecialchars($text) ?></textarea> 
</div>
<script src="/ace-builds/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
<script src="/ace-builds/textarea.js" type="text/javascript" charset="utf-8"></script>
<input type="submit" id="view-source" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored mdl-color-text--white" value="Save" />
</form>

          </div>
          <div class="demo-cards mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">
            <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop" id="datausage">
              <div class="mdl-card__title mdl-card--expand mdl-color--teal-300">
                <h2 >
				<?php echo exec("vnstat -i $defaultinterface --oneline | cut -d';' -f11"); ?>
				</h2>
              </div>
              <div class="mdl-card__supporting-text mdl-color-text--grey-600">
				<span style="float: left;">M. Download</span><span style="float: right;"><?php echo exec("vnstat -i $defaultinterface --oneline | cut -d';' -f9"); ?></span>
				<span style="float: left;clear: left;">D. Download</span><span style="float: right;"><?php echo exec("vnstat -i $defaultinterface --oneline | cut -d';' -f4"); ?></span>
				<span style="float: left;clear: left;"> &nbsp </span>
				<span style="float: left;clear: left;">M. Upload</span><span style="float: right;"><?php echo exec("vnstat -i $defaultinterface --oneline | cut -d';' -f10"); ?></span>
				<span style="float: left;clear: left;">D. Upload</span><span style="float: right;"><?php echo exec("vnstat -i $defaultinterface --oneline | cut -d';' -f5"); ?></span>
              </div>
              <div class="mdl-card__actions mdl-card--border">
                <a href="/ifconfig" class="mdl-button mdl-js-button mdl-js-ripple-effect">Details</a>
              </div>
            </div>
            <div class="demo-separator mdl-cell--1-col"></div>
            <div class="demo-options mdl-card mdl-color--deep-purple-500 mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--3-col-tablet mdl-cell--12-col-desktop">
              <div class="mdl-card__supporting-text mdl-color-text--blue-grey-50" id="infosystem">
                <h3 style="font-size: 25px">info</h3>
                <ul>
                  <li>
                    <span style="font-size:16px;float: left;">İp Adress:</span> <span style="float: right;"><?php echo exec("ifconfig $defaultinterface | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}'"); ?></span>
					
                  </li>
                  <li>
                    <span style="font-size:16px;float: left;clear: left;">Call Usage:</span> <span style="float: right;"><?php echo exec("ifconfig $defaultinterface | grep 'RX bytes' | cut -d'(' -f2 | cut -d')' -f1"); ?> </span>
                  </li>
                  <li>
                    <span style="font-size:16px;float: left;clear: left;">Call start at:</span> <span style="float: right;"><?php

$fh = fopen('/urouter/logs/pppoe-connected-at.txt','r');
while ($line = fgets($fh)) {
  // <... Do your work with the line ...>
  echo($line);
}
fclose($fh);
?> </span>
                  </li>
                  <li>
                    <span style="font-size:16px;float: left;clear: left;">Uptime:</span> <span style="float: right;"><?php
					$str   = @file_get_contents('/proc/uptime');
$num   = floatval($str);
$secs  = fmod($num, 60); $num = intdiv($num, 60);
$mins  = $num % 60;      $num = intdiv($num, 60);
$hours = $num % 24;      $num = intdiv($num, 24);
$days  = $num;
echo "$days day $hours hour $mins min";
					?></span>
                  </li>
                </ul>
              </div>
              <div class="mdl-card__actions mdl-card--border">
                <a href="/cpu-usage" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-color-text--blue-grey-50">Cpu Usage</a>
                <div class="mdl-layout-spacer"></div>
                <i class="material-icons">all_out</i>
              </div>
            </div>
          </div>
        </div>
      </main>

 
 
 
 
 
 
 


<?php include 'footer.php';?> 