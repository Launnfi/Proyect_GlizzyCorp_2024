<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_order'])){
        
        $delete_id = $_GET['delete_order'];
        
        $delete_order = "delete from ordenes_pendientes where orden_id='$delete_id'";
        
        $run_delete = mysqli_query($con,$delete_order);
        
        if($run_delete){
            
            echo "<script>alert('una de las ordenes ha sido borrada')</script>";
            
            echo "<script>window.open('index.php?ver_ordenes','_self')</script>";
            
        }
        
    }

?>

<?php } ?>