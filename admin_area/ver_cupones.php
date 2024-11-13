<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                
                <i class="fa fa-dashboard"></i> Panel / Ver Cupones
                
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               <h3 class="panel-title">              
                   <i class="fa fa-tags"></i>  Ver Cupones
                
               </h3> 
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        
                        <thead>
                            <tr>
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
                            </tr>
                        </thead>
                        
                        <tbody>

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
                            $run_products = mysqli_query($con, $get_products);
                            
                            // Verifica si se obtuvo algún resultado
                            if ($row_products = mysqli_fetch_array($run_products)) {
                                $product_title = $row_products['producto_titulo'];
                            } else {
                                $product_title = "Producto no encontrado"; // Valor por defecto si no hay producto
                            }
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
                            
                        </tbody>
                        
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>

<?php } ?>