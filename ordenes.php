<?php 
session_start();
include("db.php");
include("functions/functions.php");

if(isset($_GET['c_id'])){
    $id_cliente = $_GET['c_id'];
} else {
    $id_cliente = $_SESSION['cliente_id']; // Si no se pasa por GET, usar el ID de la sesión
}

$estado = "Pendiente";
$num_fac = mt_rand(); // Generar un número de factura aleatorio

// Iniciar una transacción
mysqli_begin_transaction($con);

try {
    $select_cart = "SELECT * FROM cart WHERE cliente_id = '$id_cliente'"; 
    $run_cart = mysqli_query($con, $select_cart);

    if (!$run_cart) {
        throw new Exception("Error al obtener el carrito: " . mysqli_error($con));
    }

    while($row_cart = mysqli_fetch_array($run_cart)){
        $pro_id = $row_cart['p_id'];
        $var_id = $row_cart['var_id'];
        $pro_cant = $row_cart['cant'];
        $pro_talle = $row_cart['talle'];
    
        // Obtener el título del producto
        $get_product_title = "SELECT producto_titulo FROM productos WHERE producto_id = '$pro_id'";
        $run_product_title = mysqli_query($con, $get_product_title);
    
        if (!$run_product_title) {
            throw new Exception("Error al obtener el título del producto: " . mysqli_error($con));
        }
    
        $row_product_title = mysqli_fetch_array($run_product_title);
        $pro_titulo = $row_product_title['producto_titulo'];
    
        // Ahora puedes usar $pro_titulo como el título del producto
    
        // Obtener los detalles de la variante desde la tabla 'variantes'
        $get_variante = "SELECT * FROM variantes WHERE var_id = '$var_id'";
        $run_variante = mysqli_query($con, $get_variante);
    
        if (!$run_variante) {
            throw new Exception("Error al obtener la variante: " . mysqli_error($con));
        }
    
        while($row_variante = mysqli_fetch_array($run_variante)){
            // Obtener el precio de la variante
            $var_precio = $row_variante['precio_var'];
            $stock_actual = $row_variante['stock_var'];
    
            if ($stock_actual < $pro_cant) {
                throw new Exception("No hay suficiente stock para la variante seleccionada.");
            }
    
            // Calcular el subtotal
            $sub_total = $var_precio * $pro_cant;
    
            // Insertar en ordenes_cliente
            $insertar_cli_ord = "INSERT INTO ordenes_cliente (cliente_id, var_id, monto, numero_orden, cant, tamaño, fecha_orden, status) VALUES ('$id_cliente', '$var_id', '$sub_total', '$num_fac', '$pro_cant', '$pro_talle', NOW(), '$estado')";
            if (!mysqli_query($con, $insertar_cli_ord)) {
                throw new Exception("Error al insertar en ordenes_cliente: " . mysqli_error($con));
            }
    
            // Insertar en ordenes_pendientes
            $insertar_pend_ord = "INSERT INTO ordenes_pendientes (cliente_id, numero_orden, producto_id, cant, tamaño, status) VALUES ('$id_cliente', '$num_fac', '$pro_id', '$pro_cant', '$pro_talle', '$estado')";
            if (!mysqli_query($con, $insertar_pend_ord)) {
                throw new Exception("Error al insertar en ordenes_pendientes: " . mysqli_error($con));
            }
    
            // Actualizar el stock de la variante
            $nuevo_stock = $stock_actual - $pro_cant;
            $actualizar_stock = "UPDATE variantes SET stock_var = '$nuevo_stock' WHERE var_id = '$var_id'";
            if (!mysqli_query($con, $actualizar_stock)) {
                throw new Exception("Error al actualizar el stock de la variante: " . mysqli_error($con));
            }
        }
    }
    

    // Eliminar productos del carrito
    $elim_cart = "DELETE FROM cart WHERE cliente_id = '$id_cliente'";
    if (!mysqli_query($con, $elim_cart)) {
        throw new Exception("Error al eliminar el carrito: " . mysqli_error($con));
    }

    // Confirmar la transacción
    mysqli_commit($con);

    echo "<script>alert('Tus órdenes fueron enviadas. Gracias por su compra ☺️');</script>";
    echo "<script>window.open('customer/my_account.php?misOrdenes', '_self');</script>";

} catch (Exception $e) {

    mysqli_rollBack($con);
    echo "Error: " . $e->getMessage();
}
?>