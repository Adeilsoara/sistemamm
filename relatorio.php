<?php include 'header.php'?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<title>Relatórios</title>
</head>
<body>
	<br><br><br>
 <div class="container table-responsive">
  <h3>Relatórios</h3>
  <table class="table table-hover table-sm ">
  	<thead>
	    <tr>
	        <th>Tipo</th>
	        <th>Curso</th>
	        <th>Relatórios</th>	      
	    </tr>
    </thead>
  
    <tr>
      <td>Classificação Geral</td>
      <td>Informática</td>
    
   	  <td>
        <a href="informatica_geral.php" target="_blank" class="btn btn-sm btn-warning">Gerar</a>
      </td>
    </tr>

    <tr>
      <td>Escola Privada</td>
      <td>Informática</td>
    
      <td>
        <a href="informatica_privada.php" target="_blank" class="btn btn-sm btn-warning">Gerar</a>
      </td>
    </tr>

    <tr>
      <td>Alunos Cotistas</td>
      <td>Informática</td>
    
      <td>
        <a href="informatica_privada.php" target="_blank" class="btn btn-sm btn-warning">Gerar</a>
      </td>
    </tr>
 
  </table>

 <a class="btn btn-sm btn-primary" href="index.php">Voltar</a> 

</div>
</body>
</html>