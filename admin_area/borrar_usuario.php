<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_user'])){
        
        $delete_user_id = $_GET['delete_user'];
        
        $delete_user = "delete from admin where admin_id='$delete_user_id'";
        
        $run_delete = mysqli_query($con,$delete_user);
        
        if($run_delete){
            
            echo "<script>alert('Uno de los usuarios admin ha sido borrado')</script>";
            
            echo "<script>window.open('index.php?ver_usuarios','_self')</script>";
            
        }
        
    }

?>

<?php } ?>