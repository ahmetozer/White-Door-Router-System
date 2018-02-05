<?php
// Set a valid header so browsers pick it up correctly.
header('Content-type: text/html; charset=utf-8');

// Emulate the header BigPipe sends so we can test through Varnish.
header('Surrogate-Control: BigPipe/1.0');

// Explicitly disable caching so Varnish and other upstreams won't cache.
header("Cache-Control: no-cache, must-revalidate");

// Setting this header instructs Nginx to disable fastcgi_buffering and disable
// gzip for this request.
header('X-Accel-Buffering: no');

$string_length = 32;
echo 'Begin test with an ' . $string_length . ' character string...<br />' . "\r\n";

// For 3 seconds, repeat the string.
for ($i = 0; $i < 3; $i++) {
  $string = str_repeat('.', $string_length);
  echo $string . '<br />' . "\r\n";
  echo $i . '<br />' . "\r\n";
  flush();
  sleep(1);
}

echo 'End test.<br />' . "\r\n";
?>