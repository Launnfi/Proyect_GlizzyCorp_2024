<?php
//coneccion con base de datos
$host = "localhost";
$user = "root";
$pass = "";
$db = "vicenta";

$con = new mysqli($host, $user, $pass, $db);

if($con -> connect_errno) {
    die( "ha ocurrido un error" );

}

?>