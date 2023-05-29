import { obtenerRespuesta } from '../vista-control.js';
import productosPopup from './controllers/popups/productos.js';
import productosPedidos from './controllers/lista-productos-pedidos.js';
import vistaPedidoFormulario from './controllers/vista-pedido-formulario.js';

const listasProductos = document.body.querySelectorAll('.lista-productos');
const listaPedidosPendientes = document.getElementById('pedidos-pendientes');

document.addEventListener('seleccionarnuevosproductos', () => {
  const productos = productosPopup.nuevosProductosAgregados;
  const idPedido = vistaPedidoFormulario.idPedido;

  const formData = new FormData();
  formData.append('idPedido', idPedido);
  formData.append('productos', JSON.stringify(productos));
  console.log(productos);
  if (!productos.length) return;

  fetch('php/includes/orders/agregar_productos_pedido.inc.php', {
    method: 'POST',
    body: formData
  })
    .then((respuesta) => respuesta.json())
    .then((datos) => {
      console.log(productosPedidos.productos);

      obtenerRespuesta(datos);

      if (!datos.status) return;

      let aumentoTotalProductos = 0;
      let aumentoCostoTotal = 0;

      productos.forEach((producto, i) => {
        const id = producto.id;

        const productoItem = productosPopup.listaProductosDisponibles
          .querySelector(`.id-producto[value='${id}']`).parentElement;

        const nombre = productoItem.querySelector('.nombre').innerText;
        const precio = productoItem.querySelector('.precio').innerText;
        const existenciasActualizadas = productoItem.querySelector('.existencias').innerText - 1;

        console.log(existenciasActualizadas);

        if (!existenciasActualizadas) {
          listasProductos.forEach((listaProducto) => {
            listaProducto.querySelector(`.id-producto[value='${id}']`).parentElement.remove();
          });
        }

        productoItem.querySelector('.existencias').innerText = existenciasActualizadas;

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
      });

      vistaPedidoFormulario.totalProductos = +vistaPedidoFormulario.totalProductos + aumentoTotalProductos;
      vistaPedidoFormulario.costoTotal = (+vistaPedidoFormulario.costoTotal + aumentoCostoTotal).toFixed(2);
      vistaPedidoFormulario.anticipoRequerido = (vistaPedidoFormulario.costoTotal / 2).toFixed(2);

      const pedidoItem = listaPedidosPendientes
        .querySelector(`.id-pedido[value='${vistaPedidoFormulario.idPedido}']`).parentElement;

      pedidoItem.querySelector('.producto-s').innerText = 'productos';

      const totalPedido = pedidoItem.querySelector('.total-productos-pedido');
      totalPedido.innerText = +totalPedido.innerText + aumentoTotalProductos;

      productosPopup.nuevosProductosAgregados = [];
      productosPopup.tabs.seleccionarTab(1);
      productosPopup.reiniciarProductosDisponibles();
    });
});
