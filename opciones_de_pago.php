<?php

include("db.php");
?>
<div class="box"><!-- box empieza -->
    <?php
    $sesion_email = $_SESSION['cliente_email'];

    $sel_cliente = "SELECT * FROM customer WHERE cliente_email = '$sesion_email'";

    $run_cliente = mysqli_query($con, $sel_cliente);

    $row_cliente = mysqli_fetch_array($run_cliente);

    $id_cliente = $row_cliente['cliente_id'];


?>
    
    <h1 class="text-center">Opciones de pago</h1>  
    
     <p class="lead text-center">
         
         <a class="" href="ordenes.php?c_id=<?php echo $id_cliente ?>"> Pagos sin conexion </a>
         
     </p>
     
     <center>
         
        <p class="lead">
        <a href="https://wa.me/59896354036" target="_blank">
            <button>Contactar por WhatsApp</button>
        </a>
       
            
        </p> 
         
     </center>
    
</div>