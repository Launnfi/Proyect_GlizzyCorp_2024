<?php 

$db = mysqli_connect("localhost","root","","vicentita");

function getRealIpUser(){
    switch(true){

        case(!empty($_SERVER['HTTP_X_REAL_IP']))  : return $_SERVER['HTTP_X_REAL_IP'];

        case(!empty($_SERVER['HTTP_X_CLIENT_IP']))  : return $_SERVER['HTTP_X_CLIENT_IP'];

        case(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  : return $_SERVER['HTTP_X_FORWARDED_FOR'];

        default : return $_SERVER['REMOTE_ADDR'];


    }
    
    
}


function add_cart(){
    global $db;
    
    if(isset($_GET['add_cart'])){
        $ip_add = getRealIpUser();
        $p_id = $_GET['add_cart'];
        $product_qty = $_POST['cant']; // Coincidir con el nombre en el formulario
        $product_size = $_POST['talle']; // Coincidir con el nombre en el formulario
        
        $check_product = "SELECT * FROM cart WHERE ip_add='$ip_add' AND p_id='$p_id'";
        $run_check = mysqli_query($db, $check_product);
        
        if(mysqli_num_rows($run_check) > 0){
            echo "<script>alert('Este producto ya ha sido añadido al carrito');</script>";
            echo "<script>window.open('details.php?pro_id=$p_id','_self');</script>";
        } else {
            $query = "INSERT INTO cart (p_id, ip_add, qty, size) VALUES ('$p_id', '$ip_add', '$product_qty', '$product_size')";
            $run_query = mysqli_query($db, $query);
            
            if ($run_query) {
                echo "<script>alert('Producto añadido al carrito');</script>";
                echo "<script>window.open('details.php?pro_id=$p_id','_self');</script>";
            } else {
                echo "Error al añadir el producto: " . mysqli_error($db);
            }
        }
    }
}

function getPro(){
    
    global $db;
    
    $get_productos = "SELECT * from productos order by 1 DESC LIMIT 0,8"; 
    
    $run_productos = mysqli_query($db,$get_productos);
    
    while($row_products=mysqli_fetch_array($run_productos)){
        
        $pro_id = $row_products['producto_id'];
        
        $pro_titulo = $row_products['producto_titulo'];
        
        $pro_precio = $row_products['producto_precio'];
        
        $pro_img1 = $row_products['producto_img1'];
        
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
function getPCats(){

    global $db;
    
    $get_p_cats = " SELECT * FROM productos_categorias";
    
    $run_p_cats = mysqli_query($db, $get_p_cats);

    while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {

        $p_cat_id = $row_p_cats['p_cat_id'];

        $p_cat_titulo = $row_p_cats['p_cat_titulo'];

        echo "
            <li> 
                <a href='tienda.php?p_cat=$p_cat_id'> $p_cat_titulo </a> 
            </li>
            ";
    }
}
function getCats(){

    global $db;
    
    $get_cats = " SELECT * FROM categorias";
    
    $run_cats = mysqli_query($db, $get_cats);

    while ($row_cats = mysqli_fetch_array($run_cats)) {

        $cat_id = $row_cats['cat_id'];

        $cat_titulo = $row_cats['cat_titulo'];

        echo "
            <li> 
                <a href='tienda.php?cat=$cat_id'> $cat_titulo </a> 
            </li>
            ";
    }
}
function getPCatpro(){

    global $db;
    if(isset($_GET['p_cat'])){
        
        $p_cat_id = $_GET['p_cat'];
        
        $get_p_cat ="SELECT * from productos_categorias where p_cat_id = '$p_cat_id'";
        
        $run_p_cat = mysqli_query($db,$get_p_cat);
        
        $row_p_cat = mysqli_fetch_array($run_p_cat);
        
        $p_cat_titulo = $row_p_cat['p_cat_titulo'];
        
        $p_cat_desc = $row_p_cat['p_cat_desc'];
        
        $get_productos ="SELECT * from productos where p_cat_id='$p_cat_id'";
        
        $run_productos = mysqli_query($db,$get_productos);
        
        $cont = mysqli_num_rows($run_productos);
        
        if($cont==0){
            
            echo "
            
                <div class='box'>
                
                    <h1> No hay productos en esta categoria aun </h1>
                
                </div>
            
            ";
            
        }else{
            
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
        
            $pro_precio = $row_products['producto_precio'];
        
            $pro_img1 = $row_products['producto_img1'];

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
function getcatpro(){
    
    global $db;
    
    if(isset($_GET['cat'])){
        
        $cat_id = $_GET['cat'];
        
        $get_cat = "SELECT * from categorias where cat_id='$cat_id'";
        
        $run_cat = mysqli_query($db,$get_cat);
        
        $row_cat = mysqli_fetch_array($run_cat);
        
        $cat_titulo = $row_cat['cat_titulo'];
        
        $cat_desc = $row_cat['cat_desc'];
        
        $get_cat = "SELECT * from productos where cat_id='$cat_id' LIMIT 0,6";
        
        $run_products = mysqli_query($db,$get_cat);
        
        $count = mysqli_num_rows($run_products);
        
        if($count==0){
            
            
            echo "
            
                <div class='box'>
                
                    <h1> Aun no hay productos en esta categoria </h1>
                
                </div>
            
            ";
            
        }else{
            
            echo "
            
                <div class='box'>
                
                    <h1> $cat_titulo </h1>
                    
                    <p> $cat_desc </p>
                
                </div>
            
            ";
            
        }
        
        while($row_products=mysqli_fetch_array($run_products)){
            
            $pro_id = $row_products['producto_id'];
            
            $pro_titulo = $row_products['producto_titulo'];
            
            $pro_precio = $row_products['producto_precio'];
            
            $pro_desc = $row_products['producto_desc'];
            
            $pro_img1 = $row_products['producto_img1'];
            
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

function items(){
    global $db;

    $ip_add = getRealIpUser();

    // Corregir la consulta para comparar el valor de la columna con la variable
    $get_items = "SELECT * FROM cart WHERE ip_add = '$ip_add'";

    $run_items = mysqli_query($db, $get_items);

    $cont_items = mysqli_num_rows($run_items);
    
    echo $cont_items;
}

function mont_total(){

    global $db;

    $ip_add = getRealIpUser();

    $total = 0;

    $selecc_cart = "SELECT * FROM cart WHERE ip_add = '$ip_add'";

    $run_cart = mysqli_query($db, $selecc_cart);

    while($rec = mysqli_fetch_array($run_cart)){

        $pro_id = $rec['p_id'];

        $pro_cant = $rec['cant'];

        $get_precio = "SELECT * FROM productos WHERE producto_id = '$pro_id'";

        $run_precio = mysqli_query($db, $get_precio);

        while($row_precio = mysqli_fetch_array($run_precio)){

            $sub_total = $row_precio['producto_precio'] * $pro_cant;

            $total += $sub_total; // Sumar el subtotal al total general

        }
    }

    // Mostrar el total sin necesidad de un condicional
    echo "$" . $total;
}