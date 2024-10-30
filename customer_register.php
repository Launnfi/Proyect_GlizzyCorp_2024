<?php 
?>
  <?php
$active = "Mi cuenta";
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
                Registrarse
            </li>
        </ul>
        </div>
        <div class="col-md-3"><!-- col-md-3 empieza -->
        <?php

             include("includes/sidebar.php");

        ?>
        </div><!-- col-md-3 termina -->
        <div class="col-md-9"><!-- col-md-9 empieza -->
            
            <div class="box"><!-- box empieza -->

            <div class="box-header"><!-- box-header empieza -->

            <center>

                <h2>Registrar un nuevo usuario</h2>

            </center>
            </div>

            <form action="customer_register.php" method="post" enctype="multipart/form-data"> <!-- form empieza -->

            <div class="form-group"><!-- form-group empieza -->

            <label>Nombre</label>
            <input type="text" class="form-control" name="c_nombre" required>



            </div><!-- form-group termina -->
            <div class="form-group"><!-- form-group empieza -->

                <label>Tu e-mail</label>
                <input type="text" class="form-control" name="c_email" required>

                </div><!-- form-group termina --> 
              
                <div class="form-group"><!-- form-group empieza -->

                <label>Contraseña</label>
                <input type="password" class="form-control" name="c_pass" required>

              </div><!-- form-group termina -->
               <div class="form-group"><!-- form-group empieza -->

                <label>Departamento</label>
                <input type="text" class="form-control" name="c_ciudad" required>  <!-- cambar nombre de bariables en lo posible -->
                
                
              </div><!-- form-group termina -->   
               <div class="form-group"><!-- form-group empieza -->

                <label>Direccion</label>
                <input type="text" class="form-control" name="c_direccion" required> 
                
              </div><!-- form-group termina -->
              
               <div class="form-group"><!-- form-group empieza -->

                <label>Numero de telefono</label>
                <input type="text" class="form-control" name="c_contacto" required> 
                
              </div><!-- form-group termina -->
               <div class="form-group"><!-- form-group empieza -->

                <label>Foto de Perfil</label>
                <input type="file" class="form-control form-height-custom" name="c_img" required> 
                
              </div><!-- form-group termina -->
              
                <div class="text-center"><!-- text-center empieza -->
                    <button type="submit" name="register" class="btn btn-primary">

                    <i class="fa fa-user-md"></i>Registrarse
                    </button>

                </div><!-- text-center termina -->



            </form><!-- form termina -->

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

<?php 

if(isset($_POST['register'])){
    
    $c_nombre = $_POST['c_nombre'];
    
    $c_email = $_POST['c_email'];
    
    $c_pass = md5($_POST['c_pass']); #md5 encripta la contraseña
    
    $c_ciudad = $_POST['c_ciudad'];
    
    $c_contacto = $_POST['c_contacto'];
    
    $c_direccion = $_POST['c_direccion'];
    
    $c_img = $_FILES['c_img']['name'];
    
    $c_img_tmp = $_FILES['c_img']['tmp_name'];
    
    $c_ip = getRealIpUser();
    
    move_uploaded_file($c_img_tmp,"customer/customer_images/$c_img");
    
    $insert_customer = "insert into customer (cliente_nombre,cliente_email,cliente_pass,cliente_ciudad,cliente_contacto,cliente_direccion,cliente_img,cliente_ip) values ('$c_nombre','$c_email','$c_pass','$c_ciudad','$c_contacto','$c_direccion','$c_img','$c_ip')";
    
    $run_customer = mysqli_query($con,$insert_customer);
    
    $sel_cart = "select * from cart where ip_add='$c_ip'";
    
    $run_cart = mysqli_query($con,$sel_cart);
    
    $check_cart = mysqli_num_rows($run_cart);
    
    if($check_cart>0){
        
        /// registra con items en el carrito ///
        
        $_SESSION['cliente_email']=$c_email;
        
        echo "<script>alert('Has sido registrado correctamente')</script>";
        
        echo "<script>window.open('index.php','_self')</script>";
        
    }else{
        
        /// Registrar sin items en el carrito ///
        
        $_SESSION['cliente_email']=$c_email;
        
        echo "<script>alert('Has sido registrado correctamente')</script>";
        
        echo "<script>window.open('index.php','_self')</script>";
        
    }
    
}

?>