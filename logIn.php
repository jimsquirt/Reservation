 <?php
    session_start();
      if ( isset($_SESSION['uid'])&&isset($_SESSION['pass'])){
        $username = $_SESSION['uid'];
        $password = $_SESSION['pass'];
        require_once 'connect.php';
        $sql = "SELECT * FROM `user` WHERE account_id='$username' and password='$password'";
        $result = mysql_query($sql) or die(mysql_error());
        $count = mysql_num_rows($result);
        require_once 'close.php';
        if ($count == 1){
          echo "You are logged in";
          header("location:welcome.php");
        }
      }


      require_once 'connect.php';
      if (isset($_POST['submit'])){
		  $username = $_POST['username'];
		  $password = $_POST['password'];

		  $sql = "SELECT * FROM `user` WHERE account_id='$username' and password='$password'";
		  $result = mysql_query($sql) or die(mysql_error());
		  $count = mysql_num_rows($result);
		  require_once 'close.php';
		  if ($count == 1){
			echo "You are logged in";
			$_SESSION['uid']= $username;
			$_SESSION['pass']= $password;
			header("location:welcome.php");
		  }else {
			echo "<div id = 'failed'> Login Failed </div>";
		  }
    }
  ?>