<?php 
session_start();
include("db.php");
include("functions/functions.php");

// Verificamos si está presente el parámetro 'pro_id'
if(isset($_GET['pro_id']) && !empty($_GET['pro_id'])){
    
    // Guardamos el valor de 'pro_id' que viene desde la URL en una variable
    $producto_id = $_GET['pro_id'];
    
    // Consulta SQL para obtener los detalles del producto con el ID correspondiente
    $get_product = "SELECT * FROM productos WHERE producto_id='$producto_id'";
    $run_product = mysqli_query($con, $get_product);

    if ($row_product = mysqli_fetch_array($run_product)) {
        // Obtener cada detalle del producto
        $p_cat_id = $row_product['p_cat_id'];
        $pro_titulo = $row_product['producto_titulo'];
        $pro_desc = $row_product['producto_desc'];
        $pro_img1 = $row_product['producto_img1'];
        $pro_img2 = $row_product['producto_img2'];
        $pro_img3 = $row_product['producto_img3'];

        // Consulta SQL para obtener detalles de la categoría del producto
        $get_p_cat = "SELECT * FROM productos_categorias WHERE p_cat_id='$p_cat_id'";
        $run_p_cat = mysqli_query($con, $get_p_cat);

        if ($row_p_cat = mysqli_fetch_array($run_p_cat)) {
            // Obtenemos el título de la categoría del producto
            $p_cat_titulo = $row_p_cat['p_cat_titulo'];
        } else {
            echo "Categoría de producto no encontrada.";
    
}
 
    }
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
    <link rel="stylesheet" href="styles/styles.css">
    <script src="js\script.js"></script>
    
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
                   
               <a href="cerrar_sesion.php"><?php items(); ?> Productos en tu carrito | Total: <?php echo mont_total(); ?> </a>
               
           </div>
           
           <div class="col-md-6">
               
               <ul class="menu">
                   
               <?php if (!isset($_SESSION['cliente_email'])): ?>
                <li>
                    <a href="../customer_register.php">Registrarme</a>
                </li>
                     <?php endif; ?>
                   <li>
                       <a href="cart.php">Ir al Carrito</a>
                   </li>
                   <li>
                   <?php 
                           
                             if(!isset($_SESSION['customer_email'])){
                               
                               echo"<a href='cerrar_sesion.php'>Mi cuenta</a>";
                               
                            }else{
                               
                              echo"<a href='my_account.php?my_orders'>Mi cuenta</a>"; 
                               
                             }
                           
                           ?>
                   </li>
                   
               </ul>
               
           </div>
           
       </div>
       
   </div>
   
   <div id="navbar" class="navbar navbar-default">
       
       <div class="container">
           
           <div class="navbar-header">
               
               <a href="index.php" class="navbar-brand home">
                   
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
                           <a href="index.php">Home</a>
                       </li>
                       <li class= "<?= $active == 'Comprar' ? 'active' : '' ?>" >
                           <a href="tienda.php">Comprar</a>
                       </li>

                       <li class="<?= $active == 'Mi cuenta' ? 'active' : '' ?>">

                            <?php 
                           
                             if(!isset($_SESSION['customer_email'])){
                               
                               echo"<a href='cerrar_sesion.php'>Mi cuenta</a>";
                               
                            }else{
                               
                              echo"<a href='my_account.php?my_orders'>Mi cuenta</a>"; 
                               
                             }
                           
                           ?>
                           
                       </li>
                       <li class="<?= $active == 'Carrito' ? 'active' : '' ?>">
                           <a href="cart.php">Carrito</a>
                       </li>
                       <li class="<?= $active == 'Contactanos' ? 'active' : '' ?>">
                           <a href="contact.php">Contactanos</a>
                       </li>
                       <li class="<?= $active == 'Blog' ? 'active' : '' ?>">
                           <a href="blog.php">Blog</a>
                       </li>
                       <li class="<?= $active == 'FAQ' ? 'active' : '' ?>">
                           <a href="faq.php">Preguntas Frecuentes</a>
                       </li>
                       
                   </ul>

               </div>
               
               <a href="cart.php" class="btn navbar-btn btn-primary right">
                   
                   <i class="fa fa-shopping-cart"></i>
                   
                   <span><?php items(); ?>  Productos en tu carrito</span>
                   
               </a>

               <div class="navbar-collapse collapse right">
                   
                   <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search"><!-- btn btn-primary navbar-btn empieza -->
                       
                       <span class="sr-only">Buscar</span>
                       
                       <i class="fa fa-search"></i>
                       
                   </button>
                   
               </div>
               
               <div class="collapse clearfix" id="search">
                   
                   <form method="get" action="index.php" class="navbar-form">
                       
                       <div class="input-group">
                           
                       <input type="search" class="form-control me-2" placeholder="Buscar" name="buscar" onkeyup="consulta_buscador(this.value);" id="buscar" aria-labe = "Search" required>
                           
                           <span class="input-group-btn">
                           
                           <button type="submit" name="search" value="Search" class="btn btn-primary">
                               
                           
                               <i class="fa fa-search"></i>
                          
                           </span>
                                
                           </button>
                        

                       </div>
                       
                   </form>
                   <div class="card_busqueda" id="card_busqueda" style="opacity: 0; text-align: left;">
                            <div class="car shadow-sm p-2">
                                <div class="container m-0 p-0" id="resultados_busqueda_nav">
                                     
                                </div>
                            </div>
                           </div>
                  
               </div>
               
               
           </div>
        
       </div>
      
   </div>