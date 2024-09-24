<div class="box"><!-- box Begin -->
    
  <div class="box-header"><!-- box-header Begin -->
      
      <center><!-- center Begin -->
          
          <h1> Login </h1>
          
          <p class="lead"> Ya tienes una cuenta..? </p>
          
          <p class="text-muted"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint, maxime. Laudantium omnis, ullam, fuga officia provident error corporis consectetur aliquid corrupti recusandae minus ipsam quasi. Perspiciatis nemo, nostrum magni odit! </p>
          
      </center><!-- center Finish -->
      
  </div><!-- box-header Finish -->
   
  <form method="post" action="cerrar_sesion.php"><!-- form Begin -->
      
      <div class="form-group"><!-- form-group Begin -->
          
          <label> Email </label>
          
          <input name="c_email" type="text" class="form-control" required>
          
      </div><!-- form-group Finish -->
      
       <div class="form-group"><!-- form-group Begin -->
          
          <label> contraseña </label>
          
          <input name="c_pass" type="password" class="form-control" required>
          
      </div><!-- form-group Finish -->
      
      <div class="text-center"><!-- text-center Begin -->
          
          <button name="login" value="Login" class="btn btn-primary">
              
              <i class="fa fa-sign-in"></i> Login
              
          </button>
          
      </div><!-- text-center Finish -->     
      
  </form><!-- form Finish -->
   
  <center><!-- center Begin -->
      
     <a href="customer_register.php">
         
         <h3> no tienes cuenta..? Registrate aqui </h3>
         
     </a> 
      
  </center><!-- center Finish -->
    
</div><!-- box Finish -->


<?php 

if(isset($_POST['login'])){
    
    $cliente_email = $_POST['c_email'];
    
    $cliente_pass = $_POST['c_pass'];
    
    $select_customer = "select * from customer where cliente_email='$cliente_email' AND cliente_pass='$cliente_pass'";
    
    $run_customer = mysqli_query($con,$select_customer);
    
    $get_ip = getRealIpUser();
    
    $check_customer = mysqli_num_rows($run_customer);
    
    $select_cart = "select * from cart where ip_add='$get_ip'";
    
    $run_cart = mysqli_query($con,$select_cart);
    
    $check_cart = mysqli_num_rows($run_cart);
    
    if($check_customer==0){
        
        echo "<script>alert('el mail o contraseña es incorrecto')</script>";
        
        exit();
        
    }
    
    if($check_customer==1 AND $check_cart==0){
        
        $_SESSION['cliente_email']=$cliente_email;
        
       echo "<script>alert('el inicio de sesion a sido exitoso')</script>"; 
        
       echo "<script>window.open('customer/my_account.php?misOrdenes','_self')</script>";
        
    }else{
        
        $_SESSION['cliente_email']=$cliente_email;
        
       echo "<script>alert('el inicio de sesion a sido exitoso')</script>"; 
        
       echo "<script>window.open('cerrar_sesion.php','_self')</script>";
        
    }
    
}

?>