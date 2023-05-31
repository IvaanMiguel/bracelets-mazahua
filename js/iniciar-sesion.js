import { obtenerRespuesta } from './vista-control.js';

document.addEventListener('iniciarsesion', () => {
  fetch('php/includes/iniciar_sesion.inc.php', {
    method: 'POST',
    body: new FormData(document.querySelector('form'))
  })
    .then((respuesta) => respuesta.json())
    .then((datos) => {
      obtenerRespuesta(datos, (itemError) => {
        document.getElementById('campos').after(itemError);
      });
    });
});
