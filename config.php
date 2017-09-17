<?php


$mysql_hostname = "localhost";


$mysql_user = "daeguuniv";

$mysql_password = "daeguuniv2016";


$mysql_database = "daeguuniv";


$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("db connect error");


mysql_select_db($mysql_database, $bd) or die("db connect error");

?>
