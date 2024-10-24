<center>

    <h1>Mis ordenes</h1>
    <p class="lead">Las ordenes que realizó se encuentran en esta seccion</p>
    <p class="text-muted">Por cualquier pregunta, eres libre de <a href="../contact.php">contactrarnos</a>. Estamos dispuestos en solucionar cualquier duda que tengas 😊</p>

</center>

    <hr>
    <div class="table-responsive"><!-- table-responsive empieza -->

        <table class="table table-bordered table-hover"><!-- table table-bordered table-hover empieza -->

            <thead><!--thead empieza -->
                <tr>
                    <th>En</th>
                    <th>Due Amount</th>
                    <th>N° de orden</th>
                    <th>Cantidad:</th>
                    <th>Talla</th>
                    <th>Fecha de orden</th>
                    <th>Pago / No Pago</th>
                    <th>Estado</th>
                </tr>

            </thead><!--thead termina -->
            
            <tbody>

            <?php 
            
            $clente_sesion = $_SESSION['cliente_email'];

            $get_cliente = "SELECT * FROM customer WHERE cliente_email = '$clente_sesion'";

            $run_cliente = mysqli_query($con, $get_cliente);

            $row_cliente = mysqli_fetch_array($run_cliente);

            $cliente_id = $row_cliente['cliente_id'];

            $get_orden = "SELECT * from ordenes_cliente WHERE cliente_id = '$cliente_id'";

            $run_orden = mysqli_query($con, $get_orden);

            $i = 0;

            while($row_orden = mysqli_fetch_array($run_orden)){

                $orden_id = $row_orden['orden_id'];

                $monto = $row_orden['monto'];

                $numero_orden = $row_orden['numero_orden'];

                $cant = $row_orden['cant'];

                $talla = $row_orden['tamaño'];

                $estado = $row_orden['status'];

                $fecha_orden = substr($row_orden['fecha_orden'],0,11);

                $i++;

                if($estado == 'Pendiente'){

                    $estado == 'No pago';


                }else{
                    $estado == 'Pago';
                }

            
            
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
                    <a href="confirmar.php?orden_id = '<?php echo $orden_id ?>" target="_blank" class="btn btn-primary btn-sm">Confirmar pago</a>
                </td>
            </tr>   
<?php } ?>
             </tbody>

                <tbody>

            <tr>
                
            </tbody>

        </table><!-- table table-bordered table-hover termina -->

    </div><!-- table-responsive termina -->