<?php
	session_start();
	require_once 'connect.php';
	$roomno = $_POST['roomno'];
	$date = $_POST['date'];
	$uid = $_SESSION['uid'];
	  if(!($queryResult = mysql_query("INSERT INTO reservation (room_no, user, odate) VALUES ($roomno,'$uid','$date')"))){
		echo "CALL failed: " .  mysql_error();
	  }
	  else{
	  }
?>