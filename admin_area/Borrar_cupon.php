<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['borrar_cupon'])){
        
        $cupon_id = $_GET['borrar_cupon'];

        $check_status = "SELECT activo FROM cupon WHERE cupon_id = '$cupon_id'";
        $run_check = mysqli_query($con, $check_status);
        $row_check = mysqli_fetch_array($run_check);

        if($row_check['activo'] == 1){
            $update_status = "UPDATE cupon SET activo = 0 WHERE cupon_id = '$cupon_id'";
            $run_update = mysqli_query($con, $update_status);

            if($run_update){
                echo "<script>alert('Cupón desactivado correctamente')</script>";
            } else {
                echo "<script>alert('Error al desactivar el cupón')</script>";
            }
        } else {
            $update_status = "UPDATE cupon SET activo = 1 WHERE cupon_id = '$cupon_id'";
            $run_update = mysqli_query($con, $update_status);

            if($run_update){
                echo "<script>alert('Cupón activado correctamente')</script>";
            } else {
                echo "<script>alert('Error al activar el cupón')</script>";
            }
        }

        // Redirigir de nuevo a la lista de cupones
        echo "<script>window.open('index.php?ver_cupones','_self')</script>";
    }

?>





<?php } ?>