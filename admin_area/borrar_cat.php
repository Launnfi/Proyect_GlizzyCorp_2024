<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

if(isset($_GET['borrar_cat'])){
    
    $borrar_cat_id = $_GET['borrar_cat'];
    
    // Cambia el estado a inactivo en lugar de eliminar
    $inactivar_cat = "UPDATE categorias SET activo = 0 WHERE cat_id='$borrar_cat_id'";
    
    $run_inactivar = mysqli_query($con, $inactivar_cat);
    
    if($run_inactivar){
        
        echo "<script>alert('Categoría marcada como inactiva exitosamente')</script>";
        
        echo "<script>window.open('index.php?ver_cat','_self')</script>";
        
    }
}

?>




<?php } ?>