<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_coupon'])){
        
        $delete_coupon_id = $_GET['delete_coupon'];
        
        $delete_coupon = "delete from cupon where cupon_id='$delete_coupon_id'";
        
        $run_delete = mysqli_query($con,$delete_coupon);
        
        if($run_delete){
            
            echo "<script>alert('Uno de los cupones ha sido borrado')</script>";
            
            echo "<script>window.open('index.php?ver_cupones','_self')</script>";
            
        }
        
    }

?>




<?php } ?>