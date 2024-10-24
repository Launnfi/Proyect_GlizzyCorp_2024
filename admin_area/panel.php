<?php 
include("includes/db.php");
   if(!isset($_SESSION['admin_email'])){
        
    echo "<script>window.open('login.php','_self')</script>";

    }else{
?> 
<div class="row"><!-- row no: 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <h1 class="page-header"> Panel </h1>
        
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
            
                <i class="fa fa-dashboard"></i> Panel
            
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
        
    </div><!-- col-lg-12 finish -->
</div><!-- row no: 1 finish -->

<div class="row"><!-- row no: 2 begin -->
   
    <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 begin -->
        <div class="panel panel-primary"><!-- panel panel-primary begin -->
            
            <div class="panel-heading"><!-- panel-heading begin -->
                <div class="row"><!-- panel-heading row begin -->
                    <div class="col-xs-3"><!-- col-xs-3 begin -->
                       
                        <i class="fa fa-tasks fa-5x"></i>
                        
                    </div><!-- col-xs-3 finish -->
                    
                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right begin -->
                        <div class="huge"> <?php echo $cont_productos; ?> </div>
                           
                        <div> Productos </div>
                        
                    </div><!-- col-xs-9 text-right finish -->
                    
                </div><!-- panel-heading row finish -->
            </div><!-- panel-heading finish -->
            
            <a href="index.php?view_products"><!-- a href begin -->
                <div class="panel-footer"><!-- panel-footer begin -->
                   
                    <span class="pull-left"><!-- pull-left begin -->
                        Ver detalles 
                    </span><!-- pull-left finish -->
                    
                    <span class="pull-right"><!-- pull-right begin --> 
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span><!-- pull-right finish --> 
                    
                    <div class="clearfix"></div>
                    
                </div><!-- panel-footer finish -->
            </a><!-- a href finish -->
            
        </div><!-- panel panel-primary finish -->
    </div><!-- col-lg-3 col-md-6 finish -->
   
    <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 begin -->
        <div class="panel panel-green"><!-- panel panel-green begin -->
            
            <div class="panel-heading"><!-- panel-heading begin -->
                <div class="row"><!-- panel-heading row begin -->
                    <div class="col-xs-3"><!-- col-xs-3 begin -->
                       
                        <i class="fa fa-users fa-5x"></i>
                        
                    </div><!-- col-xs-3 finish -->
                    
                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right begin -->
                        <div class="huge"> <?php echo $cont_customers; ?> </div>
                           
                        <div> Clientes </div>
                        
                    </div><!-- col-xs-9 text-right finish -->
                    
                </div><!-- panel-heading row finish -->
            </div><!-- panel-heading finish -->
            
            <a href="index.php?view_customers"><!-- a href begin -->
                <div class="panel-footer"><!-- panel-footer begin -->
                   
                    <span class="pull-left"><!-- pull-left begin -->
                        Ver detalles 
                    </span><!-- pull-left finish -->
                    
                    <span class="pull-right"><!-- pull-right begin --> 
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span><!-- pull-right finish --> 
                    
                    <div class="clearfix"></div>
                    
                </div><!-- panel-footer finish -->
            </a><!-- a href finish -->
            
        </div><!-- panel panel-green finish -->
    </div><!-- col-lg-3 col-md-6 finish -->
   
    <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 begin -->
        <div class="panel panel-orange"><!-- panel panel-yellow begin -->
            
            <div class="panel-heading"><!-- panel-heading begin -->
                <div class="row"><!-- panel-heading row begin -->
                    <div class="col-xs-3"><!-- col-xs-3 begin -->
                       
                        <i class="fa fa-tags fa-5x"></i>
                        
                    </div><!-- col-xs-3 finish -->
                    
                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right begin -->
                        <div class="huge"> <?php echo $cont_p_cat; ?> </div>
                           
                        <div> Categoria de productos </div>
                        
                    </div><!-- col-xs-9 text-right finish -->
                    
                </div><!-- panel-heading row finish -->
            </div><!-- panel-heading finish -->
            
            <a href="index.php?view_p_cats"><!-- a href begin -->
                <div class="panel-footer"><!-- panel-footer begin -->
                   
                    <span class="pull-left"><!-- pull-left begin -->
                        Ver detalles
                    </span><!-- pull-left finish -->
                    
                    <span class="pull-right"><!-- pull-right begin --> 
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span><!-- pull-right finish --> 
                    
                    <div class="clearfix"></div>
                    
                </div><!-- panel-footer finish -->
            </a><!-- a href finish -->
            
        </div><!-- panel panel-yellow finish -->
    </div><!-- col-lg-3 col-md-6 finish -->
   
    <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 begin -->
        <div class="panel panel-red"><!-- panel panel-red begin -->
            
            <div class="panel-heading"><!-- panel-heading begin -->
                <div class="row"><!-- panel-heading row begin -->
                    <div class="col-xs-3"><!-- col-xs-3 begin -->
                       
                        <i class="fa fa-shopping-cart fa-5x"></i>
                        
                    </div><!-- col-xs-3 finish -->
                    
                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right begin -->
                        <div class="huge"> <?php echo $cont_pend_ord; ?> </div>
                           
                        <div> Ordenes </div>
                        
                    </div><!-- col-xs-9 text-right finish -->
                    
                </div><!-- panel-heading row finish -->
            </div><!-- panel-heading finish -->
            
            <a href="index.php?view_orders"><!-- a href begin -->
                <div class="panel-footer"><!-- panel-footer begin -->
                   
                    <span class="pull-left"><!-- pull-left begin -->
                        Ver detalles 
                    </span><!-- pull-left finish -->
                    
                    <span class="pull-right"><!-- pull-right begin --> 
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span><!-- pull-right finish --> 
                    
                    <div class="clearfix"></div>
                    
                </div><!-- panel-footer finish -->
            </a><!-- a href finish -->
            
        </div><!-- panel panel-red finish -->
    </div><!-- col-lg-3 col-md-6 finish -->
    
</div><!-- row no: 2 finish -->

<div class="row"><!-- row no: 3 begin -->
    <div class="col-lg-8"><!-- col-lg-8 begin -->
        <div class="panel panel-primary"><!-- panel panel-primary begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                    
                    <i class="fa fa-money fa-fw"></i> Nuevas ordenes
                    
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-hover table-striped table-bordered"><!-- table table-hover table-striped table-bordered begin -->
                        
                        <thead><!-- thead begin -->
                          
                        <tr><!-- th begin -->
                            <th>Número de orden:</th>
                            <th>Email del cliente:</th>
                            <th>Número de factura:</th>
                            <th>ID de producto:</th>
                            <th>Cantidad de productos:</th>
                            <th>Tamaño del producto:</th>
                            <th>Status:</th>
                        </tr><!-- th finish -->

                        </thead><!-- thead finish -->

                        <tbody><!-- tbody begin -->
                        <?php 
                        $get_orden = "SELECT * FROM ordenes_pendientes ORDER BY 1 DESC LIMIT 0,4"; // Consulta SQL
                        $run_orden = mysqli_query($con, $get_orden);

                        // Verifica si la consulta se ejecutó correctamente
                        if (!$run_orden) {
                            die("Error en la consulta: " . mysqli_error($con)); // Muestra el error si la consulta falla
                        }

                        while ($row_orden = mysqli_fetch_array($run_orden)) {
                            $orden_id = $row_orden['orden_id'];
                            $c_id = $row_orden['cliente_id'];
                            $numero_orden = $row_orden['numero_orden'];
                            $producto_id = $row_orden['producto_id'];
                            $cant = $row_orden['cant'];
                            $tamaño = $row_orden['tamaño'];
                            $orden_estado = $row_orden['status'];
                        ?>
                        <tr><!-- tr begin -->
                            <td><?php echo $orden_id; ?></td>
                            <td>
                                <?php 
                                $get_cliente = "SELECT * FROM customer WHERE cliente_id = '$c_id'"; // Consulta SQL
                                $run_cliente = mysqli_query($con, $get_cliente);
                                
                                // Verifica si la consulta se ejecutó correctamente
                                if (!$run_cliente) {
                                    die("Error en la consulta del cliente: " . mysqli_error($con)); // Muestra el error si la consulta falla
                                }

                                $row_cliente = mysqli_fetch_array($run_cliente);
                                $cliente_email = $row_cliente['cliente_email'];
                                echo $cliente_email; 
                                ?>
                            </td>
                            <td><?php echo $numero_orden; ?></td>
                            <td><?php echo $producto_id; ?></td>
                            <td><?php echo $cant; ?></td>
                            <td><?php echo $tamaño; ?></td>
                            <td>
                                <?php 
                                echo ($orden_estado == "Pendiente") ? "Pendiente" : "Completada"; // Simplificación de la salida
                                ?>
                            </td>
                        </tr><!-- tr finish -->
                        <?php 
                        } 
                        ?>

                        </tbody><!-- tbody finish -->

                        
                    </table><!-- table table-hover table-striped table-bordered finish -->
                </div><!-- table-responsive finish -->
                
                <div class="text-right"><!-- text-right begin -->
                    
                    <a href="index.php?view_orders"><!-- a href begin -->
                        
                        Ver todas las ordenes <i class="fa fa-arrow-circle-right"></i>
                        
                    </a><!-- a href finish -->
                    
                </div><!-- text-right finish -->
                
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-primary finish -->
    </div><!-- col-lg-8 finish -->
    
    <div class="col-md-4"><!-- col-md-4 begin -->
        <div class="panel"><!-- panel begin -->
            <div class="panel-body"><!-- panel-body begin -->
                <div class="mb-md thumb-info"><!-- mb-md thumb-info begin -->

                    <img src="admin_imagen/<?php echo $admin_img; ?>" alt="admin-thumb-info" class="rounded img-responsive">
                    
                    <div class="thumb-info-title"><!-- thumb-info-title begin -->
                       
                        <span class="thumb-info-inner"> <?php echo $admin_nombre; ?></span>
                        <span class="thumb-info-type"> <?php echo $admin_trabajo; ?> </span>
                        
                    </div><!-- thumb-info-title finish -->

                </div><!-- mb-md thumb-info finish -->
                
                <div class="mb-md"><!-- mb-md begin -->
                    <div class="widget-content-expanded"><!-- widget-content-expanded begin -->
                        <i class="fa fa-user"></i> <span> Email: </span> <?php echo $admin_email; ?><br/>
                        <i class="fa fa-flag"></i> <span> Ciudad: </span> <?php echo $admin_ciudad; ?> <br/>
                        <i class="fa fa-envelope"></i> <span> Contacto: </span> <?php echo $admin_contacto; ?><br/>
                    </div><!-- widget-content-expanded finish -->
                    
                    <hr class="dotted short">
                    
                    <h5 class="text-muted"> Sobre nosotros </h5>
                    
                    <p><!-- p begin -->
                        
                        Esta aplicacion fue creada por Glizzycorp. <br/>
                        <a href="#"> Glizzycorp </a> <br/>
                        <?php echo $admin_sobre; ?>
                        
                    </p><!-- p finish -->
                    
                </div><!-- mb-md finish -->
                
            </div><!-- panel-body finish -->
        </div><!-- panel finish -->
    </div><!-- col-md-4 finish -->
    
</div><!-- row no: 3 finish -->
<?php }?>