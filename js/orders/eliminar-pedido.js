import { obtenerRespuesta } from '../vista-control.js';
import vistaPedidoFormulario from './controllers/vista-pedido-formulario.js';
import datosDestinatarioPopup from './controllers/popups/datos-destinatario.js';
import productosPedidos from './controllers/lista-productos-pedidos.js';
import { productosDisponiblesCreacion, productosDisponiblesEdicion } from './init.js';

const ventanaPrincipal = document.getElementById('eliminar-pedido');

document.addEventListener('eliminarpedido', () => ventanaPrincipal.mostrarVentana());
ventanaPrincipal.addEventListener('cancelar', () => ventanaPrincipal.cerrarVentana());

const idPedidoInput = document.getElementById('id-pedido');
const listaPedidosPendientes = document.getElementById('pedidos-pendientes');
const totalPedidos = document.getElementById('total-pedidos');
const pedidosTitulo = document.getElementById('pedidos-titulo');
const totalPedidosPendientes = document.getElementById('total-pedidos-pendientes');
const pedidosPendientesTitulo = document.getElementById('pedidos-pendientes-titulo');

ventanaPrincipal.addEventListener('confirmareliminarpedido', () => {
  const formData = new FormData();
  formData.append('id', idPedidoInput.value);

  fetch('php/includes/orders/eliminar_pedido.inc.php', {
    method: 'POST',
    body: formData
  })
    .then((respuesta) => respuesta.json())
    .then((datos) => {
      ventanaPrincipal.cerrarVentana();

      obtenerRespuesta(datos);

      for (const id in productosPedidos.productos) {
        const producto = productosPedidos.productos[id];

        productosDisponiblesCreacion.actualizarProductoDisponible(producto.id, -producto.cantidad);
        productosDisponiblesEdicion.actualizarProductoDisponible(producto.id, -producto.cantidad);
      }

      console.log(productosPedidos.productos);

      listaPedidosPendientes.querySelector(`.id-pedido[value='${idPedidoInput.value}']`)
        .parentElement.remove();

      totalPedidos.innerText = +totalPedidos.innerText - 1;
      totalPedidosPendientes.innerText = +totalPedidosPendientes.innerText - 1;
      pedidosTitulo
        .innerHTML = `${totalPedidos.outerHTML} pedido${+totalPedidos.innerText === 1 ? '' : 's'}`;
      pedidosPendientesTitulo
        .innerHTML = `${totalPedidosPendientes.outerHTML} pedido${+totalPedidosPendientes.innerText === 1 ? '' : 's'}`;

      vistaPedidoFormulario.reiniciar();
      datosDestinatarioPopup.reiniciarPlaceholders();
      document.dispatchEvent(new CustomEvent('regresarpedidos'));
    });
});
