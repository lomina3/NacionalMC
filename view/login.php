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
    <title> Iniciar Sesión | Nacional Music Club</title>
    <link rel="icon" href="./assets/images/favicons/N_blanca.png" type="image/png">

    <link href="./assets/css/style.css" rel="stylesheet">
    <link href="./assets/css/form.css" rel="stylesheet" />
    <link href="./assets/css/language.css" rel="stylesheet">

    <script src="./assets/js/form.js"></script>
    <script src="./assets/js/idioma.js" type="application/javascript"></script>

    <script src="https://kit.fontawesome.com/16f40acbe8.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container">

        <div class="left-section">

            <video autoplay muted loop>
                <source src="./assets/videos/Anuncio.mp4" type="video/mp4">
                Tu navegador no soporta el tag de video.
            </video>

            <a href="./index.php" class="logo"><img src="./assets/images/favicons/N_simpleBlanca.png" width="17%"
                    alt="Nacional Music Club"></a>

        </div>

        <div class="right-section">

        <div class="arrow-world">
            <ul class="back-arrow" id="login">
                <li><a class="back" href="./index.php"><i class="fa-solid fa-angle-left"></i></a></li>
            </ul>

            <li class="language-position">
                <div id="language-selector" class="hidden">
                    <select id="list" class="language-select">
                        <option id="es" value="es" selected> 🇪🇸 ES</option>
                        <option id="en" value="en"> 🇺🇸 US</option>
                        <option id="it" value="it"> 🇮🇹 IT</option>
                    </select>
                </div>
        
                <!-- Agrega el icono para mostrar/ocultar el selector -->
                <div id="language-icon" onclick="toggleLanguageSelector()">
                    <i class="fa-solid fa-earth-europe"></i>
                </div>
            </li>
        </div>

            <form action="../model/login.php" accept-charset="UTF-8" method="post" autocomplete="on">

                <h2 class="form_title">¡Nos alegramos de verte!</h2>

                <section class="casillas">

                    <div class="mail-container">
                        <label for="email" class="fontLabel">Correo Electrónico:</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="password-container password-input">
                        <label for="password" class="fontLabel" data-traduccion="contraseña">Contraseña:</label>
                        <div class="input-group">
                            <input type="password" id="password" name="password" class="form-control" required>
                            <button type="button" id="togglePassword" class="toggle-password">
                                <i class="fas fa-eye" id="showIcon"></i>
                            </button>
                        </div>
                    </div>

                </section>

                <div class="button-box">
                    <button type="submit"
                        class="relative inline-flex items-center justify-start px-5 py-3 overflow-hidden font-bold rounded-full group all-bg">
                        <span
                            class="w-32 h-32 rotate-45 translate-x-12 -translate-y-2 absolute left-0 top-0 bg-black opacity-[3%]"></span>
                        <span
                            class="absolute top-0 left-0 w-48 h-48 -mt-1 transition-all duration-500 ease-in-out rotate-45 -translate-x-56 -translate-y-24 bg-black opacity-100 group-hover:-translate-x-8"></span>
                        <span
                            class="relative w-full text-left text-blbg-black transition-colors duration-200 ease-in-out group-hover:text-gray-200">
                            Iniciar Sesión
                        </span>
                        <span class="absolute inset-0 border-2 border-blbg-black rounded-full"></span>
                    </button>
                </div>

                <p class="signup">¿No tienes cuenta? <a href="./signup.php">Regístrate</a></p>
            </form>

        </div>
    </div>

</body>

</html>