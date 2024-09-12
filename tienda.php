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
                       <a href="checkout.php">Mi cuenta</a>
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
                   
               <img src="images\Logo-Pc-movil.png" alt="M-dev-Store Logo" class="hidden-xs" width=150px height=50px>
               <img src="images\Logo-Pc-movil.png" alt="M-dev-Store Logo Mobile" class="visible-xs" width=150px height=50px>
                   
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
                       <li class="active">
                           <a href="tienda.php">Comprar</a>
                       </li>
                       <li>
                           <a href="customer/my_account.php">mi cuenta</a>
                       </li>
                       <li>
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
                shop
            </li>
        </ul>

        <div class="col-md-3"><!-- col-md-3 begin -->
        <?php

             include("includes/sidebar.php");

        ?>
        </div><!-- col-md-3 finish -->

            <div class="col-md-9"><!-- col-md-9 begin -->
                <div class="box"><!-- box begin -->
                    <h1>Tienda</h1>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti cupiditate eum necessitatibus, consequatur ab et, doloribus beatae illo, quod explicabo incidunt! Nobis rem recusandae mollitia aliquid cum nihil assumenda deserunt.
                    </p>
                </div><!-- box finish -->
                <div class="row"><!-- row begin -->

            <div class="col-md-4 col-sm-6 center-responsive"><!-- col-md-4 col-sm-6 center-responsiv begin -->

                    <div class="product"><!-- product Begin -->
                   
                   <a href="details.php">
                       
                       <img class="img-responsive" src="admin_area/product_images/product-1.jpg" alt="Product 1">
                       
                   </a>
                   
                   <div class="text"><!-- text Begin -->
                       
                       <h3>
                           <a href="details.php">
                              Camiseta de niña
                           </a>
                       </h3>
                       
                       <p class="price">$1000</p>
                       
                       <p class="button">
                           
                           <a href="details.php" class="btn btn-default">Ver Detalles</a>
                           
                           <a href="details.php" class="btn btn-primary">
                               
                               <i class="fa fa-shopping-cart">
                                   Añadir al carrito
                               </i>
                               
                           </a>
                           
                       </p>
                       
                   </div><!-- text Finish -->
                   
                     </div><!-- product Finish -->

                    </div><!-- col-md-4 col-sm-6 center-responsiv finish -->

            <div class="col-md-4 col-sm-6 center-responsive"><!-- col-md-4 col-sm-6 center-responsiv begin -->

                <div class="product"><!-- product Begin -->

                <a href="details.php">
   
                <img class="img-responsive" src="admin_area/product_images/product-1.jpg" alt="Product 1">
                
                                    </a>

                                    <div class="text"><!-- text Begin -->
                                    
                                    <h3>
                                        <a href="details.php">
                                            Camiseta de niña
                                        </a>
                                    </h3>
                                    
                                    <p class="price">$1000</p>
                                    
                                    <p class="button">
                                        
                                        <a href="details.php" class="btn btn-default">Ver Detalles</a>
                                        
                                        <a href="details.php" class="btn btn-primary">
                                            
                                            <i class="fa fa-shopping-cart">
                                                Añadir al carrito
                                            </i>
                                            
                                        </a>
                                        
                                    </p>
                                    
                                    </div><!-- text Finish -->

                                    </div><!-- product Finish -->

                </div><!-- col-md-4 col-sm-6 center-responsiv finish -->
            <div class="col-md-4 col-sm-6 center-responsive"><!-- col-md-4 col-sm-6 center-responsiv begin -->

                    <div class="product"><!-- product Begin -->

                    <a href="details.php">
                    
                    <img class="img-responsive" src="admin_area/product_images/product-1.jpg" alt="Product 1">
                    
                    </a>

                    <div class="text"><!-- text Begin -->
                    
                    <h3>
                        <a href="details.php">
                            Camiseta de niña
                        </a>
                    </h3>
                    
                    <p class="price">$1000</p>
                    
                    <p class="button">
                        
                        <a href="details.php" class="btn btn-default">Ver Detalles</a>
                        
                        <a href="details.php" class="btn btn-primary">
                            
                            <i class="fa fa-shopping-cart">
                                Añadir al carrito
                            </i>
                            
                        </a>
                        
                    </p>
                    
                    </div><!-- text Finish -->

                    </div><!-- product Finish -->

                    </div><!-- col-md-4 col-sm-6 center-responsiv finish -->
            <div class="col-md-4 col-sm-6 center-responsive"><!-- col-md-4 col-sm-6 center-responsiv begin -->

                    <div class="product"><!-- product Begin -->

                    <a href="details.php">
                    
                    <img class="img-responsive" src="admin_area/product_images/product-1.jpg" alt="Product 1">
                    
                    </a>

                    <div class="text"><!-- text Begin -->
                    
                    <h3>
                        <a href="details.php">
                            Camiseta de niña
                        </a>
                    </h3>
                    
                    <p class="price">$1000</p>
                    
                    <p class="button">
                        
                        <a href="details.php" class="btn btn-default">Ver Detalles</a>
                        
                        <a href="details.php" class="btn btn-primary">
                            
                            <i class="fa fa-shopping-cart">
                                Añadir al carrito
                            </i>
                            
                        </a>
                        
                    </p>
                    
                    </div><!-- text Finish -->

                    </div><!-- product Finish -->

                    </div><!-- col-md-4 col-sm-6 center-responsiv finish -->
            <div class="col-md-4 col-sm-6 center-responsive"><!-- col-md-4 col-sm-6 center-responsiv begin -->

                <div class="product"><!-- product Begin -->

                <a href="details.php">
                
                <img class="img-responsive" src="admin_area/product_images/product-1.jpg" alt="Product 1">
                
                </a>

                <div class="text"><!-- text Begin -->
                
                <h3>
                    <a href="details.php">
                        Camiseta de niña
                    </a>
                </h3>
                
                <p class="price">$1000</p>
                
                <p class="button">
                    
                    <a href="details.php" class="btn btn-default">Ver Detalles</a>
                    
                    <a href="details.php" class="btn btn-primary">
                        
                        <i class="fa fa-shopping-cart">
                            Añadir al carrito
                        </i>
                        
                    </a>
                    
                </p>
                
                </div><!-- text Finish -->

                </div><!-- product Finish -->

                </div><!-- col-md-4 col-sm-6 center-responsiv finish -->
            <div class="col-md-4 col-sm-6 center-responsive"><!-- col-md-4 col-sm-6 center-responsiv begin -->

                    <div class="product"><!-- product Begin -->

                    <a href="details.php">
                    
                    <img class="img-responsive" src="admin_area/product_images/product-1.jpg" alt="Product 1">
                    
                    </a>

                    <div class="text"><!-- text Begin -->
                    
                    <h3>
                        <a href="details.php">
                            Camiseta de niña
                        </a>
                    </h3>
                    
                    <p class="price">$1000</p>
                    
                    <p class="button">
                        
                        <a href="details.php" class="btn btn-default">Ver Detalles</a>
                        
                        <a href="details.php" class="btn btn-primary">
                            
                            <i class="fa fa-shopping-cart">
                                Añadir al carrito
                            </i>
                            
                        </a>
                        
                    </p>
                    
                        </div><!-- text Finish -->

                        </div><!-- product Finish -->

                        </div><!-- col-md-4 col-sm-6 center-responsiv finish -->
            </div><!-- row finish -->
         </div><!-- col-md-9 finish -->

     </div><!-- col-md-12 finish -->

    <center>
        <ul class="pagination">
            <li><a href="#"><<</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">>></a></li>
        </ul>
    </center>

        </div><!-- container finish -->
    </div><!-- content finish -->
    
    <?php

    include("footer.php")

    ?>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>


</body>
</html>