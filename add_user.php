<html>
<body>

<?php 
	//variables
	$username= $_POST["username"];
	$password = $_POST["password"];
	$email = $_POST["name"];
	
	//db connection
	$link = mysql_connect('localhost', 'root', '');
	$db_selected = mysql_select_db('reservation', $link);
	
	
	if($username != null && $password !=null){
		$account_distinct = "SELECT account_id FROM user WHERE account_id = '$username'";
		$result = mysql_query($account_distinct);
		
		if(mysql_num_rows($result) > 0){
			echo "USERNAME ALREADY EXISTS!";	
			?>
			<a href="index.php">Click here</a>
			<?php
		}else{
			$sql = 	"INSERT INTO `user`(`account_id`, `password`, `name`) VALUES ('$username' ,'$password', '$email')";
			mysql_query($sql);
			header("location:welcome.php")
			?>
			<?php
		}
	}else{
		echo "USERNAME or PASSWORD is EMPTY!";	
		?>
		<a href="index.php">Click here</a>
		<?php
	}
	
	//db close
	mysql_close($link)
?> 

</body>
</html>