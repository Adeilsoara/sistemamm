<?php include 'header.php'; ?>
<?php

	include 'conexao.php';
	
  $sql = mysqli_query($connection, "SELECT * FROM aluno") 
    or die(mysqli_error($connection) //caso haja um erro na consulta 
  );
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

 
<title>Tabela</title>
</head>
<body>
	<br><br><br>
 <div class="container table-responsive">
  <h3>Lista de gabaritos cadastrados</h3>
  <table class="table table-hover table-sm ">
  	<thead>
	    <tr>
	      <td>Id</td>
        <td>Nome</td>
        <td>Curso</td>	      
	      <td>Endereço</td>
        <td>Cidade</td>
        <td>CEP</td>
        <td>Opções</td>
	    </tr>
    </thead>
    <?php while($dados = mysqli_fetch_assoc($sql)) { ?>
    <tr>
      <td><?php echo $dados['idaluno']; ?></td>
      <td><?php echo $dados['nome']; ?></td>
      <td><?php echo $dados['curso']; ?></td>
      <td><?php echo $dados['endereco']; ?></td>
      <td><?php echo $dados['cidade']; ?></td>
      <td><?php echo $dados['cep']; ?></td>
      <td>
       
        <a href="editar.php?id=<?php echo $questoes['id']; ?>" class="btn btn-sm btn-warning ">Editar</a>

        <!-- <a href="deletar.php?id=<?php echo $questoes['id']; ?>" class="btn btn-sm btn-danger " >Excluir</a> -->
        
        <!-- <img src="icons/icons/trash-fill.svg"> -->
      </td>
    </tr>
    <?php } ?>
  </table>


 <a class="btn btn-sm btn-primary" href="index.php">Voltar</a> 

</div>
</body>
</html>