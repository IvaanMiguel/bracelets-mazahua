(() => {
  const ventanaEmergente = document.getElementById('editar-categoria');
  ventanaEmergente.querySelector('boton-icono').addEventListener('click', () => ventanaEmergente.cerrarVentana());

  document.querySelectorAll('lista-item').forEach((listaItem) => {
    listaItem.addEventListener('click', () => {
      ventanaEmergente.mostrarVentana();
    });
  });
})();
