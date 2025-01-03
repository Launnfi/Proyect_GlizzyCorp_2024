<?php 

include("../db.php");

if(!isset($_SESSION['admin_email'])){
        
    echo "<script>window.open('login.php','_self')</script>";

    }else{

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Insertar Productos </title>
    <link rel="stylesheet" href="../styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
</head>
<body>
    
<div class="row">
    
    <div class="col-lg-12">
        
        <ol class="breadcrumb">
            
            <li class="active">
                
                <i class="fa fa-dashboard"></i> Cuestionario / Insertar Productos
                
            </li>
            
        </ol>
        
    </div>
    
</div>
       
<div class="row">
    
    <div class="col-lg-12">
        
        <div class="panel panel-default">
            
           <div class="panel-heading">
               
               <h3 class="panel-title">
                   
                   <i class="fa fa-money fa-fw"></i> Insertar Producto 
                   
               </h3>
               
           </div>
           
           <div class="panel-body">
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data">
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> titulo de producto </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="producto_titulo" type="text" class="form-control" required>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Categoria de productos</label> 
                      
                      <div class="col-md-6">
                          
                          <select name="producto_cat" class="form-control">
                              
                              <option> selecciona una categoria de producto </option>
                              
                              <?php 
                              
                              $get_p_cats = "select * from productos_categorias";
                              $run_p_cats = mysqli_query($con,$get_p_cats);
                              
                              while ($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                  
                                  $p_cat_id = $row_p_cats['p_cat_id'];
                                  $p_cat_titulo = $row_p_cats['p_cat_titulo'];
                                  
                                  echo "
                                  
                                  <option value='$p_cat_id'> $p_cat_titulo </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>
                              
                          </select>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Categoria </label> 
                      
                      <div class="col-md-6">
                          
                          <select name="product_cat" class="form-control">
                              
                              <option> Selecciona una Categoria </option>
                              
                              <?php 
                              
                              $get_cat = "select * from categorias";
                              $run_cat = mysqli_query($con,$get_cat);
                              
                              while ($row_cat=mysqli_fetch_array($run_cat)){
                                  
                                  $cat_id = $row_cat['cat_id'];
                                  $cat_titulo = $row_cat['cat_titulo'];
                                  
                                  echo "
                                  
                                  <option value='$cat_id'> $cat_titulo </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>
                              
                          </select>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Producto Imagen 1 </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="producto_img1" type="file" class="form-control" required>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Producto Imagen 2 </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="producto_img2" type="file" class="form-control" >
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Producto Imagen 3 </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="producto_img3" type="file" class="form-control form-height-custom">
                          
                      </div>
                       
                   </div>
                   
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Producto Keywords </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="producto_keywords" type="text" class="form-control" required>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Producto Desc </label> 
                      
                      <div class="col-md-6">
                          
                          <textarea name="producto_desc" cols="19" rows="6" class="form-control"></textarea>
                          
                      </div>
                       
                   </div>
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Producto etiqueta </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="product_label" type="text" class="form-control">
                          
                      </div>
                       
                   </div>
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6">
                          
                          <input name="submit" value="Insertar Producto" type="submit" class="btn btn-primary form-control">
                          
                    </div>
                       
                   </div>
                   
               </form>
               
           </div>
            
        </div>
    </div>
    
</div>

    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>
</body>
</html>

<?php     
  if(isset($_POST['submit'])){

    $producto_titulo = $_POST['producto_titulo'];
    $product_cat = $_POST['product_cat'];
    $cat = $_POST['cat'];
    $producto_precio = $_POST['producto_precio'];
    $producto_keywords = $_POST['producto_keywords'];
    $producto_desc = $_POST['producto_desc'];
    $product_sale = $_POST['product_sale'];
    $product_label = $_POST['product_label'];
    
    $producto_img1 = $_FILES['producto_img1']['name'];
    $producto_img2 = $_FILES['producto_img2']['name'];
    $producto_img3 = $_FILES['producto_img3']['name'];
    
    $temp_name1 = $_FILES['producto_img1']['tmp_name'];
    $temp_name2 = $_FILES['producto_img2']['tmp_name'];
    $temp_name3 = $_FILES['producto_img3']['tmp_name'];
    
    // Tipos de imagen permitidos
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    
    // Validación para la imagen 1
    if(in_array($_FILES['producto_img1']['type'], $allowed_types) && $_FILES['producto_img1']['size'] < 10000000) { // 10MB de tamaño máximo
        move_uploaded_file($temp_name1, "product_images/$producto_img1");
    } else {
        echo "<script>alert('La imagen 1 no es válida. Solo se permiten imágenes JPG, PNG o GIF con un tamaño máximo de 10MB.')</script>";
        exit();
    }
    
    // Validación para la imagen 2 (si se sube)
    if (!empty($producto_img2)) {
        if(in_array($_FILES['producto_img2']['type'], $allowed_types) && $_FILES['producto_img2']['size'] < 10000000) {
            move_uploaded_file($temp_name2, "product_images/$producto_img2");
        } else {
            echo "<script>alert('La imagen 2 no es válida. Solo se permiten imágenes JPG, PNG o GIF con un tamaño máximo de 10MB.')</script>";
            exit();
        }
    } else {
        $producto_img2 = NULL;  // Asignar NULL si no se sube imagen 2
    }

    // Validación para la imagen 3 (si se sube)
    if (!empty($producto_img3)) {
        if(in_array($_FILES['producto_img3']['type'], $allowed_types) && $_FILES['producto_img3']['size'] < 10000000) {
            move_uploaded_file($temp_name3, "product_images/$producto_img3");
        } else {
            echo "<script>alert('La imagen 3 no es válida. Solo se permiten imágenes JPG, PNG o GIF con un tamaño máximo de 10MB.')</script>";
            exit();
        }
    } else {
        $producto_img3 = NULL;  // Asignar NULL si no se sube imagen 3
    }

    // Insertar el producto en la base de datos
    $insert_product = $insert_product = "INSERT INTO productos (p_cat_id, cat_id, date, producto_titulo, producto_img1, producto_img2, producto_img3, producto_keywords, producto_desc) 
                   VALUES ('$product_cat', '$cat', NOW(), '$producto_titulo', '$producto_img1', '$producto_img2', '$producto_img3', '$producto_keywords', '$producto_desc')";
    $run_product = mysqli_query($con, $insert_product);
    
    if($run_product){
        echo "<script>alert('El producto se añadió correctamente')</script>";
        echo "<script>window.open('index.php?ver_producto','_self')</script>";
    }
}


    }
?>