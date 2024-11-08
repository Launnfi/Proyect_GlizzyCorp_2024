<?php
$active = "FAQ";
include("includes/header.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - Preguntas Frecuentes</title>
    <style>
.faq-container {
    max-width: 800px;
    margin: 40px auto;
    padding: 0 20px;
    font-family: Arial, sans-serif;
}

.faq-header {
    text-align: center;
    margin-bottom: 30px;
}

.faq-header h1 {
    font-size: 36px;
    color: #4c9ac3;
    margin-bottom: 10px;
    font-weight: bold;
}

.faq-header p {
    font-size: 18px;
    color: #666666;
    line-height: 1.5;
}

.faq-content {
    display: grid;
    gap: 20px;
}

.faq-item {
    background-color: #ffffff;
    border: 1px solid #e3e3e3;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.faq-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

.faq-pregunta {
    font-size: 22px;
    font-weight: bold;
    color: #4c9ac3;
    margin-bottom: 10px;
}

.faq-respuesta {
    font-size: 16px;
    color: #666666;
    line-height: 1.6;
}

@media (max-width: 768px) {
    .faq-header h1 {
        font-size: 28px;
    }
    
    .faq-header p {
        font-size: 16px;
    }

    .faq-pregunta {
        font-size: 20px;
    }

    .faq-respuesta {
        font-size: 15px;
    }
}
    </style>

</head>
<body>

<div class="faq-container">
    <header class="faq-header">
        <h1>Preguntas Frecuentes</h1>
        <p>Encuentra respuestas a las preguntas más comunes de nuestros clientes.</p>
    </header>

    <section class="faq-content">
        <div class="faq-item">
            <h2 class="faq-pregunta">¿Cómo realizo un pedido?</h2>
            <p class="faq-respuesta">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse nec orci vel orci elementum bibendum.</p>
        </div>
        
        <div class="faq-item">
            <h2 class="faq-pregunta">¿Cuáles son los métodos de pago?</h2>
            <p class="faq-respuesta">Aliquam at justo ut orci fermentum vehicula. Cras convallis, augue non auctor interdum, nisi felis interdum erat.</p>
        </div>

        <div class="faq-item">
            <h2 class="faq-pregunta">¿Cuánto tarda en llegar el envío?</h2>
            <p class="faq-respuesta">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.</p>
        </div>

        <div class="faq-item">
            <h2 class="faq-pregunta">¿Cómo puedo rastrear mi pedido?</h2>
            <p class="faq-respuesta">Donec sit amet metus at odio dictum ultrices et sit amet sapien. Integer eget venenatis elit.</p>
        </div>

        <div class="faq-item">
            <h2 class="faq-pregunta">¿Puedo devolver un producto?</h2>
            <p class="faq-respuesta">Nulla facilisi. Duis a arcu eget nisi ultricies sagittis id in neque.</p>
        </div>
    </section>
</div>
