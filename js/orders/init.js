import { ListaProductosDisponibles } from './controllers/lista-productos-disponibles.class.js';

const productosDisponiblesEdicion = new ListaProductosDisponibles(document.body
  .querySelector('#editar-productos-pedidos .lista-productos'));

const productosDisponiblesCreacion = new ListaProductosDisponibles(document.body
  .querySelector('#buscar-producto .lista-productos'));

export { productosDisponiblesEdicion, productosDisponiblesCreacion };
