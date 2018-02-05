<?php
$ustmenu ='

    <a name="camerastart" href="?start" class="mdl-menu__item">Start Camera</a>
    <a name="camerastop" href="?stop" class="mdl-menu__item">Stop Camera</a>
';
 header('Content-Type: text/html; charset=utf-8');
 include 'header.php';?>
<main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
          <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" id="cameradiv" style="height:90vh;">
<!-- <iframe src="/deluge" class="iframesysteminfo" ></iframe> -->
<style>
img {
    display: block;
    margin: 0 auto;
}
</style>
<script>
function stopped() {
var para = document.createElement("h3");
var node = document.createTextNode("The camera server is not running. You can run it from the top right corner. If you see this when you run the camera server, try to refresh the page.");
para.appendChild(node);
var element = document.getElementById("cameradiv");
element.appendChild(para);
setTimeout(function() {
  location.reload();
}, 5000);
}
</script>
</head>

<img src="/ipcameralive" onerror="this.src='/images/camera.jpg' ; stopped()" alt="Live Stream" style="width:100%;max-height:90%">


<!-- 
make sure all html elements that have an ID are unique and name the buttons submit 
-->
<?php
    if (isset($_GET['start']))
    {
         exec('service motion start');
		 header("location:/camera");
    }
        if (isset($_GET['stop']))
    {
         exec('service motion stop');
		 header("location:/camera");
    }
?>

   
	</main>
	</div>
	</div>

<?php include 'footer.php';?> 