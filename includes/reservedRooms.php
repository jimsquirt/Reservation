      <?php
      //Reserved Rooms
      //$thisUser = $_GET['username'];

      if(!($queryResult = mysql_query("SELECT room.room_no, room_type, room_charge, odate FROM room LEFT JOIN reservation on room.room_no = reservation.room_no WHERE reservation.room_no = room.room_no"))){
        echo "CALL failed: " .  mysql_error();
      }
      else{
        echo "<table id='keywords' cellspacing='0' cellpadding='0'>
        <thead>
          <tr>
            <th><span>Room No.</span></th>
            <th><span>Room Type</span></th>
            <th><span>Room Charge</span></th>
            <th><span>Date</span></th>
          </tr>";

        $num=mysql_num_rows($queryResult);
        if(0==$num){
          echo "<span style='color:red;'>No records found.</span>";
          exit;
        }
        else{
          while($row = mysql_fetch_assoc($queryResult)) {
            echo "<tbody>
                <tr>";
            echo "<td>".$row['room_no']."</td>";
            echo "<td>".$row['room_type']."</td>";
            echo "<td>".$row['room_charge']."</td>";
            echo "<td>".$row['odate']."</td>";
            ?>
            <!--<form>
            <input type="button" value="RESERVE" onclick="msg()">
            </form> -->

			<?php
            echo "</tr>";
          }
        }
      }
        echo "</table>";
      ?>