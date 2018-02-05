<?php
function ş() {
//$date = new DateTime();
//echo $date->getTimestamp();
//echo "?ver=2";
}
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Router - Dijitaller.net</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="images/favicon.png">

    <link rel="stylesheet" href="/css/css.css<?php ş(); ?>">
    <link rel="stylesheet" href="/css/icon.css<?php ş(); ?>">
    <link rel="stylesheet" href="/css/material.min.css<?php ş(); ?>">
    <link rel="stylesheet" href="/css/styles.css<?php ş(); ?>">
	<link rel="stylesheet" href="/main.css">
	<link rel="stylesheet" href="/css/material-components-web.css">
	<script src="/css/material-components-web.js"></script>
	<script type="text/javascript" >var adr = window.location.protocol + "//" + window.location.host;</script>
	<style>
	pre {overflow-y: auto}
	</style>
<script type="text/javascript" src=" css/jquery.min.js"></script>

    <style>
    #view-source {
      position: fixed;
      display: block;
      right: 0;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 40px;
      z-index: 900;
    }
    </style>
	
  </head>
  <body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">Dijitaller.net Router System</span>
          <div class="mdl-layout-spacer"></div>
         
          <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
            <i class="material-icons">more_vert</i>
          </button>
          <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
            <?php echo "$ustmenu"; ?>
          </ul>
        </div>
      </header>
      <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        
        <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
          <a class="mdl-navigation__link" href="/"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i>Home</a>
		  <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">&#xE8BF;</i>Wifi</a>
          <a class="mdl-navigation__link" href="/internet"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">language</i>Internet</a>
		  <a class="mdl-navigation__link" href="/dhcp"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">&#xE8C1;</i>DHCP</a>
          <a class="mdl-navigation__link" href="/firewall"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">line_style</i>Firewall</a>
          <a class="mdl-navigation__link" href="/dns"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">dns</i>DNS</a>
          <a class="mdl-navigation__link" href="/torrent"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">play_for_work</i>Torrent</a>
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">settings</i>System</a>
          <a class="mdl-navigation__link" href="/iot"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">chrome_reader_mode</i>IOT Devices</a>
          <a class="mdl-navigation__link" href="/rota"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">all_out</i>Rota</a>
          <a class="mdl-navigation__link" href="/camera"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">videocam</i>Camera</a>
          <div class="mdl-layout-spacer"></div>
          <a class="mdl-navigation__link" href="/help"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">help_outline</i><span class="visuallyhidden">Help</span></a>
        </nav>
      </div>
	  <!-- 
	  Header Kısmı
	  -->