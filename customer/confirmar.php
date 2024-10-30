<?php 
$active = "Mi cuenta";
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

        <div class="col-md-9">
            <div class="box">
                <h1 align="center">Por favor confirmar su pago</h1>

                <form action="confirmar.php?orden_id=<?php echo $orden_id; ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                        <label>N° de orden:</label>
                        <input type="text" class="form-control" name="Num_orden" required>
                    </div>
                          
                    <div class="form-group">
                        <label>Cantidad a pagar:</label>
                        <input type="text" class="form-control" name="cantidadEnv" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Metodo de pago</label>
                        <select name="modoPago" class="form-control">
                            <option>Seleccione metodo de pago</option>
                            <option>Mercado Pago</option>
                            <option>Visa</option>
                            <option>Pago expres</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Transaccion / id Referencia</label>
                        <input type="text" class="form-control" name="ref_no" required>
                    </div>
                    <div class="form-group">
                        <label>Dia de pago</label>
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
                        die('Error al actualizar la orden del cliente: ' . mysqli_error($con));
                    }

                    $update_pending_order = "UPDATE ordenes_pendientes SET status='$complete' WHERE orden_id='$orden_id'";
                    $run_pending_order = mysqli_query($con, $update_pending_order);
                    if (!$run_pending_order) {
                        die('Error al actualizar la orden pendiente: ' . mysqli_error($con));
                    }
                    
                    echo "<script>alert('Gracias por tu compra, su pedido llegara en 3-4 dias habiles')</script>";
                    echo "<script>window.open('my_account.php?misOrdenes','_self')</script>";
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
