import { ordenarPedidos } from './controllers/ordenar-pedidos.js';
import { obtenerTipoEntrega, obtenerFecha } from '../vista-control.js';
import ItemDivisor from '../../components/item-divisor.js';

ordenarPedidos('pedidos-completados');

const mostrarPedidoCompletado = new CustomEvent('mostrarpedidocompletado', { bubbles: true, composed: true });
const pedidosCompletadosLista = document.getElementById('pedidos-completados');

pedidosCompletadosLista.querySelectorAll('lista-item').forEach((item) => {
  item.addEventListener('click', () => item.dispatchEvent(mostrarPedidoCompletado));
});

const subtab = document.getElementById('subtab');
const listaProductosPedidos = document.getElementById('lista-productos-pedidos');
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
const estadoAnticipo = document.getElementById('estado-anticipo');
const metodoPago = document.getElementById('metodo-pago');
const detallesPago = document.getElementById('detalles-pago');
const anticipoRequerido = document.getElementById('anticipo-requerido');
const costoTotal = document.getElementById('costo-total');

document.addEventListener('mostrarpedidocompletado', (e) => {
  const idPedido = e.target.querySelector('.id-pedido').value;

  const formData = new FormData();
  formData.append('id', idPedido);

  subtab.seleccionarTab(1);

  document.body.querySelectorAll('.pedido-edicion').forEach((item) => {
    item.style.display = 'none';
  });

  fetch('php/includes/orders/mostrar_pedido_completado.inc.php', {
    method: 'POST',
    body: formData
  })
    .then((respuesta) => respuesta.json())
    .then((datos) => {
      obtenerProductos(formData);
      const pedido = datos.contenido[0];

      pedidoCliente.innerText = pedido.nombreCliente;
      nombreDestinatario.innerText = pedido.nombreDestinatario;
      celularDestinatario.innerText = pedido.celularDestinatario;
      tipoEntrega.innerText = obtenerTipoEntrega(pedido);
      fechaEntrega.innerText = obtenerFecha(pedido.fechaEntrega);
      horaEntrega.innerText = pedido.horaEntrega.slice(0, 5);
      colonia.innerText = pedido.colonia;
      calle.innerText = pedido.callePrincipal;
      cp.innerText = pedido.cp;
      anticipoRequerido.innerText = `$${pedido.anticipo} MXN`;
      costoTotal.innerText = `$${pedido.total} MXN`;

      pedido.tipoEntrega === 'Pick up'
        ? direccionEntrega.style.display = 'none'
        : direccionEntrega.style.display = null;

      estadoAnticipo.innerText = pedido.estadoAnticipo ? 'Pagado' : 'No pagado';
      pedido.tipoPago === 'Efectivo'
        ? itemDetallesPago.style.display = 'none'
        : itemDetallesPago.style.display = null;

      metodoPago.innerText = pedido.tipoPago;
      detallesPago.innerText = pedido.detallesPago;
    });
});

const totalProductosItem = document.getElementById('total-productos');

/** @param {FormData} formData */
const obtenerProductos = (formData) => {
  fetch('php/includes/orders/mostrar_productos_completado.inc.php', {
    method: 'POST',
    body: formData
  })
    .then((respuesta) => respuesta.json())
    .then((datos) => {
      let totalProductos = 0;

      datos.contenido.forEach((producto, i) => {
        totalProductos += producto.cantidad;
        const itemDivisor = new ItemDivisor();
        itemDivisor.innerHTML = /*html*/`
          <item-detalles>
            <wc-texto data-tipo-fuente='etiqueta-l'>
              ${producto.cantidad} × ${producto.nombre}
            </wc-texto>
            <wc-texto data-tipo-fuente='etiqueta-l'>$${producto.subtotal} MXN</wc-texto>
          </item-detalles>
        `;

        listaProductosPedidos.appendChild(itemDivisor);
      });

      totalProductosItem.innerText = totalProductos;
    });
};
