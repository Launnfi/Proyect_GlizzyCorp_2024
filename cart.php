
<?php
$active = "Carrito";
include("includes/header.php");

?>
   <div id="content">
    <div class="container">
        <div class="col-md-12">

        <ul class="breadcrumb">
            <li>
                <a href="index.php">Inicio</a>
            </li>
            <li>
                Carrito
            </li>
        </ul>
        </div>

        <div id="cart" class="col-md-9">

        <div class="box">

    
        <form action="cart.php" method="post" enctype="multipart/from-data">

            <h1>Carrito de compras</h1>

            <?php 
           // Verificar si el cliente está autenticado
           if(isset($_SESSION['cliente_email'])){
               // Obtener el correo electrónico del cliente desde la sesión
               $cliente_email = $_SESSION['cliente_email'];
       
               // Consultamos la base de datos para obtener el cliente_id
               $get_cliente_id = "SELECT cliente_id FROM customer WHERE cliente_email='$cliente_email'";
               $run_cliente = mysqli_query($con, $get_cliente_id);
       
               if(mysqli_num_rows($run_cliente) > 0){
                   $row_cliente = mysqli_fetch_array($run_cliente);
                   $cliente_id = $row_cliente['cliente_id']; // Asignamos el cliente_id
               } else {
                   echo "<script>alert('Cliente no encontrado. Inicia sesión nuevamente.');</script>";
                   echo "<script>window.open('cerrar_sesion.php','_self');</script>";
                   exit;
               }
           } else {
               echo "<script>alert('Debes iniciar sesión para ver tu carrito');</script>";
               echo "<script>window.open('cerrar_sesion.php','_self');</script>";
               exit;
           }
       

           $sel_cart = "SELECT * FROM cart WHERE cliente_id = '$cliente_id'";
           $run_cart = mysqli_query($con, $sel_cart);
       
           $cont = mysqli_num_rows($run_cart); 
       
           ?>
            <p class="text-muted">Tienes <?php echo $cont; ?> cosas en el carrito</p>

            <div class="table-responsive">

            <table class="table">

            <thead>

            <tr>

            <th colspan="2">Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Talle</th>
            <th colspan="1">Eliminar</th>
            <th colspan="2">Sub-total</th>

            </tr>

            </thead>

            <tbody>

            <?php  
            $total = 0;

            while($row_cart = mysqli_fetch_array($run_cart)){

                $pro_id = $row_cart['p_id']; 

                $pro_talle = $row_cart['talle']; 

                $pro_cant = $row_cart['cant'];
                
                $pro_sale = $row_cart['p_precio'];
            
                $get_productos = "SELECT * from productos where producto_id = '$pro_id'";

                $run_productos = mysqli_query($con, $get_productos);

                while($row_productos = mysqli_fetch_array($run_productos)){

                    $producto_titulo = $row_productos['producto_titulo'];

                    $producto_img = $row_productos['producto_img1'];

                    $pro_precio = $row_productos['producto_precio'];

                    $sub_total = $pro_sale * $pro_cant;

                    $_SESSION['pro_cant'] = $pro_cant;

                    $total += $sub_total;

            ?>

            <tr>
                <td>
                  <img class="img-responisve" src="admin_area/product_images/<?php echo $producto_img;?>" alt="Producto 3a">
                </td>

                <td>

                <a href="details.php?pro_id=<?php echo $pro_id;?> "><?php echo $producto_titulo;?></a>

                </td>

                <td>
                <?php echo $pro_cant;?>
                </td>
                <td>

                <?php echo $pro_precio;?>

                </td>

                <td>
                <?php echo $pro_talle;?>
                </td>

                <td>
                    <button type="button" class="btn btn-danger remove-item" data-id="<?php echo $pro_id; ?>">
                        Eliminar
                    </button>
                </td>
                <td>

                <?php echo $sub_total;?>

                </td>
            </tr>

            <?php 
                }
        } ?>


            </tbody>

        <tfoot>
        
        <tr>
            
        <th colspan="5"> total</th>
        <th colspan="2"> <?php echo "$". $total;?></th>
        </tr>

        </tfoot>


            </table>

            <div class="from-inline">
                <div class="form-group">

                <label>Cupón</label>
                <input type="text" name="codigo" class="from-control">
                <input type="submit" class="btn btn-primary" value= "Usar cupón" name="app_cupon">

                </div>
            </div>

            </div>

            <div class="box-footer">
                <div class="pull-left">

                    <a href="index.php" class="btn btn-default">

                    <i class="fa fa-chevron-left"></i>Continuar comprando

                    </a>

                </div>

                <div class="pull-right">

            <a href="cerrar_sesion.php" class="btn btn-primary">

                Pagar <i class="fa fa-chevron-right"></i>

            </a>

            </div>

            
            </div>

        </form>

        </div>
        <?php 
      if (isset($_POST['app_cupon'])) {
        $codigo = $_POST['codigo'];
    
        if ($codigo == "") {
            // No hacer nada si el código está vacío
        } else {
            // Obtener cupones de la base de datos
            $get_cupones = "SELECT * FROM cupon WHERE cupon_codigo = '$codigo'";
            $run_cupones = mysqli_query($con, $get_cupones);
            $check_cupon = mysqli_num_rows($run_cupones);
    
            if ($check_cupon == 1) {
                // Si el cupón existe, obtener los datos
                $row_cupones = mysqli_fetch_array($run_cupones);
    
                $cupon_pro_id = $row_cupones['producto_id'];
                $cupon_precio = $row_cupones['cupon_precio'];
                $cupon_limite = $row_cupones['cupon_limite'];
                $cupon_usado = $row_cupones['cupon_usado'];
    
                // Verificar si el cupón ha expirado
                if ($cupon_limite == $cupon_usado) {
                    echo "<script>alert('Cupón expirado');</script>";
                } else {
                    // Verificar si el producto está en el carrito
                    $get_cart = "SELECT * FROM cart WHERE p_id = '$cupon_pro_id' AND cliente_id = '$cliente_id'";
                    $run_cart = mysqli_query($con, $get_cart);
                    $check_cart = mysqli_num_rows($run_cart);
    
                    if ($check_cart == 1) {
                        // Si el producto está en el carrito, aplicar el cupón
                        $uso = "UPDATE cupon SET cupon_usado = cupon_usado + 1 WHERE cupon_codigo = '$codigo'"; // Agregar comillas en $codigo
                        $run_uso = mysqli_query($con, $uso);
    
                        $upd_cart = "UPDATE cart SET p_precio = '$cupon_precio' WHERE p_id = '$cupon_pro_id' AND cliente_id = '$cliente_id'";
                        $run_upf_cart = mysqli_query($con, $upd_cart);
    
                        echo "<script>alert('Cupón aplicado');</script>";
                        echo "<script>window.open('cart.php','_self');</script>";
                    } else {
                        // Si el producto no está en el carrito
                        echo "<script>alert('El producto no existe en tu carrito');</script>";
                    }
                }
            } else {
                // Si el cupón no existe
                echo "<script>alert('Cupón ingresado no existe');</script>";
            }
        }
    }
    

        ?>
        
        <div id="same-height-row">
                    <div class="col-md-3 col-sm-6">
                        <div class="box same-height headline">

                            <h3 class="text-center">Te podria interesar</h3>
                            
                        </div>
                    </div>
                    <?php 
                   
                   $get_products = "select * from productos order by rand() LIMIT 0,3";
                  
                   $run_products = mysqli_query($con,$get_products);
                  
                  while($row_products=mysqli_fetch_array($run_products)){
                      
                   $pro_id = $row_products['producto_id'];
       
                   $pro_title = $row_products['producto_titulo'];
                   
                   $pro_price = $row_products['producto_precio'];
           
                   $pro_sale_price = $row_products['producto_oferta'];
                   
                   $pro_img1 = $row_products['producto_img1'];
                   
                   $pro_label = $row_products['producto_etiqueta'];

                   $pro_activo = $row_products['activo'];
                   
                   if($pro_label == "sale"){
           
                       $product_price = " <del> $ $pro_price </del> ";
           
                       $product_sale_price = "/ $ $pro_sale_price ";
           
                   }else{
           
                       $product_price = "  $ $pro_price  ";
           
                       $product_sale_price = "";
           
                   }
           
                   if($pro_label == ""){
           
                   }else{
           
                       $product_label = "
                       
                           <a href='#' class='label $pro_label'>
                           
                               <div class='theLabel'> $pro_label </div>
                               <div class='labelBackground'>  </div>
                           
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
        <div class="col-md-3">

            <div id="order-summary" class="box">


           

            <div class="box-header">

            <h3>Resumen del pedido </h3>

            </div>

            <p class="text-muted">

            Los costos de envío y adicionales se calculan según el valor que haya ingresado.

            </p>
            <div class="table-responsive">
            <table class= "table">

            <tbody>
            
            <tr>

            <td>Sub-total</td>
            <th> <?php
            echo "$". $total; ?> </th>

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
                <th><?php echo "$". $total; ?></th>

            </tr>


            </tbody>

            </table>
            <br><br><br><br>


            </div><!-- table-responsive termina -->
            </div><!-- box termina -->



            </div><!-- col-md-3 termina -->

                    <div class="col-md-3"><!-- col-md-3 empieza -->
                    <?php

                        include("includes/sidebar.php");

                    ?>
                    </div><!-- container termina -->
                </div><!-- content termina -->
                
                <?php

                include("footer.php")

                ?>

                <script src="js/jquery-331.min.js"></script>
                <script src="js/bootstrap-337.min.js"></script>
                <script src="js/cart.js"></script>

</body>
</html>