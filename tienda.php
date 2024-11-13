<?php 
$active = "Comprar";
include("includes/header.php");
?>

<div id="content">
    <div class="container">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="index.php">Inicio</a></li>
                <li>Tienda</li>
            </ul>
        </div>
        
        <div class="col-md-3">
            <?php include("includes/sidebar.php"); ?>
        </div>
        
        <div class="col-md-9">
            <?php
            if(!isset($_GET['p_cat']) && !isset($_GET['cat'])) {
                echo "
                <div class='box'>
                    <h1>Tienda</h1>
                    <p>En este apartado encontraras todo tipo de articulos para nenas, varónes y recien nacidos.</p>
                </div>
                ";
            }
            ?>

            <div class="row">
                <?php
                if(!isset($_GET['p_cat']) && !isset($_GET['cat'])) {
                    $per_page = 6;
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $start_from = ($page - 1) * $per_page;
                    
                    $get_products = "SELECT * FROM productos ORDER BY 1 DESC LIMIT $start_from, $per_page";
                    $run_products = mysqli_query($db, $get_products);
                    
                    while($row_products = mysqli_fetch_array($run_products)) {
                        $pro_id = $row_products['producto_id'];
                        $pro_title = $row_products['producto_titulo'];
                        $pro_img1 = $row_products['producto_img1'];
                        $pro_label = $row_products['producto_etiqueta'];
                        $pro_activo = $row_products['activo'];
                        
                        // Obtener el precio de la variante y el precio de oferta
                        $get_variante = "SELECT * FROM variantes WHERE producto_id = '$pro_id' LIMIT 1";
                        $run_variante = mysqli_query($db, $get_variante);
                        $row_variante = mysqli_fetch_array($run_variante);
                        
                        $pro_price_var = isset($row_variante['precio_var']) ? $row_variante['precio_var'] : "N/A";
                        $pro_sale_price = isset($row_variante['var_precio_of']) ? $row_variante['var_precio_of'] : null;

                        // Configurar los precios para mostrar
                        if($pro_sale_price) {
                            $product_price = "<del> $ $pro_price_var </del>";
                            $product_sale_price = "/ $ $pro_sale_price";
                        } else {
                            $product_price = "$ $pro_price_var";
                            $product_sale_price = "";
                        }

                        // Generar la etiqueta del producto si existe
                        $product_label = $pro_label ? "
                            <a href='#' class='label $pro_label'>
                                <div class='theLabel'> $pro_label </div>
                                <div class='labelBackground'></div>
                            </a>" : '';

                        // Mostrar solo si el producto está activo
                        if($pro_activo == 1) {
                            echo "
                            <div class='col-md-4 col-sm-6 center-responsive'>
                                <div class='product'>
                                    <a href='details.php?pro_id=$pro_id'>
                                        <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                                    </a>
                                    <div class='text'>
                                        <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                                        <p class='price'>$product_price $product_sale_price</p>
                                        <p class='button'>
                                            <a class='btn btn-default' href='details.php?pro_id=$pro_id'>View Details</a>
                                            <a class='btn btn-primary' href='details.php?pro_id=$pro_id'><i class='fa fa-shopping-cart'></i> Add to Cart</a>
                                        </p>
                                    </div>
                                    $product_label
                                </div>
                            </div>";
                        }
                    }
                }
                getcatpro();
                ?> 
                
            </div>
            <?php
            $per_page = 6; // Número de productos por página

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$start_from = ($page - 1) * $per_page;

// Consulta para obtener productos
$query = "SELECT * FROM productos";
$resultado = mysqli_query($db, $query);
$total_rec = mysqli_num_rows($resultado);
$total_pag = ceil($total_rec / $per_page); // Calcula el total de páginas

?>

<!-- Paginación -->
<center>
    <ul class="pagination">
        <?php
        // Páginas de la paginación
        echo "<li><a href='tienda.php?page=1'>Página Inicio</a></li>";

        for ($i = 1; $i <= $total_pag; $i++) {
            echo "<li><a href='tienda.php?page=$i'>$i</a></li>";
        }

        echo "<li><a href='tienda.php?page=$total_pag'>Última casilla</a></li>";
        ?>
    </ul>
</center>

            <?php getPCatpro(); ?>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>

<script src="js/jquery-331.min.js"></script>
<script src="js/bootstrap-337.min.js"></script>

</body>
</html>
