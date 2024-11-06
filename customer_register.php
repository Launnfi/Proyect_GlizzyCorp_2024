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

if (isset($_POST['register'])) {
    
    $c_nombre = $_POST['c_nombre'];
    $c_email = $_POST['c_email'];
    $c_pass = $_POST['c_pass'];
    $c_ciudad = $_POST['c_ciudad'];
    $c_contacto = $_POST['c_contacto'];
    $c_direccion = $_POST['c_direccion'];
    $c_img = $_FILES['c_img']['name'];
    $c_img_tmp = $_FILES['c_img']['tmp_name'];
    $c_ip = getRealIpUser();
    
    // Mover la imagen a la carpeta deseada
    move_uploaded_file($c_img_tmp, "customer/customer_images/$c_img");

    // Hashear la contraseña
    $hashed_pass = password_hash($c_pass, PASSWORD_DEFAULT);

    // Verificar si el correo electrónico ya está registrado
    $check_email_query = "SELECT * FROM customer WHERE cliente_email = ?";
    $stmt_check_email = $con->prepare($check_email_query);
    $stmt_check_email->bind_param("s", $c_email);
    $stmt_check_email->execute();
    $result_check_email = $stmt_check_email->get_result();

    if ($result_check_email->num_rows > 0) {
        // Si el usuario ya existe y está inactivo, reactivar la cuenta
        $row = $result_check_email->fetch_assoc();

        if ($row['activo'] == 0) {
            // La cuenta está inactiva, así que la reactivamos
            $update_status_query = "UPDATE customer SET activo = 1, cliente_pass = ? WHERE cliente_email = ?";
            $stmt_update = $con->prepare($update_status_query);
            $stmt_update->bind_param("ss", $hashed_pass, $c_email);

            if ($stmt_update->execute()) {
                $_SESSION['cliente_email'] = $c_email;
                echo "<script>alert('Tu cuenta ha sido reactivada. Ahora puedes iniciar sesión.')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            } else {
                echo "<script>alert('Hubo un error al reactivar tu cuenta.')</script>";
            }
            $stmt_update->close();
        } else {
            // Si la cuenta ya está activa
            echo "<script>alert('El correo electrónico ya está registrado y activo. Por favor, inicia sesión.')</script>";
            echo "<script>window.open('login.php','_self')</script>";
        }
    } else {
        // Si el usuario no existe, se registra uno nuevo
        $stmt = $con->prepare("INSERT INTO customer (cliente_nombre, cliente_email, cliente_pass, cliente_ciudad, cliente_contacto, cliente_direccion, cliente_img, cliente_ip, activo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 1)");
        $stmt->bind_param("ssssssss", $c_nombre, $c_email, $hashed_pass, $c_ciudad, $c_contacto, $c_direccion, $c_img, $c_ip);
        
        if ($stmt->execute()) {
            // Verificar si hay artículos en el carrito
            $sel_cart = "SELECT * FROM cart WHERE ip_add = ?";
            $stmt_cart = $con->prepare($sel_cart);
            $stmt_cart->bind_param("s", $c_ip);
            $stmt_cart->execute();
            $run_cart = $stmt_cart->get_result();
            $check_cart = $run_cart->num_rows;

            $_SESSION['cliente_email'] = $c_email;
            echo "<script>alert('Has sido registrado correctamente. Tu cuenta está activa.')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            echo "<script>alert('Error en el registro. Intenta nuevamente.')</script>";
        }

        // Cerrar las declaraciones
        $stmt->close();
        $stmt_cart->close();
    }

    $stmt_check_email->close();
}
?>