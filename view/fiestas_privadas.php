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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fiestas Privadas | Nacional Music Club</title>
    <link rel="icon" href="./assets/images/favicons/N_blanca.png" type="image/png">

    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="./assets/css/contacto.css">
    <link rel="stylesheet" href="./assets/css/fiestas.css">

    <script src="https://kit.fontawesome.com/16f40acbe8.js" crossorigin="anonymous"></script>

    <script src="./assets/js/idioma.js" type="application/javascript"></script>
</head>

<body>

    <header class="site-header" id="site-header">
        <?php include('./assets/templates/header.php'); ?>
    </header>


    <main>
        <div class="reservation-container">

            <h2>Reserva de Fiestas Privadas</h2>

            <form class="form-fiestas" action="../model/fiestas.php" method="post">
                <label for="eventDate">Fecha del Evento:</label>
                <input class="date-event" type="date" id="eventDate" name="eventDate" required>

                <label for="eventType">Tipo de Evento:</label>
                <div class="dropdown-container">
                    <input type="text" id="eventTypeInput" name="eventType" list="eventTypeList"
                        placeholder="Selecciona una opción" required>
                    <span class="arrow-icon"><i class="fas fa-angle-down" id="dropdown-icon"></i></span>
                    <datalist id="eventTypeList">
                        <option value="Boda"></option>
                        <option value="Cumpleaños"></option>
                        <option value="Evento Corporativo"></option>
                        <option value="Otro"></option>
                    </datalist>
                </div>

                <label for="contactEmail">Correo de Contacto:</label>
                <input type="email" id="contactEmail" name="contactEmail" required>

                <label for="eventName">Nombre del Evento:</label>
                <input type="text" id="eventName" name="eventName" required>

                <label for="additionalInfo">Información Adicional:</label>
                <textarea id="additionalInfo" name="additionalInfo" rows="4"></textarea>

                <div class=" button-box">
                    <button type="submit"
                        class="relative inline-flex items-center justify-start px-5 py-3 overflow-hidden font-bold rounded-full group all-bg">
                        <span
                            class="w-32 h-32 rotate-45 translate-x-12 -translate-y-2 absolute left-0 top-0 bg-black opacity-[3%]"></span>
                        <span
                            class="absolute top-0 left-0 w-48 h-48 -mt-1 transition-all duration-500 ease-in-out rotate-45 -translate-x-56 -translate-y-24 bg-black opacity-100 group-hover:-translate-x-8"></span>
                        <span
                            class="relative w-full text-left text-blbg-black transition-colors duration-200 ease-in-out group-hover:text-gray-200"
                            data-traduccion="reservar">Solicitar reserva</span>
                        <span class="absolute inset-0 border-2 border-blbg-black rounded-full"></span>
                    </button>
                </div>
            </form>

        </div>

    </main>

    <footer class="site-footer" id="site-footer">
        <?php include('./assets/templates/footer.php'); ?>
    </footer>

</body>

</html>