<?php
	error_reporting(1);
	
	session_start();
	
	
	$host = "localhost";
	$username = "root";
	$password = "";
	$database = "reddit";
	
	if ( $_SESSION["logged"] != "ok" ) {
	
	header("Location: register.php");
	
	}else{
		$login = $_SESSION["username"];
	}
	
	$connection = new mysqli($host,$username,$password,$database);
		if($connection->connect_error == true){
			echo"Erro ao conectar ao servidor";
		}
	if($_POST != NULL){
		$comment = $_POST["comment"];
		$id = $_GET["id"];
		$name = $_POST["name"];
		
		$password = MD5($password);
		$passwordconfirm = MD5($passwordconfirm);
		
		$sql = "INSERT INTO comment(comment,idpost,name)
							VALUES('$comment','$id','$name')";
							
		$return = $connection->query($sql);
		
		if($return == true){
			echo"<script>
						alert('Comment Created')
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
		<h1>Forum<br><a class='button button-primary' href='create.php'> Create Post</a> <button onclick=location.href='index.php'>Home </button></h1>
			<form method="POST"><legend> Create a comment</legend>
				<input class="u-full-width" type="text" value="<?php echo $login; ?>" name="name" readonly>
				<textarea class="u-full-width" placeholder="Your Comment" name="comment" required></textarea>
				<input class="button-primary" type="submit" value="Comment">
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