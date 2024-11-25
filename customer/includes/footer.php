<?php 
?>
<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-3">
               
               <h4>Paginas</h4>
                
                <ul>
                    <li><a href="cart.php">Carrito</a></li>
                    <li><a href="contact.php">Contactanos</a></li>
                    <li><a href="tienda.php">Tienda</a></li>
                    <li><a href="customer/my_account.php">Mi cuenta</a></li>
                </ul>

                <hr>
                
                <h4>Seccion de usuarios</h4>
                
                <ul>
                    <li><a href="customer/my_account.php?misOrdenes">Logearse</a></li>
                    <li><a href="customer_register.php">registarme</a></li>
                </ul>
                
                <hr class="hidden-md hidden-lg hidden-sm">
                
            </div>
            
            <div class="com-sm-6 col-md-3">
                
                <h4>Categorias de productos</h4>
                
                <ul>

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
                </ul>
                
                <hr class="hidden-md hidden-lg">
                
            </div>

            <div class="col-sm-6 col-md-3">
                
                <h4>Encuentranos</h4>
                
                <p><!-- p Start -->
                    
                    <strong>Vicenta</strong>
                    <br/> Uruguay 529, 50000 Salto
                    <br/>096354036
                    <br/>vicenta@gmail.com
                    <br>
                    <br/><Strong>GlizzyCorp</Strong></a>
                    
                </p>
                
                <a href="https://glizzycorp.shop/">Mira nuestra pagina de contactos</a>
                
                <hr class="hidden-md hidden-lg">
                
            </div>
            
            <div class="col-sm-6 col-md-3">
                
                <h4>Mira nuestras noticias</h4>
                
                <p class="text-muted">
                    No te pierdas nuestros productos
                </p>
                
               
                    <div class="input-group">
                        
                        <span class="input-group-btn">
                            
                            <button type="submit" value="Blog" class="btn btn-default"> <a href="../blog.php">Blog</a></button>
                            
                        </span>
                        
                    </div>
                </form>
                
                <hr>
                
                <h4>Visita nuestras Redes</h4>
                
                <p class="social">
                    <a href="https://www.facebook.com/vicenta.saltouy/?locale=es_LA" class="fa fa-facebook"></a>
                    <a href="https://www.instagram.com/vicenta_salto/" class="fa fa-instagram"></a>
                </p>
                
            </div>
        </div>
    </div>
</div>


<div id="copyright">
    <div class="container">
        <div class="col-md-6">
            
            <p class="pull-left">&copy; 2024 Vicenta Todos los derechos reservados</p>
            
        </div>
        <div class="col-md-6">
            
            <p class="pull-right">Hecho por : <a href="https://glizzycorp.shop/">GlizzyCorp</a></p>
            
        </div>
    </div>
</div>