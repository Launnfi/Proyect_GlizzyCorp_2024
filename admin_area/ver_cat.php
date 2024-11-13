<?php
if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";

} else {
?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                
                <i class="fa fa-dashboard"></i> Panel / ver Categorias
                
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                
                    <i class="fa fa-tags fa-fw"></i> Ver Categorias
                
                </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th> Cat ID </th>
                                <th> Titulo Categoria </th>
                                <th> Desc Categoria </th>
                                <th> Estado </th>
                                <th> Editar Categoria </th>
                                <th> Activar/Desactivar</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            
                            <?php 
                            
                              
                                $i = 0;

                                $get_cats = "SELECT * FROM categorias";

                                $run_cats = mysqli_query($con, $get_cats);

                                while($row_cats = mysqli_fetch_array($run_cats)){
                                    
                                    $cat_id = $row_cats['cat_id'];
                                    
                                    $cat_titulo = $row_cats['cat_titulo'];
                                    
                                    $cat_desc = $row_cats['cat_desc'];

                                    $cat_act = $row_cats['activo']; 

                                    if($cat_act == 0){
                                        $estado = "inactiva";
                                    } else {
                                        $estado = "activa";
                                    }
                                    
                                    $i++;
                               
                            
                            ?>
                            
                            <tr>
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
                                        <i class="fa fa-trash"></i> Activar/Desactivar
                                    </a>
                                </td>
                            </tr>
                            
                            <?php } ?>
                        
                        </tbody>
                        
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>







<?php }?>