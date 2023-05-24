import { ordenarItems } from '../../vista-control.js';

export const ordenarProductos = (listaCategoria) => {
  const nombresProductos = listaCategoria.querySelectorAll('item-divisor .nombre');

  ordenarItems(nombresProductos, (nombreProducto, i) => {
    const itemProducto = nombreProducto.closest('item-divisor');
    itemProducto.dataNoDivisor = nombresProductos.length === i;
    listaCategoria.appendChild(itemProducto);
  });
};

const ventana = document.getElementById('buscar-producto');
const listaProductos = document.getElementById('lista-productos');

export const ordenarProductosCategorias = () => {
  const colapsables = ventana.querySelectorAll('wc-colapsable');

  ordenarItems([...colapsables].map((colapsable) => {
    return colapsable.querySelector('[slot="texto-cabecera"]');
  }), (colapsableTitulo) => {
    listaProductos.appendChild(colapsableTitulo.parentElement);
  });
};
