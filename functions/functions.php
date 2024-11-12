<?php 

$db = mysqli_connect("localhost","root","","vicentita");
   
//agrega al carrito
function add_cart(){
    global $db;

    // Verificamos si el formulario ha enviado un 'pro_id' (el ID del producto)
    if(isset($_POST['pro_id']) && isset($_POST['talle'])){

        // Verificamos si la sesión del cliente está iniciada con el email del cliente
        if(isset($_SESSION['cliente_email'])){
            // Obtenemos el email del cliente desde la sesión
            $cliente_email = $_SESSION['cliente_email'];

            // Consulta para obtener el ID del cliente basado en el email
            $get_cliente_id = "SELECT cliente_id FROM customer WHERE cliente_email='$cliente_email'";
            $run_cliente = mysqli_query($db, $get_cliente_id);
            if(mysqli_num_rows($run_cliente) > 0){
                $row_cliente = mysqli_fetch_array($run_cliente);
                $cliente_id = $row_cliente['cliente_id']; // Asignamos el cliente_id
            } else {
                // Si no se encuentra el cliente, redirigimos a login
                echo "<script>alert('No se ha encontrado el cliente. Por favor, inicia sesión nuevamente.');</script>";
                echo "<script>window.open('cerrar_sesion.php','_self');</script>";
                return; // Detenemos la ejecución si no encontramos el cliente
            }
        } else {
            // Si no está iniciada la sesión, redirigimos a login
            echo "<script>alert('Debes iniciar sesión para agregar productos al carrito');</script>";
            echo "<script>window.open('cerrar_sesion.php','_self');</script>";
            return; // Detener la ejecución si no está autenticado
        }

        // Guardamos en variables los datos enviados por el formulario
        $p_id = $_POST['pro_id'];
        $cant = $_POST['cant']; 
        $talle = $_POST['talle'];
    
        // Consultamos la tabla variantes para obtener el precio y var_id para el talle seleccionado
        $get_variant = "SELECT * FROM variantes WHERE producto_id='$p_id' AND talle='$talle'";
        $run_variant = mysqli_query($db, $get_variant);
        
        // Verificamos si encontramos la variante con ese talle
        if(mysqli_num_rows($run_variant) > 0){
            $row_variant = mysqli_fetch_array($run_variant);
            $var_id = $row_variant['var_id'];  // ID de la variante
            $price_var = $row_variant['precio_var']; // Precio de la variante
            
            // Consulta para verificar si el producto con el mismo ID de variante y cliente ya está en el carrito
            $check_product = "SELECT * FROM cart WHERE cliente_id='$cliente_id' AND var_id='$var_id'";
            $run_check = mysqli_query($db, $check_product);
            
            // Si ya existe una fila en la base de datos con este carrito y el mismo var_id
            if(mysqli_num_rows($run_check) > 0){
                // Si el producto con el mismo var_id ya está en el carrito, actualizamos la cantidad
                $row = mysqli_fetch_array($run_check);
                $new_cant = $row['cant'] + $cant; // Sumamos la cantidad
                $update_query = "UPDATE cart SET cant='$new_cant' WHERE var_id='$var_id' AND cliente_id='$cliente_id'";
                $run_update = mysqli_query($db, $update_query);

                echo "<script>alert('La cantidad del producto ha sido actualizada en el carrito');</script>";
                echo "<script>window.open('details.php?pro_id=$p_id','_self');</script>";
            } else {
                // Si no existe el producto con ese var_id en el carrito, lo insertamos como una nueva fila
                $query = "INSERT INTO cart (p_id, cliente_id, cant, p_precio, var_id, talle) VALUES ('$p_id', '$cliente_id', '$cant', '$price_var', '$var_id', '$talle')";
                $run_query = mysqli_query($db, $query);
                
                echo "<script>window.open('details.php?pro_id=$p_id','_self');</script>";
            }
        } else {
            // Si no se encuentra el talle en la tabla variantes
            echo "<script>alert('El talle seleccionado no está disponible para este producto.');</script>";
            echo "<script>window.open('details.php?pro_id=$p_id','_self');</script>";
        }
    }
}



