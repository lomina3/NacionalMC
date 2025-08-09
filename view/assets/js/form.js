

document.addEventListener('DOMContentLoaded', function () {
    const passwordInput = document.getElementById('password');
    const togglePasswordButton = document.getElementById('togglePassword');
    const showIcon = document.getElementById('showIcon');

    let isPasswordVisible = false;

    togglePasswordButton.addEventListener('click', function () {
        isPasswordVisible = !isPasswordVisible;
        
        const type = isPasswordVisible ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        // Cambiar el ícono de Font Awesome basado en el estado de visibilidad
        showIcon.className = isPasswordVisible ? 'fas fa-eye-slash' : 'fas fa-eye';
    });

});