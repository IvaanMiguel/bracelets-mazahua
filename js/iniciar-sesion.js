import utils from './utils.js';

document.addEventListener('iniciarsesion', () => {
  fetch('php/includes/iniciar_sesion.inc.php', {
    method: 'POST',
    body: new FormData(document.querySelector('form'))
  })
    .then((respuesta) => respuesta.json())
    .then((datos) => {
      utils.obtenerRespuesta(datos, (itemError) => {
        document.querySelector('.campos').after(itemError);
      });
    });
});
