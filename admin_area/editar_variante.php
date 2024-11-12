<?php 

if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
} else {

?>

<?php 

if(isset($_GET['editar_variante'])){

    $edit_id = $_GET['editar_variante'];
    $edit_variant = "SELECT * FROM variantes WHERE var_id='$edit_id'";
    $run_edit_variant = mysqli_query($con, $edit_variant);
    $row_edit_variant = mysqli_fetch_array($run_edit_variant);

    $variante_id = $row_edit_variant['var_id'];
    $variante_precio = $row_edit_variant['precio_var'];
    $variante_precio_of = $row_edit_variant['var_precio_of'];
    $variante_talla = $row_edit_variant['talle'];
    $variante_stock = $row_edit_variant['stock_var'];
    $producto_id = $row_edit_variant['producto_id'];

    $get_products = "SELECT * FROM productos WHERE producto_id='$producto_id'";
    $run_products = mysqli_query($con, $get_products);
    $row_products = mysqli_fetch_array($run_products);

    $producto_titulo = $row_products['producto_titulo'];

}

?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Panel / Editar Variante
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Editar Variante
                </h3>
            </div>
            <div class="panel-body">
                <form method="post" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Precio </label> 
                        <div class="col-md-6">
                            <input value="<?php echo $variante_precio; ?>" name="precio" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Precio oferta </label> 
                        <div class="col-md-6">
                            <input value="<?php echo $variante_precio_of; ?>" name="precio_off" type="text" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"> Talla </label> 
                        <div class="col-md-6">
                        <select name="talle" class="form-control" required>
                                <option value="S" <?php if($variante_talla == 'S') echo 'selected'; ?>>S</option>
                                <option value="M" <?php if($variante_talla == 'M') echo 'selected'; ?>>M</option>
                                <option value="L" <?php if($variante_talla == 'L') echo 'selected'; ?>>L</option>
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"> Stock </label> 
                        <div class="col-md-6">
                            <input value="<?php echo $variante_stock; ?>" name="stock" type="number" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"> Seleccionar Producto </label> 
                        <div class="col-md-6">
                            <select name="producto_id" class="form-control" required>
                                <option value="<?php echo $producto_id; ?>"><?php echo $producto_titulo; ?></option>
                                <?php 
                                    $get_p = "SELECT * FROM productos";
                                    $run_p = mysqli_query($con, $get_p);
                                    while($row_p = mysqli_fetch_array($run_p)){
                                        $p_id = $row_p['producto_id'];
                                        $p_title = $row_p['producto_titulo'];
                                        echo "<option value='$p_id'>$p_title</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>

                   

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label> 
                        <div class="col-md-6">
                            <input name="update" value="Actualizar Variante" type="submit" class="btn btn-primary form-control">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php 

if(isset($_POST['update'])){

    $precio = $_POST['precio'];
    $precio_off = $_POST['precio_off'];
    $talle = $_POST['talle'];
    $stock = $_POST['stock'];
    $producto_id = $_POST['producto_id'];

    $update_variant = "UPDATE variantes SET producto_id='$producto_id', precio_var='$precio', var_precio_of='$precio_off', talle='$talle', stock_var='$stock' WHERE var_id='$variante_id'";
    $run_update_variant = mysqli_query($con, $update_variant);

    if($run_update_variant){
        echo "<script>alert('La variante ha sido actualizada')</script>";
        echo "<script>window.open('index.php?ver_var','_self')</script>";
    }
}

?>

<?php } ?>
