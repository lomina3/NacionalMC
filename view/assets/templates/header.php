<header>
    <a href="./index.php" class="logo"><img src="./assets/images/logos/logoBlanco.png" width="24%"
            alt="Nacional Music Club"></a>

    <nav class="navigation">
        <ul class="show">
            <?php
                if (!isset($_SESSION['email'])) {

                    echo '<li><a href="./login.php"><i class="fa-solid fa-user"></i></a></li>';
                }
                ?>
            <li>
                <div id="language-selector" class="hidden">
                    <select id="list" class="language-select" onchange="cambiarUbicacion(this.value)">
                            <option id="es" class="seleccionado" value="es" selected="selected"> 🇪🇸 ES</option>
                            <option id="en" class="" value="en"> 🇬🇧 EN</option>
                            <option id="it" class="" value="it"> 🇮🇹 IT</option>
                            <option id="de" class="" value="de"> 🇩🇪 DE</option>
                            <option id="fr" class="" value="fr"> 🇫🇷 FR</option>
                        </select>
                </div>

                <!-- Agrega el icono para mostrar/ocultar el selector -->
                <div id="language-icon" onclick="toggleLanguageSelector()">
                    <i class="fa-solid fa-earth-europe"></i>
                </div>
            </li>
            <li><i id="menuToggle">
                    <input type="checkbox" />
                    <span></span>
                    <span></span>
                    <span></span>
                    <ul id="menu">
                        <div class="elements">
                            <li><i class="fa-solid fa-ticket"></i><a data-traduccion="eventos"
                                    href="./eventos.php">Eventos</a>
                            </li>
                            <li><i class="fa-solid fa-champagne-glasses"></i><a data-traduccion="fiestas_privadas"
                                    href="./fiestas_privadas.php">Fiestas
                                    Privadas</a></li>
                            <li><i class="fa-solid fa-cart-shopping"></i><a data-traduccion="carrito"
                                    href="./carrito.php">Carrito</a>
                            </li>
                            <li><i class="fa-solid fa-phone"></i><a data-traduccion="contactanos"
                                    href="./contacto.php">Contáctanos</a></li>

                            <?php
                                if (isset($_SESSION['email'])) {
                                    // El usuario ha iniciado sesión, mostrar el enlace para cerrar sesión
                                    echo '<li><i class="fa-solid fa-right-from-bracket"></i><a id="logoutButton" data-traduccion="cerrar_sesion" href="../model/logout.php" onclick="cerrarSesion()">Cerrar Sesión</a></li>';
                                }
                                ?>
                        </div>
                    </ul>
                </i>
            </li>
        </ul>
    </nav>
</header>