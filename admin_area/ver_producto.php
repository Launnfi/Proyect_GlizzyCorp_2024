<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> panel / Ver productos
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  Ver productos
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> Producto ID: </th>
                                <th> producto titulo : </th>
                                <th> producto imagen: </th>
                                <th> Producto precio: </th>
                                <th> Producto vendido: </th>
                                <th> Producto palabras clave: </th>
                                <th> Producto fecha: </th>
                                <th> Producto estado: </th>
                                <th> Producto borrar: </th>
                                <th> Producto Editar: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                        <?php 
                        $i = 0;
                        $get_pro = "SELECT * FROM productos";
                        $run_pro = mysqli_query($con, $get_pro);

                        while ($row_pro = mysqli_fetch_array($run_pro)) {
                            $pro_id = $row_pro['producto_id'];
                            $pro_title = $row_pro['producto_titulo'];
                            $pro_img1 = $row_pro['producto_img1'];
                            $pro_keywords = $row_pro['producto_keywords'];
                            $pro_date = $row_pro['date'];
                            $pro_est = $row_pro['activo'];
                            $estado = ($pro_est == 0) ? "inactivo" : "activo";
                            $i++;

                            // Consulta para obtener el precio mínimo de la variante
                            $get_min_price = "SELECT MIN(precio_var) AS min_precio FROM variantes WHERE producto_id = '$pro_id'";
                            $run_min_price = mysqli_query($con, $get_min_price);
                            $row_min_price = mysqli_fetch_array($run_min_price);
                            $min_precio = $row_min_price['min_precio'];

                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $pro_title; ?> </td>
                                <td> <img src="product_images/<?php echo $pro_img1; ?>" width="60" height="60"></td>
                                <td> $ <?php echo $min_precio; ?> </td>
                                <td> <?php 
                                    
                                        $get_sold = "select * from ordenes_pendientes where producto_id='$pro_id'";
                                    
                                        $run_sold = mysqli_query($con,$get_sold);
                                    
                                        $count = mysqli_num_rows($run_sold);
                                    
                                        echo $count;
                                    
                                     ?> 
                                </td>
                                <td> <?php echo $pro_keywords; ?> </td>
                                <td> <?php echo $pro_date ?> </td>
                                <td> <?php echo $estado ?> </td>
                                <td> 
                                     
                                     <a href="index.php?borrar_producto=<?php echo $pro_id; ?>">
                                     
                                        <i class="fa fa-trash-o"></i> Borrar/activar
                                    
                                     </a> 
                                     
                                </td>
                                <td> 
                                     
                                     <a href="index.php?editar_producto=<?php echo $pro_id; ?>">
                                     
                                        <i class="fa fa-pencil"></i> Editar
                                    
                                     </a> 
                                    
                                </td>
                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php } ?>