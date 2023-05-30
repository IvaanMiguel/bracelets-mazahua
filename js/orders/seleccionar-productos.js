import {
  ordenarProductos,
  ordenarProductosCategorias
} from './controllers/ordenar-productos.js';
import productosAgregados from './controllers/lista-productos-agregados.js';
import { productosDisponiblesCreacion } from './init.js';

const ventanaPrincipal = document.getElementById('buscar-producto');

document.addEventListener('ventanaoculta', () => {
  productosDisponiblesCreacion.desmarcarProductos();
  productosDisponiblesCreacion.productosSeleccionados = {};
});

document.addEventListener('buscarproducto', () => {
  productosDisponiblesCreacion.listaItems.forEach((listaItem) => {
    if (productosAgregados.productos[listaItem.querySelector('.nombre').innerText]) {
      listaItem.querySelector('.check').checked = true;
    }
  });

  ventanaPrincipal.mostrarVentana();
});
ventanaPrincipal.addEventListener('cerrar', () => ventanaPrincipal.cerrarVentana());
ventanaPrincipal.addEventListener('seleccionarproductos', () => {
  productosAgregados.productos = productosDisponiblesCreacion.productosSeleccionados;
  ventanaPrincipal.cerrarVentana();
});

const ventanaConfirmacion = document.getElementById('confirmar-remover-producto');
let itemProducto;
let nombre;

document.addEventListener('removerproducto', (e) => {
  itemProducto = e.target.parentElement;
  const cantidad = itemProducto.querySelector('[name="cantidad"]').value || 1;
  nombre = itemProducto.querySelector('.nombre-seleccionado').innerText;

  ventanaConfirmacion.querySelector('.cantidad').innerText = cantidad;
  ventanaConfirmacion.querySelector('.nombre').innerText = nombre;
  ventanaConfirmacion.mostrarVentana();
});

ventanaConfirmacion.addEventListener('confirmarremover', () => {
  itemProducto.remove();
  ventanaConfirmacion.cerrarVentana();

  productosAgregados.removerProducto(nombre);
});
