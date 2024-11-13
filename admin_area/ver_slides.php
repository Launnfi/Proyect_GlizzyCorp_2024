<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                
                <i class="fa fa-dashboard"></i> Panel / Ver imagenes del carrucel
                
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                
                    <i class="fa fa-tags fa-fw"></i> Ver Imagenes
                
                </h3>
            </div>
            
            <div class="panel-body">
            
                <?php 
                
                    $get_slides = "SELECT * from slider";
        
                    $run_slides = mysqli_query($con,$get_slides);
        
                    while($row_slides=mysqli_fetch_array($run_slides)){
                        
                        $slide_id = $row_slides['slide_id'];
                        
                        $slide_name = $row_slides['slide_name'];
                        
                        $slide_image = $row_slides['slide_image'];
                
                ?>
                
                <div class="col-lg-3 col-md-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title" align="center">
                            
                                <?php echo $slide_name; ?>
                                
                            </h3>
                        </div>
                        
                        <div class="panel-body">
                            
                            <img src="slides_images/<?php echo $slide_image; ?>" alt="<?php echo $slide_name; ?>" class="img-responsive">
                            
                        </div>
                        
                        <div class="panel-footer">
                            <center>
                                
                                <a href="index.php?borrar_slide=<?php echo $slide_id; ?>" class="pull-right">
                                
                                 <i class="fa fa-trash"></i> Eliminar
                                
                                </a>
                                
                                <a href="index.php?editar_slide=<?php echo $slide_id; ?>" class="pull-left">
                                
                                 <i class="fa fa-pencil"></i> Editar
                                
                                </a>
                                
                                <div class="clearfix"></div>
                                
                            </center>
                        </div>
                        
                    </div>
                </div>
                
                <?php } ?>
            
            </div>
            
        </div>
    </div>
</div>


<?php } ?>