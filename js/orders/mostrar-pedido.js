import { obtenerFecha } from '../vista-control.js';

const mostrarPedidoPendiente = new CustomEvent('mostrarpedidopendiente', { bubbles: true, composed: true });

const pedidosPendientesLista = document.getElementById('pedidos-pendientes');

pedidosPendientesLista.querySelectorAll('lista-item').forEach((item) => {
  item.addEventListener('click', () => item.dispatchEvent(mostrarPedidoPendiente));
});

const subtab = document.getElementById('subtab');

document.addEventListener('regresarpedidos', () => {
  subtab.seleccionarTab(2);
});

const obtenerTipoEntrega = (pedido) => {
  let tipoEntrega;

  switch (pedido.tipoEntrega) {
    case 'Aplicación':
      tipoEntrega = `A través de la aplicación de ${pedido.aplicacion}`;
      break;

    case 'Domicilio':
      tipoEntrega = 'A domicilio';
      break;

    default: tipoEntrega = pedido.tipoEntrega;
  }

  return tipoEntrega;
};

const idPedidoInput = document.getElementById('id-pedido');
const pedidoCliente = document.getElementById('pedido-cliente');
const nombreDestinatario = document.getElementById('pedido-nombre-destinatario');
const celularDestinatario = document.getElementById('pedido-celular-destinatario');
const tipoEntrega = document.getElementById('tipo-entrega');
const direccionEntrega = document.getElementById('direccion-opcional');
const fechaEntrega = document.getElementById('fecha-entrega');
const horaEntrega = document.getElementById('hora-entrega');
const colonia = document.getElementById('entrega-colonia');
const calle = document.getElementById('entrega-calle');
const cp = document.getElementById('codigo-postal');
const itemDetallesPago = document.getElementById('item-detalles-pago');
const anticipo = document.getElementById('estado-anticipo');
const metodoPago = document.getElementById('metodo-pago');
const detallesPago = document.getElementById('detalles-pago');

document.addEventListener('mostrarpedidopendiente', (e) => {
  const idPedido = e.target.querySelector('.id-pedido-pendiente').value;
  idPedidoInput.value = idPedido;

  const formData = new FormData();
  formData.append('id', idPedido);

  subtab.seleccionarTab(1);

  fetch('php/includes/orders/mostrar_pedido.inc.php', {
    method: 'POST',
    body: formData
  })
    .then((respuesta) => respuesta.json())
    .then((datos) => {
      const pedido = datos.contenido[0];

      console.log(pedido);

      pedidoCliente.innerText = pedido.nombreCliente;
      nombreDestinatario.innerText = pedido.nombreDestinatario;
      celularDestinatario.innerText = pedido.telefonoDestinatario;
      tipoEntrega.innerText = obtenerTipoEntrega(pedido);
      fechaEntrega.innerText = obtenerFecha(pedido.fechaEntrega);
      horaEntrega.innerText = pedido.horaEntrega.slice(0, 5);
      colonia.innerText = pedido.colonia;
      calle.innerText = pedido.callePrincipal;
      cp.innerText = pedido.cp;

      pedido.tipoEntrega === 'Pick up'
        ? direccionEntrega.style.display = 'none'
        : direccionEntrega.style.display = null;

      anticipo.innerText = pedido.estadoAnticipo ? 'Pagado' : 'No pagado';
      pedido.tipoPago === 'Efectivo'
        ? itemDetallesPago.style.display = 'none'
        : itemDetallesPago.style.display = null;

      metodoPago.innerText = pedido.tipoPago;
      detallesPago.innerText = pedido.detallesPago;
    });
});
