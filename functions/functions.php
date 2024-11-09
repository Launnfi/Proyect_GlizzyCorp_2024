<?php 

$db = mysqli_connect("localhost","root","","vicentita");
   
//agrega al carrito
function add_cart(){
    global $db;

    // Verificamos si el formulario ha enviado un 'pro_id' (el ID del producto)
    if(isset($_POST['pro_id'])){

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
    
        // Consulta que verifica si el producto con el mismo ID, talle y cliente ya está en el carrito
        $check_product = "SELECT * FROM cart WHERE cliente_id='$cliente_id' AND p_id='$p_id' AND talle='$talle'";
        $run_check = mysqli_query($db, $check_product);
        
        // Si ya existe una fila en la base de datos con este carrito y el mismo talle
        if(mysqli_num_rows($run_check) > 0){
            // Si el producto con el mismo talle ya está en el carrito, actualizamos la cantidad
            $row = mysqli_fetch_array($run_check);
            $new_cant = $row['cant'] + $cant; // Sumamos la cantidad
            $update_query = "UPDATE cart SET cant='$new_cant' WHERE p_id='$p_id' AND talle='$talle' AND cliente_id='$cliente_id'";
            $run_update = mysqli_query($db, $update_query);

            echo "<script>alert('La cantidad del producto ha sido actualizada en el carrito');</script>";
            echo "<script>window.open('details.php?pro_id=$p_id','_self');</script>";
        } else {
            // Si no existe el producto con ese talle en el carrito, lo insertamos como una nueva fila
            $get_price = "SELECT * FROM productos WHERE producto_id='$p_id'";
            $run_price = mysqli_query($db, $get_price);
            $row_price = mysqli_fetch_array($run_price);

            $pro_price = $row_price['producto_precio'];
            $pro_sale = $row_price['producto_oferta'];
            $pro_label = $row_price['producto_etiqueta'];

            // Determinar el precio final del producto (considerando oferta)
            if($pro_label == "sale"){
                $product_price = $pro_sale;
            } else {
                $product_price = $pro_price;
            }
            
            // Insertamos el nuevo producto con el talle en el carrito
            $query = "INSERT INTO cart (p_id, cliente_id, cant, p_precio, talle) VALUES ('$p_id', '$cliente_id', '$cant', '$product_price', '$talle')";
            $run_query = mysqli_query($db, $query);
            
            echo "<script>window.open('details.php?pro_id=$p_id','_self');</script>";
        }
    }
}


