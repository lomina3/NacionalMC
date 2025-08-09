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