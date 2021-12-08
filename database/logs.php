<?php
date_default_timezone_set("Asia/Bangkok");
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$log  = date("H:i:s").'  |  '.$_SERVER['REMOTE_ADDR'].'  |  '.$actual_link.'  |  '.$_SERVER['HTTP_USER_AGENT'].PHP_EOL;
file_put_contents('logs.txt', $log, FILE_APPEND);
?>