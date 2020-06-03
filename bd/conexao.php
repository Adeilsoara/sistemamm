<?php
	$servidor = "localhost";
	$username = "root";
	$password = "root";
	$database = "cadastro_mm";

	$connection = mysqli_connect($servidor, $username, $password, $database);
	if (!$connection) {
		echo "Não conectado ";	
	}
?>
