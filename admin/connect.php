<?php
$host = 'localhost';
$user ='root';
$pass = '';
$db = 'kedaionline';
mysql_connect($host,$user,$pass) or die (mysql_error());
mysql_select_db('kedaionline');
?>