<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['editar_cat'])){
        
        $edit_cat_id = $_GET['editar_cat'];
        
        $edit_cat_query = "SELECT * FROM categorias WHERE cat_id='$edit_cat_id'";
        
        $run_edit = mysqli_query($con,$edit_cat_query);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
        $cat_id = $row_edit['cat_id'];
        
        $cat_titulo = $row_edit['cat_titulo'];
        
        $cat_desc = $row_edit['cat_desc'];
        
    }

?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                
                <i class="fa fa-dashboard"></i> Panel / Editar Categoria
                
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                
                    <i class="fa fa-pencil fa-fw"></i> Editar categoria
                
                </h3>
            </div>
            
            <div class="panel-body">
                <form action="" class="form-horizontal" method="post">
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3">
                        
                        Titulo Categoria
                        
                        </label>
                        
                        <div class="col-md-6">
                        
                            <input value=" <?php echo $cat_titulo; ?> " name="cat_titulo" type="text" class="form-control">
                        
                        </div>
                    
                    </div>
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3">
                        
                        Descrpcion categoria  
                        
                        </label>
                        
                        <div class="col-md-6">
                        
                            <textarea type='text' name="cat_desc" class="form-control"><?php echo $cat_desc; ?></textarea>
                        
                        </div>
                    
                    </div>
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3">
                        
                             
                        
                        </label>
                        
                        <div class="col-md-6">
                        
                            <input value="Update" name="update" type="submit" class="form-control btn btn-primary">
                        
                        </div>
                    
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

<?php  

          if(isset($_POST['update'])){
              
              $cat_titulo = $_POST['cat_titulo'];
              
              $cat_desc = $_POST['cat_desc'];
              
              $update_cat = "UPDATE categorias SET cat_titulo='$cat_titulo',cat_desc='$cat_desc', activo= 1 where cat_id='$cat_id'";
              
              $run_cat = mysqli_query($con,$update_cat);
              
              if($run_cat){
                  
                  echo "<script>alert('Categoria actualizada')</script>";
                  
                  echo "<script>window.open('index.php?ver_cat','_self')</script>";
                  
              }
              
          }

?>



<?php } ?> 