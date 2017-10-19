<?php

error_reporting(1);

session_start();


if ( $_SESSION["username"] != "admin" ) {
	

	header("Location: index.php");
	
}


$conexao = new mysqli( "localhost", "root", "", "reddit" );


if ( $conexao->connect_error == true ) {
	
	echo "Connection Error";

}


$id = $_GET["id"];

if ( $id == NULL ) {

	echo "Post doesn't exist";
	exit;

}

$sql = "UPDATE post SET points = points + 1 
		WHERE id = '$id'";

$retorno = $conexao->query( $sql );

if ( $retorno == true ) {
	echo "<script>
			location.href='index.php';
		  </script>";

} else {

	echo "<script>
			alert('Error!');
		  </script>";
	
	echo $conexao->error;
	
}
?>