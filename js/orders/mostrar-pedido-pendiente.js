import ItemDivisor from '../../components/item-divisor.js';
import { ordenarPedidos } from './controllers/ordenar-pedidos.js';
import vistaPedidoFormulario from './controllers/vista-pedido-formulario.js';
import datosDestinatarioPopup from './controllers/popups/datos-destinatario.js';

vistaPedidoFormulario.inicializar();
ordenarPedidos('pedidos-pendientes');

const mostrarPedidoPendiente = new CustomEvent('mostrarpedidopendiente', { bubbles: true, composed: true });
const pedidosPendientesLista = document.getElementById('pedidos-pendientes');

pedidosPendientesLista.querySelectorAll('lista-item').forEach((item) => {
  item.addEventListener('click', () => item.dispatchEvent(mostrarPedidoPendiente));
});

const subtab = document.getElementById('subtab');
const listaProductosPedidos = document.getElementById('lista-productos-pedidos');

document.addEventListener('regresarpedidos', () => {
  subtab.seleccionarTab(2);
  vistaPedidoFormulario.reiniciar();
  datosDestinatarioPopup.reiniciar();
  datosDestinatarioPopup.reiniciarPlaceholders();
});

const idPedidoInput = document.getElementById('id-pedido');

document.addEventListener('mostrarpedidopendiente', (e) => {
  const idPedido = e.target.querySelector('.id-pedido').value;
  idPedidoInput.value = idPedido;

  const formData = new FormData();
  formData.append('id', idPedido);

  vistaPedidoFormulario.alternarEdicionPedido('mostrar');

  subtab.seleccionarTab(1);

  fetch('php/includes/orders/mostrar_pedido_pendiente.inc.php', {
    method: 'POST',
    body: formData
  })
    .then((respuesta) => respuesta.json())
    .then((datos) => {
      obtenerProductos(formData);
      const pedido = datos.contenido[0];

      datosDestinatarioPopup.nombreDestinatarioPlaceholder = pedido.nombreDestinatario;
      datosDestinatarioPopup.celularDestinatarioPlaceholder = pedido.telefonoDestinatario;

      vistaPedidoFormulario.mostrarInformacion(pedido);
    });
});

const totalProductosItem = document.getElementById('total-productos');

/** @param {FormData} formData */
const obtenerProductos = (formData) => {
  fetch('php/includes/orders/mostrar_productos_pendiente.inc.php', {
    method: 'POST',
    body: formData
  })
    .then((respuesta) => respuesta.json())
    .then((datos) => {
      vistaPedidoFormulario.limpiarProductosPedidos();

      let totalProductos = 0;

      datos.contenido.forEach((producto, i) => {
        totalProductos += producto.cantidad;
        const itemDivisor = new ItemDivisor();
        itemDivisor.innerHTML = /*html*/`
          <item-detalles>
            <wc-texto data-tipo-fuente='etiqueta-l'>
              ${producto.cantidad} × ${producto.nombreProducto}
            </wc-texto>
            <wc-texto data-tipo-fuente='etiqueta-l'>$${producto.subtotal} MXN</wc-texto>
          </item-detalles>
        `;

        listaProductosPedidos.appendChild(itemDivisor);
      });

      totalProductosItem.innerText = totalProductos;
    });
};
