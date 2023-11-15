$(document).ready(function () {
    var container = $('.scroll');
    var scrollTimer;

    container.on('mouseenter', function() {
        var $this = $(this);
        $this.css('overflow', 'auto');
        clearTimeout(scrollTimer);
        startScrollTimer($this);
    });

    container.on('mouseleave', function() {
        var $this = $(this);
        clearTimeout(scrollTimer);
        $this.css('overflow', 'hidden');
    });

    container.on('scroll', function() {
        var $this = $(this);
        $this.css('overflow', 'auto');
        clearTimeout(scrollTimer);
        startScrollTimer($this);
    });

    container.on('touchstart touchmove touchend', function() {
        var $this = $(this);
        $this.css('overflow', 'auto');
        clearTimeout(scrollTimer);
        startScrollTimer($this);
    });

    function startScrollTimer($element) {
        scrollTimer = setTimeout(function() {
            $element.css('overflow', 'hidden');
            
        }, 2000); // Ajusta el tiempo de espera según tus preferencias
    }

    // Agregar detección de movimiento dentro del div
    container.on('mousemove', function() {
        var $this = $(this);
        $this.css('overflow', 'auto');
        clearTimeout(scrollTimer);
        startScrollTimer($this);
    });

    container.css('overflow', 'hidden');
});

//uso de localstorage

// // Obten el checkbox
// const checkbox = document.getElementById('chk');

// // Verifica si hay un valor almacenado en el LocalStorage
// if (localStorage.getItem("checkboxState") === "true") {
//     // Si hay un valor verdadero en el LocalStorage, marca el checkbox
//     checkbox.checked = true;
// }

// // Agrega un evento de cambio al checkbox
// checkbox.addEventListener("change", function () {
//     // Guarda el estado del checkbox en el LocalStorage
//     localStorage.setItem("checkboxState", this.checked);
// });
