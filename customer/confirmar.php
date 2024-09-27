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
               
               <a href="#" class="btn btn-success btn-sm">Bienvenido</a>
               <a href="checkout.php">4 Productos en tu carrito | Total: $10000 </a>
               
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
                       <a href="../checkout.php">Login</a>
                   </li>
                   
               </ul><!-- menu termina -->
               
           </div><!-- col-md-6 termina -->
           
       </div><!-- container termina -->
       
   </div><!-- Top termina -->
   
   <div id="navbar" class="navbar navbar-default"><!-- navbar navbar-default empieza -->
       
       <div class="container"><!-- container empieza -->
           
           <div class="navbar-header"><!-- navbar-header empieza -->
               
               <a href="../index.php" class="navbar-brand home"><!-- navbar-brand home empieza -->
                   
                   <img src="images/ecom-store-logo.png" alt="M-dev-Store Logo" class="hidden-xs">
                   <img src="images/ecom-store-logo-mobile.png" alt="M-dev-Store Logo Mobile" class="visible-xs">
                   
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
                       
                       <li >
                           <a href="../index.php">Home</a>
                       </li>
                       <li>
                           <a href="../tienda.php">Comprar</a>
                       </li>
                       <li class="active">
                           <a href="my_account.php">mi cuenta</a>
                       </li>
                       <li>
                           <a href="../cart.php">Carrito</a>
                       </li>
                       <li>
                           <a href="../contact.php">Contactanos</a>
                       </li>
                       
                   </ul><!-- nav navbar-nav left termina -->
                   
               </div><!-- padding-nav termina -->
               
               <a href="cart.php" class="btn navbar-btn btn-primary right"><!-- btn navbar-btn btn-primary empieza -->
                   
                   <i class="fa fa-shopping-cart"></i>
                   
                   <span>4 Productos en tu carrito</span>
                   
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

                <form action="confirmar.php" method="post" enctype="multipart/form-data"><!-- form empieza -->

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