import {
  ordenarProductos,
  ordenarProductosCategorias
} from './controllers/ordenar-productos.js';
import productosAgregados from './controllers/lista-productos-agregados.js';

const ventanaPrincipal = document.getElementById('buscar-producto');

ordenarProductosCategorias();
ventanaPrincipal.querySelectorAll('wc-colapsable lista-controlador')
  .forEach((listaCategoria) => ordenarProductos(listaCategoria));

const productosItems = ventanaPrincipal.querySelectorAll('lista-item');

productosItems.forEach((itemProducto) => {
  itemProducto.addEventListener('click', () => {
    itemProducto.dispatchEvent(new CustomEvent('marcarproducto', { bubbles: true }));
  });
});

let productosSeleccionados = {};

document.addEventListener('ventanaoculta', () => {
  productosItems.forEach((item) => (item.querySelector('.check').checked = false));
  productosSeleccionados = {};
});

document.addEventListener('buscarproducto', () => {
  ventanaPrincipal.querySelectorAll('lista-item').forEach((item) => {
    if (productosAgregados.productos[item.querySelector('.nombre').innerText]) {
      item.querySelector('.check').checked = true;
    }
  });

  ventanaPrincipal.mostrarVentana();
});
ventanaPrincipal.addEventListener('cerrar', () => ventanaPrincipal.cerrarVentana());

ventanaPrincipal.addEventListener('marcarproducto', (e) => {
  const itemProducto = e.target;
  const checkbox = itemProducto.querySelector('.check');
  checkbox.checked = !checkbox.checked;

  const nombre = itemProducto.querySelector('.nombre').innerText;

  if (checkbox.checked) {
    const precio = itemProducto.querySelector('.precio').innerText;
    const existencias = +itemProducto.querySelector('.existencias').innerText;
    const id = itemProducto.querySelector('.id-producto').value;

    productosSeleccionados[nombre] = { id, nombre, precio, existencias, cantidad: 1 };
    return;
  }

  delete productosSeleccionados[nombre];
});

ventanaPrincipal.addEventListener('seleccionarproductos', () => {
  productosAgregados.productos = productosSeleccionados;
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
