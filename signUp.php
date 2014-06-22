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
		}else {
			echo "<div id = 'failed'> Login Failed </div>";
	
		
	}
}
?>
<html>

<?php /*
	$link = mysql_connect('192.168.178.164', 'root', '');
	$db_selected = mysql_select_db('reservation', $link);
	$queryResult = mysql_query("Select * from user;");
	echo "<table><tr><td>id</td><td>username</td></tr>";
	while($row = mysql_fetch_assoc($queryResult)) {         
        	echo "<tr><td>".$row['account_id']."</td>";
		echo "<td>".$row['name']."</td></tr>";
    	} 
echo "</table>";
*/
	if (isset($_POST['submit'])){
		$username= $_POST["username"];
		$password = $_POST["password"];
		$email = $_POST["name"];

		if($username != null && $password !=null){
			require_once 'connect.php';
			$res = mysql_query("CALL isUserExist('$username')");
			if (!$res) {
				echo "CALL failed: " . mysql_error();
			}
			else{
				$row = mysql_fetch_assoc($res);
				if($row['doesexist']){
					echo "account already exist";
				}
				else{
					require_once 'close.php';
					require_once 'connect.php';
					if (!mysql_query("CALL addUser('$username' ,'$password', '$email')")){
						echo "CALL failed: " .  mysql_error();
					}
					else{
						echo "You are logged in";
						header("location:welcome.php");
					}
					require_once 'close.php';
				}
			}
			
		}else{
			echo "USERNAME or PASSWORD is EMPTY!";	
			?>
			<a href="index.php">Click here</a>
			<?php
		}
	}
?> 
	<head>
		<title>Sign Up</title>
		<link rel="stylesheet" href="css/style.css" media="screen" type="text/css">
	</head>
	
	<body>
		<div id = "wrapper">
			<form action="add_user.php" method="post"  class="login-form">
			<div class="header">
				<h1>Login Form</h1>
				<span>Fill out the form below to Sign Up to Amazing Hotel.</span>
			</div>

			<div class="content">
			Username:
			<input name="username" type="text" class="input username" placeholder="Username" />
			<div class="user-icon"></div>
			<br/>Password:
			<input name="password" type="password" class="input password" placeholder="Password" />
			<div class="pass-icon"></div>		
			<br/>Full Name:
			<input name="name" type="text" class="input name" placeholder="Name" />
			<div class="name-icon"></div>
			</div>

			<div class="footer">
			<input type="submit" name="submit" value="Register" class="signup"  style="padding-left: 80px;" />
			</div>
			</form>
		</div>
</body>
</html>