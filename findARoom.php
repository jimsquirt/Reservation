<?php
	session_start();
	$cdate = $_POST['date'];
	require_once 'connect.php';
    if(!($queryResult = mysql_query("SELECT distinct(room.room_no), room_type, room_charge FROM room LEFT JOIN reservation on room.room_no = reservation.room_no WHERE reservation.room_no NOT IN (SELECT room_no FROM reservation WHERE odate = '$cdate')  or reservation.room_no IS NULL"))){
      echo "CALL failed: " .  mysql_error() . $connection;
    }
	else{
	  	echo"<thead>
          <tr>
            <th><span>Room No.</span></th>
            <th><span>Room Type</span></th>
            <th><span>Room Charge</span></th>";

		if(isset($_SESSION['uid'])&&isset($_SESSION['pass'])){
			echo "<th><span></span></th>";
			$uid = $_SESSION['uid'];
		}
        echo "</tr>";
      $num=mysql_num_rows($queryResult);
      if($num==0){
        echo "No record";
        exit;
      }
      else{
        while($row = mysql_fetch_assoc($queryResult)) {
          echo "<tbody>
                <tr><td>".$row['room_no']."</td>";
          echo "<td>".$row['room_type']."</td>";
          echo "<td>".$row['room_charge']."</td>";
          echo "<td>";
		if(isset($_SESSION['uid'])&&isset($_SESSION['pass'])){
			echo "
          <form>
            <input id='reserveButton' type='button' value='Reserve' onclick='reserve(".$row['room_no'].")'/>
          </form>";
		  }

          echo "</td>";
          echo "</tr>";
        }
      }
	  }
?>