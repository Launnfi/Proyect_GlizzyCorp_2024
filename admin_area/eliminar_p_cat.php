<?php 
include("includes/db.php");
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['eliminar_p_cat'])){
        
        $eliminar_p_cat_id = $_GET['eliminar_p_cat'];

        // Verificar si la categoría del producto está actualmente activa o inactiva
        $check_status = "SELECT activo FROM productos_categorias WHERE p_cat_id = '$eliminar_p_cat_id'";
        $run_check = mysqli_query($con, $check_status);
        $row_check = mysqli_fetch_array($run_check);

        if($row_check['activo'] == 1){
           
            $update_status = "UPDATE productos_categorias SET activo = 0 WHERE p_cat_id = '$eliminar_p_cat_id'";
            $run_update = mysqli_query($con, $update_status);

            if($run_update){
                echo "<script>alert('Categoría desactivada correctamente')</script>";
            } else {
                echo "<script>alert('Error al desactivar la categoría')</script>";
            }
        } else {
         
            $update_status = "UPDATE productos_categorias SET activo = 1 WHERE p_cat_id = '$eliminar_p_cat_id'";
            $run_update = mysqli_query($con, $update_status);

            if($run_update){
                echo "<script>alert('Categoría activada correctamente')</script>";
            } else {
                echo "<script>alert('Error al activar la categoría')</script>";
            }
        }

   
        echo "<script>window.open('index.php?ver_p_cats','_self')</script>";
    }

?>

<?php } ?>
