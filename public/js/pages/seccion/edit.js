function previous(){
    window.history.back();
}

$(document).ready(function() {
    // Objeto para almacenar los valores originales de la capacidad por grado
    var capacidadesOriginales = {};
    
    // Capturar el evento de cambio en el select de grado
    $('select[name="grado_edit"]').on('change', function() {
        var gradoId = $(this).val();

        // Realizar una petición AJAX para obtener la capacidad del grado seleccionado
        $.ajax({
            url: '/get-capacity/' + gradoId, // Ruta que debe apuntar a una función en tu controlador para obtener la capacidad
            method: 'GET',
            success: function(response) {
                if (response.success) {
                    // Actualizar el campo de capacidad con la capacidad obtenida
                    var capacidadGrado = response.capacity;
                    var secciones = response.sections;

                    // Calcular la capacidad ajustada considerando las secciones existentes
                    var capacidadAjustada = capacidadGrado - secciones;

                    // Almacenar el valor original de la capacidad para este grado
                    capacidadesOriginales[gradoId] = capacidadAjustada;

                    // Actualizar el campo de capacidad con la capacidad ajustada
                    $('input[name="capacidad_edit"]').val(capacidadAjustada);

                } else {
                    console.error('No se pudo obtener la capacidad del grado y las secciones asociadas.');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error en la petición AJAX:', error);
            }
        });
    });

    // Capturar el evento de cambio en el input de capacidad
    $('input[name="capacidad_edit"]').on('keyup', function() {
        var nuevaCapacidad = $(this).val();
        var gradoId = $('select[name="grado_edit"]').val();

        // Obtener el valor original de la capacidad para este grado
        var capacidadOriginal = capacidadesOriginales[gradoId];
        
        // Comparar la nueva capacidad con la original
        if (parseInt(nuevaCapacidad) > parseInt(capacidadOriginal)) {
            // Mostrar una alerta con Swal
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'La nueva capacidad no puede ser mayor que la capacidad original.',
                confirmButtonText: 'OK'
            });

            // Restaurar el valor original
            $(this).val(capacidadOriginal);
        }
    });

});