function consulta_buscador(busqueda) {
    var dato = 'busca';
    var parametros = { "busqueda": busqueda, "dato": dato };

    $.ajax({
        data: parametros,
        url: '../includes/codigo.php',
        type: 'POST',
        beforeSend: function() {
            console.log("PROCESANDO");
        },
        success: function(data) {
            console.log("TODO OK");
        
            let cardBusqueda = document.getElementById("card_busqueda");
            let resultadosBusquedaNav = document.getElementById("resultados_busqueda_nav");
        
            if (busqueda === '') {
                cardBusqueda.style.opacity = 0;
                cardBusqueda.style.display = 'none';
            } else {
                cardBusqueda.style.transition = "all 1s";
                cardBusqueda.style.opacity = 1;
                cardBusqueda.style.display = 'block'; 
            }
        
            resultadosBusquedaNav.innerHTML = data;
            resultadosBusquedaNav.style.opacity = 1;
        },
    });
}