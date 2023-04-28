(() => {
  const ventanaEmergente = document.body.querySelector('#remover-ubicacion');
  let ubicacion;

  ventanaEmergente.querySelector('boton-delineado')
    .addEventListener('click', () => ventanaEmergente.cerrarVentana());
  ventanaEmergente.querySelector('boton-icono')
    .addEventListener('click', () => ventanaEmergente.cerrarVentana());

  document.addEventListener('confirmarremoverubicacion', (e) => {
    ventanaEmergente.mostrarVentana();
    ubicacion = e.detail;
  });

  ventanaEmergente.addEventListener('removerubicacion', () => {
    ubicacion.remove();
    ventanaEmergente.cerrarVentana();
  });
})();
