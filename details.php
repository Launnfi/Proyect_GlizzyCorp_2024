<?php
$active = "Comprar";
include("includes/header.php");
?>

<?php 

if(isset($_GET['pro_id'])){
    
    $product_id = $_GET['pro_id'];
    
    $get_product = "select * from productos where producto_id='$product_id'";
    
    $run_product = mysqli_query($con,$get_product);
    
    $row_products = mysqli_fetch_array($run_product);
    
    $p_cat_id = $row_products['p_cat_id'];
    
    $pro_title = $row_products['producto_titulo'];
    $pro_desc = $row_products['producto_desc'];
    $pro_img1 = $row_products['producto_img1'];
    $pro_img2 = $row_products['producto_img2'];
    $pro_img3 = $row_products['producto_img3'];
        
    $pro_label = $row_products['producto_etiqueta'];

    if($pro_label == ""){
        $product_label = "";
    }else{
        $product_label = "
            <a href='#' class='label $pro_label'>
                <div class='theLabel'> $pro_label </div>
                <div class='labelBackground'>  </div>
            </a>
        ";
    }
    
    $get_p_cat = "select * from productos_categorias where p_cat_id='$p_cat_id'";
    
    $run_p_cat = mysqli_query($con,$get_p_cat);
    
    $row_p_cat = mysqli_fetch_array($run_p_cat);
    
    $p_cat_title = $row_p_cat['p_cat_titulo'];
    $get_variants = "SELECT * FROM variantes WHERE producto_id = '$product_id' AND activo = 1";
    $run_variants = mysqli_query($con, $get_variants);
    $first_variant = mysqli_fetch_array($run_variants); 

    // Asignar precio y oferta de la primera variante
    $pro_price = $first_variant['precio_var']; 
    $pro_sale_price = $first_variant['var_precio_of']; 
}

