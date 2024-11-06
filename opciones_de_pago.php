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
    
     <p class="lead text-center"><!-- lead text-center empieza -->
         
         <a class="" href="ordenes.php?c_id=<?php echo $id_cliente ?>"> Pagos sin conexion </a>
         
     </p><!-- lead text-center termino -->
     
     <center><!-- center empieza -->
         
        <p class="lead"><!-- lead empieza -->
            
            <a href="PagoLinea.php">
                
                Pago por Mercado pago
                
                <img class="img-responsive" src="images/mercadopago.png" alt="img-paypall">
                
            </a>
            
        </p> <!-- lead termino -->
         
     </center><!-- center termino -->
    
</div><!-- box termino -->