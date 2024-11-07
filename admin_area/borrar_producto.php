<?php 
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    } else {
?>

<?php 
    if(isset($_GET['borrar_producto'])){
        
        $delete_id = $_GET['borrar_producto'];

        // Verificamos el estado actual del producto
        $check_status = "SELECT activo FROM productos WHERE producto_id = '$delete_id'";
        $run_check = mysqli_query($con, $check_status);
        
        if($run_check) {
            $row = mysqli_fetch_array($run_check);
            $activo = $row['activo'];
            
            if($activo == 0) {
                $update_status = "UPDATE productos SET activo = 1 WHERE producto_id = '$delete_id'";
                $run_update = mysqli_query($con, $update_status);

                if($run_update){
                    echo "<script>alert('Producto activado')</script>";
                } else {
                    echo "<script>alert('Error al activar el producto')</script>";
                }
            } else {
                $inactivar_pro = "UPDATE productos SET activo = 0 WHERE producto_id = '$delete_id'";
                $run_inactivar = mysqli_query($con, $inactivar_pro);
                
                if($run_inactivar){
                    echo "<script>alert('Producto marcado como inactivo')</script>";
                } else {
                    echo "<script>alert('Error al desactivar el producto')</script>";
                }
            }
        }
        
        echo "<script>window.open('index.php?ver_producto','_self')</script>";
    }
?>


<?php } ?>