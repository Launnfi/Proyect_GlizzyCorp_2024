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
                   <?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                             
                             echo"<a href='cerrar_sesion.php'>Mi cuenta</a>";
                             
                          }else{
                             
                            echo"<a href='my_account.php?my_orders'>Mi cuenta</a>"; 
                             
                           }
                         
                         ?>
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
                       <li class="<?= $active == 'Blog' ? 'active' : '' ?>">
                           <a href="../blog.php">Blog</a>
                       </li>
                       <li class="<?= $active == 'FAQ' ? 'active' : '' ?>">
                           <a href="../faq.php">Preguntas Frecuentes</a>
                       </li>
                       
                   
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
                        <input type="text" class="form-control" name="Num_orden" required value="<?php echo $numero_orden;  ?>">
                    </div>
                          
                    <div class="form-group">
                        <label>Cantidad a pagar:</label>
                        <input type="text" class="form-control" name="cantidadEnv" required value="<?php echo $monto;  ?>">
                    </div>
                    <div class="form-group">
                    <label>Metodo de pago</label>
                    <select name="modoPago" class="form-control" required>
                        <option value="" disabled selected>Seleccione metodo de pago</option>
                        <option value="Pago expres">Pago expres</option>
                    </select>
                     </div>
                    
                    <div class="form-group">
                    <label>Fecha con la que se realizará el pago</label>
                    <input type="date" class="form-control" name="date" min="<?php echo date('Y-m-d'); ?>" required>
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
    $num_orden = $_GET['orden_id'];
    $numero_fact = $_POST['Num_orden'];
    $cantidad = $_POST['cantidadEnv'];
    $metodo_pago = $_POST['modoPago'];
    $fecha_pago = $_POST['date'];
    $complete = "Completado";
    
    $insert_payment = "INSERT INTO pagos (numero_factura, cantidad, metodo_pago, fecha_pago) VALUES ('$numero_fact', '$cantidad', '$metodo_pago', '$fecha_pago')";
    
    $run_payment = mysqli_query($con, $insert_payment);
    if (!$run_payment) {
        die('Error en el pago: ' . mysqli_error($con));
    }

    $update_customer_order = "UPDATE ordenes_cliente SET status='$complete' WHERE orden_id='$orden_id'";
    $run_customer_order = mysqli_query($con, $update_customer_order);
    if (!$run_customer_order) {
        die('Error al actualizar la orden del cliente: ' . mysqli_error($con));
    }

    $update_pending_order = "UPDATE ordenes_pendientes SET status='$complete' WHERE orden_id='$orden_id'";
    $run_pending_order = mysqli_query($con, $update_pending_order);
    if (!$run_pending_order) {
        die('Error al actualizar la orden pendiente: ' . mysqli_error($con));
    }

    // Obtener el cliente_id desde la tabla ordenes_cliente
    $query_cliente_id = "SELECT cliente_id FROM ordenes_cliente WHERE orden_id = '$orden_id'";
    $result_cliente_id = mysqli_query($con, $query_cliente_id);
    if ($result_cliente_id) {
        $cliente_data_id = mysqli_fetch_assoc($result_cliente_id);
        $cliente_id = $cliente_data_id['cliente_id'];
    } else {
        die('Error al obtener el cliente_id: ' . mysqli_error($con));
    }

    // Obtener los datos del cliente desde la tabla customers
    $query_cliente = "SELECT cliente_nombre, cliente_email FROM customer WHERE cliente_id = '$cliente_id'";
    $result_cliente = mysqli_query($con, $query_cliente);
    if ($result_cliente) {
        $cliente_data = mysqli_fetch_assoc($result_cliente);
        $nombre_cliente = $cliente_data['cliente_nombre'];
        $email_cliente = $cliente_data['cliente_email'];
    } else {
        die('Error al obtener los datos del cliente: ' . mysqli_error($con));
    }

    // Detalles de la boleta
    $boleta = "Número de orden: $numero_fact\nCantidad: $cantidad\nMétodo de pago: $metodo_pago\n ID de la orden: $orden_id\nFecha: $fecha_pago";

            // Crear el objeto PHPMailer para el cliente
            $mail_cliente = new PHPMailer(true);

            try {
                
                $mail_cliente->isSMTP();
                $mail_cliente->Host = 'smtp.gmail.com'; 
                $mail_cliente->SMTPAuth = true;
                $mail_cliente->Username = 'lautacamejo6@gmail.com'; 
                $mail_cliente->Password = 'jynqgpcsbphvkifs'; 
                $mail_cliente->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail_cliente->Port = 587;

                // Destinatarios
                $mail_cliente->setFrom('no-reply-vicenta@gmail.com', 'Vicenta');
                $mail_cliente->addAddress($email_cliente, $nombre_cliente); // El correo y nombre del cliente

                // Contenido del correo
                $mail_cliente->isHTML(true);
                $mail_cliente->Subject = 'Confirmación de compra';
                $mail_cliente->Body    = "Hola $nombre_cliente,<br><br>Gracias por tu compra. Aquí están los detalles de tu boleta:<br><b>$boleta</b><br><br> Ahora puedes pasar a levantar su compra. ¡Saludos!";

                // Enviar el correo
                $mail_cliente->send();

                // Enviar correo al vendedor
                $mail_vendedor = new PHPMailer(true);

                // Configuración del servidor de correo para el vendedor
                $mail_vendedor->isSMTP();
                $mail_vendedor->Host = 'smtp.gmail.com';
                $mail_vendedor->SMTPAuth = true;
                $mail_vendedor->Username = 'lautacamejo6@gmail.com';
                $mail_vendedor->Password = 'jynqgpcsbphvkifs';
                $mail_vendedor->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail_vendedor->Port = 587;

                // Destinatarios
                $mail_vendedor->setFrom('no-reply-vicenta@gmail.com', 'Vicenta');
                $mail_vendedor->addAddress('vicentita@gmail.com', 'Vendedor'); // El correo del vendedor

                // Contenido del correo
                $mail_vendedor->isHTML(true);
                $mail_vendedor->Subject = 'Nueva compra realizada';
                $mail_vendedor->Body    = "Se ha realizado una nueva compra.<br><br><b>$boleta</b><br><br>";

               
                $mail_vendedor->send();

                echo "<script>alert('Gracias por tu compra, su pedido llegará en 3-4 días hábiles.')</script>";
                echo "<script>window.open('my_account.php?misOrdenes','_self')</script>";
            } catch (Exception $e) {
                echo "Hubo un error al enviar el correo: {$mail_cliente->ErrorInfo}";
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
