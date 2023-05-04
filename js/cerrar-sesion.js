(() => {
  const ventanaEmergente = document.body.querySelector('#cerrar-sesion');
  ventanaEmergente.addEventListener('cerrarventana', () => ventanaEmergente.cerrarVentana());

  document.addEventListener('confirmarcierresesion', () => ventanaEmergente.mostrarVentana());
  document.addEventListener('cerrarsesion', () => {
    fetch('php/includes/cerrar_sesion.inc.php')
      .then((respuesta) => respuesta.json())
      .then((datos) => (location.href = datos.contenido));
  });
})();
