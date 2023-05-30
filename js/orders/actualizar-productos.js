import { obtenerRespuesta } from '../vista-control.js';
import productosPedidos from './controllers/lista-productos-pedidos.js';
import vistaPedidoFormulario from './controllers/vista-pedido-formulario.js';
import productosPopup from './controllers/popups/productos.js';
import { productosDisponiblesEdicion, productosDisponiblesCreacion } from './init.js';

productosPedidos.incializar();

const ventanaProductos = productosPopup.ventana;
const listaPedidosPendientes = document.getElementById('pedidos-pendientes');

document.addEventListener('actualizarproductospedidos', () => {
  const idPedido = vistaPedidoFormulario.idPedido;
  const productosModificados = JSON.stringify(productosPedidos.productosModificados);

  const formData = new FormData();
  formData.append('idPedido', idPedido);
  formData.append('productosModificados', productosModificados);

  if (productosPedidos.productosModificados.length) {
    fetch('php/includes/orders/actualizar_productos_pedido.inc.php', {
      method: 'POST',
      body: formData
    })
      .then((respuesta) => respuesta.json())
      .then((datos) => {
        obtenerRespuesta(datos);

        productosPedidos.productosModificados.forEach((producto) => {
          const productoActualizadoItem = ventanaProductos
            .querySelector(`.id-producto-pedido[value='${producto.id}']`).parentElement;
          const cantidadNueva = productoActualizadoItem.querySelector('.mini-input').value;

          productoActualizadoItem.querySelector('.mini-input').placeholder = producto.cantidad;

          const diferenciaCantidad = +cantidadNueva - productosPedidos.productos[producto.id].cantidad;

          productosDisponiblesCreacion.actualizarProductoDisponible(producto.id, diferenciaCantidad);
          productosDisponiblesEdicion.actualizarProductoDisponible(producto.id, diferenciaCantidad);

          productosPedidos.productos[producto.id].cantidad = cantidadNueva;

          const productoItem = vistaPedidoFormulario.listaProductosPedidos
            .querySelector(`.id-producto[value='${producto.id}']`).parentElement;

          productoItem.querySelector('.cantidad-producto-pedido').innerText = cantidadNueva;
          productoItem.querySelector('.subtotal-producto-pedido')
            .innerText = productoActualizadoItem.querySelector('.subtotal-producto').innerText;
        });

        let totalProductos = 0;

        vistaPedidoFormulario.listaProductosPedidos.querySelectorAll('.cantidad-producto-pedido')
          .forEach((cantidad) => (totalProductos += +cantidad.innerText));
        vistaPedidoFormulario.totalProductos = totalProductos;

        const pedidoItem = listaPedidosPendientes
          .querySelector(`.id-pedido[value='${vistaPedidoFormulario.idPedido}']`)
          .parentElement;

        pedidoItem.querySelector('.total-productos-pedido').innerText = totalProductos;
        pedidoItem.querySelector('.producto-s').innerText = totalProductos === 1
          ? 'producto'
          : 'productos';

        let costoTotal = 0;

        productosPopup.listaProductosComprados.querySelectorAll('.subtotal-producto')
          .forEach((subtotal) => (costoTotal += +subtotal.innerText));

        vistaPedidoFormulario.costoTotal = costoTotal.toFixed(2);
        vistaPedidoFormulario.anticipoRequerido = (costoTotal / 2).toFixed(2);

        productosPedidos.productosModificados = [];
        productosPopup.reiniciarCampos();
      });
  } else {
    ventanaProductos.cerrarVentana();
  }
});
