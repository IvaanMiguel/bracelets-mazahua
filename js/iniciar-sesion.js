import { utils } from './utils.js';

document.addEventListener('iniciarsesion', () => {
  fetch('php/includes/iniciar_sesion.inc.php', {
    method: 'POST',
    body: new FormData(document.querySelector('form'))
  })
    .then((respuesta) => respuesta.json())
    .then((datos) => {
      document.querySelectorAll('.notificacion-error').forEach((e) => e.remove());

      utils.obtenerRespuesta(datos);
    });
});
