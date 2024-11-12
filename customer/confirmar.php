<?php 
$active = "Mi cuenta";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

?>
<?php 
session_start();

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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vicenta</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
   
   <div id="top">
       <div class="container">
           <div class="col-md-6 offer">
               <?php 
                   if(!isset($_SESSION['cliente_email'])){
                       echo "Bienvenido: Invitado";
                   }else{
                       echo "Bienvenido: " . $_SESSION['cliente_email'] . "";
                   }
               ?>
               <a href="checkout.php"><?php items(); ?> Productos en tu carrito | Total:  <?php echo mont_total(); ?> </a>
           </div>
           <div class="col-md-6">
               <ul class="menu">
                   <li><a href="../customer_register.php">Registrarme</a></li>
                   <li><a href="my_account.php">Mi cuenta</a></li>
                   <li><a href="../cart.php">Ir al Carrito</a></li>
                   <li><a href="../cerrar_sesion.php">Login</a></li>
               </ul>
           </div>
       </div>
   </div>
   
   <div id="navbar" class="navbar navbar-default">
       <div class="container">
           <div class="navbar-header">
               <a href="../index.php" class="navbar-brand home">
                   <img src="images/VicentaLogoAjustado.png" alt="VicentaLogo" class="hidden-xs" width=150px height=50px>
                   <img src="images/VicentaLogoAjustado.png" alt="VicentaLogo" class="visible-xs" width=150px height=50px>
               </a>
               <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                   <span class="sr-only">Buscar</span>
                   <i class="fa fa-align-justify"></i>
               </button>
               <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                   <span class="sr-only">Buscar</span>
                   <i class="fa fa-search"></i>
               </button>
           </div>
           
           <div class="navbar-collapse collapse" id="navigation">
               <div class="padding-nav">
                   <ul class="nav navbar-nav left">
                       <li class="<?= $active == 'Inicio' ? 'active' : '' ?>"><a href="../index.php">Home</a></li>
                       <li class="<?= $active == 'Comprar' ? 'active' : '' ?>"><a href="../tienda.php">Comprar</a></li>
                       <li class="<?= $active == 'Mi cuenta' ? 'active' : '' ?>"><a href="my_account.php">Mi cuenta</a></li>
                       <li class="<?= $active == 'Carrito' ? 'active' : '' ?>"><a href="../cart.php">Carrito</a></li>
                       <li class="<?= $active == 'Contactanos' ? 'active' : '' ?>"><a href="../contact.php">Contactanos</a></li>
                   </ul>
               </div>
               
               <a href="../cart.php" class="btn navbar-btn btn-primary right">
                   <i class="fa fa-shopping-cart"></i>
                   <span><?php items(); ?> Productos en tu carrito</span>
               </a>
               
               <div class="navbar-collapse collapse right">
                   <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search">
                       <span class="sr-only">Buscar</span>
                       <i class="fa fa-search"></i>
                   </button>
               </div>
               
               <div class="collapse clearfix" id="search">
                   <form method="get" action="results.php" class="navbar-form">
                       <div class="input-group">
                           <input type="text" class="form-control" placeholder="Search" name="user_query" required>
                           <span class="input-group-btn">
                               <button type="submit" name="search" value="Search" class="btn btn-primary">
                                   <i class="fa fa-search"></i>
                               </button>
                           </span>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>

   <div id="content">
    <div class="container">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="index.php">Inicio</a></li>
                <li>Mi cuenta</li>
            </ul>
        </div>
        
        <div class="col-md-3">
            <?php include("includes/sidebar.php"); ?>
        </div>
<?php 
 
 $clente_sesion = $_SESSION['cliente_email'];

 $get_cliente = "SELECT * FROM customer WHERE cliente_email = '$clente_sesion'";

 $run_cliente = mysqli_query($con, $get_cliente);

 $row_cliente = mysqli_fetch_array($run_cliente);

 $cliente_id = $row_cliente['cliente_id'];

 $get_orden = "SELECT * from ordenes_cliente WHERE cliente_id = '$cliente_id'";

 $run_orden = mysqli_query($con, $get_orden);

 $i = 0;

 while($row_orden = mysqli_fetch_array($run_orden)){

     $orden_id = $row_orden['orden_id'];

     $monto = $row_orden['monto'];

     $numero_orden = $row_orden['numero_orden'];

     $cant = $row_orden['cant'];

     $talla = $row_orden['tamaño'];

     $estado = $row_orden['status'];

     $fecha_orden = substr($row_orden['fecha_orden'],0,11);

     $i++;
 }

