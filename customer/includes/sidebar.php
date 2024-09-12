
<div class="panel panel-default sidebar-menu"><!-- panel panel-default slidebar-menu empieza -->
    <div class="panel-heading"><!-- panel-heading empieza -->
        
        <center>

        <img class="perf" src="customer_images/Foto_Perfil.JPG" alt="Foto de perfil"></IMG>

        </center>
        
        <br>
        <h3 aling="center" class="panel-title"><!-- pannel-title empieza -->
            Nombre: Martin Perez Disalvo



        </h3><!-- pannel-title termina -->

        </div><!-- panel-heading termina -->

        <div class="panel-body"><!-- panel-body empieza -->

        <ul class="nav-pills nav-stacked nav"><!-- nav-pills nav-stacked-nav empieza -->

        <li class="<?php if(isset($_GET['misOrdenes'])){echo"active";} ?>">
            <a href="my_account.php?misOrdenes">
            
            <i class="fa fa-list"></i>Mis ordenes
            </a>

        </li>

        <li class="<?php if(isset($_GET['pagoOff'])){echo"active";} ?>">
            <a href="my_account.php?pagoOff">
            
            <i class="fa fa-bolt"></i>Pago Offline
            </a>

        </li>
        <li class="<?php if(isset($_GET['editarInfo'])){echo"active";} ?>">
            <a href="my_account.php?editarInfo">
            
            <i class="fa fa-pencil"></i>Editar informacion de la cuenta
            </a>

        </li>

        <li class="<?php if(isset($_GET['cambiarCont'])){echo"active";} ?>">
            <a href="my_account.php?cambiarCont">
            
            <i class="fa fa-user"></i>Cambiar contraseña
            </a>
            <br>

        </li>
        <li class="<?php if(isset($_GET['cerrarSecion'])){echo"active";} ?>">
            <a href="logout.php">
            
            <i class="fa fa-sign-out"></i>Cerrar la seción
            </a>

        </li>
        <br>

        <li class="<?php if(isset($_GET['eliminarCuenta'])){echo"active";} ?>">
            <a href="my_account.php?eliminarCuenta">
            
            <i class="fa fa-trash-o"></i>Eliminar cuenta
            </a>

        </li>

        </ul><!-- nav-pills nav-stacked-nav termina -->

        </div><!-- panel-body termina -->


</div><!-- panel panel-default slidebar-menu termina -->