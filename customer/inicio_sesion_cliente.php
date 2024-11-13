<div class="box">
    
  <div class="box-header">
      
      <center>
          
          <h1> Login </h1>
          
          <p class="lead"> Ya tienes una cuenta..? </p>
          
          <p class="text-muted"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint, maxime. Laudantium omnis, ullam, fuga officia provident error corporis consectetur aliquid corrupti recusandae minus ipsam quasi. Perspiciatis nemo, nostrum magni odit! </p>
          
      </center>

  </div>
   
  <form method="post" action="cerrar_sesion.php">
      
      <div class="form-group">
          
          <label> Email </label>
          
          <input name="c_email" type="text" class="form-control" required>
          
      </div>
      
       <div class="form-group">
          
          <label> contraseña </label>
          
          <input name="c_pass" type="password" class="form-control" required>
          
      </div>
      
      <div class="text-center">
          
          <button name="login" value="Login" class="btn btn-primary">
              
              <i class="fa fa-sign-in"></i> Login
              
          </button>
          
      </div>   
      
  </form>

  <center>
      
     <a href="customer_register.php">
         
         <h3> no tienes cuenta..? Registrate aqui </h3>
         
     </a> 
      
  </center>
    
</div>


<?php 


if (isset($_POST['login'])) {
    
    $cliente_email = $_POST['c_email'];
    $cliente_pass = $_POST['c_pass'];
    
    $stmt = $con->prepare("SELECT cliente_id, cliente_email, activo, cliente_pass FROM customer WHERE cliente_email = ?");
    $stmt->bind_param("s", $cliente_email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $check_customer = $result->num_rows;
    
    if ($check_customer == 0) {
        echo "<script>alert('El correo o la contraseña son incorrectos')</script>";
        exit();
    }

    if ($check_customer == 1) {
        $row = $result->fetch_assoc();
        $cliente_id = $row['cliente_id'];
        $hashed_pass = $row['cliente_pass'];
        if($row['activo'] == 0){
            echo "<script>alert('Tu cuenta está desactivada. No puedes iniciar sesión.')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        } else {
            if (password_verify($cliente_pass, $hashed_pass)) {
                $_SESSION['cliente_email'] = $cliente_email;

                $select_cart = "SELECT * FROM cart WHERE cliente_id = ?";
                $stmt_cart = $con->prepare($select_cart);
                $stmt_cart->bind_param("i", $cliente_id);
                $stmt_cart->execute();
                $run_cart = $stmt_cart->get_result();
                $check_cart = $run_cart->num_rows;

                echo "<script>alert('El inicio de sesión ha sido exitoso')</script>";
                
                if ($check_cart == 0) {
                    echo "<script>window.open('customer/my_account.php?misOrdenes','_self')</script>";
                } else {
                    echo "<script>window.open('cerrar_sesion.php','_self')</script>";
                }
            } else {
                echo "<script>alert('El correo o la contraseña son incorrectos')</script>";
                exit();
            }
       }
    } 
    $stmt->close();
    $stmt_cart->close();

}
?>