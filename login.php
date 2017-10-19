<?php
	error_reporting(1);
	
	session_start();

	if($_POST != NULL){
		$host = "localhost";
		$username = "root";
		$password = "";
		$database = "reddit";
		
		$connection = new mysqli($host,$username,$password,$database);
		
		$login = $_POST["login"];
		$password = $_POST["password"];
		
		$password = md5($password);
		
		$sql = "SELECT * from user WHERE login = '$login' AND password = '$password'";
		$return = $connection->query($sql);
		
		if($register = $return->fetch_array()){
				$_SESSION["logged"] = "ok";
				$_SESSION["username"] = $login;
				header("Location:index.php");
		}else{
			echo"<script>
					alert('Incorrect Login');
				</script>";
		}
	}	
	if ( $_SESSION["logged"] == "ok" ) {
		header("Location:index.php");
	}
?>
<html>
	<head>
		<title> Log-in </title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="normalize.css">
		<link rel="stylesheet" href="skeleton.css">
		<style>
			h1{
				text-align:center;
			}
			footer {
				font-size: 0.75em;
				text-align: center;
				clear: both;
				padding-top: 50px;
				color: #ccc;
				background-color: #3acec2;
			}
			p{
				color:black;
				text-align: center;
				margin-bottom:100px;
			}
		</style>
	</head>
	<body>
		<h1>Login<br> <button onclick=location.href='index.php'>Home </button> <button onclick=location.href='register.php'>Create account </button></h1>
		<form method="POST"><legend>Log-in on your account</legend>
			<input class="u-full-width" type="text" placeholder="Login" name="login">
			<input class="u-full-width" type="password" placeholder="Password" name="password">
			<input class="button-primary" type="submit" value="Login">
		</form>
		<footer>
				<p><?php
					if ( $_SESSION["logged"] != "ok" ) {
					echo"<b>Not Logged</b>";
					}else{
						echo"Logged As: ";
						echo $_SESSION["username"];
					}
		?></p>
			</footer>
	</body>
</html>