//Funcion que obtiene y muestra los productos en la tabla "productos"
function getPro(){
    global $db;

    // Consulta SQL para obtener todos los productos, ordenados de manera descendente y limitados a los primeros 8 productos
    $get_productos = "SELECT * from productos order by 1 DESC LIMIT 0,8"; 
    $run_productos = mysqli_query($db, $get_productos);
    
    // Recorre los resultados de la consulta
    while($row_products = mysqli_fetch_array($run_productos)){
        $pro_id = $row_products['producto_id'];
        $pro_titulo = $row_products['producto_titulo'];
        $pro_img1 = $row_products['producto_img1'];
        $pro_label = $row_products['producto_etiqueta'];
        $pro_activo = $row_products['activo'];
        
        // Obtener el precio de la variante y el precio de oferta desde la tabla 'variantes'
        $get_variante = "SELECT * FROM variantes WHERE producto_id = '$pro_id' LIMIT 1"; // Obtiene la primera variante
        $run_variante = mysqli_query($db, $get_variante);
        $row_variante = mysqli_fetch_array($run_variante);

        $pro_precio_var = isset($row_variante['precio_var']) ? $row_variante['precio_var'] : "Precio no disponible";
        $pro_sale_price = isset($row_variante['var_precio_of']) ? $row_variante['var_precio_of'] : null;

        // Formatear el precio y el precio de oferta
        if($pro_sale_price) {
            $product_price = "<del> $ $pro_precio_var </del>";
            $product_sale_price = "/ $ $pro_sale_price";
        } else {
            $product_price = "$ $pro_precio_var";
            $product_sale_price = "";
        }

        // Etiqueta del producto si existe
        $product_label = $pro_label ? "
            <a href='#' class='label $pro_label'>
                <div class='theLabel'> $pro_label </div>
                <div class='labelBackground'></div>
            </a>" : '';

        // Verificar si el producto está activo antes de mostrarlo
        if($pro_activo == 1){
            echo "
            <div class='col-md-4 col-sm-6 single'>
                <div class='product'>
                    <a href='details.php?pro_id=$pro_id'>
                        <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                    </a>
                    <div class='text'>
                        <h3><a href='details.php?pro_id=$pro_id'>$pro_titulo</a></h3>
                        <p class='price'>$product_price $product_sale_price</p>
                        <p class='button'>
                            <a class='btn btn-default' href='details.php?pro_id=$pro_id'>View Details</a>
                            <a class='btn btn-primary' href='details.php?pro_id=$pro_id'><i class='fa fa-shopping-cart'></i> Add to Cart</a>
                        </p>
                    </div>
                    $product_label
                </div>
            </div>
            ";
        }
    }
}
//Funcion que obtiene y muestra las categorias del producto
function getPCats(){

    global $db;
    //Consulta que obtiene todas las categorias de producto
    $get_p_cats = " SELECT * FROM productos_categorias";
    
    //Ejecuta la consulta
    $run_p_cats = mysqli_query($db, $get_p_cats);

    //Recorre los resultados de la consulta
    while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {

        $p_cat_id = $row_p_cats['p_cat_id'];

        $p_cat_titulo = $row_p_cats['p_cat_titulo'];

        $p_cat_activo = $row_p_cats['activo'];

         if($p_cat_activo == 0){

         }else{

         
        echo "
            <li> 
                <a href='tienda.php?p_cat=$p_cat_id'> $p_cat_titulo </a> 
            </li>
            ";
    }
}
}
//Funcion que obtiene y muestra las categorias
function getCats(){

    global $db;

    //Consulta que obtiene todas las categorias
    $get_cats = " SELECT * FROM categorias";
    
    $run_cats = mysqli_query($db, $get_cats);

    //recorre los resultados de la consulta
    while ($row_cats = mysqli_fetch_array($run_cats)) {

        $cat_id = $row_cats['cat_id'];

        $cat_titulo = $row_cats['cat_titulo'];

        //imprime las categorias
        echo "
            <li> 
                <a href='tienda.php?cat=$cat_id'> $cat_titulo </a> 
            </li>
            ";
    }
}
// Función para obtener y mostrar los productos de una categoría de productos específica
function getPCatpro(){
    global $db;

    if(isset($_GET['p_cat'])){
        $p_cat_id = $_GET['p_cat'];

        // Obtener los datos de la categoría de productos
        $get_p_cat = "SELECT * from productos_categorias where p_cat_id = '$p_cat_id'";
        $run_p_cat = mysqli_query($db, $get_p_cat);
        $row_p_cat = mysqli_fetch_array($run_p_cat);

        $p_cat_titulo = $row_p_cat['p_cat_titulo'];
        $p_cat_desc = $row_p_cat['p_cat_desc'];
        
        // Obtener los productos en la categoría
        $get_productos = "SELECT * from productos where p_cat_id='$p_cat_id'";
        $run_productos = mysqli_query($db, $get_productos);
        $cont = mysqli_num_rows($run_productos);

        if($cont == 0){
            echo "
                <div class='box'>
                    <h1> No hay productos en esta categoria aun </h1>
                </div>
            ";
        } else {
            echo "
                <div class='box'>
                    <h1> $p_cat_titulo </h1>
                    <p> $p_cat_desc </p>
                </div>
            ";
        }

        while($row_products = mysqli_fetch_array($run_productos)){
            $pro_id = $row_products['producto_id'];
            $pro_titulo = $row_products['producto_titulo'];
            $pro_img1 = $row_products['producto_img1'];
            $pro_label = $row_products['producto_etiqueta'];
            $pro_activo = $row_products['activo'];

            // Obtener el precio de la variante desde la tabla 'variantes'
            $get_variante = "SELECT * FROM variantes WHERE producto_id = '$pro_id' LIMIT 1"; // Obtener la primera variante
            $run_variante = mysqli_query($db, $get_variante);
            $row_variante = mysqli_fetch_array($run_variante);

            // Obtener el precio de la variante 'precio_var'
            $pro_precio_var = isset($row_variante['precio_var']) ? $row_variante['precio_var'] : null;

            // Si no existe 'precio_var', mostrar un mensaje o un precio predeterminado
            if($pro_precio_var === null) {
                $pro_precio_var = "Precio no disponible";
            }

            // Si existe una oferta (campo 'var_precio_of'), lo mostramos
            $pro_sale_price = isset($row_variante['var_precio_of']) ? $row_variante['var_precio_of'] : null;

            // Formato para el precio de oferta si existe
            if($pro_sale_price) {
                $product_price = "<del> $ $pro_precio_var </del>";
                $product_sale_price = "/ $ $pro_sale_price";
            } else {
                $product_price = "$ $pro_precio_var";
                $product_sale_price = "";
            }

            // Etiqueta de oferta si existe
            $product_label = $pro_label ? "
                <a href='#' class='label $pro_label'>
                    <div class='theLabel'> $pro_label </div>
                    <div class='labelBackground'></div>
                </a>" : '';

            if($pro_activo == 1){
                echo "
                <div class='col-md-4 col-sm-6 single'>
                    <div class='product'>
                        <a href='details.php?pro_id=$pro_id'>
                            <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                        </a>
                        <div class='text'>
                            <h3><a href='details.php?pro_id=$pro_id'>$pro_titulo</a></h3>
                            <p class='price'>$product_price $product_sale_price</p>
                            <p class='button'>
                                <a class='btn btn-default' href='details.php?pro_id=$pro_id'>Ver detalles</a>
                                <a class='btn btn-primary' href='details.php?pro_id=$pro_id'><i class='fa fa-shopping-cart'></i> Añadir al carrito</a>
                            </p>
                        </div>
                        $product_label
                    </div>
                </div>
                ";
            }
        }
    }
}



