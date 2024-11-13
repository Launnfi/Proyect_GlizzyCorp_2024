<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> insertar cupones </title>
</head>
<body>
    
<div class="row">
    
    <div class="col-lg-12">
        
        <ol class="breadcrumb">

            <li class="active">
                
                <i class="fa fa-dashboard"></i> Panel / insertar cupones
                
            </li>
            
        </ol>
        
    </div>
    
</div>
       
<div class="row">
    
    <div class="col-lg-12">
        
        <div class="panel panel-default">
            
           <div class="panel-heading">
               
               <h3 class="panel-title">
                   
                   <i class="fa fa-money fa-fw"></i> insertar cupones
                   
               </h3>

           </div>
           
           <div class="panel-body">
               
               <form method="post" class="form-horizontal">
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Cupon Nombre </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="cupon_titulo" type="text" class="form-control" required>
                          
                      </div>
                      
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Cupon Precio </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="cupon_precio" type="text" class="form-control" required>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                    
                      <label class="col-md-3 control-label"> Copon Limite </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="cupon_limite" type="number" class="form-control" value="1">
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Seleccionar Producto </label> 
                      
                      <div class="col-md-6">
                          
                          <select name="producto_id" class="form-control" required>
                          
                            <option selected disabled>Selecciona un producto para el cupon</option>

                            <?php 
                            
                                $get_p = "select * from productos";
                                $run_p = mysqli_query($con,$get_p);

                                while($row_p = mysqli_fetch_array($run_p)){

                                    $p_id = $row_p['producto_id'];
                                    $p_title = $row_p['producto_titulo'];

                                    echo "<option value='$p_id'>$p_title</option>";

                                }
                            
                            ?>
                          
                          </select>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Copon Codigo </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="cupon_codigo" type="text" class="form-control" required>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6">
                          
                          <input name="submit" value="Create Coupon" type="submit" class="btn btn-primary form-control">
                          
                      </div>
                       
                   </div>
                   
               </form>
               
           </div>
            
        </div>
        
    </div>
    
</div>

<?php 

if(isset($_POST['submit'])){

    $cupon_titulo = $_POST['cupon_titulo'];
    $cupon_precio = $_POST['cupon_precio'];
    $cupon_codigo = $_POST['cupon_codigo'];
    $cupon_limite = $_POST['cupon_limite'];
    $coupon_pro_id = $_POST['producto_id'];

    $cupon_usado=0;

    $get_coupons = "select * from cupon where producto_id='$coupon_pro_id' or cupon_codigo='$cupon_codigo'";
    $run_coupons = mysqli_query($con,$get_coupons);
    $check_coupons = mysqli_num_rows($run_coupons);

    if($check_coupons==1){

        echo "<script>alert('Cupon codigo / Producto ya añadido. elije otro codigo de cupon / Producto')</script>";

    }else{

        $insert_coupon = "insert into cupon (producto_id,cupon_titulo,cupon_precio,cupon_codigo,cupon_limite,cupon_usado)values('$coupon_pro_id','$cupon_titulo','$cupon_precio','$cupon_codigo','$cupon_limite','$cupon_usado')";
        $run_coupon = mysqli_query($con,$insert_coupon);

        if($run_coupon){

            echo "<script>alert('El cupon se ha creado')</script>";
            echo "<script>window.open('index.php?ver_cupones','_self')</script>";

        }

    }

}

?>

<?php } ?>