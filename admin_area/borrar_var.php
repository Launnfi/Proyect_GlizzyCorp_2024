<?php 
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    } else {
?>

<?php 
    if(isset($_GET['borrar_var'])){
        
        $delete_id = $_GET['borrar_var'];

        // Verificamos el estado actual de la variante
        $check_status = "SELECT activo FROM variantes WHERE var_id = '$delete_id'";
        $run_check = mysqli_query($con, $check_status);
        
        if($run_check) {
            $row = mysqli_fetch_array($run_check);
            $activo = $row['activo'];
            
            if($activo == 0) {
                $update_status = "UPDATE variantes SET activo = 1 WHERE var_id = '$delete_id'";
                $run_update = mysqli_query($con, $update_status);

                if($run_update){
                    echo "<script>alert('Variante activada')</script>";
                } else {
                    echo "<script>alert('Error al activar la variante')</script>";
                }
            } else {
                $inactivar_variante = "UPDATE variantes SET activo = 0 WHERE var_id = '$delete_id'";
                $run_inactivar = mysqli_query($con, $inactivar_variante);
                
                if($run_inactivar){
                    echo "<script>alert('Variante marcada como inactiva')</script>";
                } else {
                    echo "<script>alert('Error al desactivar la variante')</script>";
                }
            }
        }
        
        echo "<script>window.open('index.php?ver_var','_self')</script>";
    }
?>

<?php } ?>
