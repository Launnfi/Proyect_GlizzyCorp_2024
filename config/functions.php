<?php
function user($id)
{
    require "config/config.php";
    // Escapar el ID para evitar inyecciones SQL (preferible usar sentencias preparadas, pero aquí vamos a escapar)
    $id = $con->real_escape_string($id);
    $Ru = $con->query("SELECT nombre FROM usuario WHERE idu = '$id'");
    $Rs = $Ru->fetch_array();
    return $Rs['user'];
}



?>