<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['borrar_pagos'])){
        
        $delete_id = $_GET['borrar_pagos'];
        
        $delete_pag = "DELETE from pagos where pago_id='$delete_id'";
        
        $run_delete = mysqli_query($con,$delete_pag);
        
        if($run_delete){
            
            echo "<script>alert('Se ha borrado el pago solicitado')</script>";
            
            echo "<script>window.open('index.php?ver_pagos','_self')</script>";
    
        }
        
    }

// se podria ocultar asi:
/*
<?php 
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    } else {
?>

<?php 
    if(isset($_GET['borrar_pagos'])){
        $delete_id = $_GET['borrar_pagos'];

        // Cambia la consulta para ocultar el registro en lugar de eliminarlo
        $delete_pag = "UPDATE pagos SET activo = 0 WHERE pago_id='$delete_id'";

        $run_delete = mysqli_query($con, $delete_pag);

        if($run_delete){
            echo "<script>alert('Se ha ocultado uno de los pagos')</script>";
            echo "<script>window.open('index.php?ver_producto','_self')</script>";
        }
    }
?>

//SE DEBERA CREAR UNA COLUMNA EN LA BASE DE DATOS LLAMADA ACTIVO DE LA SIGUIENTE MANERA
ALTER TABLE pagos ADD COLUMN activo TINYINT(1) DEFAULT 1;

//FILTRA LOS PAGOS ACTIVOS
SELECT * FROM pagos WHERE activo = 1;

//RESTAURA PAGOS
if(isset($_GET['restaurar_pago'])){
    $restaurar_id = $_GET['restaurar_pago'];

    // Cambia el estado del registro a activo
    $restore_pag = "UPDATE pagos SET activo = 1 WHERE pago_id='$restaurar_id'";

    $run_restore = mysqli_query($con, $restore_pag);

    if($run_restore){
        echo "<script>alert('Se ha restaurado uno de los pagos')</script>";
        echo "<script>window.open('index.php?ver_producto','_self')</script>";
    }
} 

*/

?>



<?php } ?>