<?php 
include("includes/db.php");
   if(!isset($_SESSION['admin_email'])){
        
    echo "<script>window.open('login.php','_self')</script>";

    }else{
?> 
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"> Panel </h1>
        
        <ol class="breadcrumb">
            <li class="active">
            
                <i class="fa fa-dashboard"></i> Panel
            
            </li>
        </ol>
        
    </div>
</div>

<div class="row">
   
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                       
                        <i class="fa fa-tasks fa-5x"></i>
                        
                    </div>
                    
                    <div class="col-xs-9 text-right">
                        <div class="huge"> <?php echo $cont_productos; ?> </div>
                           
                        <div> Productos </div>
                        
                    </div>
                    
                </div>
            </div>
            
            <a href="index.php?ver_producto">
                <div class="panel-footer">
                   
                    <span class="pull-left">
                        Ver detalles 
                    </span>
                    
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span>
                    
                    <div class="clearfix"></div>
                    
                </div>
            </a>
            
            </div>
        </div>
       <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
        
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                       
                        <i class="fa fa-users fa-5x"></i>
                        
                    </div>
                    
                    <div class="col-xs-9 text-right">
                        <div class="huge"> <?php echo $cont_customers; ?> </div>
                           
                        <div> Clientes </div>
                        
                    </div>
                    
                </div>
            </div>
            
            <a href="index.php?ver_clientes">
                <div class="panel-footer">
                   
                    <span class="pull-left">
                        Ver detalles 
                    </span>
                    
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span>
                    
                    <div class="clearfix"></div>
                    
                </div>
            </a>
            
        </div>
    </div>
   
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-orange">
            
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                       
                        <i class="fa fa-tags fa-5x"></i>
                        
                    </div>
                    
                    <div class="col-xs-9 text-right">
                        <div class="huge"> <?php echo $cont_p_cat; ?> </div>
                           
                        <div> Categoria de productos </div>
                        
                    </div>
                    
                </div>
            </div>
            
            <a href="index.php?ver_p_cats">
                <div class="panel-footer">
                   
                    <span class="pull-left">
                        Ver detalles
                    </span>
                    
                    <span class="pull-right"> 
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span>
                    
                    <div class="clearfix"></div>
                    
                </div>
            </a>
            
        </div>
    </div>
   
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                       
                        <i class="fa fa-shopping-cart fa-5x"></i>
                        
                    </div>
                    
                    <div class="col-xs-9 text-right">
                        <div class="huge"> <?php echo $cont_pend_ord; ?> </div>
                           
                        <div> Ordenes </div>
                        
                    </div>
                    
                </div>
            </div>
            
            <a href="index.php?ver_ordenes">
                <div class="panel-footer">
                   
                    <span class="pull-left">
                        Ver detalles 
                    </span>
                    
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span>
                    
                    <div class="clearfix"></div>
                    
                </div>
            </a>
            
        </div>
    </div>
    
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    
                    <i class="fa fa-money fa-fw"></i> Nuevas ordenes
                    
                </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered"><
                        
                        <thead>
                          
                        <tr>
                            <th>Número de orden:</th>
                            <th>Email del cliente:</th>
                            <th>Número de factura:</th>
                            <th>ID de producto:</th>
                            <th>Cantidad de productos:</th>
                            <th>Tamaño del producto:</th>
                            <th>Status:</th>
                        </tr>

                        </thead>

                        <tbody>
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
                        <tr>
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
                        </tr>
                        <?php 
                        } 
                        ?>

                        </tbody>
                        
                    </table>
                </div>
                
                <div class="text-right">
                    
                    <a href="index.php?view_orders">
                        
                        Ver todas las ordenes <i class="fa fa-arrow-circle-right"></i>
                        
                    </a>
                </div>
                
            </div>
            
        </div>
    </div>
    
    <div class="col-md-4">
    
        <div class="panel">
            <div class="panel-body">
                <div class="mb-md thumb-info">

                    <img src="admin_imagen/<?php echo $admin_img; ?>" alt="admin-thumb-info" class="rounded img-responsive">
                    
                    <div class="thumb-info-title">
                       
                        <span class="thumb-info-inner"> <?php echo $admin_nombre; ?></span>
                        <span class="thumb-info-type"> <?php echo $admin_trabajo; ?> </span>
                        
                    </div>

                </div>
                
                <div class="mb-md">
                    <div class="widget-content-expanded">
                        <i class="fa fa-user"></i> <span> Email: </span> <?php echo $admin_email; ?><br/>
                        <i class="fa fa-flag"></i> <span> Ciudad: </span> <?php echo $admin_ciudad; ?> <br/>
                        <i class="fa fa-envelope"></i> <span> Contacto: </span> <?php echo $admin_contacto; ?><br/>
                    </div>
                    
                    <hr class="dotted short">
                    
                    <h5 class="text-muted"> Sobre nosotros </h5>
                    
                    <p>
                        
                        Esta aplicacion fue creada por Glizzycorp. <br/>
                        <a href="#"> Glizzycorp </a> <br/>
                        <?php echo $admin_sobre; ?>
                        
                    </p>
                    

                    
                </div>
            </div>
        </div>
    </div>
    
</div>
<?php }?>