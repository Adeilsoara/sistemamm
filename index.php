<?php include 'header.php'; ?>
</head>
<body>
	<div class="container">
<br><br>
<h3>Cadastro de Alunos</h3>
  <form action="salvar.php" method="POST">
  	 <div class="form-row">
    <div class="form-group col-md-6">
      <label>Nome</label>
      <input type="text" class="form-control" name="nome" required="">
    </div>
    <div class="form-group col-md-6">
      <label>Curso</label>
      <select name="curso" class="form-control" required="">
        <option selected></option> 
        <option>Enfermagem</option>
        <option>Informática</option>
        <option>Administração</option> 
        <option>Comércio</option>
      </select>
    </div>
  </div>
 <div class="form-row">
  <div class="form-group col-md-6">
    <label>Endereço</label>
    <input type="text" class="form-control" name="endereco" placeholder="Endereço" required="">
  </div>

  <div class="form-group col-md-2">
    <!-- <label>Telefone</label>
    <input type="text" class="form-control" name="telefone" placeholder="Telefone"> -->
  </div>
 </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Cidade</label>
      <input type="text" class="form-control" name="cidade" required="">
    </div>
    
    <div class="form-group col-md-2">
      <label>CEP</label>
      <input type="text" class="form-control" name="cep">
    </div>

  </div>
  <h4>Notas do Aluno</h4>
  <div class="form-row">
  <div class="form-group col-md-2">
      <label>Português</label>
      <input type="number" placeholder="0.00" step="0.01" min="0.00" max="10.00" class="form-control" name="portugues" required="">
  </div>

  <div class="form-group col-md-2">
      <label>Matemática</label>
      <input type="number" placeholder="0.00" step="0.01" min="0.00" max="10.00" class="form-control" name="matematica" required="">
  </div>

   <div class="form-group col-md-2">
      <label>Física</label>
      <input type="number" placeholder="0.00" step="0.01" min="0.00" max="10.00" class="form-control" name="fisica" required="">
  </div>
   <div class="form-group col-md-2">
      <label>História</label>
      <input type="number" placeholder="0.00" step="0.01" min="0.00" max="10.00" class="form-control" name="historia" required="">
  </div>
 </div>
  <br>	
  <button type="submit" class="btn btn-primary" name="enviar">Salvar</button>
  </form>
</div>
</body>
</html>