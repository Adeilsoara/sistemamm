<?php
	$servidor = "localhost";
	$username = "root";
	$password = "root";
	$database = "mm_sist";

	$connection = mysqli_connect($servidor, $username, $password, $database);
	if (!$connection) {
		echo "Não conectado ";	
	}
?>
