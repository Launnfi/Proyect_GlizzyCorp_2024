<?php 
include("../db.php");
include("../functions/functions.php");

?>

<?php 

if(isset($_GET['pro_id'])){

    $producto_id = $_GET['pro_id'];

    $get_product = "select * from productos where producto_id='$producto_id'";

    $run_product = mysqli_query($con,$get_product);

    $row_product = mysqli_fetch_array($run_product);

    $p_cat_id = $row_product['p_cat_id'];

    $pro_titulo = $row_product['producto_titulo'];

    $pro_price = $row_product['producto_precio'];

    $pro_desc = $row_product['producto_desc'];

    $pro_img1 = $row_product['producto_img1'];

    $pro_img2 = $row_product['producto_img2'];

    $pro_img3 = $row_product['producto_img3'];

    $get_p_cat = "select * from productos_categorias where p_cat_id='$p_cat_id'";

    $run_p_cat = mysqli_query($con,$get_p_cat);

    $row_p_cat = mysqli_fetch_array($run_p_cat);

    $p_cat_titulo = $row_p_cat['p_cat_titulo'];

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
               
               <a href="cart.php" class="btn navbar-btn btn-primary right"><!-- btn navbar-btn btn-primary empieza -->
                   
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