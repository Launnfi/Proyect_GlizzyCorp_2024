<?php 

    $active='Mi cuenta';
    include("includes/header.php");
    

?>
   <link rel="stylesheet" href="customer/styles/style.css">
   <div id="content">
       <div class="container">
           <div class="col-md-12">
               <ul class="breadcrumb">
                   <li>
                       <a href="index.php">Inicio</a>
                   </li>
                   <li>
                       Registrarme
                   </li>
               </ul>
               
           </div>
           
           <div class="col-md-3">
   
   <?php 
    
    include("includes/sidebar_usu.php");
    
    ?>
               
           </div>
           
           <div class="col-md-9">
           
           <?php 
           
           if(!isset($_SESSION['cliente_email'])){
               
               include("customer/inicio_sesion_cliente.php");
               
           }else{
               
          
               include("opciones_de_pago.php");
               
           }
           
           ?>
           
           </div>
           
       </div>
   </div>
   
   <?php 
    
    include("footer.php");
    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>