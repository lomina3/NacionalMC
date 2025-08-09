/***
 * 
 *      NAV BAR
 * 
 ***/

document.addEventListener('DOMContentLoaded', function() {
    const header = document.querySelector("header");
    const videoContainer = document.querySelector(".video-container");
    const logo = document.querySelector(".logo img");

    if (!header || !videoContainer || !logo) {
        console.error("No se encontraron elementos necesarios");
        return;
    }

    window.addEventListener("scroll", function() {
        const mitadVideo = videoContainer.offsetTop + (videoContainer.offsetHeight / 2);
        
        // Cambiar clase del header
        header.classList.toggle("abajo", window.scrollY > mitadVideo);
        
        // Cambiar logo - verifica rutas absolutas
        const newLogo = window.scrollY > mitadVideo 
            ? "/images/logos/logoDoradoCustom.png" 
            : "/images/logos/logoBlanco.png";
        
        // Verificar si la imagen existe antes de cambiar
        const imgTest = new Image();
        imgTest.onload = function() {
            logo.src = newLogo;
        };
        imgTest.onerror = function() {
            console.error("No se pudo cargar la imagen:", newLogo);
        };
        imgTest.src = newLogo;
    });
});

/***
 * 
 *      SELECTOR IDIOMA
 * 
 ***/
// Selector de idioma mejorado
function toggleLanguageSelector() {
    const selector = document.getElementById('language-selector');
    if (selector) {
        selector.classList.toggle('hidden');
    } else {
        console.error("No se encontró el selector de idioma");
    }
}

// Cargar idioma inicial
document.addEventListener('DOMContentLoaded', function() {
    // Configurar evento para el selector
    const langSelector = document.getElementById('language-selector');
    if (langSelector) {
        langSelector.addEventListener('change', function(e) {
            cambiarIdioma(e.target.value);
        });
    }
    
    // Cargar idioma guardado o predeterminado
    const idiomaGuardado = localStorage.getItem('idiomaPreferido') || 'es';
    cambiarIdioma(idiomaGuardado);
});

// Función mejorada para cambiar idioma
async function cambiarIdioma(idioma) {
    try {
        const response = await fetch(`/assets/languages/${idioma}.json`);
        if (!response.ok) throw new Error("Idioma no encontrado");
        
        const traducciones = await response.json();
        aplicarTraducciones(traducciones);
        localStorage.setItem('idiomaPreferido', idioma);
        
    } catch (error) {
        console.error("Error cargando idioma:", error);
        // Intentar cargar idioma por defecto
        if (idioma !== 'es') cambiarIdioma('es');
    }
}

function aplicarTraducciones(traducciones) {
    document.querySelectorAll('[data-traduccion]').forEach(elemento => {
        const clave = elemento.getAttribute('data-traduccion');
        if (traducciones[clave]) {
            elemento.textContent = traducciones[clave];
        }
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