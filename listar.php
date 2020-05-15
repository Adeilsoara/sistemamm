<?php include 'header.php'; ?>

<?php

	include 'conexao.php';
	
 /* $sql = mysqli_query($connection, "SELECT * FROM aluno") 
    or die(mysqli_error($connection) //caso haja um erro na consulta 
  );*/

  $limit = isset($_POST["limite-paginas"]) ? $_POST["limite-paginas"] : 10;
  $page = isset($_GET['page']) ? $_GET['page'] : 1;
  $start = ($page - 1) * $limit;
  $result = $connection->query("SELECT * FROM ALUNO LIMIT $start, $limit");
  $alunos = $result->fetch_all(MYSQLI_ASSOC);

  $result1 = $connection->query("SELECT count(idaluno) AS id FROM ALUNO");
  $custCount = $result1->fetch_all(MYSQLI_ASSOC);
  $total = $custCount[0]['id'];
  $pages = ceil( $total / $limit );

  $Anterior = $page - 1;
  $Próximo = $page + 1;
 

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

  <div class="container">
    <h2 class="text-center">Alunos Cadastrados</h2>
    <div class="row">
      <div class="col-md-10">
        <nav aria-label="Page navigation">
          <ul class="pagination">
            <li>
              <a class="page-link" href="listar.php?page=<?= $Anterior; ?>" aria-label="Anterior">
                <span aria-hidden="true">&laquo; Anterior</span>
              </a>
            </li>
            <?php for($i = 1; $i<= $pages; $i++) : ?>
              <li ><a  class="page-link" href="listar.php?page=<?= $i; ?>"><?= $i; ?></a></li>
            <?php endfor; ?>
            <li>
              <a class="page-link" href="listar.php?page=<?= $Próximo; ?>" aria-label="Próximo">
                <span aria-hidden="true">Próximo &raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
      <div class="text-center" class="col-md-2">
        <form method="post" action="#" >
            <select name="limite-paginas" id="limite-paginas">
              <option disabled="disabled" selected="selected">---Limite Por Página---</option>
              <?php foreach([10,25, 50] as $limit): ?>
                <option <?php if( isset($_POST["limite-paginas"]) && $_POST["limite-paginas"] == $limit) echo "selected" ?> value="<?= $limit; ?>"><?= $limit; ?></option>
              <?php endforeach; ?>
            </select>
          </form>
        </div>
    </div>
	<br><br><br>
 <div class="container table-responsive">
  <h3>Lista de cadastrados</h3>
  
      <table id="" class="table table-hover table-sm">
            <thead>
                  <tr>
                      <th>Id</th>
                      <th>Nome</th>
                      <th>Curso</th>
                      <th>Endereco</th>
                      <th>Cidade</th>
                      <th>CEP</th>
                      <th>Opções</th>
                  </tr>
              </thead>
            <tbody>
              <?php foreach($alunos as $aluno) :  ?>
                <tr>
                  <td><?= $aluno['idaluno']; ?></td>
                  <td><?= $aluno['nome']; ?></td>
                  <td><?= $aluno['curso']; ?></td>
                  <td><?= $aluno['endereco']; ?></td>
                  <td><?= $aluno['cidade']; ?></td>
                  <td><?= $aluno['cep']; ?></td>
                  <td>
       
                   <a href="editar.php?editar=<?php echo $aluno['idaluno']; ?>" class="btn btn-sm btn-warning ">Editar</a>

                 </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>

          
    </div>

<script type="text/javascript">
  $(document).ready(function(){
    $("#limite-paginas").change(function(){
      $('form').submit();
    })
  })
</script>

 <a class="btn btn-sm btn-primary" href="index.php">Voltar</a> 

</div>

</body>

</html>