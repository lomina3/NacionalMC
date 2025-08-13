<?php
include_once('../controller/conexion.php');
session_start();
if (isset($_SESSION['email']) && isset($_SESSION['contrasena'])) {
    $login = $_SESSION['email'];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Registro | Nacional Music Club</title>
    <link rel="icon" href="./assets/images/favicons/N_simpleBlanca.png" type="image/png">

    <link href="./assets/css/style.css" rel="stylesheet" />
    <link href="./assets/css/form.css" rel="stylesheet" />

    <script src="./assets/js/form.js"></script>
    <script src="./assets/js/idioma.js" type="application/javascript"></script>

    <script src="https://kit.fontawesome.com/16f40acbe8.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="left-section">
            <video autoplay muted loop playsinline>
                <source src="./assets/videos/Anuncio.mp4" type="video/mp4" data-traduccion="tag_video">
                Tu navegador no soporta el tag de video.
            </video>

            <a href="./index.php" class="logo"><img src="./assets/images/favicons/N_simpleBlanca.png" width="17%"
                    alt="Nacional Music Club"></a>
        </div>

        <div class="right-section">

            <ul class="back-arrow" id="login">
                <li><a class="back" href="../"><i class="fa-solid fa-angle-left"></i></a></li>
            </ul>

            <li class="language-position">
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

            <form id="signup" action="../model/signup.php" accept-charset="UTF-8" method="post" autocomplete="on">
            <h2 class="form_title" data-traduccion="bienvenido">¡Bienvenido!</h2>

                <section class="casillas">
                    <div class="name-container">
                        <div id="name">
                            <label for="nombre" class="fontLabel" data-traduccion="nombre">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" maxlength="15" required>
                        </div>

                        <div id="apellidos">
                            <label for="apellidos" class="fontLabel" data-traduccion="apellidos">Apellidos:</label>
                            <input type="text" id="apellidos" name="apellidos" maxlength="20" required>
                        </div>
                    </div>

                    <div class="mail-container">
                        <label for="email" class="fontLabel" data-traduccion="mail">Correo Electrónico:</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="password-container password-input">
                        <label for="password" class="fontLabel" data-traduccion="contraseña">Contraseña:</label>
                        <div class="input-group">
                            <input type="password" id="password" name="password" class="form-control" minlength="8"
                                required>
                            <button type="button" id="togglePassword" class="toggle-password">
                                <i class="fas fa-eye" id="showIcon"></i>
                            </button>
                        </div>
                        <label for="password2" class="fontLabel" data-traduccion="confirmar_contrasena">Confirmar
                            contraseña:</label>
                        <div class="input-group">
                            <input type="password" id="password2" name="password2" class="form-control" minlength="8"
                                required>
                        </div>
                    </div>

                    <div class="birthdate-container">
                        <label for="fechaNacimiento" class="fontLabel" data-traduccion="fecha_nacimiento">Fecha de
                            Nacimiento:</label>
                        <input type="date" id="fechaNacimiento" name="fechaNacimiento" required>
                    </div>

                    <div class="checkbox-container">
                        <input type="checkbox" id="termsCheckbox" name="termsCheckbox" required>
                        <label for="termsCheckbox" class="fontLabel">
                            <span data-traduccion="acepto">Acepto los</span>
                            <a class="enlace" href="./terms.php" target="_blank" data-traduccion="tc_link">
                                términos y condiciones
                            </a>
                            <span data-traduccion="y_la">y la </span>
                            <a class="enlace" href="./politica_privacidad.php" target="_blank" data-traduccion="privacidad_link">
                                política de privacidad
                            </a>
                        </label>
                    </div>

                </section>


                <!-- 32 -->
                <div class=" button-box" id="registrar">
                    <button type="submit"
                        class="relative inline-flex items-center justify-start px-5 py-3 overflow-hidden font-bold rounded-full group all-bg">
                        <span
                            class="w-32 h-32 rotate-45 translate-x-12 -translate-y-2 absolute left-0 top-0 bg-black opacity-[3%]"></span>
                        <span
                            class="absolute top-0 left-0 w-48 h-48 -mt-1 transition-all duration-500 ease-in-out rotate-45 -translate-x-56 -translate-y-24 bg-black opacity-100 group-hover:-translate-x-8"></span>
                        <span
                            class="relative w-full text-left text-blbg-black transition-colors duration-200 ease-in-out group-hover:text-gray-200"
                            data-traduccion="registrarse">Registrarse</span>
                        <span class="absolute inset-0 border-2 border-blbg-black rounded-full"></span>
                    </button>
                </div>

                <p class="login">
                    <span data-traduccion="ya_tienes_cuenta">¿Ya tienes cuenta?</span>
                    <a href="./login.php" data-traduccion="inicia_sesion">Inicia sesión</a>
                </p>


            </form>
        </div>
    </div>

</body>

</html>