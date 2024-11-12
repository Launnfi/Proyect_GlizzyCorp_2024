// Función que se llama al seleccionar un talle
function updatePrice(talle) {
    // Obtener el ID del producto desde un atributo data en el HTML
    const productId = document.querySelector('input[name="pro_id"]').value;

    // Verificar si se ha seleccionado un talle válido
    if (!talle) {
        // Opcionalmente, muestra un mensaje de error o limpia el precio
        document.querySelector('.price').innerHTML = "Seleccione un talle";
        return;
    }

    // Hacer la llamada AJAX a get_variant_price.php
    $.ajax({
        url: 'includes/obtener_var_p.php', // Archivo PHP que obtiene el precio de la variante
        type: 'POST',
        dataType: 'json',
        data: { talle: talle, product_id: productId },
        success: function(response) {
            // Verificar si el precio fue obtenido correctamente
            if (response.price !== null) {
                // Actualizar el precio mostrado en el HTML
                let priceText = `Precio: $${response.price}`;

                // Si existe un precio de oferta, mostrarlo
                if (response.sale_price) {
                    priceText = `
                        Precio: <del>$${response.price}</del><br/>
                        Oferta: $${response.sale_price}
                    `;
                }

                document.querySelector('.price').innerHTML = priceText;
            } else {
                document.querySelector('.price').innerHTML = "Precio no disponible";
            }
        },
        error: function() {
            // En caso de error, mostrar un mensaje al usuario
            document.querySelector('.price').innerHTML = "Error al obtener el precio";
        }
    });
}
