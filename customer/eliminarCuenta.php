<center>

    <h1>¿Estas seguro que quieres eliminar la cuenta?</h1>
    
    <form action="" method="post"><!--from empieza-->

        <input type="submit" name="si" value="Si, quiero eliminar la cuenta" class="btn btn-danger">

        <input type="submit" name="no" value="No, no quiero eliminar la cuenta" class="btn btn-primary">


    </form><!--from termina-->

</center>

<?php 

$c_email = $_SESSION['cliente_email'];

if(isset($_POST['si'])){
    // Actualizar la cuenta para ponerla inactiva en lugar de eliminarla
    $deactivate_customer = "UPDATE customer SET activo = 0 WHERE cliente_email = '$c_email'";
    
    $run_deactivate_customer = mysqli_query($con, $deactivate_customer);
    
    if($run_deactivate_customer){
        session_destroy();
        
        echo "<script>alert('Cuenta eliminada con éxito')</script>";
        echo "<script>window.open('../index.php', '_self')</script>";
    }
}

if(isset($_POST['No'])){
    echo "<script>window.open('my_account.php?my_orders', '_self')</script>";
}

?>