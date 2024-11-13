<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                
                <i class="fa fa-dashboard"></i> Panel / Insertar nueva caja
                
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                
                    <i class="fa fa-money fa-fw"></i> Insertar caja
                
                </h3>
            </div>
            
            <div class="panel-body">
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3">
                        
                            Titulo de la caja
                        
                        </label>
                        
                        <div class="col-md-6">
                        
                            <input name="caja_titulo" type="text" class="form-control">
                        
                        </div>
                    
                    </div>
                    <div class="form-group">

                        <label for="" class="control-label col-md-3">
                        
                            Descripcion de la caja
                        
                        </label>
                        
                        <div class="col-md-6">
                        
                            <textarea name="caja_desc" type="text" class="form-control" rows="6" cols="18"></textarea>
                        
                        </div>
                    
                    </div>
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3"></label>
                        
                        <div class="col-md-6">
                        
                            <input type="submit" name="submit" value="Insert Box" class="btn btn-primary form-control">
                        
                        </div>
                    
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

<?php  

    if(isset($_POST['submit'])){
        
        $caja_titulo = $_POST['caja_titulo'];
        $caja_desc = $_POST['caja_desc'];

        $insert_box ="insert into cajas_texto (caja_titulo,caja_desc) values ('$caja_titulo','$caja_desc')";
        $run_box = mysqli_query($con,$insert_box);

        echo "<script>alert('Nueva caja ha sido insertada')</script>";
        echo "<script>window.open('index.php?ver_cajas','_self')</script>";
        
    }

?>

<?php } ?>
