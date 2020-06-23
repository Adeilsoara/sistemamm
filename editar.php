<?php include 'header.php';?>
<?php
include 'bd/conexao.php';

if (isset($_GET['editar'])) {
		$id = $_GET['editar'];
		$sql = mysqli_query($connection, "SELECT * FROM ALUNO, NOTAS WHERE idaluno=$id and fk_idaluno=$id");
    
    $count = (is_array($sql)) ? count($sql) :1 ;
		if ($count) {
			$n = mysqli_fetch_array($sql);
      $nome = $n['nome'];
      $data = $n['data'];
      $idade = $n['idade'];
      $sexo = $n['sexo'];
      $nomemae = $n['nomemae'];
      $nomepai = $n['nomepai'];
      $endereco = $n['endereco'];
      $bairro = $n['bairro'];
      $cidade = $n['cidade'];
      $estado = $n['estado'];
      $telefone1 = $n['telefone1'];
      $telefone2 = $n['telefone2'];
      $curso = $n['curso'];
      $categoriaescola = $n['categoriaescola'];
      $tipoconcorrencia = $n['tipoconcorrencia'];

			$fisica = $n['fisica'];
			$historia = $n['historia'];
			$portugues = $n['portugues'];
			$matematica = $n['matematica'];
		}
	}

if (isset($_POST['editar'])) {
    $id = $_POST['idaluno'];
    $nome = $_POST['nome'];
    $data = $_POST['data'];
    $idade = $_POST['idade'];
    $sexo = $_POST['sexo'];
    $nomemae = $_POST['nomemae'];
    $nomepai = $_POST['nomepai'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $telefone1 = $_POST['telefone1'];
    $telefone2 = $_POST['telefone2'];
    $curso = $_POST['curso'];
    $categoriaescola = $_POST['categoriaescola'];
    $tipoconcorrencia = $_POST['tipoconcorrencia'];

    $fisica = $_POST['fisica'];
    $historia = $_POST['historia'];
    $portugues = $_POST['portugues'];
    $matematica = $_POST['matematica'];

    mysqli_autocommit($connection, FALSE);
    $erro = 0;
    // Querys
   /* $query1 = "UPDATE ALUNO SET nome = '$nome', data = '$data', idade= '$idade', sexo= '$sexo', nomemae= '$nomemae', nomepai = '$nomepai', endereco ='$endereco', bairro = '$bairro', cidade = '$cidade', estado= '$estado', telefone1 = '$telefone1', telefone2= '$telefone2', curso = '$curso', categoriaescola = '$categoriaescola', tipoconcorrencia = '$modalidade' WHERE idaluno=$id";*/

   // $query1 = "UPDATE ALUNO SET nome = '$nome', curso = '$curso' WHERE idaluno=$id";

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

      <div class="form-group col-md-2">
        <label>Data de Nascimento</label>
        <input type="date" class="form-control" name="data" value="<?php echo $data; ?>">
      </div>

      <div class="form-group col-md-1">
        <label>Idade</label>
        <input type="number" class="form-control" name="idade" value="<?php echo $idade; ?>">
      </div>

      <div class="form-group col-md-2">
      <label>Sexo</label>
        <select name="sexo" class="form-control" required="">
          <option></option> 
          <option value="F" <?=($sexo == 'F')?'selected':''?> >F</option>
          <option value="M" <?=($sexo == 'M')?'selected':''?> >M</option>
          <option value="N" <?=($sexo == 'N')?'selected':''?> >N</option> 
        </select>
      </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Nome da Mãe </label>
      <input type="text" class="form-control" name="nomemae" value="<?php echo $nomemae; ?>">
    </div>
    <div class="form-group col-md-5">
      <label>Nome do Pai </label>
      <input type="text" class="form-control" name="nomepai" value="<?php echo $nomepai; ?>" >
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Endereço</label>
      <input type="text" class="form-control" name="endereco" placeholder="Endereço" required="" value="<?php echo $endereco; ?>">
    </div>

    <div class="form-group col-md-2">
      <label>Bairro</label>
      <input type="text" class="form-control" name="bairro" placeholder="Bairro" required="" value="<?php echo $bairro; ?>">
    </div>

    <div class="form-group col-md-2">
      <label>Cidade</label>
      <input type="text" class="form-control" name="cidade" placeholder="Cidade" required="" value="<?php echo $cidade; ?>">
    </div>

    <div class="form-group col-md-1">
      <label>Estado</label>
      <input type="text" class="form-control" name="estado" placeholder="Estado" required="" value="<?php echo $estado; ?>">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-3">
    <label>Telefone</label>
    <input type="text" class="form-control" name="telefone1" placeholder="Telefone" required="" value="<?php echo $telefone1; ?>">
    </div>

    <div class="form-group col-md-3">
    <label>Telefone 2</label>
    <input type="text" class="form-control" name="telefone2" placeholder="Telefone 2" value="<?php echo $telefone2; ?>">
    </div>
  </div>

  <label>Escolas que estudou</label>
  <div class="form-row">
    <div class="form-group col-md-6">
        <input type="text" class="form-control" name="sextoano" placeholder="6 Ano" value="<?php echo $sextoano; ?>"> 
    </div>
    <div class="form-group col-md-5">
        <input type="text" class="form-control" name="setimoano" placeholder="7 Ano" value="<?php echo $setimoano; ?>"> 
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
        <input type="text" class="form-control" name="oitavoano" placeholder="8 Ano" value="<?php echo $oitavoano; ?>" > 
    </div>
    <div class="form-group col-md-5">
        <input type="text" class="form-control" name="nonoano" placeholder="9 Ano" value="<?php echo $nonoano; ?>"> 
    </div>
  </div>  
 
  <div class="form-row">
  <div class="form-group col-md-6">
      <label>Categoria de escola que concorrerá</label>
      <select name="categoriaescola" class="form-control" required="">
        <option></option> 
        <option value="Pública" <?=($categoriaescola == 'Pública')?'selected':''?>>Pública</option>
        <option value="Privada" <?=($categoriaescola == 'Privada')?'selected':''?>>Privada</option>
      </select>
    </div>

    <div class="form-group col-md-4">
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
    <label>Modalidade de participação no processo</label>
      <select name="tipoconcorrencia" class="form-control" required="">
        <option></option> 
        <option value="AmplaConcorrência" <?=($tipoconcorrencia == 'AmplaConcorrência')?'selected':''?>>AmplaConcorrência</option>
        <option value="Cota" <?=($tipoconcorrencia == 'Cota')?'selected':''?>>Cota</option>
      </select>
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