import { ordenarItems } from '../vista-control.js';

const ordenarProductosCategorias = () => {
  const colapsables = document.body.querySelectorAll('wc-colapsable');

  ordenarItems(Array.from(colapsables).map((colapsable) => {
    return colapsable.querySelector('[slot="texto-cabecera"]');
  }), (colapsableTitulo) => {
    document.querySelector('lista-encabezada').appendChild(colapsableTitulo.parentElement);
  });
};

const ordenarProductos = (listaCategoria) => {
  const productos = listaCategoria.querySelectorAll('item-divisor');
  ordenarItems(productos, (producto, i) => {
    producto.dataNoDivisor = (productos.length === i);
    listaCategoria.appendChild(producto);
  });
};

ordenarProductosCategorias();

document.body.querySelectorAll('wc-colapsable lista-controlador')
  .forEach((listaCategoria) => ordenarProductos(listaCategoria));

export { ordenarProductosCategorias, ordenarProductos };
