import { obtenerFecha, obtenerRespuesta } from '../vista-control.js';
import { ordenarPedidos } from './controllers/ordenar-pedidos.js';
import vistaPedidoFormulario from './controllers/vista-pedido-formulario.js';

const ventanaPrincipal = document.getElementById('completar-pedido');

document.addEventListener('completarpedido', () => ventanaPrincipal.mostrarVentana());
ventanaPrincipal.addEventListener('cancelar', () => ventanaPrincipal.cerrarVentana());

const idPedidoInput = document.getElementById('id-pedido');
const listaPedidosPendientes = document.getElementById('pedidos-pendientes');
const listaPedidosCompletados = document.getElementById('pedidos-completados');
const totalPedidosPendientes = document.getElementById('total-pedidos-pendientes');
const pedidosPendientesTitulo = document.getElementById('pedidos-pendientes-titulo');
const totalPedidosCompletados = document.getElementById('total-pedidos-completados');
const pedidosCompletadosTitulo = document.getElementById('pedidos-completados-titulo');

ventanaPrincipal.addEventListener('confirmarcompletarpedido', () => {
  const formData = new FormData();
  formData.append('id', idPedidoInput.value);

  fetch('php/includes/orders/completar_pedido.inc.php', {
    method: 'POST',
    body: formData
  })
    .then((respuesta) => respuesta.json())
    .then((datos) => {
      obtenerRespuesta(datos);

      if (datos.status === 0) return;

      vistaPedidoFormulario.alternarEdicionPedido('ocultar');

      const itemObsoleto = listaPedidosPendientes.querySelector(`.id-pedido[value='${idPedidoInput.value}']`)
        .closest('item-divisor');

      const nuevoItem = itemObsoleto.cloneNode(true);
      itemObsoleto.remove();

      nuevoItem.querySelector('lista-item').addEventListener('click', function () {
        this.dispatchEvent(new CustomEvent('mostrarpedidocompletado', {
          bubbles: true,
          composed: true
        }));
      });

      nuevoItem.querySelector('.entrega-completado').innerText = `Completado el ${obtenerFecha(datos.contenido[0])}`;
      listaPedidosCompletados.appendChild(nuevoItem);

      totalPedidosPendientes.innerText = +totalPedidosPendientes.innerText - 1;
      pedidosPendientesTitulo
        .innerHTML = `${totalPedidosPendientes.outerHTML} por entregar`;
      totalPedidosCompletados.innerText = +totalPedidosCompletados.innerText + 1;
      pedidosCompletadosTitulo
        .innerHTML = `${totalPedidosCompletados.outerHTML} entregado${+totalPedidosCompletados.innerText === 1 ? '' : 's'}`;

      ordenarPedidos('pedidos-completados');

      idPedidoInput.value = '';

      ventanaPrincipal.cerrarVentana();
    });
});
