import { ordenarItems } from '../vista-control.js';

const lista = document.body.querySelector('lista-controlador');

const ordenarCategorias = () => {
  const listaItems = lista.querySelectorAll('item-divisor');

  ordenarItems(listaItems, (item, i) => {
    item.dataNoDivisor = (listaItems.length === i);
    lista.appendChild(item);
  });
};

ordenarCategorias();

export default ordenarCategorias;
