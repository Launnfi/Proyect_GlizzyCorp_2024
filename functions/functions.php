<?php 

$db = mysqli_connect("localhost","root","","vicentita");

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
