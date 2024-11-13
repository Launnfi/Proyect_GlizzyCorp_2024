<h1 aling="center">Cambiar contraseña</h1>

<form action="" method="post">

    <div class="form-group">
    <label>Contraseña anterior</label>
    <input type="text" name="old_pass" class="form-control" required>
    </div>

    <div class="form-group">
    <label>Nueva contraseña</label>
    <input type="text" name="new_pass" class="form-control" required>
    </div>

    <div class="form-group">
    <label>Confirmar contraseña</label>
    <input type="text" name="new_pass_again" class="form-control" required>
    </div>

    <div class="text-center">

        <button type="submit" name="submit" class="btn btn-primary">

            <i class="fa fa-user-md"></i> Cambiar informacion

        </button>
    
    </div>

        
    

</form>

<?php 

if(isset($_POST['submit'])){
    
    $c_email = $_SESSION['cliente_email'];
    
    $c_old_pass = $_POST['old_pass'];
    
    $c_new_pass = $_POST['new_pass'];
    
    $c_new_pass_again = $_POST['new_pass_again'];
    
    $sel_c_old_pass = "SELECT * from customer where cliente_pass='$c_old_pass'";
    
    $run_c_old_pass = mysqli_query($con,$sel_c_old_pass);
    
    $check_c_old_pass = mysqli_fetch_array($run_c_old_pass);
    
    if($check_c_old_pass==0){
        
        echo "<script>alert('contraseña no valida, intente nuevamente)</script>";
        
        exit();
        
    }
    
    if($c_new_pass!=$c_new_pass_again){
        
        echo "<script>alert('contraseña no coincide')</script>";
        
        exit();
        
    }
    
    $update_c_pass = "update customers set customer_pass='$c_new_pass' where customer_email='$c_email'";
    
    $run_c_pass = mysqli_query($con,$update_c_pass);
    
    if($run_c_pass){
        
        echo "<script>alert('Tu contraseña se ha actualizado')</script>";
        
        echo "<script>window.open('my_account.php?my_orders','_self')</script>";
        
    }
    
}

?>