import ItemError from '../components/item-error.js';

export default (function () {
  const obtenerRespuesta = (datos, generalCallback) => {
    document.querySelectorAll('[slot="error"]').forEach((itemError) => itemError.remove());

    switch (datos.tipo) {
      case 0: // URL
        location.href = datos.contenido;
        break;

      case 1: // Array de errores por parte del servidor.
        datos.contenido.forEach((item) => {
          const itemError = new ItemError();
          itemError.setAttribute('slot', 'error');
          itemError.innerHTML = /*html*/`
            <md-icono slot='icono' data-icono='error' data-opsz='20' data-escala='s'></md-icono>
            <wc-texto slot='error' data-tipo-fuente='cuerpo-s'>${item.mensaje}</wc-texto>
          `;

          switch (item.ambito) {
            case 'general':
              generalCallback(itemError);
              break;

            default:
              document.querySelector(`[name='${item.ambito}']`).after(itemError);
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
    }).forEach((item) => callback(item));
  };

  return {
    obtenerRespuesta,
    ordenarLista
  };
})();
