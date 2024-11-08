<?php
include("db.php");
include("functions/functions.php");
session_start();

if (isset($_POST['pro_id'])) {
    $pro_id = $_POST['pro_id'];

    // Verifica si el cliente está autenticado
    if (isset($_SESSION['cliente_email'])) {
        $cliente_email = $_SESSION['cliente_email'];

        // Prepara la consulta para obtener el cliente_id
        $stmt = $con->prepare("SELECT cliente_id FROM customer WHERE cliente_email = ?");
        $stmt->bind_param("s", $cliente_email); // "s" porque es un string
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $c_id = $row['cliente_id'];

            // Ahora eliminar el producto del carrito
            $stmt = $con->prepare("DELETE FROM cart WHERE p_id = ? AND cliente_id = ?");
            $stmt->bind_param("ii", $pro_id, $c_id); // "ii" porque ambos son enteros

            if ($stmt->execute()) {
                echo "success";
            } else {
                echo "error";
            }
        } else {
            echo "cliente_no_encontrado"; // Si no se encuentra el cliente
        }

        // Cierra la sentencia después de usarla
        $stmt->close();
    } else {
        echo "no_authenticated"; // El cliente no está autenticado
    }
}
?>
