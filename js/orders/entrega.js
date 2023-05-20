const ubicacionesCliente = document.body.querySelectorAll('.ubicaciones-cliente');
const infoUbicacion = document.body.querySelectorAll('.info-ubicacion');

ubicacionesCliente.forEach((select) => {
  select.addEventListener('change', function () {
    const ubicacion = select.querySelector(`option[value='${select.value}']`);
    infoUbicacion.forEach((item) => (item.contenido = ubicacion.contenido));

    ubicacionesCliente.forEach((auxSelect) => (auxSelect.value = select.value));
  });
});
