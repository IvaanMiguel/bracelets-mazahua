import ItemError from '../components/item-error.js';
import GrupoNotificaciones from '../components/grupo-notificaciones.js';
import NotificacionFlotante from '../components/notificacion-flotante.js';

export const obtenerRespuesta = (datos, generalCallback, scope = window.document) => {
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
          itemError = crearItemError(item.mensaje);
          if (item.id) {
            scope.getElementById(item.id).appendChild(itemError);
            return;
          }
        }

        switch (item.ambito) {
          case 'general':
            generalCallback(itemError);
            break;

          case 'notificacion':
            crearNotificacion(item.titulo, item.mensaje, datos.status ? 'exito' : 'error');
            break;

          default:
            scope.querySelector(`[name='${item.ambito}']`).parentElement.after(itemError);
            break;
        }
      });
      break;
  }
};

export const crearItemError = (mensaje) => {
  const itemError = new ItemError();
  itemError.innerHTML = /*html*/`
    <md-icono slot='icono' data-icono='error' data-opsz='20' data-escala='s'></md-icono>
    <wc-texto slot='error' data-tipo-fuente='cuerpo-s'>${mensaje}</wc-texto>
  `;

  return itemError;
};

export const removerErrores = (scope) => {
  scope.querySelectorAll('item-error').forEach((item) => {
    if (item.parentElement === scope) item.remove();
  });
};

export const crearNotificacion = (titulo, mensaje, tipo) => {
  const grupoNotificaciones = document.querySelector('grupo-notificaciones')
    ? document.querySelector('grupo-notificaciones')
    : new GrupoNotificaciones();

  const notificacionFlotante = new NotificacionFlotante();
  notificacionFlotante.dataset.tipo = tipo;

  notificacionFlotante.innerHTML = `
    <wc-texto data-tipo-fuente='titulo-m'>${titulo}</wc-texto>
    <wc-texto>${mensaje}</wc-texto>
  `;

  grupoNotificaciones.appendChild(notificacionFlotante);
  document.body.appendChild(grupoNotificaciones);
};

export const ordenarItems = (listaItems, callback) => {
  Array.prototype.slice.call(listaItems).sort((primerItem, segundoItem) => {
    const primerItemTexto = primerItem.innerText;
    const segundoItemTexto = segundoItem.innerText;

    return primerItemTexto.toLowerCase().localeCompare(segundoItemTexto.toLowerCase());
  }).forEach((item, i) => callback(item, i));
};

export const debounceEvento = (input, evento, callback, milisegundos) => {
  let debouncedEvent = null;

  const ejecutarCallback = () => callback(input);

  input.addEventListener(evento, () => {
    clearTimeout(debouncedEvent);
    debouncedEvent = setTimeout(ejecutarCallback, milisegundos);
  });
};

export const crearEventoValidacion = (nombre, detalles) => {
  return new CustomEvent(nombre, {
    bubbles: true,
    composed: true,
    detail: detalles
  });
};
