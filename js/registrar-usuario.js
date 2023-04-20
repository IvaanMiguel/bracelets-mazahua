import { utils } from './utils.js';

document.addEventListener('registrarusuario', () => {
  fetch('php/includes/registrar_usuario.inc.php', {
    method: 'POST',
    body: new FormData(document.querySelector('form'))
  })
    .then((respuesta) => respuesta.json())
    .then((datos) => {
      document.querySelectorAll('.notificacion-error').forEach((e) => e.remove());

      utils.obtenerRespuesta(datos);
    });
});
