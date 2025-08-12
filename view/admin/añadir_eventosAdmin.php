<?php
if (!isset($_SESSION)) { session_start(); }
require_once('../../controller/admin.php');
if (!isset($_SESSION['email']) || !isset($_SESSION['contrasena']) || comprobacionAdmin($_SESSION['email'], $_SESSION['contrasena']) != 1) {
    header('Location: ../login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nuevo Evento | Nacional ADMIN</title>
    <link href="../assets/css/style.css" rel="stylesheet">
<script src="../assets/js/idioma.js" type="application/javascript"></script>
</head>

<body>
    <header class="header">
        <div class="container logo-nav-container">
            <a href="../index.php" class="logo"> <img src="../assets/images/logotransparenteN.png" width="25%"
                    alt="Nacional Music Club"></a>
            <nav class="navigation">
                <ul class="show">
                    <li><a href="./eventosAdmin.php"><span class="material-symbols-outlined">calendar_today</span></a>
                    </li>
                    <li><a href="añadir_eventosAdmin.php"><span class="material-symbols-outlined">liquor</span></a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="main">
        <div class="container">
            <h1>AÑADIR EVENTO NUEVO</h1>
            <ul>
                <li></li>
                <li></li>
                <li>
                    <div class="form">
                        <form action="../model/eventos.php" method="post">
                            <div class="field-wrap">
                                <label>Nombre de Evento</label>
                                <input type="text" name="titulo" required autocomplete="off" />
                            </div>

                            <div class="field-wrap">
                                <label>Descripción</label>
                                <input type="text" name="descripcion" required autocomplete="off" />
                            </div>

                            <div class="field-wrap">
                                <label>Fecha</label>
                                <input type="date" name="fecha" required autocomplete="off" />
                            </div>

                            <div class="field-wrap">
                                <label>Hora</label>
                                <input type="time" name="hora" required autocomplete="off" />
                            </div>

                            <div class="field-wrap">
                                <label>Precio Entrada €</label>
                                <input type="text" name="precio" required autocomplete="off" />
                            </div>

                            <div class="field-wrap">
                                <label>Foto o Video</label>
                                <input type="text" name="ImagenEvento" required autocomplete="off" />
                            </div>

                            <div class="checkbox">
                                <input type="checkbox" name="archivo" required>
                                <label>Archivado</label>
                            </div>

                            <div class="checkbox">
                                <input type="checkbox" name="archivo" required>
                                <label>Publico</label>
                            </div>

                            <button type="submit" class="button button-block">Confirmar Modificaciones</button>
                        </form>
                    </div>
                    <br>
                </li>
                <li></li>
                <li></li>
                <li>
                    <section>
                        <h3>Vista Previa</h3>
                        <h2>$NombreEvento</h2>
                        <center>
                            <img src="assets/images/logoDorado.png" width="350px" alt="$evento Nacional Music Club">
                        </center>
                        <p>$descripcion
                            <br> $fecha $hora
                            <br> $precio
                        </p>

                    </section>
                    <br>
                </li>
            </ul>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <nav class="navigation">
                <ul>
                    <li><a href="mod_eventosAdmin.php"><span class="material-symbols-outlined">call</span></a></li>
                    <li><a href="../login.php"><span class="material-symbols-outlined">person</span></a></li>
                    <li><a href="#"><span class="material-symbols-outlined">public</span></a></li>
                </ul>
            </nav>
            <p>en650</p>
        </div>
    </footer>
</body>

</html>