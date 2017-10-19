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
	
	if ( $_SESSION["logged"] != "ok" ) {
		header("Location:register.php");
	}else{
		$login = $_SESSION["username"];
	}
	
	if($_POST != NULL){
		$title = $_POST["title"];
		$description = $_POST["description"];
		
		$sql = "INSERT INTO post(title,description,name)
							VALUES('$title','$description','$login')";
							
		$return = $connection->query($sql);
		
		if($return == true){
			echo"<script>
						alert('Post Created')
						location.href='index.php'
					</script>";	
		}else{
			echo"<script>
					alert('Error creating Post')
				</script>";
				echo $conexao->error;
		}
	}
?>
<html>
	<head>
		<title> Creating Post </title>
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
			#contentid{
					height:200px;
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
		<h1>Post Creation<br> <button onclick=location.href='index.php'>Home </button></h1>
			<form method="POST"><legend>Post Creation</legend>
				<input class="u-full-width" type="text" value="<?php echo $login; ?>" name="login" readonly>
				<input class="u-full-width" type="text" placeholder="Title of your post" name="title" required>
				<textarea class="u-full-width" placeholder="Post Content" name="description" id="contentid" required></textarea>
				<input class="button-primary" type="submit" value="Create Post">
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