<?php 
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre nosotros</title>
    <link rel="stylesheet" href="css/styleprincipal.css">
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
}
        .conteiner{
            margin-left: 300px;
            text-align: center;
            margin-right: 300px;
            background: rgb(252, 204, 245);
            border-radius: 5px;
        }
        .info{
            text-align: left;
        }
    </style>
</head>
<body>
<?php 
    $ubi = 'abo';
    include 'plantilla.php';
    ?>
    <div class="conteiner">
        <div class="info"><p>¿Quienes somos? somos una empresa joven y familiar que nos dedicamos a confeccionar, comprar y vender las prendas mas hermosas y exclusivas para tus hijos. buscando siempre un trato clido y cercano con nuestras clientas. mi nombre es victoria, tengo 36 años y soy la orgullosa mama de dos varones, estoy al frente de vicenta desde que abrimos sus puertas en 2018.</p> 
     <p>Mision: nuestra mision siempre ha sido acompañar  las madres en este cmino tan hermoso, disfrutamos que se sientan acompañadas, que encuentren en nuestro locl una plbr miga y un lugr seguro. ayudar en todo lo que este a nuestro alcance. </p>
     <p>Vision: veo a vicenta en un futuro convertirse en mas que una marca, en poder llevar nuestra mision y forma de trabajo todos los lugares posibles.  </p>
     <p>Numero de contacto: 096354036</p></div>
    </div>
</body>
</html>