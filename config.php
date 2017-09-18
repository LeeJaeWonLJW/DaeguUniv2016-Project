<?php


$mysql_hostname = "xxx";


$mysql_user = "xxx";

$mysql_password = "xxx";


$mysql_database = "xxx";


$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("db connect error");


mysql_select_db($mysql_database, $bd) or die("db connect error");

?>
