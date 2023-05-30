import { ListaProductosDisponibles } from './controllers/lista-productos-disponibles.class.js';
import {
  ordenarProductos,
  ordenarProductosCategorias
} from './controllers/ordenar-productos.js';

const listaProductosEdicion = document.body
  .querySelector('#editar-productos-pedidos .lista-productos');
const listaProductosCreacion = document.body
  .querySelector('#buscar-producto .lista-productos');

const productosDisponiblesEdicion = new ListaProductosDisponibles(listaProductosEdicion);
const productosDisponiblesCreacion = new ListaProductosDisponibles(listaProductosCreacion);

ordenarProductosCategorias(document.getElementById('editar-productos-pedidos'), listaProductosEdicion);
listaProductosEdicion.querySelectorAll('wc-colapsable lista-controlador')
  .forEach((listaCategoria) => ordenarProductos(listaCategoria));

ordenarProductosCategorias(document.getElementById('buscar-producto'), listaProductosCreacion);
listaProductosCreacion.querySelectorAll('wc-colapsable lista-controlador')
  .forEach((listaCategoria) => ordenarProductos(listaCategoria));

export { productosDisponiblesEdicion, productosDisponiblesCreacion };
