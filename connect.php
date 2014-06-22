<?php
$connection = mysql_connect('192.168.178.164', 'root', '');
if (!$connection){
    die("Database Connection Failed" . mysql_error());
}
if(!isset($select_db)){
	$select_db = mysql_select_db('reservation', $connection);
}
if (!$select_db){
    die("Database Selection Failed" . mysql_error());
}
?>