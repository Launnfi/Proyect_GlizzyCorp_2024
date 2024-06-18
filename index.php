<?php
include "config/config.php";

session_start();
$p = isset($_GET['p']) ? $_GET['p'] : "inicio";


?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
 
<?php
    if (isset($_POST['reg'])) {
        $user = $_POST['reguser'];
        $pass = md5($_POST['regpass']);
        $dir = $_POST['regDir']; 
        $correo = $_POST['regCor'];
        $tel = $_POST['regTel'];
        

        $c = $con->query("SELECT nombre FROM usuario WHERE nombre = '$user'");
        if ($c->num_rows > 0) {
            echo "ya existe un usuario con ese nombre";
        } else {
            $s = $con->query("INSERT INTO usuario (nombre, correo, pass, direccion, tel) VALUES ('$user','$correo', '$pass','$dir','$tel')");
            if ($s) {
                echo "se ah registrado correctamente";
            }else{
                echo "hubo un error";
            }
        }
    }
    ?>
    <?php
    if (isset($_POST['log'])) {
        $user = $_POST['loguser'];
        $pass = md5($_POST['logpass']);
    
        $q = $con->query("SELECT * FROM usuario WHERE nombre = '$user' AND pass = '$pass'");
        if ($q->num_rows > 0) {
            $r = $q->fetch_array();
            $_SESSION['id'] = $r['id'];
            header("Location: modulos/inicio.php");
            exit; // Asegura que el script se detenga aquí
        } else {
            echo "Nombre de usuario o contraseña incorrectos";
        }
    }
    ?>

    <?php
    if (isset($_SESSION['id'])) {

    ?>
        <?php

        if (file_exists("modulos/" . $p . ".php")){
            include "modulos/" . $p . ".php";
        } else {
            echo "este modulo no existe";
        }
    } else { ?>

        <?php
        if (isset($_GET['p']) != 'registro') {  ?>

            <center>
                <h1>Iniciar sesion</h1>
                <form method="POST" action="">
                    <label> Nombre: </label>
                    <input type="text" name="loguser" class="texto" placeholder="Nombre" required> <br><br>
                    <label> Contraseña: </label>
                    <input type="password" name="logpass" class="texto" placeholder="Contraseña" required><br><br>
                    <input type="submit" name="log" class="boton" value="Ingresar">
                </form>
                <a href="?p=registro">Registrarse</a>
            </center>
        <?php } else { ?>
            <center>
                <h1>Registrarse</h1>
                <form method="POST" action="">
                     <label> Nombre: </label>
                    <input type="text" name="reguser" class="texto" placeholder="Nombre" required> <br><br>
                    <label> Contraseña: </label>
                    <input type="password" name="regpass" class="texto" placeholder="Contraseña" required><br><br>
                    <label>Correo:</label>
                    <input type="text" name="regCor" class="texto" placeholder="Correo" required> <br><br>
                    <label>Direccion:</label>
                    <input type="text" name="regDir" class="texto" placeholder="Direccion" required> <br><br>
                    <label >Telefono:</label>
                    <input type="text" name="regTel" class="texto" placeholder="Telefono" required> <br><br>
                    <input type="submit" name="reg" class="boton" value="registrarme">
                </form>
                <a href="./">Loguearme</a>
            </center>
        <?php } ?>

    <?php } ?>

</body>

</html>