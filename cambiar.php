<?php 
session_start();

$active = 'Cart';

include("includes/db.php");
include("functions/functions.php");

?>

<?php 

// Verificamos si el cliente está autenticado a través de la sesión
if(isset($_SESSION['cliente_email'])){
    // Obtenemos el email del cliente desde la sesión
    $cliente_email = $_SESSION['cliente_email'];

    // Consultamos la base de datos para obtener el cliente_id
    $get_cliente_id = "SELECT cliente_id FROM clientes WHERE cliente_email='$cliente_email'";
    $run_cliente = mysqli_query($con, $get_cliente_id);
    if(mysqli_num_rows($run_cliente) > 0){
        $row_cliente = mysqli_fetch_array($run_cliente);
        $cliente_id = $row_cliente['cliente_id']; 
    } else {
        // Si no se encuentra el cliente, redirigimos al login
        echo "<script>alert('No se ha encontrado el cliente. Por favor, inicia sesión nuevamente.');</script>";
        echo "<script>window.open('customer/cerrar_sesion.php','_self');</script>";
        exit; // Detenemos la ejecución si no encontramos el cliente
    }
} else {
    // Si no está iniciada la sesión, redirigimos a login
    echo "<script>alert('Debes iniciar sesión para actualizar productos en el carrito');</script>";
    echo "<script>window.open('cerrar_sesion.php','_self');</script>";
    exit; // Detener la ejecución si no está autenticado
}

// Verificamos si se envió el formulario con los datos del producto
if(isset($_POST['id'])){

    // Obtenemos los datos del formulario
    $id = $_POST['id'];    // ID del producto
    $qty = $_POST['cant']; // Nueva cantidad del producto
    
    // Actualizamos la cantidad en el carrito usando el cliente_id
    $update_qty = "UPDATE cart SET cant='$qty' WHERE p_id='$id' AND cliente_id='$cliente_id'";

    // Ejecutamos la consulta
    $run_qty = mysqli_query($con, $update_qty);
    
    // Verificamos si la consulta se ejecutó correctamente
    if($run_qty){
        echo "<script>alert('La cantidad del producto ha sido actualizada en el carrito');</script>";
        echo "<script>window.open('cart.php','_self');</script>";
    } else {
        echo "<script>alert('Hubo un error al actualizar la cantidad. Intenta nuevamente.');</script>";
    }
}

?>
