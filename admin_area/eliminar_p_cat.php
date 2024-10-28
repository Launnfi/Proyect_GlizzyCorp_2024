<?php 
include("includes/db.php");
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['eliminar_p_cat'])){
        
        $eliminar_p_cat_id = $_GET['eliminar_p_cat'];
        
        $elim_p_cat = "DELETE FROM productos_categorias WHERE p_cat_id='$eliminar_p_cat_id'";
        
        $run_elim = mysqli_query($con, $elim_p_cat);
        
        if($run_elim){
            
            echo "<script>alert('La Categoria del producto fue eliminada correctamente')</script>";
            
            echo "<script>window.open('index.php?ver_p_cats','_self')</script>";
            
        }
        
    }

?>

<?php } ?>
