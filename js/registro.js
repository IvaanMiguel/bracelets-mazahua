import { utils } from './utils.js';

document.querySelector('.boton-registro').addEventListener('click', (e) => {
  e.preventDefault();

  fetch('php/includes/registro.inc.php', {
    method: 'POST',
    body: new FormData(document.querySelector('.formulario'))
  })
    .then((respuesta) => respuesta.json())
    .then((datos) => {
      document.querySelectorAll('.notificacion-error').forEach((e) => e.remove());

      utils.obtenerRespuesta(datos);
    });
});