?>
<script src="js/ajax_details.js"></script>
   <div id="content">
    <div class="container">
        <div class="col-md-12">

        <ul class="breadcrumb">
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

        <div class="col-md-3">
        <?php

             include("includes/sidebar.php");

        ?>
        </div>
        <div class="col-md-9">
               <div id="productMain" class="row">
                   <div class="col-sm-6">
                       <div id="mainImage">
                           <div id="myCarousel" class="carousel slide" data-ride="carousel">
                               <ol class="carousel-indicators">
                                   <li data-target="#myCarousel" data-slide-to="0" class="active" ></li>
                                   <li data-target="#myCarousel" data-slide-to="1"></li>
                                   <li data-target="#myCarousel" data-slide-to="2"></li>
                               </ol>
                               
                               <div class="carousel-inner">
                                   <div class="item active">
                                       <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="Product 3-a"></center>
                                   </div>  
                                <?php if (!empty($pro_img2)): ?>
                                    <div class="item">
                                        <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img2; ?>" alt=""></center>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($pro_img3)): ?>
                                    <div class="item">
                                        <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img3; ?>" alt=""></center>
                                    </div>
                                <?php endif; ?>
                            </div>
                               
                               <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                                   <span class="glyphicon glyphicon-chevron-left"></span>
                                   <span class="sr-only">Anterior</span>
                               </a>
                               
                               <a href="#myCarousel" class="right carousel-control" data-slide="next">
                                   <span class="glyphicon glyphicon-chevron-right"></span>
                                   <span class="sr-only">Siguiente</span>
                               </a>
                               
                           </div>
                       </div>
                   </div>
                   
                   <div class="col-sm-6">
                       <div class="box">
                           <h1 class="text-center"><?php echo $pro_titulo; ?></h1>
                           
                           <?php add_cart(); ?>

                        
                           <form action="details.php?pro_id=<?php echo $producto_id; ?>" method="POST" class="form-horizontal">
                               
                                <div class="form-group">
                                   
                                    <label for="" class="col-md-5 control-label">Cantidad</label>

                                    <div class="col-md-7">
                                       
                                        <select name="cant" id="" class="form-control" required>
                                            
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                     
                                    </div>
                                  
                                </div>
                             

                                <div class="form-group">
                                    
                                    <label class="col-md-5 control-label">Tallas</label>

                                    <div class="col-md-7">
                                        
                                        <select name="talle" class="form-control" required oninput="setCustomValidity('')" oninvalid="setCustomValidity('Seleccione un talle')" onchange="updatePrice(this.value)">
                                        <option value="" disabled selected>Selecciona un talle</option>

                                        <?php
                                        $get_variants = "SELECT * FROM variantes WHERE producto_id = '$product_id' AND activo = 1";
                                        $run_variants = mysqli_query($con, $get_variants);

                                        while ($row_variants = mysqli_fetch_array($run_variants)) {
                                            $talle = $row_variants['var_id'];
                                            $stock = $row_variants['stock_var'];
                                            $talle = $row_variants['talle'];
                                            $talla = "$talle";

                                            if ($stock > 0) {
                                                echo "<option value='$talla'>$talla</option>";
                                                
                                            }
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>
                             
                                <?php 
                                
                                if ($pro_label == "sale") {
                                    // Mostrar precio con oferta y etiqueta de "sale"
                                    echo "
                                        <p class='price'>
                                            Precio: <del> $$pro_price</del><br/>
                                            Oferta: $$pro_sale_price
                                        </p>
                                        $product_label
                                    ";
                                } else {
                                    // Mostrar solo el precio normal sin etiqueta de "sale"
                                    echo "
                                        <p class='price'>
                                            Precio: $$pro_price
                                        </p>
                                    ";
                                }
                                    ?>
                                   
                                <p class="text-center buttons">
                                    <input type="hidden" name="pro_id" value="<?php echo $producto_id; ?>">
                                    <button type="submit" class="btn btn-primary i fa fa-shopping-cart">Añadir al carrito</button>
                                </p>
                                
                            </form>
                            
                           
                        </div>
                 
                    <div class="row" id="thumbs">

                    <div class="col-xs-4">
                        <a data-target="#myCarousel" data-slide-to="0" href="#" class="thumb">
                            <img src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="" class="img-responsive">
                        </a>
                    </div>
                    
                    <div class="col-xs-4">
                        <a data-target="#myCarousel" data-slide-to="1" href="#" class="thumb">
                            <img src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="" class="img-responsive">
                        </a>
                    </div>
                    
                    <div class="col-xs-4">
                        <a data-target="#myCarousel" data-slide-to="2" href="#" class="thumb">
                            <img src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="" class="img-responsive">
                        </a>
                    </div>

                    </div>
                  </div>

                  <br>
                  <br>
                    </div>
               
                    
                <div class="box" id="details">
                
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

                <div id="row same-height-row">
                    <div class="col-md-3 col-sm-6">
                        <div class="box same-height headline">

                            <h3 class="text-center">Te podria interesar</h3>
                            
                        </div>
                    </div>

                    <?php 
                $get_products = "
                SELECT p.*, 
                       v.precio_var AS producto_precio, 
                       v.var_precio_of AS producto_oferta
                FROM productos p
                JOIN variantes v ON p.producto_id = v.producto_id
                ORDER BY RAND() 
                LIMIT 0,3
            ";
            
            $run_products = mysqli_query($con, $get_products);
            
            while ($row_products = mysqli_fetch_array($run_products)) {
                $pro_id = $row_products['producto_id'];
                $pro_title = $row_products['producto_titulo'];
                $pro_price = $row_products['producto_precio']; // Precio desde variantes
                $pro_sale_price = $row_products['producto_oferta']; // Oferta desde variantes
                $pro_img1 = $row_products['producto_img1'];
                $pro_label = $row_products['producto_etiqueta'];
                $pro_activo = $row_products['activo'];
                
              
                if ($pro_label == "sale") {
                    $product_price = "<del> $ $pro_price </del>";
                    $product_sale_price = "/ $ $pro_sale_price ";
                } else {
                    $product_price = "$ $pro_price";
                    $product_sale_price = "";
                }
            
                if ($pro_label == "") {
                    $product_label = "";
                } else {
                    $product_label = "
                        <a href='#' class='label $pro_label'>
                            <div class='theLabel'>$pro_label</div>
                            <div class='labelBackground'></div>
                        </a>
                    ";
                }
                   if($pro_activo == 0){

                   }else{

                  
                   echo "
                   
                   <div class='col-md-3 col-sm-6 center-responsive'>
                   
                       <div class='product'>
                    
                           <a href='details.php?pro_id=$pro_id'>
                           
                               <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                           
                           </a>
                           
                           <div class='text'>
                           
                               <h3>
                       
                                   <a href='details.php?pro_id=$pro_id'>
           
                                       $pro_title
           
                                   </a>
                               
                               </h3>
                               
                               <p class='price'>
                               
                               $product_price &nbsp;$product_sale_price
                               
                               </p>
                               
                               <p class='button'>
                               
                                   <a class='btn btn-default' href='details.php?pro_id=$pro_id'>
           
                                       View Details
           
                                   </a>
                               
                                   <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
           
                                       <i class='fa fa-shopping-cart'></i> Add to Cart
           
                                   </a>
                               
                               </p>
                           
                           </div>
           
                           $product_label
                       
                       </div>
                   
                   </div>
                   
                   ";
                }
                  }
                  
                    
                    ?>
                   
                </div>
             
             
                     </div>
    
                      </div>


            </div>
    </div>
    
    <?php

    include("footer.php")

    ?>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>


</body>
</html>