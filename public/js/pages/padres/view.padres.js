// Obtener el elemento de entrada de archivos y la vista previa del archivo
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

        // Actualizar el nombre, extensión y peso del archivo en la vista previa
        const fileNameElement = uploadPreviewTemplate.querySelector('[data-dz-name]');
        const fileExtensionElement = uploadPreviewTemplate.querySelector('[data-dz-extension]');
        const fileSizeElement = uploadPreviewTemplate.querySelector('[data-dz-size]');

        fileNameElement.textContent = file.name;

        // Obtener la extensión del archivo
        const fileExtension = file.name.split('.').pop();
        fileExtensionElement.textContent = fileExtension;

        // Mostrar el peso del archivo en kilobytes
        fileSizeElement.textContent = (file.size / 1024).toFixed(2) + ' KB';

        // Actualizar el icono en función de la extensión del archivo
        const fileIconElement = uploadPreviewTemplate.querySelector('#file-icon');
        const extensionIcons = {
            'pdf': 'far fa-file-pdf',
            'doc': 'far fa-file-word',
            // Agregar más extensiones y sus iconos según sea necesario
        };
        const iconClass = extensionIcons[fileExtension] || 'far fa-file';
        fileIconElement.className = `fa-3x ${iconClass}`;;

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


