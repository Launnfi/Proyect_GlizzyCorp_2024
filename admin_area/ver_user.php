<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> panel / Ver Usuarios
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  Ver usuarios
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> No: </th>
                                <th> Nombre usuario: </th>
                                <th> Imagen: </th>
                                <th> E-Mail: </th>
                                <th> ciudad: </th>
                                <th> Trabajo: </th>
                                <th> info: </th>
                                <th> Contacto: </th>
                                <th> Editar: </th>
                                <th> Borrar: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                            
                                $get_a = "SELECT * from admin";
                                
                                $run_a = mysqli_query($con,$get_a);
          
                                while($row_a=mysqli_fetch_array($run_a)){
                                    
                                    $a_id = $row_a['admin_id'];
                                    
                                    $a_name = $row_a['admin_nombre'];
                                    
                                    $a_img = $row_a['admin_img'];
                                    
                                    $a_email = $row_a['admin_email'];

                                    $a_city = $row_a['admin_ciudad'];
                                    
                                    $a_info = $row_a['admin_sobre'];

                                    $a_trabajo = $row_a['admin_trabajo'];
                                    
                                    $a_contact = $row_a['admin_contacto'];
                                    
                                    $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $a_name; ?> </td>
                                <td> <img src="admin_imagen/<?php echo $a_img; ?>" width="60" height="60"></td>
                                <td> <?php echo $a_email; ?> </td>
                                <td> <?php echo $a_city; ?> </td>
                                <td> <?php echo $a_trabajo ?> </td>
                                <td> <?php echo $a_info ?> </td>
                                <td> <?php echo $a_contact ?> </td>
                                <td> 
                                     
                                     <a href="index.php?perfil_admin=<?php echo $a_id; ?>">
                                     
                                        <i class="fa fa-pencil"></i> editar
                                    
                                     </a> 
                                     
                                </td>
                                <td> 
                                     
                                     <a href="index.php?borrar_user=<?php echo $a_id; ?>">
                                     
                                        <i class="fa fa-trash-o"></i> Borrar
                                    
                                     </a> 
                                     
                                </td>
                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php } ?>