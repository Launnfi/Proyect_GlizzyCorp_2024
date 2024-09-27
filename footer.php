<?php 
?>
<div id="footer"><!-- #footer empieza -->
    <div class="container"><!-- container empieza -->
        <div class="row"><!-- row empieza -->
            <div class="col-sm-6 col-md-3"><!-- col-sm-6 col-md-3 empieza -->
               
               <h4>Paginas</h4>
                
                <ul><!-- ul empieza -->
                    <li><a href="cart.php">Carrito</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="tienda.php">Shop</a></li>
                    <li><a href="customer/my_account.php">My Account</a></li>
                </ul><!-- ul termino -->
                
                <hr>
                
                <h4>Seccion de usuarios</h4>
                
                <ul><!-- ul empieza -->
                    <li><a href="Micuenta.php">Login</a></li>
                    <li><a href="customer_register.php">registarme</a></li>
                </ul><!-- ul termino -->
                
                <hr class="hidden-md hidden-lg hidden-sm">
                
            </div><!-- col-sm-6 col-md-3 termino -->
            
            <div class="com-sm-6 col-md-3"><!-- col-sm-6 col-md-3 empieza -->
                
                <h4>Categorias de productos</h4>
                
                <ul><!-- ul empieza -->

                <?php 
                    
                $get_p_cats = "select * from productos_categorias";
                    
                    $run_p_cats = mysqli_query($con,$get_p_cats);
                
                    while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                        
                        $p_cat_id = $row_p_cats['p_cat_id'];
                        
                        $p_cat_titulo = $row_p_cats['p_cat_titulo'];
                        
                        echo "
                        
                            <li>
                            
                                <a href='shop.php?p_cat=$p_cat_id'>
                                
                                    $p_cat_titulo
                                
                                </a>
                            
                            </li>
                        
                        ";
                        
                    }
                
                ?>
                </ul><!-- ul termino -->
                
                <hr class="hidden-md hidden-lg">
                
            </div><!-- col-sm-6 col-md-3 termino -->
            
            <div class="col-sm-6 col-md-3"><!-- col-sm-6 col-md-3 empieza -->
                
                <h4>Encuentranos</h4>
                
                <p><!-- p Start -->
                    
                    <strong>Vicenta</strong>
                    <br/>Direccion
                    <br/>Numero
                    <br/>Mail
                    <br>
                    <br/><Strong>GlizzyCorp</Strong></a>
                    
                </p><!-- p termino -->
                
                <a href="GlizzyUs.php">Mira nuestra pagina de contactos</a>
                
                <hr class="hidden-md hidden-lg">
                
            </div><!-- col-sm-6 col-md-3 termino -->
            
            <div class="col-sm-6 col-md-3">
                
                <h4>Mira nuestras noticias</h4>
                
                <p class="text-muted">
                    No te pierdas nuestros productos
                </p>
                
                <form action="" method="post"><!-- form empieza -->
                    <div class="input-group"><!-- input-group empieza -->
                        
                        <input type="text" class="form-control" name="email">
                        
                        <span class="input-group-btn"><!-- input-group-btn empieza -->
                            
                            <input type="submit" value="subscribe" class="btn btn-default">
                            
                        </span><!-- input-group-btn termino -->
                        
                    </div><!-- input-group termino -->
                </form><!-- form termino -->
                
                <hr>
                
                <h4>Mantente en contacto</h4>
                
                <p class="social">
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-instagram"></a>
                    <a href="#" class="fa fa-google-plus"></a>
                    <a href="#" class="fa fa-envelope"></a>
                </p>
                
            </div>
        </div><!-- row termino -->
    </div><!-- container termino -->
</div><!-- #footer termino -->


<div id="copyright"><!-- #copyright empieza -->
    <div class="container"><!-- container empieza -->
        <div class="col-md-6"><!-- col-md-6 empieza -->
            
            <p class="pull-left">&copy; 2018 Vicenta Todos los derechos reservados</p>
            
        </div><!-- col-md-6 termino -->
        <div class="col-md-6"><!-- col-md-6 empieza -->
            
            <p class="pull-right">Hecho por : <a href="#">GlizzyCorp</a></p>
            
        </div><!-- col-md-6 termino -->
    </div><!-- container termino -->
</div><!-- #copyright termino -->