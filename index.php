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
		$login = $_POST["login"];
		$password = $_POST["password"];
		$slq = "SELECT * FROM user, post";
		$return = $connection->query($sql);
?>
<html>
	<head>
		<title> Forum </title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="normalize.css">
		<link rel="stylesheet" href="skeleton.css">
		<style>
			h1{
				text-align:center;
			}
			fieldset{
				border: 1px solid gray;
				width: 30%;
				margin: auto;
				margin-top: 50px;
				font-size: 24px;
			}
			legend{
				font-size: 28px;
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
		<h1>Forum<br>
		<?php
			if ( $_SESSION["logged"] != "ok" ) {
			echo"
			<a class='button button-primary' href='login.php'> Login</a>
			<button onclick=location.href='register.php'>Create account </button>";
			}else{
				echo"
				<a class='button button-primary' href='create.php'> Create Post</a>
				<button onclick=location.href='logout.php'>Log out </button>";}
		?></h1>
			<table class="u-full-width">
			<thread>
				<tr>
					<th>Post Name</th>
					<th>Posted By</th>
					<th>Points</th>
					<th>More</th>
				</tr>
			<?php

			error_reporting(1);

			$sql = "SELECT * 
					FROM post";

			$retorno = $connection->query( $sql );

			if ( $retorno == false ) {
				echo $conexao->error;
			}

			while ( $registro = $retorno->fetch_array() ) {

				$id = $registro["id"];
				$title = $registro["title"];
				$description = $registro["description"];
				$login = $registro["name"];
				$postpoints = $registro["points"];

				
				if($postpoints > -3){
				echo "<tr>
						<td>$title</td>
						<td>$login</td>
						<td>$postpoints</td>
						<td><a class='button button-primary' href='post.php?id=$id'> Expand</a>";
						if($_SESSION["logged"] == "ok"){
						echo"
						<a href='upvotepost.php?id=$id'><img src='upvote.png' height='20' width='20'></img></a>
						<a href='downvotepost.php?id=$id'><img src='downvote.png' height='20' width='20'</img></a></td>
				</tr>";}
				}
			}
			?>
			</table>
			<footer>
				<p><?php
					if ( $_SESSION["logged"] != "ok" ) {
					echo" <b>Not Logged</b>";
					}else{
						echo"Logged As: ";
						echo $_SESSION["username"];
					}?>
				</p>
			</footer>
	</body>
</html>