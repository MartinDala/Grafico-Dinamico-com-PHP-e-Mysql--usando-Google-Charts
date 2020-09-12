<?php 
include_once("conexao.php");
	
$nomes1= array();
$vendasl= array();
$stocksl= array();
$cor=array();
$cor[0]='#ff3300';
$cor[1]='#0000ff';


$i=0;
$sql="select * from produtos";
$resultado = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_object($resultado)){
$nomes=$row->nome;
$vendas=$row->venda;
$stocks=$row->stock;

$nomes1[$i]=$nomes;
$vendasl[$i]=$vendas;
$stocksl[$i]=$stocks;
$i=$i+1;

}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estatistica da Loja</title>
</head>
<body>
    <html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Produto', 'Vendas', 'Stock'],
          <?php
$k=$i;
for($i=0; $i<$k; $i++){
?>
          ['<?php echo $nomes1[$i] ?>','<?php echo intval($vendasl[$i])?>' ,'<?php echo intval( $stocksl[$i])?>'],
         
<?php } ?>
      
        ]);

        var options = {
          chart: {
            title: 'ESTATISTICA POR PRODUTO',
            subtitle: 'Todos dados da loja- Martin Dala',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
  </body>
</html>

</body>
</html>