//Funcion que obtiene y muestra los productos en la tabla "productos"
function getPro(){
    
    global $db;

    // Consulta SQL para obtener todos los productos ordenados de manera descendente (los más recientes primero)
    // Limitando el resultado a los primeros 8 productos
    $get_productos = "SELECT * from productos order by 1 DESC LIMIT 0,8"; 
    
    //Ejecuta la consulta
    $run_productos = mysqli_query($db,$get_productos);
    
    //recorre los resultados de la consulta
    while($row_products=mysqli_fetch_array($run_productos)){
        
        // Asignamos los valores de cada producto a variables locales
        $pro_id = $row_products['producto_id'];
        
        $pro_titulo = $row_products['producto_titulo'];
        
        $pro_precio = $row_products['producto_precio'];

        $pro_sale_price = $row_products['producto_oferta'];
        
        $pro_img1 = $row_products['producto_img1'];

        $pro_label = $row_products['producto_etiqueta'];

        $pro_activo = $row_products['activo'];
        
        
        //imprime el html para mostrar los productos en la pagina
        if($pro_label == "sale"){

            $product_price = " <del> $ $pro_precio </del> ";

            $product_sale_price = "/ $ $pro_sale_price ";

        }else{

            $product_price = "  $ $pro_precio  ";

            $product_sale_price = "";

        }

        if($pro_label == ""){

        }else{

            $product_label = "
            
                <a href='#' class='label $pro_label'>
                
                    <div class='theLabel'> $pro_label </div>
                    <div class='labelBackground'>  </div>
                
                </a>
            
            ";

        }
        
        if($pro_activo == 0){
        
        }else{

        
        echo "
        
        <div class='col-md-4 col-sm-6 single'>
        
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
                    
                    $product_price &nbsp;$product_sale_price
                    
                    </p>
                    
                    <p class='button'>
                    
                        <a class='btn btn-default' href='details.php?pro_id=$pro_id'>

                            View Details

                        </a>
                    
                        <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>

                            <i class='fa fa-shopping-cart'></i> Add to Cart

                        </a>
                    
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

    // Verifica si en la URL está presente el parámetro 'p_cat' (categoría de productos)
    if(isset($_GET['p_cat'])){
        
         // Obtiene el ID de la categoría de productos desde la URL
        $p_cat_id = $_GET['p_cat'];

        $get_p_cat ="SELECT * from productos_categorias where p_cat_id = '$p_cat_id'";
        
        $run_p_cat = mysqli_query($db,$get_p_cat);
        
        $row_p_cat = mysqli_fetch_array($run_p_cat);
        
        $p_cat_titulo = $row_p_cat['p_cat_titulo'];
        
        $p_cat_desc = $row_p_cat['p_cat_desc'];
        
        $get_productos ="SELECT * from productos where p_cat_id='$p_cat_id'";
        
        $run_productos = mysqli_query($db,$get_productos); //Ejecutamos la consulta
        
        $cont = mysqli_num_rows($run_productos);
        
        if($cont==0){
            
            echo "
            
                <div class='box'>
                
                    <h1> No hay productos en esta categoria aun </h1>
                
                </div>
            
            ";
            
        }else{
            //Si hay productos en la categoria mostrara lo siguiente
            echo "
            
                <div class='box'>
                
                    <h1> $p_cat_titulo </h1>
                    
                    <p> $p_cat_desc </p>
                
                </div>
            
            ";
            
        }
         // Recorremos todos los productos obtenidos de la consulta
        while($row_products = mysqli_fetch_array($run_productos)){
            
            $pro_id = $row_products['producto_id'];
        
            $pro_titulo = $row_products['producto_titulo'];
            
            $pro_precio = $row_products['producto_precio'];
    
            $pro_sale_price = $row_products['producto_oferta'];
            
            $pro_img1 = $row_products['producto_img1'];
    
            $pro_label = $row_products['producto_etiqueta'];
    
            $pro_activo = $row_products['activo'];
            
            
            //imprime el html para mostrar los productos en la pagina
            if($pro_label == "sale"){
    
                $product_price = " <del> $ $pro_precio </del> ";
    
                $product_sale_price = "/ $ $pro_sale_price ";
    
            }else{
    
                $product_price = "  $ $pro_precio  ";
    
                $product_sale_price = "";
    
            }
    
            if($pro_label == ""){
    
            }else{
    
                $product_label = "
                
                    <a href='#' class='label $pro_label'>
                    
                        <div class='theLabel'> $pro_label </div>
                        <div class='labelBackground'>  </div>
                    
                    </a>
                
                ";
    
            }
            
            if($pro_activo == 0){
            
            }else{
    
            
            echo "
            
            <div class='col-md-4 col-sm-6 single'>
            
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
                        
                        $product_price &nbsp;$product_sale_price
                        
                        </p>
                        
                        <p class='button'>
                        
                            <a class='btn btn-default' href='details.php?pro_id=$pro_id'>
    
                                View Details
    
                            </a>
                        
                            <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
    
                                <i class='fa fa-shopping-cart'></i> Add to Cart
    
                            </a>
                        
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

    // Verificamos si la URL tiene el parámetro 'cat', que es el ID de la categoría general
    if(isset($_GET['cat'])){
        
        // Guardamos el ID de la categoría general en una variable
        $cat_id = $_GET['cat'];
        
        // Consulta SQL para obtener los detalles de la categoría por su ID
        $get_cat = "SELECT * from categorias where cat_id='$cat_id'";
        
        $run_cat = mysqli_query($db,$get_cat);
        
        // Guardamos los resultados de la consulta en un array
        $row_cat = mysqli_fetch_array($run_cat);
        
        $cat_titulo = $row_cat['cat_titulo'];
        
        $cat_desc = $row_cat['cat_desc'];

        // Consulta SQL para obtener los productos pertenecientes a la categoría seleccionada (limitando a los primeros 6)
        $get_cat = "SELECT * from productos where cat_id='$cat_id' LIMIT 0,6";
        
        $run_products = mysqli_query($db,$get_cat);
        
         // Contamos el número de productos en la categoría
        $count = mysqli_num_rows($run_products);
        
        //Si no hay productos mostrara el siguiente mensaje
        if($count==0){
            
            
            echo "
            
                <div class='box'>
                
                    <h1> Aun no hay productos en esta categoria </h1>
                
                </div>
            
            ";
            
        }else{
            // Si hay productos, mostramos el título y la descripción de la categoría
            echo "
            
                <div class='box'>
                
                    <h1> $cat_titulo </h1>
                    
                    <p> $cat_desc </p>
                
                </div>
            
            ";
            
        }
         // Recorremos todos los productos obtenidos de la consulta
        while($row_products=mysqli_fetch_array($run_products)){
            
            // Obtenemos los detalles de cada producto
            $pro_id = $row_products['producto_id'];
            
            $pro_titulo = $row_products['producto_titulo'];
            
            $pro_precio = $row_products['producto_precio'];
            
            $pro_desc = $row_products['producto_desc'];
            
            $pro_img1 = $row_products['producto_img1'];

            $pro_activo = $row_products['activo'];

    
            if($pro_activo == 1){

            
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

        // Usamos una sentencia preparada para evitar inyección SQL
        if ($stmt = mysqli_prepare($db, $get_cliente_id)) {
            // Vincula el parámetro de cliente_email
            mysqli_stmt_bind_param($stmt, "s", $cliente_email);

            // Ejecuta la consulta
            mysqli_stmt_execute($stmt);

            // Obtiene el resultado de la consulta
            $result = mysqli_stmt_get_result($stmt);

            // Verificamos si el cliente existe
            if (mysqli_num_rows($result) > 0) {
                // Obtener el cliente_id
                $row = mysqli_fetch_assoc($result);
                $cliente_id = $row['cliente_id'];

                // Inicializamos el total
                $total = 0;

                // Ahora que tenemos el cliente_id, buscamos los productos en el carrito
                $selecc_cart = "SELECT * FROM cart WHERE cliente_id = ?";

                // Realizamos la consulta para obtener los productos del carrito
                if ($stmt_cart = mysqli_prepare($db, $selecc_cart)) {
                    // Vincula el parámetro de cliente_id
                    mysqli_stmt_bind_param($stmt_cart, "i", $cliente_id);

                    // Ejecuta la consulta
                    mysqli_stmt_execute($stmt_cart);

                    // Obtiene el resultado de la consulta
                    $result_cart = mysqli_stmt_get_result($stmt_cart);

                    // Recorremos los productos del carrito
                    while ($rec = mysqli_fetch_array($result_cart)) {
                        // Obtenemos el ID del producto y la cantidad del carrito
                        $pro_id = $rec['p_id'];
                        $pro_cant = $rec['cant'];

                        // Consulta SQL para obtener los detalles del producto por su ID
                        $get_precio = "SELECT * FROM productos WHERE producto_id = '$pro_id'";

                        $run_precio = mysqli_query($db, $get_precio);

                        // Recorremos los resultados de la consulta
                        while ($row_precio = mysqli_fetch_array($run_precio)) {
                            // Calculamos el subtotal multiplicando el precio del producto por la cantidad
                            $sub_total = $row_precio['producto_precio'] * $pro_cant;

                            // Suma el subtotal al total general
                            $total += $sub_total;
                        }
                    }

                    // Mostrar el total
                    echo "$" . $total;

                    // Cierra la sentencia preparada
                    mysqli_stmt_close($stmt_cart);
                } 
            }
        }
    }
}
