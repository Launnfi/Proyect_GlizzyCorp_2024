<?php 
include("../db.php");

if($_POST['dato'] == 'busca' && $_POST['busqueda'] != '') {
    $key = explode(" ", $_POST['busqueda']);
    $sql = "SELECT * FROM productos WHERE producto_titulo LIKE '%".$_POST['busqueda']."%' ";

    for ($i=0; $i < count($key); $i++) { 
        if(!empty($key[$i])) { 
            $sql .= " OR producto_titulo LIKE '%".$key[$i]."%'";
        }
    }

    $row_sql = mysqli_query($con, $sql);

    // Verificación de la consulta SQL y resultados
    if (!$row_sql) {
        echo "Error en la consulta: " . mysqli_error($con);
        exit;
    }

    if (mysqli_num_rows($row_sql) > 0) {
        echo "<table class='col-12 m-0 p-0'><tbody>";
        while ($row = mysqli_fetch_assoc($row_sql)) {
            echo "<tr>
                <th style='width: 60px;'>
                    <img src='images/".$row['producto_img1']."' width='50' height='65' alt='Producto'>
                </th>
                <td style='vertical-align: middle; text-align: left;'>
                    <p class='card-text'>".$row['producto_nombre']."<br></p>
                </td>
            </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "No se encontraron resultados para la búsqueda.";
    }
}