<?php 

$db = mysqli_connect("localhost","root","","vicentita");


//Funcion que obtiene la Ip real del usuario, conisderando que pueda estar detras de un proxy
function getRealIpUser(){
    switch(true){

        // Si el índice 'HTTP_X_REAL_IP' de $_SERVER no está vacío, devolvemos esa IP
        case(!empty($_SERVER['HTTP_X_REAL_IP']))  : return $_SERVER['HTTP_X_REAL_IP'];

        // Si el índice 'HTTP_X_CLIENT_IP' de $_SERVER no está vacío, devolvemos esa IP
        case(!empty($_SERVER['HTTP_X_CLIENT_IP']))  : return $_SERVER['HTTP_X_CLIENT_IP'];

        // Si el índice 'HTTP_X_FORWARDED_FOR' de $_SERVER no está vacío, devolvemos esa IP
        case(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  : return $_SERVER['HTTP_X_FORWARDED_FOR'];

        // Si ninguna de las opciones anteriores tiene valor, devolvemos la IP en 'REMOTE_ADDR'
        default : return $_SERVER['REMOTE_ADDR'];


    }
    
    
} //esta afuncion está diseñada para obtener la IP real del usuario, 
//incluso si este está detrás de un proxy, lo que mejora la precisión de la información recolectada.

//Funcion que agrega productos al carrito
function add_cart(){
    global $db;

    // Verificamos si el formulario ha enviado un 'pro_id' (el ID del producto)
    if(isset($_POST['pro_id'])){

        //obtenemos la ip real del usuario mediante la funcion
        $ip_add = getRealIpUser();

        //guardamos en variables los datos enviados por el formulario
        $p_id = $_POST['pro_id'];
        $cant = $_POST['cant']; 
        $talle = $_POST['talle'];
    
        //Consulta que verifica si el prodcto ya se encuentra en el carrito
        $check_product = "SELECT * FROM cart WHERE ip_add='$ip_add' AND p_id='$p_id'";
        #echo "SELECT * FROM cart WHERE ip_add='$ip_add' AND p_id='$p_id'";
        //Ejecta la consulta
        $run_check = mysqli_query($db, $check_product);
        
        //Si ya existe una fila en la base de datos con este carrito
        if(mysqli_num_rows($run_check) > 0){
            //Muestra un mensaje si el producto ya esta en el carrito y redirije a la pagina de detalles
            echo "<script>alert('Este producto ya ha sido añadido al carrito');</script>";
            echo "<script>window.open('details.php?pro_id=$p_id','_self');</script>";
        } else {
            //Si el producto no esta en el carrito se ejecuta la siguiente consulta
            $query = "INSERT INTO cart (p_id, ip_add, cant, talle) VALUES ('$p_id', '$ip_add', '$cant', '$talle')";
            // Ejecutamos la consulta de inserción
            $run_query = mysqli_query($db, $query);

            //si la consulta se ejecuta correctamente 
            if ($run_query) {
                echo "<script>alert('Producto añadido al carrito');</script>";
                echo "<script>window.open('details.php?pro_id=$p_id','_self');</script>";
            } else {
                echo "Error al añadir el producto: " . mysqli_error($db);
            }
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
        
        $pro_img1 = $row_products['producto_img1'];
        
        //imprime el html para mostrar los productos en la pagina
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

         // Imprimimos el HTML para mostrar las categorías de productos en la página
        echo "
            <li> 
                <a href='tienda.php?p_cat=$p_cat_id'> $p_cat_titulo </a> 
            </li>
            ";
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

        // Consulta SQL para obtener la información de la categoría de productos
        $get_p_cat ="SELECT * from productos_categorias where p_cat_id = '$p_cat_id'";
        
        $run_p_cat = mysqli_query($db,$get_p_cat);
        
        $row_p_cat = mysqli_fetch_array($run_p_cat);
        
        // Obtenemos el título y la descripción de la categoría de productos
        $p_cat_titulo = $row_p_cat['p_cat_titulo'];
        
        $p_cat_desc = $row_p_cat['p_cat_desc'];
        
        // Consulta SQL para obtener los productos pertenecientes a la categoría seleccionada
        $get_productos ="SELECT * from productos where p_cat_id='$p_cat_id'";
        
        $run_productos = mysqli_query($db,$get_productos); //Ejecutamos la consulta
        
        //contamos el numero de productos en la categoria
        $cont = mysqli_num_rows($run_productos);
        
        //Si no hay productos en la categoria mostrara el proximo mensaje
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
            
             // Obtenemos los detalles de cada producto
            $pro_id = $row_products['producto_id'];
        
            $pro_titulo = $row_products['producto_titulo'];
        
            $pro_precio = $row_products['producto_precio'];
        
            $pro_img1 = $row_products['producto_img1'];

            // Genera el HTML para mostrar cada producto con su imagen, título, precio y botones
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

            //Genera el html para mostrar titulo, precio, descripcion y imagen
            echo "
            
                <div class='col-md-4 col-sm-6 center-responsive'>
                                    
                    <div class='product'>
                                        
                        <a href='details.php?pro_id=$pro_id'>
                                            
                            <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                                            
                        </a>
                                            
                        <div class='text'>
                                            
                            <h3>
                                                
                                <a href='details.php?pro_id=$pro_id'> $pro_titulo </a>
                                                
                            </h3>
                                            
                        <p class='price'>

                            $$pro_precio

                        </p>

                            <p class='buttons'>

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

// Función para contar el número de productos en el carrito del usuario actual
function items(){
    global $db;

    //obtiene la ip real del usuario
    $ip_add = getRealIpUser();

    // Consulta SQL para obtener los productos en el carrito que coincidan con la IP del usuario
     $get_items = "SELECT * FROM cart WHERE ip_add = '$ip_add'";

    $run_items = mysqli_query($db, $get_items);

    $cont_items = mysqli_num_rows($run_items);
    
    // Mostramos la cantidad de productos en el carrito
    echo $cont_items;
}

// Función para calcular el monto total de los productos en el carrito del usuario
function mont_total(){

    global $db;

    //obtiene la ip real del usuario
    $ip_add = getRealIpUser();

    $total = 0;

    // Consulta SQL para obtener los productos en el carrito del usuario según su IP
    $selecc_cart = "SELECT * FROM cart WHERE ip_add = '$ip_add'";

    $run_cart = mysqli_query($db, $selecc_cart);

    // Recorremos los productos del carrito
    while($rec = mysqli_fetch_array($run_cart)){

        // Obtenemos el ID del producto y la cantidad del carrito
        $pro_id = $rec['p_id'];

        $pro_cant = $rec['cant'];

        // Consulta SQL para obtener los detalles del producto por su ID
        $get_precio = "SELECT * FROM productos WHERE producto_id = '$pro_id'";

        $run_precio = mysqli_query($db, $get_precio);


        // Recorremos los resultados de la consulta
        while($row_precio = mysqli_fetch_array($run_precio)){

            // Calculamos el subtotal multiplicando el precio del producto por la cantidad
            $sub_total = $row_precio['producto_precio'] * $pro_cant;

            $total += $sub_total; // Suma el subtotal al total general

        }
    }

    // Mostrar el total
    echo "$" . $total;
}