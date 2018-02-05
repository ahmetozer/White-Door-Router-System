<?php
ob_end_flush();
ini_set("output_buffering", "0");
ob_implicit_flush(true);

function pingtest()
{
    $proc = popen("ping -c 5 google.com", 'r');
    while (!feof($proc))
    {
        echo "[".date("i:s")."] ".fread($proc, 4096);
    }
}

?>
<!DOCTYPE html>
<html>
<body>
  <pre>
Immediate output: 
<?php
pingtest();
?>
  </pre>
</body>
</html>