
  <?php
$active = "Contactanos";
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
                Contactanos
            </li>
        </ul>

        <div class="col-md-3"><!-- col-md-3 empieza -->
        <?php

             include("includes/sidebar.php");

        ?>
        </div><!-- col-md-3 termina -->
        <div class="col-md-9"><!-- col-md-9 empieza -->
            
            <div class="box"><!-- box empieza -->

            <div class="box-header"><!-- box-header empieza -->

            <center>

                <h2>Sientete seguro de contactarnos</h2>

                <p class="text-muted">
                Por cualquier pregunta, eres libre de contactrarnos. Estamos dispuestos en solucionar cualquier duda que tengas 😊 


                </p>

            </center>

            <form action="contact.php" method="post"><!-- form empieza -->

            <div class="form-group"><!-- form-group empieza -->

            <label>Nombre</label>
            <input type="text" class="form-control" name="name" required>



            </div><!-- form-group termina -->
            <div class="form-group"><!-- form-group empieza -->

                <label>e-mail</label>
                <input type="text" class="form-control" name="email" required>



                </div><!-- form-group termina --> 
              </div><!-- form-group termina -->
                <div class="form-group"><!-- form-group empieza -->

                <label>Asunto</label>
                <input type="text" class="form-control" name="subject" required> 
                
              </div><!-- form-group termina -->
                <div class="form-group"><!-- form-group empieza -->

                <label>Mensaje</label>
                <textarea name="message" class="form-control"></textarea>

                </div><!-- form-group termina -->

                <div class="text-center"><!-- text-center empieza -->
                    <button type="submit" name="submit" class="btn btn-primary">

                    <i class="fa fa-user-md"></i>Enviar mensaje
                    </button>

                </div><!-- text-center termina -->



            </form><!-- form termina -->

            <?php 
if (isset($_POST['submit'])) {

    # Admin recibe el mensaje con esto
    $user_nombre = $_POST['name'];
    $user_email = $_POST['email'];
    $user_asun = $_POST['subject'];
    $user_msg = $_POST['message'];

    $res_email = "lautacamejo6@gmail.com";  // Cambiar esto al email real de la empresa

    # Cabeceras para el email a admin
    $headers = "From: " . $user_email . "\r\n" .
               "Reply-To: " . $user_email . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    mail($res_email, $user_asun, $user_msg, $headers);

    # Auto respuesta al usuario
    $asunto = "Bienvenido a nuestro sitio web";
    $msg = "Gracias por enviarnos su mensaje, responderemos lo más pronto posible.";

    # Cabeceras para el email de respuesta
    $de = "From: lautacamejo6@gmail.com ";  // Cambiar esto al email real de la empresa

    mail($user_email, $asunto, $msg, $de);

    echo "<h2 align='center'>Tu mensaje se envió correctamente</h2>";
}
?>


            </div><!-- box-header termina -->


            </div><!-- box termina -->


            </div><!-- col-md-3 termina -->

        
        </div><!-- container termina -->
    </div><!-- content termina -->
    
    <?php

    include("footer.php")

    ?>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>


</body>
</html>