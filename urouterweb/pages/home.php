
<?php
$ustmenu ='<a href="https://www.google.com" class="mdl-menu__item">Reboot</a>
            <a href="/administration" class="mdl-menu__item">Administration</a>
            <a href="https://ahmetozer.org/project-view/home-router" class="mdl-menu__item">About</a>';
 header('Content-Type: text/html; charset=utf-8');
 include 'header.php';
/* 
  $defaultinterface0 = array();
exec("ip route | head -n1 | cut -d' ' -f 3", $defaultinterface0);
foreach($defaultinterface0 as $defaultinterface) {
 echo "<!-- Default interface $defaultinterface -->";
 
$exec_loads = sys_getloadavg();
$exec_cores = trim(shell_exec("grep -P '^processor' /proc/cpuinfo|wc -l"));
$cpuusage = round($exec_loads[1]/($exec_cores + 1)*100, 0) . '';

$exec_free = explode("\n", trim(shell_exec('free')));
$get_mem = preg_split("/[\s]+/", $exec_free[1]);
$memusage = round($get_mem[2]/$get_mem[1]*100, 0) . '';
}
 
$diskusage = exec("df / | tail -n +2 | awk '{print $5}' |sed 's/%//'");
 */
 ?>
 
<script>
function loadjsc(url, id) {
$.get(adr+url, function(data) {
			stat(id, data);		
 	});		
}

loadjsc("/device?memusage","memusage");
loadjsc("/device?cpuusage","cpuusage");
loadjsc("/device?diskusage","diskusage");
/*
$.get(adr+"/device?memusage", function(data) {
			stat('memusage', data);
 	});
$.get(adr+"/device?diskusage", function(data) {
			stat('diskusage', data);
 	});
*/
</script> 
<script>
 setTimeout(function(){ $( "#liveband" ).load( "/pages/bw/band.txt" );   }, 1500);  
</script>

<script>
var now = 0;
function wanipshow(){
var waniploc = document.getElementById('wanip2').value;
if (now == 0){
	$( "#wanip" ).html(waniploc);
	now = 1;
} else {
	$( "#wanip" ).html('Wanip hided');
	now = 0;
} }

function wanipcopy(){
var copyText = document.getElementById("wanip2");
  copyText.select();
  document.execCommand("Copy");
  alert("Your Wan IP adress:   " + copyText.value);
}
</script>


<script>
/*
function netspeed(speed) {
if ( 1000 > speed ) {
   return speed+'bps';
}else if ( 1000000 > speed ) {
   return speed/1000+'Kbps';
}else if ( 1000000000 > speed) {
   return speed/1000000+'Mbps';
}else if ( 1000000000000 > speed) {
   return speed/1000000000+'Gbps';
}else if ( 1000000000000000 > speed) {
   return speed/1000000000000+'Tbps';
}	
}
*/
/*
setInterval(function(){
/*$( "#datausage" ).load( "/pages/refresh/home-datausage.php" );
$( "#infosystem" ).load( "/pages/refresh/home-info.php" );


$.get(adr+"/device?netsdown=ppp0", function(data) {
	var hiz = netspeed(data);
			$( "#livespeed1" ).html(hiz);
			
 	});
}, 1000);
*/</script>

<script language="javascript" type="text/javascript">


function purplejsc(url, id) {
	$.get(adr+url, function(data) {
			$( "#"+id ).html(data);
 	});
}


