
<?php
$active = "Carrito";
include("includes/header.php");

?>

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

            <?php 
            $ip_add = getRealIpUser();

            $sel_cart = "SELECT * from cart where ip_add = '$ip_add'";

            $run_cart = mysqli_query($con, $sel_cart);

            $cont= mysqli_num_rows($run_cart);

            ?>
            <p class="text-muted">Tienes <?php echo $cont; ?> cosas en el carrito</p>

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
                    <input type="checkbox" name= "remove[]" value="<?php echo $pro_id;?>">
                </td>

                <td>

                <?php echo $sub_total;?>

                </td>
            </tr>

            <?php 
                }
        } ?>


            </tbody><!-- tbody final -->

        <tfoot><!-- tfoot begin -->
        
        <tr>
            
        <th colspan="5"> total</th>
        <th colspan="2"> <?php echo $total;?></th>
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

            <button type="submit"  name= "act" value="Update cart" class="btn btn-default"><!--btn btn-default" begin -->

             <i class="fa fa-refresh"></i>Actualizar Carrito

            </button><!--btn btn-default" finish -->

            <a href="checkout.php" class="btn btn-primary">

                Pagar <i class="fa fa-chevron-right"></i>

            </a>

            </div><!--pull-right dinish -->

            
            </div><!--box-footer finish -->

        </form><!-- from finish -->

        </div><!-- box finish -->
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

        
        <div id="same-height-row"><!-- same-height-row begin -->
                    <div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 begin -->
                        <div class="box same-height headline"><!--box same-height headline begin -->

                            <h3 class="text-center">Te podria interesar</h3>
                            
                        </div><!--box same-height headline Finish -->
                    </div><!-- col-md-3 col-sm-6 Finish -->
                    <?php 
                    
                    $get_productos = "SELECT * from productos order by rand() LIMIT 0,3";

                    $run_productos = mysqli_query($con, $get_productos);

                   

                    while($row_productos = mysqli_fetch_array($run_productos)){

                        $pro_id = $row_productos['producto_id'];

                        $pro_titulo = $row_productos['producto_titulo'];

                        $pro_img = $row_productos['producto_img1'];

                        $pro_precio = $row_productos['producto_precio'];

                        

                        echo "
                        
                        
                    
                    <div class='col-md-3 col-sm-6 center-responsive'><!-- col-md-3 col-sm-6 center-responsive Begin -->
                       <div class='product same-height'><!-- product same-height Begin -->
                           <a href='details.php?pro_id=$pro_id'>
                               <img class='img-responsive' src='admin_area/product_images/$pro_img' alt='Product 6'>
                            </a>
                            
                            <div class='text'><!-- text Begin -->
                                <h3><a href='details.php?pro_id=$pro_id>$pro_titulo</a></h3>
                                
                                <p class='price'>$$pro_precio</p>
                                
                            </div><!-- text Finish -->
                            
                        </div><!-- product same-height Finish -->
                   </div><!-- col-md-3 col-sm-6 center-responsive Finish -->
                   ";



                    }
                    ?>
        </div><!-- same-height-row termina -->
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
                <th><?php echo $total; ?></th>

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