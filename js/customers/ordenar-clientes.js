import { ordenarItems } from '../vista-control.js';

const lista = document.getElementById('lista-clientes');

export const ordenarClientes = () => {
  const listaItems = lista.querySelectorAll('item-divisor');

  ordenarItems(listaItems, (item, i) => {
    item.dataNoDivisor = (listaItems.length === i);
    lista.appendChild(item);
  });
};

export const ordenarClienteUbicaciones = (ubicacionesCliente = document.getElementById('ubicaciones-cliente')) => {
  const ubicacionesItems = ubicacionesCliente.querySelectorAll('option');

  ordenarItems(ubicacionesItems, (ubicacion) => ubicacionesCliente.appendChild(ubicacion));
};

ordenarClientes();
