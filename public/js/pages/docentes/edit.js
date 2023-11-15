//imagen de editar
// Obtener el elemento de entrada de archivos y la vista previa de la imagen en el modal de edición
const fileInputEditar = document.getElementById('example-fileinput-editar');
const uploadPreviewTemplateEditar = document.getElementById('uploadPreviewTemplate-editar');
const removeButtonEditar = document.querySelector('[data-remove-button-edit]');

// Agregar un evento de escucha para el cambio en el campo de entrada de archivos en el modal de edición
fileInputEditar.addEventListener('change', function () {
    // Verificar si se seleccionó un archivo
    if (fileInputEditar.files.length > 0) {
        const file = fileInputEditar.files[0];

        // Cambiar la clase para mostrar el contenedor de vista previa en el modal de edición
        uploadPreviewTemplateEditar.style.display = 'block';

        // Actualizar el nombre y el peso del archivo en la vista previa
        const fileNameElementEditar = uploadPreviewTemplateEditar.querySelector('[data-dz-name]');
        const fileSizeElementEditar = uploadPreviewTemplateEditar.querySelector('[data-dz-size]');

        fileNameElementEditar.textContent = file.name;
        fileSizeElementEditar.textContent = (file.size / 1024).toFixed(2) + ' KB';

        // Crear un objeto FileReader
        const reader = new FileReader();

        // Configurar una función de devolución de llamada para cuando se cargue la imagen
        reader.onload = function (e) {
            // Establecer la fuente de la imagen previa con los datos de la imagen cargada en el modal de edición
            document.getElementById('image-preview-editar').src = e.target.result;
        };

        // Leer el archivo seleccionado como una URL de datos
        reader.readAsDataURL(file);
    } else {
        // Si no se selecciona ningún archivo, ocultar el contenedor de vista previa en el modal de edición
        uploadPreviewTemplateEditar.style.display = 'none';
    }
});

// Agregar un evento de clic al botón de eliminar en el modal de edición
removeButtonEditar.addEventListener('click', function (e) {
    e.preventDefault();

    // Restablecer el campo de entrada de archivos en el modal de edición
    fileInputEditar.value = '';

    // Ocultar el div de vista previa en el modal de edición
    uploadPreviewTemplateEditar.style.display = 'none';
});

function previous(){
    window.history.back();
}