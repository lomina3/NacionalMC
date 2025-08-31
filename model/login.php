<?php
require_once __DIR__ . '/../controller/controlador.php';
require_once __DIR__ . '/../controller/login.php';

// Iniciar sesión si no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// --- Manejo del carrito temporal ---
if (isset($_SESSION['carrito']) && $_SESSION['carrito'] !== null) {
    $_POST['tempCarrito'] = $_SESSION['carrito'];
}

// Inicialización de variables
$correoElectronico = '';
$_SESSION['loggedin'] = false;

// Instanciar clase Login
$login = new Login();
$validado = $login->validar($_POST);

// --- Validación de login ---
if ($validado === false) {
    $correoElectronico = $_POST['email'] ?? '';
    echo "<script>
        alert('No existe esta combinación de usuario y contraseña');
        window.location='../view/login.php';
    </script>";
    exit;
}

// --- Redirección según rol ---
$_SESSION['loggedin'] = true;
unset($_SESSION['carrito']); // Limpiar carrito temporal

if (isset($_SESSION['admin'])) {
    if ($_SESSION['admin'] == 1 || $_SESSION['admin'] == 0) {
        header("Location: ../index.php");
        exit;
    }
}

// --- En caso de error inesperado ---
echo "<script>
    alert('Ups! Algo ha ido mal, prueba de nuevo');
    window.location='../view/login.php';
</script>";
exit;
