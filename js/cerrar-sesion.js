document.addEventListener('confirmarcierresesion', () => {
  document.querySelector('[data-id="cerrar-sesion"]').setAttribute('style', 'display: flex;');
});

document.addEventListener('cerrarsesion', () => {
  fetch('php/includes/cerrar_sesion.inc.php')
    .then((respuesta) => respuesta.json())
    .then((datos) => (location.href = datos.contenido));
});
