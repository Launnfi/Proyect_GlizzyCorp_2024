<?php 
$active = "Mi cuenta";
?>
<?php 

include("includes/header.php")
?>

       
   </div><!-- navbar navbar-default termina -->
   <div id="content"><!-- content empieza -->
    <div class="container"><!-- container empieza -->
        <div class="col-md-12"><!-- col-md-12 empieza -->

        <ul class="breadcrumb"><!-- breadcrumb empieza-->
            <li>
                <a href="index.php">Inicio</a>
            </li>
            <li>
                Mi cuenta
            </li>
        </ul>

        <div class="col-md-3"><!-- col-md-3 empieza -->
        <?php

             include("includes/sidebar.php");

        ?>
        </div><!-- col-md-3 termina -->
        <div class="col-md-9"><!-- col-md-9 empieza -->

            <div class="box"><!-- box empieza -->


            <?php 
            if(isset($_GET['misOrdenes'])){
                include("misOrdenes.php");
            }
            ?>
             <?php 
            if(isset($_GET['pagoOff'])){
                include("pagoOff.php");
            }
            ?>
              <?php 
            if(isset($_GET['editarInfo'])){
                include("editarInfo.php");
            }
            ?>
               <?php 
            if(isset($_GET['cambiarCont'])){
                include("cambiarCont.php");
            }
            ?>
             <?php 
            if(isset($_GET['eliminarCuenta'])){
                include("eliminarCuenta.php");
            }
            ?>



            </div><!-- box empieza -->


        </div><!-- col-md-9 termina -->


        </div><!-- container termina -->
    </div><!-- content termina -->
    
    <?php

    include("includes/footer.php")

    ?>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>


</body>
</html>