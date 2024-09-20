<?php 
include("db.php");
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
</head>
<body>
   
   <div id="top"><!-- Top Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="col-md-6 offer"><!-- col-md-6 offer Begin -->
               
               <a href="#" class="btn btn-success btn-sm">Bienvenido</a>
               <a href="checkout.php">4 Productos en tu carrito | Total: $10000 </a>
               
           </div><!-- col-md-6 offer Finish -->
           
           <div class="col-md-6"><!-- col-md-6 Begin -->
               
               <ul class="menu"><!-- cmenu Begin -->
                   
                   <li>
                       <a href="customer_register.php">Registrarme</a>
                   </li>
                   <li>
                       <a href="customer/my_account.php">Mi cuenta</a>
                   </li>
                   <li>
                       <a href="cart.php">Ir al Carrito</a>
                   </li>
                   <li>
                       <a href="checkout.php">Login</a>
                   </li>
                   
               </ul><!-- menu Finish -->
               
           </div><!-- col-md-6 Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- Top Finish -->
   
   <div id="navbar" class="navbar navbar-default"><!-- navbar navbar-default Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="navbar-header"><!-- navbar-header Begin -->
               
               <a href="index.php" class="navbar-brand home"><!-- navbar-brand home Begin -->
                   
               <img src="images\VicentaLogoAjustado.png" alt="VicentaLogo" class="hidden-xs" width=150px height=50px>
               <img src="images\VicentaLogoAjustado.png" alt="VicentaLogo" class="visible-xs" width=150px height=50px>
                   
               </a><!-- navbar-brand home Finish -->
               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                   
                   <span class="sr-only">Buscar</span>
                   
                   <i class="fa fa-align-justify"></i>
                   
               </button>
               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                   
                   <span class="sr-only">Buscar</span>
                   
                   <i class="fa fa-search"></i>
                   
               </button>
               
           </div><!-- navbar-header Finish -->
           
           <div class="navbar-collapse collapse" id="navigation"><!-- navbar-collapse collapse Begin -->
               
               <div class="padding-nav"><!-- padding-nav Begin -->
                   
                   <ul class="nav navbar-nav left"><!-- nav navbar-nav left Begin -->
                       
                       <li >
                           <a href="index.php">Home</a>
                       </li>
                       <li >
                           <a href="tienda.php">Comprar</a>
                       </li>
                       <li>
                           <a href="customer/my_account.php">mi cuenta</a>
                       </li>
                       <li class="active">
                           <a href="cart.php">Carrito</a>
                       </li>
                       <li>
                           <a href="contact.php">Contactanos</a>
                       </li>
                       
                   </ul><!-- nav navbar-nav left Finish -->
                   
               </div><!-- padding-nav Finish -->
               
               <a href="cart.php" class="btn navbar-btn btn-primary right"><!-- btn navbar-btn btn-primary Begin -->
                   
                   <i class="fa fa-shopping-cart"></i>
                   
                   <span>4 Productos en tu carrito</span>
                   
               </a><!-- btn navbar-btn btn-primary Finish -->
               
               <div class="navbar-collapse collapse right"><!-- navbar-collapse collapse right Begin -->
                   
                   <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search"><!-- btn btn-primary navbar-btn Begin -->
                       
                       <span class="sr-only">Buscar</span>
                       
                       <i class="fa fa-search"></i>
                       
                   </button><!-- btn btn-primary navbar-btn Finish -->
                   
               </div><!-- navbar-collapse collapse right Finish -->
               
               <div class="collapse clearfix" id="search"><!-- collapse clearfix Begin -->
                   
                   <form method="get" action="results.php" class="navbar-form"><!-- navbar-form Begin -->
                       
                       <div class="input-group"><!-- input-group Begin -->
                           
                           <input type="text" class="form-control" placeholder="Search" name="user_query" required>
                           
                           <span class="input-group-btn"><!-- input-group-btn Begin -->
                           
                           <button type="submit" name="search" value="Search" class="btn btn-primary"><!-- btn btn-primary Begin -->
                               
                               <i class="fa fa-search"></i>
                               
                           </button><!-- btn btn-primary Finish -->
                           
                           </span><!-- input-group-btn Finish -->
                           
                       </div><!-- input-group Finish -->
                       
                   </form><!-- navbar-form Finish -->
                   
               </div><!-- collapse clearfix Finish -->
               
           </div><!-- navbar-collapse collapse Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- navbar navbar-default Finish -->

   <div id="content"><!-- content begin -->
    <div class="container"><!-- container begin -->
        <div class="col-md-12"><!-- col-md-12 begin -->

        <ul class="breadcrumb"><!-- breadcrumb begin-->
            <li>
                <a href="index.php">Inicio</a>
            </li>
            <li>
                Carrito
            </li>
        </ul>
        </div><!-- col-md-12 finish -->

        <div id="cart" class="col-md-9"><!-- col-md-9 begin -->

        <div class="box"><!-- box begin -->

        <form action="cart.php" method="post" enctype=",ultipart/from-data">

            <h1>Carrito de compras</h1>
            <p class="text-muted">solamente se pueden poner 3 cosas en el carrito</p>

            <div class="table-responsive"><!-- table-responsive begin -->

            <table class="table"><!-- table begin -->

            <thead><!-- thead begin -->

            <tr>

            <th colspan="2">Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Talle</th>
            <th colspan="1">Eliminar</th>
            <th colspan="2">Sub-total</th>

            </tr>

                
            </thead><!-- thead final -->

            <tbody> <!-- tbody empieza -->

            <tr>
                <td>
                  <img class="img-responisve" src="admin_area/product_images/ProductoA2.jpg" alt="Producto 3a">
                </td>

                <td>

                <a href="#">Ropa de dinosaurio</a>

                </td>

                <td>
                2
                </td>
                <td>

                    $1500

                </td>

                <td>
                    S
                </td>

                <td>
                    <input type="checkbox" name= "remove[]">
                </td>

                <td>

                    $3000

                </td>
            </tr>


            </tbody><!-- tbody final -->
            <tbody> <!-- tbody empieza -->

