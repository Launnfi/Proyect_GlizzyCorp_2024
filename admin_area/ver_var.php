<?php
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
} else {
?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> Panel / Ver variantes
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-tags fa-fw"></i> Ver variantes
                </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th> Variante ID </th>
                                <th> Producto </th>
                                <th> Talla </th>
                                <th> Stock </th>
                                <th> Precio </th>
                                <th> Precio oferta </th>
                                <th> Estado </th>
                                <th> Editar Variante </th>
                                <th> Activar/Desactivar </th>
                            </tr>
                        </thead>
                        
                        <tbody>
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
                                    $precio_off = $row_var['var_precio_of'] ?? null;
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
                                        <td> <?php echo $precio_off; ?> </td>
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
                                
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
