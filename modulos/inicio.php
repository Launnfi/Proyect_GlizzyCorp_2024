<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
     <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="css/styleprincipal.css">
     <style>
    .carousel-inner {
            height: 500px; 
        }

        .carousel-item img {
            height: 500px; 
            object-fit: cover; 
        }

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
    
</style>
</head>
<body>
    <?php 
    $ubi = 'ini';
    include 'plantilla.php';
    ?>

    <?php
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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