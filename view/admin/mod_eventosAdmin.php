<?php
if (!isset($_SESSION)) { session_start(); }
require_once('../../controller/admin.php');
if (!isset($_SESSION['email']) || !isset($_SESSION['contrasena']) || comprobacionAdmin($_SESSION['email'], $_SESSION['contrasena']) != 1) {
    header('Location: ../login.php');
    exit;
}
?>
<?php
include_once('../controller/Conexion.php');
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
    <title>Modificar Evento | Nacional ADMIN</title>
    <link rel="icon" href="../assets/images/favicons/N_blanca.png" type="image/png">

    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/contacto.css">
    <link rel="stylesheet" href="../assets/css/aeventos.css">
    <link rel="stylesheet" href="../assets/css/exito.css">

    <script src="https://kit.fontawesome.com/16f40acbe8.js" crossorigin="anonymous"></script>

    <script src="../assets/js/idioma.js" type="application/javascript"></script>
</head>

<body>

    <header>
        <a href="./eventosAdmin.php" class="logo"><img src="../assets/images/logos/logoBlanco.png" width="24%"
                alt="Nacional Music Club"></a>
    </header>

    <main>
        <?php
        if (isset($_SESSION['email'])) {

            // Verifica si no eses admin
            $resultado = $_SESSION['admin'];
            if ($resultado == 1) {

                ?>

                <div class="container">
                    <h1 class="edit-event" data-traduccion="editar_evento">EDITAR EVENTO</h1>

                    <form action="../model/Amodificareventos.php" method="post">

                        <section class="casillas">

                            <input type="hidden" name="idEventos" value="<?php echo $_GET['idEvento']; ?>">


                            <div class="field-wrap">
                                <label data-traduccion="nombre_evento">Nombre de Evento</label>
                                <input type="text" name="titulo"
                                    value="<?php echo isset($_POST['titulo']) ? $_POST['titulo'] : ''; ?>">
                            </div>

                            <div class="field-wrap">
                                <label data-traduccion="descripcion">Descripción</label>
                                <input type="text" name="descripcion"
                                    value="<?php echo isset($_POST['descripcion']) ? $_POST['descripcion'] : ''; ?>">
                            </div>

                            <div class="time-container">
                                <div class="field-wrap" id="day">
                                    <label data-traduccion="fecha">Fecha</label>
                                    <input type="date" name="fecha"
                                        value="<?php echo isset($_POST['fecha']) ? $_POST['fecha'] : ''; ?>">
                                </div>

                                <div class="field-wrap" id="time">
                                    <label data-traduccion="hora">Hora</label>
                                    <input type="time" name="hora"
                                        value="<?php echo isset($_POST['hora']) ? $_POST['hora'] : ''; ?>">
                                </div>
                            </div>

                            <div class="field-wrap">
                                <label data-traduccion="precio_entrada">Precio Entrada €</label>
                                <input type="text" name="precio"
                                    value="<?php echo isset($_POST['precio']) ? $_POST['precio'] : ''; ?>">
                            </div>

                            <div class="field-wrap">
                                <label data-traduccion="foto_video">Foto o Video</label>
                                <input type="text" name="foto"
                                    value="<?php echo isset($_POST['foto']) ? $_POST['foto'] : ''; ?>">>
                            </div>

                            <div class="field-wrap">
                                <label data-traduccion="tipo_musica">Tipo de Música</label>
                                <input type="text" name="tipo" list="tipoEvento"
                                    placeholder="Escribir o seleccionar una opción">
                                <datalist id="tipoEvento">
                                    <select id="tipoEvento">
                                        <option value="" data-traduccion="anadir_mas_tarde">~ Añadir más tarde ~</option>
                                        <option value="Reggaeton">Reggaeton</option>
                                        <option value="Techno">Techno</option>
                                    </select>
                                </datalist>
                            </div>
                        </section>

                        <div class="checkbox">
                            <input type="checkbox" name="archivo">
                            <label data-traduccion="archivar">Archivar</label>
                        </div>

                        <div class="button-box">
                            <button type="submit"
                                class="relative inline-flex items-center justify-start px-5 py-3 overflow-hidden font-bold rounded-full group all-bg button button-block">
                                <span
                                    class="w-32 h-32 rotate-45 translate-x-12 -translate-y-2 absolute left-0 top-0 bg-black opacity-[3%]"></span>
                                <span
                                    class="absolute top-0 left-0 w-48 h-48 -mt-1 transition-all duration-500 ease-in-out rotate-45 -translate-x-56 -translate-y-24 bg-black opacity-100 group-hover:-translate-x-8"></span>
                                <span
                                    class="relative w-full text-left text-blbg-black transition-colors duration-200 ease-in-out group-hover:text-gray-200"
                                    data-traduccion="confirm_mod">Confirmar</span>
                                <span class="absolute inset-0 border-2 border-blbg-black rounded-full"></span>
                            </button>
                        </div>

                    </form>

                </div>

                <?php
            } else {
                echo '
                    <div class="checkout-rojo">
                    <h1 data-traduccion="mensaje_exitoso_2">No tienes permisos para acceder a este sitio.</h1>
                      <br>
                      <br>
                      <br>
                      <br>
                    <a href="../" data-traduccion="wip_back">Volver a la pagina principal</a>
                    </div>
                    ';
            }
        } else {
            echo '
                <div class="checkout-rojo">
				<h1 data-traduccion="mensaje_exitoso_2">No tienes permisos para acceder a este sitio.</h1>
          		<br>
          		<br>
          		<br>
          		<br>
                <a href="../" data-traduccion="wip_back">Volver a la pagina principal</a>
                </div>
                ';
        }
        ?>
    </main>

</body>

</html>