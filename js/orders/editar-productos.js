import { obtenerRespuesta } from '../vista-control.js';
import productosPopup from './controllers/popups/productos.js';
import vistaPedidoFormulario from './controllers/vista-pedido-formulario.js';

productosPopup.inicializar();
const ventana = productosPopup.ventana;

document.addEventListener('editarproductospedidos', () => ventana.mostrarVentana());

const ventanaConfirmacion = document.getElementById('descartar-editar-productos-pedidos');

ventana.addEventListener('verificarcierre', () => {
  if (productosPopup.tieneCamposEditados()) {
    ventanaConfirmacion.mostrarVentana();
    return;
  }

  ventana.cerrarVentana();
});

ventana.addEventListener('buscarproductonuevo', () => productosPopup.tabs.seleccionarTab(2));
ventana.addEventListener('regresar', () => productosPopup.tabs.seleccionarTab(1));

ventanaConfirmacion.addEventListener('cancelarcierre', () => ventanaConfirmacion.cerrarVentana());
ventanaConfirmacion.addEventListener('cerrarventanas', () => ventana.cerrarVentana());

ventana.addEventListener('confirmarremoverproductopedido', (e) => {
  const productoItem = e.target.parentElement;
  const nombreProducto = productoItem.querySelector('.nombre-producto-pedido').innerText;
  productosPopup.productoSeleccionado = productoItem.querySelector('.id-producto-pedido').value;

  confirmarRemoverProducto.querySelector('.nombre-producto').innerText = nombreProducto;
  confirmarRemoverProducto.mostrarVentana();
});

const confirmarRemoverProducto = document.getElementById('confirmar-remover-producto-pedido');
confirmarRemoverProducto.addEventListener('cancelar', () => {
  confirmarRemoverProducto.cerrarVentana();
});

const listaProductosPedidos = vistaPedidoFormulario.listaProductosPedidos;

confirmarRemoverProducto.addEventListener('removerproductopedido', () => {
  const idPedido = vistaPedidoFormulario.idPedido;
  const idProducto = productosPopup.productoSeleccionado;

  const formData = new FormData();
  formData.append('idPedido', idPedido);
  formData.append('idProducto', idProducto);

  fetch('php/includes/orders/remover_producto_pedido.inc.php', {
    method: 'POST',
    body: formData
  })
    .then((respuesta) => respuesta.json())
    .then((datos) => {
      confirmarRemoverProducto.cerrarVentana();

      obtenerRespuesta(datos);

      if (!datos.status) return;

      const productoItem = productosPopup.productosComprados.querySelector(`.id-producto-pedido[value='${idProducto}']`)
        .parentElement;

      const cantidad = productoItem.querySelector('.mini-input').placeholder;
      const subtotal = productoItem.querySelector('.subtotal-producto').innerText;

      vistaPedidoFormulario.totalProductos -= cantidad;
      vistaPedidoFormulario.costoTotal = (vistaPedidoFormulario.costoTotal - subtotal).toFixed(2);
      vistaPedidoFormulario.anticipoRequerido = (vistaPedidoFormulario.costoTotal / 2).toFixed(2);

      productoItem.remove();

      listaProductosPedidos.querySelector(`.id-producto[value='${idProducto}']`)
        .parentElement.remove();
    });
});
