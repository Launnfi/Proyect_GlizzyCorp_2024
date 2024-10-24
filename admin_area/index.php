<?php
session_start();
include("includes/db.php");

// Verificar si el administrador ha iniciado sesión
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
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
</head>
<body>
    
    <div id="wrapper"><!-- wrapper e -->

    <?php include ("includes/sidebar.php"); ?>

        <div id="page-wrapper">
            <div class="container-fluid">

                <?php
                
                    if(isset($_GET['panel'])){
                    
                        include("panel.php");
                    
                } if(isset($_GET['insertar_productos'])){

                    include("insertar_producto.php");

                }
            
                ?>

            </div>
        </div>
    </div><!-- wrapper t -->

<script src="js/jquery-331.min.js"></script>
<script src="js/bootstrap-337.min.js"></script>
</body>
</html>}
<?php }?>