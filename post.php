<?php

error_reporting(1);

session_start();


$conexao = new mysqli( "localhost", "root", "", "reddit" );

if ( $conexao->connect_error == true ) {
	
	echo "Connection Error";

}

$id = $_GET["id"];

if ( $id == NULL ) {

	echo "Post doesn't Exist!";
	exit;

}

$sql = "SELECT * 
		FROM post
		WHERE id = '$id'";
		
$retorno = $conexao->query( $sql );

if ( $retorno == false ) {
	echo $conexao->error;
}

$registro = $retorno->fetch_array();

$id = $registro["id"];
$title = $registro["title"];
$brief = $registro["brief"];
$description = $registro["description"];
$login = $registro["name"];
?>
<html>
	<head>
		<title> <?php echo"$title"?> </title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="normalize.css">
		<link rel="stylesheet" href="skeleton.css">
		<style>
			h1{
				text-align:center;
			}
			.descriptionfieldset{
				border: 1px solid black;
				width:90%;
				height:50%;
				overflow:auto;
			}
			.commentfieldset{
				border: 1px solid #49d4ed;
				width: 90%;
				margin:left;
			}
			#deletebutton{
				margin-left:700px;
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
		<h1>Forum<br><a class='button button-primary' href='create.php'> Create Post</a>  <button onclick=location.href='index.php'>Home </button> </h1>
					<b>Name:</b>  <?php echo"$title"?><br>
					<b>Posted By:</b> <?php echo"$login";?>
					<fieldset class="descriptionfieldset" ><?php echo"$description"?></fieldset>
			<?php 
			session_start();	
			echo"</button><a class='button button-primary' href='comment.php?id=$id'> Comment</a>";
					if($_SESSION["username"] == "admin") {
						echo"</button><a class='button button-primary' href='delete.php?id=$id' id='deletebutton'> DELETE POST</a>";
					}else{
						
					}
			?><br>
			<br><h3>Comments</h3>
			<?php
				error_reporting(1);
					
			 $sql = "SELECT * FROM comment where idpost ='$id'";
			 $retorno = $conexao->query($sql);
			 if($retorno == false){
				 echo $conexao->error;
			 }
			
			while($registro = $retorno->fetch_array()){
				$name = $registro["name"];
				$comment = $registro["comment"];
				$idcomment = $registro["idpost"];
				$commentpoints = $registro["points"];
				$id = $registro["id"];
				
				if($commentpoints > -3){
				echo"<fieldset class='commentfieldset'><legend>$name</legend>
						$comment<br><br>
						<b>$commentpoints</b>";
						if($_SESSION["logged"] == "ok"){
							echo"
							<a href='upvote.php?id=$id'><img src='upvote.png' height='10' width='10'></img></a>
							<a href='downvote.php?id=$id'><img src='downvote.png' height='10' width='10'</img></a>
							";}
						echo"</fieldset>";
				}					
			}
			?>
			<footer>
				<p><?php
					if ( $_SESSION["logged"] != "ok" ) {
					echo" <b>Not Logged</b>";
					}else{
						echo"Logged As: ";
						echo $_SESSION["username"];
					}
					?>
				</p>
			</footer>
	</body>
</html>