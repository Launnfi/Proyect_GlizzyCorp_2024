<?php 

            if(!isset($_SESSION['admin_email'])){
                echo "<script>window.open('login.php','_self')</script>";
            }else{

                if(isset($_GET['editar_producto']) && !empty($_GET['editar_producto'])){
                    
                    $edit_id = $_GET['editar_producto'];
                    
                    $get_p = "SELECT * FROM productos WHERE producto_id='$edit_id'";
                    $run_edit = mysqli_query($con, $get_p);
                    
                    if ($row_edit = mysqli_fetch_array($run_edit)) {
                        $p_id = $row_edit['producto_id'];
                        $p_titulo = $row_edit['producto_titulo'];
                        $p_cat = $row_edit['p_cat_id'];
                        $cat = $row_edit['cat_id'];
                        $p_image1 = $row_edit['producto_img1'];
                        $p_image2 = $row_edit['producto_img2'];
                        $p_image3 = $row_edit['producto_img3'];
                        $p_price = $row_edit['producto_precio'];
                        $p_keywords = $row_edit['producto_keywords'];
                        $p_desc = $row_edit['producto_desc'];
                    } else {
                        echo "<script>alert('Producto no encontrado'); window.open('index.php?view_productos','_self');</script>";
                        exit();
                    }

                    // Obtener el título de la categoría de producto
                    $get_p_cat = "SELECT * FROM productos_categorias WHERE p_cat_id='$p_cat'";
                    $run_p_cat = mysqli_query($con, $get_p_cat);
                    $row_p_cat = mysqli_fetch_array($run_p_cat);
                    $p_cat_titulo = isset($row_p_cat['p_cat_titulo']) ? $row_p_cat['p_cat_titulo'] : 'Categoría no encontrada';


                    // Obtener el título de la categoría general
                    $get_cat = "SELECT * FROM categorias WHERE cat_id='$cat'";
                    $run_cat = mysqli_query($con, $get_cat);
                    $row_cat = mysqli_fetch_array($run_cat);
                    $cat_titulo = isset($row_cat['cat_titulo']) ? $row_cat['cat_titulo'] : 'Categoría no encontrada';
                } else {
                    echo "<script>alert('ID de producto no especificado.'); window.open('index.php?view_productos','_self');</script>";
                    exit();
                }
            ?>
<?php
    if(isset($_GET['edit_product'])){
        
        $edit_id = $_GET['edit_product'];
        
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
        
        $p_price = $row_edit['producto_precio'];
        
        $p_keywords = $row_edit['producto_keywords'];
        
        $p_desc = $row_edit['producto_desc'];
        
    }
        
        $get_p_cat = "select * from productos_categorias where p_cat_id='$p_cat'";
        
        $run_p_cat = mysqli_query($con,$get_p_cat);
        
        $row_p_cat = mysqli_fetch_array($run_p_cat);
        
        $p_cat_titulo = $row_p_cat['p_cat_titulo'];
        
        $get_cat = "select * from categorias where cat_id='$cat'";
        
        $run_cat = mysqli_query($con,$get_cat);
        
        $row_cat = mysqli_fetch_array($run_cat);
        
        $cat_titulo = $row_cat['cat_titulo'];
        ?>

            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title> Insertar productos </title>
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
                            <i class="fa fa-money fa-fw"></i> Insertar Productos 
                        </h3>
                    </div>
                    
           <div class="panel-body">
               <form method="post" class="form-horizontal" enctype="multipart/form-data">
                 
                   <div class="form-group">
                      <label class="col-md-3 control-label"> Producto Titulo </label> 
                      <div class="col-md-6">
                          <input name="producto_titulo" type="text" class="form-control" required value="<?php echo $p_titulo; ?>">
                      </div>
                   </div>
                   
                   
                   <div class="form-group">
                        <label class="col-md-3 control-label">Producto Categoria</label>
                        <div class="col-md-6">
                            <select name="product_cat" class="form-control">
                                <option value="<?php echo $p_cat; ?>"><?php echo $p_cat_titulo; ?></option>
                                <?php 
                                $get_p_cats = "SELECT * FROM productos_categorias";
                                $run_p_cats = mysqli_query($con, $get_p_cats);
                                while ($row_p_cats = mysqli_fetch_array($run_p_cats)){
                                    $p_cat_id = $row_p_cats['p_cat_id'];
                                    $p_cat_titulo = $row_p_cats['p_cat_titulo'];
                                    echo "<option value='$p_cat_id'> $p_cat_titulo </option>";
                                }
                                ?>
                          </select>
                      </div>
                   </div>
                   
                      
                                        <div class="form-group">
                        <label class="col-md-3 control-label"> Categoria </label> 
                        <div class="col-md-6">
                            <select name="cat" class="form-control">
                                <option value="<?php echo $cat; ?>"> <?php echo $cat_titulo; ?> </option>
                                <?php 
                                $get_cat = "SELECT * FROM categorias";
                                $run_cat = mysqli_query($con, $get_cat);
                                while ($row_cat = mysqli_fetch_array($run_cat)){
                                    $cat_id = $row_cat['cat_id'];
                                    $cat_titulo = $row_cat['cat_titulo'];
                                    echo "<option value='$cat_id'> $cat_titulo </option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Producto Imagen 1 </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="producto_img1" type="file" class="form-control" required>
                          
                          <br>
                          
                          <img width="70" height="70" src="product_images/<?php echo $p_image1; ?>" alt="<?php echo $p_image1; ?>">
                          
                      </div>
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Producto Imagen 2 </label> 
                      
                      <div class="col-md-6">
                          <input name="producto_img2" type="file" class="form-control">
                          
                          <br>
                          
                          <img width="70" height="70" src="product_images/<?php echo $p_image2; ?>" alt="<?php echo $p_image2; ?>">
                          
                      </div>
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Producto Imagen 3 </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="producto_img3" type="file" class="form-control form-height-custom">
                          
                          <br>
                          
                          <img width="70" height="70" src="product_images/<?php echo $p_image3; ?>" alt="<?php echo $p_image3; ?>">
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Producto precio </label> 
                      
                      <div class="col-md-6">
                          <input name="producto_precio" type="text" class="form-control" required value="<?php echo $p_price; ?>">
                          
                      </div>

                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Producto Keywords </label> 
                      
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

                <?php 

                if(isset($_POST['update'])){
                    
                    $producto_titulo = $_POST['producto_titulo'];
                    $product_cat = $_POST['product_cat'];
                    $cat = $_POST['cat'];
                    $producto_precio = $_POST['producto_precio'];
                    $producto_keywords = $_POST['producto_keywords'];
                    $producto_desc = $_POST['producto_desc'];
                    
                    $producto_img1 = $_FILES['producto_img1']['name'];
                    $producto_img2 = $_FILES['producto_img2']['name'];
                    $producto_img3 = $_FILES['producto_img3']['name'];
                    
                    $temp_name1 = $_FILES['producto_img1']['tmp_name'];
                    $temp_name2 = $_FILES['producto_img2']['tmp_name'];
                    $temp_name3 = $_FILES['producto_img3']['tmp_name'];
                    
                    move_uploaded_file($temp_name1,"product_images/$producto_img1");
                    move_uploaded_file($temp_name2,"product_images/$producto_img2");
                    move_uploaded_file($temp_name3,"product_images/$producto_img3");
                    
                    $update_product = "UPDATE productos SET 
                                        p_cat_id='$product_cat',
                                        cat_id='$cat',
                                        date=NOW(),
                                        producto_titulo='$producto_titulo',
                                        producto_img1='$producto_img1',
                                        producto_img2='$producto_img2',
                                        producto_img3='$producto_img3',
                                        producto_keywords='$producto_keywords',
                                        producto_desc='$producto_desc',
                                        producto_precio='$producto_precio'
                                        WHERE producto_id='$p_id'";
                    
                    $run_product = mysqli_query($con, $update_product);
                    
                    if($run_product){
                    echo "<script>alert('Producto actualizado con exito')</script>"; 
                    echo "<script>window.open('index.php?ver_productos','_self')</script>"; 
                    }
                }

                ?>
                <?php } ?>