<?php include 'header.php';?>
<?php
include 'conexao.php';

if (isset($_GET['editar'])) {
		$id = $_GET['editar'];
		$sql = mysqli_query($connection, "SELECT * FROM ALUNO, NOTAS WHERE idaluno=$id and fk_idaluno=$id");

    $count = (is_array($sql)) ? count($sql) :1 ;
		if ($count) {
			$n = mysqli_fetch_array($sql);
			$nome = $n['nome'];
			$curso = $n['curso'];
			$endereco = $n['endereco'];
			$cidade = $n['cidade'];
			$cep = $n['cep'];

			$fisica = $n['fisica'];
			$historia = $n['historia'];
			$portugues = $n['portugues'];
			$matematica = $n['matematica'];
		}
	}

if (isset($_POST['editar'])) {
    $id = $_POST['idaluno'];
    $nome = $_POST['nome'];
    $curso = $_POST['curso'];
    $endereco = $_POST['endereco'];
    $cidade = $_POST['cidade'];
    $cep = $_POST['cep'];

    $fisica = $_POST['fisica'];
    $historia = $_POST['historia'];
    $portugues = $_POST['portugues'];
    $matematica = $_POST['matematica'];

    mysqli_autocommit($connection, FALSE);
    $erro = 0;
    // Querys
    $query1 = "UPDATE ALUNO SET nome='$nome', curso='$curso', endereco='$endereco', cidade='$cidade', cep='$cep' WHERE idaluno=$id";
    $query2 = "UPDATE NOTAS SET fisica = '$fisica', historia = '$historia', portugues = '$portugues', matematica = '$matematica' where fk_idaluno = $id";
    // Teste de execução das querys
    if (!mysqli_query($connection, $query1))
        $erro++;
    if (!mysqli_query($connection, $query2))
        $erro++;
    // Se não ocorrer erros executamos o commit para o banco de dados caso contrários desfazemos qualquer alteração
    if ($erro == 0) {
        mysqli_commit($connection);
        //echo "Transação realizada com sucesso, dados atualizados!"; 
        header('location: listar.php');
    } else {
        mysqli_rollback($connection);
        echo "Ocorrem $erro erro(s) na transação e não foi possível atualizar os dados.";
    }
  }
?>
<body>
	<div class="container">
<br><br>
<h3>Edição de Aluno</h3>
  <form action="editar.php" method="POST">
  	<input type="hidden" name="idaluno" value="<?php echo $id; ?>">
  	 <div class="form-row">
    <div class="form-group col-md-6">
      <label>Nome</label>
      <input type="text" class="form-control" name="nome" value="<?php echo $nome; ?>">
    </div>
    <div class="form-group col-md-6">
      <label>Curso</label>
      <span> <?php echo $curso; ?></span>
      <select name="curso" class="form-control" required="">
        <option></option> 
        <option value="Informática" <?=($curso == 'Informática')?'selected':''?> >Informática</option>
        <option value="Enfermagem" <?=($curso == 'Enfermagem')?'selected':''?> >Enfermagem</option>
        <option value="Administração" <?=($curso == 'Administração')?'selected':''?> >Admistração</option>
        <option value="Comércio" <?=($curso == 'Comércio')?'selected':''?> >Comércio</option>
      </select>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
    <label>Endereço</label>
    <input type="text" class="form-control" name="endereco" placeholder="Endereço" required="" value="<?php echo $endereco; ?>" >
  </div>

  <div class="form-group col-md-2">
    <!-- <label>Telefone</label>
    <input type="text" class="form-control" name="telefone" placeholder="Telefone"> -->
  </div>
 </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Cidade</label>
      <input type="text" class="form-control" name="cidade" required="" value="<?php echo $cidade; ?>">
    </div>
    
    <div class="form-group col-md-2">
      <label>CEP</label>
      <input type="text" class="form-control" name="cep" value="<?php echo $cep; ?>">
    </div>

  </div>
  <h4>Notas do Aluno</h4>
  <div class="form-row">
  <div class="form-group col-md-2">
      <label>Português</label>
      <input type="number" placeholder="0.00" step="0.01" min="0.00" max="10.00" class="form-control" name="portugues" required="" value="<?php echo $portugues; ?>">
  </div>

  <div class="form-group col-md-2">
      <label>Matemática</label>
      <input type="number" placeholder="0.00" step="0.01" min="0.00" max="10.00" class="form-control" name="matematica" required="" value="<?php echo $matematica; ?>">
  </div>

   <div class="form-group col-md-2">
      <label>Física</label>
      <input type="number" placeholder="0.00" step="0.01" min="0.00" max="10.00" class="form-control" name="fisica" required="" value="<?php echo $fisica; ?>">
  </div>
   <div class="form-group col-md-2">
      <label>História</label>
      <input type="number" placeholder="0.00" step="0.01" min="0.00" max="10.00" class="form-control" name="historia" required="" value="<?php echo $historia; ?>">
  </div>
 </div>
  <br>	

  <button type="submit" class="btn btn-primary" name="editar">Editar</button>

  <a href="listar.php" class="btn btn-danger">Cancelar</a>
</form>
 
</div>
</body>
</html>