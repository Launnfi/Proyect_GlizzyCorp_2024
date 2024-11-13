<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                
                <i class="fa fa-dashboard"></i> panel / Ver clientes
                
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               <h3 class="panel-title">
               
                   <i class="fa fa-tags"></i>  Ver clientes
                
               </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        
                        <thead>
                            <tr>
                                <th> No: </th>
                                <th> Nombre: </th>
                                <th> Imagen: </th>
                                <th> E-Mail: </th>
                                <th> ciudad: </th>
                                <th> direccion: </th>
                                <th> Contacto: </th>
                                <th> Borrar: </th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            
                            <?php 
          
                                $i=0;
                            
                                $get_c = "select * from customer";
                                
                                $run_c = mysqli_query($con,$get_c);
          
                                while($row_c=mysqli_fetch_array($run_c)){
                                    
                                    $c_id = $row_c['cliente_id'];
                                    
                                    $c_name = $row_c['cliente_nombre'];
                                    
                                    $c_img = $row_c['cliente_img'];
                                    
                                    $c_email = $row_c['cliente_email'];
                                    
                                    $c_city = $row_c['cliente_ciudad'];
                                    
                                    $c_address = $row_c['cliente_direccion'];
                                    
                                    $c_contact = $row_c['cliente_contacto'];
                                    
                                    $c_estado = $row_c['activo'];

                                    if($c_estado == 0){
                                        $estado = "Inactivo";

                                    }else{
                                        $estado = "Activo";
                                    }
                                    
                                    $i++;
                            
                            ?>
                            
                            <tr>
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $c_name; ?> </td>
                                <td> <img src="../customer/customer_images/<?php echo $c_img; ?>" width="60" height="60"></td>
                                <td> <?php echo $c_email; ?> </td>
                                <td> <?php echo $c_city; ?> </td>
                                <td> <?php echo $c_address ?> </td>
                                <td> <?php echo $c_contact ?> </td>
                                <td> <?php echo $estado ?> </td>
                                <td> 
                                     
                                     <a href="index.php?borrar_clientes=<?php echo $c_id; ?>">
                                     
                                        <i class="fa fa-trash-o"></i> Borrar
                                    
                                     </a> 
                                     
                                </td>
                            </tr>
                            
                            <?php } ?>
                            
                        </tbody>
                        <a href="index.php?grafica">Ver grafico de clientes</a>
                    </table>
                    <div id="barchart_values" style="width: 400px; height: 400px;"></div>
                </div>
            </div>
            
            </div>
    </div>
</div>

<?php } ?>