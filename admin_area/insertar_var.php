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
    <title> insertar variantes </title>
</head>
<body>
    
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            
            <li class="active">
                
                <i class="fa fa-dashboard"></i> Panel / insertar variantes
                
            </li>

        </ol>
        
    </div>
    
</div>
       
<div class="row">
    
    <div class="col-lg-12">
        
        <div class="panel panel-default">
            
           <div class="panel-heading">
               
               <h3 class="panel-title">
                   
                   <i class="fa fa-money fa-fw"></i> insertar variantes
                   
               </h3>
               
           </div> 
           
           <div class="panel-body">

               <form method="post" class="form-horizontal">
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Talle </label> 
                      
                      <div class="col-md-6">
                          
                          <select name="talle" class="form-control" required>
                          <option selected disabled>Selecciona una talla</option>
                          <option>S</option>
                          <option>M</option>
                          <option>L</option>
                          </select>
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Cantidad en stock </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="stock" type="text" class="form-control" required>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Seleccionar Producto </label> 
                      
                      <div class="col-md-6">
                          
                          <select name="producto_id" class="form-control" required>
                          
                            <option selected disabled>Selecciona un producto para la variante</option>

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
                       
                      <label class="col-md-3 control-label"> variante precio </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="var_precio" type="text" class="form-control" required>
                          
                      </div>
                       
                   </div>

                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> variante precio de oferta </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="var_precio_oferta" type="text" class="form-control" >
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6">
                          
                          <input name="submit" value="Crear variante" type="submit" class="btn btn-primary form-control">
                          
                      </div>
                       
                   </div>
                   
               </form>

           </div>
            
        </div>
        
    </div>
    
</div>
<?php 

if(isset($_POST['submit'])){

    $talle = $_POST['talle'];
    $var_precio = $_POST['var_precio'];
    $stock = $_POST['stock'];
    $stock = $_POST['var_precio_of'];
    $var_pro_id = $_POST['producto_id'];

    
    $get_variantes = "SELECT * FROM variantes WHERE producto_id='$var_pro_id' AND talle='$talle'";
    $run_variantes = mysqli_query($con, $get_variantes);
    $check_variantes = mysqli_num_rows($run_variantes);

    if($check_variantes == 1){
        echo "<script>alert('Variante ya añadida para este producto y talla.')</script>";
    } else {
        $insert_variante = "INSERT INTO variantes (producto_id, stock_var, talle, precio_var, var_precio_of) VALUES ('$var_pro_id', '$stock', '$talle', '$var_precio', '$var_precio_of')";
        $run_variante = mysqli_query($con, $insert_variante);

        if($run_variante){
            echo "<script>alert('La variante se ha creado')</script>";
            echo "<script>window.open('index.php?ver_var','_self')</script>";
        }
    }
}

?>


<?php } ?>