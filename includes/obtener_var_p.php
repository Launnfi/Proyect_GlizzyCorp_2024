<?php
include("../db.php");

if (isset($_POST['talle']) && isset($_POST['product_id'])) {
    $talle = $_POST['talle'];
    $product_id = $_POST['product_id'];

    // Consulta para obtener los precios de la variante seleccionada
    $query = "SELECT precio_var AS price, var_precio_of AS sale_price 
              FROM variantes 
              WHERE producto_id = '$product_id' AND talle  = '$talle'";
    
    $result = mysqli_query($con, $query);
    $data = mysqli_fetch_assoc($result);

    if ($data) {
        echo json_encode([
            'price' => $data['price'],
            'sale_price' => $data['sale_price']
        ]);
    } else {
        echo json_encode([
            'price' => null,
            'sale_price' => null
        ]);
    }
}
?>
