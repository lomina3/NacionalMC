// ===== FUNCIONES PRINCIPALES ===== //

// 1. Selector de idioma visible/oculto
window.toggleLanguageSelector = function() {
  const selector = document.getElementById('language-selector');
  if (selector) selector.classList.toggle('hidden');
};

// 2. Cargar JSON de idiomas
function cargarJSON(url) {
  return fetch(url)
    .then(response => {
      if (!response.ok) throw new Error(`Error ${response.status} al cargar ${url}`);
      return response.json();
    });
}

// 3. Aplicar traducciones
function aplicarTraducciones(traducciones) {
  document.querySelectorAll('[data-traduccion]').forEach(elemento => {
    const clave = elemento.getAttribute('data-traduccion');
    if (clave && traducciones[clave]) {
      // Maneja elementos con iconos u otros hijos
      if (elemento.children.length > 0) {
        const spans = elemento.querySelectorAll('span[data-traduccion]');
        spans.forEach(span => {
          if (span.getAttribute('data-traduccion') === clave) {
            span.textContent = traducciones[clave];
          }
        });
      } else {
        elemento.textContent = traducciones[clave];
      }
    }
  });
}

// 4. Cambiar idioma principal
window.cambiarIdioma = async function(idioma) {
  try {
    const rutaJSON = `./assets/languages/${idioma}.json`;
    console.log('Cargando idioma:', rutaJSON);
    
    const traducciones = await cargarJSON(rutaJSON);
    aplicarTraducciones(traducciones);
    
    // Actualizar selector si existe
    const select = document.getElementById('list');
    if (select) select.value = idioma;
    
  } catch (err) {
    console.error('Error al cambiar idioma:', err);
  }
};

// ===== INICIALIZACIÓN ===== //
document.addEventListener('DOMContentLoaded', function() {
  // Configurar selector de idioma
  const languageSelect = document.getElementById('list');
  
  if (languageSelect) {
    // Cargar idioma guardado o predeterminado
    const lang = localStorage.getItem('lang') || languageSelect.value;
    cambiarIdioma(lang);
    
    // Evento change
    languageSelect.addEventListener('change', function() {
      localStorage.setItem('lang', this.value);
      cambiarIdioma(this.value);
    });
  }
  
});