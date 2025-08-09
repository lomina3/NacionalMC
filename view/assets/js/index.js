/***
 * 
 *      NAV BAR
 * 
 ***/
window.addEventListener("scroll", function () {
    var header = document.querySelector("header");
    var videoContainer = document.querySelector(".video-container");
    var mitadVideo = videoContainer.offsetTop + videoContainer.offsetHeight / 9;
    var logo = document.querySelector(".logo img");

    // Activa el css "abajo" cuando se hace scroll
    header.classList.toggle("abajo", window.scrollY > mitadVideo);

    // Cambia la imagen del logo cuando se hace scroll
    if (window.scrollY > mitadVideo) {
        logo.src = "./assets/images/logoDoradoCustom.png";
    } else {
        logo.src = "./assets/images/logoBlanco.png";
    }
});

/***
 * 
 *      SELECTOR IDIOMA
 * 
 ***/
function toggleLanguageSelector() {
    var selector = document.getElementById('language-selector');
    selector.classList.toggle('hidden');
  }
  

/***
 * 
 *      CARGAR JSON
 * 
 ***/
function cargarJSON(url, callback) {
    var xhr = new XMLHttpRequest();
    xhr.overrideMimeType("application/json");
    xhr.open("GET", url, true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        callback(JSON.parse(xhr.responseText));
      }
    };
    xhr.send(null);
  }
  
  function cambiarIdioma(idioma) {
    // Ajusta la ruta según la ubicación de tus archivos JSON
    var rutaJSON = './assets/languages/' + idioma + '.json';

    cargarJSON(rutaJSON, function (traducciones) {
        // Aplica las traducciones a los elementos según su identificador
        var elementos = document.querySelectorAll('[data-traduccion]');
        elementos.forEach(function (elemento) {
            var identificador = elemento.getAttribute('data-traduccion');
            elemento.textContent = traducciones[identificador] || '';
        });
    });
}

/***
* 
*      BUTTON UP
* 
***/
document.addEventListener('DOMContentLoaded', function () {
    // Función para mostrar/ocultar la flecha
    function toggleArrowVisibility() {
        var flecha_up = document.getElementById('flecha_up');
        var umbralDesplazamiento = 500;

        if (window.scrollY > umbralDesplazamiento) {
            flecha_up.style.opacity = 1;
        } else {
            flecha_up.style.opacity = 0;
        }
    }

    // Función para hacer scroll suave hacia arriba
    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    // Agrega el evento de scroll para mostrar/ocultar la flecha
    window.addEventListener('scroll', toggleArrowVisibility);

    // Agrega el evento de clic a la flecha para hacer scroll suave
    var flecha_up = document.getElementById('flecha_up');
    flecha_up.addEventListener('click', scrollToTop);
});




/***
*       CARRUSEL
***/