<tr>
    <td>
      <img class="img-responisve" src="admin_area/product_images/ProductoA2.jpg" alt="Producto 3a">
    </td>

    <td>

    <a href="#">Ropa de dinosaurio</a>

    </td>
   
    <td>
        2
</td>

    <td>

        $1500

    </td>

    <td>
        S
    </td>

    <td>
        <input type="checkbox" name= "remove[]">
    </td>

    <td>

        $3000

    </td>
</tr>


</tbody><!-- tbody final -->
<tbody> <!-- tbody empieza -->

<tr>
    <td>
      <img class="img-responisve" src="admin_area/product_images/ProductoA2.jpg" alt="Producto 3a">
    </td>

    <td>

    <a href="#">Ropa de dinosaurio</a>

    </td>

  

    <td>

            2

    </td>

    <td>
         $1500
    </td>

    <td>
        
        s
        
    </td>

    <td>

        <input type="checkbox" name= "remove[]">

    </td>
    <td>

        $3000

    </td>
</tr>


</tbody><!-- tbody final -->


        <tfoot><!-- tfoot begin -->
        
        <tr>
            
        <th colspan="5"> total</th>
        <th colspan="2"> $4500</th>
        </tr>


        </tfoot><!-- tfoot finish -->


            </table><!-- table finish -->

            </div><!-- table-responsive finish -->

            <div class="box-footer"><!--box-footer begin -->
                <div class="pull-left"><!--pull-left begin -->

                    <a href="index.php" class="btn btn-default"><!--btn btn-default" begin -->

                    <i class="fa fa-chevron-left"></i>Continuar comprando

                    </a><!--btn btn-default" finish -->

                </div><!--pull-left dinish -->

                <div class="pull-right"><!--pull-left begin -->

            <button type="submit"  name= "update" value="Update cart" class="btn btn-default"><!--btn btn-default" begin -->

             <i class="fa fa-refresh"></i>Actualizar Carrito

            </button><!--btn btn-default" finish -->

            <a href="checkout.php" class="btn btn-primary">

                Pagar <i class="fa fa-chevron-right"></i>

            </a>

            </div><!--pull-right dinish -->

            
            </div><!--box-footer finish -->

        </form><!-- from finish -->

        </div><!-- box finish --> <div id="same-height-row"><!-- same-height-row begin -->
                    <div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 begin -->
                        <div class="box same-height headline"><!--box same-height headline begin -->

                            <h3 class="text-center">Te podria interesar</h3>
                            
                        </div><!--box same-height headline Finish -->
                    </div><!-- col-md-3 col-sm-6 Finish -->
                    <div class="col-md-3 col-sm-6 center-responsive"><!-- col-md-3 col-sm-6 center-responsive Begin -->
                       <div class="product same-height"><!-- product same-height Begin -->
                           <a href="details.php">
                               <img class="img-responsive" src="admin_area/product_images/Producto.jpg" alt="Product 6">
                            </a>
                            
                            <div class="text"><!-- text Begin -->
                                <h3><a href="details.php">Conjunto del paris saint german</a></h3>
                                
                                <p class="price">$40</p>
                                
                            </div><!-- text Finish -->
                            
                        </div><!-- product same-height Finish -->
                   </div><!-- col-md-3 col-sm-6 center-responsive Finish -->
                   
                   <div class="col-md-3 col-sm-6 center-responsive"><!-- col-md-3 col-sm-6 center-responsive Begin -->
                       <div class="product same-height"><!-- product same-height Begin -->
                           <a href="details.php">
                               <img class="img-responsive" src="admin_area/product_images/ProductoA3.jpg" alt="Product 6">
                            </a>
                            
                            <div class="text"><!-- text Begin -->
                                <h3><a href="details.php">Ropa de bebe</a></h3>
                                
                                <p class="price">$45</p>
                                
                            </div><!-- text Finish -->
                            
                        </div><!-- product same-height Finish -->
                   </div><!-- col-md-3 col-sm-6 center-responsive Finish -->
                   
                   <div class="col-md-3 col-sm-6 center-responsive"><!-- col-md-3 col-sm-6 center-responsive Begin -->
                       <div class="product same-height"><!-- product same-height Begin -->
                           <a href="details.php">
                               <img class="img-responsive" src="admin_area/product_images/ProductoA1.jpg" alt="Product 6">
                            </a>
                            
                            <div class="text"><!-- text Begin -->
                                <h3><a href="details.php">Conjunto de dinosauros</a></h3>
                                
                                <p class="price">$50</p>
                                
                            </div><!-- text Finish -->
                            </div> <!-- product same-height Finish -->
                </div><!-- same-height-row Finish -->
                </div><!--col-d-3 col-sm-6  Finish -->
                     
        


        </div><!-- col-md-9 finish -->
        <div class="col-md-3"><!-- col-md-3 begin -->

            <div id="order-summary" class="box"><!-- box begin -->


           

            <div class="box-header">

            <h3>Resumen del pedido </h3>

            </div><!-- box-header finish -->

            <p class="text-muted">

            Los costos de envío y adicionales se calculan según el valor que haya ingresado.

            </p><!-- text-muted finish -->
            <div class="table-responsive"><!-- table-responsive begin -->

            <table class= "table">

            <tbody><!-- me dio paja comentar lo de abajo-->
            
            <tr>

            <td>Sub-total de la Orden</td>
            <th>$4000</th>

            </tr>

            <tr>
                <td>envío y manipulación</td>
                <td>$0</td>

            </tr>
            
            <tr>
                <td>Iva</td>
                <th>$0</th>

            </tr>
            
            
            <tr class="total">
                <td>Total</td>
                <th>$5000</th>

            </tr>


            </tbody>

            </table>
            <br><br><br><br>


            </div><!-- table-responsive finish -->
            </div><!-- box finish -->



            </div><!-- col-md-3 Finish -->

                    <div class="col-md-3"><!-- col-md-3 begin -->
                    <?php

                        include("includes/sidebar.php");

                    ?>
                    </div><!-- container finish -->
                </div><!-- content finish -->
                
                <?php

                include("footer.php")

                ?>

                <script src="js/jquery-331.min.js"></script>
                <script src="js/bootstrap-337.min.js"></script>


</body>
</html>