?>
        <div class="col-md-9">
            <div class="box">
                <h1 align="center">Por favor confirmar su pago</h1>

                <form action="confirmar.php?orden_id=<?php echo $orden_id; ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                        <label>N° de orden:</label>
                        <input type="text" class="form-control" name="Num_orden" required placeholder="<?php echo $numero_orden;  ?>">
                    </div>
                          
                    <div class="form-group">
                        <label>Cantidad a pagar:</label>
                        <input type="text" class="form-control" name="cantidadEnv" required placeholder="<?php echo $monto;  ?>">
                    </div>
                    
                    <div class="form-group">
                        <label>Metodo de pago</label>
                        <select name="modoPago" class="form-control">
                            <option>Seleccione metodo de pago</option>
                            <option>Pago expres</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Transaccion / id Referencia</label>
                        <input type="text" class="form-control" name="ref_no" required>
                    </div>
                    <div class="form-group">
                        <label>Fecha con la que se realizara el pago</label>
                        <input type="text" class="form-control" name="date" required>
                    </div>

                  
                    <div class="text-center">
                        <button type="submit" name="confirm_payment" class="btn btn-primary btn-lg">
                            <i class="fa fa-user-md"></i> Confirmar pago
                        </button>
                    </div>
                    </a>
                </form>
                

                <?php 
 if(isset($_POST['confirm_payment'])){

    $orden_id = $_GET['orden_id'];
    $numero_fact = $_POST['Num_orden'];
    $cantidad = $_POST['cantidadEnv'];
    $metodo_pago = $_POST['modoPago'];
    $ref_no = $_POST['ref_no'];
    $fecha_pago = $_POST['date'];
    $complete = "Completado";
    
    $insert_payment = "INSERT INTO pagos (numero_factura, cantidad, metodo_pago, num_ref, fecha_pago) VALUES ('$numero_fact', '$cantidad', '$metodo_pago', '$ref_no', '$fecha_pago')";
    
    $run_payment = mysqli_query($con, $insert_payment);
    if (!$run_payment) {
        die('Error en el pago: ' . mysqli_error($con));
    }

    $update_customer_order = "UPDATE ordenes_cliente SET status='$complete' WHERE orden_id='$orden_id'";
    $run_customer_order = mysqli_query($con, $update_customer_order);

    if (!$run_customer_order) {
        die('Error al actualizar el estado de la orden: ' . mysqli_error($con));
    }

    // Verifica si el pago está completo y redirige al cliente a "Mis órdenes"
    if($complete == "Completado"){
        echo "<script>alert('Pago realizado con éxito.')</script>";
        echo "<script>window.open('my_account.php?misOrdenes', '_self')</script>";
    }

    // Enviar correo de confirmación al cliente
    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true;
        $mail->Username = 'lautacamejo@gmail.com'; 
        $mail->Password = 'jynqgpcsbphvkifs'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('no-reply@tu_dominio.com', 'Vicenta');
        $mail->addAddress($_SESSION['cliente_email'], 'Cliente');
        $mail->addReplyTo('no-reply@tu_dominio.com', 'Vicenta');
        $mail->isHTML(true);
        $mail->Subject = 'Confirmación de pago - Vicenta';
        $mail->Body = "Gracias por tu pago. Hemos recibido tu pago de $monto para la orden $numero_orden. Tu pedido será procesado pronto.";

        $mail->send();
    } catch (Exception $e) {
        echo "Error al enviar el correo de confirmación: {$mail->ErrorInfo}";
    }

    // Notificar al vendedor
    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'lautacamejo@gmail.com';
        $mail->Password = 'jynqgpcsbphvkifs';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('no-reply@tu_dominio.com', 'Vicenta');
        $mail->addAddress('vendedor@tu_dominio.com', 'Vendedor');
        $mail->addReplyTo('no-reply@tu_dominio.com', 'Vicenta');
        $mail->isHTML(true);
        $mail->Subject = 'Nuevo pago confirmado';
        $mail->Body = "Se ha confirmado un pago de $monto por la orden $numero_orden. Por favor, procesalo lo antes posible.";

        $mail->send();
    } catch (Exception $e) {
        echo "Error al notificar al vendedor: {$mail->ErrorInfo}";
    }
}

?>
    
                    </div>
                </div>
            </div>
        </div>
            
        <?php include("includes/footer.php") ?>

        <script src="js/jquery-331.min.js"></script>
        <script src="js/bootstrap-337.min.js"></script>
        </body>
        </html>
        <?php } ?>
