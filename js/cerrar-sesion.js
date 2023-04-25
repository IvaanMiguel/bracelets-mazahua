(() => {
  const ventanaEmergente = document.body.querySelector('#cerrar-sesion');

  ventanaEmergente.querySelector('boton-delineado').addEventListener('click', () => ventanaEmergente.cerrarVentana());
  ventanaEmergente.querySelector('boton-icono').addEventListener('click', () => ventanaEmergente.cerrarVentana());

  document.addEventListener('confirmarcierresesion', () => {
    ventanaEmergente.mostrarVentana();
  });

  document.addEventListener('cerrarsesion', () => {
    fetch('php/includes/cerrar_sesion.inc.php')
      .then((respuesta) => respuesta.json())
      .then((datos) => (location.href = datos.contenido));
  });
})();
