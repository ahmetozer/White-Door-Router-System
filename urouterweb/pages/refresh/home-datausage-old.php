<?php
 $defaultinterface0 = array();
exec("ip route | head -n1 | cut -d' ' -f 3", $defaultinterface0);
foreach($defaultinterface0 as $defaultinterface) {
}
?>
              <div class="mdl-card__title mdl-card--expand mdl-color--teal-300">
                <h2 >
				<?php echo exec("vnstat -u && vnstat -i $defaultinterface --oneline | cut -d';' -f11"); ?>
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