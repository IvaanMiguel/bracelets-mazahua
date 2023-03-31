import { NotificacionError } from '../components/notificacion-error/notificacion-error.js';

document.querySelector('.boton-registro').addEventListener('click', (e) => {
  e.preventDefault();

  fetch('php/includes/registro.inc.php', {
    method: 'POST',
    body: new FormData(document.querySelector('.formulario'))
  })
    .then((respuesta) => respuesta.json())
    .then((datos) => {
      document.querySelectorAll('.notificacion-error').forEach((e) => e.remove());

      switch (datos.tipo) {
        case 'url':
          location.href = datos.contenido;
          break;

        case 'mensaje':
          const notificacionError = new NotificacionError();
          const span = document.createElement('span');

          span.setAttribute('slot', 'error');
          span.innerText = item.mensaje;
          notificacionError.appendChild(span);

          document.querySelector('.campos').after(notificacionError);
          break;

        case 'array':
          datos.contenido.forEach((item) => {
            const notificacionError = new NotificacionError();
            const span = document.createElement('span');

            span.setAttribute('slot', 'error');
            span.innerText = item.mensaje;
            notificacionError.appendChild(span);

            switch (item.ambito) {
              case 'general':
                document.querySelector('.campos').after(notificacionError);
                break;

              default:
                document.querySelector(`[name='${item.ambito}']`).parentElement.after(notificacionError);
                break;
            }
          });
          break;
      }
    });
});
