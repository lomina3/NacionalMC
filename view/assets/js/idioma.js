/***
 *  SELECTOR IDIOMA (mostrar/ocultar)
 ***/
function toggleLanguageSelector() {
  var selector = document.getElementById('language-selector');
  if (!selector) return;
  selector.classList.toggle('hidden');
}

/***
 *  CONFIG
 ***/
var NMC_LANG_KEY = 'nmc_lang';
var NMC_SUPPORTED = ['es', 'en', 'it'];
var NMC_DEFAULT = 'es';

/***
 *  UTIL: cargar JSON
 ***/
function cargarJSON(url, callback, onerror) {
  var xhr = new XMLHttpRequest();
  xhr.overrideMimeType("application/json");
  xhr.open("GET", url, true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        try {
          callback(JSON.parse(xhr.responseText));
        } catch (e) {
          if (onerror) onerror(e);
        }
      } else {
        if (onerror) onerror(new Error('HTTP ' + xhr.status + ' al cargar ' + url));
      }
    }
  };
  xhr.send(null);
}

/***
 *  APLICAR TRADUCCIONES AL DOM
 ***/
function aplicarTraducciones(dic) {
  // Texto interior
  var elementos = document.querySelectorAll('[data-traduccion]');
  elementos.forEach(function (el) {
    var key = el.getAttribute('data-traduccion');
    if (key && dic[key] != null) {
      el.textContent = dic[key];
    }
  });

  // Placeholders (opcional): <input data-tr-placeholder="clave">
  var placeholders = document.querySelectorAll('[data-tr-placeholder]');
  placeholders.forEach(function (el) {
    var key = el.getAttribute('data-tr-placeholder');
    if (key && dic[key] != null) {
      el.setAttribute('placeholder', dic[key]);
    }
  });

  // title/alt (opcional): data-tr-title / data-tr-alt
  var titled = document.querySelectorAll('[data-tr-title]');
  titled.forEach(function (el) {
    var key = el.getAttribute('data-tr-title');
    if (key && dic[key] != null) el.setAttribute('title', dic[key]);
  });
  var alted = document.querySelectorAll('[data-tr-alt]');
  alted.forEach(function (el) {
    var key = el.getAttribute('data-tr-alt');
    if (key && dic[key] != null) el.setAttribute('alt', dic[key]);
  });
}

/***
 *  CAMBIAR IDIOMA (público)
 ***/
function cambiarIdioma(idioma) {
  if (NMC_SUPPORTED.indexOf(idioma) === -1) idioma = NMC_DEFAULT;

  // Detectar la ruta base hasta /view (robusto para subcarpetas como /view/admin)
  var path = location.pathname;
  var idx = path.indexOf('/view/');
  var base = idx !== -1 ? path.slice(0, idx + '/view/'.length) : '/';
  var rutaJSON = base + 'assets/languages/' + idioma + '.json';

  cargarJSON(
    rutaJSON,
    function (traducciones) {
      // aplicar
      aplicarTraducciones(traducciones);
      // guardar
      try { localStorage.setItem(NMC_LANG_KEY, idioma); } catch (e) {}
      // atributo lang en <html>
      document.documentElement.setAttribute('lang', idioma);
      // sincronizar <select> si existe
      var select = document.getElementById('list');
      if (select) select.value = idioma;
    },
    function () {
      // si falla, reintenta con el idioma por defecto
      if (idioma !== NMC_DEFAULT) {
        cambiarIdioma(NMC_DEFAULT);
      }
    }
  );
}

/***
 *  DETECTAR IDIOMA INICIAL
 ***/
function detectarIdiomaInicial() {
  try {
    var guardado = localStorage.getItem(NMC_LANG_KEY);
    if (guardado && NMC_SUPPORTED.indexOf(guardado) !== -1) return guardado;
  } catch (e) {}
  var nav = (navigator.language || '').slice(0, 2).toLowerCase();
  if (NMC_SUPPORTED.indexOf(nav) !== -1) return nav;
  return NMC_DEFAULT;
}

/***
 *  INIT
 ***/
document.addEventListener('DOMContentLoaded', function () {
  var inicial = detectarIdiomaInicial();
  cambiarIdioma(inicial);

  // Si existe el <select>, que llame a cambiarIdioma:
  var select = document.getElementById('list');
  if (select) {
    select.value = inicial;
    select.addEventListener('change', function () {
      cambiarIdioma(this.value);
    });
  }
});

// Exponer en global por si lo llamas desde onclick:
window.cambiarIdioma = cambiarIdioma;
window.toggleLanguageSelector = toggleLanguageSelector;
