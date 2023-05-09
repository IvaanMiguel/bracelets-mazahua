import ItemError from '../components/item-error.js';
import GrupoNotificaciones from '../components/grupo-notificaciones.js';
import NotificacionFlotante from '../components/notificacion-flotante.js';

export default (() => {
  const obtenerRespuesta = (datos, generalCallback, scope = window.document) => {
    document.querySelectorAll('item-error').forEach((itemError) => itemError.remove());

    switch (datos.tipo) {
      case 0: // URL
        location.href = datos.contenido;
        break;

      case 1: // Array de respuestas por parte del servidor.
        datos.contenido.forEach((item) => {
          if (!item.hasOwnProperty('ambito')) return;

          let itemError;
          if (item.ambito !== 'notificacion') {
            itemError = new ItemError();
            itemError.innerHTML = /*html*/`
              <md-icono slot='icono' data-icono='error' data-opsz='20' data-escala='s'></md-icono>
              <wc-texto slot='error' data-tipo-fuente='cuerpo-s'>${item.mensaje}</wc-texto>
            `;
          }

          switch (item.ambito) {
            case 'general':
              generalCallback(itemError);
              break;

            case 'notificacion':
              const grupoNotificaciones = document.querySelector('grupo-notificaciones')
                ? document.querySelector('grupo-notificaciones')
                : new GrupoNotificaciones();

              const notificacionFlotante = new NotificacionFlotante();
              notificacionFlotante.dataset.tipo = datos.status ? 'exito' : 'error';

              notificacionFlotante.innerHTML = `
                <wc-texto data-tipo-fuente='titulo-m'>${item.titulo}</wc-texto>
                <wc-texto>${item.mensaje}</wc-texto>
              `;

              grupoNotificaciones.appendChild(notificacionFlotante);
              document.body.appendChild(grupoNotificaciones);
              break;

            default:
              scope.querySelector(`[name='${item.ambito}']`).parentElement.after(itemError);
              break;
          }
        });
        break;
    }
  };

  const ordenarLista = (listaItems, callback) => {
    Array.prototype.slice.call(listaItems).sort((primerItem, segundoItem) => {
      const primerItemTexto = primerItem.innerText;
      const segundoItemTexto = segundoItem.innerText;

      return primerItemTexto.toLowerCase().localeCompare(segundoItemTexto.toLowerCase());
    }).forEach((item, i) => callback(item, i));
  };

  return {
    obtenerRespuesta,
    ordenarLista
  };
})();
