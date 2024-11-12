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
                        
                    <?php if (!isset($_SESSION['cliente_email'])): ?>
                <li>
                    <a href="../customer_register.php">Registrarme</a>
                </li>
                     <?php endif; ?>
                   <li>
                       <a href="my_account.php">Mi cuenta</a>
                   </li>
                   <li>
                       <a href="../cart.php">Ir al Carrito</a>
                   </li>
                   <li>
                   <?php 
                           
                             if(!isset($_SESSION['customer_email'])){
                               
                               echo"<a href='../cerrar_sesion.php'>Mi cuenta</a>";
                               
                            }else{
                               
                              echo"<a href='my_account.php?my_orders'>Mi cuenta</a>"; 
                               
                             }
                           
                           ?>
                   </li>
                   
               </ul><!-- menu termina -->
               
           </div><!-- col-md-6 termina -->
           
       </div><!-- container termina -->
       
   </div><!-- Top termina -->
   
   <div id="navbar" class="navbar navbar-default"><!-- navbar navbar-default empieza -->
       
       <div class="container">
           <div class="navbar-header">
               
               <a href="../index.php" class="navbar-brand home">
                   
               <img src="images\VicentaLogoAjustado.png" alt="VicentaLogo" class="hidden-xs" width=150px height=50px>
               <img src="images\VicentaLogoAjustado.png" alt="VicentaLogo" class="visible-xs" width=150px height=50px>
                   
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
                   
                   <span><?php items(); ?>  Productos en tu carrito</span>
                   
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
                           
                           <button type="submit" name="search" value="Search" class="btn btn-primary"><
                               
                               <i class="fa fa-search"></i>
                               
                           </button>
                           
                           </span>
                           
                       </div>
                       
                   </form>
                   
               </div>
               
           </div>
           
       </div>
       
   </div>

       
   </div>
   <div id="content">
    <div class="container">
        <div class="col-md-12">

        <ul class="breadcrumb">
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


            <?php 
            if(isset($_GET['misOrdenes'])){
                include("misOrdenes.php");
            }
            ?>
             <?php 
            if(isset($_GET['pagoOff'])){
                include("pagoOff.php");
            }
            ?>
              <?php 
            if(isset($_GET['editarInfo'])){
                include("editarInfo.php");
            }
            ?>
               <?php 
            if(isset($_GET['cambiarCont'])){
                include("cambiarCont.php");
            }
            ?>
             <?php 
            if(isset($_GET['eliminarCuenta'])){
                include("eliminarCuenta.php");
            }
            ?>



            </div><!-- box empieza -->


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
<?php
}

?>