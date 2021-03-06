  <?php include 'header.php';?>
  
  <script type="text/javascript">
        function Idade() {  
             hoje = new Date;  
             nascimento = new Date($("#nasc").val());  
             var diferencaAnos = hoje.getFullYear() - nascimento.getFullYear();  
             if (new Date(hoje.getFullYear(), hoje.getMonth(), hoje.getDate()) <  
                 new Date(hoje.getFullYear(), nascimento.getMonth(), nascimento.getDate()))  
               diferencaAnos--;  
             //alert("Idade do aluno: " + diferencaAnos + " anos");
             document.getElementById('idade2').value = diferencaAnos;
          }
  </script>
  
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
        <input type="date" class="form-control" name="data" required="" id="nasc" onfocus="Idade();" >
      </div>
      
      <div class="form-group col-md-1">
        <label>Idade</label>
        <input type="number" class="form-control" name="idade" placeholder="Idade" required="" onblur="Idade();" id="idade2">
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
      <input type="text" class="form-control" name="nomemae" placeholder="Nome Mãe" required="">
    </div>

    <div class="form-group col-md-5">
      <label>Nome do Pai </label>
      <input type="text" class="form-control" name="nomepai" placeholder="Nome Pai">
    </div>
   </div>
   
   <div class="form-row">
    <div class="form-group col-md-6">
      <label>Endereço</label>
      <input type="text" class="form-control" name="endereco" placeholder="Endereço" required="">
    </div>
    
    <div class="form-group col-md-2">
      <label>Bairro</label>
      <input type="text" class="form-control" name="bairro" placeholder="Bairro" >
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
      <label>Telefone(Obrigatório)</label>
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
    <div class="form-group col-md-3">
        <label>Categoria de escola que concorrerá</label>
        <select name="categoriaescola" class="form-control" required="">
          <option selected></option> 
          <option>Pública</option>
          <option>Privada</option>
        </select>
      </div>

      <div class="form-group col-md-2">
        <label>Curso</label>
        <select name="curso" class="form-control" required="">
          <option selected></option> 
          <option>Enfermagem</option>
          <option>Informática</option>
          <option>Administração</option> 
          <option>Comércio</option>
        </select>
      </div>

      <div class="form-group col-md-4">
      <label>Modalidade de participação no processo</label>
        <select name="tipoconcorrencia" class="form-control" required="">
          <option selected></option> 
          <option>AmplaConcorrência</option>
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