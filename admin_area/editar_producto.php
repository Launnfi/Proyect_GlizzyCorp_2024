<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['editar_producto'])){
        
        $edit_id = $_GET['editar_producto'];
        
        $get_p = "select * from productos where producto_id='$edit_id'";
        
        $run_edit = mysqli_query($con,$get_p);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
        $p_id = $row_edit['producto_id'];
        
        $p_title = $row_edit['producto_titulo'];
        
        $p_cat = $row_edit['p_cat_id'];
        
        $cat = $row_edit['cat_id'];
        
        $p_image1 = $row_edit['producto_img1'];
        
        $p_image2 = $row_edit['producto_img2'];
        
        $p_image3 = $row_edit['producto_img3'];
        
        $p_keywords = $row_edit['producto_keywords'];
        
        $p_desc = $row_edit['producto_desc'];
        
        $p_label = $row_edit['producto_etiqueta'];
        
    }
        
        
    $get_p_cat = "SELECT * FROM productos_categorias WHERE p_cat_id='$p_cat'";
    $run_p_cat = mysqli_query($con, $get_p_cat);
    
    if ($run_p_cat && mysqli_num_rows($run_p_cat) > 0) {
        $row_p_cat = mysqli_fetch_array($run_p_cat);
        $p_cat_titulo = $row_p_cat['p_cat_titulo'];
    } else {
        $p_cat_titulo = "Categoría no encontrada"; 
    }
    
    $get_cat = "SELECT * FROM categorias WHERE cat_id='$cat'";
    $run_cat = mysqli_query($con, $get_cat);
    
    if ($run_cat && mysqli_num_rows($run_cat) > 0) {
        $row_cat = mysqli_fetch_array($run_cat);
        $cat_titulo = $row_cat['cat_titulo'];
    } else {
        $cat_titulo = "Categoría no encontrada"; 
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Insertar Productos </title>
</head>
<body>
    
<div class="row">
    
    <div class="col-lg-12">
        
        <ol class="breadcrumb">
            
            <li class="active">
                
                <i class="fa fa-dashboard"></i> Panel / Editar Productos
                
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
                       
                      <label class="col-md-3 control-label"> Producto Titulo </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="producto_titulo" type="text" class="form-control" required value="<?php echo $p_title; ?>">
                          
                      </div>
                       
                   </div>
                   
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Producto Categoria </label> 
                      
                      <div class="col-md-6">
                          
                          <select name="product_cat" class="form-control">

                              <option disabled value="Select Product Category">Selecciona categoria de producto</option>       
                              
                              <option value="<?php echo $p_cat; ?>"> <?php echo $p_cat_titulo; ?> </option>
                              
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
                          
                          <select name="cat" class="form-control">

                              <option disabled value="Select Category">Selecciona una categoria</option>
                              
                              <option value="<?php echo $cat; ?>"> <?php echo $cat_titulo; ?> </option>
                              
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
                          
                          <input name="product_img1" type="file" class="form-control">
                          
                          <br>
                          
                          <img width="70" height="70" src="product_images/<?php echo $p_image1; ?>" alt="<?php echo $p_image1; ?>">
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Producto Imagen 2 </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="product_img2" type="file" class="form-control">
                          
                          <br>
                          
                          <img width="70" height="70" src="product_images/<?php echo $p_image2; ?>" alt="<?php echo $p_image2; ?>">
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Producto Imagen 3 </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="product_img3" type="file" class="form-control form-height-custom">
                          
                          <br>
                          
                          <img width="70" height="70" src="product_images/<?php echo $p_image3; ?>" alt="<?php echo $p_image3; ?>">
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Producto keywords </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="producto_keywords" type="text" class="form-control" required value="<?php echo $p_keywords; ?>">
                          
                      </div>
                   </div>
                   
                   <div class="form-group">
                      <label class="col-md-3 control-label"> Producto Descripcion </label> 
                      
                      <div class="col-md-6">
                          
                          <textarea name="producto_desc" cols="19" rows="6" class="form-control">
                              
                              <?php echo $p_desc; ?>
                              
                          </textarea>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Producto Etiqueta </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="producto_etiqueta" type="text" class="form-control" required value="<?php echo $p_label; ?>">
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6">
                          
                          <input name="update" value="Update Product" type="submit" class="btn btn-primary form-control">
                          
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

if(isset($_POST['update'])){
    
    $producto_titulo = $_POST['producto_titulo'];
    $product_cat = $_POST['product_cat'];
    $cat = $_POST['cat'];
    $producto_keywords = $_POST['producto_keywords'];
    $producto_desc = $_POST['producto_desc'];
    $producto_etiqueta = $_POST['producto_etiqueta'];

    if(is_uploaded_file($_FILES['file']['tmp_name'])){

            // work for upload / update image
        
        $product_img1 = $_FILES['product_img1']['name'];
        $product_img2 = $_FILES['product_img2']['name'];
        $product_img3 = $_FILES['product_img3']['name'];
        
        $temp_name1 = $_FILES['product_img1']['tmp_name'];
        $temp_name2 = $_FILES['product_img2']['tmp_name'];
        $temp_name3 = $_FILES['product_img3']['tmp_name'];
        
        move_uploaded_file($temp_name1,"product_images/$product_img1");
        move_uploaded_file($temp_name2,"product_images/$product_img2");
        move_uploaded_file($temp_name3,"product_images/$product_img3");
        
        $update_product = "update productos set p_cat_id='$product_cat',cat_id='$cat',date=NOW(),producto_titulo='$producto_titulo',producto_img1='$product_img1',producto_img2='$product_img2',producto_img3='$product_img3',producto_keywords='$producto_keywords',producto_desc='$producto_desc',producto_etiqueta='$producto_etiqueta' where producto_id='$p_id'";
        
        $run_product = mysqli_query($con,$update_product);
        
        if($run_product){
            
        echo "<script>alert('Tu producto se ha actualizado con exito')</script>"; 
            
        echo "<script>window.open('index.php?ver_producto','_self')</script>"; 
            
        }
        
    }else{

        // work when no update image
        
        $update_product = "update productos set p_cat_id='$product_cat',cat_id='$cat',date=NOW(),producto_titulo='$producto_titulo',producto_keywords='$producto_keywords',producto_desc='$producto_desc',producto_etiqueta='$producto_etiqueta' where producto_id='$p_id'";
        
        $run_product = mysqli_query($con,$update_product);
        
        if($run_product){
            
        echo "<script>alert('tu producto se ha actualizado con exito')</script>"; 
            
        echo "<script>window.open('index.php?ver_producto','_self')</script>"; 
            
        }
    }
    
}

?>


<?php } ?>