import obtenerFormData from './obtener-form-data.js';
import { crearNotificacion, obtenerRespuesta } from '../vista-control.js';
import productosAgregados from './controllers/lista-productos-agregados.js';
import entregaFormulario from './controllers/entrega-formulario.js';
import crearItemPedido from './controllers/crear-item-lista.js';
import { ordenarPedidos } from './controllers/ordenar-pedidos.js';
import { productosDisponiblesCreacion, productosDisponiblesEdicion } from './init.js';

entregaFormulario.inicializar();

const infoCliente = document.getElementById('info-cliente');
const idCliente = document.getElementById('id-cliente-agregar');
const pagoEfectivo = document.body.querySelector('[value="Efectivo"]');
const clabeCuenta = document.body.querySelector('[name="clabeCuenta"]');
const numeroTarjeta = document.body.querySelector('[name="numeroTarjeta"]');
const titular = document.body.querySelector('[name="titular"]');
const pedidosPendientesLista = document.getElementById('pedidos-pendientes');
const totalPedidos = document.getElementById('total-pedidos');
const totalPedidosPendientes = document.getElementById('total-pedidos-pendientes');
const pedidosTitulo = document.getElementById('pedidos-titulo');
const pedidosPendientesTitulo = document.getElementById('pedidos-pendientes-titulo');

document.addEventListener('hacerpedido', () => {
  fetch('php/includes/orders/agregar_pedido.inc.php', {
    method: 'POST',
    body: obtenerFormData()
  })
    .then((respuesta) => respuesta.json())
    .then((datos) => {
      obtenerRespuesta(datos, () => {
        crearNotificacion(datos.contenido[0].titulo, datos.contenido[0].mensaje, 'error');
      });

      if (datos.status === 0) return;

      pedidosPendientesLista.appendChild(crearItemPedido(datos.contenido[0]));

      totalPedidos.innerText = +totalPedidos.innerText + 1;
      totalPedidosPendientes.innerText = +totalPedidosPendientes.innerText + 1;
      pedidosTitulo
        .innerHTML = `${totalPedidos.outerHTML} pedido${+totalPedidos.innerText === 1 ? '' : 's'}`;
      pedidosPendientesTitulo
        .innerHTML = `${totalPedidosPendientes.outerHTML} por entregar`;

      // Reinicio de apartado de clientes.
      idCliente.value = '';
      infoCliente.innerHTML = /*html*/`
        <contenedor-flex margin='auto' padding='var(--espaciado-chico)'>
          <wc-texto data-tipo-fuente='etiqueta-l'>Ningún cliente selccionado</wc-texto>
        </contenedor-flex>
      `;

      // Reinicio de apartado de productos.
      for (const producto in productosAgregados.productos) {
        const infoProducto = productosAgregados.productos[producto];
        const id = infoProducto.id;

        productosDisponiblesCreacion.actualizarProductoDisponible(id, infoProducto.cantidad);
        productosDisponiblesEdicion.actualizarProductoDisponible(id, infoProducto.cantidad);
      }

      productosAgregados.listaItems.replaceChildren();
      productosAgregados.removerProductos();

      entregaFormulario.reiniciar();

      pagoEfectivo.checked = true;
      pagoEfectivo.dispatchEvent(new Event('change'));

      clabeCuenta.value = '';
      numeroTarjeta.value = '';
      titular.value = '';

      ordenarPedidos('pedidos-pendientes');
    });
});
