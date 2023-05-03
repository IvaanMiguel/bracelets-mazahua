import utils from '../utils.js';

(() => {
  const listaItems = document.body.querySelectorAll('lista-controlador item-divisor');

  utils.ordenarLista(listaItems, (item) => {
    document.querySelector('lista-controlador').appendChild(item);
  });
})();
