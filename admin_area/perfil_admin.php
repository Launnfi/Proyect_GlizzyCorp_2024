<?php 

include("../db.php");

if(!isset($_SESSION['admin_email'])){
        
    echo "<script>window.open('login.php','_self')</script>";

    }else{
?>
 <?php 

if(isset($_GET['perfil_admin'])){
    
    $edit_user = $_GET['perfil_admin'];
    
    $get_user = "select * from admin where admin_id='$edit_user'";
    
    $run_user = mysqli_query($con,$get_user);
    
    $row_user = mysqli_fetch_array($run_user);
    
    $user_id = $row_user['admin_id'];
    
    $user_nom = $row_user['admin_nombre'];
    
    $user_pass = $row_user['admin_pass'];
    
    $user_email = $row_user['admin_email'];
    
    $user_image = $row_user['admin_img'];
    
    $user_ciudad = $row_user['admin_ciudad'];
    
    $user_info = $row_user['admin_sobre'];
    
    $user_contacto = $row_user['admin_contacto'];
    
    $user_trabajo = $row_user['admin_trabajo'];
    
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vicenta </title>
    <link rel="stylesheet" href="../styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
</head>
<body>
    
<div class="row">
    
    <div class="col-lg-12">
        
        <ol class="breadcrumb">
            
            <li class="active">
                
                <i class="fa fa-dashboard"></i> Panel / Editar usuario
                
            </li>
            
        </ol>
        
    </div>
    
</div>
       
<div class="row">
    
    <div class="col-lg-12">
        
        <div class="panel panel-default">
            
           <div class="panel-heading">
               
               <h3 class="panel-title">
                   
                   <i class="fa fa-money fa-fw"></i> Editar usuario 
                   
               </h3>
               
           </div>
           
           <div class="panel-body">
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data">
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> nombre de usuario </label> 
                      
                      <div class="col-md-6">
                          
                          <input value="<?php echo $user_nom ?>" name="nom_user" type="text" class="form-control" required>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> E-mail</label> 
                      
                      <div class="col-md-6">

                      <input value="<?php echo $user_email ?>" name="email_user" type="text" class="form-control" required>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Contraseña </label> 
                      
                      <div class="col-md-6">

                      <input value="<?php echo $user_pass ?>" name="pass_user" type="password" class="form-control" required>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label">Ciudad</label> 
                      
                      <div class="col-md-6">
                          
                          <input value="<?php echo $user_ciudad ?>" name="ciud_user" type="text" class="form-control" required>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Informacion </label> 
                      
                      <div class="col-md-6">
                          
                          <textarea  name="user_info" class="form-control" rows="3"><?php echo $user_info ?></textarea>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Contacto </label> 
                      
                      <div class="col-md-6">
                          
                          <input value="<?php echo $user_contacto ?>" name="con_user" type="text" class="form-control form-height-custom" required>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Cargo </label> 
                      
                      <div class="col-md-6">
                          
                          <input value="<?php echo $user_trabajo ?>" name="trab_user" type="text" class="form-control" required>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                       <label class="col-md-3 control-label">Imagen</label> 
                       
                       <div class="col-md-6">
                           
                           <input name="img_user" type="file" class="form-control" required>
                           <img src="admin_imagen/<?php echo $user_image ?>" alt="<?php echo $user_nom ?>" width="70" height="70">
                           
                       </div>
                        
                    </div>
                      </div>
                       
                   </div>
                   
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6">
                          
                          <input name="update" value="Editar usuario" type="submit" class="btn btn-primary form-control">
                          
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
    
    $nom_user = $_POST['nom_user'];
    $email_user = $_POST['email_user'];
    $user_pass = $_POST['pass_user'];
    $ciud_user = $_POST['ciud_user'];
    $user_info = $_POST['user_info'];
    $con_user = $_POST['con_user'];
    $trab_user = $_POST['trab_user'];

    
    $img_user = $_FILES['img_user']['name'];
    $temp_img_user = $_FILES['img_user']['tmp_name'];



    
    move_uploaded_file($temp_img_user,"admin_imagen/$img_user");

    $update_adm = "UPDATE admin SET admin_nombre = '$nom_user', admin_email = '$email_user', admin_pass = '$user_pass', admin_img = '$img_user', admin_ciudad = '$ciud_user', admin_sobre = '$user_info', admin_contacto = '$con_user', admin_trabajo = '$trab_user' WHERE admin_id = '$user_id'";
    $run_adm = mysqli_query($con,$update_adm);
    
    if($run_adm){
        
        echo "<script>alert('Usuario editado correctamente')</script>";
        echo "<script>window.open('index.php?ver_user','_self')</script>";
        
        session_destroy();
    }
    
}
    }
?>