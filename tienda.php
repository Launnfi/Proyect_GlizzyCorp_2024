<?php 
$active = "Comprar";
include("includes/header.php");

?>

   <div id="content"><!-- content empieza -->
    <div class="container"><!-- container empieza -->
        <div class="col-md-12"><!-- col-md-12 empieza -->

        <ul class="breadcrumb"><!-- breadcrumb empieza-->
            <li>
                <a href="index.php">Inicio</a>
            </li>
            <li>
                Tienda
            </li>

        </ul>

        </div><!-- col-md-12 termino -->
        <div class="col-md-3"><!-- col-md-3 empieza -->
        <?php

             include("includes/sidebar.php");

        ?>
        </div><!-- col-md-3 termino -->

            <div class="col-md-9"><!-- col-md-9 empieza -->

                <?php

                if(!isset($_GET['p_cat'])){

                    if(!isset($_GET['cat'])){

                

                        echo "

                        <div class='box'><!-- box empieza -->
                            <h1>Tienda</h1>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti cupiditate eum necessitatibus, consequatur ab et, doloribus beatae illo, quod explicabo incidunt! Nobis rem recusandae mollitia aliquid cum nihil assumenda deserunt.
                            </p>
                        </div><!-- box termino -->
                        ";
                    }
                    }
                ?>
                
                <div class="row"><!-- row empieza -->

                <?php
                if(!isset($_GET['p_cat'])){

                    if(!isset($_GET['cat'])){

                        $per_page = 6;

                        if(isset($_GET['page'])){

                            $page = $_GET['page'];

                        }else{

                                $page = 1;
                            
                        }
                        
                        $start_from = ($page-1) * $per_page;
                             
                        $get_productos = "SELECT * from productos order by 1 DESC LIMIT $start_from,$per_page";
                         
                        $run_productos = mysqli_query($con,$get_productos);

                        if (!$run_productos) {
                            echo "Error en la consulta: " . mysqli_error($con);
                            exit();
                        }
                         
                        while($row_products=mysqli_fetch_array($run_productos)){

                                $pro_id = $row_products['producto_id'];
        
                                $pro_titulo = $row_products['producto_titulo'];
                                
                                $pro_precio = $row_products['producto_precio'];
                                
                                $pro_img1 = $row_products['producto_img1'];

                                echo"
                                    <div class= 'col-md-4 col-sm-6 center-responsive'>

                                     <div class= 'product'> 
                                         <a href= 'details.php?pro_id=$pro_id'> 
                                        
                                            <img class = 'img-responsive' src= 'admin_area/product_images/$pro_img1'>
                                        
                                         </a>
                                        <div class= 'text'> 
                                        
                                            <h3>
                                            <a href= 'details.php?pro_id= $pro_id'> $pro_titulo </a>

                                            </h3>
                                            <p class= 'precio'> 
                                              $  $pro_precio
                                            </p>

                                            <p class = 'button'>
                                            <a class= 'btn btn-default' href= 'details.php?pro_id= $pro_id'>
                                            Ver detalles
                                            </a>

                                             <p class = 'button'>

                                            <a class= 'btn btn-primary' href= 'details.php?pro_id= $pro_id'>
                                            <i class = 'fa fa-shopping-cart' > </i> Añadir al carrito

                                            </a>


                                            </p>

                                        
                                        </div>


                                      </div>
                                        
                                     </div>
                                    ";
                                

                            
                        

                        }
                        
                        ?>

                
            </div><!-- row termino -->
         

     

    <center>
        <ul class="pagination">
        <?php
        $query = "SELECT * FROM productos";
        $resultado = mysqli_query($con, $query);
        $total_rec = mysqli_num_rows($resultado);
        $total_pag = ceil($total_rec / $per_page);

        // Primera página
        echo "
            <li>
                <a href='tienda.php?page=1'>Página Inicio</a>
            </li>
        ";

        // Páginas intermedias
        for ($i = 1; $i <= $total_pag; $i++) {
            echo "
                <li>
                    <a href='tienda.php?page=".$i."'>".$i."</a>
                </li>
            ";
        }

        // Última página
        echo "
            <li>
                <a href='tienda.php?page=".$total_pag."'>Última casilla</a>
            </li>
        ";
         }
             }    

        ?>
   </ul>
    </center>
              
             
                     <?php
                     
                      getPCatpro(); ?>  
                     
              
    
          </div><!-- col-md-9 termino -->
        </div><!-- container termino -->
    </div><!-- content termino -->
    
    <?php

    include("footer.php")

    ?>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>


</body>
</html>