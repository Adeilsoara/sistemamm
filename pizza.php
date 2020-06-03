<?php include 'bd/conexao.php';?>


<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Curso', 'Quantidade por curso'],
          ['Informatica',     11],
          ['Enfermagem',      2],
          ['Comercio',  2],
          ['Adiministração', 2]
         
        ]);

        var options = {
          title: 'Gráfico por curso'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>
