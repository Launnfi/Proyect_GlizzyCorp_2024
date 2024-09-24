<?php 
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
            <input type="text" class="form-control" name="c_nombre" required>



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
                <input type="text" class="form-control" name="c_pais" required>  <!-- cambar nombre de bariables en lo posible -->
                
                
              </div><!-- form-group finish -->   
               <div class="form-group"><!-- form-group begin -->

                <label>Direccion</label>
                <input type="text" class="form-control" name="c_ciudad" required> 
                
              </div><!-- form-group finish -->
              
               <div class="form-group"><!-- form-group begin -->

                <label>Numero de telefono</label>
                <input type="text" class="form-control" name="c_contacto" required> 
                
              </div><!-- form-group finish -->
               <div class="form-group"><!-- form-group begin -->

                <label>Foto de Perfil</label>
                <input type="file" class="form-control form-height-custom" name="c_img" required> 
                
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

<?php 

if(isset($_POST['register'])){
    
    $c_nombre = $_POST['c_nombre'];
    
    $c_email = $_POST['c_email'];
    
    $c_pass = $_POST['c_pass'];
    
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
        
        echo "<script>window.open('checkout.php','_self')</script>";
        
    }else{
        
        /// Registrar sin items en el carrito ///
        
        $_SESSION['cliente_email']=$c_email;
        
        echo "<script>alert('Has sido registrado correctamente')</script>";
        
        echo "<script>window.open('index.php','_self')</script>";
        
    }
    
}

?>