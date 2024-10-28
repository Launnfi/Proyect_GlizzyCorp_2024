<?php 
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    } else {
?>

<?php 
    if(isset($_GET['editar_p_cat'])){
        $edit_p_cat_id = $_GET['editar_p_cat'];
        $edit_p_cat_query = "SELECT * FROM productos_categorias WHERE p_cat_id='$edit_p_cat_id'";
        $run_edit = mysqli_query($con, $edit_p_cat_query);
        $row_edit = mysqli_fetch_array($run_edit);
        
        $p_cat_id = $row_edit['p_cat_id'];
        $p_cat_titulo = $row_edit['p_cat_titulo'];
        $p_cat_desc = $row_edit['p_cat_desc'];
    }
?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> Panel / Editar Categoría del Producto
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-pencil fa-fw"></i> Editar Categoría de Producto
                </h3>
            </div>
            
            <div class="panel-body">
                <form action="" class="form-horizontal" method="post">
                    <div class="form-group">
                        <label class="control-label col-md-3"> 
                            Título de la Categoría del Producto
                        </label>
                        <div class="col-md-6">
                            <input value="<?php echo $p_cat_titulo; ?>" name="p_cat_titulo" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3"> 
                            Descripción de la Categoría del Producto 
                        </label>
                        <div class="col-md-6">
                            <textarea name="p_cat_desc" class="form-control"><?php echo $p_cat_desc; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <input value="Actualizar" name="update" type="submit" class="form-control btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php  
    if(isset($_POST['update'])){
        $p_cat_titulo = mysqli_real_escape_string($con, $_POST['p_cat_titulo']);
        $p_cat_desc = mysqli_real_escape_string($con, $_POST['p_cat_desc']);
        
        $update_p_cat = "UPDATE productos_categorias SET p_cat_titulo='$p_cat_titulo', p_cat_desc='$p_cat_desc' WHERE p_cat_id='$p_cat_id'";
        $run_p_cat = mysqli_query($con, $update_p_cat);
        
        if($run_p_cat){
            echo "<script>alert('Se ha actualizado con éxito')</script>";
            echo "<script>window.open('index.php?ver_p_cats','_self')</script>";
        }
    }
}