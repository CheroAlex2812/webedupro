// Obtener el elemento de entrada de archivos y la vista previa de la imagen
const fileInput = document.getElementById('example-fileinput');
const uploadPreviewTemplate = document.getElementById('uploadPreviewTemplate');
const removeButton = document.querySelector('[data-remove-button-create]');

// Agregar un evento de escucha para el cambio en el campo de entrada de archivos
fileInput.addEventListener('change', function () {
    // Verificar si se seleccionó un archivo
    if (fileInput.files.length > 0) {
        const file = fileInput.files[0];

        // Cambiar la clase para mostrar el contenedor de vista previa
        uploadPreviewTemplate.style.display = 'block';

        // Actualizar el nombre y el peso del archivo en la vista previa
        const fileNameElement = uploadPreviewTemplate.querySelector('[data-dz-name]');
        const fileSizeElement = uploadPreviewTemplate.querySelector('[data-dz-size]');
        
        fileNameElement.textContent = file.name;
        fileSizeElement.textContent = (file.size / 1024).toFixed(2) + ' KB';

        // Crear un objeto FileReader
        const reader = new FileReader();

        // Configurar una función de devolución de llamada para cuando se cargue la imagen
        reader.onload = function (e) {
            // Establecer la fuente de la imagen previa con los datos de la imagen cargada
            document.getElementById('image-preview').src = e.target.result;
        };

        // Leer el archivo seleccionado como una URL de datos
        reader.readAsDataURL(file);
    } else {
        // Si no se selecciona ningún archivo, ocultar el contenedor de vista previa
        uploadPreviewTemplate.style.display = 'none';
    }
});
// Agregar un evento de clic al botón de eliminar
removeButton.addEventListener('click', function (e) {
    e.preventDefault();

    // Restablecer el campo de entrada de archivos
    fileInput.value = '';

    // Ocultar el div de vista previa
    uploadPreviewTemplate.style.display = 'none';
});


function previous(){
    window.history.back();
}