async function purplearea() {
var defaultinterface = 'ppp0';
purplejsc("/device?uptime","uptime");	
purplejsc("/device?calltime","calltime");
purplejsc("/device?netmall="+defaultinterface,"netmall");
purplejsc("/device?netmdown="+defaultinterface,"netmdown");
purplejsc("/device?netddown="+defaultinterface,"netddown");
purplejsc("/device?netmup="+defaultinterface,"netmup");
purplejsc("/device?netdup="+defaultinterface,"netdup");
purplejsc("/device?system=pmu-temp","pmutemp");
purplejsc("/device?system=cpu-temp","cputemp");
purplejsc("/device?system=ac-watt","eusage");

/*
$.get(adr+"/device?uptime", function(data) {
			$( "#uptime" ).html(data);
 	});
$.get(adr+"/device?calltime", function(data) {
			$( "#calltime" ).html(data);
 	});
$.get(adr+"/device?netmall="+defaultinterface, function(data) {
			$( "#netmall" ).html(data);
 	});
$.get(adr+"/device?netmdown="+defaultinterface, function(data) {
			$( "#netmdown" ).html(data);
 	});
$.get(adr+"/device?netddown="+defaultinterface, function(data) {
			$( "#netddown" ).html(data);
 	});
$.get(adr+"/device?netmup="+defaultinterface, function(data) {
			$( "#netmup" ).html(data);
 	});
$.get(adr+"/device?netdup="+defaultinterface, function(data) {
			$( "#netdup" ).html(data);
 	});

$.get(adr+"/device?system=pmu-temp", function(data) {
			var temp = data / 1000;
			$( "#pmutemp" ).html(temp);
 	});
$.get(adr+"/device?system=cpu-temp", function(data) {
			var temp = data / 1000;
			$( "#cputemp" ).html(temp);
 	});
$.get(adr+"/device?system=ac-watt", function(data) {
			$( "#eusage" ).html(data);
 	});
*/
$.get(adr+"/device?wanip", function(data) {
			document.getElementById("wanip2").value = data;
			$( "#wanip" ).html('Wanip hided');
	});
	}
purplearea();
setInterval(function(){
/*$( "#datausage" ).load( "/pages/refresh/home-datausage.php" );
$( "#infosystem" ).load( "/pages/refresh/home-info.php" );
*/
purplearea();
}, 10000);
</script>
 
 
       <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
          <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" id="liveband">
			<div style="height: 150px;"></div>
				<h3 style="text-align: center;">Connection speed: </h3><h3 id="livespeed1">...</h3>
          </div>

			<div class="demo-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--8-col" >
				<h3 style="text-align: center;margin-top:0px;margin-bottom:15px;">System</h3>		  
			<div style="margin:0px;">

		<span class="mdl-chip mdl-chip--contact">
				<span class="mdl-chip__contact mdl-color--teal mdl-color-text--white" id="cpuusagetext"></span>
				<span class="mdl-chip__text">Cpu Usage</span>
		</span>
	        <div role="progressbar" class="mdc-linear-progress">
              <div class="mdc-linear-progress__buffering-dots"></div>
              <div class="mdc-linear-progress__buffer"></div>
              <div class="mdc-linear-progress__bar mdc-linear-progress__primary-bar" id="cpuusage" style="transform: scaleX(0.9);">
                <span class="mdc-linear-progress__bar-inner"></span>
              </div>
            </div>
         
		</br>
		<span class="mdl-chip mdl-chip--contact">
				<span class="mdl-chip__contact mdl-color--teal mdl-color-text--white" id="memusagetext"></span>
				<span class="mdl-chip__text">Memory Usage</span>
		</span>
			<div role="progressbar" class="mdc-linear-progress">
              <div class="mdc-linear-progress__buffering-dots"></div>
              <div class="mdc-linear-progress__buffer"></div>
              <div class="mdc-linear-progress__bar mdc-linear-progress__primary-bar" id="memusage" style="transform: scaleX(0.9);">
                <span class="mdc-linear-progress__bar-inner"></span>
              </div>
            </div>
		</br>
		<span class="mdl-chip mdl-chip--contact">
				<span class="mdl-chip__contact mdl-color--teal mdl-color-text--white" id="diskusagetext"></span>
				<span class="mdl-chip__text">Disk Usage</span>
		</span>
			<div role="progressbar" class="mdc-linear-progress">
              <div class="mdc-linear-progress__buffering-dots"></div>
              <div class="mdc-linear-progress__buffer"></div>
              <div class="mdc-linear-progress__bar mdc-linear-progress__primary-bar" id="diskusage" style="transform: scaleX(0.9);">
                <span class="mdc-linear-progress__bar-inner"></span>
              </div>
            </div>
		<div class="mdl-card__actions mdl-card--border"> 
			<section id="demo-textfield-wrapper" class=""  style="margin-left: 10px;">
				<h3 style="text-align: center;">Services</h3>
