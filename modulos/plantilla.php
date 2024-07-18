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
        font-size: 20px;
    }
    
    #salir {
        text-align: right;
    }

    .btn-cart {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 50px;
    height: 50px;
    border-radius: 10px;
    border: none;
    background-color: transparent;
    position: absolute; 
    top: 10px; 
    left: 10px; 
}

.icon-cart {
  width: 24.38px;
  height: 30.52px;
  transition: .2s linear;
}

.icon-cart path {
  fill: rgb(240, 8, 8);
  transition: .2s linear;
}

.btn-cart:hover > .icon-cart {
  transform: scale(1.2);
}

.btn-cart:hover > .icon-cart path {
  fill: rgb(186, 34, 233);
}

.btn-cart:hover::after {
  visibility: visible;
  opacity: 1;
  top: 105%;
}

.btn-door {
    background: none;
    border: none;
    cursor: pointer;
    margin-left: 10px;
    padding: 0;
    
}

.icon-door {
    fill: #333;
    transition: fill 0.3s ease;
}

.icon-door:hover {
    fill: #007BFF;
}


</style>

<header>
            <a href="inicio.php" <?php if($ubi=="ini"){echo "class='aca'";}?>>Inicio</a>
            <a href="Seccion2">Categorias</a>
            <a href="about_us.php" <?php if($ubi=="abo"){echo "class='aca'";}?>>Sobre nosotros</a>
            <a href="Ayuda.php" <?php if($ubi=="Ayu"){echo "class='aca'";}?>>Ayuda</a>

         


            <div id="salir"> <a href="logout.php">Cerrar sesión</a> </div>

            <button data-quantity="0" class="btn-cart">
          <svg class="icon-cart" viewBox="0 0 24.38 30.52" height="30.52" width="24.38" xmlns="http://www.w3.org/2000/svg">
            <title>icon-cart</title>
            <path transform="translate(-3.62 -0.85)" d="M28,27.3,26.24,7.51a.75.75,0,0,0-.76-.69h-3.7a6,6,0,0,0-12,0H6.13a.76.76,0,0,0-.76.69L3.62,27.3v.07a4.29,4.29,0,0,0,4.52,4H23.48a4.29,4.29,0,0,0,4.52-4ZM15.81,2.37a4.47,4.47,0,0,1,4.46,4.45H11.35a4.47,4.47,0,0,1,4.46-4.45Zm7.67,27.48H8.13a2.79,2.79,0,0,1-3-2.45L6.83,8.34h3V11a.76.76,0,0,0,1.52,0V8.34h8.92V11a.76.76,0,0,0,1.52,0V8.34h3L26.48,27.4a2.79,2.79,0,0,1-3,2.44Zm0,0"></path>
          </svg>
          </button>

          <button class="btn-door" onclick="salir()">
          <svg class="icon-door" viewBox="0 0 64 64" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
            <title>icon-door</title>
            <path d="M53 2H11C9.343 2 8 3.343 8 5v54c0 1.657 1.343 3 3 3h42c1.657 0 3-1.343 3-3V5c0-1.657-1.343-3-3-3zM44 58H20V48h24v10zM44 42H20V8h24v34z"/>
        </svg>
    </button>

    </header>
    <script>
function salir() {
  window.location.href = 'logout.php';
}
function carrto(){
windows.location.href = "carrito"
}

</script>

    </header>


    
