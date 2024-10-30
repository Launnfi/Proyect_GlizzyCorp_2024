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
                
                <i class="fa fa-dashboard"></i> Cuestionario / Insertar usuario
                
            </li>
            
        </ol>
        
    </div>
    
</div>
       
<div class="row">
    
    <div class="col-lg-12">
        
        <div class="panel panel-default">
            
           <div class="panel-heading">
               
               <h3 class="panel-title">
                   
                   <i class="fa fa-money fa-fw"></i> Insertar usuario 
                   
               </h3>
               
           </div>
           
           <div class="panel-body">
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data">
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> nombre de usuario </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="nom_user" type="text" class="form-control" required>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> E-mail</label> 
                      
                      <div class="col-md-6">

                      <input name="email_user" type="text" class="form-control" required>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Contraseña </label> 
                      
                      <div class="col-md-6">

                      <input name="pass_user" type="password" class="form-control" required>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label">Ciudad</label> 
                      
                      <div class="col-md-6">
                          
                          <input name="ciud_user" type="text" class="form-control" required>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Informacion </label> 
                      
                      <div class="col-md-6">
                          
                          <textarea name="user_info" class="form-control" rows="3"></textarea>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Contacto </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="con_user" type="text" class="form-control form-height-custom" required>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Cargo </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="trab_user" type="text" class="form-control" required>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                       <label class="col-md-3 control-label">Imagen</label> 
                       
                       <div class="col-md-6">
                           
                           <input name="img_user" type="file" class="form-control" required>
                           
                       </div>
                        
                    </div>
                      </div>
                       
                   </div>
                   
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6">
                          
                          <input name="submit" value="Insertar usuario" type="submit" class="btn btn-primary form-control">
                          
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
    
    $nom_user = $_POST['nom_user'];
    $email_user = $_POST['email_user'];
    $user_pass = $_POST['pass_user'];
    $ciud_user = $_POST['ciud_user'];
    $user_info = $_POST['user_info'];
    $con_user = $_POST['con_user'];
    $trab_user = $_POST['trab_user'];

    
    $img_user = $_FILES['img_user']['name'];
    $temp_img_user = $_FILES['img_user']['tmp_name'];



    
    move_uploaded_file($temp_img_user,"admin_area/admin_imagen/$img_user");

    $insert_adm = "insert into admin (admin_nombre,admin_email,admin_pass,admin_img,admin_ciudad,admin_sobre,admin_contacto,admin_trabajo) values ('$nom_user','$email_user',$user_pass,'$img_user','$ciud_user','$user_info','$con_user','$trab_user')";
    
    $run_adm = mysqli_query($con,$insert_adm);
    
    if($run_adm){
        
        echo "<script>alert('Nuevo usuario admin añadido correctamente')</script>";
        echo "<script>window.open('index.php?ver_user','_self')</script>";
        
    }
    
}
    }
?>