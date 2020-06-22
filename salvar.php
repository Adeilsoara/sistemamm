<?php
	include 'bd/conexao.php';
	//Dados Aluno
	$nome = $_POST['nome'];
	$data_nasc = $_POST['data'];
	$idade = $_POST['idade'];
	$sexo = $_POST['sexo'];
	$nome_mae = $_POST['mae'];
	$nome_pai = $_POST['pai'];
	$endereco = $_POST['endereco'];
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];
	$estado = $_POST['estado'];
	$telefone1 = $_POST['telefone1'];
	$telefone2 = $_POST['telefone2'];
	$curso = $_POST['curso'];
	$categoria_escola = $_POST['tipoescola'];
	$modalidade = $_POST['modalidade'];
	
	//Dados Histórico
	$sextoano = $_POST['sextoano'];
	$setimoano = $_POST['setimoano'];
	$oitavoano = $_POST['oitavoano'];
	$nonoano = $_POST['nonoano'];
	
	//Dados de Notas
	$fisica = $_POST['fisica'];
	$historia = $_POST['historia'];
	$portugues = $_POST['portugues'];
	$matematica = $_POST['matematica'];
	
	
	 if (mysqli_query($connection, "INSERT INTO ALUNO(nome, curso, endereco, cidade, data_nasc, idade, sexo, nome_mae, nome_pai, bairro, estado, telefone_1, telefone_2, categoria_escola, tipo_concorrencia) VALUES ('$nome', '$curso', '$endereco', '$cidade', '$data_nasc', '$idade', '$sexo', '$nome_mae', '$nome_pai', '$bairro', '$estado', '$telefone1', '$telefone2', '$categoria_escola', '$modalidade')")) {
	 	 $id = mysqli_insert_id($connection);
	     $sql = mysqli_query($connection, "INSERT INTO NOTAS(fisica, historia, portugues, matematica, fk_idaluno) VALUES ('$fisica', '$historia', '$portugues', '$matematica', '$id')");
	     $sql2 = mysqli_query($connection, "INSERT INTO HISTORICO (sexto_ano, setimo_ano, oitavo_ano, nono_ano, fk_idaluno) VALUES ('$sextoano', '$setimoano', '$oitavoano', '$nonoano', '$id')");
	    header('location: index.php');
	 }
?>