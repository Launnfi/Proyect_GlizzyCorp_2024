<?php 

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
    exit(); // Asegurarse de que el script se detenga después de redirigir
} else {
?>
<div class="row">
    
    <div class="col-lg-12">
        
        <ol class="breadcrumb">
            
            <li class="active">
                
                <i class="fa fa-dashboard"></i> Panel / Insertar Categoria
                
            </li>
            
        </ol>
        
    </div>
    
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                
                    <i class="fa fa-money fa-fw"></i> Insertar Categoria
                
                
                </h3>
            </div>
            
            <div class="panel-body">
                <form action="" class="form-horizontal" method="post">
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3">
                        
                             Categoria Titulo 
                        
                        </label>
                        
                        <div class="col-md-6">
                        
                            <input name="cat_titulo" type="text" class="form-control">
                        
                        </div>

                    </div>
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3">
                        
                       Categoria descripcion  
                        
                        </label>
                        
                        <div class="col-md-6">
                        
                            <textarea type='text' name="cat_desc" id="" cols="30" rows="10" class="form-control"></textarea>
                        
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
              
              $cat_titulo = $_POST['cat_titulo'];
              
              $cat_desc = $_POST['cat_desc'];
              
              $insert_cat = "INSERT INTO categorias (cat_titulo,cat_desc) VALUES ('$cat_titulo','$cat_desc')";
              
              $run_cat = mysqli_query($con,$insert_cat);
              
              if($run_cat){
                  
                  echo "<script>alert('Nueva categoria añadiada con exito')</script>";
                  
                  echo "<script>window.open('index.php?ver_cat','_self')</script>";
                  
              }
              
          }
        }

?>




