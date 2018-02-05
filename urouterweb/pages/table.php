<?php
$ustmenu ='<a name="torrentcalistir" href="?torrentstart" class="mdl-menu__item">Start Torrent</a>
    <a name="torrentidurdur" href="?torrentstop" class="mdl-menu__item">Stop Torrent</a>';
 header('Content-Type: text/html; charset=utf-8');
 include 'header.php';?>
 
 <script>
 function deleteRow(btn) {
  var row = btn.parentNode.parentNode;
  row.parentNode.removeChild(row);
}
 </script>
<main class="mdl-layout__content mdl-color--grey-100">
        <!--<div class="mdl-grid demo-content">
          <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" style="height:90vh;"> -->

		  
<table class="mdl-data-table  mdl-data-table--selectable mdl-shadow--2dp" style="margin: 1cm 1cm 1cm 1cm;" id="myTable">
  <thead>
    <tr>
      <th class="mdl-data-table__cell--non-numeric">İp Adress</th>
      <th>Port</th>
      <th>Type</th>
	  <th>Allow-Block</th>
	  <th><button class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored" onclick="myFunction();">+</button><th>
	</tr>

  </thead>
  <tbody>
  <tr>
      <td class="mdl-data-table__cell--non-numeric">
	<div class="mdl-textfield mdl-js-textfield">
    <input class="mdl-textfield__input" type="text" value="2001:470:783a::/48" pattern="^s*((([0-9A-Fa-f]{1,4}:){7}([0-9A-Fa-f]{1,4}|:))|(([0-9A-Fa-f]{1,4}:){6}(:[0-9A-Fa-f]{1,4}|((25[0-5]|2[0-4]d|1dd|[1-9]?d)(.(25[0-5]|2[0-4]d|1dd|[1-9]?d)){3})|:))|(([0-9A-Fa-f]{1,4}:){5}(((:[0-9A-Fa-f]{1,4}){1,2})|:((25[0-5]|2[0-4]d|1dd|[1-9]?d)(.(25[0-5]|2[0-4]d|1dd|[1-9]?d)){3})|:))|(([0-9A-Fa-f]{1,4}:){4}(((:[0-9A-Fa-f]{1,4}){1,3})|((:[0-9A-Fa-f]{1,4})?:((25[0-5]|2[0-4]d|1dd|[1-9]?d)(.(25[0-5]|2[0-4]d|1dd|[1-9]?d)){3}))|:))|(([0-9A-Fa-f]{1,4}:){3}(((:[0-9A-Fa-f]{1,4}){1,4})|((:[0-9A-Fa-f]{1,4}){0,2}:((25[0-5]|2[0-4]d|1dd|[1-9]?d)(.(25[0-5]|2[0-4]d|1dd|[1-9]?d)){3}))|:))|(([0-9A-Fa-f]{1,4}:){2}(((:[0-9A-Fa-f]{1,4}){1,5})|((:[0-9A-Fa-f]{1,4}){0,3}:((25[0-5]|2[0-4]d|1dd|[1-9]?d)(.(25[0-5]|2[0-4]d|1dd|[1-9]?d)){3}))|:))|(([0-9A-Fa-f]{1,4}:){1}(((:[0-9A-Fa-f]{1,4}){1,6})|((:[0-9A-Fa-f]{1,4}){0,4}:((25[0-5]|2[0-4]d|1dd|[1-9]?d)(.(25[0-5]|2[0-4]d|1dd|[1-9]?d)){3}))|:))|(:(((:[0-9A-Fa-f]{1,4}){1,7})|((:[0-9A-Fa-f]{1,4}){0,5}:((25[0-5]|2[0-4]d|1dd|[1-9]?d)(.(25[0-5]|2[0-4]d|1dd|[1-9]?d)){3}))|:)))(%.+)?s*(\/([0-9]|[1-9][0-9]|1[0-1][0-9]|12[0-8]))?$" id="sample2" min="1" max="65535">
   <label class="mdl-textfield__label" for="sample2"></label>
    <span class="mdl-textfield__error">Input is not a ip adress</span>
    </div>
    
	</td>
	
      <td class="mdl-data-table__cell--non-numeric">
	<div class="mdl-textfield mdl-js-textfield">
    <input class="mdl-textfield__input" type="number" value="15" pattern="-?[0-9]*(\.[0-9]+)?" id="sample2" min="1" max="65535">
    <label class="mdl-textfield__label" for="sample2"></label>
    <span class="mdl-textfield__error">Input is not a Port</span>
    </div>
	  
	  </td>
      <td>
