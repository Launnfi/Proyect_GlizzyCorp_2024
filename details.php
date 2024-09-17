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
   
   <div id="top"><!-- Top empeza -->
       
       <div class="container"><!-- container empeza -->
           
           <div class="col-md-6 offer"><!-- col-md-6 offer empeza -->
               
               <a href="#" class="btn btn-success btn-sm">Bienvenido</a>
               <a href="checkout.php">4 Productos en tu carrito | Total: $10000 </a>
               
           </div><!-- col-md-6 offer Finish -->
           
           <div class="col-md-6"><!-- col-md-6 empeza -->
               
               <ul class="menu"><!-- cmenu empeza -->
                   
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
   
   <div id="navbar" class="navbar navbar-default"><!-- navbar navbar-default empeza -->
       
       <div class="container"><!-- container empeza -->
           
           <div class="navbar-header"><!-- navbar-header empeza -->
               
               <a href="index.php" class="navbar-brand home"><!-- navbar-brand home empeza -->
                   
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
           
           <div class="navbar-collapse collapse" id="navigation"><!-- navbar-collapse collapse empeza -->
               
               <div class="padding-nav"><!-- padding-nav empeza -->
                   
                   <ul class="nav navbar-nav left"><!-- nav navbar-nav left empeza -->
                       
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
               
               <a href="cart.php" class="btn navbar-btn btn-primary right"><!-- btn navbar-btn btn-primary empeza -->
                   
                   <i class="fa fa-shopping-cart"></i>
                   
                   <span>4 Productos en tu carrito</span>
                   
               </a><!-- btn navbar-btn btn-primary Finish -->
               
               <div class="navbar-collapse collapse right"><!-- navbar-collapse collapse right empeza -->
                   
                   <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search"><!-- btn btn-primary navbar-btn empeza -->
                       
                       <span class="sr-only">Buscar</span>
                       
                       <i class="fa fa-search"></i>
                       
                   </button><!-- btn btn-primary navbar-btn Finish -->
                   
               </div><!-- navbar-collapse collapse right Finish -->
               
               <div class="collapse clearfix" id="search"><!-- collapse clearfix empeza -->
                   
                   <form method="get" action="results.php" class="navbar-form"><!-- navbar-form empeza -->
                       
                       <div class="input-group"><!-- input-group empeza -->
                           
                           <input type="text" class="form-control" placeholder="Search" name="user_query" required>
                           
                           <span class="input-group-btn"><!-- input-group-btn empeza -->
                           
                           <button type="submit" name="search" value="Search" class="btn btn-primary"><!-- btn btn-primary empeza -->
                               
                               <i class="fa fa-search"></i>
                               
                           </button><!-- btn btn-primary Finish -->
                           
                           </span><!-- input-group-btn Finish -->
                           
                       </div><!-- input-group Finish -->
                       
                   </form><!-- navbar-form Finish -->
                   
               </div><!-- collapse clearfix Finish -->
               
           </div><!-- navbar-collapse collapse Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- navbar navbar-default Finish -->

   <div id="content"><!-- content empeza -->
    <div class="container"><!-- container empeza -->
        <div class="col-md-12"><!-- col-md-12 empeza -->

        <ul class="breadcrumb"><!-- breadcrumb empeza-->
            <li>
                <a href="index.php">Inicio</a>
            </li>
            <li>
                Detalles
            </li>
        </ul>
        </div>

        <div class="col-md-3"><!-- col-md-3 empeza -->
        <?php

             include("includes/sidebar.php");

        ?>
        </div><!-- col-md-3 finish -->
        <div class="col-md-9"><!-- col-md-9 empeza -->
               <div id="productMain" class="row"><!-- row empeza -->
                   <div class="col-sm-6"><!-- col-sm-6 empeza -->
                       <div id="mainImage"><!-- #mainImage empeza -->
                           <div id="myCarousel" class="carousel slide" data-ride="carousel"><!-- carousel slide empeza -->
                               <ol class="carousel-indicators"><!-- carousel-indicators empeza -->
                                   <li data-target="#myCarousel" data-slide-to="0" class="active" ></li>
                                   <li data-target="#myCarousel" data-slide-to="1"></li>
                                   <li data-target="#myCarousel" data-slide-to="2"></li>
                               </ol><!-- carousel-indicators Finish -->
                               
                               <div class="carousel-inner">
                                   <div class="item active">
                                       <center><img class="img-responsive" src="admin_area/product_images/Product-3a.jpg" alt="Product 3-a"></center>
                                   </div>
                                   <div class="item">
                                       <center><img class="img-responsive" src="admin_area/product_images/Product-3b.jpg" alt="Product 3-b"></center>
                                   </div>
                                   <div class="item">
                                       <center><img class="img-responsive" src="admin_area/product_images/Product-3c.jpg" alt="Product 3-c"></center>
                                   </div>
                               </div>
                               
                               <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- left carousel-control empeza -->
                                   <span class="glyphicon glyphicon-chevron-left"></span>
                                   <span class="sr-only">Anterior</span>
                               </a><!-- left carousel-control Finish -->
                               
                               <a href="#myCarousel" class="right carousel-control" data-slide="next"><!-- right carousel-control empeza -->
                                   <span class="glyphicon glyphicon-chevron-right"></span>
                                   <span class="sr-only">Siguiente</span>
                               </a><!-- right carousel-control Finish -->
                               
                           </div><!-- carousel slide Finish -->
                       </div><!-- mainImage Finish -->
                   </div><!-- col-sm-6 Finish -->
                   
                   <div class="col-sm-6"><!-- col-sm-6 empeza -->
                       <div class="box"><!-- box empeza -->
                           <h1 class="text-center">Ropa de niño</h1>
                           
                           <form action="details.php" class="form-horizontal" method="post"><!-- form-horizontal empeza -->
                               <div class="form-group"><!-- form-group empeza -->
                                   <label for="" class="col-md-5 control-label">Cantidad</label>
                                   
                                   <div class="col-md-7"><!-- col-md-7 empeza -->
                                          <select name="product_qty" id="" class="form-control"><!-- select empeza -->
                                           <option>1</option>
                                           <option>2</option>
                                           <option>3</option>
                                           <option>4</option>
                                           <option>5</option>
                                           </select><!-- select Finish -->
                                   
                                    </div><!-- col-md-7 Finish -->
                                   
                               </div><!-- form-group Finish -->
                               
                               <div class="form-group"><!-- form-group empeza -->
                                   <label class="col-md-5 control-label">Tallas</label>
                                   
                                   <div class="col-md-7"><!-- col-md-7 empeza -->
                                       
                                       <select name="product_size" class="form-control"><!-- form-control empeza -->
                                          
                                           <option>Selecciona un talle</option>
                                           <option>S</option>
                                           <option>M</option>
                                           <option>L</option>
                                           
                                       </select><!-- form-control Finish -->
                                       
                                   </div><!-- col-md-7 Finish -->
                               </div><!-- form-group Finish -->

                            <p class="price">$1500</p>
                            <p class="text-center buttons"><button class="btn btn-primary i fa fa-shopping-cart">Añadir al carrito</button></p>

                            </form><!-- form-horizontal Finish -->
                        </div><!-- boxFinish -->
                 
                    <div class="row" id="thumbs"><!-- row empeza -->

                    <div class="col-xs-4"><!-- "col-xs-4 empeza -->
                        <a data-target="#myCarousel" data-slide-to="0" href="#" class="thumb"><!-- "thumb empeza -->
                            <img src="admin_area/product_images/product-6a.jpg" alt="producto 1" class="img-responsive">
                        </a><!-- "thumb finish -->
                    </div><!-- "col-xs-4 finish -->
                    
                    <div class="col-xs-4"><!-- "col-xs-4 empeza -->
                        <a data-target="#myCarousel" data-slide-to="1" href="#" class="thumb"><!-- "thumb empeza -->
                            <img src="admin_area/product_images/product-3c.jpg" alt="producto 2" class="img-responsive">
                        </a><!-- "thumb finish -->
                    </div><!-- "col-xs-4 finish -->
                    
                    <div class="col-xs-4"><!-- "col-xs-4 empeza -->
                        <a data-target="#myCarousel" data-slide-to="2" href="#" class="thumb"><!-- "thumb empeza -->
                            <img src="admin_area/product_images/Product-3a.jpg" alt="producto 3" class="img-responsive">
                        </a><!-- "thumb finish -->
                    </div><!-- "col-xs-4 finish -->

                    </div><!-- row Finish -->
                  </div><!-- col-sm-6 Finish -->

                  <br>
                  <br>
                    </div><!-- row Finish -->
               
                    
                <div class="box" id="details"><!-- box empeza -->
                
                <h4>Detalles del producto</h4>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum aut obcaecati veritatis eligendi fugit! In cumque tenetur assumenda odio impedit itaque natus incidunt magnam possimus, omnis nisi consectetur cupiditate reiciendis!
                    
                </p>

                <h4>Talles</h4>
                <ul>
                    <li>S</li>
                    <li>M</li>
                    <li>L</li>
                </ul>

                <hr>

            </div><!-- box Finish -->

                <div id="same-height-row"><!-- same-height-row empeza -->
                    <div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 empeza -->
                        <div class="box same-height headline"><!--box same-height headline empeza -->

                            <h3 class="text-center">Te podria interesar</h3>
                            
                        </div><!--box same-height headline Finish -->
                    </div><!-- col-md-3 col-sm-6 Finish -->
                    <div class="col-md-3 col-sm-6 center-responsive"><!-- col-md-3 col-sm-6 center-responsive empeza -->
                       <div class="product same-height"><!-- product same-height empeza -->
                           <a href="details.php">
                               <img class="img-responsive" src="admin_area/product_images/Producto.jpg" alt="Product 6">
                            </a>
                            
                            <div class="text"><!-- text empeza -->
                                <h3><a href="details.php">M-Dev Tank Top Women</a></h3>
                                
                                <p class="price">$40</p>
                                
                            </div><!-- text Finish -->
                            
                        </div><!-- product same-height Finish -->
                   </div><!-- col-md-3 col-sm-6 center-responsive Finish -->
                   
                   <div class="col-md-3 col-sm-6 center-responsive"><!-- col-md-3 col-sm-6 center-responsive empeza -->
                       <div class="product same-height"><!-- product same-height empeza -->
                           <a href="details.php">
                               <img class="img-responsive" src="admin_area/product_images/ProductoA3.jpg" alt="Product 6">
                            </a>
                            
                            <div class="text"><!-- text empeza -->
                                <h3><a href="details.php">M-Dev Street Shirt Women</a></h3>
                                
                                <p class="price">$45</p>
                                
                            </div><!-- text Finish -->
                            
                        </div><!-- product same-height Finish -->
                   </div><!-- col-md-3 col-sm-6 center-responsive Finish -->
                   
                   <div class="col-md-3 col-sm-6 center-responsive"><!-- col-md-3 col-sm-6 center-responsive empeza -->
                       <div class="product same-height"><!-- product same-height empeza -->
                           <a href="details.php">
                               <img class="img-responsive" src="admin_area/product_images/ProductoA1.jpg" alt="Product 6">
                            </a>
                            
                            <div class="text"><!-- text empeza -->
                                <h3><a href="details.php">M-Dev Polo T-Shirt Women</a></h3>
                                
                                <p class="price">$50</p>
                                
                            </div><!-- text Finish -->
                      </div> <!-- product same-height Finish -->
                      </div><!--col-d-3 col-sm-6  Finish -->
                </div><!-- same-height-row Finish -->
        
             
             
                     </div><!-- productMain finish -->
    
                      </div><!-- col-md-9 finish -->


            </div><!-- container finish -->
    </div><!-- content finish -->
    
    <?php

    include("footer.php")

    ?>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>


</body>
</html>