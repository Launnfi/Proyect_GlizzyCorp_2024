<?php
    $active = "Inicio";
    include("includes/header.php");
    
    
    
?>


   <div class="container" id="slider">
       
       <div class="col-md-12">
           
           <div class="carousel slide" id="myCarousel" data-ride="carousel">
               
               <ol class="carousel-indicators">
                   
                   <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                   <li data-target="#myCarousel" data-slide-to="1"></li>
                   <li data-target="#myCarousel" data-slide-to="2"></li>
                   <li data-target="#myCarousel" data-slide-to="3"></li>
                   
               </ol>
               
               <div class="carousel-inner">
                   
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
   
   <div id="advantages">
       
       <div class="container">
           
           <div class="same-height-row">

           <?php 
           
           $get_boxes = "select * from cajas_texto";
           $run_boxes = mysqli_query($con,$get_boxes);

           while($run_boxes_section=mysqli_fetch_array($run_boxes)){

            $caja_id = $run_boxes_section['caja_id'];
            $caja_titulo = $run_boxes_section['caja_titulo'];
            $caja_desc = $run_boxes_section['caja_desc'];
           
           ?>
               
               <div class="col-sm-4">
                   
                   <div class="box same-height">
                       
                       <div class="icon">
                           
                           <i class="fa fa-heart"></i>
                           
                       </div>
                       
                       <h3> <strong> <p><?php echo $caja_titulo; ?></p></strong></h3>
                       
                       <p> <?php echo $caja_desc; ?> </p>
                       
                   </div>
                   
               </div>

               <?php    } ?>
               
           </div>
           
       </div>
       
   </div>
   
   <div id="hot">
       <div class="box">
           
           <div class="container">
               
               <div class="col-md-12">
                   
                   <h2>
                       Nuestros Ultimos Productos
                   </h2>
                   
               </div>
               
           </div>
           
       </div>
       
   </div>
   
   <div id="content" class="container">
       
       <div class="row">

        <?php 
           
           getPro();
           
        ?>
           
       </div>
       
   </div>

   <?php

    include("footer.php")

    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>