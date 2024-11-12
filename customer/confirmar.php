<?php  
$active = "Mi cuenta";
?>
<?php 
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Ruta a PHPMailer

if(!isset($_SESSION['cliente_email'])){
    echo "<script>window.open('../cerrar_sesion.php', '_self')</script>";
} else {
    include("../db.php");
    include("../functions/functions.php");

    if(isset($_GET['orden_id'])){
        $orden_id = $_GET['orden_id'];
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- head content aquí -->
</head>
<body>
    <!-- body content aquí -->
<?php 

$cliente_sesion = $_SESSION['cliente_email'];
$get_cliente = "SELECT * FROM customer WHERE cliente_email = '$cliente_sesion'";
$run_cliente = mysqli_query($con, $get_cliente);
$row_cliente = mysqli_fetch_array($run_cliente);
$cliente_id = $row_cliente['cliente_id'];

// Formulario de confirmación de pago
if(isset($_POST['confirm_payment'])){
    $orden_id = $_GET['orden_id'];
    $numero_fact = $_POST['Num_orden'];
    $cantidad = $_POST['cantidadEnv'];
    $metodo_pago = $_POST['modoPago'];
    $ref_no = $_POST['ref_no'];
    $fecha_pago = $_POST['date'];
    $complete = "Completado";
    
    // Inserción de datos en la base de datos (confirmación de pago y actualización de órdenes)
    $insert_payment = "INSERT INTO pagos (numero_factura, cantidad, metodo_pago, num_ref, fecha_pago) VALUES ('$numero_fact', '$cantidad', '$metodo_pago', '$ref_no', '$fecha_pago')";
    $run_payment = mysqli_query($con, $insert_payment);
    $update_customer_order = "UPDATE ordenes_cliente SET status='$complete' WHERE orden_id='$orden_id'";
    $run_customer_order = mysqli_query($con, $update_customer_order);
    $update_pending_order = "UPDATE ordenes_pendientes SET status='$complete' WHERE orden_id='$orden_id'";
    $run_pending_order = mysqli_query($con, $update_pending_order);

    // Obtener datos del cliente
    $query_cliente = "SELECT cliente_nombre, cliente_email FROM customer WHERE cliente_id = '$cliente_id'";
    $result_cliente = mysqli_query($con, $query_cliente);
    $cliente_data = mysqli_fetch_assoc($result_cliente);
    $nombre_cliente = $cliente_data['cliente_nombre'];
    $email_cliente = $cliente_data['cliente_email'];
    
    // Configuración de PHPMailer para enviar correo
    $mail = new PHPMailer(true);
    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'lautacamejo6@gmai.com';
        $mail->Password = 'jynqgpcsbphvkifs'; // Contraseña de la aplicación de Gmail
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Configuración del correo del cliente
        $mail->setFrom('no-reply@vicenta.com', 'Vicenta');
        $mail->addAddress($email_cliente);
        $mail->Subject = 'Confirmación de compra';
        $mail->Body = "Hola $nombre_cliente,\n\nGracias por tu compra. Aquí están los detalles de tu boleta:\nNúmero de orden: $numero_fact\nCantidad: $cantidad\nMétodo de pago: $metodo_pago\nReferencia: $ref_no\nFecha: $fecha_pago\n\nSaludos!";
        $mail->send();

        // Configuración del correo del vendedor
        $mail->clearAddresses(); // Limpiar la dirección del cliente
        $mail->addAddress('vicentita@gmail.com');
        $mail->Subject = 'Nueva compra realizada';
        $mail->Body = "Se ha realizado una nueva compra.\n\nDetalles de la compra:\nNúmero de orden: $numero_fact\nCliente: $nombre_cliente\nCantidad: $cantidad\nMétodo de pago: $metodo_pago\nReferencia: $ref_no\nFecha: $fecha_pago";
        $mail->send();

        echo "<script>alert('Gracias por tu compra, su pedido llegará en 3-4 días hábiles.')</script>";
        echo "<script>window.open('my_account.php?misOrdenes','_self')</script>";

    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }
}
?>
</body>
</html>
<?php } ?>
