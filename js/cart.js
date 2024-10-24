
$(document).ready(function() {
    // Detect click on the remove button
    $(".remove-item").on("click", function() {
        var pro_id = $(this).data("id"); // Get the product ID

        // AJAX request
        $.ajax({
            url: "elim_carr.php", // Navega a la carpeta anterior para encontrar elim_carr.php
            method: "POST",
            data: { pro_id: pro_id },
            success: function(response) {
                console.log("Respuesta del servidor: " + response); // Verificar la respuesta
                if (response === "success") {
                    // Recargar la tabla del carrito sin recargar toda la página
                    $("#cart").load("cart.php #cart > *");
                } else {
                    alert("Hubo un error al eliminar el producto");
                }
            },
            error: function(xhr, status, error) {
                console.log("Error en la solicitud AJAX: " + error);
            }
        });
        
});
});