// Función para obtener los productos de una categoría general específica
function getcatpro(){
    global $db;

    if(isset($_GET['cat'])){
        $cat_id = $_GET['cat'];
        
        $get_cat = "SELECT * from categorias where cat_id='$cat_id'";
        $run_cat = mysqli_query($db, $get_cat);
        $row_cat = mysqli_fetch_array($run_cat);
        
        $cat_titulo = $row_cat['cat_titulo'];
        $cat_desc = $row_cat['cat_desc'];

        $get_cat_products = "SELECT * from productos where cat_id='$cat_id' LIMIT 0,6";
        $run_products = mysqli_query($db, $get_cat_products);
        
        $count = mysqli_num_rows($run_products);
        
        if($count == 0){
            echo "
                <div class='box'>
                    <h1> Aun no hay productos en esta categoria </h1>
                </div>
            ";
        } else {
            echo "
                <div class='box'>
                    <h1> $cat_titulo </h1>
                    <p> $cat_desc </p>
                </div>
            ";
        }

        while($row_products = mysqli_fetch_array($run_products)){
            $pro_id = $row_products['producto_id'];
            $pro_titulo = $row_products['producto_titulo'];
            $pro_desc = $row_products['producto_desc'];
            $pro_img1 = $row_products['producto_img1'];
            $pro_activo = $row_products['activo'];

            if($pro_activo == 1){
                // Consulta para obtener el precio mínimo de las variantes
                $get_precio_var = "SELECT MIN(precio_var) as precio_minimo FROM variantes WHERE producto_id = '$pro_id'";
                $run_precio_var = mysqli_query($db, $get_precio_var);
                $row_precio_var = mysqli_fetch_array($run_precio_var);
                
                // Usamos el precio mínimo de la variante
                $pro_precio = $row_precio_var['precio_minimo'];

                echo " 
                    <div class='col-md-4 col-sm-6 center-responsive'>
                        <div class='product'>
                            <a href='details.php?pro_id=$pro_id'>
                                <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                            </a>
                            <div class='text'>
                                <h3>
                                    <a href='details.php?pro_id=$pro_id'>
                                        $pro_titulo
                                    </a>
                                </h3>
                                <p class='price'>
                                    $ $pro_precio
                                </p>
                                <p class='button'>
                                    <a class='btn btn-default' href='details.php?pro_id=$pro_id'>
                                        Ver detalles
                                    </a>
                                    <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
                                        <i class='fa fa-shopping-cart'></i> Añadir al carrito
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                ";
            }
        }
    }
}


