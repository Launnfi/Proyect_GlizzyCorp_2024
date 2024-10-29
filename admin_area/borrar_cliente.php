<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_customer'])){
        
        $delete_id = $_GET['delete_customer'];
        
        $delete_c = "delete from customer where cliente_id='$delete_id'";
        
        $run_delete = mysqli_query($con,$delete_c);
        
        if($run_delete){
            
            echo "<script>alert('Uno de los clientes ha sido borrado')</script>";
            
            echo "<script>window.open('index.php?ver_clientes','_self')</script>";
            
        }
        
    }

?>

<?php } ?>