<?php
function sstat($sname) {
//$t = shell_exec("/urouter/uroutertmp/bin/urouter-tools service $sname");
exec("systemctl is-active $sname", $output2, $t);
if ( $t == 0) {
echo '
<span class="mdl-chip mdl-chip--contact">
    <span class="mdl-chip__contact mdl-color--green mdl-color-text--white"><i class="material-icons centeri">done</i></span>
    <span class="mdl-chip__text">'.$sname.'</span>
</span>';
} else {
    echo '
<span class="mdl-chip mdl-chip--contact">
    <span class="mdl-chip__contact mdl-color--red mdl-color-text--white"><i class="material-icons centeri">error</i></span>
    <span class="mdl-chip__text">'.$sname.'</span>
</span>';
}
}
sstat("bind9");
sstat("isc-dhcp-server");
sstat("isc-dhcp-server6");
sstat("radvd");
sstat("miredo");
sstat("smbd");
sstat("nmbd");
sstat("motion");
sstat("vnstat");
sstat("ntp");
?>   
			</section>
		</div>

		</div>
<script>
function stat(id, usage) {
	$( '#'+id+'text' ).html(usage);
	var scale = usage / 100;
	document.getElementById(id).style.transform = "scaleX("+scale+")";
	alert
};
</script>


 
		<!-- <a href="JavaScript: location.reload(true);" id="view-source" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored mdl-color-text--white" ><i class="material-icons">refresh</i></a>
-->

		
		
</div>


          <div class="demo-cards mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">
            <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop" id="datausage">
              <div class="mdl-card__title mdl-card--expand mdl-color--teal-300">
                <h2 id="netmall">
				Monthly Up+Down
				</h2>
              </div>
              <div class="mdl-card__supporting-text mdl-color-text--grey-600">
				<span style="float: left;">M. Download</span><span style="float: right;" id="netmdown">Monthly Download</span>
				<span style="float: left;clear: left;">D. Download</span><span style="float: right;" id="netddown">Daily Download</span>
				<span style="float: left;clear: left;"> &nbsp </span>
				<span style="float: left;clear: left;">M. Upload</span><span style="float: right;" id="netmup">Monthly Upload</span>
				<span style="float: left;clear: left;">D. Upload</span><span style="float: right;" id="netdup">Daily Upload</span>
              </div>
              <div class="mdl-card__actions mdl-card--border">
                <a href="/ifconfig" class="mdl-button mdl-js-button mdl-js-ripple-effect">Usage</a>
				<a href="/ifconfig" class="mdl-button mdl-js-button mdl-js-ripple-effect" style="display: none;">İfconfig</a>
				<input type="text" id="wanip2" style="display: none;" value="ip not detected" id="myInput"></input>
				<button href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect" onclick='wanipshow()' oncontextmenu="javascript:wanipcopy();return false;" id="wanip">IP loading</button>
              </div>
            </div>
            <div class="demo-separator mdl-cell--1-col"></div>
            <div class="demo-options mdl-card mdl-color--deep-purple-500 mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--3-col-tablet mdl-cell--12-col-desktop">
              <div class="mdl-card__supporting-text mdl-color-text--blue-grey-50" id="infosystem">
                <h3 style="font-size: 25px">info</h3>
                <ul>
                  <li>
                    <span style="font-size:16px;float: left;">CPU Temp</span> <span style="float: right;" id="cputemp">...</span>
				  </li>
                  
				  <li>
                    <span style="font-size:16px;float: left;clear: left;">PMU Temp</span> <span style="float: right;" id="pmutemp">...</span>
                  </li>
                  
				  <li>
                    <span style="font-size:16px;float: left;clear: left;">Watt</span> <span style="float: right;" id="eusage">...</span>
                  </li>
                  
				  <li>
                    <span style="font-size:16px;float: left;clear: left;">Uptime:</span> <span style="float: right;" id="uptime">...</span>
                  </li>
                
				</ul>
              </div>
              <div class="mdl-card__actions mdl-card--border">
                <a href="/cpu-usage" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-color-text--blue-grey-50">Cpu Usage</a>
				<a href="/system-info" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-color-text--blue-grey-50">System Info</a>
                <div class="mdl-layout-spacer"></div>
                <i class="material-icons">all_out</i>
              </div>
            </div>
          </div>
        </div>
      </main>

 
 
 
 
 
 


<?php include 'footer.php';?> 