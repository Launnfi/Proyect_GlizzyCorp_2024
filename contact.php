
  <?php
$active = "Contactanos";
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
                Contactanos
            </li>
        </ul>

        <div class="col-md-3"><!-- col-md-3 begin -->
        <?php

             include("includes/sidebar.php");

        ?>
        </div><!-- col-md-3 finish -->
        <div class="col-md-9"><!-- col-md-9 begin -->
            
            <div class="box"><!-- box begin -->

            <div class="box-header"><!-- box-header begin -->

            <center>

                <h2>Sientete seguro de contactarnos</h2>

                <p class="text-muted">
                Por cualquier pregunta, eres libre de contactrarnos. Estamos dispuestos en solucionar cualquier duda que tengas 😊 


                </p>

            </center>

            <form action="contact.php" method="post"><!-- form begin -->

            <div class="form-group"><!-- form-group begin -->

            <label>Nombre</label>
            <input type="text" class="form-control" name="name" required>



            </div><!-- form-group finish -->
            <div class="form-group"><!-- form-group begin -->

                <label>e-mail</label>
                <input type="text" class="form-control" name="email" required>



                </div><!-- form-group finish --> 
              </div><!-- form-group finish -->
                <div class="form-group"><!-- form-group begin -->

                <label>Asunto</label>
                <input type="text" class="form-control" name="subject" required> 
                
              </div><!-- form-group finish -->
                <div class="form-group"><!-- form-group begin -->

                <label>Mensaje</label>
                <textarea name="message" class="form-control"></textarea>

                </div><!-- form-group finish -->

                <div class="text-center"><!-- text-center begin -->
                    <button type="submit" name="submit" class="btn btn-primary">

                    <i class="fa fa-user-md"></i>Enviar mensaje
                    </button>

                </div><!-- text-center finish -->



            </form><!-- form finish -->


            </div><!-- box-header finish -->


            </div><!-- box finish -->


            </div><!-- col-md-3 finish -->

        
        </div><!-- container finish -->
    </div><!-- content finish -->
    
    <?php

    include("footer.php")

    ?>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>


</body>
</html>