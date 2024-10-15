<?php 
$active = "Mi cuenta";
?>
<?php 
session_start();

if(!isset($_SESSION['cliente_email'])){

    echo "<script>window.open('../cerrar_sesion.php', '_self')</script>";

}else{


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
   
   <div id="top"><!-- Top empieza -->
       
       <div class="container"><!-- container empieza -->
           
           <div class="col-md-6 offer"><!-- col-md-6 offer empieza -->
               
           <?php 
                   
                   if(!isset($_SESSION['cliente_email'])){
                       
                       echo "Bienvenido: Invitado";
                       
                   }else{
                       
                       echo "Bienvenido: " . $_SESSION['cliente_email'] . "";
                       
                   }
                   
                ?>
                
               <a href="checkout.php"><?php items(); ?> Productos en tu carrito | Total:  <?php echo mont_total(); ?> </a>
               
           </div><!-- col-md-6 offer termina -->
           
           <div class="col-md-6"><!-- col-md-6 empieza -->
               
               <ul class="menu"><!-- cmenu empieza -->
                   
                   <li>
                       <a href="../customer_register.php">Registrarme</a>
                   </li>
                   <li>
                       <a href="my_account.php">Mi cuenta</a>
                   </li>
                   <li>
                       <a href="../cart.php">Ir al Carrito</a>
                   </li>
                   <li>
                       <a href="../cerrar_sesion.php">Login</a>
                   </li>
                   
               </ul><!-- menu termina -->
               
           </div><!-- col-md-6 termina -->
           
       </div><!-- container termina -->
       
   </div><!-- Top termina -->
   
   <div id="navbar" class="navbar navbar-default"><!-- navbar navbar-default empieza -->
       
       <div class="container"><!-- container empieza -->
           
           <div class="navbar-header"><!-- navbar-header empieza -->
               
               <a href="../index.php" class="navbar-brand home"><!-- navbar-brand home empieza -->
                   
               <img src="images\VicentaLogoAjustado.png" alt="VicentaLogo" class="hidden-xs" width=150px height=50px>
               <img src="images\VicentaLogoAjustado.png" alt="VicentaLogo" class="visible-xs" width=150px height=50px>
                   
               </a><!-- navbar-brand home termina -->
               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                   
                   <span class="sr-only">Buscar</span>
                   
                   <i class="fa fa-align-justify"></i>
                   
               </button>
               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                   
                   <span class="sr-only">Buscar</span>
                   
                   <i class="fa fa-search"></i>
                   
               </button>
               
           </div><!-- navbar-header termina -->
           
           <div class="navbar-collapse collapse" id="navigation"><!-- navbar-collapse collapse empieza -->
               
               <div class="padding-nav"><!-- padding-nav empieza -->
                   
                   <ul class="nav navbar-nav left"><!-- nav navbar-nav left empieza -->
                       
                       <li class="<?= $active == 'Inicio' ? 'active' : '' ?>" >
                           <a href="../index.php">Home</a>
                       </li>
                       <li class= "<?= $active == 'Comprar' ? 'active' : '' ?>" >
                           <a href="../tienda.php">Comprar</a>
                       </li>
                       <li class="<?= $active == 'Mi cuenta' ? 'active' : '' ?>">
                           <a href="my_account.php">mi cuenta</a>
                       </li>
                       <li class="<?= $active == 'Carrito' ? 'active' : '' ?>">
                           <a href="../cart.php">Carrito</a>
                       </li>
                       <li class="<?= $active == 'Contactanos' ? 'active' : '' ?>">
                           <a href="../contact.php">Contactanos</a>
                       </li>
                       
                   </ul><!-- nav navbar-nav left termina -->
                   
               </div><!-- padding-nav termina -->
               
               <a href="../cart.php" class="btn navbar-btn btn-primary right"><!-- btn navbar-btn btn-primary empieza -->
                   
                   <i class="fa fa-shopping-cart"></i>
                   
                   <span><?php items(); ?>  Productos en tu carrito</span>
                   
               </a><!-- btn navbar-btn btn-primary termina -->
               
               <div class="navbar-collapse collapse right"><!-- navbar-collapse collapse right empieza -->
                   
                   <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search"><!-- btn btn-primary navbar-btn empieza -->
                       
                       <span class="sr-only">Buscar</span>
                       
                       <i class="fa fa-search"></i>
                       
                   </button><!-- btn btn-primary navbar-btn termina -->
                   
               </div><!-- navbar-collapse collapse right termina -->
               
               <div class="collapse clearfix" id="search"><!-- collapse clearfix empieza -->
                   
                   <form method="get" action="results.php" class="navbar-form"><!-- navbar-form empieza -->
                       
                       <div class="input-group"><!-- input-group empieza -->
                           
                           <input type="text" class="form-control" placeholder="Search" name="user_query" required>
                           
                           <span class="input-group-btn"><!-- input-group-btn empieza -->
                           
                           <button type="submit" name="search" value="Search" class="btn btn-primary"><!-- btn btn-primary empieza -->
                               
                               <i class="fa fa-search"></i>
                               
                           </button><!-- btn btn-primary termina -->
                           
                           </span><!-- input-group-btn termina -->
                           
                       </div><!-- input-group termina -->
                       
                   </form><!-- navbar-form termina -->
                   
               </div><!-- collapse clearfix termina -->
               
           </div><!-- navbar-collapse collapse termina -->
           
       </div><!-- container termina -->
       
   </div><!-- navbar navbar-default termina -->

   <div id="content"><!-- content empieza -->
    <div class="container"><!-- container empieza -->
        <div class="col-md-12"><!-- col-md-12 empieza -->

        <ul class="breadcrumb"><!-- breadcrumb empieza-->
            <li>
                <a href="index.php">Inicio</a>
            </li>
            <li>
                Mi cuenta
            </li>
        </ul>

        <div class="col-md-3"><!-- col-md-3 empieza -->
        <?php

             include("includes/sidebar.php");

        ?>
        </div><!-- col-md-3 termina -->

        <div class="col-md-9"><!-- col-md-9 empieza -->
            <div class="box"><!-- box empieza -->

                <h1 aling = "center">Porfavor confirmar su pago</h1>

                <form action="confirmar.php?update_id='<?php echo $orden_id ?>" method="post" enctype="multipart/form-data"><!-- form empieza -->

                    <div class="form-group"><!-- form-group empieza -->

                        <label>N° de orden:</label>

                        <input type="text" class="form-control" name="Num_orden" required>
                

                    </div><!-- form-group termina -->
                          
                        <div class="form-group"><!-- form-group empieza -->

                        <label>Cantidad enviada:</label>

                        <input type="text" class="form-control" name="cantidadEnv" required>
                

                    </div><!-- form-group termina -->
                           <div class="form-group"><!-- form-group empieza -->

                        <label>Metodo de pago</label>

                            <select name="metodoPago" class= "form-control">
                                <option>Seleccione metodo de pago</option>
                                <option>Mercado Pago</option>
                                <option>Visa</option>
                                <option>Pago expres</option>
                            </select>
                

                    </div><!-- form-group termina -->
                           <div class="form-group"><!-- form-group empieza -->

                        <label>Transacions/ id Referencia</label>

                        <input type="text" class="form-control" name="ref_no" required>
                

                    </div><!-- form-group termina -->
                           <div class="form-group"><!-- form-group empieza -->

                        <label>Omni paisa/ east paisa:</label>

                        <input type="text" class="form-control" name="code" required>
                

                    </div><!-- form-group termina -->
                       <div class="form-group"><!-- form-group empieza -->

                        <label>Dia de pago</label>

                        <input type="text" class="form-control" name="date" required>
                

                    </div><!-- form-group termina -->

                    <div class="text-center"><!-- text-center empieza -->
                        
                    

                    <button class="btn btn-primary btn-lg">
                    <i class="fa fa-user-md"></i> confirmar pago
                    </button>

                    </div><!-- text-center termina -->
                    
                    
                </form><!-- form termina -->

                <?php 
                   
                   if(isset($_POST['confirm_payment'])){
                       
                       $update_id = $_GET['update_id'];
                       
                       $invoice_no = $_POST['invoice_no'];
                       
                       $amount = $_POST['amount_sent'];
                       
                       $payment_mode = $_POST['payment_mode'];
                       
                       $ref_no = $_POST['ref_no'];
                       
                       $code = $_POST['code'];
                       
                       $payment_date = $_POST['date'];
                       
                       $complete = "Complete";
                       
                       $insert_payment = "insert into payments (invoice_no,amount,payment_mode,ref_no,code,payment_date) values ('$invoice_no','$amount','$payment_mode','$ref_no','$code','$payment_date')";
                       
                       $run_payment = mysqli_query($con,$insert_payment);
                       
                       $update_customer_order = "update customer_orders set order_status='$complete' where order_id='$update_id'";
                       
                       $run_customer_order = mysqli_query($con,$update_customer_order);
                       
                       $update_pending_order = "update pending_orders set order_status='$complete' where order_id='$update_id'";
                       
                       $run_pending_order = mysqli_query($con,$update_pending_order);
                       
                       if($run_pending_order){
                           
                           echo "<script>alert('Thank You for purchasing, your orders will be completed within 24 hours work')</script>";
                           
                           echo "<script>window.open('my_account.php?my_orders','_self')</script>";
                           
                       }
                       
                   }
                  
                  ?>
            

            </div><!-- box termina -->


        </div><!-- col-md-9 termina -->

        </div><!-- container termina -->
    </div><!-- content termina -->
    
    <?php

    include("includes/footer.php")

    ?>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>


</body>
</html>
<?php }?>