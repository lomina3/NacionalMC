document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.btn-eliminar').forEach(link => {
    link.addEventListener('click', (e) => {
      if (!confirm('¿Eliminar este evento del carrito?')) {
        e.preventDefault();
        return;
      }
      // Evita dobles envíos si el usuario hace doble click
      link.classList.add('is-disabled');
    });
  });
});
