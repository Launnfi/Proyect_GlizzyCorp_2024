<center>
    <h1>Mis órdenes</h1>
    <p class="lead">Las órdenes que realizaste se encuentran en esta sección.</p>
    <p class="text-muted">Por cualquier pregunta, eres libre de <a href="../contact.php">contactarnos</a>. Estamos dispuestos a solucionar cualquier duda que tengas 😊</p>
</center>

<hr>

<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Monto adeudado</th>
                <th>N° de orden</th>
                <th>Cantidad:</th>
                <th>Talla</th>
                <th>Fecha de orden</th>
                <th>Pago / No Pago</th>
                <th>Estado</th>
            </tr>
        </thead>
        
        <tbody>
            <?php 
            $cliente_sesion = $_SESSION['cliente_email'];

            $get_cliente = "SELECT * FROM customer WHERE cliente_email = '$cliente_sesion'";
            $run_cliente = mysqli_query($con, $get_cliente);
            $row_cliente = mysqli_fetch_array($run_cliente);
            $cliente_id = $row_cliente['cliente_id'];

            $get_orden = "SELECT * FROM ordenes_cliente WHERE cliente_id = '$cliente_id'";
            $run_orden = mysqli_query($con, $get_orden);

            $i = 0;

            while($row_orden = mysqli_fetch_array($run_orden)){
                $orden_id = $row_orden['orden_id'];
                $monto = $row_orden['monto'];
                $numero_orden = $row_orden['numero_orden'];
                $cant = $row_orden['cant'];
                $talla = $row_orden['tamaño'];
                $estado = $row_orden['status'];
                $fecha_orden = substr($row_orden['fecha_orden'], 0, 11);

                // Corregir la asignación del estado
                if($estado == 'Pendiente'){
                    $estado = 'No pago';
                } else {
                    $estado = 'Pago';
                }
                $i++;
            ?>
                <tr>
                    <th><?php echo $i; ?></th>
                    <td><?php echo $monto; ?></td>
                    <td><?php echo $numero_orden; ?></td>
                    <td><?php echo $cant; ?> </td>
                    <td> <?php echo $talla; ?></td>
                    <td><?php echo $fecha_orden; ?></td>
                    <td><?php echo $estado; ?></td>
                    <td>
                        <a href="confirmar.php?orden_id=<?php echo $orden_id; ?>" target="_blank" class="btn btn-primary btn-sm">Confirmar pago</a>
                    </td>
                </tr>   
            <?php } ?>
        </tbody>
    </table>
</div>
