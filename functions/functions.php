<?php 

$db = mysqli_connect("localhost","root","","vicentita");

function getPro(){
    
    global $db;
    
    $get_productos = "select * from productos order by 1 DESC LIMIT 0,8";
    
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

?>