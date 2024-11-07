<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> Panel / Ver Cupones
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  Ver Cupones
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> Cupon ID: </th>
                                <th> Cupon Nombre: </th>
                                <th> Producto Nombre: </th>
                                <th> Cupon Precio: </th>
                                <th> Codigo: </th>
                                <th> Limite: </th>
                                <th> Usado: </th>
                                <th> Estado: </th>
                                <th> Editar: </th>
                                <th> Borrar: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->

                        <?php 
                        
                        $i=0;
                        $get_coupons = "select * from cupon";
                        $run_coupons = mysqli_query($con,$get_coupons);

                        while($row_coupons=mysqli_fetch_array($run_coupons)){

                            $coupon_id = $row_coupons['cupon_id'];
                            $coupon_pro_id = $row_coupons['producto_id'];
                            $cupon_titulo = $row_coupons['cupon_titulo'];
                            $cupon_precio = $row_coupons['cupon_precio'];
                            $cupon_codigo = $row_coupons['cupon_codigo'];
                            $cupon_limite = $row_coupons['cupon_limite'];
                            $cupon_usado = $row_coupons['cupon_usado'];
                            $cupon_estado = $row_coupons['activo'];

                            if($cupon_estado == 0){
                                $estado = "Inactivo";
                            }else {
                                $estado = "activo";
                            }

                            $get_products = "select * from productos where producto_id='$coupon_pro_id'";

                            $run_products = mysqli_query($con,$get_products);
                            $row_products = mysqli_fetch_array($run_products);

                            $product_title = $row_products['producto_titulo'];

                            $i++;

                        ?>

                        <tr>
                        
                            <td><?php echo $i; ?></td>
                            <td><?php echo $cupon_titulo; ?></td>
                            <td><?php echo $product_title; ?></td>
                            <td><?php echo $cupon_precio; ?></td>
                            <td><?php echo $cupon_codigo; ?></td>
                            <td><?php echo $cupon_limite; ?></td>
                            <td><?php echo $cupon_usado; ?></td>
                            <td><?php echo $estado; ?></td>
                            <td>
                            
                                <a href="index.php?editar_cupon=<?php echo $coupon_id ?>">
                                
                                    <i class="fa fa-pencil"></i> Editar
                                
                                </a>
                            
                            </td>
                            <td>
                            
                                <a href="index.php?borrar_cupon=<?php echo $coupon_id ?>"> 
                                
                                    <i class="fa fa-trash"></i> Borrar
                                
                                </a>
                            
                            </td>
                        
                        </tr>

                        <?php } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php } ?>