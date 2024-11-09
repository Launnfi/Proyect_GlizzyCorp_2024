<?php
include("includes/db.php");
if (!$con) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Ciudad", "Cantidad de Clientes", { role: "style" }],
        
        <?php 
        // Consulta SQL para contar la cantidad de clientes (id_cliente) en cada ciudad
        $clientes = "SELECT cliente_ciudad, COUNT(cliente_id) as cantidad FROM customer GROUP BY cliente_ciudad";
        $get_clientes = mysqli_query($con, $clientes);
        if (!$con) {
            die("Error de conexión: " . mysqli_connect_error());
        }

        // Configuración de colores para cada ciudad
        $colores = ["#b87333", "silver", "gold", "#e5e4e2"];
        $i = 0;

        while ($result = mysqli_fetch_assoc($get_clientes)) {
            $ciudad = $result['cliente_ciudad'];
            $cantidad = $result['cantidad'];  // Cantidad calculada por el conteo de id_cliente
            $color = $colores[$i % count($colores)];  // Usa un color del array en orden
            echo "['" . $ciudad . "', " . $cantidad . ", '" . $color . "'],";
            $i++;
        }
        ?>
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Cantidad de Clientes por Ciudad",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };

      var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
      chart.draw(view, options);
    }
</script>

<div id="barchart_values" style="width: 600px; height: 400px;"></div>
</head>
<body>
    
</body>
</html>