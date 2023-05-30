import { obtenerRespuesta } from '../vista-control.js';
import productosPopup from './controllers/popups/productos.js';
import productosPedidos from './controllers/lista-productos-pedidos.js';
import vistaPedidoFormulario from './controllers/vista-pedido-formulario.js';
import { obtenerProductos } from './obtener-form-data.js';
import { productosDisponiblesEdicion, productosDisponiblesCreacion } from './init.js';

const listaPedidosPendientes = document.getElementById('pedidos-pendientes');

document.addEventListener('seleccionarnuevosproductos', () => {
  const productos = obtenerProductos(productosDisponiblesEdicion.productosSeleccionados);
  const idPedido = vistaPedidoFormulario.idPedido;

  const formData = new FormData();
  formData.append('idPedido', idPedido);
  formData.append('productos', JSON.stringify(productos));

  if (!Object.keys(productos).length) return;

  fetch('php/includes/orders/agregar_productos_pedido.inc.php', {
    method: 'POST',
    body: formData
  })
    .then((respuesta) => respuesta.json())
    .then((datos) => {
      obtenerRespuesta(datos);

      if (!datos.status) return;

      let aumentoTotalProductos = 0;
      let aumentoCostoTotal = 0;

      for (const productoId in productos) {
        const producto = productos[productoId];
        const id = producto.id;

        const productoItem = [...productosDisponiblesEdicion.listaItems].find((item) => {
          return item.querySelector(`.id-producto[value='${id}']`);
        });

        const nombre = productoItem.querySelector('.nombre').innerText;
        const precio = productoItem.querySelector('.precio').innerText;
        const existenciasActualizadas = productoItem.querySelector('.existencias').innerText - 1;

        productosDisponiblesEdicion.actualizarProductoDisponible(id);
        productosDisponiblesCreacion.actualizarProductoDisponible(id);

        productosPedidos.productos[id] = {
          id,
          cantidad: producto.cantidad,
          existencias: existenciasActualizadas,
          precio
        };

        productosPedidos.agregarProducto(id, nombre, producto.cantidad, precio, existenciasActualizadas);
        vistaPedidoFormulario.agregarProductoPedido(id, nombre, producto.cantidad, precio);

        aumentoTotalProductos += producto.cantidad;
        aumentoCostoTotal += +precio;
      }

      vistaPedidoFormulario.totalProductos = +vistaPedidoFormulario.totalProductos + aumentoTotalProductos;
      vistaPedidoFormulario.costoTotal = (+vistaPedidoFormulario.costoTotal + aumentoCostoTotal).toFixed(2);
      vistaPedidoFormulario.anticipoRequerido = (vistaPedidoFormulario.costoTotal / 2).toFixed(2);

      const pedidoItem = listaPedidosPendientes
        .querySelector(`.id-pedido[value='${vistaPedidoFormulario.idPedido}']`).parentElement;

      pedidoItem.querySelector('.producto-s').innerText = 'productos';

      const totalPedido = pedidoItem.querySelector('.total-productos-pedido');
      totalPedido.innerText = +totalPedido.innerText + aumentoTotalProductos;

      productosPopup.nuevosProductosAgregados = {};
      productosPopup.tabs.seleccionarTab(1);
      productosDisponiblesEdicion.desmarcarProductos();
    });
});
