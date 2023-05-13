import { obtenerRespuesta } from './vista-control.js';

document.addEventListener('registrarusuario', () => {
  fetch('php/includes/registrar_usuario.inc.php', {
    method: 'POST',
    body: new FormData(document.querySelector('form'))
  })
    .then((respuesta) => respuesta.json())
    .then((datos) => {
      obtenerRespuesta(datos, (itemError) => {
        document.querySelector('.campos').after(itemError);
      });
    });
});
