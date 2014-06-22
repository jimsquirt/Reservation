 <?php
  $sql = "SELECT * FROM `room`";
  $result = mysql_query($sql) or die(mysql_error());

  echo "<table id='keywords' cellspacing='0' cellpadding='0'>
        <thead>
          <tr>
            <th><span>Room No.</span></th>
            <th><span>Room Type</span></th>
            <th><span>Room Charge</span></th>
          </tr><tbody>";

  while($row = mysql_fetch_assoc($result)) {
    echo "<tr><td class='lalign' style='text-align: center;'>".$row['room_no']."</td>";
        echo "<td>".$row['room_type']."</td>";
    	echo "<td>".$row['room_charge']."</td></tr>";
    }
  echo "</tbody></table>";
?>