<select name="type">
  <option value="volvo">TCP</option>
  <option value="saab">UDP</option>
  <option value="mercedes">TCP-UDP</option>
  <option value="audi">ALL</option>
</select> 
	 
	</td>
	
	<td>
	<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-1-allow" style="margin: 10px;">
      <input type="radio" id="option-1-allow" class="mdl-radio__button" name="alb-1" value="allow" checked>
      <span class="mdl-radio__label">Allow</span>
    </label>
	
	<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-1-block" style="margin: 10px;">
      <input type="radio" id="option-1-block" class="mdl-radio__button" name="alb-1" value="block">
      <span class="mdl-radio__label">Block</span>
    </label>
	</td>
	<td><button class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored" onclick="deleteRow(this)">-</button><td>
    </tr>
    <tr>
      <td class="mdl-data-table__cell--non-numeric">
	<div class="mdl-textfield mdl-js-textfield">
    <input class="mdl-textfield__input" type="text" value="10.0.0.0/24" pattern="^(?=\d+\.\d+\.\d+\.\d+($|\/))(([1-9]?\d|1\d\d|2[0-4]\d|25[0-5])\.?){4}(\/([0-9]|[1-2][0-9]|3[0-2]))?$" id="sample2" min="1" max="65535">
   <label class="mdl-textfield__label" for="sample2"></label>
    <span class="mdl-textfield__error">Input is not a ip adress</span>
    </div>
    
	</td>
	
      <td class="mdl-data-table__cell--non-numeric">
	<div class="mdl-textfield mdl-js-textfield">
    <input class="mdl-textfield__input" type="number" value="2468" pattern="-?[0-9]*(\.[0-9]+)?" id="sample2" min="1" max="65535">
    <label class="mdl-textfield__label" for="sample2"></label>
    <span class="mdl-textfield__error">Input is not a Port</span>
    </div>
	  
	  </td>
      <td>
	  
	  <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-5" style="margin: 10px;">
      <input type="radio" id="option-5" class="mdl-radio__button" name="type" value="5">
      <span class="mdl-radio__label">TCP</span>
    </label>
	
	<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-1" style="margin: 10px;">
      <input type="radio" id="option-1" class="mdl-radio__button" name="type" value="1" checked>
      <span class="mdl-radio__label">UDP</span>
    </label>
	
	<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2" style="margin: 10px;">
      <input type="radio" id="option-2" class="mdl-radio__button" name="type" value="2">
      <span class="mdl-radio__label">TCP-UDP</span>
    </label>
	
	<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-3" style="margin: 10px;">
      <input type="radio" id="option-3" class="mdl-radio__button" name="type" value="3">
      <span class="mdl-radio__label">ALL</span>
    </label>
	</td>
	
	<td>
	<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-allow-1" style="margin: 10px;">
      <input type="radio" id="option-allow-1" class="mdl-radio__button" name="alb" value="allow">
      <span class="mdl-radio__label">Allow</span>
    </label>
	
	<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-block-1" style="margin: 10px;">
      <input type="radio" id="option-block-1" class="mdl-radio__button" name="alb" value="block" checked>
      <span class="mdl-radio__label">Block</span>
    </label>
	</td>
	<td><button class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored" onclick="deleteRow(this)">-</button><td>
    </tr>
    <tr>
      <td class="mdl-data-table__cell--non-numeric">10.0.0.5</td>
      <td>50</td>
      <td>UDP</td>
    </tr>
    <tr>
      <td class="mdl-data-table__cell--non-numeric">2a06:98c0::/29</td>
      <td>10</td>
      <td>Both</td>
	  
    </tr>
	
  </tbody>
  
</table>





<script>
function myFunction() {
$('#myTable tr:last').after('<tr><td class="mdl-data-table__cell--non-numeric">2a06:98c0::/29</td><td>10</td><td>Both</td></tr>');

}
</script>
 </div>
	</main>
	</div>
	</div>

<?php include 'footer.php';?> 