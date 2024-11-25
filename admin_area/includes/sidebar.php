<?php 

      if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";

        }else{

?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header">
        
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            
            <span class="sr-only">Alternar navegacion</span>
            
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            
        </button>
        
        <a href="index.php?panel" class="navbar-brand">Admin Area</a>
        
    </div>
    
    <ul class="nav navbar-right top-nav">
        
        <li class="dropdown">
            
            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="collapse">
                
                <i class="fa fa-user"></i> <?php echo $admin_nombre; ?> <b class="caret"></b>
                
            </a>
            
            <ul class="dropdown-menu">
                <li>
                    <a href="index.php?perfil_admin=<?php echo $admin_id;  ?>">
                        
                        <i class="fa fa-fw fa-user"></i> Perfil
                        
                    </a>
                </li>
                
                <li>
                    <a href="index.php?ver_productos">
                        
                        <i class="fa fa-fw fa-envelope"></i> Productos
                        
                        <span class="badge"><?php echo $cont_productos ?></span>
                        
                    </a>
                </li>
                
                <li>
                    <a href="index.php?ver_clientes">
                        
                        <i class="fa fa-fw fa-users"></i> Clientes
                        
                        <span class="badge"><?php echo $cont_customers ?></span>
                        
                    </a>
                </li>
                
                <li>
                    <a href="index.php?ver_cat">
                        
                        <i class="fa fa-fw fa-gear"></i> Producto Categorias 
                        
                        <span class="badge"><?php echo  $cont_p_cat ?></span>
                        
                    </a>
                </li>
                
                <li class="divider"></li>
                
                <li>
                    <a href="logout.php">
                        
                        <i class="fa fa-fw fa-power-off"></i> Salir
                        
                    </a>
                </li>
                
            </ul>
            
        </li>
        
    </ul>
    
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="index.php?panel">
                        
                        <i class="fa fa-fw fa-dashboard"></i> Panel
                        
                </a>
                
            </li>
            
            <li>
                <a href="#" data-toggle="collapse" data-target="#products">
                        
                        <i class="fa fa-fw fa-tag"></i> Productos
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a>
                
                <ul id="products" class="collapse">
                    <li>
                        <a href="index.php?insertar_productos"> Insertar Productos  </a>
                    </li>
                    <li>
                        <a href="index.php?ver_producto"> Ver productos  </a>
                    </li>
                </ul>
                
            </li>
            
            <li>
                <a href="#" data-toggle="collapse" data-target="#p_cat">
                        
                        <i class="fa fa-fw fa-edit"></i> Productos Categorias
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a>
                
                <ul id="p_cat" class="collapse">
                    <li>
                        <a href="index.php?insertar_p_cat"> Insertar Producto categoria </a>
                    </li>
                    <li>
                        <a href="index.php?ver_p_cats"> ver  Producto categoria </a>
                    </li>
                </ul>

            </li>
            
            <li>
                <a href="#" data-toggle="collapse" data-target="#cat">
                        
                        <i class="fa fa-fw fa-book"></i> Categorias
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a>
                
                <ul id="cat" class="collapse">
                    <li>
                        <a href="index.php?insertar_cat"> Insertar Categoria </a>
                    </li>
                    <li>
                        <a href="index.php?ver_cat"> ver Categoria </a>
                    </li>
                </ul>
                
            </li>
            
            <li>
                <a href="#" data-toggle="collapse" data-target="#slides">
                        
                        <i class="fa fa-fw fa-gear"></i> Carrucel
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a>
                
                <ul id="slides" class="collapse">
                    <li>
                        <a href="index.php?insertar_slide"> Insertar imagen al Carrucel </a>
                    </li>
                    <li>
                        <a href="index.php?ver_slides"> Ver imagenes del carrucel </a>
                    </li>
                </ul>
                
            </li>
            
            
            <li>
                <a href="#" data-toggle="collapse" data-target="#boxes">
                        
                        <i class="fa fa-fw fa-dropbox"></i> Cajas
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a>
                
                <ul id="boxes" class="collapse">
                    <li>
                        <a href="index.php?insertar_caja"> Insertar cajas de texto </a>
                    </li>
                    <li>
                        <a href="index.php?ver_cajas"> Ver Cajas </a>
                    </li>
                </ul>
                
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#cupones">
                        
                <i class="fa fa-tags" aria-hidden="true"></i> cupones
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a>
                
                <ul id="cupones" class="collapse">
                    <li>
                        <a href="index.php?insertar_cupon"> Insertar cupones </a>
                    </li>
                    <li>
                        <a href="index.php?ver_cupones"> Ver cupones </a>
                    </li>
                </ul>
                
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#variantes">
                        
                <i class="fa fa-tags" aria-hidden="true"></i> Variantes
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a>
                
                <ul id="variantes" class="collapse">
                    <li>
                        <a href="index.php?insertar_var"> Insertar variante </a>
                    </li>
                    <li>
                        <a href="index.php?ver_var"> Ver variantes </a>
                    </li>
                </ul>
                
            </li>
            
            <li>
                <a href="index.php?ver_clientes">
                    <i class="fa fa-fw fa-users"></i> Ver Clentes
                </a>
            </li>
            
            <li>
                <a href="index.php?ver_ordenes">
                    <i class="fa fa-fw fa-book"></i> Ver Ordenes 
                </a>
            </li>
            
            <li>
                <a href="index.php?ver_pagos">
                    <i class="fa fa-fw fa-money"></i> Ver Pagos 
                </a>
            </li>
            
            <li>
                <a href="#" data-toggle="collapse" data-target="#users">
                        
                        <i class="fa fa-fw fa-users"></i> Usuarios
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a>
                <ul id="users" class="collapse">
                    <li>

                        <a href="index.php?insertar_user"> Insertar usuario </a>
                    </li>
                    <li>
                        <a href="index.php?ver_user"> Ver Usuario </a>
                    </li>
                    <li>
                        <a href="index.php?perfil_admin=<?php echo $admin_id ?>"> Editar Perfil del usuario  </a>

                
            </li>
            
            <li>
                <a href="logout.php">
                    <i class="fa fa-fw fa-power-off"></i> Salir
                </a>
            </li>
            
        </ul>
    </div>
    
</nav>
<?php }?>