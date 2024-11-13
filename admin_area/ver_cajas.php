<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                
                <i class="fa fa-dashboard"></i> panel / Ver cajas
                
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                
                    <i class="fa fa-tags fa-fw"></i> Ver cajas
                
                </h3>
            </div>
            
            <div class="panel-body">
            
                <?php 
                
                    $get_boxes = "select * from cajas_texto";
        
                    $run_boxes = mysqli_query($con,$get_boxes);
        
                    while($run_boxes_section=mysqli_fetch_array($run_boxes)){
                        
                        $caja_id = $run_boxes_section['caja_id'];
                        
                        $caja_titulo = $run_boxes_section['caja_titulo'];
                        
                        $caja_desc = $run_boxes_section['caja_desc'];
                
                ?>
                
                <div class="col-lg-4 col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title" align="center">
                            
                                <?php echo $caja_titulo; ?>
                                
                            </h3>
                        </div>
                        
                        <div class="panel-body">
                            
                        <?php echo $caja_desc; ?>
                            
                        </div>
                        
                        <div class="panel-footer">
                            <center>
                                
                                <a href="index.php?borrar_caja=<?php echo $caja_id; ?>" class="pull-right">
                                
                                 <i class="fa fa-trash"></i> Borrar
                                
                                </a>
                                
                                <a href="index.php?editar_caja=<?php echo $caja_id; ?>" class="pull-left">
                                
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