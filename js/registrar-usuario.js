import { utils } from './utils.js';

document.querySelector('[data-evento="registrarusuario"]').addEventListener('click', (e) => {
  e.preventDefault();
});

document.addEventListener('registrarusuario', () => {
  fetch('php/includes/registro.inc.php', {
    method: 'POST',
    body: new FormData(document.querySelector('form'))
  })
    .then((respuesta) => respuesta.json())
    .then((datos) => {
      document.querySelectorAll('.notificacion-error').forEach((e) => e.remove());

      utils.obtenerRespuesta(datos);
    });
});
