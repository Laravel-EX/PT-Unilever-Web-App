<?php 
date_default_timezone_set("Asia/Jakarta");
$date1 = "2014-03-07 05:49:23";
$date2 = "2014-03-08 05:49:23";
$seconds = strtotime($date2) - strtotime($date1);
$hours = $seconds / 3600;
echo $hours;
?>