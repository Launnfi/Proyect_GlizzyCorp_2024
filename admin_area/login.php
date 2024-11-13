<?php 

    session_start();
    include("includes/db.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vicenta Admin Area</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
   
   <div class="container">
       <form action="" class="form-login" method="post">
           <h2 class="form-login-heading"> Iniciar sesion como admin </h2>
           
           <input type="text" class="form-control" placeholder="Email" name="admin_email" required>
           
           <div class="input-group">
               <input type="password" class="form-control" placeholder="Tu contraseña" name="admin_pass" id="admin_pass" required>
               <div class="input-group-append">
                   <button type="button" class="btn btn-secondary" onclick="togglePassword()">Mostrar</button>
               </div>
           </div>
           
           <button type="submit" class="btn btn-lg btn-primary btn-block" name="admin_login">
               
               Login
               
           </button>
           
       </form>
</div>
    <script>  function togglePassword() {
           const passwordField = document.getElementById("admin_pass");
           const toggleButton = passwordField.nextElementSibling.querySelector("button");
           
           if (passwordField.type === "password") {
               passwordField.type = "text";
               toggleButton.textContent = "Ocultar";
           } else {
               passwordField.type = "password";
               toggleButton.textContent = "Mostrar";
           }
       }</script>
</body>
</html>


<?php 

if(isset($_POST['admin_login'])){
    $admin_email = mysqli_real_escape_string($con, $_POST['admin_email']);
    $admin_pass = $_POST['admin_pass'];

    // Primero, obtén el registro del administrador con el email proporcionado
    $get_admin = "SELECT * FROM admin WHERE admin_email='$admin_email'";
    $run_admin = mysqli_query($con, $get_admin);

    if($row_admin = mysqli_fetch_array($run_admin)){
        // Recupera la contraseña encriptada de la base de datos
        $hashed_password = $row_admin['admin_pass'];

        // Verifica la contraseña ingresada contra la almacenada
        if(password_verify($admin_pass, $hashed_password)){
            $_SESSION['admin_email'] = $admin_email;
            echo "<script>alert('Sesión Iniciada')</script>";
            header("location:index.php?panel");      
            exit(); 
        } else {
            echo "<script>alert('Email o Contraseña incorrecta!')</script>";
        }
    } else {
        echo "<script>alert('Email o Contraseña incorrecta!')</script>";
    }
}
?>
