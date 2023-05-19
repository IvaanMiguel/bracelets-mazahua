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
const productosContenido = document.getElementById('productos-contenido');

export const ordenarProductosCategorias = () => {
  const colapsables = ventana.querySelectorAll('wc-colapsable');

  ordenarItems([...colapsables].map((colapsable) => {
    return colapsable.querySelector('[slot="texto-cabecera"]');
  }), (colapsableTitulo) => {
    productosContenido.appendChild(colapsableTitulo.parentElement);
  });
};
