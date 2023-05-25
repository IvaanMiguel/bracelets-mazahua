import { obtenerRespuesta } from '../vista-control.js';

const ventanaPrincipal = document.getElementById('eliminar-pedido');

document.addEventListener('eliminarpedido', () => ventanaPrincipal.mostrarVentana());
ventanaPrincipal.addEventListener('cancelar', () => ventanaPrincipal.cerrarVentana());

const idPedidoInput = document.getElementById('id-pedido');
const subtab = document.getElementById('subtab');
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

      listaPedidosPendientes.querySelector(`.id-pedido[value='${idPedidoInput.value}']`)
        .parentElement.remove();

      totalPedidos.innerText = +totalPedidos.innerText - 1;
      totalPedidosPendientes.innerText = +totalPedidosPendientes.innerText - 1;
      pedidosTitulo
        .innerHTML = `${totalPedidos.outerHTML} pedido${+totalPedidos.innerText === 1 ? '' : 's'}`;
      pedidosPendientesTitulo
        .innerHTML = `${totalPedidosPendientes.outerHTML} pedido${+totalPedidosPendientes.innerText === 1 ? '' : 's'}`;

      subtab.seleccionarTab(2);
    });
});
