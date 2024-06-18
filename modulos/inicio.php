<?php
session_start();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header con enlaces</title>
    <!-- Aquí puedes agregar estilos CSS si lo deseas -->
    <style>
        /* Estilos opcionales para el header */
        header {
            background-color: rgb(252, 204, 245);
            color: black; 
            padding: 10px 0;
            text-align: center;
        }
        
        header a {
            color: black;
            text-decoration: none;
            margin: 0 10px;
        }
        .a{
            text-align: left;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <a name= "a" href="#seccion1">Inicio</a>
            <a name= "a" href="#seccion2">buscar</a>
            <a name= "a" href="#seccion3">sobre nosotros</a>
        </nav>
    </header>

    <!-- Contenido de la página -->
    <section id="seccion1">
        <h2>Sección 1</h2>
        <p>Contenido de la sección 1...</p>
    </section>

    <section id="seccion2">
        <h2>Sección 2</h2>
        <p>Contenido de la sección 2...</p>
    </section>

    <section id="seccion3">
        <h2>Sección 3</h2>
        <p>Contenido de la sección 3...</p>
    </section>
</body>
</html>