<?php 
session_start();
include("db.php");
include("functions/functions.php");

if(isset($_GET['c_id'])){
    $id_cliente = $_GET['c_id'];
}

$ip_add = getRealIpUser(); 
$estado = "Pendiente";
$num_fac = mt_rand();

// Asegúrate de que `$ip_add` se use correctamente
$select_cart = "SELECT * FROM cart WHERE ip_add = '$ip_add'"; // Cambiado aquí

$run_cart = mysqli_query($con, $select_cart);

while($row_cart = mysqli_fetch_array($run_cart)){
    $pro_id = $row_cart['p_id'];
    $pro_cant = $row_cart['cant'];
    $pro_talle = $row_cart['talle'];

    $get_producto = "SELECT * FROM productos WHERE producto_id = '$pro_id'";
    $run_producto = mysqli_query($con, $get_producto);

    while($row_producto = mysqli_fetch_array($run_producto)){
        $sub_total = $row_producto['producto_precio'] * $pro_cant;

        // Cambiar 'NOW()' a NOW() sin comillas
        $insertar_cli_ord = "INSERT INTO ordenes_cliente (cliente_id, monto, numero_orden, cant, tamaño, fecha_orden, estado) VALUES ('$id_cliente', '$sub_total', '$num_fac', '$pro_cant', '$pro_talle', NOW(), '$estado')";

        if (!mysqli_query($con, $insertar_cli_ord)) {
            echo "Error: " . mysqli_error($con);
        }

        $insertar_pend_ord = "INSERT INTO ordenes_pendientes (cliente_id, numero_orden, producto_id, cant, tamaño, estado) VALUES ('$id_cliente', '$num_fac', '$pro_id', '$pro_cant', '$pro_talle', '$estado')";

        if (!mysqli_query($con, $insertar_pend_ord)) {
            echo "Error: " . mysqli_error($con);
        }
    }
}

// Mover la eliminación del carrito fuera del bucle
$elim_cart = "DELETE FROM cart WHERE ip_add = '$ip_add'"; // Cambiado aquí

if (mysqli_query($con, $elim_cart)) {
    echo "<script>alert('Tus órdenes fueron enviadas. Gracias por su compra ☺️');</script>";
    echo "<script>window.open('customer/my_account.php?misOrdenes', '_self');</script>";
} else {
    echo "Error: " . mysqli_error($con);
}
?>
