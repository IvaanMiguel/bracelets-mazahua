import { ordenarItems } from '../../vista-control.js';

/** @param {string} id */
const ordenarPedidos = (id) => {
  const pedidosPendientesLista = document.getElementById(id);
  const nombresPedidos = pedidosPendientesLista.querySelectorAll('lista-item > :first-child');

  console.log(nombresPedidos);

  ordenarItems(nombresPedidos, (nombrePedido, i) => {
    const item = nombrePedido.closest('item-divisor');
    item.dataNoDivisor = (nombresPedidos.length === i);

    pedidosPendientesLista.appendChild(item);
  });
};

export { ordenarPedidos };
