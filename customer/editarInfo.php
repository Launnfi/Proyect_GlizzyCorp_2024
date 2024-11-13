<h1 aling= "center">Editar cuenta</h1>
<?php 

$customer_session = $_SESSION['cliente_email'];

$get_customer = "select * from customer where cliente_email='$customer_session'";

$run_customer = mysqli_query($con,$get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$cliente_id = $row_customer['cliente_id'];

$cliente_nombre = $row_customer['cliente_nombre'];

$cliente_email = $row_customer['cliente_email'];

$cliente_ciudad = $row_customer['cliente_ciudad'];

$cliente_contacto = $row_customer['cliente_contacto'];

$cliente_direccion = $row_customer['cliente_direccion'];

$cliente_img = $row_customer['cliente_img'];

?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
    <label>Nombre</label>
    <input type="text" name="c_name" class="form-control" value="<?php echo $cliente_nombre; ?>" required>
    </div>

    <div class="form-group">
    <label>Mail</label>
    <input type="text" name="c_email" class="form-control" value="<?php echo $cliente_email; ?>" required>
    </div>

    <div class="form-group">
    <label>departamento</label>
    <input type="text" name="c_departamento" class="form-control" value="<?php echo $cliente_ciudad; ?>" required>
    </div>

    <div class="form-group">
    <label>Direccion</label>
    <input type="text" name="c_direccion" class="form-control" value="<?php echo $cliente_direccion; ?>" required>
    </div>

    <div class="form-group ">
    <label>Contacto</label>
    <input type="text" name="c_contacto" class="form-control" value="<?php echo $cliente_contacto; ?>" required>
    </div>

    <div class="form-group form-height-custom">
    <label>Foto de perfil</label>
    <input type="file" name="c_image" class="form-control form-height-custom" required>

    <img class="img-responsive" src="customer_images/<?php echo $cliente_img; ?>" alt="Costumer Image">
    </div>

    <div class="text-center">

        <button name="update" class="btn btn-primary">

            <i class="fa fa-user-md"></i> Cambiar informacion

        </button>
    
    </div>

        
    

</form>

<?php 

if(isset($_POST['update'])){
    
    $update_id = $cliente_id;
    
    $c_name = $_POST['c_name'];
    
    $c_email = $_POST['c_email'];
    
    $c_departamento = $_POST['c_departamento'];
    
    $c_direccion = $_POST['c_direccion'];
    
    $c_contacto = $_POST['c_contacto'];
    
    $c_image = $_FILES['c_image']['name'];
    
    $c_image_tmp = $_FILES['c_image']['tmp_name'];
    
    move_uploaded_file ($c_image_tmp,"customer_images/$c_image");
    
    $update_customer = "update customer set cliente_nombre='$c_name',cliente_email='$c_email',cliente_ciudad='$c_departamento',cliente_direccion='$c_direccion',cliente_contacto='$c_contacto',cliente_img='$c_image' where cliente_id='$update_id' ";
    
    $run_customer = mysqli_query($con,$update_customer);
    
    if($run_customer){
        
        echo "<script>alert('Tu cuenta se ha actualizado, por favor reinicie la sesion')</script>";
        
        echo "<script>window.open('../logout.php','_self')</script>";
        
    }
    
}

?>