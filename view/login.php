<?php
session_start();
include_once('../controller/Conexion.php');

// Inicializar variable de error
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $email = trim($_POST['email']);
    $contrasena = $_POST['password']; // Asegúrate que el name del input es "password"

    // Validaciones básicas
    if (empty($email) || empty($contrasena)) {
        $error = "Todos los campos son obligatorios";
    } else {
        try {
            // Consulta a la base de datos con tus nombres de campo exactos
            $query = "SELECT correoElectronico, nombre, apellidos, hashContrasena, userAdmin 
                     FROM usuarios 
                     WHERE correoElectronico = ?";
            $stmt = $conexion->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $resultado = $stmt->get_result();

            if ($resultado->num_rows === 1) {
                $usuario = $resultado->fetch_assoc();

                // Verificar contraseña (sin hash por ahora)
                if ($contrasena === $usuario['hashContrasena']) { // Cambiar a password_verify cuando implementes hash
                    // Configurar sesión con tus variables
                    $_SESSION['email'] = $usuario['correoElectronico'];
                    $_SESSION['nombre'] = $usuario['nombre'];
                    $_SESSION['apellidos'] = $usuario['apellidos'];
                    $_SESSION['es_admin'] = ($usuario['userAdmin'] == 1);

                    // Redirección según tipo de usuario
                    if ($_SESSION['es_admin']) {
                        header("Location: ../controller/admin.php");
                    } else {
                        header("Location: ../view/index.php");
                    }
                    exit();
                } else {
                    $error = "Credenciales incorrectas";
                }
            } else {
                $error = "Usuario no encontrado";
            }
        } catch (Exception $e) {
            $error = "Error en el sistema: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title> Iniciar Sesión | Nacional Music Club</title>
    <link rel="icon" href="./assets/images/N_simpleBlanca.png" type="image/png">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href="./assets/css/form.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/16f40acbe8.js" crossorigin="anonymous"></script>
    <script src="./assets/js/form.js"></script>
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
            <ul class="back-arrow" id="login">
                <li><a class="back" href="./index.php"><i class="fa-solid fa-angle-left"></i></a></li>
            </ul>

            <!-- Mostrar errores -->
            <?php if (!empty($error)): ?>
                <div class="alert alert-danger">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>

            <form action="" method="post" autocomplete="on">
                <h2 class="form_title">Nos alegramos de verte!</h2>

                <section class="casillas">
                    <div class="mail-container">
                        <label for="email" class="fontLabel">Correo Electrónico:</label>
                        <input type="email" id="email" name="email" required
                            value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                    </div>

                    <div class="password-container password-input">
                        <label for="password" class="fontLabel">Contraseña:</label>
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
                            Iniciar Sesion</span>
                        <span class="absolute inset-0 border-2 border-blbg-black rounded-full"></span>
                    </button>
                </div>

                <p class="signup">¿No tienes cuenta? <a href="./signup.php">Registrate</a></p>
            </form>
        </div>
    </div>
</body>

</html>