// Función para contar el número de productos en el carrito del usuario actual
function items() {
    global $db;

    // Verificar si el cliente ha iniciado sesión y obtener su email desde la sesión
    if (isset($_SESSION['cliente_email'])) {
        $cliente_email = $_SESSION['cliente_email'];

        // Obtener el cliente_id a partir del cliente_email
        $get_cliente_id = "SELECT cliente_id FROM customer WHERE cliente_email = ?";

        // Usamos una sentencia preparada para evitar inyección SQL
        if ($stmt = mysqli_prepare($db, $get_cliente_id)) {

            mysqli_stmt_bind_param($stmt, "s", $cliente_email);

            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) > 0) {
                // Obtiene el cliente_id
                $row = mysqli_fetch_assoc($result);
                $cliente_id = $row['cliente_id'];

                // Ahora que tenemos el cliente_id, buscamos los productos en el carrito
                $get_items = "SELECT * FROM cart WHERE cliente_id = ?";

                // Realizamos la consulta para obtener los productos del carrito
                if ($stmt_items = mysqli_prepare($db, $get_items)) {
                    // Vincula el parámetro de cliente_id
                    mysqli_stmt_bind_param($stmt_items, "i", $cliente_id);

                    // Ejecuta la consulta
                    mysqli_stmt_execute($stmt_items);

                    // Obtiene el resultado de la consulta
                    $result_items = mysqli_stmt_get_result($stmt_items);

                    // Cuenta los productos en el carrito
                    $cont_items = mysqli_num_rows($result_items);

                    // Muestra la cantidad de productos en el carrito
                    echo $cont_items;

                    // Cierra la sentencia preparada
                    mysqli_stmt_close($stmt_items);
                } else {
                    // Si hubo un error al preparar la consulta de los productos
                    echo "Error al preparar la consulta de productos.";
                }
            } else {
                echo "No se encontró el cliente en la base de datos.";
            }

            // Cierra la sentencia preparada
            mysqli_stmt_close($stmt);
        } else {
            // Si hubo un error en la preparación de la consulta para obtener el cliente_id
            echo "Error al preparar la consulta para obtener el cliente_id.";
        }
    } else {
        // Si no hay sesión iniciada, el cliente no está autenticado
        echo "0";
    }
}
// Función para calcular el monto total de los productos en el carrito del usuario
function mont_total() {
    global $db;

    // Verificar si el cliente ha iniciado sesión y obtener su email desde la sesión
    if (isset($_SESSION['cliente_email'])) {
        $cliente_email = $_SESSION['cliente_email'];

        // Obtener el cliente_id a partir del cliente_email
        $get_cliente_id = "SELECT cliente_id FROM customer WHERE cliente_email = ?";
        if ($stmt = mysqli_prepare($db, $get_cliente_id)) {
            mysqli_stmt_bind_param($stmt, "s", $cliente_email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $cliente_id = $row['cliente_id'];

                $total = 0;

                // Obtener los productos en el carrito
                $selecc_cart = "SELECT * FROM cart WHERE cliente_id = ?";
                if ($stmt_cart = mysqli_prepare($db, $selecc_cart)) {
                    mysqli_stmt_bind_param($stmt_cart, "i", $cliente_id);
                    mysqli_stmt_execute($stmt_cart);
                    $result_cart = mysqli_stmt_get_result($stmt_cart);

                    while ($rec = mysqli_fetch_array($result_cart)) {
                        $pro_id = $rec['p_id'];
                        $pro_cant = $rec['cant'];
                        $pro_talle = $rec['talle']; // Asumimos que tienes la talla en el carrito

                        // Obtener el precio de la variante desde la tabla 'variantes'
                        $get_precio_var = "SELECT precio_var FROM variantes WHERE producto_id = ? AND talle = ? LIMIT 1";
                        if ($stmt_precio_var = mysqli_prepare($db, $get_precio_var)) {
                            mysqli_stmt_bind_param($stmt_precio_var, "is", $pro_id, $pro_talle);
                            mysqli_stmt_execute($stmt_precio_var);
                            $result_precio_var = mysqli_stmt_get_result($stmt_precio_var);

                            if ($row_precio_var = mysqli_fetch_assoc($result_precio_var)) {
                                // Usar el precio de la variante
                                $precio_var = $row_precio_var['precio_var'];
                                $sub_total = $precio_var * $pro_cant;
                                $total += $sub_total;
                            }
                            mysqli_stmt_close($stmt_precio_var);
                        }
                    }

                    // Mostrar el total
                    echo "$" . $total;
                    mysqli_stmt_close($stmt_cart);
                }
            }
        }
    }
}
