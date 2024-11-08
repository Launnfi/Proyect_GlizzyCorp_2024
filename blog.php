<?php
    $active = "Blog";
    include("includes/header.php")
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Novedades y Noticias</title>
    <style>
.blog-header {
    position: relative;
    height: 300px;
    background-image: url('https://via.placeholder.com/1200x600'); 
    background-size: cover;
    background-position: center;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    overflow: hidden;
}

.header-overlay {
    background-color: rgba(0, 0, 0, 0.6); 
    padding: 40px;
    text-align: center;
    width: 100%;
}

.blog-header h1 {
    font-size: 48px;
    margin-bottom: 10px;
    font-family: 'Georgia', serif; 
    color: #ffccd5;
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3); 
}

.blog-header p {
    font-size: 20px;
    margin-top: 10px;
    color: #f9f9f9;
}

.header-overlay:before, .header-overlay:after {
    content: '';
    position: absolute;
    height: 3px;
    width: 100px;
    background-color: #ffccd5;
    top: 50%;
    transform: translateY(-50%);
}

.header-overlay:before {
    left: 15%;
}

.header-overlay:after {
    right: 15%;
}

@media (max-width: 768px) {
    .blog-header h1 {
        font-size: 32px;
    }

    .blog-header p {
        font-size: 16px;
    }

    .header-overlay:before, .header-overlay:after {
        width: 60px;
    }
}

.blog-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    max-width: 1200px;
    margin: 20px auto;
    padding: 20px;
    justify-content: center;
}

.blog-post {
    background-color: #ffffff;
    border-radius: 10px;
    padding: 20px;
    max-width: 350px;
    width: 100%;
    box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

.blog-image {
    width: 100%;
    border-radius: 10px;
    margin-bottom: 15px;
}

.blog-content h2 {
    font-size: 22px;
    color: #4c9ac3;
    margin-bottom: 10px;
}

.blog-content p {
    font-size: 16px;
    color: #666666;
    margin-bottom: 15px;
    line-height: 1.6;
}

.blog-read-more {
    display: inline-block;
    padding: 10px 20px;
    background-color: #ffccd5;
    color: #333;
    border-radius: 15px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.blog-read-more:hover {
    background-color: #ffc9d9;
}

@media (max-width: 768px) {
    .blog-container {
        flex-direction: column;
        align-items: center;
    }

    .blog-content h2 {
        font-size: 20px;
    }

    .blog-content p {
        font-size: 14px;
    }
}
    </style>
</head>
<body>

<div class="blog-header">
    <div class="header-overlay">
        <h1>Explora Nuestro Blog</h1>
        <p>Historias, noticias y actualizaciones de nuestras redes sociales</p>
    </div>
</div>


<div class="blog-container">
    <!-- Blog Post 1 -->
    <div class="blog-post">
        <img src="https://via.placeholder.com/300" alt="Blog Post Image" class="blog-image">
        <div class="blog-content">
            <h2>Publicación de ejemplo 1</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
            <a href="#" class="blog-read-more">Leer más</a>
        </div>
    </div>

    <!-- Blog Post 2 -->
    <div class="blog-post">
        <img src="https://via.placeholder.com/300" alt="Blog Post Image" class="blog-image">
        <div class="blog-content">
            <h2>Publicación de ejemplo 2</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis cursus, risus at auctor venenatis.</p>
            <a href="#" class="blog-read-more">Leer más</a>
        </div>
    </div>

    <!-- Additional Blog Posts can go here -->
</div>

</body>
</html>
