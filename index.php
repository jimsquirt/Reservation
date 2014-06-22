<!doctype html>
<head>
	<?php include 'includes.php'; ?>
  <meta charset="utf-8">
  <title>jQuery UI Tabs - Default functionality</title>
  <link rel="stylesheet" href="css/jquery-ui.css">
  <script src="js/jquery-1.10.2.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/reserve.js"></script>
  <script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>
  <?php
    //session_start();
    require_once 'logIn.php';
  ?>

</head>

<body>
	 <div id="wrapper">

	 <div id="bar">
        <div id="container">
            <!-- Login Starts Here -->
            <div id="loginContainer">
                <a id="loginButton"><span>Login</span><em></em></a>
                <div style="clear:both"></div>
                <div id="loginBox">
                    <form id="loginForm" method='post' action='logIn.php'>
                        <fieldset id="body">
                            <fieldset>
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" placeholder = 'Username'/>
                            </fieldset>
                            <fieldset>
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" placeholder = 'Password'/>
                                <input name="token" type="hidden" value=""/>
                            </fieldset>
                            <input type="submit" name="submit" id="login" value="Sign in" />
                            <span><a href="signUp.php" style="text-decoration: underline; font-size: 12pt; ">Sign Up</a></span>
                        	</fieldset>
                    </form>
                </div>
            </div>
            <!-- Login Ends Here -->
            <body>
 <div id="wrapper">
 <br/><br/><br/>

   <div id="tabs">
          <ul>
            <li><a href="#tabs-1">All Rooms</a></li>
            <li><a href="#tabs-2">Available Rooms</a></li>
            <li><a href="#tabs-3">Reserved Rooms</a></li>
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
                    include 'includes/reservedRooms.php';
                echo '</div>';
        		require_once 'close.php';
              ?>
              </div>
            </div>
           </div>
        </div>
    </div>
<hr id="divider"/>
</div>
</body>
</html>