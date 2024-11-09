<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> Panel / Ver pagos
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  Ver pagos
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> No: </th>
                                <th> Numero de orden: </th>
                                <th> Cantidad a pagar : </th>
                                <th> Metodo de pago: </th>
                                <th> numero de referencia: </th>
                                <th> Fecha de pago: </th>

                            </tr>
                        </thead>
                        
                        <tbody><!-- tbody begin -->
                            
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
                    
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
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
                                                    
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $num_fac;?> </td>
                                <td> <?php echo $cantidad; ?></td>
                                <td> <?php echo $metodo_pago; ?> </td>
                                <td> <?php echo $num_ref; ?></td>
                                <td> <?php echo $fecha_pago; ?> </td>
                                
                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div>
</div>

    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php } ?>