<?php 

    $active='Mi cuenta';
    include("includes/header.php");
    

?>
   <link rel="stylesheet" href="customer/styles/style.css">
   <div id="content"><!-- #content empieza -->
       <div class="container"><!-- container empieza -->
           <div class="col-md-12"><!-- col-md-12 empieza -->
               
               <ul class="breadcrumb"><!-- breadcrumb empieza -->
                   <li>
                       <a href="index.php">Inicio</a>
                   </li>
                   <li>
                       Registrarme
                   </li>
               </ul><!-- breadcrumb termina -->
               
           </div><!-- col-md-12 termina -->
           
           <div class="col-md-3"><!-- col-md-3 empieza -->
   
   <?php 
    
    include("includes/sidebar_usu.php");
    
    ?>
               
           </div><!-- col-md-3 termina -->
           
           <div class="col-md-9"><!-- col-md-9 empieza -->
           
           <?php 
           
           if(!isset($_SESSION['cliente_email'])){
               
               include("customer/inicio_sesion_cliente.php");
               
           }else{
               
          
               include("opciones_de_pago.php");
               
           }
           
           ?>
           
           </div><!-- col-md-9 termina -->
           
       </div><!-- container termina -->
   </div><!-- #content termina -->
   
   <?php 
    
    include("footer.php");
    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>