 <?php
    if (empty($_POST["parrola"])) {
    $parola = "PW not changed";
  } else {
    $parola = $_POST["parrola"];
	exec("printf '$parola\n$parola\n'| passwd admin");
header("location:/administration");
exit;
  }
  
?>

<?php

$ustmenu ='

';
 header('Content-Type: text/html; charset=utf-8');
 include 'header.php';?>
 
 


<main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
          

		  
		  
		  
		  
		  <!-- Wide card with share menu button -->
<style>
.demo-card-wide.mdl-card {
  width: 512px;
}
.demo-card-wide > .mdl-card__title {
  color: #fff;
  height: 176px;
  background: url('images/keys.jpeg') center / cover;
}
.demo-card-wide > .mdl-card__menu {
  color: #fff;
}
</style>

<div class="demo-card-wide mdl-card mdl-shadow--2dp">
  <div class="mdl-card__title">
    <h2 class="mdl-card__title-text" id="validate-status">Password Change</h2>
  </div>
  <form action="/administration?sent" method="post" >
  <div class="mdl-card__supporting-text">
   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="password" id="password1" name="parrola">
    <label class="mdl-textfield__label" for="password1">Password</label>
  </div>
  
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="password" id="password2" onkeyup="checkPasswordMatch();">
    <label class="mdl-textfield__label" for="password2">Re Type</label>
  </div>
  </div>
  <div class="mdl-card__actions mdl-card--border">
    <!--<a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"> </a>-->
     <button id="savedpw" class="mdl-button mdl-js-button mdl-button--primary" disabled type="sumbit">Save</button>
    
	</form>
  </div>
  <div class="mdl-card__menu">
    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" onclick="if (confirm('Dökümantastona gidiyormusunuz ?')) {
    location.href='http://google.com';
} else {
    alert('İptal edildi');
}">
      <i class="material-icons">help</i>
    </button>
  </div>
</div>
		  
		  

	  

	  
<!-- parola Doğrulama -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript"><!--
function checkPasswordMatch() {
    var password = $("#password1").val();
    var confirmPassword = $("#password2").val();

    if (password != confirmPassword) {
        $("#validate-status").html("Passwords do not match!");
		document.getElementById("savedpw").disabled = true;
    }
	else {
        $("#validate-status").html("Passwords match.");
	document.getElementById("savedpw").disabled = false;
	}
}
</script>
<!-- parola Doğrulama -->
	  
	  

	  
	  
	  
	  

<div id="savedpwok" class="mdl-js-snackbar mdl-snackbar">
  <div class="mdl-snackbar__text"></div>
  <button class="mdl-snackbar__action" type="button"></button>
</div>

<script>
(function() {
  'use strict';
  var snackbarContainer = document.querySelector('#savedpwok');
  var showSnackbarButton = document.querySelector('#savedpw');
  var handler = function(event) {
    showSnackbarButton.style.backgroundColor = '';
  };
  showSnackbarButton.addEventListener('click', function() {
    'use strict';
    
    var data = {
      message: 'Password Saved.',
      timeout: 2000,
      actionHandler: handler,
      actionText: 'Undo'
    };
    snackbarContainer.MaterialSnackbar.showSnackbar(data);
  });
}());
</script>	  
	  
	  
	  

	  
	  
	  
	  
	  
	  

	  
	  
	  
	  
	  <div id="ramusage" class="mdl-progress mdl-js-progress"></div>
	  
	  
	  
	<script>
	  document.querySelector('#ramusage').addEventListener('mdl-componentupgraded', function() {
    this.MaterialProgress.setProgress(<?php echo exec("free | grep Mem | awk '{print $3/$2 * 100.0}'"); ?>);
    this.MaterialProgress.setBuffer(<?php echo exec("free | grep Mem | awk '{print ($3+$7)/$2 * 100.0}'"); ?>);
  });
  </script>

	
   </div>
	</main>
	</div>
	</div>

<?php include 'footer.php';?> 