<?php
	session_start();
	require_once 'connect.php';
	$roomno = $_POST['roomno'];
	$date = $_POST['date'];
	$uid = $_SESSION['uid'];
	  if(!($queryResult = mysql_query("DELETE FROM reservation WHERE user='$uid' AND room_no=$roomno AND odate='$date'"))){
		echo "CALL failed: " .  mysql_error();
	  }
	  else{
	  }
?>