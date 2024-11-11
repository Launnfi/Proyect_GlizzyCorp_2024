<?php
    $active = "Inicio";
    include("includes/header.php");
    
    
    
?>


   <div class="container" id="slider"><!-- container empieza -->
       
       <div class="col-md-12"><!-- col-md-12 empieza -->
           
           <div class="carousel slide" id="myCarousel" data-ride="carousel"><!-- carousel slide empieza -->
               
               <ol class="carousel-indicators"><!-- carousel-indicators empieza -->
                   
                   <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                   <li data-target="#myCarousel" data-slide-to="1"></li>
                   <li data-target="#myCarousel" data-slide-to="2"></li>
                   <li data-target="#myCarousel" data-slide-to="3"></li>
                   
               </ol><!-- carousel-indicators termino -->
               
               <div class="carousel-inner"><!-- carousel-inner empieza -->
                   
                  <!-- <div class="item active">
                       
                       <img src="admin_area/slides_images/slide-1.jpg" alt="Slider Image 1">
                       
                   </div>
                   
                   <div class="item">
                       
                       <img src="admin_area/slides_images/slide-2.jpg" alt="Slider Image 2">
                       
                   </div>
                   
                   <div class="item">
                       
                       <img src="admin_area/slides_images/slide-3.jpg" alt="Slider Image 3">
                       
                   </div>
                   
                   <div class="item">
                       
                       <img src="admin_area/slides_images/slide-4.jpg" alt="Slider Image 4">
                       
                   </div>
-->

                   <?php 
                   $get_slides = "select * from slider LIMIT 0,1";
                   
                   $run_slides = mysqli_query($con,$get_slides);
                   
                   while($row_slides=mysqli_fetch_array($run_slides)){
                       
                       $slide_name = $row_slides['slide_name'];
                       $slide_image = $row_slides['slide_image'];
                       
                       echo "
                       
                       <div class='item active'>
                       
                       <img src='admin_area/slides_images/$slide_image'>
                       
                       </div>
                       
                       ";
                       
                   }
                   
                   $get_slides = "select * from slider LIMIT 1,3";
                   
                   $run_slides = mysqli_query($con,$get_slides);
                   
                   while($row_slides=mysqli_fetch_array($run_slides)){
                       
                       $slide_name = $row_slides['slide_name'];
                       $slide_image = $row_slides['slide_image'];
                       
                       echo "
                       
                       <div class='item'>
                       
                       <img src='admin_area/slides_images/$slide_image'>
                       
                       </div>
                       
                       ";
                       
                   }
                   ?>
<!-- //ESTO SE USA DESPUES DE PONER LAS IMAGENES DEL CARRUCEL EN DA BASE DE DATOS, LA TABLA SE LLAMA SLIDER -->
                   
                   
               </div><!-- carousel-inner termino -->
               
               <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- left carousel-control empieza -->
                   
                   <span class="glyphicon glyphicon-chevron-left"></span>
                   <span class="sr-only">Anterior</span>
                   
               </a><!-- left carousel-control termino -->
               
               <a href="#myCarousel" class="right carousel-control" data-slide="next"><!-- left carousel-control empieza -->
                   
                   <span class="glyphicon glyphicon-chevron-right"></span>
                   <span class="sr-only">Siguiente</span>
                   
               </a><!-- left carousel-control termino -->
               
           </div><!-- carousel slide termino -->
           
       </div><!-- col-md-12 termino -->
       
   </div><!-- container termino -->
   
   <div id="advantages"><!-- #advantages empieza -->
       
       <div class="container"><!-- container empieza -->
           
           <div class="same-height-row"><!-- same-height-row empieza -->

           <?php 
           
           $get_boxes = "select * from cajas_texto";
           $run_boxes = mysqli_query($con,$get_boxes);

           while($run_boxes_section=mysqli_fetch_array($run_boxes)){

            $box_id = $run_boxes_section['caja_id'];
            $box_title = $run_boxes_section['caja_titulo'];
            $box_desc = $run_boxes_section['caja_desc'];
           
           ?>
               
               <div class="col-sm-4"><!-- col-sm-4 empieza -->
                   
                   <div class="box same-height"><!-- box same-height empieza -->
                       
                       <div class="icon"><!-- icon empieza -->
                           
                           <i class="fa fa-heart"></i>
                           
                       </div><!-- icon termino -->
                       
                       <h3><a href="#"><?php echo $caja_titulo; ?></a></h3>
                       
                       <p> <?php echo $caja_desc; ?> </p>
                       
                   </div><!-- box same-height termino -->
                   
               </div><!-- col-sm-4 termino -->

               <?php    } ?>
               
           </div><!-- same-height-row termino -->
           
       </div><!-- container termino -->
       
   </div><!-- #advantages termino -->
   
   <div id="hot"><!-- #hot empieza -->
       
       <div class="box"><!-- box empieza -->
           
           <div class="container"><!-- container empieza -->
               
               <div class="col-md-12"><!-- col-md-12 empieza -->
                   
                   <h2>
                       Nuestros Ultimos Productos
                   </h2>
                   
               </div><!-- col-md-12 termino -->
               
           </div><!-- container termino -->
           
       </div><!-- box termino -->
       
   </div><!-- #hot termino -->
   
   <div id="content" class="container"><!-- container empieza -->
       
       <div class="row"><!-- row empieza -->

        <?php 
           
           getPro();
           
        ?>
           
       </div><!-- row termino -->
       
   </div><!-- container termino -->

   <?php

    include("footer.php")

    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>