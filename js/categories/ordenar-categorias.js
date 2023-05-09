import utils from '../utils.js';

(() => {
  const listaItems = document.body.querySelectorAll('lista-controlador item-divisor');

  utils.ordenarLista(listaItems, (item, i) => {
    item.dataNoDivisor = (listaItems.length === i);
    document.querySelector('lista-controlador').appendChild(item);
  });
})();
