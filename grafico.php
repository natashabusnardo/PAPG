<html>
<head>
</head>
<body>
  <?php include 'menu.php'; ?>
  <form method="POST" action="">
  <fieldset>
  <legend>Gerador de gráfico</legend>
        <br><br>
        <label>Nome do arquivo a ser carregado: </label>
        <input id="nomearq" type="text" name="nomearq" placeholder="Nome do arquivo">
        <button type="submit" name="gerar" id="gerar">Gerar gráfico</button>
        <br><br>

	</form>	
  <?php
    @$nomeArq = $_POST['nomearq'];
    $arquivo = file_get_contents($nomeArq . ".json");
    $json = json_decode($arquivo);

    function format($json){
      for ($i=0; $i < count($json); $i++) { 
        @$dados .= "[". ($i+1) . ", ". $json[$i]."],\n";
      }
      return $dados;
    }
  ?>
</body>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Elemento');
      data.addColumn('number', 'Progressão');
  
      data.addRows([
        <?php echo format($json); ?>
      ]);

      var options = {
        chart: {
          title: 'Progressão',
          subtitle: 'aritmética ou geométrica'
        },
        width: 900,
        height: 500,
        axes: {
          x: {
            0: {side: 'top'}
          }
        }
      };

      var chart = new google.charts.Line(document.getElementById('line_top_x'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }
  </script>
  <div id="line_top_x"></div>
  </fieldset>
</html>

