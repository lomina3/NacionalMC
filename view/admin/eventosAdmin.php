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
    <title>Eventos | Nacional ADMIN</title>
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<script src="../assets/js/idioma.js" type="application/javascript"></script>
</head>

<body>
    <header class="header">
        <div class="container logo-nav-container">
            <a href="../index.php" class="logo"> <img src="../assets/images/N_negro.png" width="25%"
                    alt="Nacional Music Club"></a>
            <nav class="navigation">
                <ul class="show">
                    <li><a href="eventosAdmin.php"><span class="material-symbols-outlined">calendar_today</span></a></li>
                    <li><a href="añadir_eventosAdmin.php"><span class="material-symbols-outlined">liquor</span></a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="main">
        <div class="container">
            <h1>PRÓXIMAMENTE</h1>
            <ul>
                <center>
                    <li>
                        <section>
                            <h2>EVENTO 1</h2>
                            <div class="card-container">
                                <div class="card">
                                    <div class="front">
                                        <img src="../assets/images/foto-confettiazul.jpg" width="340px" alt="Evento 1">
                                    </div>
                                    <div class="back">INFORMACIÓN DEL EVENTO</div>
                                </div>
                            </div>
                            <a href="../Aeventosmod.html">
                                <center><button class="button button-block" role="button">MODIFICAR</button></center>
                            </a> <!-- eliminar center -->
                        </section>

                    </li>

                    <li>
                        <section>
                            <h2>EVENTO 2</h2>
                            <div class="card-container">
                                <div class="card">
                                    <div class="front">
                                        <img src="../assets/images/foto-dj.jpg" width="340px" alt="Evento 1">
                                    </div>
                                    <div class="back">INFORMACIÓN DEL EVENTO</div>
                                </div>
                            </div>
                            <a href="../Aeventosmod.html">
                                <center><button class="button button-block" role="button">MODIFICAR</button></center>
                            </a> <!-- eliminar center -->
                        </section>

                    </li>

                    <li>
                        <section>
                            <h2>EVENTO 3</h2>
                            <div class="card-container">
                                <div class="card">
                                    <div class="front">
                                        <img src="../assets/images/foto-chica.jpg" width="340px" alt="Evento 1">
                                    </div>
                                    <div class="back">INFORMACIÓN DEL EVENTO</div>
                                </div>
                            </div>
                            <a href="../Aeventosmod.html">
                                <center><button class="button button-block" role="button">MODIFICAR</button></center>
                            </a> <!-- eliminar center -->
                        </section>
                    </li>
                </center> <!-- eliminar center -->
            </ul>
            <ul>
                <a href="../Aeventosnuevo.html">
                    <center><button class="button button-block" role="button">AÑADIR EVENTO</button></center>
                </a> <!-- eliminar center -->
            </ul>
            <h1>EVENTOS ARCHIVADOS</h1>
            <ul>
                <center> 
                    <li>
                        <section>
                            <h2>EVENTO 1</h2>
                            <div class="card-container">
                                <div class="card">
                                    <div class="front">
                                        <img src="../assets/images/foto-confettiazul.jpg" width="340px" alt="Evento 1">
                                    </div>
                                    <div class="back">INFORMACIÓN DEL EVENTO</div>
                                </div>
                            </div>
                            <a href="../Aeventosmod.html">
                                <center><button class="button button-block" role="button">MODIFICAR</button></center>
                            </a> <!-- eliminar center -->
                        </section>

                    </li>

                    <li>
                        <section>
                            <h2>EVENTO 2</h2>
                            <div class="card-container">
                                <div class="card">
                                    <div class="front">
                                        <img src="../assets/images/foto-dj.jpg" width="340px" alt="Evento 1">
                                    </div>
                                    <div class="back">INFORMACIÓN DEL EVENTO</div>
                                </div>
                            </div>
                            <a href="../Aeventosmod.html">
                                <center><button class="button button-block" role="button">MODIFICAR</button></center>
                            </a> <!-- eliminar center -->
                        </section>

                    </li>

                    <li>
                        <section>
                            <h2>EVENTO 3</h2>
                            <div class="card-container">
                                <div class="card">
                                    <div class="front">
                                        <img src="../assets/images/foto-chica.jpg" width="340px" alt="Evento 1">
                                    </div>
                                    <div class="back">INFORMACIÓN DEL EVENTO</div>
                                </div>
                            </div>
                            <a href="../Aeventosmod.html">
                                <center><button class="button button-block" role="button">MODIFICAR</button></center>
                            </a> 
                        </section>
                    </li>
                </center> <!-- eliminar center -->
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

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="../assets/js/script_admin.js"></script>

</body>

</html>