<?php
session_start();
include("includes/db.php");

// Verificar si el administrador ha iniciado sesión
if (!isset($_SESSION['admin_email'])) {
    echo "<scrip>window.open('login.php','_self')</script>";
    exit(); // Asegurarse de que el script se detenga después de redirigir
} else {
    $admin_session = $_SESSION['admin_email'];

    // Usar sentencias preparadas para prevenir inyección SQL
    $stmt = $con->prepare("SELECT * FROM admin WHERE admin_email = ?");
    $stmt->bind_param("s", $admin_session);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row_admin = $result->fetch_assoc();
        $admin_id = $row_admin['admin_id']; // Corregido: "adimn_id" a "admin_id"
        $admin_nombre = $row_admin['admin_nombre'];
        $admin_email = $row_admin['admin_email'];
        $admin_img = $row_admin['admin_img'];
        $admin_contacto = $row_admin['admin_contacto'];
        $admin_ciudad = $row_admin['admin_ciudad'];
        $admin_sobre = $row_admin['admin_sobre'];
        $admin_trabajo = $row_admin['admin_trabajo'];
    } else {
        // Manejo de errores si no se encuentra el administrador
        die("No se encontró el administrador.");
    }

    // Consulta para obtener productos
    $get_productos = "SELECT * FROM productos";
    $run_productos = mysqli_query($con, $get_productos);
    if ($run_productos) {
        $cont_productos = mysqli_num_rows($run_productos);
    } else {
        // Manejo de errores si la consulta de productos falla
        die("Error en la consulta de productos: " . mysqli_error($con));
    }

    // Consulta para obtener clientes
    $get_customers = "SELECT * FROM customer";
    $run_customers = mysqli_query($con, $get_customers);
    if ($run_customers) {
        $cont_customers = mysqli_num_rows($run_customers);
    } else {
        // Manejo de errores si la consulta de clientes falla
        die("Error en la consulta de clientes: " . mysqli_error($con));
    }

    // Consulta para obtener categorías de productos
    $get_p_categorias = "SELECT * FROM productos_categorias";
    $run_p_categorias = mysqli_query($con, $get_p_categorias);
    if ($run_p_categorias) {
        $cont_p_cat = mysqli_num_rows($run_p_categorias);
    } else {
        // Manejo de errores si la consulta de categorías de productos falla
        die("Error en la consulta de categorías de productos: " . mysqli_error($con));
    }

    // Consulta para obtener órdenes pendientes
    $get_pend_ord = "SELECT * FROM ordenes_pendientes";
    $run_pend_ord = mysqli_query($con, $get_pend_ord); // Corregido aquí, antes era run_pend_ord
    if ($run_pend_ord) {
        $cont_pend_ord = mysqli_num_rows($run_pend_ord);
    } else {
        // Manejo de errores si la consulta de órdenes pendientes falla
        die("Error en la consulta de órdenes pendientes: " . mysqli_error($con));
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vicenta Admin area</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
</head>
<body>
    
    <div id="wrapper">

    <?php include ("includes/sidebar.php"); ?>

        <div id="page-wrapper">
            <div class="container-fluid">

                <?php
                
                    if(isset($_GET['panel'])){
                    
                        include("panel.php");
                    
                } if(isset($_GET['insertar_productos'])){

                    include("insertar_producto.php");

                }
          
                   if(isset($_GET['ver_producto'])){
                    
                    include("ver_producto.php");
                    
                }   if(isset($_GET['borrar_producto'])){
                    
                    include("borrar_producto.php");
                    
                }   if(isset($_GET['editar_producto'])){
                    
                    include("editar_producto.php");
                    
                }     
                  if(isset($_GET['ver_p_cats'])){
                    
                    include("ver_p_cats.php");
                    
                }    if(isset($_GET['insertar_p_cat'])){
                    
                    include("insertar_p_cat.php");
                    
                }  
                if(isset($_GET['eliminar_p_cat'])){
                        
                    include("eliminar_p_cat.php");
                    
                }  if(isset($_GET['editar_p_cat'])){
                            
                    include("editar_p_cat.php");
                        
                } if(isset($_GET['insertar_cat'])){
                                
                    include("insertar_cat.php");

                } if(isset($_GET['ver_cat'])){
                        
                    include("ver_cat.php");

                } if(isset($_GET['editar_cat'])){
                                    
                    include("editar_cat.php");
                    
                }  if(isset($_GET['borrar_cat'])){
                                        
                        include("borrar_cat.php");
                    
                } if(isset($_GET['insertar_slide'])){
                                        
                    include("insertar_slide.php");
                                
                }if(isset($_GET['ver_slides'])){
                                            
                    include("ver_slides.php");
                }
                if(isset($_GET['borrar_slide'])){
                                            
                    include("borrar_slide.php");

                    
                }if(isset($_GET['editar_slide'])){
                                            
                    include("editar_slide.php");

                    
                }
                if(isset($_GET['ver_clientes'])){
                        
                     include("ver_clientes.php");
                    
                 }   if(isset($_GET['borrar_clientes'])){
                    
                    include("borrar_cliente.php");
                    
                 }   if(isset($_GET['ver_ordenes'])){
                    
                    include("ver_ordenes.php");
                    
                    }   if(isset($_GET['borrar_orden'])){
                    
                    include("borrar_orden.php");
                    
                    }  if(isset($_GET['ver_pagos'])){
                        
                        include("ver_pagos.php");
                        
                }   if(isset($_GET['borrar_pago'])){
                        
                        include("borrar_pago.php");
                        
                }          if(isset($_GET['ver_user'])){
                    
                    include("ver_user.php");
                    
                    }
                    if(isset($_GET['borrar_user'])){
        
                        include("borrar_user.php");
                        
                        }
                        if(isset($_GET['insertar_user'])){
        
                            include("insertar_user.php");
                            
                            }
                            if(isset($_GET['perfil_admin'])){
        
                                include("perfil_admin.php");
                                
                                }

                          if(isset($_GET['insertar_caja'])){
                        
                                include("insertar_caja.php");
                                
                        }   if(isset($_GET['ver_cajas'])){
                                
                                include("ver_cajas.php");
                                
                        }   if(isset($_GET['borrar_caja'])){
                                
                                include("borrar_caja.php");
                                
                        }   if(isset($_GET['editar_caja'])){
                                
                                include("editar_caja.php");
                                
                     }
                       if(isset($_GET['insertar_cupon'])){
                        
                        include("insertar_cupon.php");
                        
                }   if(isset($_GET['ver_cupones'])){
                        
                        include("ver_cupones.php");
                        
                }   if(isset($_GET['borrar_cupon'])){
                        
                        include("borrar_cupon.php");
                        
                }   if(isset($_GET['editar_cupon'])){
                        
                        include("editar_cupon.php");
                        
                 }
                  if(isset($_GET['insertar_var'])){
                        
                        include("insertar_var.php");
                        
                }
                if(isset($_GET['ver_var'])){
                                
                        include("ver_var.php");
                        
                }   if(isset($_GET['borrar_var'])){
                        
                        include("borrar_var.php");
                        
                }   if(isset($_GET['editar_variante'])){
                        
                        include("editar_variante.php");
                }
                if(isset($_GET['grafica'])){
                        
                    include("grafica.php");
            }
                ?>

            </div>
        </div>
    </div>

<script src="js/jquery-331.min.js"></script>
<script src="js/bootstrap-337.min.js"></script>
</body>
</html>
<?php }?>