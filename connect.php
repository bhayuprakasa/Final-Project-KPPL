<?php
$host = 'localhost';
$user ='root';
$pass = '';
$db = 'kppl';
mysql_connect($host,$user,$pass) or die (mysql_error());
mysql_select_db('kppl');
?>