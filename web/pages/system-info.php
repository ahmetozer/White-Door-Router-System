<?php

$ustmenu ='

';
 header('Content-Type: text/html; charset=utf-8');
 include 'header.php';?>
 
 


<main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
<div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" id="liveband">
			
				<h3 style="text-align: center;">Router <font style="color: rgb(0, 150, 136)"><?php echo gethostname(); ?></font></h3>
          </div>
		  
<div class="demo-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--8-col" >
<div class="demo-options mdl-card mdl-color--light-green-500 mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--3-col-tablet mdl-cell--12-col-desktop" style="width: 100%">
              <div class="mdl-card__supporting-text mdl-color-text--blue-grey-50" id="infosystem">
                <h3 style="font-size: 25px">CPU</h3>
                <ul>
                  <pre>
<?php system('lscpu'); ?>
                  </pre>
				</ul>
              </div>
</div>	

<div class="demo-options mdl-card mdl-color--orange-500 mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--3-col-tablet mdl-cell--12-col-desktop" style="width: 100%">
              <div class="mdl-card__supporting-text mdl-color-text--blue-grey-50" id="infosystem">
                <h3 style="font-size: 25px">Disk</h3>
                <ul>
                  <pre>
<?php system('lsblk'); ?>
                  </pre>
				</ul>
              </div>
</div>	






</div>

 <div class="demo-cards mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet mdl-grid ">
 <div class="demo-separator mdl-cell--1-col"></div>
<div class="demo-options mdl-card mdl-color--red-500 mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--3-col-tablet mdl-cell--12-col-desktop">
              <div class="mdl-card__supporting-text mdl-color-text--blue-grey-50" id="infosystem">
                <h3 style="font-size: 25px">Power & Temp</h3>
                <ul>
                  <li>
                    <span style="font-size:16px;float: left;">CPU Temp</span> <span style="float: right;" id="cputemp">...</span>
				  </li>
                  
				  <li>
                    <span style="font-size:16px;float: left;clear: left;">PMU Temp</span> <span style="float: right;" id="pmutemp">...</span>
                  </li>
                  
				  <li>
                    <span style="font-size:16px;float: left;clear: left;">AC Voltage</span> <span style="float: right;" id="acvoltage">...</span>
                  </li>
                  
				  <li>
                    <span style="font-size:16px;float: left;clear: left;">AC Amperage</span> <span style="float: right;" id="acamperage">...</span>
                  </li>
				  <li>
                    <span style="font-size:16px;float: left;clear: left;">PMU Voltage</span> <span style="float: right;" id="pmuvoltage">...</span>
                  </li>
				  <li>
                    <span style="font-size:16px;float: left;clear: left;">Watt:</span> <span style="float: right;" id="eusage">...</span>
                  </li>
				  <li>
                    <span style="font-size:16px;float: left;clear: left;">Uptime:</span> <span style="float: right;" id="uptime">...</span>
                  </li>
                
				</ul>
              </div>
             </div>
<div class="demo-options mdl-card mdl-color--grey-500 mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--3-col-tablet mdl-cell--12-col-desktop">
              <div class="mdl-card__supporting-text mdl-color-text--blue-grey-50" id="infosystem">
                <h3 style="font-size: 25px">Kernel Parameters</h3>
                <ul>
                  <li>
                    <span style="font-size:12px;float: left;"><?php echo file_get_contents('/proc/cmdline') ?></span>
				  </li>
                        
				</ul>
              </div>
             </div>

			 <div class="demo-options  mdl-color--blue-grey-500 mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--3-col-tablet mdl-cell--12-col-desktop" >
                <div class="mdl-card__actions mdl-card--border">
                <a href="/ifconfig" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-color-text--blue-grey-50">Interfaces</a>
				<a href="/system-info-all" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-color-text--blue-grey-50">lshw</a>
                <div class="mdl-layout-spacer"></div>
                <i class="material-icons">more_horiz</i>
              </div>
            </div>
			 
			
</div>
<script language="javascript" type="text/javascript">
async function purplearea() {
$.get(adr+"/device?uptime", function(data) {
			$( "#uptime" ).html(data);
 	});
$.get(adr+"/device?system=ac-voltage", function(data) {
	data = data / 1000000;
			$( "#acvoltage" ).html(data);
 	});
$.get(adr+"/device?system=ac-amperage", function(data) {
	data = data / 1000000;
			$( "#acamperage" ).html(data);
 	});
$.get(adr+"/device?system=pmu-voltage", function(data) {
	data = data / 1000000;
			$( "#pmuvoltage" ).html(data);
 	});
$.get(adr+"/device?wanip", function(data) {
			$( "#wanip" ).html(data);
 	});
$.get(adr+"/device?wanip", function(data) {
			$( "#wanip" ).html(data);
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
}
purplearea();
</script>
	
   </div>
	</main>
	</div>
	</div>

<?php include 'footer.php';?> 