<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['borrar_user'])){
        
        $delete_id = $_GET['borrar_user'];
        
        $delete_pro = "DELETE from admin where admin_id='$delete_id'";
        
        $run_delete = mysqli_query($con,$delete_pro);
        
        if($run_delete){
            
            echo "<script>alert('Se ha borrado uno de los productos')</script>";
            
            echo "<script>window.open('index.php?ver_user','_self')</script>";
    
        }
        
    }

?>

<?php } ?>