<?php 
include("../db.php");

if($_POST['dato'] == 'busca' && $_POST['busqueda'] != '') {
    $key = explode(" ", $_POST['busqueda']);
    
    // Preparar la consulta inicial
    $sql = "SELECT * FROM productos WHERE producto_titulo LIKE ?";
    $params = array('%' . $_POST['busqueda'] . '%'); // Parametros iniciales

    for ($i = 0; $i < count($key); $i++) { 
        if (!empty($key[$i])) { 
            $sql .= " OR producto_titulo LIKE ?";
            $params[] = '%' . $key[$i] . '%'; // Añadir cada término de búsqueda
        }
    }

    // Preparar la consulta
    $stmt = mysqli_prepare($con, $sql);
    // Vincular parámetros
    mysqli_stmt_bind_param($stmt, str_repeat("s", count($params)), ...$params);

    // Ejecutar consulta
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<table class='col-12 m-0 p-0'><tbody>";
        while ($row = mysqli_fetch_assoc($result)) {
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

    mysqli_stmt_close($stmt);
}
?>
