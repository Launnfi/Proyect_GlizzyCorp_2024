
<?php
$active = "Comprar";
include("includes/header.php");
?>

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
            <li>
                    <a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_titulo; ?></a>
                   </li>
                   <li> <?php echo $pro_titulo; ?> </li>
        </ul>
        </div>

        <div class="col-md-3"><!-- col-md-3 empeza -->
        <?php

             include("includes/sidebar.php");

        ?>
        </div><!-- col-md-3 termina -->
        <div class="col-md-9"><!-- col-md-9 empeza -->
               <div id="productMain" class="row"><!-- row empeza -->
                   <div class="col-sm-6"><!-- col-sm-6 empeza -->
                       <div id="mainImage"><!-- #mainImage empeza -->
                           <div id="myCarousel" class="carousel slide" data-ride="carousel"><!-- carousel slide empeza -->
                               <ol class="carousel-indicators"><!-- carousel-indicators empeza -->
                                   <li data-target="#myCarousel" data-slide-to="0" class="active" ></li>
                                   <li data-target="#myCarousel" data-slide-to="1"></li>
                                   <li data-target="#myCarousel" data-slide-to="2"></li>
                               </ol><!-- carousel-indicators termina -->
                               
                               <div class="carousel-inner">
                                   <div class="item active">
                                       <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="Product 3-a"></center>
                                   </div>
                                   <div class="item">
                                       <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="Product 3-b"></center>
                                   </div>
                                   <div class="item">
                                       <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="Product 3-c"></center>
                                   </div>
                               </div>
                               
                               <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- left carousel-control empeza -->
                                   <span class="glyphicon glyphicon-chevron-left"></span>
                                   <span class="sr-only">Anterior</span>
                               </a><!-- left carousel-control termina -->
                               
                               <a href="#myCarousel" class="right carousel-control" data-slide="next"><!-- right carousel-control empeza -->
                                   <span class="glyphicon glyphicon-chevron-right"></span>
                                   <span class="sr-only">Siguiente</span>
                               </a><!-- right carousel-control termina -->
                               
                           </div><!-- carousel slide termina -->
                       </div><!-- mainImage termina -->
                   </div><!-- col-sm-6 termina -->
                   
                   <div class="col-sm-6"><!-- col-sm-6 empeza -->
                       <div class="box"><!-- box empeza -->
                           <h1 class="text-center"><?php echo $pro_titulo; ?></h1>
                           
                           <?php add_cart(); ?>

                        
                           <form action="details.php?pro_id=<?php echo $producto_id; ?>" method="POST" class="form-horizontal">
                                <!-- form-horizontal empieza -->
                                <div class="form-group">
                                    <!-- form-group empieza -->
                                    <label for="" class="col-md-5 control-label">Cantidad</label>

                                    <div class="col-md-7">
                                        <!-- col-md-7 empieza -->
                                        <select name="cant" id="" class="form-control" required>
                                            <!-- select empieza -->
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                        <!-- select termina -->
                                    </div>
                                    <!-- col-md-7 termina -->
                                </div>
                                <!-- form-group termina -->

                                <div class="form-group">
                                    <!-- form-group empieza -->
                                    <label class="col-md-5 control-label">Tallas</label>

                                    <div class="col-md-7">
                                        <!-- col-md-7 empieza -->
                                        <select name="talle" class="form-control" required oninput="setCustomValidity('')"
                                            oninvalid="setCustomValidity('Seleccione un talle')">
                                            <!-- form-control empieza -->
                                            <option disabled selected>Selecciona un talle</option>
                                            <option>S</option>
                                            <option>M</option>
                                            <option>L</option>
                                        </select>
                                        <!-- form-control termina -->
                                    </div>
                                    <!-- col-md-7 termina -->
                                </div>
                                <!-- form-group termina -->
                                   
                                <p class="price"><?php echo "$ $pro_price" ?></p>
                                <p class="text-center buttons">
                                    <input type="hidden" name="pro_id" value="<?php echo $producto_id; ?>">
                                    <button type="submit" class="btn btn-primary i fa fa-shopping-cart">Añadir al carrito</button>
                                </p>
                                
                            </form>
                            
                            <!-- form-horizontal termina -->
                        </div><!-- boxtermina -->
                 
                    <div class="row" id="thumbs"><!-- row empeza -->

                    <div class="col-xs-4"><!-- "col-xs-4 empeza -->
                        <a data-target="#myCarousel" data-slide-to="0" href="#" class="thumb"><!-- "thumb empeza -->
                            <img src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="producto 1" class="img-responsive">
                        </a><!-- "thumb termina -->
                    </div><!-- "col-xs-4 termina -->
                    
                    <div class="col-xs-4"><!-- "col-xs-4 empeza -->
                        <a data-target="#myCarousel" data-slide-to="1" href="#" class="thumb"><!-- "thumb empeza -->
                            <img src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="producto 2" class="img-responsive">
                        </a><!-- "thumb termina -->
                    </div><!-- "col-xs-4 termina -->
                    
                    <div class="col-xs-4"><!-- "col-xs-4 empeza -->
                        <a data-target="#myCarousel" data-slide-to="2" href="#" class="thumb"><!-- "thumb empeza -->
                            <img src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="producto 3" class="img-responsive">
                        </a><!-- "thumb termina -->
                    </div><!-- "col-xs-4 termina -->

                    </div><!-- row termina -->
                  </div><!-- col-sm-6 termina -->

                  <br>
                  <br>
                    </div><!-- row termina -->
               
                    
                <div class="box" id="details"><!-- box empeza -->
                
                <h4>Detalles del producto</h4>

                <p>
                <?php echo $pro_desc; ?>
                    
                </p>

                <h4>Talles</h4>
                <ul>
                    <li>S</li>
                    <li>M</li>
                    <li>L</li>
                </ul>

                <hr>

            </div><!-- box termina -->

                <div id="row same-height-row"><!-- same-height-row empeza -->
                    <div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 empeza -->
                        <div class="box same-height headline"><!--box same-height headline empeza -->

                            <h3 class="text-center">Te podria interesar</h3>
                            
                        </div><!--box same-height headline termina -->
                    </div><!-- col-md-3 col-sm-6 termina -->

                    <?php 
                    
                    $get_productos = "SELECT * FROM productos order by RAND() LIMIT 0,3";

                    $run_productos = mysqli_query($con, $get_productos);

                    while($row_productos=mysqli_fetch_array($run_productos)){

                        $pro_id = $row_productos['producto_id'];

                        $pro_titulo = $row_productos['producto_titulo'];

                        $pro_img1 = $row_productos['producto_img1'];

                        $pro_price = $row_productos['producto_precio'];

                        echo "
                        <div class = 'col-md-4 col-sm-6 center-responsive'>

                            <div class ='product same-height' >
                            
                                <a href= 'details.php?pro_id= $producto_id '>
                                <img class= 'img-responsive' src='admin_area/product_images/$pro_img1'>
                                </a>

                                <div class= 'text'>
                                <h3><a href='details.php?pro_id=$pro_id'> $pro_titulo </a></h3>

                                <p class ='price'> <p class='price'> "; echo "$"; echo" $pro_price </p>
                                </div>

                            </div>
                        </div>
                        ";


                    }
                    
                    ?>
                   
                </div><!-- same-height-row termina -->
        
             
             
                     </div><!-- productMain termina -->
    
                      </div><!-- col-md-9 termina -->


            </div><!-- container termina -->
    </div><!-- content termina -->
    
    <?php

    include("footer.php")

    ?>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>


</body>
</html>