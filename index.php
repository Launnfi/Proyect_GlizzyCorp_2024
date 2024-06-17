<?php
include "config/config.php";
include "config/functions.php";

//inicialisacion de la variable p
$p = isset($_GET['p']) ? $_GET['p'] : "inicio";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js"></script>
</head>

<body>

    <?php
    if (isset($_POST['reg'])) {
        $user = $_POST['reguser'];
        $pass = md5($_POST['regpass']);
        $dir = $_POST['regDir'];
        $tel = $_POST['regTel'];
        $correo = $_POST['regCor'];

        $c = $con->query("SELECT nombre FROM usuario WHERE nombre = '$user'");
        if ($c->num_rows > 0) {
            echo "ya existe un usuario con ese nombre";
        } else {
            $s = $con->query("INSERT INTO usuario (nombre, correo, pass,direccion,tel) VALUES ('$user','$correo', '$pass','$dir','$tel'");
            if ($s) {
                echo "se ah registrado correctamente";
            }
        }
    }

    if (isset($_POST['log'])) {
        $user = $_POST['loguser'];
        $pass = md5($_POST['logpass']);

        $q = $con->query("SELECT * FROM usuario WHERE nombre = '$user' AND pass = '$pass'");
        if ($q->num_rows > 0) {
            $r = $q->fetch_array();
            $_SESSION['id'] = $r['id'];
            header("Location: index.php");
        }
    }
    ?>

    <?php
    if (isset($_SESSION['id'])) {

    ?>

        <div id="unocoma">
            <h1>Bienvendo <?= user($_SESSION['id']); ?></h1>
        </div>
        <div id="uno"> <a href="modulos/logout.php">Toca aqui para Salir</a> </div>

        <?php

        if (file_exists("modulos/" . $p . ".php")) {
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
                <label>Correo:</label>
                    <input type="text" name="correo" class="texto" placeholder="Correo" required> <br><br>
                    <label>Direccion:</label>
                    <input type="text" name="direccion" class="texto" placeholder="Direccion" required> <br><br>
                    <label >Telefono:</label>
                    <input type="text" name="tel" class="texto" placeholder="Telefono" required> <br><br>


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
                    <input type="text" name="regCorr" class="texto" placeholder="Correo" required> <br><br>
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