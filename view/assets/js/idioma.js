// 1. Mostrar/ocultar selector
window.toggleLanguageSelector = function() {
  const selector = document.getElementById('language-selector');
  if (selector) selector.classList.toggle('hidden');
};

// 2. Cargar JSON de idiomas
function cargarJSON(url) {
  return fetch(url).then(response => {
    if (!response.ok) throw new Error(`Error ${response.status} al cargar ${url}`);
    return response.json();
  });
}

// Utilidad: cambiar SOLO el nodo de texto del elemento (sin borrar hijos)
function setTextPreservingChildren(el, text) {
  const textNode = Array.from(el.childNodes).find(n => n.nodeType === Node.TEXT_NODE);
  if (textNode) {
    textNode.nodeValue = text;
  } else {
    el.insertBefore(document.createTextNode(text), el.firstChild);
  }
}

// 3. Aplicar traducciones (texto + placeholders)
function aplicarTraducciones(traducciones) {
  // a) Texto en elementos con data-traduccion
  document.querySelectorAll('[data-traduccion]').forEach(el => {
    const key = el.getAttribute('data-traduccion');
    const val = traducciones && traducciones[key];
    if (!val) return;

    if (el.childElementCount === 0) {
      el.textContent = val;
    } else {
      setTextPreservingChildren(el, val);
    }
  });

  // b) Placeholders
  document.querySelectorAll('[data-traduccion-placeholder]').forEach(el => {
    const key = el.getAttribute('data-traduccion-placeholder');
    const val = traducciones && traducciones[key];
    if (val) el.setAttribute('placeholder', val);
  });
}

// 4. Cambiar idioma principal
window.cambiarIdioma = async function(idioma) {
  try {
    const rutaJSON = `./assets/languages/${idioma}.json`;
    const traducciones = await cargarJSON(rutaJSON);
    aplicarTraducciones(traducciones);

    const select = document.getElementById('list');
    if (select) select.value = idioma;

    localStorage.setItem('lang', idioma);
  } catch (err) {
    console.error('Error al cambiar idioma:', err);
  }
};

// 5. Guardar idioma y aplicarlo al cambiar selector
window.cambiarUbicacion = function(idioma) {
  localStorage.setItem('lang', idioma);
  cambiarIdioma(idioma);
};

// ===== INICIALIZACIÓN ===== //
document.addEventListener('DOMContentLoaded', function() {
  const languageSelect = document.getElementById('list');
  const lang = localStorage.getItem('lang') || (languageSelect && languageSelect.value) || 'es';
  cambiarIdioma(lang);

  if (languageSelect) {
    languageSelect.value = lang;
    languageSelect.addEventListener('change', function() {
      cambiarUbicacion(this.value);
    });
  }
});
