<h1 align="center">Cambiar contraseña</h1>

<form action="" method="post">
    <div class="form-group">
        <label>Contraseña anterior</label>
        <input type="password" name="old_pass" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Nueva contraseña</label>
        <input type="password" name="new_pass" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Confirmar contraseña</label>
        <input type="password" name="new_pass_again" class="form-control" required>
    </div>

    <div class="text-center">
        <button type="submit" name="submit" class="btn btn-primary">
            <i class="fa fa-user-md"></i> Cambiar información
        </button>
    </div>
</form>

<?php 
if (isset($_POST['submit'])) {
    $c_email = $_SESSION['cliente_email'];
    $c_old_pass = $_POST['old_pass'];
    $c_new_pass = $_POST['new_pass'];
    $c_new_pass_again = $_POST['new_pass_again'];

    // Seleccionar la contraseña encriptada del cliente
    $sel_c_old_pass = "SELECT cliente_pass FROM customer WHERE cliente_email='$c_email'";
    $run_c_old_pass = mysqli_query($con, $sel_c_old_pass);
    $row_c_old_pass = mysqli_fetch_array($run_c_old_pass);
    $hashed_old_pass = $row_c_old_pass['cliente_pass'];

    // Verificar la contraseña anterior
    if (!password_verify($c_old_pass, $hashed_old_pass)) {
        echo "<script>alert('Contraseña no válida, intente nuevamente')</script>";
        exit();
    }

    // Verificar que la nueva contraseña y la confirmación coincidan
    if ($c_new_pass != $c_new_pass_again) {
        echo "<script>alert('La nueva contraseña no coincide')</script>";
        exit();
    }

    // Encriptar la nueva contraseña
    $hashed_new_pass = password_hash($c_new_pass, PASSWORD_DEFAULT);

    // Actualizar la contraseña en la base de datos
    $update_c_pass = "UPDATE customer SET cliente_pass='$hashed_new_pass' WHERE cliente_email='$c_email'";
    $run_c_pass = mysqli_query($con, $update_c_pass);

    if ($run_c_pass) {
        echo "<script>alert('Tu contraseña se ha actualizado')</script>";
        echo "<script>window.open('my_account.php?misOrdenes', '_self')</script>";
    }
}
?>
