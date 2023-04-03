import { NotificacionError } from '../components/notificacion-error/notificacion-error.js';

export const utils = (function () {
  const obtenerRespuesta = (datos) => {
    switch (datos.tipo) {
      case 0: // URL
        location.href = datos.contenido;
        break;

      case 1: // Array de respuestas por parte del servidor.
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
  };

  return {
    obtenerRespuesta
  };
})();
