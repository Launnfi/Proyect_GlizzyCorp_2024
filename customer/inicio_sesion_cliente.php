<div class="box"><!-- box empieza -->
    
  <div class="box-header"><!-- box-header empieza -->
      
      <center><!-- center empieza -->
          
          <h1> Login </h1>
          
          <p class="lead"> Ya tienes una cuenta..? </p>
          
          <p class="text-muted"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint, maxime. Laudantium omnis, ullam, fuga officia provident error corporis consectetur aliquid corrupti recusandae minus ipsam quasi. Perspiciatis nemo, nostrum magni odit! </p>
          
      </center><!-- center termina -->
      
  </div><!-- box-header termina -->
   
  <form method="post" action="cerrar_sesion.php"><!-- form empieza -->
      
      <div class="form-group"><!-- form-group empieza -->
          
          <label> Email </label>
          
          <input name="c_email" type="text" class="form-control" required>
          
      </div><!-- form-group termina -->
      
       <div class="form-group"><!-- form-group empieza -->
          
          <label> contraseña </label>
          
          <input name="c_pass" type="password" class="form-control" required>
          
      </div><!-- form-group termina -->
      
      <div class="text-center"><!-- text-center empieza -->
          
          <button name="login" value="Login" class="btn btn-primary">
              
              <i class="fa fa-sign-in"></i> Login
              
          </button>
          
      </div><!-- text-center termina -->     
      
  </form><!-- form termina -->
   
  <center><!-- center empieza -->
      
     <a href="customer_register.php">
         
         <h3> no tienes cuenta..? Registrate aqui </h3>
         
     </a> 
      
  </center><!-- center termina -->
    
</div><!-- box termina -->


<?php 
if (isset($_POST['login'])) {
    
    $cliente_email = $_POST['c_email'];
    $cliente_pass = $_POST['c_pass'];
    
    // Usar una consulta preparada para evitar inyección SQL
    $stmt = $con->prepare("SELECT cliente_email, activo, cliente_pass FROM customer WHERE cliente_email = ?");
    $stmt->bind_param("s", $cliente_email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $get_ip = getRealIpUser();
    $check_customer = $result->num_rows;
    
    // Consulta para obtener los productos en el carrito
    $select_cart = "SELECT * FROM cart WHERE ip_add = ?";
    $stmt_cart = $con->prepare($select_cart);
    $stmt_cart->bind_param("s", $get_ip);
    $stmt_cart->execute();
    $run_cart = $stmt_cart->get_result();
    $check_cart = $run_cart->num_rows;

    if ($check_customer == 0) {
        echo "<script>alert('El correo o la contraseña son incorrectos')</script>";
        exit();
    }

    // Solo hay un cliente con el correo ingresado
    if ($check_customer == 1) {
        $row = $result->fetch_assoc();
        $hashed_pass = $row['cliente_pass'];
        if($row['activo'] == 0){
            echo "<script>alert('Tu cuenta está desactivada. No puedes iniciar sesión.')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        } else {
        // Verificar la contraseña
        if (password_verify($cliente_pass, $hashed_pass)) {
            $_SESSION['cliente_email'] = $cliente_email;
            echo "<script>alert('El inicio de sesión ha sido exitoso')</script>";
            
            // Si no hay productos en el carrito
            if ($check_cart == 0) {
                echo "<script>window.open('customer/my_account.php?misOrdenes','_self')</script>";
            } else {
                echo "<script>window.open('cerrar_sesion.php','_self')</script>";
            }
        } else {
            // Contraseña incorrecta
            echo "<script>alert('El correo o la contraseña son incorrectos')</script>";
            exit();
        }
    }
    }
    
    // Cerrar las declaraciones
    $stmt->close();
    $stmt_cart->close();
}

?>