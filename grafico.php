<?php include 'header.php'; ?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Nome', 'Ranking Curso de Informática'],
        
          <?php
          include 'conexao.php';
          $sql2 = mysqli_query($connection, "SELECT nome, curso, round(sum(((fisica)+(historia)+(portugues)+(matematica))/4),2 ) AS media FROM ALUNO AS a INNER JOIN NOTAS AS n ON (a.idaluno = n.fk_idaluno) where curso like 'Info%' group by idaluno ORDER BY media ASC");
         
         
          while ($dados = mysqli_fetch_array($sql2) ) {
            //$curso =  $dados['curso'];
            $media =  $dados['media'];
            $nome =  $dados['nome'];

          ?>

          ['<?php echo $nome ?>', '<?php echo $media ?>' ],

        <?php } ?>
        
        ]);

        var options = {
          chart: {
            title: 'Sistema MM',
            subtitle: 'Nome e Média: 2021',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('grafico1'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Cursos', 'Total de Alunos por Curso'],
        
          <?php
          include 'conexao.php';
          $sql2 = mysqli_query($connection, "SELECT curso, count(curso) as qtd FROM aluno WHERE curso LIKE 'Enf%' GROUP BY curso UNION SELECT curso, count(curso) as qtd FROM aluno WHERE curso LIKE 'Info%' GROUP BY curso UNION SELECT curso, count(curso) as qtd FROM aluno WHERE curso LIKE 'Com%' GROUP BY curso UNION SELECT curso, count(curso) as qtd FROM aluno WHERE curso LIKE 'Adm%' GROUP BY curso ORDER BY qtd ASC");
         
          while ($dados = mysqli_fetch_array($sql2) ) {
            $curso =  $dados['curso'];
            $total =  $dados['qtd'];
          ?>

          ['<?php echo $curso ?>', '<?php echo $total ?>' ],

        <?php } ?>
        
        ]);

        var options = {
          chart: {
            title: 'Sistema MM',
            subtitle: 'Cursos e  Quantidade de Alunos: 2021',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('grafico2'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

  </head>
  <body>
    <div class="container">
    <div align="">
    <div id="grafico1" style="height: 300px;"></div>
    </div>
    <div id="grafico2" style="height: 300px;"></div>
    </div>
  </body>
</html>
