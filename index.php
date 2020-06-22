<?php include 'header.php';?>
</head>
<body>
<div class="container">
<br><br>
<h3>Cadastro de Alunos</h3>
  <form action="salvar.php" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Nome</label>
      <input type="text" class="form-control" name="nome" placeholder="Nome Aluno" required="">
    </div>
    <div class="form-group col-md-2">
      <label>Data de nascimento</label>
      <input type="date" class="form-control" name="data" required="">
    </div>
     <div class="form-group col-md-1">
      <label>Idade</label>
      <input type="number" class="form-control" name="idade" placeholder="Idade" required="">
    </div>
    <div class="form-group col-md-2">
      <label>Sexo</label>
      <select name="sexo" class="form-control" required="">
        <option selected></option> 
        <option>F</option>
        <option>M</option>
        <option>N</option> 
      </select>
    </div>
  </div>

 <div class="form-row">
  <div class="form-group col-md-6">
    <label>Nome da Mãe </label>
    <input type="text" class="form-control" name="mae" placeholder="Nome Mãe" required="">
  </div>

  <div class="form-group col-md-5">
    <label>Nome do Pai </label>
    <input type="text" class="form-control" name="pai" placeholder="Nome Pai" required="">
  </div>
 </div>
 
 <div class="form-row">
  <div class="form-group col-md-6">
    <label>Endereço</label>
    <input type="text" class="form-control" name="endereco" placeholder="Endereço" required="">
  </div>
  
  <div class="form-group col-md-2">
    <label>Bairro</label>
    <input type="text" class="form-control" name="bairro" placeholder="Bairro" required="">
  </div>

  <div class="form-group col-md-2">
    <label>Cidade</label>
    <input type="text" class="form-control" name="cidade" placeholder="Cidade" required="">
  </div>

   <div class="form-group col-md-1">
    <label>Estado</label>
    <input type="text" class="form-control" name="estado" placeholder="Estado" required="">
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
    <label>Telefone</label>
    <input type="text" class="form-control" name="telefone1" placeholder="Telefone" required="">
    </div>

    <div class="form-group col-md-5">
    <label>Telefone 2</label>
    <input type="text" class="form-control" name="telefone2" placeholder="Telefone 2">
    </div>
  </div>

</div>

<label>Escolas que estudou</label>
  <div class="form-row">
    <div class="form-group col-md-6">
        <input type="text" class="form-control" name="sextoano" placeholder="6 Ano"> 
    </div>
    <div class="form-group col-md-5">
        <input type="text" class="form-control" name="setimoano" placeholder="7 Ano"> 
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
        <input type="text" class="form-control" name="oitavoano" placeholder="8 Ano"> 
    </div>
    <div class="form-group col-md-5">
        <input type="text" class="form-control" name="nonoano" placeholder="9 Ano"> 
    </div>
  </div>   

  <div class="form-row">
  <div class="form-group col-md-6">
      <label>Categoria de escola que concorrerá</label>
      <select name="tipoescola" class="form-control" required="">
        <option selected></option> 
        <option>Escola Pública</option>
        <option>Escola Privada</option>
      </select>
    </div>

    <div class="form-group col-md-4">
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
    <label>Modalidade de participação no processo</label>
      <select name="modalidade" class="form-control" required="">
        <option selected></option> 
        <option>Ampla Concorrência</option>
        <option>Cota</option>
      </select>
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

</div>
  </div>

  </div>
 
  </div>


</body>
</html>