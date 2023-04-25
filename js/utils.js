import ItemError from '../components/item-error.js';

export const utils = (function () {
  const obtenerRespuesta = (datos) => {
    switch (datos.tipo) {
      case 0: // URL
        location.href = datos.contenido;
        break;

      case 1: // Array de respuestas por parte del servidor.
        datos.contenido.forEach((item) => {
          const notificacionError = new ItemError();
          notificacionError.innerHTML = /*html*/`
            <md-icono slot='icono' data-icono='error' data-opsz='20' data-escala='s'></md-icono>
            <span slot='error'>${item.mensaje}</span>
          `;

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
