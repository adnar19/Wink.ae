<?php
$path = (!filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE))? 'http://127.0.0.1/wink/' : 'http://127.0.0.1/wink/';
define('url', $path);
/*-------DB----------------*/
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'wink');
define('DB_USER', 'root');
define('DB_PASS', '');
?>
