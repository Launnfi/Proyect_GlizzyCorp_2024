<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                
                <i class="fa fa-dashboard"></i> Panel / Ver pagos
                
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               <h3 class="panel-title">
               
                   <i class="fa fa-tags"></i>  Ver pagos
                
               </h3>
            </div>
            
            <div class="panel-body">
            <a href="pdfPagos.php" target="_blank" class="btn btn-primary">
                Descargar PDF de Pagos
            </a>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        
                        <thead>
                            <tr>
                                <th> No: </th>
                                <th> Numero de orden: </th>
                                <th> Cantidad a pagar : </th>
                                <th> Metodo de pago: </th>
                                <th> numero de referencia: </th>
                                <th> Fecha de pago: </th>

                            </tr>
                        </thead>
                        
                        <tbody>

                        <?php 
          
                                $i=0;
                            
                                $get_pagos = "select * from pagos";
                                
                                $run_pagos = mysqli_query($con,$get_pagos);
          
                                while($row_pagos=mysqli_fetch_array($run_pagos)){
                                    
                                    $pago_id = $row_pagos['pago_id'];
                                    
                                    $num_fac = $row_pagos['numero_factura'];
                                    
                                    $cantidad = $row_pagos['cantidad'];
                                    
                                    $metodo_pago = $row_pagos['metodo_pago'];
                                    
                                    $num_ref = $row_pagos['num_ref'];
                                    
                                    $fecha_pago = $row_pagos['fecha_pago'];
                                }
                                    ?>
                    
                            </tr>
                        </thead>
                        
                        <tbody>
                            
                            <?php 
          
                                $i=0;
                            
                                $get_payments = "select * from pagos";
                                
                                $run_payments = mysqli_query($con,$get_payments);
          
                                while($row_payments=mysqli_fetch_array($run_payments)){
                                    
                                    $payment_id = $row_payments['pago_id'];
                                    
                                    $invoice_no = $row_payments['numero_factura'];
                                    
                                    $amount = $row_payments['cantidad'];
                                    
                                    $payment_mode = $row_payments['metodo_pago'];
                                    
                                    $ref_no = $row_payments['num_ref'];
                                    
                                    $payment_date = $row_payments['fecha_pago'];
                                    
                                    $i++;
                                
                            
                            ?>
                                                    
                            <tr>
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $num_fac;?> </td>
                                <td> <?php echo $cantidad; ?></td>
                                <td> <?php echo $metodo_pago; ?> </td>
                                <td> <?php echo $num_ref; ?></td>
                                <td> <?php echo $fecha_pago; ?> </td>
                                
                            </tr>
                            
                            <?php } ?>
                            
                        </tbody>
                        
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>

    </div>
</div>
<?php } ?>