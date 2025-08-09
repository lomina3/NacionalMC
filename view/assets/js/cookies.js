document.addEventListener('DOMContentLoaded', function () {
    const cookieNotice = document.getElementById('cookie-notice');
    const acceptCookiesButton = document.getElementById('accept-cookies');

    // Verificar si ya se aceptaron las cookies
    const cookiesAccepted = localStorage.getItem('cookiesAccepted');

    if (!cookiesAccepted) {
        // Mostrar el aviso de cookies si no se han aceptado
        cookieNotice.style.display = 'block';
    }

    // Manejar clic en el botón de aceptar cookies
    acceptCookiesButton.addEventListener('click', function () {
        // Ocultar el aviso de cookies
        cookieNotice.style.display = 'none';
        // Marcar que las cookies han sido aceptadas
        localStorage.setItem('cookiesAccepted', true);
    });
});
