import { ordenarPedidos } from './controllers/ordenar-pedidos.js';
import ItemDivisor from '../../components/item-divisor.js';
import vistaPedidoFormulario from './controllers/vista-pedido-formulario.js';

ordenarPedidos('pedidos-completados');

const mostrarPedidoCompletado = new CustomEvent('mostrarpedidocompletado', { bubbles: true, composed: true });
const pedidosCompletadosLista = document.getElementById('pedidos-completados');

pedidosCompletadosLista.querySelectorAll('lista-item').forEach((item) => {
  item.addEventListener('click', () => item.dispatchEvent(mostrarPedidoCompletado));
});

const subtab = document.getElementById('subtab');
const listaProductosPedidos = document.getElementById('lista-productos-pedidos');

document.addEventListener('mostrarpedidocompletado', (e) => {
  const idPedido = e.target.querySelector('.id-pedido').value;

  const formData = new FormData();
  formData.append('id', idPedido);

  subtab.seleccionarTab(1);

  vistaPedidoFormulario.alternarEdicionPedido('ocultar');

  fetch('php/includes/orders/mostrar_pedido_completado.inc.php', {
    method: 'POST',
    body: formData
  })
    .then((respuesta) => respuesta.json())
    .then((datos) => {
      obtenerProductos(formData);
      const pedido = datos.contenido[0];

      vistaPedidoFormulario.mostrarInformacion(pedido);
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
      vistaPedidoFormulario.limpiarProductosPedidos();

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
