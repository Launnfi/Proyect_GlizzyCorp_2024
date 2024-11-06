<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

if(isset($_GET['edit_coupon'])){

    $edit_id = $_GET['edit_coupon'];
    $edit_coupon = "select * from coupons where coupon_id='$edit_id'";
    $run_edit_coupon = mysqli_query($con,$edit_coupon);
    $row_edit_coupon = mysqli_fetch_array($run_edit_coupon);

    $coup_id = $row_edit_coupon['coupon_id'];
    $coup_title = $row_edit_coupon['cupon_titulo'];
    $coup_price = $row_edit_coupon['cupon_precio'];
    $coup_code = $row_edit_coupon['cupon_codigo'];
    $coup_limit = $row_edit_coupon['cupon_limite'];
    $coup_used = $row_edit_coupon['cupon_usado'];
    $prod_id = $row_edit_coupon['producto_id'];

    $get_products = "select * from products where producto_id='$prod_id'";
    $run_products = mysqli_query($con,$get_products);
    $row_products = mysqli_fetch_array($run_products);

    $producto_id = $row_products['producto_id'];
    $producto_titulo = $row_products['producto_titulo'];

}

?>
    
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Coupons
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <i class="fa fa-money fa-fw"></i> Editar Cupones
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal"><!-- form-horizontal Begin -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> cupon titulo </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input value="<?php echo $coup_title; ?>" name="cupon_titulo" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Cupon Precio </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input value="<?php echo $coup_price; ?>" name="cupon_precio" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Cupon limitet </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="cupon_limite" type="number" class="form-control" value="<?php echo $coup_limit; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Selecciona producto </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <select name="producto_id" class="form-control" required>
                          
                            <option value="<?php echo $producto_id; ?>"><?php echo $producto_titulo; ?></option>

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
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Cupon codigo</label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input value="<?php echo $coup_code; ?>" name="cupon_codigo" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="update" value="Edit Coupon" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
               
           </div><!-- panel-body Finish -->
            
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->

<?php 

if(isset($_POST['update'])){

    $cupon_titulo = $_POST['cupon_titulo'];
    $cupon_precio = $_POST['cupon_precio'];
    $cupon_codigo = $_POST['cupon_codigo'];
    $cupon_limite = $_POST['cupon_limite'];
    $coupon_pro_id = $_POST['producto_id'];

    $update_coupon = "update cupon set producto_id='$coupon_pro_id',cupon_titulo='$cupon_titulo',cupon_precio='$cupon_precio',cupon_codigo='$cupon_codigo',cupon_limite='$cupon_limite',cupon_usado='$coup_used' where cupon_id='$coup_id'";
    $run_update_coupon = mysqli_query($con,$update_coupon);

    if($run_update_coupon){

        echo "<script>alert('Tu cupon se ha actualizado')</script>";
        echo "<script>window.open('index.php?ver_cupones','_self')</script>";

    }


}

?>

<?php } ?>