<!doctype html>
<head>
  <?php
  	session_start();
    require_once 'connect.php';
	if(!isset($_SESSION['uid'])||!isset($_SESSION['pass'])){
			header("location:index.php");
	}
  include 'includes.php'; ?>
  <meta charset="utf-8">
  <title>Hotel Reservation</title>
  <link rel="stylesheet" href="css/jquery-ui.css">
  <script src="js/jquery-1.10.2.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/reserve.js"></script>
  <script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>
</head>

<body>
   <div id="wrapper">

   <div id="bar">
        <div id="container">
            <div id="loginContainer">
                 <a id="logoutButton" href="logOut.php"><span>Logout</span><em></em></a>
            </div>
            <body>
 	<div id="wrapper">
	<br/><br/><br/>

  	<div id="tabs">
          <ul>
            <li><a href="#tabs-1">All Rooms</a></li>
            <li><a href="#tabs-2">Available Rooms</a></li>
            <li><a href="#tabs-3">Reserved Rooms</a></li>
            <li><a href="#tabs-4">My Reservations</a></li>

          </ul>
              <div id="tabs-1">
                <?php
                  echo '<div id="myDivID">';
                      include 'includes/allRooms.php';
                  echo '</div>';
                ?>
              </div>

              <div id="tabs-2">
	               <?php
	                echo '<div id="myDivID">';
	                    include 'includes/availableRooms.php';
	                echo '</div>';
	              ?>
              </div>

               <div id="tabs-3">
	               <?php
	                echo '<div id="myDivID">';
	                    // include 'includes/reservedRooms.php';
                  include 'includes/reservedRooms.php';
	                echo '</div>';
	              ?>
              </div>

              <div id="tabs-4">
                 <?php
                  echo '<div id="myDivID">';
                      include 'includes/myReservations.php';
                  echo '</div>';
                ?>
                <?php require_once 'close.php'; ?>
              </div>

            </div>
           </div>
        </div>
		    </div>
		<hr id="divider"/>
		</div>
</body>
</html>