<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['editar_caja'])){
        
        $edit_box_id = $_GET['editar_caja'];
        
        $edit_box_query = "select * from cajas_texto where caja_id='$edit_box_id'";
        
        $run_edit_box = mysqli_query($con,$edit_box_query);
        
        $row_edit_box = mysqli_fetch_array($run_edit_box);
        
        $box_id = $row_edit_box['box_id'];
        
        $caja_titulo = $row_edit_box['caja_titulo'];
        
        $caja_desc = $row_edit_box['caja_desc'];
        
    }

?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                
                <i class="fa fa-dashboard"></i> Panel / editar caja
                
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                
                    <i class="fa fa-pencil fa-fw"></i> Editar caja
                
                </h3>
            </div>
            
            <div class="panel-body">
                <form action="" class="form-horizontal" method="post">
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3">
                        
                            Titulo de la caja
                        
                        </label>
                        
                        <div class="col-md-6">
                        
                            <input value=" <?php echo $caja_titulo; ?> " name="caja_titulo" type="text" class="form-control">
                        
                        </div>
                    
                    </div>
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3">
                        
                            Descripcion de la caja
                        
                        </label>
                        
                        <div class="col-md-6">
                        
                            <textarea type='text' name="caja_desc" class="form-control"><?php echo $caja_desc; ?></textarea>
                        
                        </div>
                    </div>
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3"><
                        
                             
                        
                        </label>
                        
                        <div class="col-md-6">
                        
                            <input value="Update Box" name="update_box" type="submit" class="form-control btn btn-primary">
                        
                        </div>
                    
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

<?php  

          if(isset($_POST['update_box'])){
              
              $caja_titulo = $_POST['caja_titulo'];
              
              $caja_desc = $_POST['caja_desc'];
              
              $update_box = "update cajas_texto set caja_titulo='$caja_titulo',caja_desc='$caja_desc' where caja_id='$box_id'";
              
              $run_box = mysqli_query($con,$update_box);
              
              if($run_box){
                  
                  echo "<script>alert('Tu caja de texto se ha actualizado')</script>";
                  
                  echo "<script>window.open('index.php?ver_cajas','_self')</script>";
                  
              }
              
          }

?>



<?php } ?> 