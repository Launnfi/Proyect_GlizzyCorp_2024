<style>
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
<header>
            <a href="inicio.php" <?php if($ubi=="ini"){echo "class='aca'";}?>>Inicio</a>
            <a href="Seccion2">categorias</a>
            <a href="about_us.php" <?php if($ubi=="abo"){echo "class='aca'";}?>>sobre nosotros</a>
            <a href="Ayuda.php" <?php if($ubi=="Ayu"){echo "class='aca'";}?>>Ayuda</a>
    </header>
