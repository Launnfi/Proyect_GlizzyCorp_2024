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

        </div><!-- col-md-12 finish -->
        <div class="col-md-3"><!-- col-md-3 begin -->
        <?php

             include("includes/sidebar.php");

        ?>
        </div><!-- col-md-3 finish -->

            <div class="col-md-9"><!-- col-md-9 begin -->

                <?php

                if(!isset($_GET['p_cat'])){

                    if(!isset($_GET['cat'])){

                

                        echo "

                        <div class='box'><!-- box begin -->
                            <h1>Tienda</h1>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti cupiditate eum necessitatibus, consequatur ab et, doloribus beatae illo, quod explicabo incidunt! Nobis rem recusandae mollitia aliquid cum nihil assumenda deserunt.
                            </p>
                        </div><!-- box finish -->
                        ";
                    }
                    }
                ?>
                
                <div class="row"><!-- row begin -->

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

                
            </div><!-- row finish -->
         

     

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