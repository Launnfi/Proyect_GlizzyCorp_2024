<div class="panel panel-default sidebar-menu"><!-- panel panel-default slidebar-menu empieza -->
    <div class="panel-heading"><!-- panel-heading empieza -->
        
        <?php 
        if(!isset($_SESSION['cliente_email'])) { 
            echo "
            <center>
            <img class='perf img-responsive' src='customer_images/sign-icon.png' alt='Imagen del cliente'>
            </center>
            <br>

            <h3 class='panel-title' align='center'>
            Nombre: Invitado
            </h3>
            ";
        }else{
                 // Obtener el correo del cliente desde la sesión
                 $cliente_sesion = $_SESSION['cliente_email'];

                 // Consulta para obtener los datos del cliente
                 $get_cliente = "SELECT * FROM customer WHERE cliente_email = '$cliente_sesion'";
                 $run_cliente = mysqli_query($con, $get_cliente);
                 $row_cliente = mysqli_fetch_array($run_cliente);
     
                 // Obtener imagen y nombre del cliente
                 $cliente_img = $row_cliente['cliente_img'];
                 $cliente_nom = $row_cliente['cliente_nombre'];
     
                 echo "
                 <center>
                 <img class='perf img-responsive' src='customer_images/$cliente_img' alt='Imagen del cliente'>
                 </center>
                 <br>
     
                 <h3 class='panel-title' align='center'>
                 Nombre: $cliente_nom
                 </h3>
                 ";
        }
        ?>

    </div><!-- panel-heading termina -->

    <div class="panel-body"><!-- panel-body empieza -->

        <ul class="nav-pills nav-stacked nav"><!-- nav-pills nav-stacked-nav empieza -->

            <li class="<?php if(isset($_GET['misOrdenes'])){echo'active';} ?>">
                <a href="my_account.php?misOrdenes">
                    <i class="fa fa-list"></i> Mis órdenes
                </a>
            </li>

            <li class="<?php if(isset($_GET['pagoOff'])){echo'active';} ?>">
                <a href="my_account.php?pagoOff">
                    <i class="fa fa-bolt"></i> Pago Offline
                </a>
            </li>

            <li class="<?php if(isset($_GET['editarInfo'])){echo'active';} ?>">
                <a href="my_account.php?editarInfo">
                    <i class="fa fa-pencil"></i> Editar información de la cuenta
                </a>
            </li>

            <li class="<?php if(isset($_GET['cambiarCont'])){echo'active';} ?>">
                <a href="my_account.php?cambiarCont">
                    <i class="fa fa-user"></i> Cambiar contraseña
                </a>
            </li>
            
            <li class="<?php if(isset($_GET['cerrarSecion'])){echo'active';} ?>">
                <a href="../logout.php">
                    <i class="fa fa-sign-out"></i> Cerrar sesión
                </a>
            </li>

            <li class="<?php if(isset($_GET['eliminarCuenta'])){echo'active';} ?>">
                <a href="my_account.php?eliminarCuenta">
                    <i class="fa fa-trash-o"></i> Eliminar cuenta
                </a>
            </li>

        </ul><!-- nav-pills nav-stacked-nav termina -->

    </div><!-- panel-body termina -->

</div><!-- panel panel-default slidebar-menu termina -->
