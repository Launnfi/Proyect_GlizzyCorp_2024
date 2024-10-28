<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['borrar_slide'])){
        
        $borrar_slide_id = $_GET['borrar_slide'];
        
        $borrar_slide = "DELETE FROM slider WHERE slide_id='$borrar_slide_id'";
        
        $run_borrar = mysqli_query($con,$borrar_slide);
        
        if($run_borrar){
            
            echo "<script>alert('La imagen del carrito se elimino correctamente')</script>";
            
            echo "<script>window.open('index.php?ver_slides','_self')</script>";
            
        }
        
    }

?>




<?php } ?>