<?php
if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";

} else {
?>
<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Panel / ver Categorias
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-tags fa-fw"></i> Ver Categorias
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-hover table-striped table-bordered"><!-- tabel tabel-hover table-striped table-bordered begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> Cat ID </th>
                                <th> Titulo Categoria </th>
                                <th> Desc Categoria </th>
                                <th> Estado </th>
                                <th> Edit Categoria </th>
                                <th> Eliminar Categoria </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
                            
                              
                                $i = 0;

                                $get_cats = "SELECT * FROM categorias";

                                $run_cats = mysqli_query($con, $get_cats);

                                while($row_cats = mysqli_fetch_array($run_cats)){
                                    
                                    $cat_id = $row_cats['cat_id'];
                                    
                                    $cat_titulo = $row_cats['cat_titulo'];
                                    
                                    $cat_desc = $row_cats['cat_desc'];

                                    $cat_act = $row_cats['activo']; // Esta es la variable correcta

                                    if($cat_act == 0){
                                        $estado = "inactiva";
                                    } else {
                                        $estado = "activa";
                                    }
                                    
                                    $i++;
                               
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $cat_titulo; ?> </td>
                                <td width="300"> <?php echo $cat_desc; ?> </td>
                                <td> <?php echo $estado; ?> </td>
                                <td> 
                                    <a href="index.php?editar_cat= <?php echo $cat_id; ?> ">
                                        <i class="fa fa-pencil"></i> Editar
                                    </a>
                                </td>
                                <td> 
                                    <a href="index.php?borrar_cat= <?php echo $cat_id; ?> ">
                                        <i class="fa fa-trash"></i> Eliminar
                                    </a>
                                </td>
                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                        
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- tabel tabel-hover table-striped table-bordered finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->







<?php }?>