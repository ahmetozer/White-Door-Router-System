<?php

// configuration

$url = 'https://ahmetozer.org/urouter.php';
$url2 = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$parts = parse_url($url);
parse_str($parts['query'], $query);
$file = '/web/ahmetozer-org/urouters.html';

// check if form has been submitted
if (isset($_POST['text']))
{
    // save the text contents
    file_put_contents($file, $_POST['text']);

    // redirect to form again
    header(sprintf('Location: %s', $url));
    printf('<a href="%s">Moved</a>.', htmlspecialchars($url));
    exit();
}

// read the textfile
$text = file_get_contents($file);

?>
<!-- HTML form -->
<style type="text/css">
textarea {
  width: 100%;
  height: 92%;
		border:none;
		font-family: Verdana, Geneva, sans-serif;
		font-size: 20px;
		background-color: #38342D;
		color: white;
 margin: 0px;
}
body {
    background-color: #060807;
				 margin: 0px;
}
.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 1% 1%;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
   # margin: 4px 2px;
    cursor: pointer;
				 margin: 0px;
}
</style>
<form action="" method="post">

<textarea name="text" ><?php echo htmlspecialchars($text) ?></textarea>

<input type="submit" class="button" value="Kaydet"/>
<input type="reset" class="button" value="Geri al"/>
</form>
<?php 
echo "$url2"; 
?>
