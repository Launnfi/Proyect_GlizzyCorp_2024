<?php 
include("db.php");
?>
  <?php
$active = "Mi cuenta";
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
                Registrarse
            </li>
        </ul>
        </div>
        <div class="col-md-3"><!-- col-md-3 begin -->
        <?php

             include("includes/sidebar.php");

        ?>
        </div><!-- col-md-3 finish -->
        <div class="col-md-9"><!-- col-md-9 begin -->
            
            <div class="box"><!-- box begin -->

            <div class="box-header"><!-- box-header begin -->

            <center>

                <h2>Registrar un nuevo usuario</h2>

            </center>
            </div>

            <form action="customer_register.php" method="post" enctype="multipart/form-data"> <!-- form begin -->

            <div class="form-group"><!-- form-group begin -->

            <label>Nombre</label>
            <input type="text" class="form-control" name="c_name" required>



            </div><!-- form-group finish -->
            <div class="form-group"><!-- form-group begin -->

                <label>Tu e-mail</label>
                <input type="text" class="form-control" name="c_email" required>

                </div><!-- form-group finish --> 
              
                <div class="form-group"><!-- form-group begin -->

                <label>Contraseña</label>
                <input type="password" class="form-control" name="c_pass" required>

              </div><!-- form-group finish -->
               <div class="form-group"><!-- form-group begin -->

                <label>Departamento</label>
                <input type="text" class="form-control" name="c_country" required>  <!-- cambar nombre de bariables en lo posible -->
                
                
              </div><!-- form-group finish -->   
               <div class="form-group"><!-- form-group begin -->

                <label>Direccion</label>
                <input type="text" class="form-control" name="c_city" required> 
                
              </div><!-- form-group finish -->
              
               <div class="form-group"><!-- form-group begin -->

                <label>Numero de telefono</label>
                <input type="text" class="form-control" name="c_contact" required> 
                
              </div><!-- form-group finish -->
               <div class="form-group"><!-- form-group begin -->

                <label>Foto de Perfil</label>
                <input type="file" class="form-control form-height-custom" name="c_image" required> 
                
              </div><!-- form-group finish -->
              
                <div class="text-center"><!-- text-center begin -->
                    <button type="submit" name="register" class="btn btn-primary">

                    <i class="fa fa-user-md"></i>Registrarse
                    </button>

                </div><!-- text-center finish -->



            </form><!-- form finish -->

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