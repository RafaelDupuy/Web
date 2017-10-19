<?php
	error_reporting(1);
	
	session_start();
	
	$host = "localhost";
	$username = "root";
	$password = "";
	$database = "reddit";
	
	$connection = new mysqli($host,$username,$password,$database);
		if($connection->connect_error == true){
			echo"Erro ao conectar ao servidor";
		}
	if($_POST != NULL){
		$name = $_POST["fullname"];
		$email = $_POST["email"];
		$login = $_POST["login"];
		$password = $_POST["password"];
		
		$password = MD5($password);
		$passwordconfirm = MD5($passwordconfirm);
		
		$sql = "INSERT INTO user(login,password)
							VALUES('$login','$password')";
							
		$return = $connection->query($sql);
		
		if($return == true){
			echo"<script>
						alert('Account Created')
						location.href='index.php'
					</script>";	
		}else{
			echo"<script>
					alert('Error creating account')
				</script>";
				echo $conexao->error;
		}
	}
?>
<html>
	<head>
		<title> Account Creation </title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="normalize.css">
		<link rel="stylesheet" href="skeleton.css">
		<style>
			h1{
				text-align:center;
			}
			form{
				margin: 0 auto;
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
		<h1>Account Creation<br> <button onclick=location.href='index.php'>Home </button> <button onclick=location.href='login.php'>Login </button></h1>
			<form method="POST"><legend>Register Account</legend>
				<input class="u-full-width" type="text" placeholder="Login" name="login">
				<input class="u-full-width" type="password" placeholder="Password" name="password">
				<input class="button-primary" type="submit" value="Create Account">
			</form>
			<footer>
				<p><?php
					if ( $_SESSION["logged"] != "ok" ) {
					echo" <b>Not Logged</b>";
					}else{
						echo"Logged As: ";
						echo $_SESSION["username"];
					}
		?></p>
			</footer>
	</body>
</html>