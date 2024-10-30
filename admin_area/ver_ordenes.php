<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> Panel / Ver ordenes
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  Ver ordenes
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> No: </th>
                                <th> Cliente Email: </th>
                                <th> Numero de orden: </th>
                                <th> Nombre de producto: </th>
                                <th> Cantidad de producto: </th>
                                <th> Talle de producto: </th>
                                <th> Fecha de orden: </th>
                                <th> Cantidad total: </th>
                                <th> Status: </th>
                                <th> Borrar: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                        <?php 
                            $i = 0;

                            $get_orders = "
                                SELECT 
                                    op.orden_id,
                                    op.cliente_id,
                                    op.numero_orden,
                                    op.producto_id,
                                    op.cant,
                                    op.tamaño,
                                    op.status,
                                    p.producto_titulo,
                                    c.cliente_email,
                                    oc.fecha_orden,
                                    oc.monto
                                FROM 
                                    ordenes_pendientes op
                                JOIN 
                                    productos p ON op.producto_id = p.producto_id
                                JOIN 
                                    customer c ON op.cliente_id = c.cliente_id
                                JOIN 
                                    ordenes_cliente oc ON op.orden_id = oc.orden_id
                            ";

                            $run_orders = mysqli_query($con, $get_orders);

                            while($row_order = mysqli_fetch_array($run_orders)){
                                $order_id = $row_order['orden_id'];
                                $c_id = $row_order['cliente_id'];
                                $invoice_no = $row_order['numero_orden'];
                                $product_id = $row_order['producto_id'];
                                $qty = $row_order['cant'];
                                $size = $row_order['tamaño'];
                                $order_status = $row_order['status'];
                                $product_title = $row_order['producto_titulo'];
                                $customer_email = $row_order['cliente_email'];
                                $order_date = $row_order['fecha_orden'];
                                $order_amount = $row_order['monto'];

                                $i++;
                        ?>
                                                    
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $customer_email; ?> </td>
                                <td> <?php echo $invoice_no; ?></td>
                                <td> <?php echo $product_title; ?> </td>
                                <td> <?php echo $qty; ?></td>
                                <td> <?php echo $size; ?> </td>
                                <td> <?php echo $order_date; ?> </td>
                                <td> <?php echo $order_amount; ?> </td>
                                <td>
                                    
                                    <?php 
                                    
                                        if($order_status=='pendiente'){
                                            
                                            echo $order_status='pendiente';
                                            
                                        }else{
                                            
                                            echo $order_status='completada';
                                            
                                        }
                                    
                                    ?>
                                    
                                </td>
                                <td> 
                                     
                                     <a href="index.php?borrar_orden=<?php echo $order_id; ?>">
                                     
                                        <i class="fa fa-trash-o"></i> Borrar
                                    
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