import utils from '../utils.js';

export default (function () {
  const ordenarProductosCategorias = () => {
    const colapsables = document.body.querySelectorAll('wc-colapsable');

    utils.ordenarLista(Array.from(colapsables).map((colapsable) => {
      return colapsable.querySelector('[slot="texto-cabecera"]');
    }), (colapsableTitulo) => {
      document.querySelector('lista-encabezada').appendChild(colapsableTitulo.parentElement);
    });
  };

  const ordenarProductos = (listaCategoria) => {
    const productos = listaCategoria.querySelectorAll('item-divisor');
    utils.ordenarLista(productos, (producto, i) => {
      producto.dataNoDivisor = (productos.length === i);
      listaCategoria.appendChild(producto);
    });
  };

  ordenarProductosCategorias();

  document.body.querySelectorAll('wc-colapsable lista-controlador')
    .forEach((listaCategoria) => ordenarProductos(listaCategoria));

  return {
    ordenarProductosCategorias,
    ordenarProductos
  };
})();
