<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                
                <i class="fa fa-dashboard"></i> Panel / Insertar Carrucel
                
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                
                    <i class="fa fa-money fa-fw"></i> Insertar Carrucel
                
                </h3>
            </div>
            
            <div class="panel-body">
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3">
                        
                        Nombre Carrcuel 
                        
                        </label>
                        
                        <div class="col-md-6">
                        
                            <input name="slide_nombre" type="text" class="form-control">
                        
                        </div>
                    
                    </div>
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3"> 
                        
                        Imagen Carrcuel 
                        
                        </label>
                        
                        <div class="col-md-6">
                        
                            <input type="file" name="slide_image" class="form-control">
                        
                        </div>
                    
                    </div>
                    <div class="form-group">
                    
                        <label for="" class="control-label col-md-3"></label>
                        
                        <div class="col-md-6">
                        
                            <input type="submit" name="submit" value="Submit Now" class="btn btn-primary form-control">
                        
                        </div>
                    
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

<?php  

    if(isset($_POST['submit'])){
        
        $slide_nombre = $_POST['slide_nombre'];
        
        $slide_image = $_FILES['slide_image']['name'];
        
        $temp_name = $_FILES['slide_image']['tmp_name'];
        
        $view_slides = "SELECT * from slider";
        
        $view_run_slide = mysqli_query($con,$view_slides);
        
        $count = mysqli_num_rows($view_run_slide);
        
        if($count<4){
            
            move_uploaded_file($temp_name,"slides_images/$slide_image");
            
            $insert_slide = "INSERT into slider (slide_name,slide_image) values ('$slide_nombre','$slide_image')";
            
            $run_slide = mysqli_query($con,$insert_slide);
            
            echo "<script>alert('Imagen al carrucel insertada')</script>";
            
            echo "<script>window.open('index.php?ver_slides','_self')</script>";
            
        }else{
            
           echo "<script>alert('Ya tienes 4 imagenes en el carrucel insertadas')</script>"; 
            
        }
        
    }

?>

<?php } ?>