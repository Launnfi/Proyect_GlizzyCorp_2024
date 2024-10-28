<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['borrar_cat'])){
        
        $borrar_cat_id = $_GET['borrar_cat'];
        
        $borrar_cat = "DELETE FROM categorias WHERE cat_id='$borrar_cat_id'";
        
        $run_borrar = mysqli_query($con,$borrar_cat);
        
        if($run_borrar){
            
            echo "<script>alert('Categoria eliminada con exito')</script>";
            
            echo "<script>window.open('index.php?ver_cat','_self')</script>";
            
        }
        
    }

?>




<?php } ?>