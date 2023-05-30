import { ordenarPedidos } from './controllers/ordenar-pedidos.js';
import vistaPedidoFormulario from './controllers/vista-pedido-formulario.js';
import datosDestinatarioPopup from './controllers/popups/datos-destinatario.js';
import datosEntregaPopup from './controllers/popups/datos-entrega.js';
import productosPopup from './controllers/popups/productos.js';
import productosPedidos from './controllers/lista-productos-pedidos.js';
import { ordenarClienteUbicaciones } from '../customers/ordenar-clientes.js';

vistaPedidoFormulario.inicializar();
ordenarPedidos('pedidos-pendientes');

const mostrarPedidoPendiente = new CustomEvent('mostrarpedidopendiente', { bubbles: true, composed: true });
const pedidosPendientesLista = document.getElementById('pedidos-pendientes');

pedidosPendientesLista.querySelectorAll('lista-item').forEach((item) => {
  item.addEventListener('click', () => item.dispatchEvent(mostrarPedidoPendiente));
});

const subtab = document.getElementById('subtab');

document.addEventListener('regresarpedidos', () => {
  subtab.seleccionarTab(2);
  vistaPedidoFormulario.reiniciar();
  datosDestinatarioPopup.reiniciar();
  datosDestinatarioPopup.reiniciarPlaceholders();
  productosPopup.reiniciar();
  productosPopup.nuevosProductosAgregados = {};
  productosPedidos.productos = {};

  datosEntregaPopup.reiniciar();
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

      obtenerUbicaciones(pedido);

      datosDestinatarioPopup.nombreDestinatarioPlaceholder = pedido.nombreDestinatario;
      datosDestinatarioPopup.celularDestinatarioPlaceholder = pedido.telefonoDestinatario;

      datosEntregaPopup.tipoEntrega = pedido.tipoEntrega;
      datosEntregaPopup.aplicacion = pedido.aplicacion;
      datosEntregaPopup.fechaEntrega = pedido.fechaEntrega;
      datosEntregaPopup.horaEntrega = pedido.horaEntrega.slice(0, 5);

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
      productosPopup.reiniciar();

      let totalProductos = 0;

      datos.contenido.forEach((producto, i) => {
        productosPedidos.producto = producto;

        productosPedidos.agregarProducto(
          producto.idProducto,
          producto.nombreProducto,
          producto.cantidad,
          producto.subtotal,
          producto.existencias
        );

        vistaPedidoFormulario.agregarProductoPedido(
          producto.idProducto,
          producto.nombreProducto,
          producto.cantidad,
          producto.subtotal
        );

        totalProductos += producto.cantidad;
      });

      totalProductosItem.innerText = totalProductos;
    });
};

const obtenerUbicaciones = (pedido) => {
  datosEntregaPopup.reiniciarUbicaciones();

  const formData = new FormData();
  formData.append('idCliente', pedido.idCliente);

  fetch('php/includes/locations/mostrar_ubicaciones.inc.php', {
    method: 'POST',
    body: formData
  })
    .then((respuesta) => respuesta.json())
    .then((datos) => {
      datos.contenido.forEach((ubicacion) => {
        const ubicacionOpcion = document.createElement('option');
        ubicacionOpcion.value = ubicacion.id;
        ubicacionOpcion.innerText = `
          ${ubicacion.colonia}, ${ubicacion.callePrincipal} ${ubicacion.numeroExterior ? `#${ubicacion.numeroExterior}` : 'S.N.'}, C.P. ${ubicacion.cp}
        `;

        datosEntregaPopup.ubicaciones.appendChild(ubicacionOpcion);

        ubicacionOpcion.contenido = {
          'Calle principal': ubicacion.callePrincipal,
          'Calle(s) adyacente(s)': ubicacion.callesAdyacentes ? ubicacion.callesAdyacentes : 'No especificada(s)',
          Colonia: ubicacion.colonia,
          'Número exterior': ubicacion.numeroExterior ? ubicacion.numeroExterior : 'S.N.',
          'Número interior': ubicacion.numeroInterior ? ubicacion.numeroInterior : 'S.N.',
          'Código postal': ubicacion.cp
        };
      });

      ordenarClienteUbicaciones(datosEntregaPopup.ventana.querySelector('[name="ubicacion"]'));

      if (pedido.tipoEntrega === 'Pick up') {
        datosEntregaPopup.ubicaciones.value = datosEntregaPopup.ubicaciones.children[0].value || datosEntregaPopup.ubicaciones.children[1].value;
      } else {
        datosEntregaPopup.ubicaciones.value = pedido.idUbicacion;
      }

      datosEntregaPopup.ubicaciones.dispatchEvent(new Event('change'));
    });
};
