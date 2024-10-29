<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['borrar_producto'])){
        
        $delete_id = $_GET['borrar_producto'];
        
        $delete_pro = "DELETE from productos where producto_id='$delete_id'";
        
        $run_delete = mysqli_query($con,$delete_pro);
        
        if($run_delete){
            
            echo "<script>alert('Se ha borrado uno de los productos')</script>";
            
            echo "<script>window.open('index.php?ver_producto','_self')</script>";
    
        }
        
    }

?>

<?php } ?>