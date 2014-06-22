 <?php
    //Available Rooms
   //$thisUser = $_GET['username'];
    if(!($queryResult = mysql_query("SELECT room.room_no, room_type, room_charge FROM room LEFT JOIN reservation on room.room_no = reservation.room_no WHERE reservation.room_no IS NULL"))){
      echo "CALL failed: " .  mysql_error() . $connection;
    }
    else{
         echo "<center><input type='date' name='cdate' id='cdate'/></center><br/>";
      echo "<table id='keywords' name='keywords' cellspacing='0' cellpadding='0'>
             <thead>
          <tr>
            <th><span>Room No.</span></th>
            <th><span>Room Type</span></th>
            <th><span>Room Charge</span></th>";

		if(isset($_SESSION['uid'])&&isset($_SESSION['pass'])){
			echo "<th><span></span></th>";
			$uid = $_SESSION['uid'];
		}
        echo "</tr>";
    echo "</table>";
    }
?>
