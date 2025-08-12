const header = document.querySelector("header");

header.innerHTML = `
<header>
  <a href="./index.php" class="logo">
    <img src="./assets/images/logos/logoBlanco.png" width="24%" alt="Nacional Music Club">
  </a>

  <nav class="navigation">
    <ul class="show">
      <li>
        <div id="language-selector" class="hidden">
          <select id="list" class="language-select">
            <option id="es" value="es"> 🇪🇸 ES</option>
            <option id="en" value="en"> 🇺🇸 EN</option>
            <option id="it" value="it"> 🇮🇹 IT</option>
          </select>
        </div>
        <div id="language-icon" onclick="toggleLanguageSelector()">
          <i class="fa-solid fa-earth-europe"></i>
        </div>
      </li>

      <li>
        <i id="menuToggle">
          <input type="checkbox" />
          <span></span>
          <span></span>
          <span></span>
          <ul id="menu">
            <div class="elements">
              <li>
                <i class="fa-solid fa-ticket"></i>
                <a data-traduccion="eventos" href="./eventos.php">Eventos</a>
              </li>
              <li>
                <i class="fa-solid fa-champagne-glasses"></i>
                <a data-traduccion="fiestas_privadas" href="./fiestas_privadas.php">Fiestas Privadas</a>
              </li>
              <li>
                <i class="fa-solid fa-cart-shopping"></i>
                <a data-traduccion="carrito" href="./carrito.php">Carrito</a>
              </li>
              <li>
                <i class="fa-solid fa-phone"></i>
                <a data-traduccion="contactanos" href="./contacto.php">Contáctanos</a>
              </li>
              <!-- Si necesitas "Cerrar sesión" dinámico según sesión,
                   tienes que hacerlo desde el backend o con otro JS. -->
            </div>
          </ul>
        </i>
      </li>
    </ul>
  </nav>
</header>
`;

// Asegura que el <select> cambie el idioma
document.addEventListener('DOMContentLoaded', function () {
  var select = document.getElementById('list');
  if (select && typeof window.cambiarIdioma === 'function') {
    select.addEventListener('change', function () {
      window.cambiarIdioma(this.value);
    });
  }
});
