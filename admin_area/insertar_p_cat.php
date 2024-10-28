<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                
                <i class="fa fa-dashboard"></i> Panel / Insertar Producto Categoria
                
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                
                    <i class="fa fa-money fa-fw"></i> Insertar Producto Categoria
                
                
                </h3>
            </div>
            
            <div class="panel-body">
                <form action="" class="form-horizontal" method="post">
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3">
                        
                            Producto Categoria Titulo 
                        
                        </label>
                        
                        <div class="col-md-6">
                        
                            <input name="p_cat_titulo" type="text" class="form-control">
                        
                        </div>

                    </div>
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3">
                        
                        Descripcion Producto Categoria  
                        
                        </label>
                        
                        <div class="col-md-6">
                        
                            <textarea type='text' name="p_cat_desc" id="" cols="30" rows="10" class="form-control"></textarea>
                        
                        </div>
                    
                    </div>
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3">
                        
                             
                        
                        </label>
                        
                        <div class="col-md-6">
                        
                            <input value="Submit" name="submit" type="submit" class="form-control btn btn-primary">
                        
                        </div>
                    
                    </div>
                </form>
            
        </div>
    </div>
</div>
<?php  

          if(isset($_POST['submit'])){
              
              $p_cat_titulo = $_POST['p_cat_titulo'];
              
              $p_cat_desc = $_POST['p_cat_desc'];
              
              $insert_p_cat = "INSERT INTO productos_categorias (p_cat_titulo,p_cat_desc) VALUES ('$p_cat_titulo','$p_cat_desc')";
              
              $run_p_cat = mysqli_query($con,$insert_p_cat);
              
              if($run_p_cat){
                  
                  echo "<script>alert('Producto categoria insertado con exito')</script>";
                  
                  echo "<script>window.open('index.php?ver_p_cats','_self')</script>";
                  
              }
              
          }

?>



<?php } ?> 