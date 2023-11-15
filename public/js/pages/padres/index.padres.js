$(document).ready(function () {
    "use strict";

    // Configuración de DataTable
    var dataTable = $("#parents-datatable").DataTable({
        language: {
            paginate: {
                previous: "<i class='mdi mdi-chevron-left'>",
                next: "<i class='mdi mdi-chevron-right'>"
            },
            info: "Mostrando padres _START_ al _END_ de _TOTAL_",
            lengthMenu: 'Mostrar <select class=\'form-select form-select-sm ms-1 me-1\'><option value="10">10</option><option value="20">20</option><option value="-1">Todos</option></select> padres'
        },
        pageLength: 10,
        columns: [
            { orderable: false, render: function (data, type, row, meta) {
                if (type === 'display') {
                    data = '<div class="form-check"><input type="checkbox" class="form-check-input dt-checkboxes"><label class="form-check-label">&nbsp;</label></div>';
                }
                return data;
            },
            checkboxes: {
                selectRow: true,
                selectAllRender: '<div class="form-check"><input type="checkbox" class="form-check-input dt-checkboxes"><label class="form-check-label">&nbsp;</label></div>'
            }
            },
            { orderable: true },
            { orderable: true },
            { orderable: true },
            { orderable: true },
            { orderable: true },
            { orderable: true },
            { orderable: false }
        ],
        select: {
            style: "multi"
        },
        order: [[5, "asc"]],
        drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
            $("#products-datatable_length label").addClass("form-label");
        }
    });


    $('.estado-switch').change(function() {
        var padreId = $(this).data('padre-id');
        var estado = $(this).prop('checked') ? 'activo' : 'inactivo';

        $.ajax({
            type: 'POST',
            url: '/parents/switch/' + padreId,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                estado: estado
            },
            success: function(data) {

                $.toast({
                    heading: 'Success',
                    text: data.message,
                    showHideTransition: 'slide',
                    icon: 'success'
                })

            },
            error: function(xhr) {

                $.toast({
                    heading: 'Error',
                    text: 'Ha ocurrido un error al actualizar el estado',
                    showHideTransition: 'fade',
                    icon: 'error'
                })
                
            }
        });
    });

});


$(document).on('click', '.delete-button', function() {
    const padreId = $(this).data('padre-id');
    
    Swal.fire({
        title: '¿Estás seguro?',
        text: '¡No podrás deshacer esta acción!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/parents/delete/' + padreId,
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        // Eliminación exitosa
                        

                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Padre eliminado correctamente',
                            showConfirmButton: false,
                            timer: 1500
                          })

                        setTimeout(function() {
                            location.reload();
                        }, 2000);

                    } else {
                        Swal.fire('Error', 'No se pudo eliminar el padre de familia.', 'error');
                    }
                }
            });
            
        }
    });
});



