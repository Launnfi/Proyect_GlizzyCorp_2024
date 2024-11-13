<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                
                <i class="fa fa-dashboard"></i> Panel / Ver ordenes
                
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               <h3 class="panel-title">
               
                   <i class="fa fa-tags"></i>  Ver ordenes
                
               </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        
                        <thead>
                            <tr>
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
                            </tr>
                        </thead>
                        <tbody>
                            
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
                                                    
                            <tr>
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