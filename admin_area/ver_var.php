<?php
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
} else {
?>
<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                <i class="fa fa-dashboard"></i> Panel / Ver variantes
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                    <i class="fa fa-tags fa-fw"></i> Ver variantes
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-hover table-striped table-bordered"><!-- table begin -->
                        <thead><!-- thead begin -->
                            <tr>
                                <th> Variante ID </th>
                                <th> Producto </th>
                                <th> Talla </th>
                                <th> Stock </th>
                                <th> Precio </th>
                                <th> Estado </th>
                                <th> Editar Variante </th>
                                <th> Activar/Desactivar </th>
                            </tr>
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            <?php 
                                $i = 0;
                                $get_var = "SELECT * FROM variantes";
                                $run_var = mysqli_query($con, $get_var);
                                
                                while($row_var = mysqli_fetch_array($run_var)){
                                    $variante_id = $row_var['var_id'];
                                    $producto_id = $row_var['producto_id'] ?? null;
                                    $talla = $row_var['talle'] ?? null;
                                    $stock = $row_var['stock_var'] ?? null;
                                    $precio = $row_var['precio_var'] ?? null;
                                    $activo = $row_var['activo'] ?? null;
                                
                                    // Verificación del nombre del producto
                                    $get_producto = "SELECT producto_titulo FROM productos WHERE producto_id='$producto_id'";
                                    $run_producto = mysqli_query($con, $get_producto);
                                    $row_producto = mysqli_fetch_array($run_producto);
                                    $producto_titulo = $row_producto['producto_titulo'] ?? "Producto desconocido";
                                $i++;
                                if($activo == 0){
                                    $estado = "inactivo";

                                }else{
                                    $estado = "activo";
                                }                                ?>
                                    <tr>
                                        <td> <?php echo $i; ?> </td>
                                        <td> <?php echo $producto_titulo; ?> </td>
                                        <td> <?php echo $talla; ?> </td>
                                        <td> <?php echo $stock; ?> </td>
                                        <td> <?php echo $precio; ?> </td>
                                        <td> <?php echo $estado; ?> </td>
                                        <td> 
                                            <a href="index.php?editar_variante=<?php echo $variante_id; ?>">
                                                <i class="fa fa-pencil"></i> Editar
                                            </a>
                                        </td>
                                        <td> 
                                            <a href="index.php?borrar_var=<?php echo $variante_id; ?>">
                                                <i class="fa fa-trash"></i> Activar/Desactivar
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                
                        </tbody><!-- tbody finish -->
                    </table><!-- table finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->
<?php } ?>
