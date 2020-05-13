<?php
	include 'conexao.php';
	
	$nome = $_POST['nome'];
	$curso = $_POST['curso'];
	$endereco = $_POST['endereco'];
	$cidade = $_POST['cidade'];
	$cep = $_POST['cep'];

	$fisica = $_POST['fisica'];
	$historia = $_POST['historia'];
	$portugues = $_POST['portugues'];
	$matematica = $_POST['matematica'];

	
	if (mysqli_query($connection, "INSERT INTO ALUNO(nome, curso, endereco, cidade, cep) VALUES ('$nome', '$curso', '$endereco', '$cidade', '$cep')")) {   
	    $id = mysqli_insert_id($connection);
	    $sql = mysqli_query($connection, "INSERT INTO NOTAS(fisica, historia, portugues, matematica, fk_idaluno) VALUES ('$fisica', '$historia', '$portugues', '$matematica', '$id')");
	    header('location: index.php');
    }
	
		

?>