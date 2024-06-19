<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
       <!-- Bootstrap CSS -->
       <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


    <style>
        /* Estilos opcionales para el header */
        .carousel-caption-custom {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 10px;
            text-align: center;
        }
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
            <a name= "a" href="inicio.php">Inicio</a>
            <a name= "a" href="#seccion2">categorias</a>
            <a name= "a" href="about_us.php">sobre nosotros</a>
        </nav>
    </header>
    <div id="unocoma">
        </div>
        <div id="salir"> <a href="logout.php">Toca aqui para Salir</a> </div>
<?php
// Datos del carrusel (pueden provenir de una base de datos)
$images = [
    ["src" => "https://www.anahuac.mx/mexico/sites/default/files/styles/webp/public/noticias/Los-colores-que-utilizamos-en-la-ropa-dicen-como-somos.jpg.webp?itok=k3GFCGkN", "description" => "Descripción de la imagen 1"],
    ["src" => "https://i.ebayimg.com/images/g/KRsAAOSwJoZmSivs/s-l1600.webp", "description" => "Descripción de la imagen 2"],
    ["src" => "https://i.ebayimg.com/images/g/ixIAAOSwW4tlVpV5/s-l1600.webp", "description" => "Descripción de la imagen 3"],
];
?>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php foreach ($images as $index => $image): ?>
            <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $index; ?>" class="<?php echo $index === 0 ? 'active' : ''; ?>"></li>
        <?php endforeach; ?>
    </ol>
    <div class="carousel-inner">
        <?php foreach ($images as $index => $image): ?>
            <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                <img src="<?php echo $image['src']; ?>" class="d-block w-100" alt="Imagen <?php echo $index + 1; ?>">
                <div class="carousel-caption-custom">
                    <p><?php echo $image['description']; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Siguiente</span>
    </a>
</div>

<!-- Bootstrap JS y dependencias -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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