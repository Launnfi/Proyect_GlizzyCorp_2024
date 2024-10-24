
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
            $ip_add = getRealIpUser();

            $sel_cart = "SELECT * from cart where ip_add = '$ip_add'";

            $run_cart = mysqli_query($con, $sel_cart);

            $cont= mysqli_num_rows($run_cart);

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
            
                $get_productos = "SELECT * from productos where producto_id = '$pro_id'";

                $run_productos = mysqli_query($con, $get_productos);

                while($row_productos = mysqli_fetch_array($run_productos)){

                    $producto_titulo = $row_productos['producto_titulo'];

                    $producto_img = $row_productos['producto_img1'];

                    $pro_precio = $row_productos['producto_precio'];

                    $sub_total = $row_productos['producto_precio']*$pro_cant;

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

            </div>

            <div class="box-footer">
                <div class="pull-left">

                    <a href="index.php" class="btn btn-default">

                    <i class="fa fa-chevron-left"></i>Continuar comprando

                    </a>

                </div>

                <div class="pull-right">

            <button type="submit"  name= "act" value="Update cart" class="btn btn-default">

             <i class="fa fa-refresh"></i>Actualizar Carrito

            </button>

            <a href="cerrar_sesion.php" class="btn btn-primary">

                Pagar <i class="fa fa-chevron-right"></i>

            </a>

            </div>

            
            </div>

        </form>

        </div>
        <?php 
        function act_cart(){
            global $con;
        
            if(isset($_POST['act'])){
                    foreach($_POST['remove'] as $rem_id){
                        $elim_prod = "DELETE from cart where p_id = $rem_id";
                        $run_elim = mysqli_query($con, $elim_prod);
        
                        if($run_elim){
                            echo "<script>window.open('cart.php', '_self')</script>";
                        }
                    }
                }
            }
        
        echo $up_cart =  act_cart();
        
        
        ?>

        
        <div id="same-height-row">
                    <div class="col-md-3 col-sm-6">
                        <div class="box same-height headline">

                            <h3 class="text-center">Te podria interesar</h3>
                            
                        </div>
                    </div>
                    <?php 
                    
                    $get_productos = "SELECT * from productos order by rand() LIMIT 0,3";

                    $run_productos = mysqli_query($con, $get_productos);

                   

                    while($row_productos = mysqli_fetch_array($run_productos)){

                        $pro_id = $row_productos['producto_id'];

                        $pro_titulo = $row_productos['producto_titulo'];

                        $pro_img = $row_productos['producto_img1'];

                        $pro_precio = $row_productos['producto_precio'];

                        

                        echo "
                        
                        
                    
                    <div class='col-md-3 col-sm-6 center-responsive'><!-- col-md-3 col-sm-6 center-responsive empieza -->
                       <div class='product same-height'><!-- product same-height empieza -->
                           <a href='details.php?pro_id=$pro_id'>
                               <img class='img-responsive' src='admin_area/product_images/$pro_img' alt='Product 6'>
                            </a>
                            
                            <div class='text'><!-- text empieza -->
                                <h3><a href='details.php?pro_id=$pro_id>$pro_titulo</a></h3>
                                
                                <p class='price'>$ $pro_precio</p>
                                
                            </div><!-- text termina -->
                            
                        </div><!-- product same-height termina -->
                   </div><!-- col-md-3 col-sm-6 center-responsive termina -->
                   ";



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